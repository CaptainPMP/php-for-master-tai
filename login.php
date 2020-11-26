<?php session_start(); ?>
<?php include('server.php'); ?>
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
        <div class="card mt-5">
            <div class="card-header bg-primary text-white">Student Login Form</div>
            <div class="card-body">
            <?php
                    if(isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> <?php echo $_SESSION['error'] ?>
                    </div>
                    <?php session_destroy();
                        unset($_SESSION['error']);
                    ?>
                    <?php endif; ?>
                <form action="login_process.php" method="post">
                    <div class="form-group">
                        <label for="student-no">Student No : </label>
                        <input type="text" placeholder="Student No:" class="form-control" name="student_number">
                    </div>
                    <div class="form-group">
                        <label for="password">Password : </label>
                        <input type="password" placeholder="Password" class="form-control" name="password">
                    </div>
                    <input type="submit" value="submit" name="login" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>