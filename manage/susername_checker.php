<?php

	include('db_conn.php');	

	if(isset($_POST['user_name'])) {
		$user_name = $_POST['user_name'];
		$query = "SELECT count(*) as cnt FROM users WHERE username=$user_name";
		$result = mysqli_query($conn,$query);	
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		if($row['cnt']== 0){
			echo '<span class="text-success">Username <b>'.$user_name.'</b> is available!</span>';
		} else {
			echo '<span class="text-danger">Username <b>'.$user_name.'</b> is already taken!</span>';
		}
	}

?>