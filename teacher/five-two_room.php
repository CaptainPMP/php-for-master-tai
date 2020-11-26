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

    $sql = "SELECT * FROM students WHERE student_class = '5/2' ORDER BY student_class_number";
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

    <div class="container">
        <div class="card mt-4">
            <div class="card-header kanit bg-primary text-white">ม.5/2</div>
            <div class="card-body table-responsive">
                <table class="table kanit">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">เลขที่</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th scope="row"><?php echo $row['student_class_number']; ?></th>
                            <td><?php echo $row['student_name']; ?></td>
                            <td><a href="send_message.php?message=<?php echo $row['student_id']; ?>" class="btn btn-warning">บอกคะแนน</a></td>
                            <td><a href="message.php?message_history=<?php echo $row['student_id']; ?>" class="btn btn-success">ประวัติการบอกคะแนน</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="index.php" class="btn btn-primary mt-3">กลับ</a>
    </div>
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>