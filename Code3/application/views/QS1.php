<html>
<head>
  <title>Paper/Course</title>
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
<div class="container-login100" style="color:#dc143c;">
<div class="wrap-login100">
<h1 style="color:Black;"><center>MANGALORE UNIVERSITY</center><h1>
<h2 style="color:Black;"><center>Questionnaire No.1</center></h2>
<h3 style="color:Black;"><center>Feedback from Students on Course/Paper</center></h3>
<h4 style="color:Black;"><center>(To be filled seperately for paper/course)</center></h4>


<?php 	 
		$Username   = $this->session->userdata('username');
         foreach ($user as $row)  
         {  ?>
			<h3 style="color:Black;">Programme:<input type="text" name="Pname" id="Pname" value="<?php echo $row->Pgm_name?>"></h3>
			<h3 style="color:Black;">Semester:<input type="text" name="Sem" id="Sem" value="<?php echo $row->Sem?>"></h3>
			<h3 style="color:Black;"><input type="hidden" name="User" id="User" value="<?php echo $Username?>"></h3>
			<h3 style="color:Black;"><input type="hidden" name="campus" id="campus" value="<?php echo $row->Campus_code?>"></h3>
  <?php
          }  
         ?> 
		 
		 <?php 	 
         foreach ($dname as $row)  
         {  ?>
			<h3 style="color:Black;">Department:<input type="text" name="Dname" id="Dname" value="<?php echo $row->Dept_name?>"></h3>
  <?php
          }  
         ?> 

<br>
<p style="color:Black;"><b>NOTE:This is a confidential feedback sought from you. Please do not leave any of your identity while filling up this proforma. The University will process the details with utmost care and confidentiality.</b></p>
<p style="color:Black;"><b>Please rate the Teacher on the following attribute using 4-points scale shown.</b></p>

<table style="width:100%">
  <tr>
    <th>A<br>Very Good</th>
    <th>B<br>Good</th>
    <th>C<br>Satisfactory</th>
    <th>D<br>Unsatisfactory</th>
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
<br>	<br>	 
<table>
  <tr>
  <th rowspan="2">Sl. No.</th>
  <th rowspan="2" width="800px" word-wrap="break-word">Parameters</th>
  <th colspan="<?Php echo $i?>">Select the Paper/Course</th>
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
  <td style="text-align:left">Depth of the course content</td>
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
  <td style="text-align:left">Extent of coverage of the course</td>
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
  <td style="text-align:left">Applicability/relevance of the course</td>
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
  <td style="text-align:left">Learning value of the course in terms of knowledge, concepts and Skills.</td>
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
  <td style="text-align:left">Clarity and relevance of the prescribed reading material</td>
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
  <td style="text-align:left">Relevance of additional source material (Library)</td>
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
  <td style="text-align:left">Overall rating</td>
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
			alert("Plese Enter Correct Option (A, B, C, D)");
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
		
		ans=confirm('Are You Sure To Submit the form?')
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
							alert ('Please enter the values');
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
											title: "Saved!",
											text: "Response Saved Successfully!",
											icon: "success"
										}).then(function() {
											window.location = "Pteachersform";
										});
									}
								});
				
			}
			if(chresult==0)
			{
				alert ('Please Select the Course');
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
