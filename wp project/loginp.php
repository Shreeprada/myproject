<html>
	<body>
		<?php
		$dis= mysql_connect("localhost","root","");
		mysql_select_db("class",$dis);
		session_start();

		if($_SERVER["REQUEST_METHOD"] == "POST") {
      $USN = mysqli_real_escape_string($db,$_POST['usn']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM login WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) 
	  {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
      }
	  else 
	  {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<head>
</head>
	<body>
		<?php
		 echo "hello";
		$dis = mysql_connect("localhost","root","");
		mysql_select_db("class",$dis);

		$name = $_POST["name"];
		$addr1 = $_POST["addr1"];
		$addr2 = $_POST["addr2"];
		$email = $_POST["email"];

$query = "INSERT INTO employee (name, add1, add2, email) VALUES ('$name','$addr1','$addr2','$email')";
mysql_query($query) or die(mysql_error($dis));
echo "inserted successfully";
		?>
		<form action ="disp.php" method = "POST">
<label>Enter name to search for : <input type = "text" name = "search" />
</label>
<br />
<input type = "submit" />
</form>

	</body>
</html>

