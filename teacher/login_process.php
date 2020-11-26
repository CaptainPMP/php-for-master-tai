<?php

    session_start();
    include('server.php');
    $errors = array();

    if(isset($_POST['teacher_login'])) {
        $teacher_name = mysqli_real_escape_string($conn, $_POST['teacher_name']);
        $teacher_password = mysqli_real_escape_string($conn, $_POST['teacher_password']);

        if(empty($teacher_name)) {array_push($errors,"Error");}
        if(empty($teacher_password)) {array_push($errors,"Error");}

        if(count($errors) == 0){
            $teacher_password = md5($teacher_password);
            $sql = "SELECT * FROM teachers WHERE teacher_name = '$teacher_name' AND teacher_password = '$teacher_password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
            if(mysqli_num_rows($result) == 1) {
                $_SESSION['teacher_success'] = "Success";
                $_SESSION['teacher_name'] = $row['teacher_name'];
                $_SESSION['teacher_id'] = $row['teacher_id'];
                header("location: index.php");
            } else {
                $_SESSION['error'] = "เกิดข้อผิดพลาด";
                header("location: login.php");
            }
        } else {
            $_SESSION['error'] = "เกิดข้อผิดพลาด";
            header("location: login.php");
        }
    }

?>