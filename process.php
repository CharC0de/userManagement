<?php
require_once './config.php';

if (isset($_POST['createUser'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `users` (`id`, `username`, `email`, `address`) VALUES (NULL, ' $username ', ' $email', '$address ') ";
    try {
        $conn->query($sql);
        header('location: index.php?success=insert');
        exit();
    } catch (\Throwable $th) {
        header('location: index.php?error=insert&message=' . var_dump($th));
        exit();
    }
}
if (isset($_POST['updateUser'])) {
    $oldId = $_POST['oldId'];
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "UPDATE `users` SET `id` = '$id', `username` = '$username', `email` = '$email', `address` = '$address' WHERE `users`.`id` = $oldId ";
    try {
        $conn->query($sql);
        header('location: index.php?success=update');
        exit();
    } catch (\Throwable $th) {
        header('location: index.php?error=insert&message=' . var_dump($th));
        exit();
    }
}
if (isset($_GET['deleteUser'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE id='$id' ";
    try {
        $conn->query($sql);
        header('location: index.php?success=delete');
        exit();
    } catch (\Throwable $th) {
        header('location: index.php?error=insert&message=' . var_dump($th));
        exit();
    }
}



header('location: index.php');
exit();