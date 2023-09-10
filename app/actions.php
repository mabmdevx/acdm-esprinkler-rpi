<?php




switch($page)
{
case "login":
$pageRtn=include_once("pages/login.php");
break;

case "logout":
$pageRtn=include_once("pages/logout.php");
break;

case "dashboard":
$pageRtn=include_once("pages/dashboard.php");
break;

case "user_profile":
$pageRtn=include_once("pages/user_profile.php");
break;

case "settings":
$pageRtn=include_once("pages/settings.php");
break;

case "set_webserver":
$pageRtn=include_once("pages/set_webserver.php");
break;

case "manual_control":
$pageRtn=include_once("pages/manual_control.php");
break;

default:
$pageRtn=include_once("pages/404page.php");
break;
}




if($pageRtn==false)
{
include_once("pages/404page.php");
}




?>
