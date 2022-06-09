<?php

namespace app\services;

use app\models\UserModel;
use app\services\Telegram;
use core\Tone;
use Google\Client;
use Google\Service\Oauth2;


class GoogleAuth {
    public static $google_login_url;

    public static function run() {
        $lang = Tone::$app->getProperty('lang');
        $lang = $lang ? $lang . '/' : '';
        $redirectUri = siteUrl() . $lang . 'login';

        $client = new Client();
        $client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
        $client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
        $client->setApplicationName('HI-EDDY Application');
        $client->setRedirectUri($redirectUri);
        $client->addScope('https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email');

        self::$google_login_url = $client->createAuthUrl();

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

            if (!isset($token['error'])) {
                $oAuth = new Oauth2($client);
                $userData = $oAuth->userinfo_v2_me->get();

                $data = [
                    'email' => $userData['email'],
                    'avatar' => $userData['picture'],
                    'firstName' => $userData['givenName'],
                    'lastName' => $userData['familyName'],
                ];

                $user_model = new UserModel();
                $user_model->saveGoogleUser($data);
                $_SESSION['success'] = "You is loginned!";
            } else {
                $_SESSION['errors'] = "Some trouble with Google Authentication";
            }
            $redirectTo = $_SESSION['redirectTo'] ?? null;
            unset($_SESSION['redirectTo']);

            if (isUser()) {
                Telegram::instance()
                    ->sendMessage(
                        $_ENV['BOT_CHAT_ID'], 
                        "User with email: {$_SESSION['user']['email']} was loginned!"
                    );
            }
            
            if ($redirectTo) {
                redirect($redirectTo);
            } else {
                redirect($redirectUri);
            }
        }
    }
}