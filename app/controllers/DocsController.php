<?php

namespace app\controllers;

use core\Tone;

class DocsController extends AppController {
    
    public function indexAction() {
    
       $this->setMeta(
           Tone::$app->getProperty('site_name'),
           'Документація для проекта HI-EDDY',
           'Документація'
       );
    }
}