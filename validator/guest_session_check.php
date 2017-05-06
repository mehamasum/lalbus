<?php
/**
 * Created by PhpStorm.
 * user: FAHIM
 * Date: 5/4/2017
 * Time: 8:28 PM
 */
session_start();
if(isset($_SESSION['id']))
{
    ob_start();
    header('Location: home');
    ob_end_flush();
    die();
}
?>
