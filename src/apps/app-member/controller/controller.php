<?php

use FreeSslDotTech\FreeSSLAuto\Admin\Login;

if(isset($_POST['url']) && !empty($_POST)){

  $url  = (isset($_POST['url']))?sanitize($_POST['url']):'default';
  $type = (isset($_POST['get_type']))?sanitize($_POST['get_type']):'action';
  $page = post($url, $type);
}else{
  list($page, $_GET) = getPath();
}

if ( !isset($_SESSION['tmp_user']) && $page != 'login') {
  $page = 'login';
  redirect_to('login');
}