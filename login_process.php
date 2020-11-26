<?php

    session_start();
    include('server.php');

    $errors = array();

    if(isset($_POST['login'])){
        $student_number = mysqli_real_escape_string($conn, $_POST['student_number']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(empty($student_number)){array_push($errors, "Error");}
        if(empty($password)){array_push($errors, "Error");}

        if(count($errors) == 0){
            $password = md5($password);
            $sql = "SELECT * FROM students WHERE student_number = '$student_number' AND student_password = '$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) == 1) {
                $_SESSION['success'] = "success";
                $_SESSION['student_name'] = $row['student_name'];
                $_SESSION['student_id'] = $row['student_id'];
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