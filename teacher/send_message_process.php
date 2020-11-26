<?php

    session_start();
    include('server.php');

    if(isset($_POST['send'])){
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $teacher_id = mysqli_real_escape_string($conn, $_POST['teacher_id']);
        $message_topic = mysqli_real_escape_string($conn, $_POST['message_topic']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // $sql1 = "SELECT * FROM students WHERE student_id = $student_id";
        // $sql2 = "SELECT * FROM teachers WHERE teacher_id = $teacher_id";

        $sql = "INSERT INTO messages (message_topic, message_text, student_id, teacher_id) 
                VALUES ('$message_topic', '$message', '$student_id', '$teacher_id')";
        $result = mysqli_query($conn, $sql);
        // var_dump($sql);

        if($result) {
            echo "<script>";
            echo "alert('ส่งข้อความสำเร็จ');";
            echo "window.location = 'five-two_room.php'";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('เกิดข้อผิดพลาดในการส่งข้อความ');";
            echo "window.location = 'five-two_room.php'";
            echo "</script>";
        }
    }

?>