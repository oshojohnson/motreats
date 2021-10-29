<?php
        include 'functions.php';
        if(isset($_SESSION['email'])){
            header("location:index.php");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="icon" href="logo.png" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MoTreats - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="logo.png" height="100px" width="100px" style="margin: 150px;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <p id="login_msg"></p>
                                    <?php if(isset($_SESSION['session_error']) && $_SESSION['session_error']==1){
                                        echo ' <p class="alert alert-danger" id="session_msg"><i class="fa fa-info-circle"></i> You must login in first</p>';
                                    }
                                    ?>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <p id="email_msg"></p>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password">
                                        </div>
                                        <p id="pass_msg"></p>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="button" id="login_btn"  class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                      
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        $('#login_btn').click(function(){
           var email= $('#email').val();
           var password= $('#password').val();
           if(email==""){
                $('#email_msg').html('<span class="alert alert-danger"> <i class="fa fa-info-circle"></i>Email Field cannot be empty</span>');
           }
           else{
                $('#email_msg').html('');
           }
           if(password==""){
                $('#pass_msg').html('<span class="alert alert-danger"><i class="fa fa-info-circle"></i>Password Field cannot be empty</span>');
           }else{
                $('#pass_msg').html('');
           }
           if(password!="" && email!=""){
                $.ajax({
                    url:'functions.php',
                    type:'post',
                    data:{email:email,password:password,login:1},
                    beforeSend : function()
                    {
                        $('#session_msg').hide();
                         $('#login_btn').attr("disabled","disabled");
                         $('#login_msg').html('<span class="alert alert-primary"> Attempting Login...</span>');

                    },
                    success:function(response){
                        if(response==1){
                            $('#login_msg').html('<span class="alert alert-success"><i class="fa fa-info-circle"></i> Login Successful !</span>');
                            window.location="index.php";
                        }
                        else if(response==2){
                            $('#login_msg').html('<span class="alert alert-danger"><i class="fa fa-info-circle"></i> Email/Password not valid  </span>');
                        }
                        else{
                            $('#login_msg').html('<span class="alert alert-danger"><i class="fa fa-info-circle"></i> Unable to Sign in</span>');
                        }
                    },
                    complete:function(response){
                        $('#login_btn').removeAttr("disabled");
                    }

                });
           }
        });
    </script>
</body>

</html>
