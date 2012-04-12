<?php

   require 'config.php';

   //ovewrites the cookie
   $facebook->setSession(null);

   header('Location: http://localhost/fb/index.php');
?>
