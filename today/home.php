<?php
session_start();
if ( isset( $_SESSION["userid"] ) ) {
    header( "Location:http://localhost/today/ticket.php" );
} //isset( $_SESSION["userid"] )
error_reporting( E_ALL | E_WARNING | E_NOTICE );
ini_set( 'display_errors', TRUE );
include( "import/db.php" );
if ( isset( $_POST['submit'] ) ) {
    $name     = $_POST['name'];
    $password = $_POST['password'];
    $sql      = "select * from login where name='$name' and password='$password'";
    if ( $result = $mysqli->query( $sql ) ) {
        $row = $result->fetch_row();
        if ( $row[1] == $name ) {
            if ( $row[2] == $password ) {
                $_SESSION["userid"] = $row[1];
                header( "Location:http://localhost/today/ticket.php" );
                exit( );
            } //$row[2] == $password
            else {
                printf( "wrong user name and password" );
                exit( );
            }
        } //$row[1] == $name
        else {
            printf( "wrong user name and password" );
            exit( );
        }
    } //$result = $mysqli->query( $sql )
    $mysqli->close();
} //isset( $_POST['submit'] )
// reister 
if ( isset( $_POST['register'] ) ) {
    //echo "<script>alert('oo hello')</script>";
    $name       = $_POST['rname'];
    $email      = $_POST['email'];
    $rpassword  = $_POST['rpassword'];
    $repassword = $_POST['repassword'];
    $id         = md5( uniqid( $name, true ) );
    $sql        = "INSERT INTO `regi`.`login` (`id`, `name`, `password`, `email`) VALUES (MD5('$name'),'$name','$rpassword','$email');";
    if ( !$mysqli->query( $sql ) ) {
        echo '
<script>   document.getElementById("msg").innerHTML ="$mysqli->errno"; </script>

';
    } //!$mysqli->query( $sql )
    else {
        echo '
<script>   document.getElementById("msg").innerH="successfully registered"; </script>

';
    }
    $mysqli->close();
} //isset( $_POST['register'] )
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Material Login Form</title>
    
    
    <link rel="stylesheet" href="css_login/reset.css">

    <link rel='stylesheet prefetch' href='css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='css/font.css'>


        <link rel="stylesheet" href="css_login/style.css">

    <script type="text/javascript" src="js/castom.js"></script>
    
    <script>

function login() {

  username=document.getElementById('name').value;
  password=document.getElementById('password').value;
   //alert(username);  
   $( "form:login" ).submit();
} 

    </script>
    <style>
    .sub{
          border: 2px solid #ed2553;
          outline: 0;
  cursor: pointer;
  position: relative;
  display: inline-block;
  background: 0;
  width: 240px;
  border: 2px solid #e3e3e3;
  padding: 20px 0;
  font-size: 24px;
  font-weight: 600;
  line-height: 1;
  text-transform: uppercase;
  overflow: hidden;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}
.sub {
   border: 2px solid #ed2553;
  position: relative;
  z-index: 1;
  color: #ddd;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}
.sub:hover{

   background-color: #ed2553;
   color: white;
}


    </style>
    
  </head>

  <body>

    
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>E-AD SYSTEM FOR CAR</h1><span><i class='fa fa-code'></i> by <a href='#'>DEV,BABI AND TEAM</a></span>
</div>
<div class="rerun"><a href="">Return Page</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form name="login" method="POST">
      <div class="input-container">
        <input type="text" id="name" required="required" name="name"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="password" name="password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        
<input   class ="sub"type="submit" name="submit" value="Go">
      </div>
      <div class="footer" id="msg"></div>
    </form>
  </div>
 
  
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form method="POST">
      <div class="input-container">
        <input type="email" id="email"  name="email"required="required"/>
        <label for="Email">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="name" name="rname" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" name="rpassword" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" name="repassword" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <input   class ="sub" type="submit" name="register" value="register">

      </div>
    </form>
  </div>
</div>
<!-- Portfolio<a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a>
 CodePen-<a id="codepen" href="http://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a>-->
    <script src='js/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
