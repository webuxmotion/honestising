<?php

namespace app\controllers;

use core\Tone;
use app\services\GoogleAuth;
use app\models\UserModel;

class UserController extends AppController {

    public function profileAction() {
        $user = $_SESSION['user'] ?? null;

        $this->setMeta(
            'Profile - ' . Tone::$app->getProperty('site_name'),
            'Profile page. HI-EDDY Academy',
            'honestising, academy, education, profile page'
        );

        $this->set(compact('user'));
    }
    
    public function loginAction() {
        $lang = Tone::$app->getProperty('lang');
        $lang = $lang ? '/' . $lang : '';
        
        $this->setMeta(
            __('user_login_enter_to_site') . ' - ' . Tone::$app->getProperty('site_name'),
            'Login page. HI-EDDY Academy',
            'honestising, academy, education'
        );

        GoogleAuth::run();

        $queryParamsString = '';
        $redirectTo = $_GET['redirectTo'] ?? null;
        if ($redirectTo) {
            $queryParamsString .= '?redirectTo=' . $redirectTo;
        }
        $google_login_url = $lang . '/user/click-on-google-login-button' . $queryParamsString;

        $this->set(compact('google_login_url'));
    }

    public function clickOnGoogleLoginButtonAction() {
        $redirectTo = $_GET['redirectTo'] ?? null;
        GoogleAuth::run();

        $google_login_url = GoogleAuth::$google_login_url;

        if ($redirectTo) {
            $_SESSION['redirectTo'] = $redirectTo;
        }
        redirect($google_login_url);
    }

    public function logoutAction() {
        unset($_SESSION['user']);
        redirect(baseUrl());
    }

    public function updateAction() {
        if (!empty($_POST)) {
            $data = $_POST;
        
            $user_model = new UserModel();
            $isUpdated = $user_model->updateProfile($data);

            if ($isUpdated) {
                $_SESSION['success'] = "Профіль збережено";
            }
        }
        
        redirect();
    }
}