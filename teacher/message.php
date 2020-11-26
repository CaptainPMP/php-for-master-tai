<?php session_start(); ?>
<?php include('server.php'); ?>
<?php
    if(!isset($_SESSION['teacher_success'])) {
        header("location: login.php");
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['teacher_name']);
        header("location: login.php");
    }

    $sql = "SELECT * FROM messages AS m
            INNER JOIN students AS s 
                ON m.student_id = s.student_id
            INNER JOIN teachers AS t 
                ON m.teacher_id = t.teacher_id
            WHERE m.student_id = '".$_GET['message_history']."'";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <style>
        .kanit {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<body>

    <!-- <div class="container">
        <div class="card mt-4">
            <div class="card-header kanit bg-primary text-white">ห้องแชทบอกคะแนน</div>
            <div class="card-body">
                <form action="send_message.php" method="post">
                    
                </form>
            </div>
        </div>
        <a href="five-two_room.php" class="btn btn-primary mt-3">กลับ</a>
    </div> -->
    <div class="container">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card my-3">
            <div class="card-header bg-primary text-white kanit"><?php echo $row['message_topic']; ?></div>
            <div class="card-body kanit">
                <p class="kanit"><?php echo $row['message_text']; ?></p>
                <p class="text-right text-secondary"><?php echo $row['teacher_name']; ?></p>
            </div>
        </div>
        <?php } ?>
        <a href="five-two_room.php" class="btn btn-primary mb-3">Back</a>
    </div>
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>