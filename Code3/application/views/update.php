<?php 


// Create connection
$conn = mysqli_connect('localhost','root','','feedback');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM department";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  $name=$row["Dept_name"];
	  $code=$row["Dept_code"];
    $sql2 = "UPDATE programme SET Dept_name='$name' WHERE Dept_code=$code";
	if(mysqli_query($conn, $sql2)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
}
  }
}
								

?>