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
    // echo $_GET['message'];
    if(isset($_GET['message'])){
        $student_id = $_GET['message'];
        $sql = "SELECT * FROM students WHERE student_id = $student_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
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

    <div class="container">
        <div class="card mt-4">
            <div class="card-header kanit bg-primary text-white">ห้องแชทบอกคะแนนกับ <?php echo $row['student_name']; ?></div>
            <div class="card-body">
                <form action="send_message_process.php" method="post">
                    <input type="hidden" value="<?php echo $row['student_id']; ?>" name="student_id">
                    <input type="hidden" value="<?php echo $_SESSION['teacher_id']; ?>" name="teacher_id">
                    <div class="form-group">
                        <label for="topic">Topic of Message :</label>
                        <input type="text" name="message_topic" class="form-control" placeholder="Topic Here" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message :</label>
                        <textarea name="message" class="form-control" placeholder="Message Here"></textarea>
                    </div>
                    <input type="submit" value="submit" name="send" class="btn btn-success">
                </form>
            </div>
        </div>
        <a href="five-two_room.php" class="btn btn-primary mt-3">กลับ</a>
    </div>
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>