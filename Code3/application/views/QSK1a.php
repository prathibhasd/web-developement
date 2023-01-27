

  <html>
<head>
  <title>Teachers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
 
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<script src="http://localhost/Code3/js/sweetalert.min.js"></script>

  <link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/util.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>

</style>


<body>
<a href="<?= base_url() ?>Crud/student" style="float: right;font-size:26px;">Logout <i class="fa fa-sign-out"></i></a>
<div class="limiter"> 
<div class="container-login100">
<div class="wrap-login100">
<h1><center>ಮಂಗಳೂರು ವಿಶ್ವವಿದ್ಯಾನಿಲಯ</center><h1>
<h2><center>ಪ್ರಶ್ನಾವಳಿ ಸಂಖ್ಯೆ -೧</center></h2>
<h3><center> ಕೋರ್ಸ್/ಪತ್ರಿಕೆಯ ಕುರಿತು ವಿದ್ಯಾರ್ಥಿಗಳಿಂದ  ಹಿಮ್ಮಾಹಿತಿ</center></h3>
<h4><center>(ಪ್ರತಿ ಪತ್ರಿಕೆ /ಕೋರ್ಸಿಗೆ ಸಂಬಂದಿಸಿದಂತೆ ಭರ್ತಿ ಮಾಡುವುದು)</center></h4></h4>

<?php    
    $Username   = $this->session->userdata('username');
         foreach ($user as $row)  
         {  ?>
       <h3 style="color:Black;">ಪ್ರೊಗ್ರಾಂ:<input type="text" name="Pname" id="Pname" value="<?php echo $row->Pgm_name?>"></h3>
      <h3 style="color:Black;">ಚತುರ್ಮಾಸ/ ಅವಧಿ/ವರ್ಷ:<input type="text" name="Sem" id="Sem" value="<?php echo $row->Sem?>"></h3>
      <h3 style="color:Black;"><input type="hidden" name="User" id="User" value="<?php echo $Username?>"></h3>
	  <h3 style="color:Black;"><input type="hidden" name="campus" id="campus" value="<?php echo $row->Campus_code?>"></h3>
  <?php
          }  
         ?> 
     
     <?php   
         foreach ($dname as $row)  
         {  ?>
      <h3 style="color:Black;">ವಿಭಾಗ:<input type="text" name="Dname" id="Dname" value="<?php echo $row->Dept_name?>"></h3>
  <?php
          }  
         ?> 

<br>
<p><b>ಸೂಚನೆ:ಇದು ನಿಮ್ಮಿಂದ ಪಡೆಯುವ ಅತ್ಯಂತ ರಹಸ್ಯ ಹಿಮ್ಮಾಹಿತಿ.  ಈ ಪ್ರಶ್ನಾವಳಿಯಲ್ಲಿ ನಿಮ್ಮ ಯಾವುದೇ ಹೆಸರು/ಗುರುತು ಇಲ್ಲದಂತೆ ಭರ್ತಿಮಾಡಿ.  ವಿಶ್ವವಿದ್ಯಾನಿಲಯವು ಅಗತ್ಯದ ಎಲ್ಲಾ ವಿವರಗಳನ್ನು ಅತ್ಯಂತ ಗಮನವಿಟ್ಟು ಮತ್ತು ಗೌಪ್ಯತೆಯಿಂದ ಪರಿಶೀಲಿಸುತ್ತದೆ.</b></p>
<p><b>ಕೆಳಕಂಡ ವಿಷಯಗಳಿಗೆ ೪ ಮೌಲ್ಯಾಂಕಗಳ ನೆಲೆಯಲ್ಲಿ ಕೋರ್ಸ್/ಪತ್ರಿಕೆಗಳ  ಮೌಲ್ಯಾಂಕಗಳನ್ನು ನಿರ್ಧರಿಸಿ.</b></p>

<table style="width:100%">
  <tr>
     <th>A<br>ಅತ್ಯುತ್ತಮ</th>
    <th>B<br>ಉತ್ತಮ</th>
    <th>C<br>ತೃಪ್ತಿಕರ</th>
    <th>D<br>ಅತೃಪ್ತಿಕರ</th>
  </tr>
 
</table>
<br>
<h3 style="color:Black;">Paper/Course:  </h3>
    
<form name='Feedback' method="POST" style="color:Black;" action="" autocomplete="off">
<?php 
 $i=1;     
         foreach ($course as $row)  
         {  
      echo "$i.";
      echo " ".$row->course_name."(".$row->course_code.")"."";
      echo " ";
      $i++;
            
      }  
         ?>  
<br>  <br>   
<table>
  <tr>
  <th rowspan="2">Sl. No.</th>
  <th rowspan="2" width="800px" word-wrap="break-word">Parameters</th>
  <th colspan="<?Php echo $i?>">ಪತ್ರಿಕೆಗಳು/ಕೋರ್ಸ್</th>
 </tr>
 <tr>
 <?php
$j=1;
foreach ($course as $row)  {
?>
<td><input type="checkbox" id="chkpass<?php echo $j?>" onclick="Enable('<?php echo $j?>')" value="<?php echo "".$row->course_name." " ?>"><?php echo "".$row->course_code." " ?></td>
<h3 style="color:Black;"><input type="hidden" name="code" id="code<?php echo $j?>" value="<?php echo $row->course_code?>"></h3>
<?php
$j++;
}
?>
 </tr>
 <tr>
    <td>1.</td>
  <td style="text-align:left">ಪಠ್ಯಕ್ರಮದ ಗಹನತೆ</td>
  <?php
  $P1=$j;
  $m1=1;
  while($P1-1>0) {
  ?>
  <td><input type="text" name="P1a" id="P1a<?php echo $m1?>" size="7" onkeyup="validate(this);" disabled></td>
  <?php
    $P1--;
    $m1++;
  }
  ?>
 </tr>
 <tr>
  <td style="text-align:center">2.</td>
  <td style="text-align:left">ಯಾವ ಪ್ರಮಾಣದಲ್ಲಿ ಪಠ್ಯಕ್ರಮವನ್ನು ಪೂರ್ಣಗೊಳಿಸಲಾಗಿದೆ</td>
  <?php
  $P2=$j;
  $m2=1;
  while($P2-1>0) {
  ?>
  <td><input type="text" name="P2a" id="P2a<?php echo $m2?>" size="7" onkeyup="validate(this);" disabled></td>
  <?php
    $P2--;
    $m2++;
  }
  ?>
 </tr>
 <tr>

  <td style="text-align:center">3.</td>
  <td style="text-align:left">ಪಠ್ಯಕ್ರಮದ ಅನ್ವಯಿಕತೆ/ಪ್ರಸ್ತುತತೆ</td>
  <?php
  $P3=$j;
  $m3=1;
  while($P3-1>0) {
  ?>
  <td><input type="text" name="P3a" id="P3a<?php echo $m3?>" size="7" onkeyup="validate(this);" disabled></td>
  <?php
    $P3--;
    $m3++;
  }
  ?>
 </tr>
  <tr>
  <td style="text-align:center">4.</td>
  <td style="text-align:left">ತಿಳುವಳಿಕೆ,ಪರಿಕಲ್ಪನೆ ಮತ್ತು ಕೌಶಲ್ಯಗಳಿಗೆ ಸಂಬಂಧಿಸಿದಂತೆ ಕೋರ್ಸಿನ ಕಲಿಕೆಯ ಮೌಲ್ಯ.</td>
  <?php
  $P4=$j;
  $m4=1;
  while($P4-1>0) {
  ?>
  <td><input type="text" name="P4a" id="P4a<?php echo $m4?>" size="7" onkeyup="validate(this);" disabled></td>
  <?php
    $P4--;
    $m4++;
  }
  ?>
 </tr>
 <tr>
  <td style="text-align:center">5.</td>
  <td style="text-align:left">ನಿಗದಿಪಡಿಸಿದ ಓದುವ ಸಾಮಾಗ್ರಿಗಳ ಕುರಿತಂತೆ ಸ್ಪಷ್ತತೆ ಮತ್ತು ಪ್ರಸ್ತುತತೆ</td>
  <?php
  $P5=$j;
  $m5=1;
  while($P5-1>0) {
  ?>
  <td><input type="text" name="P5a" id="P5a<?php echo $m5?>" size="7" onkeyup="validate(this);" disabled></td>
  <?php
    $P5--;
    $m5++;
  }
  ?>
 </tr>
 <tr>
  <td style="text-align:center">6.</td>
  <td style="text-align:left">ಹೆಚ್ಚುವರಿ ಅಧ್ಯಯನ ಸಾಮಾಗ್ರಿಗಳ ಪ್ರಸ್ತುತತೆ</td>
  <?php
  $P6=$j;
  $m6=1;
  while($P6-1>0) {
  ?>
  <td><input type="text" name="P6a" id="P6a<?php echo $m6?>" size="7" onkeyup="validate(this);" disabled></td>
  <?php
    $P6--;
    $m6++;
  }
  ?>
 </tr>
 <tr>
  <td style="text-align:center">7.</td>
  <td style="text-align:left">ಒಟ್ಟಾರೆ ಮೌಲ್ಯಾಂಕ</td>
  <?php
  $P7=$j;
  $m7=1;
  while($P7-1>0) {
  ?>
  <td><input type="text" name="P7a" id="P7a<?php echo $m7?>" size="7" onkeyup="validate(this);" disabled></td>
  <?php
    $P7--;
    $m7++;
  }
  ?>
 </tr>
 
 <tr>
    <td colspan="10" align="center"><button type="button" onclick="myFunction('<?php echo $j-1?>')" id="save">Submit</button>
  </tr>
</table>
</div>
</div>
</div>
</form>
<script type="text/javascript">
  function validate(input){
	   let x = input.value;
	   let y = window.event.keyCode;
		if (y == 16 || y == 20 || x == "a" || x == "b" || x == "c" || x == "d") {
			input.value = input.value.replace(/\W|\d/g, '').substr(0, 1).toUpperCase();
			return true;
		}
		else if (y != 65 && y != 66 && y != 67 && y != 68)
		{
			alert("ದಯವಿಟ್ಟು ಸರಿಯಾದ ಆಯ್ಕೆಯನ್ನು ನಮೂದಿಸಿ (A, B, C, D)");
			input.value ="";
			return false;
		}
		input.value = input.value.replace(/\W|\d/g, '').substr(0, 1).toUpperCase();
  }
  
  
  function Enable(a)
	{

 			if(document.getElementById("chkpass"+a).checked) 
 			{
					document.getElementById("P1a"+a).disabled=false;
					document.getElementById("P2a"+a).disabled=false;
					document.getElementById("P3a"+a).disabled=false;
					document.getElementById("P4a"+a).disabled=false;
					document.getElementById("P5a"+a).disabled=false;
					document.getElementById("P6a"+a).disabled=false;
					document.getElementById("P7a"+a).disabled=false;
					
 			}
 			else
 			{
					document.getElementById("P1a"+a).value="";
					document.getElementById("P1a"+a).disabled=true;
					document.getElementById("P2a"+a).value="";
					document.getElementById("P2a"+a).disabled=true;
					document.getElementById("P3a"+a).value="";
					document.getElementById("P3a"+a).disabled=true;
					document.getElementById("P4a"+a).value="";
					document.getElementById("P4a"+a).disabled=true;
					document.getElementById("P5a"+a).value="";
					document.getElementById("P5a"+a).disabled=true;
					document.getElementById("P6a"+a).value="";
					document.getElementById("P6a"+a).disabled=true;
					document.getElementById("P7a"+a).value="";
					document.getElementById("P7a"+a).disabled=true;
 			}
 			
 		

	}
 
	function myFunction(a)
	{
		ans=confirm('ನೀವು ಫಾರ್ಮ್ ಅನ್ನು ಸಲ್ಲಿಸುವುದು ಖಚಿತವೇ?...')
		if(ans)
		{
			var count=a;
			
			var i;
			var j;
			var chkArray=[];
			var status=0;
			var chresult=0;
			var k=0;
			var l=1;
			
			var deptname=document.getElementById("Dname").value;
			var username=document.getElementById("User").value;
			var pgmname=document.getElementById("Pname").value;
			var sem=document.getElementById("Sem").value;
			var ccode=document.getElementById("campus").value;
			
			for(i=1;i<=count;i++)
			{ 
				chkArray[l] = [];
				
					if(document.getElementById("chkpass"+i).checked) 
					{
						j=0;
						chresult=1;
						
						var chkval=document.getElementById("chkpass"+i).value;
						var code=document.getElementById("code"+i).value;
						
						
						chkArray[l][j]=chkval;
						j++;
						
						chkArray[l][j]=code;
						j++;
						
						var F1=document.getElementById("P1a"+i).value;
						var F2=document.getElementById("P2a"+i).value;
						var F3=document.getElementById("P3a"+i).value;
						var F4=document.getElementById("P4a"+i).value;
						var F5=document.getElementById("P5a"+i).value;
						var F6=document.getElementById("P6a"+i).value;
						var F7=document.getElementById("P7a"+i).value;
						
						
						if(F1=='' && F2=='' && F3=='' && F4=='' && F5=='' && F6=='' && F7=='')
						{
							status=0;
							alert ('ದಯವಿಟ್ಟು ಮೌಲ್ಯಗಳನ್ನು ನಮೂದಿಸಿ');
							break;
							
						}
						else
						{
							status=1;
							k++;
								
								if(F1=='')
								{
									chkArray[l][j]='X';
									j++;
								}
								else
								{
									chkArray[l][j]=F1;
									j++;
								}
								
								if(F2=='')
								{
									chkArray[l][j]='X';
									j++;
								}
								else
								{
									chkArray[l][j]=F2;
									j++;
								}
								
								if(F3=='')
								{
									chkArray[l][j]='X';
									j++;
								}
								else
								{
									chkArray[l][j]=F3;
									j++;
								}
								
								if(F4=='')
								{
									chkArray[l][j]='X';
									j++;
								}
								else
								{
									chkArray[l][j]=F4;
									j++;
								}
								
								if(F5=='')
								{
									chkArray[l][j]='X';
									j++;
								}
								else
								{
									chkArray[l][j]=F5;
									j++;
								}
								
								
								if(F6=='')
								{
									chkArray[l][j]='X';
									j++;
								}
								else
								{
									chkArray[l][j]=F6;
									j++;
								}
								
								if(F7=='')
								{
									chkArray[l][j]='X';
									j++;
								}
								
								else
								{
									chkArray[l][j]=F7;
									j++;
								}
							l++;	
						}
				}
				
					
			
			}
			
 			if(status==1)
			{
				$.ajax({
									url:'courseinsert',
									type:"POST",
									data:{
										feedbacks: chkArray,
										num:k,
										user:username,
										dname:deptname,
										pname:pgmname,
										sem:sem,
										code:code,
										campcode:ccode
									},
									success:function(result)
									{
										//console.log(result);
										 swal({
											title: "ಉಳಿಸಲಾಗಿದೆ!",
											text: "ಪ್ರತಿಕ್ರಿಯೆಯನ್ನು ಯಶಸ್ವಿಯಾಗಿ ಉಳಿಸಲಾಗಿದೆ!",
											icon: "success"
										}).then(function() {
											window.location = "Pteachersform";
										});
									}
								});
				
			}
			if(chresult==0)
			{
				alert ('ದಯವಿಟ್ಟು ಕೋರ್ಸ್ ಆಯ್ಕೆಮಾಡಿ');
			}
	}
			
}

		window.history.forward();
        function noBack() {
            window.history.forward();
        }
</script>
</body>
</html>
