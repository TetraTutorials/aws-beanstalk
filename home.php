<html>
<title>Simple Database Application using PHP</title>
<h1>Simple Database Application using PHP</h1>
<script type="text/javascript">
function validateForm()
{ var un=document.form1.username.value;
  var pd=document.form1.psd.value;
  if(un=="" && pd!="")
  {	  
  document.getElementById("errorMessage").innerHTML="Please enter username";return false;	}
  if(un!="" && pd=="")
  {	   document.getElementById("errorMessage").innerHTML="Please enter password"; return false;	}
  if(un=="" && pd=="")
	  {	 document.getElementById("errorMessage").innerHTML="Please enter username & password";return false;	}
	}
</script>
<body>

<?PHP 
if($_REQUEST['action']=='edit')
{
?>
<form id="form1" name="form1" method="post" action="update.php?id=<?PHP echo $_REQUEST['id']; ?>" onSubmit="return validateForm();">
<table width="200" border="1">
  <tr>
    <td>Username</td>
    <td><label for="username"></label>
       <input type="text" name="username" id="username" value="<?PHP echo $_REQUEST['un']; ?>" /></td>
   </tr>
  <tr>
    <td>Password</td>
    <td><label for="psd"></label>
      <input type="text" name="psd" id="psd" value="<?PHP echo $_REQUEST['pd']; ?>" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
    <td><input type="reset" name="Reset" id="Reset" value="Reset" /></td>
  </tr>
</table>

</form>
<?PHP
}
else
{
?>
<form id="form1" name="form1" method="post" action="insert.php" onSubmit="return validateForm();">
<table width="200" border="1">
  <tr>
    <td>Username</td>
    <td><label for="username"></label>
       <input type="text" name="username" id="username" value="" /></td>
   </tr>
  <tr>
    <td>Password</td>
    <td><label for="psd"></label>
      <input type="text" name="psd" id="psd" value="" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
    <td><input type="reset" name="Reset" id="Reset" value="Reset" /></td>
  </tr>
</table>

</form>
<?PHP } ?>
<p id="errorMessage" style="color:#C00; font-style:italic;"></p>

<?php
$servername = "tetranoodle.cksjypy9h04e.us-east-1.rds.amazonaws.com";
$username = "tetranoodle";
$password = "tetranoodle";
$dbname = "tetranoodle";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, username, psd FROM tbllogin";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo " ID :{$row['id']}  <br> ".
         " NAME : {$row['username']} <br> ".
         " PASSW : {$row['psd']} <br> ".
         "--------------------------------<br>";

    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>

</body>
</html>
