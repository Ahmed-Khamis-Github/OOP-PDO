<?php
 session_start() ;
 include 'core/functions.php' ;
 session_destroy() ;
 header("Location: /day1/login.php");
 die() ;