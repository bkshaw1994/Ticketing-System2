
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 {
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 {
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 {
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 {
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Me</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">WHO</a></li>
        <li><a href="#">WHAT</a></li>
        <li><a href="#">WHERE</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Who Am I?</h3>
  <img src="bird.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3>I'm an adventurer</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">BOOK TICKET</h3>
    <div >
       
          <form method="post" action="#"> 
            
             <level> FROM</level> <select name="frm" id="frm"> 

                <?php


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Accathon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM tb_stn_list";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row["stn_id"].'">'.$row["stn_name"].'</option>';
    }
    
} else {
    echo "0 results";
}

                ?>

            </select>
             <level> TO</level> <select name="to" onchange="showHint()"id="to">
                  <?php

                  $sql = "SELECT * FROM tb_stn_list";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row["stn_id"].'">'.$row["stn_name"].'</option>';
    }
    
} else {
    echo "0 results";
}


                  ?>
             </select> 

             
 <input type="hidden"  id="price"  name="pric"> 
          price is :  <span id="da"></span>

             
              <input type="submit" name="submit"/>
              
              


          </form>
        </div>

 
  </div>
 <script>
function showHint() {
   var toe= document.getElementById("to").value;
       var frme= document.getElementById("frm").value;
        $.get("cal.php", { to:toe, frm:frme }, function(data, status){
        document.getElementById("price").value=data;
        document.getElementById("da").innerHTML=data;
        //alert(data);
    });
       // e.consle("oir"+frm);
  
}
</script>


<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">
  <h3 class="margin">get your tickets</h3><br>
  <div class="row">

     <?php
    if(isset($_POST['submit']))
{
   $frm=$_POST['frm'];
   $to=$_POST['to'];
   $prc=$_POST['pric'];
   function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$pnr=generateRandomString(5);
  
   $sql = "INSERT INTO `Accathon`.`tb_ticket` (`tick_id`, `tick_stn_from`, `tick_stn_to`,  `tick_time`, `tick_date`, `tick_price`) VALUES ('$pnr', '$frm', '$to', CURTIME(),CURDATE(), $prc)";
   if ($conn->query($sql) === TRUE) {
    $t=time();
    echo '<table  border="1">
    <tr >
    <th>PNR</th>
    <th>From</th>
    <th>To</th>
    <th>Date of boading </th>
    <th>Price</th>
   
    </tr>
    <tr>

    <td>$pnr</td>
    <td>$frm</td>
    <td>$to</td>
    <td>'.date("Y/m/d").'</td>
    <td>$prc</td>

    </tr>
    </table>  
    
    
    <form>
    <input type="hidden"  value="'.$pnr.'" name="t_no">
     <input type="hidden"  value="'.$to.'" name="to_name">
      <input type="hidden"  value="'.$from.'" name="From_name">
       <input type="hidden"  value="'.$prc.'" name="From_name">
    <input>
    <input type="submit" name="print">
    
    </form>';






} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}


        



    ?>
    <?php 

	$f_name=$_POST['From_name'];
	$l_name=$_POST['to_name'];
	$t_date=$_POST['date'];
	$t_price=$_POST['z_subject'];
	$t_time=$_POST['time'];
	$t_number=$_POST['t_no'];
	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage(); 
	$pdf->SetFont("Arial","B",16);
	$pdf->Cell(50,10,"Welcome To Bangalore Metro",0,1);
	$pdf->Cell(50,10,"Ticket No.:",0,0);
	$pdf->Cell(50,10,$t_number,0,1);
	$pdf->Cell(50,10,"DOJ:",0,0);
	$pdf->Cell(50,10,$t_date,$t_time,0,0);
	$pdf->Cell(50,10,$t_time,0,1);
	$pdf->Cell(50,10,"From:",0,0);
	$pdf->Cell(50,10,$f_name,0,0);
	$pdf->Cell(50,10,"To:",0,0);
	$pdf->Cell(50,10,$l_name,0,1);
	$pdf->Cell(50,10,"Price:",0,0);
	$pdf->Cell(50,10,$t_price,0,1);
	$pdf->Cell(50,10,"Happy Journey",0,1);
	$pdf->Cell(50,10,"Thank You",0,1);
	$pdf->Output();

	
?>

    
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Bootstrap Theme Made By <a href="http://www.w3schools.com">www.w3schools.com</a></p>
</footer>

</body>
</html>
