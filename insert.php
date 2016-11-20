<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="script.js" type="text/javascript"></script>

<?php
include_once "dbconnect.php";
if(isset($_POST['data'])){
$data=$_POST['data'];
  parse_str($data, $value);
  insert_data($con,$value);
}
function nullcheck($data){
if(isset($data) && $data!=null){
return $data;
}else{
return '';
}

}

function insert_data($con,$val){

echo $fname=nullcheck($val['fname']);
echo "</br>";
echo $lname=nullcheck($val['lname']);
echo "</br>";
echo $email=nullcheck($val['email']);
echo "</br>";
echo $pwd=md5(nullcheck($val['pass']));
echo "</br>";
echo $number=nullcheck($val['phone']);
echo "</br>";
echo $address=nullcheck($val['address']);
echo "</br>";
echo $fbook=nullcheck($val['facebook']);
echo "</br>";
echo $twitter=nullcheck($val['twitter']);
echo "</br>";
echo $gplus=nullcheck($val['gplus']);
echo "</br>";
echo $date=date("Y-m-d H:i:s");
echo "</br>";
//echo $ally="FALSE";  ==== WORKS 
// echo $ally=nullcheck($val['is_ally']);
// echo $ally="FALSE";
//$ally = TRUE; ======= WORKS

if (isset($_POST['is_ally'])) {
	$ally=$_POST['is_ally'];
	if ("TRUE" === $_POST['is_ally']) {
		$ally=TRUE;
	} else{
		$ally=FALSE;
	}
} else{
	$ally=FALSE;	
}


mysqli_query($con,"INSERT INTO user_tbl (FirstName,LastName,email,upassword,phone_number,address,twitter,facebook,googleplus,date,ally) 
VALUES ('$fname','$lname','$email','$pwd','$number','$address','$twitter','$fbook','$gplus','$date',$ally)");
mysqli_close($con);
}
?>

<!-- VALUES ('Andrew','david','test@test.com','asswpr','333-333-3334','4 bob lane','twitt','fb','gooooog',1) -->
