<?php
function authenticate_user()
{
	$faildhtml = $_SERVER['HTTP_REFERER'];
	header("Location:$faildhtml");
	
}
date_default_timezone_set('Asia/Shanghai');//设置时区
$year=date('Y');
$month=date('m');
$day=date('d');
$hour=date('G');
$fen=date('i');
$second=date('s');
echo $year.'-'.$month.'-'.$day.' '.$hour.':'.$fen.':'.$second;
printf("\n");


	$name = $_POST['Name'];
    $passWord = $_POST['PassWord'];
	//printf("%s\n",$name);
	//printf("%s\n",$passWord);
if(ISSET($name) && ISSET($passWord))
{
	$mysql_server="182.254.221.249";
	$mysql_user="test";
	$mysql_password="199312";
	$mysql_database="zpDB";
	
	$con = new mysqli();
	
	$con->connect($mysql_server,$mysql_user,$mysql_password, $mysql_database);
	if($con->connect_error)
	{
		echo "connect fiald";
		printf("\n");
	}else{
		echo "connect success\n";
		//printf("\n");
		$stmt = $con->prepare("SELECT userName,passWord FROM logins where userName=? and passWord = ?");
		$stmt->bind_param('ss',$name,$passWord);
		$stmt->execute();
		$stmt->store_result();
		
		if($stmt->num_rows ==0)
		{
			authenticate_user();
		}else{
			echo "login success \n";
		}
				
		
	}
}else{
	echo "name or passwd is null\n";
	authenticate_user();
}
    
	
?>