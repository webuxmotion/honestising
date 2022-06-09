<?php

return [
  'get_simple_html_code' => function ($alias) {
    return doc('index.html', [
      'lang' => 'php',
      'alias' => $alias
    ]);
  },
];