<?php
    require_once 'connection.php';
    global $db;

    $id = $_GET['id'];
    if(!is_numeric($id)){
        header("Location: index.php");
        exit();
    }

    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = $db->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $image = $row['image'];
    unlink("images/$image");


    $query = "DELETE FROM users WHERE id = '$id'";
    $db->exec($query);

    header("Location: index.php");
    exit();
?>

