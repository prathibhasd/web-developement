<h1 align="center" style="text-decoration:underline"><a href="">Admin Dashboard</a></h1>
<br><br>
<h2><center>Welcome to Online Feedback System for Mangalore University</center></h2><br><br>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(Faculty_no) FROM faculty where P_G_Faculty='Permanent Faculty'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
	  
	  echo "<h2 style='color:green'>Total Number of Permanent Faculty : ".$row["COUNT(Faculty_no)"]."</h2>";	
  }
} 
else {
  echo "0 results";
}

$sql = "SELECT COUNT(Faculty_no) FROM faculty where P_G_Faculty='Guest Faculty'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
	  
	  echo "<h2 style='color:orange'>Total Number of Guest Faculty : ".$row["COUNT(Faculty_no)"]."</h2>";	
  }
} 
else {
  echo "0 results";
}


$sql = "SELECT SUM(Std_strength) FROM std_strength";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
	  
	  echo "<h2 style='color:green'>Total Number of Students : ".$row["SUM(Std_strength)"]."</h2>";	
  }
} 
else {
  echo "0 results";
}



$sql = "SELECT COUNT(C_no) FROM credential where Status='Submitted'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
	  
	  echo "<h2 style='color:orange'>Total Number Students given Feedback : ".$row["COUNT(C_no)"]."</h2>";	
  }
} 
else {
  echo "0 results";
}

$conn->close();

?>
