<?php

namespace app\controllers;

use \core\Tone;
use \app\models\LessonModel;
use \app\models\LessonPinModel;
use \app\models\LessonDoneModel;
use \app\services\Telegram;


class LessonsController extends AppController {
    
    public function listAction() {
        $model = new LessonModel();
        $list = $model->getList();

        $pinnedMode = get('pinned', 'bool');
        $doneMode = get('done', 'bool');

        $this->setMeta(
           "Lessons Page"
        );

        $this->set(compact('list', 'pinnedMode', 'doneMode'));
    }

    public function togglePinAction() {
        $pinModel = new LessonPinModel();
        $pinModel->togglePin($this->route['id']);
        redirect();
    }

    public function toggleDoneAction() {
        $doneModel = new LessonDoneModel();
        $doneModel->toggleDone($this->route['id']);
        redirect();
    }

    public function oneItemAction() {
        $alias = $this->route['alias'] ?? null;
        $lang = Tone::$app->getProperty('language')['code'];
        $fbclid = get('fbclid', 'string');

        if ($fbclid) {
            Telegram::instance()
                ->sendMessage(
                    $_ENV['BOT_CHAT_ID'], 
                    "Someone with fbclid: 
                    \n{$fbclid} 
                    clicked the link. 
                    \nAlias: 
                    \n{$alias}"
                );
        }

        $model = new LessonModel();
        $item = $model->getOneByAlias($alias);

        ob_start();
        $vars = [];
        
        $lessonFolder = APP . "/pages/Lessons/{$alias}/";
        $constantsFile = $lessonFolder . "constants.php";
        $lessonFile = $lessonFolder . "{$lang}-index.php";

        if (file_exists($constantsFile)) {
            $vars = require $constantsFile;
        }
        
        extract($vars);
        
        if (file_exists($lessonFile)) {
            require $lessonFile;
        } else {
            require APP . "/pages/Lessons/not-found-lesson.php";
        }
        
        $content = ob_get_clean();

        $this->setMeta(
            "Tutorial - $alias",
            isset($item['meta_description']) ? $item['meta_description'] : '',
            isset($item['meta_keywords']) ? $item['meta_keywords'] : ''
        );

        $this->set(compact('content', 'item'));
     }
}