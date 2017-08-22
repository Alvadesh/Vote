<?php

include "db.php";

if($_POST['type']==1)
{
		$id=$_POST['id'];

		$query = mysqli_query($con,"SELECT * FROM tbl_voting WHERE id = '$id'");
		$row = mysqli_fetch_assoc($query);


		$count = $row['votes'];
$i;
		if($id==1)
		{
			
			for($i=0;$i<=99;$i++)
			{
			$sql="insert into tbl_voting  ( `first_name`, `last_name`, `email`, `votes`, `voter_name`, `voter_mail`, `voter_mobile`)values( 'Amazon', 'Web Services', 'amazon@gmail.com', '1', 'vishal','v.bhosale26@gmail.com', '8975779334') ";
			$result=mysqli_query($con,$sql) or (mysqli_error($con));
			}
		}
		else if($id==2)
		{
			for($i=0;$i<=110;$i++)
			{
			$sql="insert into tbl_voting ( `first_name`, `last_name`, `email`, `votes`, `voter_name`, `voter_mail`, `voter_mobile`)values( 'Microsoft Azure', 'Web Services', 'microsoft@gmail.com', '1', 'Tejas','tejas@gmail.com', '89757796633') ";
			$result=mysqli_query($con,$sql) or (mysqli_error($con));
			}
		}
		else if($id==3)
		{
			for($i=0;$i<=120;$i++)
			{
			  $sql="insert into tbl_voting  ( `first_name`, `last_name`, `email`, `votes`, `voter_name`, `voter_mail`, `voter_mobile`) values( 'Google Cloud Platform', 'Web Services', 'google@gmail.com', '1', 'Nikhil','Nikhil@gmail.com', '9665412532') ";
				$result=mysqli_query($con,$sql) or (mysqli_error($con));
			}
		}

		
			// if($result)
			// {
				// echo "success";
			// }
			
		$query1 = mysqli_query($con,"SELECT count(id)as votes,first_name FROM tbl_voting group by first_name order by first_name asc");
		while($row1 = mysqli_fetch_assoc($query1))
		{
			$info[]=array("id"=>$row1['first_name'],"votes"=>$row1['votes']);
		}
		echo json_encode($info);
}
else if($_POST['type']==2)
{
	$query = mysqli_query($con,"SELECT count(id)as votes,first_name FROM tbl_voting group by first_name order by first_name asc");
		while($row = mysqli_fetch_assoc($query))
		{
			$info[]=array("id"=>$row['first_name'],"votes"=>floatval($row['votes']));
		}
		echo json_encode($info);
}
?>