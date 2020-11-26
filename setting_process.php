<?php

    session_start();
    include('server.php');
    $errors = array();

    if(isset($_POST['change'])) {
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);

        if(empty($password)) {array_push($errors, "Error");}
        if(empty($new_password)) {array_push($errors, "Error");}

        if(count($errors) == 0) {
            $password = md5($password);
            $check_password = "SELECT * FROM students WHERE student_id = $student_id AND student_name = '$student_name' 
            AND student_password = '$password'";
            $result = mysqli_query($conn, $check_password);
            
            if(mysqli_num_rows($result) == 1) {
                $new_password = md5($new_password);
                $query = "UPDATE students SET student_password = '$new_password' WHERE student_id = $student_id";
                $result2 = mysqli_query($conn, $query);

                if($result2) {
                    $_SESSION['change_success'] = "เปลี่ยนรหัสผ่านสำเร็จ";
                    header("location: setting.php");
                } else {
                    $_SESSION['change_error'] = "เกิดข้อผิดพลาด";
                    header("location: setting.php");
                }
            } else {
                $_SESSION['change_error'] = "เกิดข้อผิดพลาด";
                header("location: setting.php");
            }
        }
    }

?>