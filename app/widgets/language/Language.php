<?php

namespace app\widgets\language;

use RedBeanPHP\R;
use core\Tone;
use app\models\LanguageModel;

class Language
{

    protected $tpl;
    protected $languages;
    protected $language;

    public function __construct()
    {
        $this->tpl = __DIR__ . '/components/languages/languages.php';
        $this->run();
    }

    protected function run()
    {
        $this->languages = Tone::$app->getProperty('languages');
        $this->language = Tone::$app->getProperty('language');
        echo $this->getHtml();
    }

    public static function getLanguages(): array
    {
        $model = new LanguageModel();
        return $model->getLanguages();
    }

    public static function getLanguage($languages)
    {
        $lang = Tone::$app->getProperty('lang');
        
        if ($lang && array_key_exists($lang, $languages)) {
            $key = $lang;
        } elseif (!$lang) {
            $key = key($languages);
        } else {
            $lang = h($lang);
            throw new \Exception("Not found language {$lang}", 404);
        }

        $lang_info = $languages[$key];
        $lang_info['code'] = $key;
        return $lang_info;
    }

    protected function getHtml(): string
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }

}