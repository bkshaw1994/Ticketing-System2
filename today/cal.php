

<?php
   /*
   * Collect all Details from Angular HTTP Request.
   */ 
    
    $to = $_GET["to"];
    $frm = $_GET["frm"];
    $t=$frm-$to;
    $temp=abs($t);

    if($temp<=3){
    	echo"11";
}
elseif($temp>3 && $temp<=7){
	$p=(11+($temp-3)*3);
	echo $p;

}
else
{
	echo"25";
}
    


?>