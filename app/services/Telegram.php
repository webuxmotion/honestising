<?php

namespace app\services;

use core\TSingletone;

class Telegram
{
    use TSingletone;

    public static $service;

    private function __construct()
    {
        self::$service = new \TelegramBot\Api\BotApi($_ENV['BOT_TOKEN']);
    }

    public static function sendMessage($chatId, $messageText) {
        self::$service->sendMessage($chatId, $messageText);

        return self::$service;
    }
}