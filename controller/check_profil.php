<?php
/**
 * Created by JetBrains PhpStorm.
 * User: occul_000
 * Date: 03/03/13
 * Time: 23:50
 * To change this template use File | Settings | File Templates.
 */


require_once('../core/PDOManager.php');
require_once('PDOUserManager.php');
require_once('../model/User.php');

session_start();


if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['job'])){
    if($_POST['password'] == $_POST['confirmPassword']){
        echo 'cool';

        $PDOUserManager = new PDOUserManager();
        $userUpdate = $PDOUserManager->udapteUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['job']);

        //$user=new User($pdo->lastInsertId(), $firstname, $lastname, $email, $password, $job);

        $_SESSION['firstname'] = $userUpdate->setFirstname($_POST['firstname']);
        $_SESSION['lastname'] = $userUpdate->setLastname($_POST['lastname']);
        $_SESSION['email'] = $userUpdate->setEmail($_POST['email']);
        $_SESSION['job'] = $userUpdate->setJob($_POST['job']);
        $userUpdate->setPassword($_POST['password']);

        header('Location:/anfshift/view/dashboard.php');

    }
}
else{
    echo 'pas cool';
}