<?php

use core\Router;

Router::add('^lessons/(?P<action>[a-z-]+)/(?P<id>[0-9]+)$', ['controller' => 'Lessons']);

Router::add('^(?P<lang>[a-z]{2}+)?/?lessons/(?P<alias>[a-z-]+)?$', ['controller' => 'Lessons', 'action' => 'one-item']);

Router::add('^(?P<lang>[a-z]{2}+)?/?about/?$', ['controller' => 'Pages', 'action' => 'about']);
Router::add('^(?P<lang>[a-z]{2}+)?/?contacts/?$', ['controller' => 'Pages', 'action' => 'contacts']);
Router::add('^(?P<lang>[a-z]{2}+)?/?sponsors/?$', ['controller' => 'Pages', 'action' => 'sponsors']);
Router::add('^(?P<lang>[a-z]{2}+)?/?command/?$', ['controller' => 'Pages', 'action' => 'command']);

Router::add('^(?P<lang>[a-z]{2}+)?/?prices/?$', ['controller' => 'Prices', 'action' => 'list']);

Router::add('^(?P<lang>[a-z]{2}+)?/?lessons/?$', ['controller' => 'Lessons', 'action' => 'list']);

Router::add('^(?P<lang>[a-z]{2}+)?/?login/?$', ['controller' => 'User', 'action' => 'login']);
Router::add('^(?P<lang>[a-z]{2}+)?/?profile/?$', ['controller' => 'User', 'action' => 'profile']);

Router::add('^(?P<lang>[a-z]{2}+)?/?docs/?$', ['controller' => 'Docs', 'action' => 'index']);

Router::add('^(?P<lang>[a-z]{2}+)?/(?P<controller>[a-z-]+)?/(?P<action>[a-z-]+)?$');
Router::add('^(?P<lang>[a-z]{2}+)?/?$', ['controller' => 'Main', 'action' => 'index']);



// custom route here
// ...
