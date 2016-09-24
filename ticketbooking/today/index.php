
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



<
<!-- First Container -->
<div class="container-fluid bg-1 text-center text-font-size:20px">
  <h1 class="margin" >Bangalore Metro Ticketing System</h1>
  <h3>Welcome to Bangalore Metro!</h3>

</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">BOOK TICKET</h3>
    <div >
       
          <form method="post" action="#"> 
            
             <level> FROM</level> 

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
    
    $ru=$row["stn_id"];
    echo'<select name="frm" onchange="scheck(this)" id="frm">';
    echo'<option>select station   </option>';
    
    
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row["stn_id"].'" id="'.$row["stn_id"].'" >'.$row["stn_name"].'</option>';
    }
    
} else {
    echo "0 results";
}

                ?>

            </select>
             <level> TO</level> <select name="to" onchange="showHint()"id="to">
               <option>select station   </option>
                  <?php

                  $sql = "SELECT * FROM tb_stn_list";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row["stn_id"].'" id="r'.$row["stn_id"].'" >'.$row["stn_name"].'</option>';
    }
    
} else {
    echo "0 results";
}


                  ?>
             </select> 
<script>

function scheck(var asid){
$(asid).hide();

}


</script>
             
 <input type="hidden"  id="price"  name="pric"> 
          price is :  <span id="da"></span>

             
              <center><input type="submit" style="width:20%;" name="submit"/></center>
              
              


          </form>
        </div>

 
  </div>
 <script>
function showHint() {

   var toe= document.getElementById("to").value;
       var frme= document.getElementById("frm").value;
       if(toe!=frme){
        $.get("cal.php", { to:toe, frm:frme }, function(data, status){
        document.getElementById("price").value=data;
        document.getElementById("da").innerHTML=data;
        //alert(data);
    });}
    else{
    alert("Both station  can't be same  (TO and From)");
    }
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

$arr=array("Baiyappanahalli","SwamiVivekananda Rd","Indiranagar","Halasuru","Trinity","M G Road","Cubbon Park","Vidhana Soudha","Sir M.Visveshwarya","Majestic");
   $frm=$_POST['frm'];
   $to=$_POST['to'];
   $prc=$_POST['pric'];
   function generateRandomString($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$pnr=generateRandomString(5);
   
   $sql = "INSERT INTO `Accathon`.`tb_ticket` (`tick_id`, `tick_stn_from`, `tick_stn_to`, `tick_time`, `tick_date`, `tick_price`) VALUES ($pnr, $frm, $to,CURTIME(),CURDATE(),$prc)";
   
   
   if ($conn->query($sql) === TRUE) {
    echo "<center><table  border='1'>
    <tr >
    <th>PNR</th>
    <th>From</th>
    <th>To</th>
    <th>Date of boading </th>
    <th>Price</th>
   
    </tr>
    <tr>

    <td>$pnr</td>
    <td>".$arr[$frm-1]."</td>
    <td>".$arr[$to-1]."</td>
    <td>".date("Y-m-d")."</td>
    <td>$prc</td>

    </tr>
    </table><center>     ";
    echo'
    		<form method="POST" action="print.php">
    	 <p>
        <input type="hidden"  value="'.$arr[$frm-1].'" name="From_name">
    </p>
    <p>
        <input type="hidden" value="'.$arr[$to-1].'" name="to_name">
    </p>
    <p>
          <input type="hidden" value="'.$prc.'" name="z_subject">
    </p>
    <p>
     <input type="hidden" value="'.date("Y-m-d").'" name="date" >
    </p>
	<p>
        
    </p>
	<p>
         <input type="hidden" value="'.$pnr.'" name="t_no" >
    </p>
    <p>
         <center><input type="submit" style="width:20%;" name="submit"/></center>
    </p>
</form>
    		
    		
    		
    		</form>
    		
    
    ';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}


        



    ?>
    
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  
</footer>

</body>
</html>
