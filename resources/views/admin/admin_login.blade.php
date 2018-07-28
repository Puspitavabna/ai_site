
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" ><!-- Font-awesome-CSS --> 
<link rel='stylesheet' type='text/css' href="css/style.css" /><!-- style.css --> 
<link rel="stylesheet" href="{{asset('fonts.googleapis.com/css?family=Montserrat:400,700')}}" >
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Basic Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="js/jquery.min.js"></script>
    <script>$(document).ready(function(c) {
    $('.alert-close').on('click', function(c){
      $('.main-agile').fadeOut('slow', function(c){
        $('.main-agile').remove();
      });
    });   
  });
  </script>
</head>
<body>
  <h1>Admin Login Form</h1>
  <div class="main-agile">
    <div class="alert-close"> </div>
    <div class="content-wthree">
    <div class="circle-w3layouts"></div>
      <h2>Login</h2>
      <p class=" alert-danger"><?php
      $exception=Session::get('exception');

      if($exception){
     echo $exception;
     Session::put('exception',null);
      }
      ?></p>
      <form action="{{route('admin.post_login')}}" method="post">
        {{csrf_field()}}
                <div class="inputs-w3ls">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <input type="text" name="admin_email" placeholder="Email" required=""/>
                </div>
                <div class="inputs-w3ls">
                  <i class="fa fa-key" aria-hidden="true"></i>
                  <input type="password" name="admin_password" placeholder="Password" required=""/>
                </div>
                  <input type="submit" value="LOGIN"> 
                  <div class="wthree-text"> 
                    <ul> 
                      <li> <a href="#">Forgot password?</a> </li>
                    </ul>
                  </div>  
                </form>
    </div>
  </div>
  <div class="footer-w3l">
    <p class="agileinfo"> &copy; 2017 Basic Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
  </div>
</body>
</html>