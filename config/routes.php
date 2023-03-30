<?php

use wfm\Router;

//^ - начало строка
//$ - конец строки


Router::add('^admin/?$', ['controller'=> 'Main', 'action' => 'index', 'admin_prefix' => 'admin']);

Router::add('^admin/?(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)?$', ['controller'=> 'Main', 'action' => 'index', 'admin_prefix' => 'admin']);

Router::add('^$', ['controller'=> 'Main', 'action' => 'index']);

//с помощью ре-го. выражения получит строку из ulr и запишет с ключем контроллер и ключем экшен
Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');