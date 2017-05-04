<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/4/2017
 * Time: 8:30 PM
 */
session_start();
if(!isset($_SESSION['id']))
{
    ob_start();
    header('Location: login');
    ob_end_flush();
    die();
}
?>