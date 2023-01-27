<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/util.css">
<link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/new.css">


</head>
<style>

</style>

<?php 


// Create connection
$conn = mysqli_connect('localhost','root','','feedback');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


	$i=1;
	$Digit=3;
	foreach ($data2 as $row)  
    {  	
		
		?>
		<!--<div class="container-login100">
		<div class="wrap-login100"><table style="margin-left:auto;margin-right:auto;"><th><?php echo $row->Campus_name;?></th>
		<tr><td><?php echo "Department: ".$row->Dept_name;?></td>-->
		
		
		<td><?php 
		$dn=$row->Dept_name;
		$dc=$row->Dept_code;
		$cc=$row->Campus_code;
		
		foreach ($data1 as $row)
		{
			echo "Programme: ".$row->Pgm_name;?></td></tr>
		<tr>
		<td><?php echo "Sem: ".$row->Sem;?></td>
		<td><?php echo "Std Strength: ".$row->Std_strength;?></td></tr></table>
		<?php
		$pn=$row->Pgm_name;
		$s=$row->Sem;
		
		
		$pname= explode(' ', trim($pn));
		$dname = explode(' ', trim($dn));
		$k=1;
		
		if(sizeof($dname)>1)
		{
			?><table border=1 style="margin-left:auto;margin-right:auto;">
					<th style="width:70%">Username</th><th style="width:70%">Password</th>
					<?php
						
						$j=1;
						$k=1;
						while($j<=$row->Std_strength)
						{
							$dfirst_char = $dname[0][0]; 
							$dSec_char=$dname[1][0];
							$Duser=$dfirst_char.$dSec_char;
							$username=mt_rand(100,999);
							$un=$pname[0].$Duser.$username;
							
							$Pletters=substr($pname[1],0,4);
							$Pl=strtoupper($Pletters);
							$password=mt_rand(100,999);
							$pw="D".$Pl.$password;
							

							$sql="INSERT INTO credential(Dept_code,Pgm_name,Sem,Campus_code,Username,Password,Status)
									VALUES($dc,'$pn','$s',$cc,'$un','$pw','unused')";
								
								$retval = mysqli_query($conn, $sql);
								
							
							?>
							<tr><td><?php echo $un;?></td>
							<td><?php echo $pw;?></td>
							</tr>
							<?php
							$j++;
							
						}
		}
		else
			{		
			?><table border=1 style="margin-left:auto;margin-right:auto;">
					<th style="width:70%">Username</th><th style="width:70%">Password</th>
					
					<?php
					while($k<=$row->Std_strength)
					{
						$username = mt_rand(100,999);
						$l1 = substr($dname[0],0,3);
						$us = strtoupper($l1);
						$un=$pname[0].$us.$username;
						
						
						$password = mt_rand(100,999);
						$p1 = substr($pname[1],0,4);
						$pw = strtoupper($p1);
						$pw="D".$pw.$password;
						
						
						$sql="INSERT INTO credential(Dept_code,Pgm_name,Sem,Campus_code,Username,Password,Status)
									VALUES($dc,'$pn','$s',$cc,'$un','$pw','unused')";
								
							
							
								$retval = mysqli_query($conn, $sql);

						?>
						<tr><td><?php echo $un;?></td>
						<td><?php echo $pw;?></td>
						</tr>
						<?php
						$k++;
					}
			}
			?>
			
			<?php
			$i++;
        }    
	}
	
?> 
<input type="submit" value="export">


</div></div> 
</table>	
<br><br>


</html>