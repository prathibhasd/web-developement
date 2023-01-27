<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/Cod/css/util.css">
<link rel="stylesheet" type="text/css" href="http://localhost/Cod/css/main.css">
</head>
<style>

</style>


<body>
<div class="limiter"> 
<div class="container-login100">
<div class="wrap-login100">
<h1><center>MANGALORE UNIVERSITY</center><h1>
<h2><center>Questionnaire No.1</center></h2>
<h3><center>Feedback from Students on Course/Paper</center></h3>
<h4><center>(To be filled seperately for paper/course)</center></h4>

<pre>
  <?php
$a=$_SESSION['username'];
?>
 <?php
$con=mysqli_connect('localhost','root','','app_login');
$sql="select * from credentialtbl1 where  username='$a'";

$res=$con->query($sql);
if($row2=$res->fetch_assoc())
{ 

$b=$row2['dept_code'];
$c=$row2['campus_code'];
$ss=$row2['semester'];
$pp=$row2['programme_name'];
$p=$row2['prgrm_code'];

}
$sql5="select * from departmenttbl where  dept_code='$b' ";

$res=$con->query($sql5);
if($row5=$res->fetch_assoc())
{ 

$dd=$row5['dept_name'];


 } 
 
?>


Programme:<input type="text" value="<?php echo $pp; ?>">                                                                Semester/Term/year:<input type="text" value="<?php echo $ss; ?>"> <br>

Department:<input type="text" value="<?php echo $dd; ?>">
</pre>
<br>
<p><b>NOTE:This is a confidential feedback sought from you. Please do not leave any of your identity while filling up this proforma. The University will process the details with utmost care and confidentiality.</b></p>
<p><b>Please rate the Course/Paper on the following attribute using 4-points scale shown.</b></p>

<table style="width:100%">
  <tr>
    <th>A<br>Very Good</th>
    <th>B<br>Good</th>
    <th>C<br>Satisfactory</th>
    <th>D<br>Unsatisfactory</th>
  </tr>
 
</table>

<?php
$con=mysqli_connect('localhost','root','','app_login');
$sql="select * from coursetbl where dept_code='$b' and semester='$ss' and campus_code='$c'and programme_name='$pp'";
$res=$con->query($sql);
$i=1;
while($row=$res->fetch_assoc())
{ 

  ?>

  coursename <?php echo $i; ?> = <?php echo $row[('course_name')];
 
   ?>
  <br>
<?php $i=$i+1;} ?>
<?php
$con=mysqli_connect('localhost','root','','app_login');
$sql3="select * from coursetbl where dept_code='$b' and semester='$ss' and campus_code='$c' and programme_name='$pp'";
$res=$con->query($sql3);
$i=1;
while($row1=$res->fetch_assoc())
{ 

  ?>

  coursecode <?php echo $i; ?> = <?php echo $row1[('course_code')];
  
   ?><br>
<?php $i=$i+1;} ?>



     

<form name="Feedback"><br>
  <div class="table-responsive">
<table style="width:100%;overflow:scroll;">
  <tr>
  <th rowspan="2">Sl. No.</th>
  <th rowspan="2" width="800px" word-wrap="break-word">Parameters</th>
  <th colspan="<?Php echo $i?>">Paper/course</th>
 </tr>
 <tr>
  <?php



$j=1;
$con=mysqli_connect('localhost','root','','app_login');
$sql="select * from coursetbl where dept_code='$b' and semester='$ss'and  campus_code='$c'and programme_name='$pp'";
$res=$con->query($sql);
$count=
$i=1;
while($row1=$res->fetch_assoc())
{ 
?>
<td><input type="checkbox" id="chkpass<?php echo $j?>" onclick="Enable('<?php echo $j?>')" ><?php echo $row1['course_code']." " ?></td>
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
    <td colspan="10" align="center"><input type="submit" name="save" value="Submit"/></td>
  </tr>
</table>
</div>
</div>
</div>
</form>
<script type="text/javascript">

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
      document.getElementById("P8a"+a).disabled=false;
      document.getElementById("P9a"+a).disabled=false;
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
      document.getElementById("P8a"+a).value="";
      document.getElementById("P8a"+a).disabled=true;
      document.getElementById("P9a"+a).value="";
      document.getElementById("P9a"+a).disabled=true;
      }
      
    

    }

 



  function validate(input){
     let x = input.value;
  if (x == "a" || x == "b" || x == "c" || x == "d") {
    input.value = input.value.replace(/\W|\d/g, '').substr(0, 1).toUpperCase();
    return true;
  }
  else if (x != "A" || x != "B" || x != "C" || x == "D" )
  {
    alert("Please entre Correct Answer");
  input.value ="";
  return false;
  }
    input.value = input.value.replace(/\W|\d/g, '').substr(0, 1).toUpperCase();
  }
  function EnableDisableTextBox1(chkPassport) {
        //var txtPassportNumber1 = document.getElementById("P1a");
    //var lengthOfInputs = txtPassportNumber1.length;
    /*var txtPassportNumber2 = document.getElementById("P2a6");
    var txtPassportNumber3 = document.getElementById("P3a6");
    var txtPassportNumber4 = document.getElementById("P4a6");
    var txtPassportNumber5 = document.getElementById("P5a6");
    var txtPassportNumber6 = document.getElementById("P6a6");
    
        txtPassportNumber1.disabled = chkPassport.checked ? false : true;
    txtPassportNumber2.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber1.disabled) {
            txtPassportNumber1.focus(); 
        }
     if (!txtPassportNumber2.disabled) {
            txtPassportNumber2.focus(); 
        }*/
    
alert(document.getElementById("P1a"));
    }
  function EnableDisableTextBox2(chkPassport) {
        var txtPassportNumber = document.getElementById("P1b");
        txtPassportNumber.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
  
</script>
</body>
</html>