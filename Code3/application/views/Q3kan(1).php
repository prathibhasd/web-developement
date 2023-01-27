<html>
<head>
<title>Overall</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
 
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


  <link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/util.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/main.css">
</head>
<style>

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}



.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 

</style>


<body>
<a href="<?= base_url() ?>Crud/index">Logout</a>
<div class="limiter"> 
<div class="container-login100" style="color:black;">
<div class="wrap-login100">
<h1><center>ಮಂಗಳೂರು ವಿಶ್ವವಿದ್ಯಾನಿಲಯ</center><h1>
<h2><center>ಪ್ರಶ್ನಾವಳಿ-೩</center></h2>
<h3><center><b>ಅಧ್ಯಾಪನ ಮತ್ತು ಪ್ರೋಗ್ರಾಂನ ಕುರಿತು ವಿದ್ಯಾರ್ಥಿಗಳ ಸಮಗ್ರ ಮೌಲ್ಯಮಾಪನ</h3>
<h4><center>(ಪ್ರೋಗ್ರಾಂನ ಕೊನೆಯಲ್ಲಿ ಭರ್ತಿಮಾಡುವುದು)</h4><br>
<?php    
    $Username   = $this->session->userdata('username');
         foreach ($dname as $row)  
         {  ?>
      <h5><center><label for="Department">Department:</label>
      <input type="text" id="Department" value="<?php echo $row->Dept_name?>" name="Department">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label for="Programme">Programme:</label>
      
  <?php
          }  
         ?> 
     
     <?php   
         foreach ($user as $row)  
         {  ?>
      <input type="text" id="Programme" name="Programme" value="<?php echo $row->Pgm_name?>">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label for="Year">Year:</label>
      <input type="text" id="Year" name="Year" value="<?php echo $row->Sem?>"></center></h5><br>
      <h3 style="color:Black;"><input type="hidden" name="User" id="User" value="<?php echo $Username?>"></h3>
	  <h3 style="color:Black;"><input type="hidden" name="campus" id="code" value="<?php echo $row->Campus_code?>"></h3>
  <?php
          }  
         ?> 

<h3><p class="ex1">ನಿಮ್ಮ  ಕೋರ್ಸ್ ನ  ಫಲಿತಾಂಶ ಪ್ರಕ್ರಿಯೆ ಅಂತಿಮಗೊಂಡು, ದಾಖಲುಗೊಳಿಸಿದ ಬಳಿಕ ಮಾತ್ರ ನಿಮ್ಮ ಪ್ರತಿಕ್ರಿಯೆಗಳನ್ನು ಗಮನಿಸಲಾಗುವುದು.<br>
ಭವಿಷ್ಯದಲ್ಲಿ ಕೋರ್ಸ್ ಮತ್ತುಅಧ್ಯಾಪನದ  ಮೌಲ್ಯವನ್ನು ಉತ್ತಮಗೊಳಿಸುವಲ್ಲಿ  ಮಾತ್ರ ಈ ಮಾಹಿತಿಯನ್ನು ಬಳಸಿಕೊಳ್ಳಲಾಗುವುದು.</h3><br>
<div>
<p>1.ಪಾಠ ಪಠ್ಯದ ಸ್ವರೂಪವು ಹೀಗಿದೆ.
<p><input type="radio" name="q1" id="q1" value="A">ಸವಾಲಿನದು &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q1" id="q1" value="B">ಸಮರ್ಪಕ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
<input type="radio" name="q1" id="q1"  value="C">ನೀರಸ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q1" id="q1"  value="D">ಅಸಮರ್ಪಕ  </p>
<br>
<p>2.ಈ ಕೋರ್ಸ್ ನ್ನು  ಅಯ್ದುಕೊಳ್ಳುವಲ್ಲಿ ನಿಮ್ಮ ಹಿನ್ನೆಲೆ
<p><input type="radio" id="q2"  name="q2" value="A">ಸಾಕಷ್ಟು ಸಮರ್ಪಕ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input type="radio" name="q2" id="q2"  value="B">ಅಗತ್ಯಕ್ಕೆ ತಕ್ಕಷ್ಟು ಸಮರ್ಪಕ &emsp;&emsp;&emsp;
<input type="radio" id="q2"  name="q2" value="C">ಅಸಮರ್ಪಕ  </p>
<br>
<p>3.ಪರಿಕಲ್ಪನಾತ್ಮಕವಾಗಿ ಕೋರ್ಸ್‌ ಎಷ್ಟರಮಟ್ಟಿಗೆ ಕಷ್ಟಕರವಾಗಿತ್ತು ?
<p><input type="radio" name="q3" id="q3"  value="A">ಸುಲಭ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" id="q3" name="q3" value="B">ನಿಭಾಯಿಸುವ ಮಟ್ಟಿಗೆ &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
<input type="radio" name="q3" id="q3"  value="C">ಕಷ್ಟಕರ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q3" id="q3"  value="D">ಅತ್ಯಂತ ಕಷ್ಟಕರ </p><br>

<p>4.ತರಗತಿ ಬೋಧನೆಯಲ್ಲಿ  ಎಷ್ಟು ಭಾಗವನ್ನು ಪೂರ್ಣಗೊಳಿಸಲಾಗಿದೆ?
<p><input type="radio" name="q4" id="q4" value="A">೮೫ ರಿಂದ ೧೦೦%&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp; <input type="radio" id="q4"  name="q4" value="B" >೭೦ ರಿಂದ ೮೫% &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
<input type="radio" name="q4" id="q4"  value="C">೫೫ ರಿಂದ ೭೦% &emsp;&emsp;&emsp;&emsp;&nbsp; <input type="radio" name="q4" id="q4"  value="D">೫೫% ಕ್ಕಿಂತ ಕಡಿಮೆ  </p>
<br>
<p>5.ನಿಮ್ಮ ಕೋರ್ಸ್‌ ಗೆ ಸಂಬಂಧಿಸಿದಂತೆ ಗ್ರಂಥಾಲಯ ಸಾಮಗ್ರಿಗಳ ಕುರಿತು ನಿಮ್ಮಅಭಿಪ್ರಾಯವೇನು?
<p><input type="radio" name="q5" id="q5" value="A">ಅತ್ಯುತ್ತಮ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" id="q5" name="q5" value="B">ಸಮರ್ಪಕ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; 
<input type="radio" name="q5"  id="q5" value="C">ಅಸಮರ್ಪಕ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" id="q5" name="q5" value="D">ಎನೇನೂ ಸಾಲದು </p><br>

<p>6.ನಿಗದಿಡಿಸಿದ ಓದಿನ ಸಾಮಗ್ರಿಗಳನ್ನು ನಿಮಗೆ  ಪಡೆಯಲು ನಿಮಗೆ ಸಾಧ್ಯವಾಯಿತೇ?
<p><input type="radio"name="q6" id="q6" value="A">ಸುಲಭವಾಗಿ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio" id="q6" name="q6" value="B">ಕಷ್ಟಪಟ್ಟು&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;  
<input type="radio" id="q6" name="q6" value="C">ಬಹು  ಕಷ್ಟಕರವಾಗಿ &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio"id="q6" name="q6" value="D">ಎಂದಿಗೂ ಪಡೆಯಲು ಸಾಧ್ಯವಾಗಿಲ್ಲ  </p><br>

<p>7.ಅಧ್ಯಾಪಕರು ತರಗತಿಗೆ  ಎಷ್ಟರ ಮಟ್ಟಿಗೆ  ಸಿದ್ಧತೆ ನಡೆಸಿರುತ್ತಾರೆ?
<p><input type="radio"name="q7" id="q7" value="A">ಸಂಪೂರ್ಣವಾಗಿ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" id="q7" name="q7" value="B">ತೃಪ್ತಿಕರವಾಗಿ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q7" id="q7" value="C">ನಿರ್ಲಕ್ಷ್ಯದಿಂದ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio" name="q7" id="q7" value="D">ಎನೇನೂ ಸಾಲದು  </p><br>

<p>8.ವಿಷಯವನ್ನುಅಧ್ಯಾಪಕರು  ಎಷ್ಟು ಚೆನ್ನಾಗಿ ಸಂವಹನಗೊಳಿಸಿರುತ್ತಾರೆ? 
<p><input type="radio" name="q8" id="q8" value="A">ಅತ್ಯುತ್ತಮವಾಗಿ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q8" id="q8" value="B">ಪರಿಣಾಮಕಾರಿಯಾಗಿ&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
<input type="radio" name="q8" id="q8" value="C">ತೃಪ್ತಿಕರವಾಗಿ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q8" id="q8" value="D">ಎನೇನೂ ಸಾಲದು </p><br>

<p>9.ತರಗತಿಯಲ್ಲಿ ವಿದ್ಯಾರ್ಥಿಗಳ ಭಾಗವಹಿಸುವಿಕೆಯನ್ನು ಅಧ್ಯಾಪಕರು ಪ್ರೋತ್ಸಾಹಿಸುತ್ತಾರೆಯೇ?
<p><input type="radio"name="q9" id="q9" value="A">ಯಾವಾಗಲೂ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q9" id="q9" value="B">ಕೆಲವೊಮ್ಮೆ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
<input type="radio" name="q9" id="q9" value="C">ಪ್ರಯತ್ನಿಸಿದ್ದಾರೆ &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio" name="q9" id="q9" value="D">ಯಾವಹತ್ತೂ ಇಲ್ಲ </p><br>

<p>10.ಅಧ್ಯಾಪಕರು ನೀಡುವ  ಸಲಹೆಗಳು ಉಪಯುಕ್ತವೇ? 
<p><input type="radio"name="q10" id="q10" value="A">ತುಂಬಾ ಉಪಯುಕ್ತ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q10" id="q10" value="B">ಉಪಯುಕ್ತ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="q10" id="q10" value="C">ಕೆಲವೊಮ್ಮೆ ಉಪಯುಕ್ತ&emsp;&emsp;&emsp;&nbsp; <input type="radio" name="q10" id="q10" value="D">ನಿರುಪಯುಕ್ತ</p><br>

<p>11.ಅಧ್ಯಾಪಕರು 
<p><input type="radio"name="q11" id="q11" value="A">ತುಂಬಾ ಸಜ್ಜನರು &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" id="q11" name="q11" value="B">ಸಜ್ಜನರು&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
<input type="radio" name="q11" id="q11" value="C">ನಿರಾಸಕ್ತರು&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio"  id="q11" name="q11" value="D">ಒರಟುತನದವರು </p><br>

<p>12.ವಿಭಾಗದಲ್ಲಿನ ಆಂತರಿಕ ಮೌಲ್ಯಮಾಪನವು
<p><input type="radio"name="q12" id="q12" value="A">ಸರಿಯಾಗಿದೆ ಮತ್ತು ನಿಷ್ಪಕ್ಷಪಾತವಾಗಿದೆ <input type="radio" name="q12"  id="q12" value="B">ಪಕ್ಷಪಾತದಿಂದ ಕೂಡಿದೆ&emsp;&emsp;&emsp;&nbsp;&nbsp;
<input type="radio" name="q12"  id="q12" value="C">ತುಂಬಾ ಕಟ್ಟುನಿಟ್ಟಾಗಿದೆ &emsp;&emsp;&emsp; <input type="radio" name="q12"  id="q12" value="D">ಅತಿ ಉದಾರತನದ್ದು </p><br>


<p>13.ನಿಮ್ಮ ಕಾರ್ಯನಿರ್ವಹಣೆಗೆ ಅಧ್ಯಾಪಕರ ಪ್ರತಿಸ್ಪಂದನೆ
<p><input type="radio"name="q13"  id="q13" value="A">ಸಕಾಲದಲ್ಲಿ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q13" id="q13" value="B">ತಡವಾಗಿ ನೀಡುತ್ತಾರೆ&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
<input type="radio" name="q13"  id="q13" value="C">ಅರೆ ಮನಸ್ಸಿನಿಂದ  &emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q13" id="q13" value="D">ಎಂದಿಗೂ ಇಲ್ಲ </p><br>


<p>14.ನೀಯೋಜಿತ ಕೆಲಸಗಳ ಕುರಿತು ನಿಮ್ಮೊಂದಿಗೆ ಚರ್ಚಿಸುತ್ತಾರೆಯೇ?
<p><input type="radio"name="q14" id="q14" value="A">ಹೌದು, ಪೂರ್ಣಪ್ರಮಾಣದಲ್ಲಿ&emsp;&emsp;&emsp; <input type="radio" name="q14" id="q14" value="B">ಹೌದು,  ಭಾಗಶಃ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
<input type="radio" name="q14"  id="q14" value="C">ಕೆಲವೊಮ್ಮೆ&emsp;&emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&nbsp;&nbsp;<input type="radio" name="q14" id="q14" value="D">ಇಲ್ಲ</p><br>

<p>15.ಕೋರ್ಸ್‌ವರ್ಕ್‌ ಮತ್ತು ಮೌಲ್ಯಮಾಪನ ಯೋಜನೆ ರೂಪುರೇಷೆಯನ್ನು  ಆರಂಭದಲ್ಲಿ ನಿಮಗೆ ವಿಶದಪಡಿಸಲಾಗಿದೆಯೇ?
<p><input type="radio" name="q15" id="q15" value="A">ಹೌದು&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q15" id="q15" value="B">ಇಲ್ಲ </p><br>

<p>16.ಆ  ರೂಪುರೇಷೆ ಉಪಯುಕ್ತವೇ?
<p><input type="radio" name="q16" id="q16" value="A">ಹೌದು&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio" name="q16" id="q16"  value="B">ಇಲ್ಲ</p><br>

<p>17.ಯೋಜನೆಯ ರೂಪುರೇಷೆಯನ್ನು ಅನುಸರಿಸಲಾಗಿದೆಯೇ?
<p><input type="radio" name="q17" id="q17" value="A">ಹೌದು&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio"  id="q17"name="q17" value="D">ಇಲ್ಲ </p><br>

<p>18.ಅಧ್ಯಾಪಕರೊಂದಿಗೆ ವೈಯಕ್ತಿಕ ಸಂವಾದಕ್ಕೆ  ಅವಕಾಶವಿದೆಯೇ?
<p><input type="radio"name="q18"  id="q18" value="A">ಹೌದು &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q18"  id="q18" value="B">ಸ್ವಲ್ಪ ಮಟ್ಟಿಗೆ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q18" id="q18"  value="C">ಇಲ್ಲ  </p><br>

<p>19.ವಿಭಾಗದಲ್ಲಿ ಕೌನ್ಸೆಲಿಂಗ್‌ ನಡೆಸಲು ಅವಕಾಶವಿದೆಯೇ?
<p><input type="radio"name="q19" id="q19" value="A">ಹೌದು&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q19"  id="q19" value="B">ಸ್ವಲ್ಪ ಮಟ್ಟಿಗೆ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q19" id="q19" value="C">ಇಲ್ಲ </p><br>


<p>20.ಕಲೆತು ಕಲಿಯುವಿಕೆಗೆ ಅವಕಾಶವಿದೆಯೇ?
<p><input type="radio"name="q20" id="q20" value="A">ಹೌದು &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q20" id="q20" value="B">ಸ್ವಲ್ಪ ಮಟ್ಟಿಗೆ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q20" id="q20"  value="C">ಇಲ್ಲ </p><br>

<p>21.ನಿಮ್ಮನ್ನು ಉದ್ದೇಶಿಸಿ ಮಾತನಾಡಲು ಬಾಹ್ಯ ತಜ್ಞರನ್ನು ಆಹ್ವಾನಿಸಲಾಗಿದೆಯೇ? 
<p><input type="radio"name="q21"  id="q21" value="A">ಆಗಾಗ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q21" id="q21" value="B">ಸಂದರ್ಭಾನುಸಾರ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
<input type="radio" name="q21" id="q21" value="C">ವಿರಳವಾಗಿ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q21"  id="q21" value="D">ಎಂದಿಗೂ ಇಲ್ಲ</p><br>

<p>22.ಕ್ಷೇತ್ರಕಾರ್ಯ ಮತ್ತು ಪ್ರಯೋಗಶಾಲಾ ಅಧ್ಯಯನಗಳ ಮೂಲಕ ಅಧ್ಯಾಪಕರು ವಿಷಯದ ಬಗ್ಗೆ ನೀಡಿದ ಪರಿಚಯಾತ್ಮಕ ತಿಳುವಳಿಕೆಯು
<p><input type="radio"name="q22" id="q22" value="A">ಅತ್ಯುತ್ತಮ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q22"  id="q22" value="B">ಉತ್ತಮ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="q22" id="q22" value="C">ಸಾಧಾರಣ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input type="radio" name="q22" id="q22" value="D">ಎನೇನು ಸಾಲದು </p><br>

<p>23.ಪಠ್ಯೇತರ ಚಟುವಟಿಕೆಗಳಿಗೆ ವಿಭಾಗದಿಂದ ದೊರೆಯುವ ಪ್ರೋತ್ಸಾಹ
<p><input type="radio"name="q23" id="q23" value="A">ಅತ್ಯುತ್ತಮ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q23" id="q23" value="B">ಉತ್ತಮ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="q23"  id="q23" value="C">ಸಾಧಾರಣ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input type="radio" name="q23" id="q23" value="D">ಕನಿಷ್ಠ</p><br>

<p>24.ವಿಭಾಗದಲ್ಲಿ ಒಟ್ಟಾರೆ ಶೈಕ್ಷಣಿಕ ವಾತಾವರಣ ಹೇಗಿತ್ತು? 
<p><input type="radio"name="q24"  id="q24" value="A">ಅತ್ಯುತ್ತಮ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio"  id="q24" name="q24" value="B">ಉತ್ತಮ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="q24"  id="q24" value="C">ಸಾಧಾರಣ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input type="radio" name="q24"  id="q24" value="D">ಕನಿಷ್ಠ</p><br>

<p>25.ವಿಭಾಗದ ಅಧ್ಯಾಪಕರಲ್ಲಿ ಇರುವ  ಶಿಸ್ತು ಮತ್ತು ಉತ್ತಮ ನಡವಳಿಕೆ
<p><input type="radio"name="q25"  id="q25" value="A">ಅತ್ಯುತ್ತಮ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q25" id="q25"  value="B">ಉತ್ತಮ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="q25" id="q25"  value="C">ಸಾಧಾರಣ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input type="radio" name="q25" id="q25"  value="D">ಕನಿಷ್ಠ</p><br>

<p>26.ಅಧ್ಯಾಪಕರು ವಿದ್ಯಾರ್ಥಿಗಳನ್ನು ಸಂಶೋಧನೆ ನಡೆಸಲು ಪ್ರೇರೇಪಿಸುತ್ತಾರೆಯೇ?
<p><input type="radio"name="q26" id="q26"  value="A">ಯಾವಾಗಲೂ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q26" id="q26" value="B">ಕೆಲವೊಮ್ಮೆ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q26" id="q26" value="C">ವಿರಳವಾಗಿ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q26" id="q26" value="D">ಎಂದಿಗೂ ಇಲ್ಲ </p><br>

<p>27.ಕೋರ್ಸ್ ನ ಬಗ್ಗೆ  ಮತ್ತು ಅಧ್ಯಾಪಕರ ಬಗ್ಗೆ ಏನಾದರೂ ಟೀಕೆ-ಟಿಪ್ಪಣಿಗಳಿದ್ದರೆ,  ಈ ಕೆಳಗೆ ಬರೆಯಿರಿ ಅಗತ್ಯವಿದ್ದಲ್ಲಿ ಪ್ರತ್ಯೇಕ ಹಾಳೆಯನ್ನು ಬಳಸಿ. </p>
<label for="comments">ಇಲ್ಲಿ ನಿಮ್ಮ ಟೀಕೆ-ಟಿಪ್ಪಣಿ ಬರೆಯಿರಿ:</label>
<br>
<textarea name="q27" maxlength='350' id="q27" rows="6" cols="70" >
</textarea>
<p>28.ಪ್ರೋಗ್ರಾಂ ಮತ್ತು ಅಧ್ಯಾಪನದ ಗುಣಮಟ್ಟವನ್ನು ಹೆಚ್ಚಿಸುವಲ್ಲಿ ನಿಮ್ಮ ಸಲಹೆ-</p>
<label for="suggestions">ನಿಮ್ಮ ಸಲಹೆಯನ್ನು ಇಲ್ಲಿ ಬರಿಯಿರಿ:</label>
<br>
<textarea name="q28" maxlength='350' id="q28" rows="6" cols="70" >
</textarea><br><br>


<center><button class="button button4" type="button" onclick="myFunction()">ಸಲ್ಲಿಸು</button>
</div>
</div>
</div>
<script>
function myFunction()
{
			var deptname=document.getElementById("Department").value;
			var username=document.getElementById("User").value;
			var pgm=document.getElementById("Programme").value;
			var sem=document.getElementById("Year").value;
			var campus=document.getElementById("code").value;
			
						var Q1=$("input:radio[id=q1]:checked").val();
						var Q2=$("input:radio[id=q2]:checked").val();
						var Q3=$("input:radio[id=q3]:checked").val();
						var Q4=$("input:radio[id=q4]:checked").val();
						var Q5=$("input:radio[id=q5]:checked").val();
						var Q6=$("input:radio[id=q6]:checked").val();
						var Q7=$("input:radio[id=q7]:checked").val();
						var Q8=$("input:radio[id=q8]:checked").val();
						var Q9=$("input:radio[id=q9]:checked").val();
						var Q10=$("input:radio[id=q10]:checked").val();
						var Q11=$("input:radio[id=q11]:checked").val();
						var Q12=$("input:radio[id=q12]:checked").val();
						var Q13=$("input:radio[id=q13]:checked").val();
						var Q14=$("input:radio[id=q14]:checked").val();
						var Q15=$("input:radio[id=q15]:checked").val();
						var Q16=$("input:radio[id=q16]:checked").val();
						var Q17=$("input:radio[id=q17]:checked").val();
						var Q18=$("input:radio[id=q18]:checked").val();
						var Q19=$("input:radio[id=q19]:checked").val();
						var Q20=$("input:radio[id=q20]:checked").val();
						var Q21=$("input:radio[id=q21]:checked").val();
						var Q22=$("input:radio[id=q22]:checked").val();
						var Q23=$("input:radio[id=q23]:checked").val();
						var Q24=$("input:radio[id=q24]:checked").val();
						var Q25=$("input:radio[id=q25]:checked").val();
						var Q26=$("input:radio[id=q26]:checked").val();
						var Q27=document.getElementById("q27").value;
						var Q28=document.getElementById("q28").value;
						
						
					if(Q1==undefined && Q2==undefined && Q3==undefined && Q4==undefined && Q5==undefined && Q6==undefined && Q7==undefined && Q8==undefined && Q9==undefined && Q10==undefined
						&& Q11==undefined && Q12==undefined && Q13==undefined && Q14==undefined && Q15==undefined && Q16==undefined && Q17==undefined && Q18==undefined && Q19==undefined && Q20==undefined
						&& Q21==undefined && Q22==undefined && Q23==undefined && Q24==undefined && Q25==undefined && Q26==undefined && Q27=='' && Q28=='')
						{
							status=0;
							alert ('Please enter the values');
							
						}
						else
						{
							if(Q1==undefined)
							{
								Q1='X';
							}
							if(Q2==undefined)
							{
								Q2='X';
							}
							if(Q3==undefined)
							{
								Q3='X';
							}
							if(Q4==undefined)
							{
								Q4='X';
							}
							if(Q5==undefined)
							{
								Q5='X';
							}
							if(Q6==undefined)
							{
								Q6='X';
							}
							if(Q7==undefined)
							{
								Q7='X';
							}
							if(Q8==undefined)
							{
								Q8='X';
							}
							if(Q9==undefined)
							{
								Q9='X';
							}
							if(Q10==undefined)
							{
								Q10='X';
							}
							if(Q11==undefined)
							{
								Q11='X';
							}
							if(Q12==undefined)
							{
								Q12='X';
							}
							if(Q13==undefined)
							{
								Q13='X';
							}
							if(Q14==undefined)
							{
								Q14='X';
							}
							if(Q15==undefined)
							{
								Q15='X';
							}
							if(Q16==undefined)
							{
								Q16='X';
							}
							if(Q17==undefined)
							{
								Q17='X';
							}
							if(Q18==undefined)
							{
								Q18='X';
							}
							if(Q19==undefined)
							{
								Q19='X';
							}
							if(Q20==undefined)
							{
								Q20='X';
							}
							if(Q21==undefined)
							{
								Q21='X';
							}
							if(Q22==undefined)
							{
								Q22='X';
							}
							if(Q23==undefined)
							{
								Q23='X';
							}
							if(Q24==undefined)
							{
								Q24='X';
							}
							if(Q25==undefined)
							{
								Q25='X';
							}
							if(Q26==undefined)
							{
								Q26='X';
							}
							if(Q27=='')
							{
								Q27='X';
							}
							if(Q28=='')
							{
								Q28='X';
							}
							
							$.ajax({
									url:'overallinsert',
									type:"POST",
									data:{
										QS1:Q1,
										QS2:Q2,
										QS3:Q3,
										QS4:Q4,
										QS5:Q5,
										QS6:Q6,
										QS7:Q7,
										QS8:Q8,
										QS9:Q9,
										QS10:Q10,
										QS11:Q11,
										QS12:Q12,
										QS13:Q13,
										QS14:Q14,
										QS15:Q15,
										QS16:Q16,
										QS17:Q17,
										QS18:Q18,
										QS19:Q19,
										QS20:Q20,
										QS21:Q21,
										QS22:Q22,
										QS23:Q23,
										QS24:Q24,
										QS25:Q25,
										QS26:Q26,
										QS27:Q27,
										QS28:Q28,
										user:username,
										dname:deptname,
										sem:sem,
										pgmname:pgm,
										ccode:campus
									},
									success:function(result)
									{
										console.log(result);
										 alert("Data Saved Successfully");
										 window.location.href = "index";
									}
								});
							
						}
				
				
}
</script>



</body>
</html>



