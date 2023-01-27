<html>
<head>

</head>
<style>

</style>

<?php 

	$i=1;
	$Digit=3;
	foreach ($data as $row)  
    {  
		
		echo " ".$row->Dept_name." ";
		echo " ".$row->Pgm_name." ";
		$pn=$row->Pgm_name;
		$dn=$row->Dept_name;
		echo " ".$row->Sem." ";
		echo " ".$row->Std_strength." ";
		$arr = explode(' ', trim($pn));
		
		$dnarr = explode(' ', trim($dn));
		$k=1;
		
		if(sizeof($dnarr)>1)
		{
			
			$dfirst_char = $dnarr[0][0]; 
			$dSec_char=$dnarr[1][0];
			$Duser=$dfirst_char+$dSec_char;
			$j=1;
			$k=1;?

				<?php
					while($j<=$row->Std_strength)
					{
						$password = mt_rand(100,999);
						echo "$j.";
						$un="D".$Duser.$password;
						echo $un;?><br>
					<?php
					$j++;
					}
		}
		else
		{
			
			$j=1;
			$k=1;
			echo "password";?><br>
				<?php
					while($j<=$row->Std_strength)
					{
						$password = mt_rand(100,999);
						$p1 = substr($dnarr[0],0,1);
						$p2 = substr($dnarr[0],3,2);
						$dletters=$p1.$p2;
						echo "$j.";
						$pw = strtoupper($dletters);
						$un="D".$pw.$password;
						echo $un;?><br>
					<?php
					$j++;
					}
			
		}
		
		if(sizeof($arr)>2)
		{
			$first_char = $arr[1][0]; 
			$Sec_char=$arr[2][0];
			$upchar=$first_char.$Sec_char;
			
				echo "Username";?><br>
				<?php
				while($k<=$row->Std_strength)
				{
					$username = mt_rand(100,999);
					echo "$k.";
					$un=$arr[0].$upchar.$username;
					echo $un;?><br>
					<?php
					$k++;
				}
		}
			
		else
			{		echo "Username";?><br>
					<?php
					while($k<=$row->Std_strength)
					{
					$username = mt_rand(100,999);
					$l1 = substr($arr[1],0,1);
					$l2=substr($arr[1],3,1);
					$letters=$l1.$l2;
					$us = strtoupper($letters);
					$un=$arr[0].$us.$username;
					echo $un;?><br>
					<?php
					$k++;
					}
			}
			
			
		
			
			?><br>
			
			<?php
			$i++;
            
		 }
?>  
		 
</html>