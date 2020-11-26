<?php session_start(); ?>
<?php include('server.php'); ?>
<?php
    if(!isset($_SESSION['success'])) {
        header("location: login.php");
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['student_name']);
        header("location: login.php");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .kanit {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card my-5">
            <div class="card-header bg-warning kanit">ตั้งค่าผู้ใช้</div>
            <div class="card-body kanit">
                    <?php
                    if(isset($_SESSION['change_error'])) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> <?php echo $_SESSION['change_error']; ?>
                    </div>
                    <?php unset($_SESSION['change_error']); ?>
                    <?php endif; ?>
                    <?php
                    if(isset($_SESSION['change_success'])) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> <?php echo $_SESSION['change_success']; ?>
                    </div>
                    <?php unset($_SESSION['change_error']); ?>
                    <?php endif; ?>
                <form action="setting_process.php" method="post">
                    <input type="hidden" name="student_id" value="<?php echo $_SESSION['student_id'] ?>">
                    <div class="form-group">
                        <label for="Student_Name">Name :</label>
                        <input type="text" value="pumipat" name="student_name" class="form-control" readonly>
                    </div>
                    <hr>
                    <p class="kanit">เปลี่ยนรหัสผ่าน</p>
                    <div class="form-group">
                        <label for="Password" class="kanit">รหัสผ่านเก่าของคุณ :</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" name="password" class="form-control" placeholder="Old Password" required>
                            <div class="input-group-apppend">
                                <a href="" class="input-group-text"><span><i class="fa fa-eye-slash" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="kanit">รหัสผ่านใหม่ของคุณ :</label>
                        <div class="input-group" id="show_hide_password2">
                            <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                            <div class="input-group-apppend">
                                <a href="" class="input-group-text"><span><i class="fa fa-eye-slash" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="submit" name="change" class="btn btn-success">
                </form>
            </div>
        </div>
        <a href="index.php" class="btn btn-primary kanit">กลับ</a>
    </div>
    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
            $("#show_hide_password2 a").on('click', function(event) {
            event.preventDefault();
        if($('#show_hide_password2 input').attr("type") == "text"){
            $('#show_hide_password2 input').attr('type', 'password');
            $('#show_hide_password2 i').addClass( "fa-eye-slash" );
            $('#show_hide_password2 i').removeClass( "fa-eye" );
        }else if($('#show_hide_password2 input').attr("type") == "password"){
            $('#show_hide_password2 input').attr('type', 'text');
            $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
            $('#show_hide_password2 i').addClass( "fa-eye" );
        }
    });
});
    </script>
</body>
</html>