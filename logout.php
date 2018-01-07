<?php
/**
 * Created by PhpStorm.
 * User: ma_sa
 * Date: 2018-01-07
 * Time: 08:39 AM
 */
require_once ("classes/classSessionManager.php");
$sm = new sessionManager();
$sm->destroyAllSessions();
header("location: login.php");


