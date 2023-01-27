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

</style>

<body>
<a href="<?= base_url() ?>Crud/index">Logout</a>
<div class="limiter">	
<div class="container-login100" style="color:black;">
<div class="wrap-login100">
<h1><center>MANGALORE UNIVERSITY</center><h1>
<h2><center>Questionnaire No.3</center></h2>
<h3><center><b>Student's overall Evaluation of Programme and Teaching</h3>
<h4><center>(To be filled at the end of the Programme)</h4><br>

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

<h3><p class="ex1">Your responses will be seen only after your course results have been finalized and recorded.
The information will be used only for the improvement of the course and teaching in the future.</p></h3><br>
<div>
<p class="ex1">1.The Syllabus was</p>
<p class="ex1"><input type="radio" name="q1" id="q1" value="A">Challenging &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio" name="q1" id="q1" value="B">Adequate &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q1" id="q1" value="C">Dull &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <input type="radio" name="q1" id="q1" value="D">Inadequate </p>
<br>
<p class="ex1">2.Your background for pursing the course was</p>
<p class="ex1"><input type="radio" name="q2" id="q2" value="A">More than adequate &emsp;&emsp;&emsp;&emsp; <input type="radio" name="q2" id="q2" value="B">Just Adequate&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q2" id="q2" value="C">Inadequate  </p>
<br>
<p class="ex1">3.Conceptually how difficult the courses was</p>
<p class="ex1"><input type="radio" name="q3" id="q3" value="A">Easy &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q3" id="q3" value="B">Manageable&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q3" id="q3" value="C">Difficult&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp; <input type="radio" name="q3" id="q3" value="D">Very Difficult </p><br>

<p class="ex1">4.How much of the syllabus was covered in class?</p>
<p class="ex1"><input type="radio" name="q4" id="q4" value="A">85 to 100% &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio" name="q4" id="q4" value="B"> 70 to 85%  &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
<input type="radio" name="q4" id="q4" value="C">55 to 70% &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input type="radio" name="q4" id="q4" value="D">Less than 55%  </p>
<br>
<p class="ex1">5.What is your opinion about the library materials for the course?</p>
<p class="ex1"><input type="radio" name="q5" id="q5" value="A">Excellent&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q5" id="q5" value="B">Adequate &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
<input type="radio" name="q5" id="q5" value="C">Inadequate &emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;  <input type="radio" name="q5" id="q5" value="D">Very poor </p><br>

<p class="ex1">6.Were you able to get the prescribed reading material?</p>
<p class="ex1"><input type="radio" name="q6" id="q6" value="A">Easily&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q6" id="q6" value="B">With difficulty  &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="q6" id="q6" value="C">With great difficulty &nbsp;&nbsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q6" id="q6" value="D">Not at all </p><br>

<p class="ex1">7.How well did the teachers prepare for class? </p>
<p class="ex1"><input type="radio" name="q7" id="q7" value="A">Thoroughly&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q7" id="q7" value="B">Satisfactorily &nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q7" id="q7" value="C">Poorly &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio" name="q7" id="q7" value="D">indifferently </p><br>

<p class="ex1">8.How well did the teachers communicate?  </p>
<p class="ex1"><input type="radio" name="q8" id="q8" value="A">Excellent &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q8" id="q8" value="B">Effectively&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;
<input type="radio" name="q8" id="q8" value="C">Satisfactorily&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q8" id="q8" value="D">indifferently </p><br>

<p class="ex1">9.Did the teachers encourage student participation in class? </p>
<p class="ex1"><input type="radio" name="q9" id="q9" value="A">Always&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q9" id="q9" value="B">Sometimes &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q9" id="q9" value="C">Tried&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q9" id="q9" value="D">Not all &emsp;&emsp;&emsp;&emsp;&emsp;</p><br>

<p class="ex1">10.How helpful was the teachers’ advice?  </p>
<p class="ex1"><input type="radio" name="q10" id="q10" value="A">Very helpful&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio" name="q10" id="q10" value="B">Helpful &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
<input type="radio" name="q10" id="q10" value="C">Sometimes helpful &emsp;&emsp;&emsp;<input type="radio" name="q10" id="q10" value="D">Unhelpful</p><br>

<p class="ex1">11.Were the teachers</p>
<p class="ex1"><input type="radio" name="q11" id="q11" value="A">Most Courteous&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="q11" id="q11" value="B">Generally &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
<input type="radio" name="q11" id="q11" value="C">Indifferent? &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="q11" id="q11" value="D">Rude? </p><br>

<p class="ex1">12.Internal assessment in the department was</p>
<p class="ex1"><input type="radio" name="q12" id="q12" value="A">Fair & impartial &emsp;&emsp;&emsp;&nbsp;&emsp;<input type="radio" name="q12" id="q12" value="B">Discriminatory &emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q12" id="q12" value="C">Too strict &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q12" id="q12" value="D">Too liberal </p><br>


<p class="ex1">13.How did the teachers provide feedback on your performance? </p>
<p class="ex1"><input type="radio" name="q13" id="q13" value="A">In time&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q13" id="q13" value="B">Late &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q13" id="q13" value="C">Reluctantly  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q13" id="q13" value="D">Not at all </p><br>


<p class="ex1">14.Were your assignments discussed with you? </p>
<p class="ex1"><input type="radio" name="q14" id="q14" value="A">Yes, fully&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q14" id="q14" value="B">Yes partly &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q14" id="q14" value="C">Sometimes &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q14" id="q14" value="D">No</p><br>

<p class="ex1">15.Were you briefed with an outline of the coursework and the scheme of evaluation at the beginning? </p>
<p class="ex1"><input type="radio" name="q15" id="q15" value="A">Yes &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q15" id="q15" value="B">No </p><br>

<p class="ex1">16.Was the briefing helpful? </p>
<p class="ex1"><input type="radio" name="q16" id="q16" value="A">Yes &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q16" id="q16" value="B">No </p><br>

<p class="ex1">17.Was the outline followed? </p>
<p class="ex1"><input type="radio" name="q17" id="q17" value="A">Yes &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="radio" name="q17" id="q17" value="B">No </p><br>

<p class="ex1">18.Was there any opportunity for personal interaction with teachers? </p>
<p class="ex1"><input type="radio" name="q18" id="q18" value="A">Yes&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <input type="radio" name="q18" id="q18" value="B">To some extent &emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q18" id="q18" value="C">No  </p><br>

<p class="ex1">19.Was there a provision for counselling in the department  </p>
<p class="ex1"><input type="radio" name="q19" id="q19" value="A">Yes&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  <input type="radio" name="q19" id="q19" value="B">To some extent &emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q19" id="q19" value="C">No </p><br>


<p class="ex1">20.Was there any opportunity for group study?</p>
<p class="ex1"><input type="radio" name="q20" id="q20" value="A">Yes&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="q20" id="q20" value="B">To some extent &emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q20" id="q20" value="C">No  </p><br>

<p class="ex1">21.Were external experts invited to address you? </p> 
<p class="ex1"><input type="radio" name="q21" id="q21" value="A">Frequently &emsp;&emsp;&emsp;&emsp;<input type="radio" name="q21" id="q21" value="B">Occasionally &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q21" id="q21" value="C">Rarely&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<input type="radio" name="q21" id="q21" value="D">Never</p><br>

<p class="ex1">22.Orientation given by the teachers through field and lab studies was </p>
<p class="ex1"><input type="radio" name="q22" id="q22" value="A">Very good &emsp;&emsp;&emsp;&emsp;<input type="radio" name="q22" id="q22" value="B">Good &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q22" id="q22" value="C">Average &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="q22" id="q22" value="D">Poor</p><br>

<p class="ex1">23.Encouragement of the department for co-curricular activities was </p>
<p class="ex1"><input type="radio" name="q23" id="q23" value="A">Very good &emsp;&emsp;&emsp;&emsp; <input type="radio" name="q23" id="q23" value="B">Good &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q23" id="q23" value="C">Average  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <input type="radio" name="q23" id="q23" value="D">Poor</p><br>

<p class="ex1">24.Overall academic atmosphere in the department was? </p>
<p class="ex1"><input type="radio" name="q24" id="q24" value="A">Very good &emsp;&emsp;&emsp;&emsp;<input type="radio" name="q24" id="q24" value="B">Good &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q24" id="q24" value="C">Average &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <input type="radio" name="q24" id="q24" value="D">Poor</p><br>

<p class="ex1">25.Discipline and good practices of the teachers in the department were </p>
<p class="ex1"><input type="radio" name="q25" id="q25" value="A">Very good &emsp;&emsp;&emsp;&emsp; <input type="radio" name="q25" id="q25" value="B">Good &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q25" id="q25" value="C">Average&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <input type="radio" name="q25" id="q25" value="Poor">Poor</p><br>

<p class="ex1">26.Do the teachers motivate students to pursue research? </p>
<p class="ex1"><input type="radio" name="q26" id="q26" value="A">Always&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q26" id="q26" value="A">Sometimes &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input type="radio" name="q26" id="q26" value="C">Rarely&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="q26" id="q26" value="D">Never </p><br>

<p class="ex1">27.If you have any other comments to offer on the course and the teachers, you may do so below</p>
<p class="ex1"><label for="comments">write here</label>
<br>
<textarea id="q27" maxlength='350' name="comments" rows="6" cols="70" >
</textarea><br><br>
<p class="ex1">28.Your suggestions to improve the quality of program and teachers </p>
<p class="ex1"><label for="suggestions">write your suggestions here</label>
<br>
<textarea id="q28" maxlength='350' name="suggestions" rows="6" cols="70" >
</textarea><br>
<center><button class="button button1" type="button" onclick="myFunction()">submit</button>
</div>
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

