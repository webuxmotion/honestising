<?php

define("PATH", siteUrl());

function customRequire($path) {
    if (file_exists($path)) {
        require($path);
    } else {
        echo "Page not found";
    }
}
function image($fileName, $vars = ['alias' => '']) {
    $res = "<div>";
    $res .= "<img src=\"/images-tuts/{$vars['alias']}/{$fileName}\">";
    $res .= "</div>";
    
    return $res;
}

function doc($fileName, $vars = ['lang' => 'php', 'alias' => '']) {
    $file = "/pages/Lessons/{$vars['alias']}/files/{$fileName}";

    $fileContent = file_get_contents(APP . $file);
    $fileContent = str_replace('<', '&lt;', $fileContent);
    $fileContent = str_replace('>', '&gt;', $fileContent);
    $fileContent = str_replace('?', '&#63;', $fileContent);

    $res = "<pre><code class=\"language-{$vars['lang']}\">";
    $res .= $fileContent;
    $res .= "</code></pre>";

    return $res;
}

function get($key, $type = 'i')
{
    $param = $key;
    $$param = $_GET[$param] ?? '';
    if ($type == 'i') {
        return (int)$$param;
    } elseif ($type == 'f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

/**
 * @param string $key Key of POST array
 * @param string $type Values 'i', 'f', 's'
 * @return float|int|string
 */
function post($key, $type = 's')
{
    $param = $key;
    $$param = $_POST[$param] ?? '';
    if ($type == 'i') {
        return (int)$$param;
    } elseif ($type == 'f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

function baseUrl()
{
    return PATH . (\core\Tone::$app->getProperty('lang') ? \core\Tone::$app->getProperty('lang') . '/' : '');
}

function __($key)
{
    $string = \app\services\LanguageService::get($key);

    return $string;
}

function isUser() {
    return !empty($_SESSION['user']);
}

function isAdmin() {
    return !empty($_SESSION['user']) 
        && !empty($_SESSION['user']['role'])
        && $_SESSION['user']['role'] == 'admin';
}

function upperFirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));

    return $fc.mb_substr($str, 1);
}

function codeTheme() {
    // https://cdnjs.com/libraries/highlight.js
    $theme = 'stackoverflow-dark';
    $theme = 'default';
    //$theme = 'github-dark-dimmed';

    return $theme;
}

function getParam($array, $key) {
    return isset($array[$key]) ? $array[$key] : '';
}