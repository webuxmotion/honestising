<?php

namespace app\controllers;

use core\Tone;

class PagesController extends AppController {
    
    public function aboutAction() {
       $this->setMeta(
           'About page'
       );
    }

    public function commandAction() {
        $this->setMeta(
            'Command page'
        );
     }

     public function sponsorsAction() {
        $this->setMeta(
            'Sponsors page'
        );
     }

     public function contactsAction() {
        $this->setMeta(
            'Contacts page'
        );
     }
}