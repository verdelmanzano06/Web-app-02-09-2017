<?php 
	 require("anyco_ui.inc");
	 $conn = oci_connect('hr', 'hr', 'localhost/XE');
	 ui_print_header('Login Page');
 ?>

 <form method="post" action="#">
 	<label>User: </label><input type="text" name="username"/> <br>
 	<label>Pass: </label><input type="password" name="password" /> <br>
 	<input type="submit" name="submit" value="Login"/>
 </form>

 <?php 
 	if(isset($_POST['submit'])) {
 		$username = addslashes($_POST['username']);
 		$password = addslashes($_POST['password']);

 		//SQL Queries
 		$query = "select * from EMPLOYEES where EMAIL ='".$password."' AND EMPLOYEE_ID='".$username."'";

 		//Run the query using parse
 		$run_query = oci_parse($conn, $query);

 		//Execute the query
 		$execute = oci_execute($run_query);

 		$arr = oci_fetch_array($run_query);
 		//Check num rows
 		$check_row = oci_num_rows($run_query);

 		while (($row = oci_fetch_array($run_query, OCI_ASSOC + OCI_RETURN_NULLS)) != False) {
 		}
 			if ($check_row == 0) {
 				echo "<script>alert('Your username or password is invalid! Please try again!')</script>";
 			} else {
 				header("Location: anyco.php");
 			}
 		}
 

 	ui_print_footer(date('Y-m-d H:i:s'));
  ?>

