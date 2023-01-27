<?php
class Crud_model extends CI_Model 
{
	

	function saverecords($data)
	{
        $this->db->insert('faculty',$data);
        return true;
	}
	
	
	function insertcampus($data)
	{
        $this->db->insert('campus',$data);
        return true;
	}
	
	function insertdept($data)
	{
        $this->db->insert('department',$data);
        return true;
	}
	
	
	function insertpgm($data)
	{
        $this->db->insert('programme',$data);
        return true;
	}
	
	function insertcourse($data)
	{
        $this->db->insert('coursetbl',$data);
        return true;
	}
	
	function insertstdstr($data)
	{
        $this->db->insert('std_strength',$data);
        return true;
	}
	
	
	function insertcred($data)
	{
        $this->db->insert('credential',$data);
        return true;
	}
	function insertFB($data)
	{
          $inserted=$this->db->insert('fb_teacher',$data); //insert query
        if($inserted == true){
            return true; //returns true
        }
        else
        {
            return false;  //returns false
        } 
	}
	
	function insertFBG($data)
	{
          $inserted=$this->db->insert('fb_gteacher',$data); //insert query
        if($inserted == true){
            return true; //returns true
        }
        else
        {
            return false;  //returns false
        } 
	}
	
	function insertCR($data)
	{
          $inserted=$this->db->insert('fb_course',$data); //insert query
        if($inserted == true){
            return true; //returns true
        }
        else
        {
            return false;  //returns false
        } 
	}
	
	function insertFBO($data)
	{
          $inserted=$this->db->insert('fb_overall',$data); //insert query
        if($inserted == true){
            return true; //returns true
        }
        else
        {
            return false;  //returns false
        } 
	}
	
		 
	function setUserStatus($user,$password)
	{
		$query1=$this->db->query("select Status from credential where `Username` = '$user' and `Password`='$password'");
		
		foreach($query1->result() as $row)
		{
				$status =$row->Status;
				if($status=="Unused")
				{
					$status="Form1";
				}
				else if($status=="Form1")
				{
					$status="Form2";
				}
				else if($status=="Form2")
				{
					$status="Form2a";
				}
				else if($status=="Form2a")
				{
					$status="Submitted";
				}
		}
		
		$query2 = $this->db->query("UPDATE `credential` SET `Status` = '$status' WHERE `Username` = '$user' and `Password`='$password'");
		if ($query2) {
			
            return $status;
        } 
		else
            return false;
	}
	
	
	function logincred($username,$password)
	{
		$this->db->where('Username',$username);
		$this->db->where('Password',$password);
		$query=$this->db->get('credential');
        //$query=$this->db->query("select * from credential where Username='$username' and Password='$password'");
		
        if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
	
	function loginadmin($username,$password)
	{
		$this->db->where('user',$username);
		$this->db->where('pass',$password);
		$query=$this->db->get('admin');
        //$query=$this->db->query("select * from credential where Username='$username' and Password='$password'");
		
        if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
	
	function display_records($username,$password)
	{
		$this->db->select('Campus_code,Dept_code,Pgm_name,Sem,Status')
		->from('credential')
		->where('Username', $username)
		->where('Password', $password);
		$qry = $this->db->get();
		return $qry->result();	
	}
	
	
	public function get_faculty($deptcode,$campuscode)
	{
		$this->db->select('*')
		->from('faculty')
		->where('Dept_code', $deptcode)
		->where('Campus_code', $campuscode)
		->where('P_G_Faculty', 'Permanent Faculty');
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	
	public function get_allfaculty($deptcode,$campuscode)
	{
		$this->db->select('*')
		->from('faculty')
		->where('Dept_code', $deptcode)
		->where('Campus_code', $campuscode);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	
	public function get_allpgm($deptcode,$campuscode)
	{
		$this->db->select('*')
		->from('programme')
		->where('Dept_code', $deptcode)
		->where('Campus_code', $campuscode);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	public function get_allstdstr($Dcode,$Ccode)
	{
		$this->db->select('*')
		->from('std_strength')
		->order_by("Sem", "asc")
		->where('Dept_code', $Dcode)
		->where('Campus_code', $Ccode);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	
	public function get_allcourse($pname,$dcode,$ccode)
	{
		$this->db->select('*')
		->from('coursetbl')
		->where('programme_name', $pname)
		->where('dept_code', $dcode)
		->where('campus_code', $ccode);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	public function getdeptdetails($Dname)
	{
		$this->db->select('*')
		->from('department')
		->where('Dept_name', $Dname);
		$qry = $this->db->get();
		if ($qry->num_rows() > 0) {
            return $qry->result();	
        } else
            return false;	
	
	}
	
	
	public function getpgmdetails($Dname,$Pname)
	{
		$this->db->select('*')
		->from('programme')
		->where('Pgm_name', $Pname)
		->where('Dept_name', $Dname);
		$qry = $this->db->get();
		if ($qry->num_rows() > 0) {
            return $qry->result();	
        } else
            return false;	
	
	}
	
	public function updatefactinfo($fid,$fname,$Dname,$Pname,$dcode,$ccode,$pcode)
	{
		$query2 = $this->db->query("UPDATE `faculty` SET `Faculty_name` = '$fname',`Dept_name`='$Dname' WHERE `Faculty_no` = '$fid'");
		if ($query2) {
			
            return true;
        } 
		else
            return false;
		
	}
	
	
	public function updatecampusinfo($cid,$cname)
	{
		$query2 = $this->db->query("UPDATE `campus` SET `Campus_name` = '$cname' where `Campus_code` = '$cid'");
		if ($query2) {
			
            return true;
        } 
		else
            return false;
		
	}
	
	public function updatedeptinfo($did,$dname,$ccode)
	{
		$query2 = $this->db->query("UPDATE `department` SET `Dept_name` = '$dname',`Campus_code` = '$ccode' where `Dept_code` = '$did'");
		if ($query2) {
			
            return true;
        } 
		else
            return false;
		
	}
	
	public function updatepgminfo($id,$pcode,$ccode,$dname,$pname)
	{
		$query2 = $this->db->query("UPDATE `programme` SET `Pgm_code` = '$pcode',`Campus_code` = '$ccode',`Dept_name` = '$dname',`Pgm_name` = '$pname' where `Pgm_no` = '$id'");
		if ($query2) {
			
            return true;
        } 
		else
            return false;
		
	}
	
	
	public function updatecourseinfo($id,$crcode,$crname,$pname)
	{
		$query2 = $this->db->query("UPDATE `coursetbl` SET `course_code` = '$crcode',`course_name` = '$crname' where `C_no` = '$id'");
		if ($query2) {
			
            return true;
        } 
		else
            return false;
		
	}
	
	
	public function updatestrinfo($id,$str)
	{
		$query2 = $this->db->query("UPDATE `std_strength` SET `Std_strength` = '$str' where `sl_no` = '$id'");
		if ($query2) {
			
            return true;
        } 
		else
            return false;
		
	}
	
	public function get_ufaculty($id)
	{
		$this->db->select('*')
		->from('faculty')
		->where('Faculty_no', $id);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	public function get_ucampus($id)
	{
		$this->db->select('*')
		->from('campus')
		->where('Campus_code', $id);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	public function get_udepartment($id)
	{
		$this->db->select('*')
		->from('department')
		->where('Dept_code', $id);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	
	public function get_upgm($id)
	{
		$this->db->select('*')
		->from('programme')
		->where('Pgm_no', $id);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	public function get_ustdstr($id)
	{
		$this->db->select('*')
		->from('std_strength')
		->where('sl_no', $id);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	public function get_ucourse($id)
	{
		$this->db->select('*')
		->from('coursetbl')
		->where('C_no', $id);
		$qry = $this->db->get();
		return $qry->result();	
	
	}
	
	public function get_gfaculty($deptcode,$campuscode,$pgm)
	{
		$query=$this->db->query("select * from faculty where Dept_code=$deptcode and Campus_code=$campuscode and Pgm_name='$pgm' and P_G_faculty='Guest Faculty'");
	  
		if ($query->num_rows() > 0) {
            return $query->result();	
        } else
            return false;	
	}
	
	
	
	public function delete_faculty($id)
	{
			$this->db->where('Faculty_no', $id);
			$del=$this->db->delete('faculty');   
			return $del;
	}
	
	public function delete_campus($id)
	{
			$this->db->where('Campus_code', $id);
			$del=$this->db->delete('campus');   
			return $del;
	}
	
	public function delete_department($id)
	{
			$this->db->where('Dept_code', $id);
			$del=$this->db->delete('department');   
			return $del;
	}
	
	public function delete_programme($id)
	{
			$this->db->where('Pgm_no', $id);
			$del=$this->db->delete('programme');   
			return $del;
	}
	
	
	public function delete_course($id)
	{
			$this->db->where('C_no', $id);
			$del=$this->db->delete('coursetbl');   
			return $del;
	}
	
	public function delete_stdstr($id)
	{
			$this->db->where('sl_no', $id);
			$del=$this->db->delete('std_strength');   
			return $del;
	}
	
	
	function get_course($ccode,$dcode,$pgmname,$sem)
	{
		$query=$this->db->query("select course_code,course_name from coursetbl where Dept_code=$dcode and programme_name='$pgmname' and semester='$sem' and Campus_code=$ccode");
	  
		if ($query->num_rows() > 0) {
            return $query->result();	
        } else
            return false;
	}
	
	public function get_deptname($deptcode)
	{
		$this->db->select('Dept_name')
		->from('department')
		->where('Dept_code', $deptcode);
		$qry = $this->db->get();
		return $qry->result();	
	}
	
	
	public function getdeptcode($dname)
	{
		$this->db->select('Dept_code')
		->from('department')
		->where('Dept_name', $dname);
		$qry = $this->db->get();
		return $qry->result();	
	}
	
	function displayEx($username,$password)
	{
		  $query=$this->db->query("select * from credential where Username='$username' and Password='$password'");
		//$query=$this->db->get("faculty");
		 return $query->result();
	}
	
	function check($Ccode,$Dcode,$pgm,$Sem)
	{
		$query=$this->db->query("select * from credential where Campus_code=$Ccode and Dept_code=$Dcode and Pgm_name='$pgm' and Sem='$Sem'");
	  
		if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
	
	function checkname($name,$user)
	{
		$query=$this->db->query("select * from fb_teacher where T_name='$name' and User='$user'");
	  
		if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
	function checkc($campusname)
	{
		$query=$this->db->query("select * from campus where Campus_name='$campusname'");
	  
		if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
	
	function checkd($Ccode,$Dname)
	{
		$query=$this->db->query("select * from department where Dept_name='$Dname' and Campus_code='$Ccode'");
	  
		if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
	function checkp($Pcode,$Pname,$Dcode,$Ccode)
	{
		$query=$this->db->query("select * from programme where Campus_code='$Ccode' and Dept_code='$Dcode' and Pgm_code='$Pcode' or Pgm_name='$Pname'");
	  
		if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
	function checkcourse($code,$cname,$Sem,$Pname,$Dcode,$Ccode)
	{
		$query=$this->db->query("select * from coursetbl where campus_code='$Ccode' and dept_code='$Dcode' and programme_name='$Pname' and semester='$Sem' and course_code='$code' or course_name='$cname'");
	  
		if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
	
	function checkstr($sem,$Pname,$Dcode,$Ccode)
	{
		$query=$this->db->query("select * from std_strength where Sem='$sem' and Pgm_name='$Pname' and Dept_code='$Dcode' and Campus_code='$Ccode'");
	  
		if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
	function checkf($Ccode,$Dcode,$facultyname)
	{
		$query=$this->db->query("select * from faculty where Campus_code='$Ccode' and Dept_code='$Dcode' and Faculty_name='$facultyname'");
	  
		if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
	}
	
  
	function get_stdstrength($Ccode,$Dcode,$pgm,$Sem)
	{
		$query=$this->db->query("select * from std_strength where Campus_code=$Ccode and Dept_code=$Dcode and Pgm_name='$pgm' and Sem='$Sem'");
	  
		return $query->result();
	}
  
	function getCD($Ccode,$Dcode)
	{
	  
		$this->db->select('department.*, Campus.*');
		$this->db->from('department, Campus');
		$this->db->where('department.Dept_code',$Dcode);
		$this->db->where('Campus.Campus_code',$Ccode);
		$query=$this->db->get();
		return $query->result();
	}
  
  function getcampus()
  {
	$this->db->select('campus.*');
    $this->db->from('campus');
    $query = $this->db->get();
    return $query->result();
  }
  
  function getcampusdata()
  {
		$this->db->select('*'); 
		$this->db->order_by('Campus_code', 'DESC');
		$this->db->from('campus');
		$query = $this->db->get(); 
		return $query->result();
  }
  
  
  function deptsget($Ccode)
  {
	$this->db->select('DISTINCT(Dept_name),Dept_code');
    $this->db->from('programme');
	$this->db->where('Campus_code',$Ccode);
	$this->db->order_by("Dept_name", "asc");
	$query = $this->db->get();
	$output='';
	foreach($query->result() as $row)
		{
			$output .='<option value="'.$row->Dept_code.'">'.$row->Dept_name.'</option>';
			
		}
		return $output;
	
  }
  
  function pgmsget($Ccode,$Dcode)
  {
	$this->db->select('programme.*');
    $this->db->from('programme');
	$this->db->where('Dept_code',$Dcode);
	$this->db->where('Campus_code',$Ccode);
	$this->db->order_by("Pgm_name", "asc");
	$query = $this->db->get();
	$output='';
	foreach($query->result() as $row)
		{
			$output .='<option value="'.$row->Pgm_name.'">'.$row->Pgm_name.'</option>';
			
		}
		return $output;
	
  }
  
  
  function getdept()
  {
	$this->db->select('department.*');
    $this->db->from('department');
    $query = $this->db->get();
    return $query->result();
  }
  
  function getpcode($pname)
  {
	$this->db->select('Pgm_code');
    $this->db->from('programme');
	$this->db->where('Pgm_name',$pname);
    $query = $this->db->get();
    return $query->result();
  }
	
function getpgm()
  {
	$this->db->select('programme.*');
    $this->db->from('programme');
    $query = $this->db->get();
    return $query->result();
  }
  
  function saverec($name,$email,$phone,$city)
	{
		$query="INSERT INTO `crud`( `name`, `email`, `phone`, `city`) 
		VALUES ('$name','$email','$phone','$city')";
		$this->db->query($query);
	}
	
	function getcredential($Ccode,$Dcode,$pgm,$Sem)
	{
		$query=$this->db->query("select * from credential where Dept_code=$Dcode and Pgm_name='$pgm' and Sem='$Sem' and Campus_code=$Ccode");
	  
		$output='<table border="0" style="margin-left:auto;margin-right:auto; width="100%" cellspacing="20" cellpadding="20">';
		if ($query->num_rows() > 0) {
		foreach($query->result() as $row)
		{
			$output .='
			
			<tr><td width="70%"><b>Username: '.$row->Username.'<b></td><td width="75%"><b>Password: '.$row->Password.'<b></td></tr>';
			
		}
		$output .='</table>';
		return $output;
		}
		else
		{
			$output .= '
		  <tr>
		   <td>Credentials not Generated.. Please genarate the credentials</td>
		   <td colspan="2" align="center"><a href="viewcredentials">Back</a></td>
		  </tr>
		  ';
		  $output .= '</table>';
		  return $output;
			
		}
	}
	
	
	function getCampusDept($Ccode,$Dcode,$pgm,$Sem)
	{
		$this->db->select('department.*, Campus.*');
		$this->db->from('department, Campus');
		$this->db->where('department.Dept_code',$Dcode);
		$this->db->where('Campus.Campus_code',$Ccode);
		$query=$this->db->get();
		
		$output='<table border="0" style="margin-left:auto;margin-right:auto; width="100%" cellspacing="5" cellpadding="5">';
		
		foreach($query->result() as $row)
		{
			$output .='
			
			<tr><td width="70%"><b>Campus: '.$row->Campus_name.'<b></td><td width="60%"><b>Department: '.$row->Dept_name.'<b></td>
			<td width="60%"><b>Programme: '.$pgm.'<b></td><td width="30%"><b>Sem: '.$Sem.'<b></td></tr>';
			
			
		}
		$output .='</table>';
		return $output;
		
		
	}
	
	
	function getResponse()
	{
		
				$output=' ';
					
					$this->db->select('DISTINCT(Dept_name),Campus_code');
					$this->db->order_by("Campus_code", "asc");
					$this->db->order_by("Dept_name", "asc");
					$this->db->from('fb_course');
					$q=$this->db->get();
					
					foreach($q->result() as $c)
					{
						$campus=$c->Campus_code;
						
						$this->db->select('*');
						$this->db->from('Campus');
						$this->db->where('Campus_code',$campus);
						$q2=$this->db->get();
						
						foreach($q2->result() as $camp)
						{
							$campusname=$camp->Campus_name;
							$output .='<h4><center>'.$campusname.'<center></h4>';
						}
						
						$output .='<h4><center>Department of '.$c->Dept_name.'</center></h4>';
						$dept=$c->Dept_name;
						
						$this->db->select('DISTINCT(Pgm_name),Sem');
						$this->db->from('fb_course');
						$this->db->where('Dept_name',$dept);
						$qry=$this->db->get();
						
						foreach($qry->result() as $row)
						{
							$output .='<h4>Programme Name: '.$row->Pgm_name.' Semester: '.$row->Sem.'</h4>';
							
							$pgm=$row->Pgm_name;
							$sem=$row->Sem;
							
							$this->db->select('DISTINCT(User)');
							$this->db->from('fb_course');
							$this->db->where('Pgm_name',$pgm);
								$this->db->where('Sem',$sem);
							$qry1=$this->db->get();
							
							$output .='<table border="2" style="page-break-after:always; width="100%" cellspacing="1" cellpadding="5">';
						
								$output .='<tr><th width="5%">Feed Course No:</th>
									<th width="width="80%"">Course Name</th>
									<th width="5%">1. Depth of the course content</th>
									<th width="5%">2. Extent of coverage of the course </th>
									<th width="5%">3. Applicability / relevance of the course</th>
									<th width="5%">4. Learning value of the course in terms of knowledge, concepts and Skills.</th>
									<th width="5%">5. Clarity and relevance of the prescribed reading material.</th>
									<th width="5%">6. Relevance of additional source material (Library).</th>
									<th width="5%">7. Overall rating.</th>
									</tr>';
						
							foreach($qry1->result() as $us)
							{
								$u=$us->User;
								$user=substr($u,-3);
							
							
										$this->db->select('*');
										$this->db->from('fb_course');
										$this->db->where('User',$u);
										$query=$this->db->get();
							
										foreach($query->result() as $col)
										{
											$c=$query->num_rows();
											$output .='<tr><td rowspan="">'.$user.'</td>
											<td rowspan="">'.$col->C_name.'</td>
											<td rowspan="">'.$col->P1.'</td>
											<td rowspan="">'.$col->P2.'</td>
											<td rowspan="">'.$col->P3.'</td>
											<td rowspan="">'.$col->P4.'</td>
											<td rowspan="">'.$col->P5.'</td>
											<td rowspan="">'.$col->P6.'</td>
											<td rowspan="">'.$col->P7.'</td>
											</tr>';
											
										}
								
						}
						$output .='</table>';
						
						
					}
					
				}
		return $output;
	}
	
	
	
	public function getResponsecount()
	{
					$output=' ';
					$this->db->select('DISTINCT(Dept_name),Campus_code');
					$this->db->order_by("Campus_code", "asc");
					$this->db->order_by("Dept_name", "asc");
					$this->db->from('fb_course');
					$q=$this->db->get();
					
					foreach($q->result() as $c)
					{
						$campus=$c->Campus_code;
						
						$this->db->select('*');
						$this->db->from('Campus');
						$this->db->where('Campus_code',$campus);
						$q2=$this->db->get();
						
						foreach($q2->result() as $camp)
						{
							$campusname=$camp->Campus_name;
							$output .='<h4><center>'.$campusname.'<center></h4>';
						}
						
						$output .='<h4><center>Department of '.$c->Dept_name.'</center></h4>';
						$dept=$c->Dept_name;
						
						$this->db->select('DISTINCT(Pgm_name),Sem');
						$this->db->from('fb_course');
						$this->db->where('Dept_name',$dept);
						$qry=$this->db->get();
						
						foreach($qry->result() as $row)
						{
							$output .='<h4>Programme Name: '.$row->Pgm_name.' Semester: '.$row->Sem.'</h4>';
							
							$pgm=$row->Pgm_name;
							$sem=$row->Sem;
							
							$this->db->select('DISTINCT(C_code),C_name');
							$this->db->from('fb_course');
							$this->db->where('Pgm_name',$pgm);
								$this->db->where('Sem',$sem);
							$qry1=$this->db->get();
							
							$output .='<table  border="3" style="page-break-after:always; width="100%" cellspacing="1" cellpadding="5">';
						
						
						$output .='<tr><th width="5%">Course Code</th>
							<th width="10%">Course Name </th>
							<th width="20%">Parameters </th>
							<th width="5%">A </th>
							<th width="5%">B </th>
							<th width="5%">C </th>
							<th width="5%">D </th>
							<th width="5%">Total</th>
							</tr>';
								foreach($qry1->result() as $c1)
								{
									$cname=$c1->C_name;
									
									$this->db->select('P1,P2,P3,P4,P5,P6,P7');
									$this->db->from('fb_course');
									$this->db->where('C_name',$cname);
									$qP1=$this->db->get();
									$ap1=0;
									$bp1=0;
									$cp1=0;
									$dp1=0;
										$ap2=0;
										$bp2=0;
										$cp2=0;
										$dp2=0;
											$ap3=0;
											$bp3=0;
											$cp3=0;
											$dp3=0;
												$ap4=0;
												$bp4=0;
												$cp4=0;
												$dp4=0;
													$ap5=0;
													$bp5=0;
													$cp5=0;
													$dp5=0;
														$ap6=0;
														$bp6=0;
														$cp6=0;
														$dp6=0;
															$ap7=0;
															$bp7=0;
															$cp7=0;
															$dp7=0;
									foreach($qP1->result() as $para1)
									{
										$p1=$para1->P1;
										$p2=$para1->P2;
										$p3=$para1->P3;
										$p4=$para1->P4;
										$p5=$para1->P5;
										$p6=$para1->P6;
										$p7=$para1->P7;
										
										if($p1=='A')
										{
											$ap1=$ap1+1;
										}
										if($p1=='B')
										{
											$bp1=$bp1+1;
										}
										if($p1=='C')
										{
											$cp1=$cp1+1;
										}
										if($p1=='D')
										{
											$dp1=$dp1+1;
										}
										
											if($p2=='A')
											{
												$ap2=$ap2+1;
											}
											if($p2=='B')
											{
												$bp2=$bp2+1;
											}
											if($p2=='C')
											{
												$cp2=$cp2+1;
											}
											if($p2=='D')
											{
												$dp2=$dp2+1;
											}
												if($p3=='A')
												{
													$ap3=$ap3+1;
												}
												if($p3=='B')
												{
													$bp3=$bp3+1;
												}
												if($p3=='C')
												{
													$cp3=$cp3+1;
												}
												if($p3=='D')
												{
													$dp3=$dp3+1;
												}
												
													if($p4=='A')
													{
														$ap4=$ap4+1;
													}
													if($p4=='B')
													{
														$bp4=$bp4+1;
													}
													if($p4=='C')
													{
														$cp4=$cp4+1;
													}
													if($p4=='D')
													{
														$dp4=$dp4+1;
													}
														if($p5=='A')
														{
															$ap5=$ap5+1;
														}
														if($p5=='B')
														{
															$bp5=$bp5+1;
														}
														if($p5=='C')
														{
															$cp5=$cp5+1;
														}
														if($p5=='D')
														{
															$dp5=$dp5+1;
														}
															if($p6=='A')
															{
																$ap6=$ap6+1;
															}
															if($p6=='B')
															{
																$bp6=$bp6+1;
															}
															if($p6=='C')
															{
																$cp6=$cp6+1;
															}
															if($p6=='D')
															{
																$dp6=$dp6+1;
															}
																if($p7=='A')
																{
																	$ap7=$ap7+1;
																}
																if($p7=='B')
																{
																	$bp7=$bp7+1;
																}
																if($p7=='C')
																{
																	$cp7=$cp7+1;
																}
																if($p7=='D')
																{
																	$dp7=$dp7+1;
																}
										
									}
									$total1=$ap1+$bp1+$cp1+$dp1;
											$total2=$ap2+$bp2+$cp2+$dp2;
											$total3=$ap3+$bp3+$cp3+$dp3;
											$total4=$ap4+$bp4+$cp4+$dp4;
											$total5=$ap5+$bp5+$cp5+$dp5;
											$total6=$ap6+$bp6+$cp6+$dp6;
											$total7=$ap7+$bp7+$cp7+$dp7;
									
									$output .='<tr><td width="9%">'.$c1->C_code.'</td>
									<td width="28%">'.$c1->C_name.'</td>
									
									<td width="55%">1. Depth of the course content</td><td width="3%">'.$ap1.'</td><td width="3%">'.$bp1.'</td><td width="3%">'.$cp1.'</td><td width="3%">'.$dp1.'</td><td td width="3%">'.$total1.'</td></tr>
									
										<tr>
										<td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
									<td style="border: 0;"></td><td>2. Extent of coverage of the course</td><td>'.$ap2.'</td><td>'.$bp2.'</td><td>'.$cp2.'</td><td>'.$dp2.'</td><td>'.$total2.'</td>
										</tr>
										
										<tr>
										<td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
									<td style="border: 0;"></td><td>3. Applicability/relevance of the course</td><td>'.$ap3.'</td><td>'.$bp3.'</td><td>'.$cp3.'</td><td>'.$dp3.'</td><td>'.$total3.'</td>
										</tr>
										
										<tr>
										<td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
									<td style="border: 0;"></td><td>4. Learning value of the course in terms of knowledge, concepts and Skills.</td><td>'.$ap4.'</td><td>'.$bp4.'</td><td>'.$cp4.'</td><td>'.$dp4.'</td><td>'.$total4.'</td>
										</tr>
										
										
										<tr>
										<td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
									<td style="border: 0;"></td><td>5. Clarity and relevance of the prescribed reading material.</td><td>'.$ap5.'</td><td>'.$bp5.'</td><td>'.$cp5.'</td><td>'.$dp5.'</td><td>'.$total5.'</td>
										</tr>
										
										<tr>
										<td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
									<td style="border: 0;"></td><td>6. Relevance of additional source material (Library).</td><td>'.$ap6.'</td><td>'.$bp6.'</td><td>'.$cp6.'</td><td>'.$dp6.'</td><td>'.$total6.'</td>
										</tr>
										
										<tr>
										<td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
									<td style="border: 0;"></td><td>7. Overall rating.</td><td>'.$ap7.'</td><td>'.$bp7.'</td><td>'.$cp7.'</td><td>'.$dp7.'</td><td>'.$total7.'</td>
										</tr>
									
									
									';
								}
								$output .='</table>';
						}
					}	
					
		
		return $output;
		
		
	}
	
	
	
	
	public function getResponseanalysis()
	{
		$output=' ';
					$this->db->select('DISTINCT(Dept_name),Campus_code');
					$this->db->order_by("Campus_code", "asc");
					$this->db->order_by("Dept_name", "asc");
					$this->db->from('fb_course');
					$q=$this->db->get();
					
					foreach($q->result() as $c)
					{
						$campus=$c->Campus_code;
					
						$dept=$c->Dept_name;
						
						
						$this->db->select('Campus_name');
							$this->db->from('Campus');
							$this->db->where('Campus_code',$campus);
							$qcamp=$this->db->get();
							
							foreach($qcamp->result() as $q3)
							{
								$campusname=$q3->Campus_name;
								
								$output .='<h4><center>'.$campusname.'<center></h4>';
							}
							
											
						$output .='<h4><center>Department of '.$c->Dept_name.'</center></h4>';
						
						
						$this->db->select('DISTINCT(Pgm_name),Sem');
						$this->db->from('fb_course');
						$this->db->where('Dept_name',$dept);
						$qry=$this->db->get();
						
						
						
						
						foreach($qry->result() as $row)
						{
							
							$pgm=$row->Pgm_name;
							$sem=$row->Sem;
							
							$output .='<h4>Programme: '.$pgm.'</center></h4>';
							$output .='<h4>Semester: '.$sem.'</center></h4>';
							
							$this->db->select('DISTINCT(C_code),C_name');
							$this->db->from('fb_course');
							$this->db->where('Pgm_name',$pgm);
								$this->db->where('Sem',$sem);
							$qry1=$this->db->get();
							
							
							$this->db->select('DISTINCT(User)');
							$this->db->from('fb_course');
							$this->db->where('Pgm_name',$pgm);
							$this->db->where('Sem',$sem);
							$quser=$this->db->get();
								
							$n=$quser->num_rows();
								
							$A=4;
							$B=3;
							$C=2;
							$D=1;
							
							
								$a1=3*$A*$n;
								$b1=3*$B*$n;
								$c1=3*$C*$n;		
								$d1=3*$D*$n;

								$a3=1.5*$A*$n;
								$b3=1.5*$B*$n;
								$c3=1.5*$C*$n;		
								$d3=1.5*$D*$n;	

								$a4=1*$A*$n;
								$b4=1*$B*$n;
								$c4=1*$C*$n;		
								$d4=1*$D*$n;

								$a6=0.5*$A*$n;
								$b6=0.5*$B*$n;
								$c6=0.5*$C*$n;		
								$d6=0.5*$D*$n;								
	
							$totala=$a1+$a1+$a3+$a4+$a4+$a6;	
							$totalb=$b1+$b1+$b3+$b4+$b4+$b6;	
							$totalc=$c1+$c1+$c3+$c4+$c4+$c6;
							$totald=$d1+$d1+$d3+$d4+$d4+$d6;
							
							$output .='<table border="2" style="page-break-after:always; width="100%" cellspacing="1" cellpadding="5">';
						
									$output .='<tr>
									<th width="width="80%"">Course Code</th>
									<th width="5%">Course Name</th>
									<th width="5%">Paper Impact in %</th>
									</tr>';
							
							
							foreach($qry1->result() as $c1)
							{
									$cname=$c1->C_name;
									$ccode=$c1->C_code;
									
									/*$output .='<h4>Course Name: '.$cname.'</h4>';
									
									$output .='<table border="2" style="page-break-after:always; width="100%" cellspacing="1" cellpadding="5">';
							
									$output .='<tr><th width="5%">Question Number</th>
									<th width="width="80%"">Weightage</th>
									<th width="width="80%"">Grade Points</th>
									<th width="width="80%"">Grade Points</th>
									<th width="width="80%"">Grade Points</th>
									<th width="width="80%"">Grade Points</th>
									</tr>';*/
									
									
									$this->db->select('P1,P2,P3,P4,P5,P6,P7');
									$this->db->from('fb_course');
									$this->db->where('C_name',$cname);
									$qP1=$this->db->get();
									$ap1=0;
									$bp1=0;
									$cp1=0;
									$dp1=0;
										$ap2=0;
										$bp2=0;
										$cp2=0;
										$dp2=0;
											$ap3=0;
											$bp3=0;
											$cp3=0;
											$dp3=0;
												$ap4=0;
												$bp4=0;
												$cp4=0;
												$dp4=0;
													$ap5=0;
													$bp5=0;
													$cp5=0;
													$dp5=0;
														$ap6=0;
														$bp6=0;
														$cp6=0;
														$dp6=0;
															$ap7=0;
															$bp7=0;
															$cp7=0;
															$dp7=0;
									
							
									foreach($qP1->result() as $para1)
									{
										$n=$qP1->num_rows();
										
										$p1=$para1->P1;
										$p2=$para1->P2;
										$p3=$para1->P3;
										$p4=$para1->P4;
										$p5=$para1->P5;
										$p6=$para1->P6;
										$p7=$para1->P7;
										
										if($p1=='A')
										{
											$ap1=$ap1+1;
										}
										if($p1=='B')
										{
											$bp1=$bp1+1;
										}
										if($p1=='C')
										{
											$cp1=$cp1+1;
										}
										if($p1=='D')
										{
											$dp1=$dp1+1;
										}
										
											if($p2=='A')
											{
												$ap2=$ap2+1;
											}
											if($p2=='B')
											{
												$bp2=$bp2+1;
											}
											if($p2=='C')
											{
												$cp2=$cp2+1;
											}
											if($p2=='D')
											{
												$dp2=$dp2+1;
											}
												if($p3=='A')
												{
													$ap3=$ap3+1;
												}
												if($p3=='B')
												{
													$bp3=$bp3+1;
												}
												if($p3=='C')
												{
													$cp3=$cp3+1;
												}
												if($p3=='D')
												{
													$dp3=$dp3+1;
												}
												
													if($p4=='A')
													{
														$ap4=$ap4+1;
													}
													if($p4=='B')
													{
														$bp4=$bp4+1;
													}
													if($p4=='C')
													{
														$cp4=$cp4+1;
													}
													if($p4=='D')
													{
														$dp4=$dp4+1;
													}
														if($p5=='A')
														{
															$ap5=$ap5+1;
														}
														if($p5=='B')
														{
															$bp5=$bp5+1;
														}
														if($p5=='C')
														{
															$cp5=$cp5+1;
														}
														if($p5=='D')
														{
															$dp5=$dp5+1;
														}
															if($p6=='A')
															{
																$ap6=$ap6+1;
															}
															if($p6=='B')
															{
																$bp6=$bp6+1;
															}
															if($p6=='C')
															{
																$cp6=$cp6+1;
															}
															if($p6=='D')
															{
																$dp6=$dp6+1;
															}
																if($p7=='A')
																{
																	$ap7=$ap7+1;
																}
																if($p7=='B')
																{
																	$bp7=$bp7+1;
																}
																if($p7=='C')
																{
																	$cp7=$cp7+1;
																}
																if($p7=='D')
																{
																	$dp7=$dp7+1;
																}
									}
									
									$A=4;
									$B=3;
									$C=2;
									$D=1;
									
									$ap1=3*$A*$ap1;
									$bp1=3*$B*$bp1;
									$cp1=3*$C*$cp1;
									$dp1=3*$D*$dp1;
									
										$ap2=3*$A*$ap2;
										$bp2=3*$B*$bp2;
										$cp2=3*$C*$cp2;
										$dp2=3*$D*$dp2;
										
											$ap3=1.5*$A*$ap3;
											$bp3=1.5*$B*$bp3;
											$cp3=1.5*$C*$cp3;
											$dp3=1.5*$D*$dp3;
											
												$ap4=1*$A*$ap4;
												$bp4=1*$B*$bp4;
												$cp4=1*$C*$cp4;
												$dp4=1*$D*$dp4;
												
													$ap5=1*$A*$ap5;
													$bp5=1*$B*$bp5;
													$cp5=1*$C*$cp5;
													$dp5=1*$D*$dp5;
													
														$ap6=0.5*$A*$ap6;
														$bp6=0.5*$B*$bp6;
														$cp6=0.5*$C*$cp6;
														$dp6=0.5*$D*$dp6;
														
														
									$tp1=$ap1+$ap2+$ap3+$ap4+$ap5+$ap6;
									$tp2=$bp1+$bp2+$bp3+$bp4+$bp5+$bp6;
									$tp3=$cp1+$cp2+$cp3+$cp4+$cp5+$cp6;
									$tp4=$dp1+$dp2+$dp3+$dp4+$dp5+$dp6;
									
									
									$Totalpoints=$tp1+$tp2+$tp3+$tp4;
									
									$percentage=$Totalpoints*100/$totala;
									
									/*$output .='<tr><td width="5%">1</td>
									<td width="5%">3</td>
									<td width="5%">'.$ap1.'</td>
									<td width="5%">'.$bp1.'</td>
									<td width="5%">'.$cp1.'</td>
									<td width="5%">'.$dp1.'</td>
									</tr>';
									
									$output .='<tr><td width="5%">2</td>
									<td width="5%">3</td>
									<td width="5%">'.$ap2.'</td>
									<td width="5%">'.$bp2.'</td>
									<td width="5%">'.$cp2.'</td>
									<td width="5%">'.$dp2.'</td>
									</tr>';
									
									
							$output .='<tr><td width="5%">3</td>
									<td width="5%">1.5</td>
									<td width="5%">'.$ap3.'</td>
									<td width="5%">'.$bp3.'</td>
									<td width="5%">'.$cp3.'</td>
									<td width="5%">'.$dp3.'</td>
									</tr>';
									
							$output .='<tr><td width="5%">4</td>
									<td width="5%">1</td>
									<td width="5%">'.$ap4.'</td>
									<td width="5%">'.$bp4.'</td>
									<td width="5%">'.$cp4.'</td>
									<td width="5%">'.$dp4.'</td>
									</tr>';
									
							$output .='<tr><td width="5%">5</td>
									<td width="5%">1</td>
									<td width="5%">'.$ap5.'</td>
									<td width="5%">'.$ap5.'</td>
									<td width="5%">'.$ap5.'</td>
									<td width="5%">'.$ap5.'</td>
									</tr>';
									
									
							$output .='<tr><td width="5%">6</td>
									<td width="5%">0.5</td>
									<td width="5%">'.$ap6.'</td>
									<td width="5%">'.$bp6.'</td>
									<td width="5%">'.$cp6.'</td>
									<td width="5%">'.$dp6.'</td>
									</tr>';
									
									
							$output .='<tr><td width="5%">Total</td>
									<td width="5%"></td>
									<td width="5%">'.$tp1.'</td>
									<td width="5%">'.$tp2.'</td>
									<td width="5%">'.$tp3.'</td>
									<td width="5%">'.$tp4.'</td>
									</tr>';
									
									$output .='<tr><td width="5%">MAX Total</td>
									<td width="5%"></td>
									<td width="5%">'.$totala.'</td>
									<td width="5%">'.$totalb.'</td>
									<td width="5%">'.$totalc.'</td>
									<td width="5%">'.$totald.'</td>
									</tr>';
									
									$output .='<tr><td width="5%">Percentage</td>
									<td width="5%"></td>
									<td width="5%">'.$percentage.'</td>
									
									</tr>';
									
							
									$output .='</table>';*/
									
									
											$output .='<tr>
											<td>'.$ccode.'</td>
											<td>'.$cname.'</td>
											<td>'.$percentage.'</td>
											</tr>';
									
							}
							$output .='</table>';
								
						}
					}	
					
		
		return $output;
		
		
	}
	
	
	
	function getResponseQ2()
	{
		
				$output=' ';
				
					$this->db->select('DISTINCT(Dept_name),Campus_code');
					
					$this->db->order_by("Campus_code", "asc");
					$this->db->from('fb_teacher');
					$q=$this->db->get();
					
					foreach($q->result() as $c)
					{
						$dept=$c->Dept_name;
						$ccode=$c->Campus_code;
						
							$this->db->select('Campus_name');
							$this->db->from('Campus');
							$this->db->where('Campus_code',$ccode);
							$qcamp=$this->db->get();
							
							foreach($qcamp->result() as $q3)
							{
								$campusname=$q3->Campus_name;
								
								$output .='<h4><center>'.$campusname.'<center></h4>';
							}
							
											
						$output .='<h4><center>Department of '.$c->Dept_name.'</center></h4>';
						$dept=$c->Dept_name;
						
						$this->db->select('Faculty_name,F_code');
						$this->db->from('faculty');
						$this->db->where('Dept_name',$dept);
						$this->db->where('Campus_code',$ccode);
						$this->db->where('P_G_Faculty','Permanent Faculty');
						$qry=$this->db->get();
						
						$output .='<table border="2" style="page-break-after:always; width="100%" cellspacing="1" cellpadding="5">';
						
								$output .='<tr><th width="5%">Feedback No</th>
								
								<th width="20%">Parameters </th>';
								$i=0;
								$Farray=[];
								
								foreach($qry->result() as $col)
								{
									
									$output .='<th width="5%">'.$col->F_code.' </th>';
									
									$Farray[$i]=$col->Faculty_name;
									
									$i=$i+1;
								}
					
								$this->db->select('DISTINCT(User)');
								$this->db->from('fb_teacher');
								$this->db->where('Dept_name',$dept);
								$qryuser=$this->db->get();
								
								foreach($qryuser->result() as $ud)
								{
									$u=$ud->User;
									$user=substr($u,-3);
									
									$this->db->select('T_name,P1');
									$this->db->from('fb_teacher');
									$this->db->where('User',$u);
									$qdet=$this->db->get();
								
									$k=0;
									$output .='</tr><tr><td width="9%">'.$user.'</td>
										<td>1. 	Knowledge base of the Teacher</td>';
									
										
										foreach($qdet->result() as $qd)
										{
											$res=0;
											$name= trim($qd->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												$a=0;
												$tname = trim($Farray[$k]);
												
												$n= strlen($name);
												$t= strlen($tname);
											
												//$a=strcmp( $name, $tname );
											
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd->P1;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										$output .='</tr>';
										
										$this->db->select('T_name,P2');
										$this->db->from('fb_teacher');
										$this->db->where('User',$u);
										$qdet2=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>2. 	Communication Skills of the Teacher</td>';
										foreach($qdet2->result() as $qd2)
										{
											$res=0;
											$name= trim($qd2->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd2->P2;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										$output .='</tr>';
										
										
										$this->db->select('T_name,P3');
										$this->db->from('fb_teacher');
										$this->db->where('User',$u);
										$qdet3=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>3. 	Sincerity/Commitment of the Teacher</td>';
										
										foreach($qdet3->result() as $qd3)
										{
											$res=0;
											$name= trim($qd3->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd3->P3;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										$output .='</tr>';
										
										$this->db->select('T_name,P4');
										$this->db->from('fb_teacher');
										$this->db->where('User',$u);
										$qdet4=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>4. 	Interest generated by the Teacher</td>';
										foreach($qdet4->result() as $qd4)
										{
											$res=0;
											$name= trim($qd4->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd4->P4;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										$output .='</tr>';
										
										$this->db->select('T_name,P5');
										$this->db->from('fb_teacher');
										$this->db->where('User',$u);
										$qdet5=$this->db->get();
								
										$k=0;
										
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>5. 	Ability of the Teacher to integate the course content with other courses to provide a broader perspective</td>';
										foreach($qdet5->result() as $qd5)
										{
											$res=0;
											$name= trim($qd5->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd5->P5;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										
										
										$output .='</tr>';
										
										$this->db->select('T_name,P6');
										$this->db->from('fb_teacher');
										$this->db->where('User',$u);
										$qdet6=$this->db->get();
								
										$k=0;
										
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>6. 	Accessibility of the Teacher in the department for further academic discussion</td>';
										foreach($qdet6->result() as $qd6)
										{
											$res=0;
											$name= trim($qd6->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd6->P6;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										
										
										
										$output .='</tr>';
										
										$this->db->select('T_name,P7');
										$this->db->from('fb_teacher');
										$this->db->where('User',$u);
										$qdet7=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>7. 	Ability of the Teacher to design methods to evaluate the students understanding of the course</td>';
										
										foreach($qdet7->result() as $qd7)
										{
											$res=0;
											$name= trim($qd7->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd7->P7;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}

										$output .='</tr>';
										
										$this->db->select('T_name,P8');
										$this->db->from('fb_teacher');
										$this->db->where('User',$u);
										$qdet8=$this->db->get();
								
										$k=0;
										
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>8. 	Regularity and Punctuality of the Teacher</td>';
										
										foreach($qdet8->result() as $qd8)
										{
											$res=0;
											$name= trim($qd8->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd8->P8;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										$output .='</tr>';
										
										$this->db->select('T_name,P9');
										$this->db->from('fb_teacher');
										$this->db->where('User',$u);
										$qdet9=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>9. 	Overall ratings</td>';
										foreach($qdet9->result() as $qd9)
										{
											$res=0;
											$name= trim($qd9->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd9->P9;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										$output .='</tr>';
										
										
								}
								
								$output .='</table>';
					}
						
					
		return $output;
		
	}
	
	
	
	function getResponseQ2Guest()
	{
		
				$output=' ';
				
					$this->db->select('DISTINCT(Dept_name),Campus_code');
					
					$this->db->order_by("Campus_code", "asc");
					$this->db->from('fb_gteacher');
					$q=$this->db->get();
					
					foreach($q->result() as $c)
					{
						$dept=$c->Dept_name;
						$ccode=$c->Campus_code;
						
							$this->db->select('Campus_name');
							$this->db->from('Campus');
							$this->db->where('Campus_code',$ccode);
							$qcamp=$this->db->get();
							
							foreach($qcamp->result() as $q3)
							{
								$campusname=$q3->Campus_name;
								
								$output .='<h4><center>'.$campusname.'<center></h4>';
							}
							
											
						$output .='<h4><center>Department of '.$c->Dept_name.'</center></h4>';
						$dept=$c->Dept_name;
						
							$this->db->select('DISTINCT(Pgm_name)');
							$this->db->from('fb_gteacher');
							$this->db->where('Dept_name',$dept);
							$qpgm=$this->db->get();
							
					foreach($qpgm->result() as $qpg)
					{
								$Pname=$qpg->Pgm_name;
								$output .='<h4>Programme :'.$Pname.'</h4>';
							
						
						$this->db->select('Faculty_name,F_code');
						$this->db->from('faculty');
						$this->db->where('Pgm_name',$Pname);
						$this->db->where('Dept_name',$dept);
						$this->db->where('Campus_code',$ccode);
						$this->db->where('P_G_Faculty','Guest Faculty');
						$qry=$this->db->get();
						
						$output .='<table border="2" style="page-break-after:always; width="100%" cellspacing="1" cellpadding="5">';
						
								$output .='<tr><th width="5%">Feedback No</th>
								
								<th width="20%">Parameters </th>';
								$i=0;
								$Farray=[];
								
								foreach($qry->result() as $col)
								{
									
									$output .='<th width="5%">'.$col->F_code.' </th>';
									
									$Farray[$i]=$col->Faculty_name;
									
									$i=$i+1;
								}
					
								$this->db->select('DISTINCT(User)');
								$this->db->from('fb_gteacher');
								$this->db->where('Dept_name',$dept);
								$qryuser=$this->db->get();
								
								foreach($qryuser->result() as $ud)
								{
									$u=$ud->User;
									$user=substr($u,-3);
									
									$this->db->select('T_name,P1');
									$this->db->from('fb_gteacher');
									$this->db->where('User',$u);
									$qdet=$this->db->get();
								
									$k=0;
									$output .='</tr><tr><td width="9%">'.$user.'</td>
										<td>1. 	Knowledge base of the Teacher</td>';
									
										
										foreach($qdet->result() as $qd)
										{
											$res=0;
											$name= trim($qd->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												$a=0;
												$tname = trim($Farray[$k]);
												
												$n= strlen($name);
												$t= strlen($tname);
											
												//$a=strcmp( $name, $tname );
											
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd->P1;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										$output .='</tr>';
										
										$this->db->select('T_name,P2');
										$this->db->from('fb_gteacher');
										$this->db->where('User',$u);
										$qdet2=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>2. 	Communication Skills of the Teacher</td>';
										foreach($qdet2->result() as $qd2)
										{
											$res=0;
											$name= trim($qd2->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd2->P2;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										$output .='</tr>';
										
										
										$this->db->select('T_name,P3');
										$this->db->from('fb_gteacher');
										$this->db->where('User',$u);
										$qdet3=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>3. 	Sincerity/Commitment of the Teacher</td>';
										
										foreach($qdet3->result() as $qd3)
										{
											$res=0;
											$name= trim($qd3->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd3->P3;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										$output .='</tr>';
										
										$this->db->select('T_name,P4');
										$this->db->from('fb_gteacher');
										$this->db->where('User',$u);
										$qdet4=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>4. 	Interest generated by the Teacher</td>';
										foreach($qdet4->result() as $qd4)
										{
											$res=0;
											$name= trim($qd4->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd4->P4;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										$output .='</tr>';
										
										$this->db->select('T_name,P5');
										$this->db->from('fb_gteacher');
										$this->db->where('User',$u);
										$qdet5=$this->db->get();
								
										$k=0;
										
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>5. 	Ability of the Teacher to integate the course content with other courses to provide a broader perspective</td>';
										foreach($qdet5->result() as $qd5)
										{
											$res=0;
											$name= trim($qd5->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd5->P5;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										
										
										$output .='</tr>';
										
										$this->db->select('T_name,P6');
										$this->db->from('fb_gteacher');
										$this->db->where('User',$u);
										$qdet6=$this->db->get();
								
										$k=0;
										
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>6. 	Accessibility of the Teacher in the department for further academic discussion</td>';
										foreach($qdet6->result() as $qd6)
										{
											$res=0;
											$name= trim($qd6->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd6->P6;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										
										
										
										$output .='</tr>';
										
										$this->db->select('T_name,P7');
										$this->db->from('fb_gteacher');
										$this->db->where('User',$u);
										$qdet7=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>7. 	Ability of the Teacher to design methods to evaluate the students understanding of the course</td>';
										
										foreach($qdet7->result() as $qd7)
										{
											$res=0;
											$name= trim($qd7->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd7->P7;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}

										$output .='</tr>';
										
										$this->db->select('T_name,P8');
										$this->db->from('fb_gteacher');
										$this->db->where('User',$u);
										$qdet8=$this->db->get();
								
										$k=0;
										
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>8. 	Regularity and Punctuality of the Teacher</td>';
										
										foreach($qdet8->result() as $qd8)
										{
											$res=0;
											$name= trim($qd8->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd8->P8;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										$output .='</tr>';
										
										$this->db->select('T_name,P9');
										$this->db->from('fb_gteacher');
										$this->db->where('User',$u);
										$qdet9=$this->db->get();
								
										$k=0;
										$output .='</tr><tr><td style="border-left-style:hidden;border-top-style:hidden;border-bottom-style:hidden;"></td>
										<td>9. 	Overall ratings</td>';
										foreach($qdet9->result() as $qd9)
										{
											$res=0;
											$name= trim($qd9->T_name);
											
											for(;$k<=$i-1; $k++ )
											{
												
												$tname = trim($Farray[$k]);
												
												
												if(strcasecmp($name, $tname) == 0)
												{
													$res=$qd9->P9;												
													
													$output .='<td>'.$res.'</td>';
													$k=$k+1;
													break;
												
												}
												else
												{
												
												$res=" ";
												$output .='<td>'.$res.'</td>';
												
												}
												
											}
											
										}
										
										$output .='</tr>';
										
										
								}
								
								$output .='</table>';
					}
			}
						
					
		return $output;
		
	}
	
	
	
	public function getResponseanalysisQ2()
	{
		$output=' ';
					$this->db->select('DISTINCT(Dept_name),Campus_code');
					$this->db->order_by("Campus_code", "asc");
					$this->db->order_by("Dept_name", "asc");
					$this->db->from('fb_teacher');
					$q=$this->db->get();
					
					foreach($q->result() as $c)
					{
						$campus=$c->Campus_code;
					
						$dept=$c->Dept_name;
						
						$this->db->select('Campus_name');
							$this->db->from('Campus');
							$this->db->where('Campus_code',$campus);
							$qcamp=$this->db->get();
							
							foreach($qcamp->result() as $q3)
							{
								$campusname=$q3->Campus_name;
								
								$output .='<h4><center>'.$campusname.'<center></h4>';
							}
							
											
						$output .='<h4><center>Department of '.$c->Dept_name.'</center></h4>';
						
									$this->db->select('DISTINCT(User)');
									$this->db->from('fb_teacher');
									$this->db->where('Dept_name',$dept);
									$quser=$this->db->get();
										
									$n=$quser->num_rows();
										
									$A=4;
									$B=3;
									$C=2;
									$D=1;
									
									
										$a1=3*$A*$n;
										$b1=3*$B*$n;
										$c1=3*$C*$n;		
										$d1=3*$D*$n;

										$a3=1.5*$A*$n;
										$b3=1.5*$B*$n;
										$c3=1.5*$C*$n;		
										$d3=1.5*$D*$n;	

										$a4=1*$A*$n;
										$b4=1*$B*$n;
										$c4=1*$C*$n;		
										$d4=1*$D*$n;

										$a6=0.5*$A*$n;
										$b6=0.5*$B*$n;
										$c6=0.5*$C*$n;		
										$d6=0.5*$D*$n;								
			
									$totala=$a1+$a1+$a3+$a4+$a4+$a6;	
									$totalb=$b1+$b1+$b3+$b4+$b4+$b6;	
									$totalc=$c1+$c1+$c3+$c4+$c4+$c6;
									$totald=$d1+$d1+$d3+$d4+$d4+$d6;
						
						
						
							$this->db->select('DISTINCT(T_name)');
							$this->db->from('fb_teacher');
							$this->db->where('Dept_name',$dept);
							$this->db->where('Campus_code',$campus);
							$qf=$this->db->get();
								foreach($qf->result() as $f)
								{
									$fname=$f->T_name;
									
									
									$output .='<table border="2" style="page-break-after:always; width="100%" cellspacing="1" cellpadding="5">';
						
									$output .='<tr><th>Parameters</th>
									<th colspan="5">'.$fname.'</th>
									</tr>';
									
									$this->db->select('P1,P2,P3,P4,P5,P6,P7,P8,P9');
									$this->db->from('fb_teacher');
									$this->db->where('T_name',$fname);
									$qp=$this->db->get();
									
									$ap1=0;
									$bp1=0;
									$cp1=0;
									$dp1=0;
									$xp1=0;
									
										$ap2=0;
										$bp2=0;
										$cp2=0;
										$dp2=0;
										$xp2=0;
											$ap3=0;
											$bp3=0;
											$cp3=0;
											$dp3=0;
											$xp3=0;
											
												$ap4=0;
												$bp4=0;
												$cp4=0;
												$dp4=0;
												$xp4=0;
													$ap5=0;
													$bp5=0;
													$cp5=0;
													$dp5=0;
													$xp5=0;
														$ap6=0;
														$bp6=0;
														$cp6=0;
														$dp6=0;
														$xp6=0;
															$ap7=0;
															$bp7=0;
															$cp7=0;
															$dp7=0;
															$xp7=0;
																$ap8=0;
																$bp8=0;
																$cp8=0;
																$dp8=0;
																$xp8=0;
																	$ap9=0;
																	$bp9=0;
																	$cp9=0;
																	$dp9=0;
																	$xp9=0;
									
									
									foreach($qp->result() as $p)
									{
										$p1=$p->P1;
										$p2=$p->P2;
										$p3=$p->P3;
										$p4=$p->P4;
										$p5=$p->P5;
										$p6=$p->P6;
										$p7=$p->P7;
										$p8=$p->P8;
										$p9=$p->P9;
										
										if($p1=='A')
										{
											$ap1=$ap1+1;
										}
										if($p1=='B')
										{
											$bp1=$bp1+1;
										}
										if($p1=='C')
										{
											$cp1=$cp1+1;
										}
										if($p1=='D')
										{
											$dp1=$dp1+1;
										}
										if($p1=='X')
										{
											$xp1=$xp1+1;
										}
										
											if($p2=='A')
											{
												$ap2=$ap2+1;
											}
											if($p2=='B')
											{
												$bp2=$bp2+1;
											}
											if($p2=='C')
											{
												$cp2=$cp2+1;
											}
											if($p2=='D')
											{
												$dp2=$dp2+1;
											}
											if($p2=='X')
											{
												$xp2=$xp2+1;
											}
												if($p3=='A')
												{
													$ap3=$ap3+1;
												}
												if($p3=='B')
												{
													$bp3=$bp3+1;
												}
												if($p3=='C')
												{
													$cp3=$cp3+1;
												}
												if($p3=='D')
												{
													$dp3=$dp3+1;
												}
												if($p3=='X')
												{
													$xp3=$xp3+1;
												}
												
													if($p4=='A')
													{
														$ap4=$ap4+1;
													}
													if($p4=='B')
													{
														$bp4=$bp4+1;
													}
													if($p4=='C')
													{
														$cp4=$cp4+1;
													}
													if($p4=='D')
													{
														$dp4=$dp4+1;
													}
													if($p4=='X')
													{
														$xp4=$xp4+1;
													}
														if($p5=='A')
														{
															$ap5=$ap5+1;
														}
														if($p5=='B')
														{
															$bp5=$bp5+1;
														}
														if($p5=='C')
														{
															$cp5=$cp5+1;
														}
														if($p5=='D')
														{
															$dp5=$dp5+1;
														}
														if($p5=='X')
														{
															$xp5=$xp5+1;
														}
															if($p6=='A')
															{
																$ap6=$ap6+1;
															}
															if($p6=='B')
															{
																$bp6=$bp6+1;
															}
															if($p6=='C')
															{
																$cp6=$cp6+1;
															}
															if($p6=='D')
															{
																$dp6=$dp6+1;
															}
															if($p6=='X')
															{
																$xp6=$xp6+1;
															}
																if($p7=='A')
																{
																	$ap7=$ap7+1;
																}
																if($p7=='B')
																{
																	$bp7=$bp7+1;
																}
																if($p7=='C')
																{
																	$cp7=$cp7+1;
																}
																if($p7=='D')
																{
																	$dp7=$dp7+1;
																}
																if($p7=='X')
																{
																	$xp7=$xp7+1;
																}
																
																	if($p8=='A')
																	{
																		$ap8=$ap8+1;
																	}
																	if($p8=='B')
																	{
																		$bp8=$bp8+1;
																	}
																	if($p8=='C')
																	{
																		$cp8=$cp8+1;
																	}
																	if($p8=='D')
																	{
																		$dp8=$dp8+1;
																	}
																	if($p8=='X')
																	{
																		$xp8=$xp8+1;
																	}
																	
																		if($p9=='A')
																		{
																			$ap9=$ap9+1;
																		}
																		if($p9=='B')
																		{
																			$bp9=$bp9+1;
																		}
																		if($p9=='C')
																		{
																			$cp9=$cp9+1;
																		}
																		if($p9=='D')
																		{
																			$dp9=$dp9+1;
																		}
																		if($p9=='X')
																		{
																			$xp9=$xp9+1;
																		}
									}
									$tp1=$ap1+$ap2+$ap3+$ap4+$ap5+$ap6+$ap7+$ap8+$ap9;
									$tp2=$bp1+$bp2+$bp3+$bp4+$bp5+$bp6+$bp7+$bp8+$bp9;
									$tp3=$cp1+$cp2+$cp3+$cp4+$cp5+$cp6+$cp7+$cp8+$cp9;
									$tp4=$dp1+$dp2+$dp3+$dp4+$dp5+$dp6+$dp7+$dp8+$dp9;
									$tx5=$xp1+$xp2+$xp3+$xp4+$xp5+$xp6+$xp7+$xp8+$xp9;
									
									
									
									$Totalpoints=$tp1+$tp2+$tp3+$tp4+$tx5;
									
									$percentage=$Totalpoints*100/$totala;
									
									$output .='<tr><td></td>
									<td>A</td><td>B</td><td>C</td><td>D</td><td>X</td>
									</tr>';
									
									
									$output .='<tr><td>1. Knowledge base of the Teacher</td>
									<td>'.$ap1.'</td><td>'.$bp1.'</td><td>'.$cp1.'</td><td>'.$dp1.'</td><td>'.$xp1.'</td>
									</tr>';
									
									$output .='<tr><td>2. Communication Skills of the Teacher</td>
									<td>'.$ap2.'</td><td>'.$bp2.'</td><td>'.$cp2.'</td><td>'.$dp2.'</td><td>'.$xp2.'</td>
									</tr>';
									
									$output .='<tr><td>3. Sincerity/Commitment of the Teacher</td>
									<td>'.$ap3.'</td><td>'.$bp3.'</td><td>'.$cp3.'</td><td>'.$dp3.'</td><td>'.$xp3.'</td>
									</tr>';
									
									$output .='<tr><td>4. 	Interest generated by the Teacher</td>
									<td>'.$ap4.'</td><td>'.$bp4.'</td><td>'.$cp4.'</td><td>'.$dp4.'</td><td>'.$xp4.'</td>
									</tr>';
									
									$output .='<tr><td>5. 	Ability of the Teacher to integate the course content with other courses to provide a broader perspective</td>
									<td>'.$ap5.'</td><td>'.$bp5.'</td><td>'.$cp5.'</td><td>'.$dp5.'</td><td>'.$xp5.'</td>
									</tr>';
									
									
									$output .='<tr><td>6. 	Accessibility of the Teacher in the department for further academic discussion</td>
									<td>'.$ap6.'</td><td>'.$bp6.'</td><td>'.$cp6.'</td><td>'.$dp6.'</td><td>'.$xp6.'</td>
									</tr>';
									
									
									$output .='<tr><td>7. 	Ability of the Teacher to design methods to evaluate the students understanding of the course</td>
									<td>'.$ap7.'</td><td>'.$bp7.'</td><td>'.$cp7.'</td><td>'.$dp7.'</td><td>'.$xp7.'</td>
									</tr>';
									
									
									$output .='<tr><td>8. 	Regularity and Punctuality of the Teacher</td>
									<td>'.$ap8.'</td><td>'.$bp8.'</td><td>'.$cp8.'</td><td>'.$dp8.'</td><td>'.$xp8.'</td>
									</tr>';
									
									
									$output .='<tr><td>9. 	Overall ratings</td>
									<td>'.$ap9.'</td><td>'.$bp9.'</td><td>'.$cp9.'</td><td>'.$dp9.'</td><td>'.$xp9.'</td>
									</tr>';
									
									
									$output .='<tr><td>Total</td>
									<td>'.$tp1.'</td><td>'.$tp2.'</td><td>'.$tp3.'</td><td>'.$tp4.'</td><td>'.$tx5.'</td>
									</tr>';
									
									$output .='<tr><td>Performance Ratings</td>
									<td colspan="5">'.$percentage.'</td>
									</tr>';
									
									$output .='</table>';
							
								}
							
					}	
			
		return $output;
		
		
	}
	
	
	
	
	public function getResponseanalysisQ2guest()
	{
		$output=' ';
					$this->db->select('DISTINCT(Dept_name),Campus_code');
					$this->db->order_by("Campus_code", "asc");
					$this->db->order_by("Dept_name", "asc");
					$this->db->from('fb_gteacher');
					$q=$this->db->get();
					
					foreach($q->result() as $c)
					{
						$campus=$c->Campus_code;
					
						$dept=$c->Dept_name;
						
						$this->db->select('Campus_name');
							$this->db->from('Campus');
							$this->db->where('Campus_code',$campus);
							$qcamp=$this->db->get();
							
							foreach($qcamp->result() as $q3)
							{
								$campusname=$q3->Campus_name;
								
								$output .='<h4><center>'.$campusname.'<center></h4>';
							}
							
											
						$output .='<h4><center>Department of '.$c->Dept_name.'</center></h4>';
						
									$this->db->select('DISTINCT(User)');
									$this->db->from('fb_gteacher');
									$this->db->where('Dept_name',$dept);
									$quser=$this->db->get();
										
									$n=$quser->num_rows();
										
									$A=4;
									$B=3;
									$C=2;
									$D=1;
									
									
										$a1=3*$A*$n;
										$b1=3*$B*$n;
										$c1=3*$C*$n;		
										$d1=3*$D*$n;

										$a3=1.5*$A*$n;
										$b3=1.5*$B*$n;
										$c3=1.5*$C*$n;		
										$d3=1.5*$D*$n;	

										$a4=1*$A*$n;
										$b4=1*$B*$n;
										$c4=1*$C*$n;		
										$d4=1*$D*$n;

										$a6=0.5*$A*$n;
										$b6=0.5*$B*$n;
										$c6=0.5*$C*$n;		
										$d6=0.5*$D*$n;								
			
									$totala=$a1+$a1+$a3+$a4+$a4+$a6;	
									$totalb=$b1+$b1+$b3+$b4+$b4+$b6;	
									$totalc=$c1+$c1+$c3+$c4+$c4+$c6;
									$totald=$d1+$d1+$d3+$d4+$d4+$d6;
						
						
						
							$this->db->select('DISTINCT(T_name)');
							$this->db->from('fb_gteacher');
							$this->db->where('Dept_name',$dept);
							$this->db->where('Campus_code',$campus);
							$qf=$this->db->get();
								foreach($qf->result() as $f)
								{
									$fname=$f->T_name;
									
									
									$output .='<table border="2" style="page-break-after:always; width="100%" cellspacing="1" cellpadding="5">';
						
									$output .='<tr><th>Parameters</th>
									<th colspan="5">'.$fname.'</th>
									</tr>';
									
									$this->db->select('P1,P2,P3,P4,P5,P6,P7,P8,P9');
									$this->db->from('fb_gteacher');
									$this->db->where('T_name',$fname);
									$qp=$this->db->get();
									
									$ap1=0;
									$bp1=0;
									$cp1=0;
									$dp1=0;
									$xp1=0;
									
										$ap2=0;
										$bp2=0;
										$cp2=0;
										$dp2=0;
										$xp2=0;
											$ap3=0;
											$bp3=0;
											$cp3=0;
											$dp3=0;
											$xp3=0;
											
												$ap4=0;
												$bp4=0;
												$cp4=0;
												$dp4=0;
												$xp4=0;
													$ap5=0;
													$bp5=0;
													$cp5=0;
													$dp5=0;
													$xp5=0;
														$ap6=0;
														$bp6=0;
														$cp6=0;
														$dp6=0;
														$xp6=0;
															$ap7=0;
															$bp7=0;
															$cp7=0;
															$dp7=0;
															$xp7=0;
																$ap8=0;
																$bp8=0;
																$cp8=0;
																$dp8=0;
																$xp8=0;
																	$ap9=0;
																	$bp9=0;
																	$cp9=0;
																	$dp9=0;
																	$xp9=0;
									
									
									foreach($qp->result() as $p)
									{
										$p1=$p->P1;
										$p2=$p->P2;
										$p3=$p->P3;
										$p4=$p->P4;
										$p5=$p->P5;
										$p6=$p->P6;
										$p7=$p->P7;
										$p8=$p->P8;
										$p9=$p->P9;
										
										if($p1=='A')
										{
											$ap1=$ap1+1;
										}
										if($p1=='B')
										{
											$bp1=$bp1+1;
										}
										if($p1=='C')
										{
											$cp1=$cp1+1;
										}
										if($p1=='D')
										{
											$dp1=$dp1+1;
										}
										if($p1=='X')
										{
											$xp1=$xp1+1;
										}
										
											if($p2=='A')
											{
												$ap2=$ap2+1;
											}
											if($p2=='B')
											{
												$bp2=$bp2+1;
											}
											if($p2=='C')
											{
												$cp2=$cp2+1;
											}
											if($p2=='D')
											{
												$dp2=$dp2+1;
											}
											if($p2=='X')
											{
												$xp2=$xp2+1;
											}
												if($p3=='A')
												{
													$ap3=$ap3+1;
												}
												if($p3=='B')
												{
													$bp3=$bp3+1;
												}
												if($p3=='C')
												{
													$cp3=$cp3+1;
												}
												if($p3=='D')
												{
													$dp3=$dp3+1;
												}
												if($p3=='X')
												{
													$xp3=$xp3+1;
												}
												
													if($p4=='A')
													{
														$ap4=$ap4+1;
													}
													if($p4=='B')
													{
														$bp4=$bp4+1;
													}
													if($p4=='C')
													{
														$cp4=$cp4+1;
													}
													if($p4=='D')
													{
														$dp4=$dp4+1;
													}
													if($p4=='X')
													{
														$xp4=$xp4+1;
													}
														if($p5=='A')
														{
															$ap5=$ap5+1;
														}
														if($p5=='B')
														{
															$bp5=$bp5+1;
														}
														if($p5=='C')
														{
															$cp5=$cp5+1;
														}
														if($p5=='D')
														{
															$dp5=$dp5+1;
														}
														if($p5=='X')
														{
															$xp5=$xp5+1;
														}
															if($p6=='A')
															{
																$ap6=$ap6+1;
															}
															if($p6=='B')
															{
																$bp6=$bp6+1;
															}
															if($p6=='C')
															{
																$cp6=$cp6+1;
															}
															if($p6=='D')
															{
																$dp6=$dp6+1;
															}
															if($p6=='X')
															{
																$xp6=$xp6+1;
															}
																if($p7=='A')
																{
																	$ap7=$ap7+1;
																}
																if($p7=='B')
																{
																	$bp7=$bp7+1;
																}
																if($p7=='C')
																{
																	$cp7=$cp7+1;
																}
																if($p7=='D')
																{
																	$dp7=$dp7+1;
																}
																if($p7=='X')
																{
																	$xp7=$xp7+1;
																}
																
																	if($p8=='A')
																	{
																		$ap8=$ap8+1;
																	}
																	if($p8=='B')
																	{
																		$bp8=$bp8+1;
																	}
																	if($p8=='C')
																	{
																		$cp8=$cp8+1;
																	}
																	if($p8=='D')
																	{
																		$dp8=$dp8+1;
																	}
																	if($p8=='X')
																	{
																		$xp8=$xp8+1;
																	}
																	
																		if($p9=='A')
																		{
																			$ap9=$ap9+1;
																		}
																		if($p9=='B')
																		{
																			$bp9=$bp9+1;
																		}
																		if($p9=='C')
																		{
																			$cp9=$cp9+1;
																		}
																		if($p9=='D')
																		{
																			$dp9=$dp9+1;
																		}
																		if($p9=='X')
																		{
																			$xp9=$xp9+1;
																		}
									}
									$tp1=$ap1+$ap2+$ap3+$ap4+$ap5+$ap6+$ap7+$ap8+$ap9;
									$tp2=$bp1+$bp2+$bp3+$bp4+$bp5+$bp6+$bp7+$bp8+$bp9;
									$tp3=$cp1+$cp2+$cp3+$cp4+$cp5+$cp6+$cp7+$cp8+$cp9;
									$tp4=$dp1+$dp2+$dp3+$dp4+$dp5+$dp6+$dp7+$dp8+$dp9;
									$tx5=$xp1+$xp2+$xp3+$xp4+$xp5+$xp6+$xp7+$xp8+$xp9;
									
									
									
									$Totalpoints=$tp1+$tp2+$tp3+$tp4+$tx5;
									
									$percentage=$Totalpoints*100/$totala;
									
									$output .='<tr><td></td>
									<td>A</td><td>B</td><td>C</td><td>D</td><td>X</td>
									</tr>';
									
									
									$output .='<tr><td>1. Knowledge base of the Teacher</td>
									<td>'.$ap1.'</td><td>'.$bp1.'</td><td>'.$cp1.'</td><td>'.$dp1.'</td><td>'.$xp1.'</td>
									</tr>';
									
									$output .='<tr><td>2. Communication Skills of the Teacher</td>
									<td>'.$ap2.'</td><td>'.$bp2.'</td><td>'.$cp2.'</td><td>'.$dp2.'</td><td>'.$xp2.'</td>
									</tr>';
									
									$output .='<tr><td>3. Sincerity/Commitment of the Teacher</td>
									<td>'.$ap3.'</td><td>'.$bp3.'</td><td>'.$cp3.'</td><td>'.$dp3.'</td><td>'.$xp3.'</td>
									</tr>';
									
									$output .='<tr><td>4. 	Interest generated by the Teacher</td>
									<td>'.$ap4.'</td><td>'.$bp4.'</td><td>'.$cp4.'</td><td>'.$dp4.'</td><td>'.$xp4.'</td>
									</tr>';
									
									$output .='<tr><td>5. 	Ability of the Teacher to integate the course content with other courses to provide a broader perspective</td>
									<td>'.$ap5.'</td><td>'.$bp5.'</td><td>'.$cp5.'</td><td>'.$dp5.'</td><td>'.$xp5.'</td>
									</tr>';
									
									
									$output .='<tr><td>6. 	Accessibility of the Teacher in the department for further academic discussion</td>
									<td>'.$ap6.'</td><td>'.$bp6.'</td><td>'.$cp6.'</td><td>'.$dp6.'</td><td>'.$xp6.'</td>
									</tr>';
									
									
									$output .='<tr><td>7. 	Ability of the Teacher to design methods to evaluate the students understanding of the course</td>
									<td>'.$ap7.'</td><td>'.$bp7.'</td><td>'.$cp7.'</td><td>'.$dp7.'</td><td>'.$xp7.'</td>
									</tr>';
									
									
									$output .='<tr><td>8. 	Regularity and Punctuality of the Teacher</td>
									<td>'.$ap8.'</td><td>'.$bp8.'</td><td>'.$cp8.'</td><td>'.$dp8.'</td><td>'.$xp8.'</td>
									</tr>';
									
									
									$output .='<tr><td>9. 	Overall ratings</td>
									<td>'.$ap9.'</td><td>'.$bp9.'</td><td>'.$cp9.'</td><td>'.$dp9.'</td><td>'.$xp9.'</td>
									</tr>';
									
									
									$output .='<tr><td>Total</td>
									<td>'.$tp1.'</td><td>'.$tp2.'</td><td>'.$tp3.'</td><td>'.$tp4.'</td><td>'.$tx5.'</td>
									</tr>';
									
									$output .='<tr><td>Performance Ratings</td>
									<td colspan="5">'.$percentage.'</td>
									</tr>';
									
									$output .='</table>';
							
								}
							
					}	
			
		return $output;
		
		
	}
	
	
	
	public function getResponseanalysisQ3()
	{					
						$output='';
						$a=0;
						$ap1=0;
						$bp1=0;
						$cp1=0;
						$dp1=0;
						$xp1=0;
										$ap2=0;
										$bp2=0;
										$cp2=0;
										
										$xp2=0;
											$ap3=0;
											$bp3=0;
											$cp3=0;
											$dp3=0;
											$xp3=0;
											
												$ap4=0;
												$bp4=0;
												$cp4=0;
												$dp4=0;
												$xp4=0;
													$ap5=0;
													$bp5=0;
													$cp5=0;
													$dp5=0;
													$xp5=0;
														$ap6=0;
														$bp6=0;
														$cp6=0;
														$dp6=0;
														$xp6=0;
															$ap7=0;
															$bp7=0;
															$cp7=0;
															$dp7=0;
															$xp7=0;
																$ap8=0;
																$bp8=0;
																$cp8=0;
																$dp8=0;
																$xp8=0;
																	$ap9=0;
																	$bp9=0;
																	$cp9=0;
																	$dp9=0;
																	$xp9=0;
									$ap10=0;
									$bp10=0;
									$cp10=0;
									$dp10=0;
									$xp10=0;
									
									$ap11=0;
									$bp11=0;
									$cp11=0;
									$dp11=0;
									$xp11=0;
									
										$ap12=0;
										$bp12=0;
										$cp12=0;
										$dp12=0;
										$xp12=0;
											$ap13=0;
											$bp13=0;
											$cp13=0;
											$dp13=0;
											$xp13=0;
											
												$ap14=0;
												$bp14=0;
												$cp14=0;
												$dp14=0;
												$xp14=0;
													$ap15=0;
													$bp15=0;
													
													$xp15=0;
														$ap16=0;
														$bp16=0;
														
														$xp16=0;
															$ap17=0;
															$bp17=0;
															
															$xp17=0;
																$ap18=0;
																$bp18=0;
																$cp18=0;
																
																$xp18=0;
																	$ap19=0;
																	$bp19=0;
																	$cp19=0;
																	
																	$xp19=0;
									$ap20=0;
									$bp20=0;
									$cp20=0;
									
									$xp20=0;							
																	
									$ap21=0;
									$bp21=0;
									$cp21=0;
									$dp21=0;
									$xp21=0;
									
										$ap22=0;
										$bp22=0;
										$cp22=0;
										$dp22=0;
										$xp22=0;
											$ap23=0;
											$bp23=0;
											$cp23=0;
											$dp23=0;
											$xp23=0;
											
												$ap24=0;
												$bp24=0;
												$cp24=0;
												$dp24=0;
												$xp24=0;
													$ap25=0;
													$bp25=0;
													$cp25=0;
													$dp25=0;
													$xp25=0;
														$ap26=0;
														$bp26=0;
														$cp26=0;
														$dp26=0;
														$xp26=0;


							$this->db->select('Parameters');
							$this->db->from('q3_parameters');
							$qf=$this->db->get();
							foreach($qf->result() as $f)
							{
									$output.='<h1><center>Mangalore University</center></h1>';
									$output.='<h2><center>'.$f->Parameters.'</center></h2>';
									
									$output .='<table border="2" style="page-break-after:always; text-align:center;font-size:25px;" width="100%" cellspacing="1" cellpadding="5">';
						
									$output .='<tr><th colspan="5">Grades</th>
									<th>Total</th>
									</tr>';
									
									$apercent1=0;
									$bpercent1=0;
									$cpercent1=0;
									$dpercent1=0;
									$xpercent1=0;

									if($a==0)
									{
										$this->db->select('Q1');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p1=$p->Q1;
											
											
											if($p1=='A')
											{
												$ap1=$ap1+1;
											}
											if($p1=='B')
											{
												$bp1=$bp1+1;
											}
											if($p1=='C')
											{
												$cp1=$cp1+1;
											}
											if($p1=='D')
											{
												$dp1=$dp1+1;
											}
											if($p1=='X')
											{
												$xp1=$xp1+1;
											}
										}
										
										$totalQ1=$ap1+$bp1+$cp1+$dp1+$xp1;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap1.'</td><td>'.$bp1.'</td><td>'.$cp1.'</td><td>'.$dp1.'</td><td>'.$xp1.'</td><td>'.$totalQ1.'</td>
										</tr>';
										
										$apercent1=$ap1/$totalQ1*100;
										$apercent1 = number_format($apercent1, 1);
										$bpercent1=$bp1/$totalQ1*100;
										$bpercent1 = number_format($bpercent1, 1);
										$cpercent1=$cp1/$totalQ1*100;
										$cpercent1 = number_format($cpercent1, 1);
										$dpercent1=$dp1/$totalQ1*100;
										$dpercent1 = number_format($dpercent1, 1);
										$xpercent1=$xp1/$totalQ1*100;
										$xpercent1 = number_format($xpercent1, 1);
										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Challenging : '.$apercent1.'%</td><td colspan="3">B-Adequate : '.$bpercent1.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Dull : '.$cpercent1.'%</td><td colspan="3">D-Inadequate : '.$dpercent1.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent1.'%</td>
										</tr>';	

										
									}
									
									
									$apercent2=0;
									$bpercent2=0;
									$cpercent2=0;
									$xpercent2=0;

									
									if($a==1)
									{
										$this->db->select('Q2');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p2=$p->Q2;
											
											
											if($p2=='A')
											{
												$ap2=$ap2+1;
											}
											if($p2=='B')
											{
												$bp2=$bp2+1;
											}
											if($p2=='C')
											{
												$cp2=$cp2+1;
											}
											if($p2=='X')
											{
												$xp2=$xp2+1;
											}
										}
										
										$totalQ2=$ap2+$bp2+$cp2+$xp2;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap2.'</td><td>'.$bp2.'</td><td>'.$cp2.'</td><td>-</td><td>'.$xp2.'</td><td>'.$totalQ2.'</td>
										</tr>';
										
										$apercent2=$ap2/$totalQ2*100;
										$apercent2 = number_format($apercent2, 1);
										$bpercent2=$bp2/$totalQ2*100;
										$bpercent2 = number_format($bpercent2, 1);
										$cpercent2=$cp2/$totalQ2*100;
										$cpercent2 = number_format($cpercent2, 1);
										$xpercent2=$xp2/$totalQ2*100;
										$xpercent2 = number_format($xpercent2, 1);
										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-More than adequate  : '.$apercent2.'%</td><td colspan="3">B-Just adequate : '.$bpercent2.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Inadequate : '.$cpercent2.'%</td><td colspan="3">X : '.$xpercent2.'%</td>
										</tr>';
										
									}
									$apercent3=0;
									$bpercent3=0;
									$cpercent3=0;
									$dpercent3=0;
									$xpercent3=0;

									
									if($a==2)
									{
										$this->db->select('Q3');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p3=$p->Q3;
											
											
											if($p3=='A')
											{
												$ap3=$ap3+1;
											}
											if($p3=='B')
											{
												$bp3=$bp3+1;
											}
											if($p3=='C')
											{
												$cp3=$cp3+1;
											}
											if($p3=='D')
											{
												$dp3=$dp3+1;
											}
											if($p3=='X')
											{
												$xp3=$xp3+1;
											}
										}
										
										$totalQ3=$ap3+$bp3+$cp3+$dp3+$xp3;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap3.'</td><td>'.$bp3.'</td><td>'.$cp3.'</td><td>'.$dp3.'</td><td>'.$xp3.'</td><td>'.$totalQ3.'</td>
										</tr>';
										
										
										$apercent3=$ap3/$totalQ3*100;
										$apercent3 = number_format($apercent3, 1);
										$bpercent3=$bp3/$totalQ3*100;
										$bpercent3 = number_format($bpercent3, 1);
										$cpercent3=$cp3/$totalQ3*100;
										$cpercent3 = number_format($cpercent3, 1);
										$dpercent3=$dp3/$totalQ3*100;
										$dpercent3 = number_format($dpercent3, 1);
										$xpercent3=$xp3/$totalQ3*100;
										$xpercent3 = number_format($xpercent3, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Easy  : '.$apercent3.'%</td><td colspan="3">B-Manageable : '.$bpercent3.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Difficult : '.$cpercent3.'%</td><td colspan="3">D-Very Difficult : '.$dpercent3.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent3.'%</td>
										</tr>';	

										
										
									}
									$apercent4=0;
									$bpercent4=0;
									$cpercent4=0;
									$dpercent4=0;
									$xpercent4=0;

									if($a==3)
									{
										$this->db->select('Q4');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p4=$p->Q4;
											
											
											if($p4=='A')
											{
												$ap4=$ap4+1;
											}
											if($p4=='B')
											{
												$bp4=$bp4+1;
											}
											if($p4=='C')
											{
												$cp4=$cp4+1;
											}
											if($p4=='D')
											{
												$dp4=$dp4+1;
											}
											if($p4=='X')
											{
												$xp4=$xp4+1;
											}
										}
										
										$totalQ4=$ap4+$bp4+$cp4+$dp4+$xp4;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap4.'</td><td>'.$bp4.'</td><td>'.$cp4.'</td><td>'.$dp4.'</td><td>'.$xp4.'</td><td>'.$totalQ4.'</td>
										</tr>';
										
										$apercent4=$ap4/$totalQ4*100;
										$apercent4 = number_format($apercent4, 1);
										$bpercent4=$bp4/$totalQ4*100;
										$bpercent4 = number_format($bpercent4, 1);
										$cpercent4=$cp4/$totalQ4*100;
										$cpercent4 = number_format($cpercent4, 1);
										$dpercent4=$dp4/$totalQ4*100;
										$dpercent4 = number_format($dpercent4, 1);
										$xpercent4=$xp4/$totalQ4*100;
										$xpercent4 = number_format($xpercent4, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-85 to 100%  : '.$apercent4.'%</td><td colspan="3">B-70 to 85% : '.$bpercent4.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-55 to 70% : '.$cpercent4.'%</td><td colspan="3">D-Less than 55% : '.$dpercent4.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent4.'%</td>
										</tr>';	

										
										
									}
									$apercent5=0;
									$bpercent5=0;
									$cpercent5=0;
									$dpercent5=0;
									$xpercent5=0;

									if($a==4)
									{
										$this->db->select('Q5');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p5=$p->Q5;
											
											
											if($p5=='A')
											{
												$ap5=$ap5+1;
											}
											if($p5=='B')
											{
												$bp5=$bp5+1;
											}
											if($p5=='C')
											{
												$cp5=$cp5+1;
											}
											if($p5=='D')
											{
												$dp5=$dp5+1;
											}
											if($p5=='X')
											{
												$xp5=$xp5+1;
											}
										}
										
										$totalQ5=$ap5+$bp5+$cp5+$dp5+$xp5;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap5.'</td><td>'.$bp5.'</td><td>'.$cp5.'</td><td>'.$dp5.'</td><td>'.$xp5.'</td><td>'.$totalQ5.'</td>
										</tr>';
										
										$apercent5=$ap5/$totalQ5*100;
										$apercent5 = number_format($apercent5, 1);
										$bpercent5=$bp5/$totalQ5*100;
										$bpercent5 = number_format($bpercent5, 1);
										$cpercent5=$cp5/$totalQ5*100;
										$cpercent5 = number_format($cpercent5, 1);
										$dpercent5=$dp5/$totalQ5*100;
										$dpercent5 = number_format($dpercent5, 1);
										$xpercent5=$xp5/$totalQ5*100;
										$xpercent5 = number_format($xpercent5, 1);

										
							
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Excellent  : '.$apercent5.'%</td><td colspan="3">B-Adequate : '.$bpercent5.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Inadequate : '.$cpercent5.'%</td><td colspan="3">D-Very Poor : '.$dpercent5.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent5.'%</td>
										</tr>';	

										
										
									}
									
									$apercent6=0;
									$bpercent6=0;
									$cpercent6=0;
									$dpercent6=0;
									$xpercent6=0;

									if($a==5)
									{
										$this->db->select('Q6');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p6=$p->Q6;
											
											
											if($p6=='A')
											{
												$ap6=$ap6+1;
											}
											if($p6=='B')
											{
												$bp6=$bp6+1;
											}
											if($p6=='C')
											{
												$cp6=$cp6+1;
											}
											if($p6=='D')
											{
												$dp6=$dp6+1;
											}
											if($p6=='X')
											{
												$xp6=$xp6+1;
											}
										}
										
										$totalQ6=$ap6+$bp6+$cp6+$dp6+$xp6;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap6.'</td><td>'.$bp6.'</td><td>'.$cp6.'</td><td>'.$dp6.'</td><td>'.$xp6.'</td><td>'.$totalQ6.'</td>
										</tr>';
										
										$apercent6=$ap6/$totalQ6*100;
										$apercent6 = number_format($apercent6, 1);
										$bpercent6=$bp6/$totalQ6*100;
										$bpercent6 = number_format($bpercent6, 1);
										$cpercent6=$cp6/$totalQ6*100;
										$cpercent6 = number_format($cpercent6, 1);
										$dpercent6=$dp6/$totalQ6*100;
										$dpercent6 = number_format($dpercent6, 1);
										$xpercent6=$xp6/$totalQ6*100;
										$xpercent6 = number_format($xpercent6, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Easily  : '.$apercent6.'%</td><td colspan="3">B-With difficulty : '.$bpercent6.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-With great difficulty : '.$cpercent6.'%</td><td colspan="3">D-Not at all : '.$dpercent6.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent6.'%</td>
										</tr>';	

										
									}
									
									$apercent7=0;
									$bpercent7=0;
									$cpercent7=0;
									$dpercent7=0;
									$xpercent7=0;

									if($a==6)
									{
										$this->db->select('Q7');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p7=$p->Q7;
											
											
											if($p7=='A')
											{
												$ap7=$ap7+1;
											}
											if($p7=='B')
											{
												$bp7=$bp7+1;
											}
											if($p7=='C')
											{
												$cp7=$cp7+1;
											}
											if($p7=='D')
											{
												$dp7=$dp7+1;
											}
											if($p7=='X')
											{
												$xp7=$xp7+1;
											}
										}
										
										$totalQ7=$ap7+$bp7+$cp7+$dp7+$xp7;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap7.'</td><td>'.$bp7.'</td><td>'.$cp7.'</td><td>'.$dp7.'</td><td>'.$xp7.'</td><td>'.$totalQ7.'</td>
										</tr>';
										
										$$apercent7=$ap7/$totalQ7*100;
										$apercent7 = number_format($apercent7, 1);
										$bpercent7=$bp7/$totalQ7*100;
										$bpercent7 = number_format($bpercent7, 1);
										$cpercent7=$cp7/$totalQ7*100;
										$cpercent7 = number_format($cpercent7, 1);
										$dpercent7=$dp7/$totalQ7*100;
										$dpercent7 = number_format($dpercent7, 1);
										$xpercent7=$xp7/$totalQ7*100;
										$xpercent7 = number_format($xpercent7, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Throughly  : '.$apercent7.'%</td><td colspan="3">B-Satisfactorily : '.$bpercent7.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Poorly : '.$cpercent7.'%</td><td colspan="3">D-Indifferently : '.$dpercent7.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent7.'%</td>
										</tr>';	

									}
									
									$apercent8=0;
									$bpercent8=0;
									$cpercent8=0;
									$dpercent8=0;
									$xpercent8=0;

									if($a==7)
									{
										$this->db->select('Q8');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p8=$p->Q8;
											
											
											if($p8=='A')
											{
												$ap8=$ap8+1;
											}
											if($p8=='B')
											{
												$bp8=$bp8+1;
											}
											if($p8=='C')
											{
												$cp8=$cp8+1;
											}
											if($p8=='D')
											{
												$dp8=$dp8+1;
											}
											if($p8=='X')
											{
												$xp8=$xp8+1;
											}
										}
										
										$totalQ8=$ap8+$bp8+$cp8+$dp8+$xp8;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap8.'</td><td>'.$bp8.'</td><td>'.$cp8.'</td><td>'.$dp8.'</td><td>'.$xp8.'</td><td>'.$totalQ8.'</td>
										</tr>';
										
										$apercent8=$ap8/$totalQ8*100;
										$apercent8 = number_format($apercent8, 1);
										$bpercent8=$bp8/$totalQ8*100;
										$bpercent8 = number_format($bpercent8, 1);
										$cpercent8=$cp8/$totalQ8*100;
										$cpercent8 = number_format($cpercent8, 1);
										$dpercent8=$dp8/$totalQ8*100;
										$dpercent8 = number_format($dpercent8, 1);
										$xpercent8=$xp8/$totalQ8*100;
										$xpercent8 = number_format($xpercent8, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Excellent  : '.$apercent8.'%</td><td colspan="3">B-Effectively : '.$bpercent8.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Satisfactorily : '.$cpercent8.'%</td><td colspan="3">D-Indifferently : '.$dpercent8.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent8.'%</td>
										</tr>';	

									}
									$apercent9=0;
									$bpercent9=0;
									$cpercent9=0;
									$dpercent9=0;
									$xpercent9=0;

									if($a==8)
									{
										$this->db->select('Q9');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p9=$p->Q9;
											
											
											if($p9=='A')
											{
												$ap9=$ap9+1;
											}
											if($p9=='B')
											{
												$bp9=$bp9+1;
											}
											if($p9=='C')
											{
												$cp9=$cp9+1;
											}
											if($p9=='D')
											{
												$dp9=$dp9+1;
											}
											if($p9=='X')
											{
												$xp9=$xp9+1;
											}
										}
										
										$totalQ9=$ap9+$bp9+$cp9+$dp9+$xp9;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap9.'</td><td>'.$bp9.'</td><td>'.$cp9.'</td><td>'.$dp9.'</td><td>'.$xp9.'</td><td>'.$totalQ9.'</td>
										</tr>';
										
										$apercent9=$ap9/$totalQ9*100;
										$apercent9 = number_format($apercent9, 1);
										$bpercent9=$bp9/$totalQ9*100;
										$bpercent9 = number_format($bpercent9, 1);
										$cpercent9=$cp9/$totalQ9*100;
										$cpercent9 = number_format($cpercent9, 1);
										$dpercent9=$dp9/$totalQ9*100;
										$dpercent9 = number_format($dpercent9, 1);
										$xpercent9=$xp9/$totalQ9*100;
										$xpercent9 = number_format($xpercent9, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Always  : '.$apercent9.'%</td><td colspan="3">B-Sometimes : '.$bpercent9.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Tried : '.$cpercent9.'%</td><td colspan="3">D-Not at all : '.$dpercent9.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent9.'%</td>
										</tr>';	

									}
									$apercent10=0;
									$bpercent10=0;
									$cpercent10=0;
									$dpercent10=0;
									$xpercent10=0;

									if($a==9)
									{
										$this->db->select('Q10');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p10=$p->Q10;
											
											
											if($p10=='A')
											{
												$ap10=$ap10+1;
											}
											if($p10=='B')
											{
												$bp10=$bp10+1;
											}
											if($p10=='C')
											{
												$cp10=$cp10+1;
											}
											if($p10=='D')
											{
												$dp10=$dp10+1;
											}
											if($p10=='X')
											{
												$xp10=$xp10+1;
											}
										}
										
										$totalQ10=$ap10+$bp10+$cp10+$dp10+$xp10;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap10.'</td><td>'.$bp10.'</td><td>'.$cp10.'</td><td>'.$dp10.'</td><td>'.$xp10.'</td><td>'.$totalQ10.'</td>
										</tr>';
										
										$apercent10=$ap10/$totalQ10*100;
										$apercent10 = number_format($apercent10, 1);
										$bpercent10=$bp10/$totalQ10*100;
										$bpercent10 = number_format($bpercent10, 1);
										$cpercent10=$cp10/$totalQ10*100;
										$cpercent10 = number_format($cpercent10, 1);
										$dpercent10=$dp10/$totalQ10*100;
										$dpercent10 = number_format($dpercent10, 1);
										$xpercent10=$xp10/$totalQ10*100;
										$xpercent10 = number_format($xpercent10, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Very helpful  : '.$apercent10.'%</td><td colspan="3">B-Helpful : '.$bpercent10.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Sometimes helpful : '.$cpercent10.'%</td><td colspan="3">D-Unhelpful : '.$dpercent10.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent10.'%</td>
										</tr>';	

									}
									$apercent11=0;
									$bpercent11=0;
									$cpercent11=0;
									$dpercent11=0;
									$xpercent11=0;

									if($a==10)
									{
										$this->db->select('Q11');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p11=$p->Q11;
											
											
											if($p11=='A')
											{
												$ap11=$ap11+1;
											}
											if($p11=='B')
											{
												$bp11=$bp11+1;
											}
											if($p11=='C')
											{
												$cp11=$cp11+1;
											}
											if($p11=='D')
											{
												$dp11=$dp11+1;
											}
											if($p11=='X')
											{
												$xp11=$xp11+1;
											}
										}
										
										$totalQ11=$ap11+$bp11+$cp11+$dp11+$xp11;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap11.'</td><td>'.$bp11.'</td><td>'.$cp11.'</td><td>'.$dp11.'</td><td>'.$xp11.'</td><td>'.$totalQ11.'</td>
										</tr>';
										
										$apercent11=$ap11/$totalQ11*100;
										$apercent11 = number_format($apercent11, 1);
										$bpercent11=$bp11/$totalQ11*100;
										$bpercent11 = number_format($bpercent11, 1);
										$cpercent11=$cp11/$totalQ11*100;
										$cpercent11 = number_format($cpercent11, 1);
										$dpercent11=$dp11/$totalQ11*100;
										$dpercent11 = number_format($dpercent11, 1);
										$xpercent11=$xp11/$totalQ11*100;
										$xpercent11 = number_format($xpercent11, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Most courteous  : '.$apercent11.'%</td><td colspan="3">B-Generally courteous : '.$bpercent11.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Indifferent? : '.$cpercent11.'%</td><td colspan="3">D-Rude? : '.$dpercent11.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent11.'%</td>
										</tr>';	

									}
									
									$apercent12=0;
									$bpercent12=0;
									$cpercent12=0;
									$dpercent12=0;
									$xpercent12=0;

									if($a==11)
									{
										$this->db->select('Q12');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p12=$p->Q12;
											
											
											if($p12=='A')
											{
												$ap12=$ap12+1;
											}
											if($p12=='B')
											{
												$bp12=$bp12+1;
											}
											if($p12=='C')
											{
												$cp12=$cp12+1;
											}
											if($p12=='D')
											{
												$dp12=$dp12+1;
											}
											if($p12=='X')
											{
												$xp12=$xp12+1;
											}
										}
										
										$totalQ12=$ap12+$bp12+$cp12+$dp12+$xp12;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap12.'</td><td>'.$bp12.'</td><td>'.$cp12.'</td><td>'.$dp12.'</td><td>'.$xp12.'</td><td>'.$totalQ12.'</td>
										</tr>';
										
										$apercent12=$ap12/$totalQ12*100;
										$apercent12 = number_format($apercent12, 1);
										$bpercent12=$bp12/$totalQ12*100;
										$bpercent12 = number_format($bpercent12, 1);
										$cpercent12=$cp12/$totalQ12*100;
										$cpercent12 = number_format($cpercent12, 1);
										$dpercent12=$dp12/$totalQ12*100;
										$dpercent12 = number_format($dpercent12, 1);
										$xpercent12=$xp12/$totalQ12*100;
										$xpercent12 = number_format($xpercent12, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Fair & impartial  : '.$apercent12.'%</td><td colspan="3">B-Discriminatory : '.$bpercent12.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Too strict : '.$cpercent12.'%</td><td colspan="3">D-Too liberal : '.$dpercent12.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent12.'%</td>
										</tr>';	

									}
									
									$apercent13=0;
									$bpercent13=0;
									$cpercent13=0;
									$dpercent13=0;
									$xpercent13=0;

									if($a==12)
									{
										$this->db->select('Q13');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p13=$p->Q13;
											
											
											if($p13=='A')
											{
												$ap13=$ap13+1;
											}
											if($p13=='B')
											{
												$bp13=$bp13+1;
											}
											if($p13=='C')
											{
												$cp13=$cp13+1;
											}
											if($p13=='D')
											{
												$dp13=$dp13+1;
											}
											if($p13=='X')
											{
												$xp13=$xp13+1;
											}
										}
										
										$totalQ13=$ap13+$bp13+$cp13+$dp13+$xp13;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap13.'</td><td>'.$bp13.'</td><td>'.$cp13.'</td><td>'.$dp13.'</td><td>'.$xp13.'</td><td>'.$totalQ13.'</td>
										</tr>';
										
										$apercent13=$ap13/$totalQ13*100;
										$apercent13 = number_format($apercent13, 1);
										$bpercent13=$bp13/$totalQ13*100;
										$bpercent13 = number_format($bpercent13, 1);
										$cpercent13=$cp13/$totalQ13*100;
										$cpercent13 = number_format($cpercent13, 1);
										$dpercent13=$dp13/$totalQ13*100;
										$dpercent13 = number_format($dpercent13, 1);
										$xpercent13=$xp13/$totalQ13*100;
										$xpercent13 = number_format($xpercent13, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-In time  : '.$apercent13.'%</td><td colspan="3">B-Late : '.$bpercent13.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Reluctantly : '.$cpercent13.'%</td><td colspan="3">D-Not at all : '.$dpercent13.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent13.'%</td>
										</tr>';	

										
										
									}
									$apercent14=0;
									$bpercent14=0;
									$cpercent14=0;
									$dpercent14=0;
									$xpercent14=0;

									if($a==13)
									{
										$this->db->select('Q14');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p14=$p->Q14;
											
											
											if($p14=='A')
											{
												$ap14=$ap14+1;
											}
											if($p14=='B')
											{
												$bp14=$bp14+1;
											}
											if($p14=='C')
											{
												$cp14=$cp14+1;
											}
											if($p14=='D')
											{
												$dp14=$dp14+1;
											}
											if($p14=='X')
											{
												$xp14=$xp14+1;
											}
										}
										
										$totalQ14=$ap14+$bp14+$cp14+$dp14+$xp14;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap14.'</td><td>'.$bp14.'</td><td>'.$cp14.'</td><td>'.$dp14.'</td><td>'.$xp14.'</td><td>'.$totalQ14.'</td>
										</tr>';
										
										$apercent14=$ap14/$totalQ14*100;
										$apercent14 = number_format($apercent14, 1);
										$bpercent14=$bp14/$totalQ14*100;
										$bpercent14 = number_format($bpercent14, 1);
										$cpercent14=$cp14/$totalQ14*100;
										$cpercent14 = number_format($cpercent14, 1);
										$dpercent14=$dp14/$totalQ14*100;
										$dpercent14 = number_format($dpercent14, 1);
										$xpercent14=$xp14/$totalQ14*100;
										$xpercent14 = number_format($xpercent14, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Yes fully  : '.$apercent14.'%</td><td colspan="3">B-Yes Partly : '.$bpercent14.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Some times : '.$cpercent14.'%</td><td colspan="3">D-No : '.$dpercent14.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent14.'%</td>
										</tr>';	

										
									}
									$apercent15=0;
									$bpercent15=0;
									$xpercent15=0;

									if($a==14)
									{
										$this->db->select('Q15');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p15=$p->Q15;
											
											
											if($p15=='A')
											{
												$ap15=$ap15+1;
											}
											if($p15=='B')
											{
												$bp15=$bp15+1;
											}
											
											if($p15=='X')
											{
												$xp15=$xp15+1;
											}
										}
										
										$totalQ15=$ap15+$bp15+$xp15;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap15.'</td><td>'.$bp15.'</td><td>-</td><td>-</td><td>'.$xp15.'</td><td>'.$totalQ15.'</td>
										</tr>';
										
										$apercent15=$ap15/$totalQ15*100;
										$apercent15 = number_format($apercent15, 1);
										$bpercent15=$bp15/$totalQ15*100;
										$bpercent15 = number_format($bpercent15, 1);
										$xpercent15=$xp15/$totalQ15*100;
										$xpercent15 = number_format($xpercent15, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Yes  : '.$apercent15.'%</td><td colspan="3">B-No : '.$bpercent15.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent15.'%</td>
										</tr>';	

									}
									$apercent16=0;
									$bpercent16=0;
					
									$xpercent16=0;

									
									if($a==15)
									{
										$this->db->select('Q16');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p16=$p->Q16;
											
											
											if($p16=='A')
											{
												$ap16=$ap16+1;
											}
											if($p16=='B')
											{
												$bp16=$bp16+1;
											}
											
											if($p16=='X')
											{
												$xp16=$xp16+1;
											}
										}
										
										$totalQ16=$ap16+$bp16+$xp16;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap16.'</td><td>'.$bp16.'</td><td>-</td><td>-</td><td>'.$xp16.'</td><td>'.$totalQ16.'</td>
										</tr>';
										
										$apercent16=$ap16/$totalQ16*100;
										$apercent16 = number_format($apercent16, 1);
										$bpercent16=$bp16/$totalQ16*100;
										$bpercent16 = number_format($bpercent16, 1);
										$xpercent16=$xp16/$totalQ16*100;
										$xpercent16 = number_format($xpercent16, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Yes  : '.$apercent16.'%</td><td colspan="3">B-No : '.$bpercent16.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent16.'%</td>
										</tr>';	

									}
									$apercent17=0;
									$bpercent17=0;
									
									$xpercent17=0;

									if($a==16)
									{
										$this->db->select('Q17');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p17=$p->Q17;
											
											
											if($p17=='A')
											{
												$ap17=$ap17+1;
											}
											if($p17=='B')
											{
												$bp17=$bp17+1;
											}
											
											if($p17=='X')
											{
												$xp17=$xp17+1;
											}
										}
										
										$totalQ17=$ap17+$bp17+$xp17;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap17.'</td><td>'.$bp17.'</td><td>-</td><td>-</td><td>'.$xp17.'</td><td>'.$totalQ17.'</td>
										</tr>';
										
										$apercent17=$ap17/$totalQ17*100;
										$apercent17 = number_format($apercent17, 1);
										$bpercent17=$bp17/$totalQ17*100;
										$bpercent17 = number_format($bpercent17, 1);
										$xpercent17=$xp17/$totalQ17*100;
										$xpercent17 = number_format($xpercent17, 1);

										
							
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Yes  : '.$apercent17.'%</td><td colspan="3">B-No : '.$bpercent17.'%</td>
										</tr>';
										
										
										$output .='<tr><td colspan="6">X : '.$xpercent17.'%</td>
										</tr>';	

									}
									$apercent18=0;
									$bpercent18=0;
									$cpercent18=0;
									
									$xpercent18=0;

									if($a==17)
									{
										$this->db->select('Q18');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p18=$p->Q18;
											
											
											if($p18=='A')
											{
												$ap18=$ap18+1;
											}
											if($p18=='B')
											{
												$bp18=$bp18+1;
											}
											if($p18=='C')
											{
												$cp18=$cp18+1;
											}
											
											if($p18=='X')
											{
												$xp18=$xp18+1;
											}
										}
										
										$totalQ18=$ap18+$bp18+$cp18+$xp18;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap18.'</td><td>'.$bp18.'</td><td>'.$cp18.'</td><td>-</td><td>'.$xp18.'</td><td>'.$totalQ18.'</td>
										</tr>';
										
										$apercent18=$ap18/$totalQ18*100;
										$apercent18 = number_format($apercent18, 1);
										$bpercent18=$bp18/$totalQ18*100;
										$bpercent18 = number_format($bpercent18, 1);
										$cpercent18=$cp18/$totalQ18*100;
										$cpercent18 = number_format($cpercent18, 1);
										$xpercent18=$xp18/$totalQ18*100;
										$xpercent18 = number_format($xpercent18, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Yes  : '.$apercent18.'%</td><td colspan="3">B-To some extent : '.$bpercent18.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-No : '.$cpercent18.'%</td><td colspan="3">X : '.$xpercent18.'%</td>
										</tr>';
										
			
									}
									$apercent19=0;
									$bpercent19=0;
									$cpercent19=0;
									
									$xpercent19=0;

									if($a==18)
									{
										$this->db->select('Q19');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p19=$p->Q19;
											
											
											if($p19=='A')
											{
												$ap19=$ap19+1;
											}
											if($p19=='B')
											{
												$bp19=$bp19+1;
											}
											if($p19=='C')
											{
												$cp19=$cp19+1;
											}
											
											if($p19=='X')
											{
												$xp19=$xp19+1;
											}
										}
										
										$totalQ19=$ap19+$bp19+$cp19+$xp19;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap19.'</td><td>'.$bp19.'</td><td>'.$cp19.'</td><td>-</td><td>'.$xp19.'</td><td>'.$totalQ19.'</td>
										</tr>';
										
										$apercent19=$ap19/$totalQ19*100;
										$apercent19 = number_format($apercent19, 1);
										$bpercent19=$bp19/$totalQ19*100;
										$bpercent19 = number_format($bpercent19, 1);
										$cpercent19=$cp19/$totalQ19*100;
										$cpercent19 = number_format($cpercent19, 1);
										$xpercent19=$xp19/$totalQ19*100;
										$xpercent19 = number_format($xpercent19, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Yes  : '.$apercent19.'%</td><td colspan="3">B-To some extent : '.$bpercent19.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-No : '.$cpercent19.'%</td><td colspan="3">X : '.$xpercent19.'%</td>
										</tr>';
								
									}
									$apercent20=0;
									$bpercent20=0;
									$cpercent20=0;
									
									$xpercent20=0;

									if($a==19)
									{
										$this->db->select('Q20');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p20=$p->Q20;
											
											
											if($p20=='A')
											{
												$ap20=$ap20+1;
											}
											if($p20=='B')
											{
												$bp20=$bp20+1;
											}
											if($p20=='C')
											{
												$cp20=$cp20+1;
											}
											
											if($p20=='X')
											{
												$xp20=$xp20+1;
											}
										}
										
										$totalQ20=$ap20+$bp20+$cp20+$xp20;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap20.'</td><td>'.$bp20.'</td><td>'.$cp20.'</td><td>-</td><td>'.$xp20.'</td><td>'.$totalQ20.'</td>
										</tr>';
										
										$apercent20=$ap20/$totalQ20*100;
										$apercent20 = number_format($apercent20, 1);
										$bpercent20=$bp20/$totalQ20*100;
										$bpercent20 = number_format($bpercent20, 1);
										$cpercent20=$cp20/$totalQ20*100;
										$cpercent20 = number_format($cpercent20, 1);
										$xpercent20=$xp20/$totalQ20*100;
										$xpercent20 = number_format($xpercent20, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Yes  : '.$apercent20.'%</td><td colspan="3">B-To Some Extent : '.$bpercent20.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-No : '.$cpercent20.'%</td><td colspan="3">X : '.$xpercent20.'%</td>
										</tr>';
										
				
									}
									
									$apercent21=0;
									$bpercent21=0;
									$cpercent21=0;
									$dpercent21=0;
									$xpercent21=0;

									if($a==20)
									{
										$this->db->select('Q21');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p21=$p->Q21;
											
											
											if($p21=='A')
											{
												$ap21=$ap21+1;
											}
											if($p21=='B')
											{
												$bp21=$bp21+1;
											}
											if($p21=='C')
											{
												$cp21=$cp21+1;
											}
											if($p21=='D')
											{
												$dp21=$dp21+1;
											}
											if($p21=='X')
											{
												$xp21=$xp21+1;
											}
										}
										
										$totalQ21=$ap21+$bp21+$cp21+$dp21+$xp21;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap21.'</td><td>'.$bp21.'</td><td>'.$cp21.'</td><td>'.$dp21.'</td><td>'.$xp21.'</td><td>'.$totalQ21.'</td>
										</tr>';
										
										$apercent21=$ap21/$totalQ21*100;
										$apercent21 = number_format($apercent21, 1);
										$bpercent21=$bp21/$totalQ21*100;
										$bpercent21 = number_format($bpercent21, 1);
										$cpercent21=$cp21/$totalQ21*100;
										$cpercent21 = number_format($cpercent21, 1);
										$dpercent21=$dp21/$totalQ21*100;
										$dpercent21 = number_format($dpercent21, 1);
										$xpercent21=$xp21/$totalQ21*100;
										$xpercent21 = number_format($xpercent21, 1);

										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Frequently  : '.$apercent21.'%</td><td colspan="3">B-Occasionally : '.$bpercent21.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Rarely : '.$cpercent21.'%</td><td colspan="3">D-Never : '.$dpercent21.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent21.'%</td>
										</tr>';	
	
									}
									$apercent22=0;
									$bpercent22=0;
									$cpercent22=0;
									$dpercent22=0;
									$xpercent22=0;

									if($a==21)
									{
										$this->db->select('Q22');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p22=$p->Q22;
											
											
											if($p22=='A')
											{
												$ap22=$ap22+1;
											}
											if($p22=='B')
											{
												$bp22=$bp22+1;
											}
											if($p22=='C')
											{
												$cp22=$cp22+1;
											}
											if($p22=='D')
											{
												$dp22=$dp22+1;
											}
											if($p22=='X')
											{
												$xp22=$xp22+1;
											}
										}
										
										$totalQ22=$ap22+$bp22+$cp22+$dp22+$xp22;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap22.'</td><td>'.$bp22.'</td><td>'.$cp22.'</td><td>'.$dp22.'</td><td>'.$xp22.'</td><td>'.$totalQ22.'</td>
										</tr>';
										
										
										$apercent22=$ap22/$totalQ22*100;
										$apercent22 = number_format($apercent22, 1);
										$bpercent22=$bp22/$totalQ22*100;
										$bpercent22 = number_format($bpercent22, 1);
										$cpercent22=$cp22/$totalQ22*100;
										$cpercent22 = number_format($cpercent22, 1);
										$dpercent22=$dp22/$totalQ22*100;
										$dpercent22 = number_format($dpercent22, 1);
										$xpercent22=$xp22/$totalQ22*100;
										$xpercent22 = number_format($xpercent22, 1);

		
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Very good  : '.$apercent22.'%</td><td colspan="3">B-Good : '.$bpercent22.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Average : '.$cpercent22.'%</td><td colspan="3">D-Poor : '.$dpercent22.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent22.'%</td>
										</tr>';

										
									}
									$apercent23=0;
									$bpercent23=0;
									$cpercent23=0;
									$dpercent23=0;
									$xpercent23=0;

									if($a==22)
									{
										$this->db->select('Q23');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p23=$p->Q23;
											
											
											if($p23=='A')
											{
												$ap23=$ap23+1;
											}
											if($p23=='B')
											{
												$bp23=$bp23+1;
											}
											if($p23=='C')
											{
												$cp23=$cp23+1;
											}
											if($p23=='D')
											{
												$dp23=$dp23+1;
											}
											if($p23=='X')
											{
												$xp23=$xp23+1;
											}
										}
										
										$totalQ23=$ap23+$bp23+$cp23+$dp23+$xp23;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap23.'</td><td>'.$bp23.'</td><td>'.$cp23.'</td><td>'.$dp23.'</td><td>'.$xp23.'</td><td>'.$totalQ23.'</td>
										</tr>';
										
										$apercent23=$ap23/$totalQ23*100;
										$apercent23 = number_format($apercent23, 1);
										$bpercent23=$bp23/$totalQ23*100;
										$bpercent23 = number_format($bpercent23, 1);
										$cpercent23=$cp23/$totalQ23*100;
										$cpercent23 = number_format($cpercent23, 1);
										$dpercent23=$dp23/$totalQ23*100;
										$dpercent23 = number_format($dpercent23, 1);
										$xpercent23=$xp23/$totalQ23*100;
										$xpercent23 = number_format($xpercent23, 1);

										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Very good  : '.$apercent23.'%</td><td colspan="3">B-Good : '.$bpercent23.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Average : '.$cpercent23.'%</td><td colspan="3">D-Poor : '.$dpercent23.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent23.'%</td>
										</tr>';	

										
									}
									$apercent24=0;
									$bpercent24=0;
									$cpercent24=0;
									$dpercent24=0;
									$xpercent24=0;

									if($a==23)
									{
										$this->db->select('Q24');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p24=$p->Q24;
											
											
											if($p24=='A')
											{
												$ap24=$ap24+1;
											}
											if($p24=='B')
											{
												$bp24=$bp24+1;
											}
											if($p24=='C')
											{
												$cp24=$cp24+1;
											}
											if($p24=='D')
											{
												$dp24=$dp24+1;
											}
											if($p24=='X')
											{
												$xp24=$xp24+1;
											}
										}
										
										$totalQ24=$ap24+$bp24+$cp24+$dp24+$xp24;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap24.'</td><td>'.$bp24.'</td><td>'.$cp24.'</td><td>'.$dp24.'</td><td>'.$xp24.'</td><td>'.$totalQ24.'</td>
										</tr>';
										
										

										$apercent24=$ap24/$totalQ24*100;
										$apercent24 = number_format($apercent24, 1);
										$bpercent24=$bp24/$totalQ24*100;
										$bpercent24 = number_format($bpercent24, 1);
										$cpercent24=$cp24/$totalQ24*100;
										$cpercent24 = number_format($cpercent24, 1);
										$dpercent24=$dp24/$totalQ24*100;
										$dpercent24 = number_format($dpercent24, 1);
										$xpercent24=$xp24/$totalQ24*100;
										$xpercent24 = number_format($xpercent24, 1);

		
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Very good  : '.$apercent24.'%</td><td colspan="3">B-Good : '.$bpercent24.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Average : '.$cpercent24.'%</td><td colspan="3">D-Poor : '.$dpercent24.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent24.'%</td>
										</tr>';	

									}
									$apercent25=0;
									$bpercent25=0;
									$cpercent25=0;
									$dpercent25=0;
									$xpercent25=0;

									if($a==24)
									{
										$this->db->select('Q25');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p25=$p->Q25;
											
											
											if($p25=='A')
											{
												$ap25=$ap25+1;
											}
											if($p25=='B')
											{
												$bp25=$bp25+1;
											}
											if($p25=='C')
											{
												$cp25=$cp25+1;
											}
											if($p25=='D')
											{
												$dp25=$dp25+1;
											}
											if($p25=='X')
											{
												$xp25=$xp25+1;
											}
										}
										
										$totalQ25=$ap25+$bp25+$cp25+$dp25+$xp25;
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap25.'</td><td>'.$bp25.'</td><td>'.$cp25.'</td><td>'.$dp25.'</td><td>'.$xp25.'</td><td>'.$totalQ25.'</td>
										</tr>';
										
										$apercent25=$ap25/$totalQ25*100;
										$apercent25 = number_format($apercent25, 1);
										$bpercent25=$bp25/$totalQ25*100;
										$bpercent25 = number_format($bpercent25, 1);
										$cpercent25=$cp25/$totalQ25*100;
										$cpercent25 = number_format($cpercent25, 1);
										$dpercent25=$dp25/$totalQ25*100;
										$dpercent25 = number_format($dpercent25, 1);
										$xpercent25=$xp25/$totalQ25*100;
										$xpercent25 = number_format($xpercent25, 1);

		
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Very Good  : '.$apercent25.'%</td><td colspan="3">B-Good : '.$bpercent25.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Average : '.$cpercent25.'%</td><td colspan="3">D-Poor : '.$dpercent25.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent25.'%</td>
										</tr>';	

									}
									
									$apercent26=0;
									$bpercent26=0;
									$cpercent26=0;
									$dpercent26=0;
									$xpercent26=0;
									if($a==25)
									{
										$this->db->select('Q26');
										$this->db->from('fb_overall');
										$qp=$this->db->get();
										
										foreach($qp->result() as $p)
										{
											$p26=$p->Q26;
											
											
											if($p26=='A')
											{
												$ap26=$ap26+1;
											}
											if($p26=='B')
											{
												$bp26=$bp26+1;
											}
											if($p26=='C')
											{
												$cp26=$cp26+1;
											}
											if($p26=='D')
											{
												$dp26=$dp26+1;
											}
											if($p26=='X')
											{
												$xp26=$xp26+1;
											}
										}
										
										$totalQ26=$ap26+$bp26+$cp26+$dp26+$xp26;
										
										
										
										$apercent26=$ap26/$totalQ26*100;
										$apercent26 = number_format($apercent26, 1);
										$bpercent26=$bp26/$totalQ26*100;
										$bpercent26 = number_format($bpercent26, 1);
										$cpercent26=$cp26/$totalQ26*100;
										$cpercent26 = number_format($cpercent26, 1);
										$dpercent26=$dp26/$totalQ26*100;
										$dpercent26 = number_format($dpercent26, 1);
										$xpercent26=$xp26/$totalQ26*100;
										$xpercent26 = number_format($xpercent26, 1);


							
										$output .='<tr><td width="15%" style="font-weight: bold">A</td><td width="15%" style="font-weight: bold">B</td><td width="15%" style="font-weight: bold">C</td><td width="15%" style="font-weight: bold">D</td><td width="15%" style="font-weight: bold">X</td><td width="15%"></td>
										</tr>';
										
										$output .='<tr><td>'.$ap26.'</td><td>'.$bp26.'</td><td>'.$cp26.'</td><td>'.$dp26.'</td><td>'.$xp26.'</td><td>'.$totalQ26.'</td>
										</tr>';
										
										$output .='<tr><td colspan="6" style="font-weight: bold">Overall Percentage</td>
										</tr>';
										
										$output .='<tr><td colspan="3">A-Always  : '.$apercent26.'%</td><td colspan="3">B-Sometimes : '.$bpercent26.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="3">C-Rarely : '.$cpercent26.'%</td><td colspan="3">D-Never : '.$dpercent26.'%</td>
										</tr>';
										
										$output .='<tr><td colspan="6">X : '.$xpercent26.'%</td>
										</tr>';
										
										
									}
									
								$output .='</table>';
								$a=$a+1;
								
							}
		return $output;
	}
	
	public function getQ3comments()
	{
		$output='';
		
					$this->db->select('DISTINCT(Dept_name),Campus_code');
					//$this->db->order_by("Dept_name", "asc");
					$this->db->order_by("Campus_code", "asc");
					$this->db->from('fb_overall');
					$q=$this->db->get();
					
					foreach($q->result() as $row)
					{
						$campus=$row->Campus_code;
					
						$dept=$row->Dept_name;
						
							$this->db->select('Campus_name');
							$this->db->from('Campus');
							$this->db->where('Campus_code',$campus);
							$qcamp=$this->db->get();
							
							foreach($qcamp->result() as $q3)
							{
								$campusname=$q3->Campus_name;
								
								$output .='<h2><center>'.$campusname.'<center></h2>';
							}
						$output .='<h3><center>Students Comments in Questionnaire3<center></h3>';
						
						$this->db->select('DISTINCT(Pgm_name)');
						$this->db->order_by("Pgm_name", "asc");
						$this->db->from('fb_overall');
						$this->db->where('Dept_name',$dept);
						$qry=$this->db->get();
						foreach($qry->result() as $qp)
						{
								$pgm=$qp->Pgm_name;
								
								$output .='<h4>'.$pgm.'</h4>';
								
								$output .='<table  border="3" style="page-break-after:always; width="100%" cellspacing="1" cellpadding="5">';
						
						
							$output .='<tr><th width="3%">No</th>
							<th width="40%">27. If you have any other comments to offer on the course and teachers you may do so below </th>
							<th width="40%">28.Your suggestions to improve the quality of program and teachers</th>
							
							</tr>';
							
							$this->db->select('DISTINCT(User)');
							$this->db->from('fb_overall');
							$this->db->where('Pgm_name',$pgm);
							$qry1=$this->db->get();
							
							foreach($qry1->result() as $qu)
							{
								$u=$qu->User;
								$user=substr($u,-3);
								
								$this->db->select('Q27,Q28');
								$this->db->from('fb_overall');
								$this->db->where('User',$u);
								$qry2=$this->db->get();
								foreach($qry2->result() as $qc)
								{
									$output .='<tr><td width="3%">'.$user.'</td>
									<td width="40%">'.$qc->Q27.'</td>
									<td width="40%">'.$qc->Q28.'</td>
									</tr>';
									
								}
								
								
								
							}
							
							
								
						}
						
						$output .='</table>';
						
					}
		return $output;
		
	}
	
	
	
	public function getQ3responses()
	{
		$output='';
		
					$this->db->select('DISTINCT(Dept_name),Campus_code');
					//$this->db->order_by("Dept_name", "asc");
					$this->db->order_by("Campus_code", "asc");
					$this->db->from('fb_overall');
					$q=$this->db->get();
					
					foreach($q->result() as $row)
					{
						$campus=$row->Campus_code;
					
						$dept=$row->Dept_name;
						
							$this->db->select('Campus_name');
							$this->db->from('Campus');
							$this->db->where('Campus_code',$campus);
							$qcamp=$this->db->get();
							
							foreach($qcamp->result() as $q3)
							{
								$campusname=$q3->Campus_name;
								
								$output .='<h2><center>'.$campusname.'<center></h2>';
							}
						$output .='<h3><center>Department of '.$dept.'<center></h3>';
						
						$this->db->select('DISTINCT(Pgm_name)');
						$this->db->order_by("Pgm_name", "asc");
						$this->db->from('fb_overall');
						$this->db->where('Dept_name',$dept);
						$qry=$this->db->get();
						foreach($qry->result() as $qp)
						{
								$pgm=$qp->Pgm_name;
								
								$output .='<h4>'.$pgm.'</h4>';
								
								$output .='<table  border="3" style="page-break-after:always;" width="100%" cellspacing="1" cellpadding="5">';
						
						
							$output .='<tr><th width="5%">User</th>
							<th width="5%">Sl.No</th>
							<th width="95%">Parameters</th>
							<th width="4%">Response</th>
							
							</tr>';
							
							$this->db->select('DISTINCT(User)');
							$this->db->from('fb_overall');
							$this->db->where('Pgm_name',$pgm);
							$qry1=$this->db->get();
							
							foreach($qry1->result() as $qu)
							{
								$u=$qu->User;
								$user=substr($u,-3);
								
								$this->db->select('*');
								$this->db->from('fb_overall');
								$this->db->where('User',$u);
								$qry2=$this->db->get();
								foreach($qry2->result() as $qc)
								{
									$q1=$qc->Q1;
												if($q1=='A')
												{
													$q1=$q1.'-Challenging';
												}
												if($q1=='B')
												{
													$q1=$q1.'-Adequate';
												}
												if($q1=='C')
												{
													$q1=$q1.'-Dull';
												}
												if($q1=='D')
												{
													$q1=$q1.'-Inadequate';
												}
									$q2=$qc->Q2;
									
												if($q2=='A')
												{
													$q2=$q2.'-More than adequate';
												}
												if($q2=='B')
												{
													$q2=$q2.'-Just adequate ';
												}
												if($q2=='C')
												{
													$q2=$q2.'-Inadequate';
												}
									$q3=$qc->Q3;			
												if($q3=='A')
												{
													$q3=$q3.'-Easy';
												}
												if($q3=='B')
												{
													$q3=$q3.'-Manageable';
												}
												if($q3=='C')
												{
													$q3=$q3.'-Difficult';
												}
												if($q3=='D')
												{
													$q3=$q3.'-Very Difficult';
												}
												
												
									$q4=$qc->Q4;			
												if($q4=='A')
												{
													$q4=$q4.'-85 to 100%';
												}
												if($q4=='B')
												{
													$q4=$q4.'-70 to 85%';
												}
												if($q4=='C')
												{
													$q4=$q4.'-55 to 70%';
												}
												if($q4=='D')
												{
													$q4=$q4.'-Less than 55%';
												}
									$q5=$qc->Q5;			
												if($q5=='A')
												{
													$q5=$q5.'-Excellent';
												}
												if($q5=='B')
												{
													$q5=$q5.'-Adequate';
												}
												if($q5=='C')
												{
													$q5=$q5.'-Inadequate';
												}
												if($q5=='D')
												{
													$q5=$q5.'-Very Poor';
												}
									$q6=$qc->Q6;			
												if($q6=='A')
												{
													$q6=$q6.'-Easily';
												}
												if($q6=='B')
												{
													$q6=$q6.'-With difficulty';
												}
												if($q6=='C')
												{
													$q6=$q6.'-With great difficulty';
												}
												if($q6=='D')
												{
													$q6=$q6.'-Not at all';
												}
									$q7=$qc->Q7;			
												if($q7=='A')
												{
													$q7=$q7.'-Throughly';
												}
												if($q7=='B')
												{
													$q7=$q7.'-Satisfactorily';
												}
												if($q7=='C')
												{
													$q7=$q7.'-Poorly';
												}
												if($q7=='D')
												{
													$q7=$q7.'-Indifferently';
												}
									$q8=$qc->Q8;			
												if($q8=='A')
												{
													$q8=$q8.'-Excellent';
												}
												if($q8=='B')
												{
													$q8=$q8.'-Effectively';
												}
												if($q8=='C')
												{
													$q8=$q8.'-Satisfactorily';
												}
												if($q8=='D')
												{
													$q8=$q8.'-Indifferently';
												}
									$q9=$qc->Q9;			
												if($q9=='A')
												{
													$q9=$q9.'-Always';
												}
												if($q9=='B')
												{
													$q9=$q9.'-Sometimes';
												}
												if($q9=='C')
												{
													$q9=$q9.'-Tried';
												}
												if($q9=='D')
												{
													$q9=$q9.'-Not all';
												}
									$q10=$qc->Q10;			
												if($q10=='A')
												{
													$q10=$q10.'-Very helpful';
												}
												if($q10=='B')
												{
													$q10=$q10.'-Helpful';
												}
												if($q10=='C')
												{
													$q10=$q10.'-Sometimes helpful';
												}
												if($q10=='D')
												{
													$q10=$q10.'-Unhelpful';
												}
												
									$q11=$qc->Q11;			
												if($q11=='A')
												{
													$q11=$q11.'-Most Courteous';
												}
												if($q11=='B')
												{
													$q11=$q11.'-Generally';
												}
												if($q11=='C')
												{
													$q11=$q11.'-Indifferent?';
												}
												if($q11=='D')
												{
													$q11=$q11.'-Rude?';
												}
								$q12=$qc->Q12;			
												if($q12=='A')
												{
													$q12=$q12.'-Fair and Impartial';
												}
												if($q12=='B')
												{
													$q12=$q12.'-Discriminatory';
												}
												if($q12=='C')
												{
													$q12=$q12.'-Too Strict';
												}
												if($q12=='D')
												{
													$q12=$q12.'-Too Liberal';
												}
								$q13=$qc->Q13;			
												if($q13=='A')
												{
													$q13=$q13.'-In time';
												}
												if($q13=='B')
												{
													$q13=$q13.'-Late';
												}
												if($q13=='C')
												{
													$q13=$q13.'-Reluctantly';
												}
												if($q13=='D')
												{
													$q13=$q13.'-Not at all';
												}
								$q14=$qc->Q14;			
												if($q14=='A')
												{
													$q14=$q14.'-Yes, fully';
												}
												if($q14=='B')
												{
													$q14=$q14.'-Yes Partly';
												}
												if($q14=='C')
												{
													$q14=$q14.'-Sometimes';
												}
												if($q14=='D')
												{
													$q14=$q14.'-No';
												}
												
								$q15=$qc->Q15;			
												if($q15=='A')
												{
													$q15=$q15.'-Yes';
												}
												if($q15=='B')
												{
													$q15=$q15.'-No';
												}
								$q16=$qc->Q16;			
												if($q16=='A')
												{
													$q16=$q16.'-Yes';
												}
												if($q16=='B')
												{
													$q16=$q16.'-No';
												}
								$q17=$qc->Q17;			
												if($q17=='A')
												{
													$q17=$q17.'-Yes';
												}
												if($q17=='B')
												{
													$q17=$q17.'-No';
												}
												
								$q18=$qc->Q18;			
												if($q18=='A')
												{
													$q18=$q18.'-Yes';
												}
												if($q18=='B')
												{
													$q18=$q18.'-Too Some Extent';
												}
												if($q18=='C')
												{
													$q18=$q18.'-No';
												}
												
								$q19=$qc->Q19;			
												if($q19=='A')
												{
													$q19=$q19.'-Yes';
												}
												if($q19=='B')
												{
													$q19=$q19.'-Too Some Extent';
												}
												if($q19=='C')
												{
													$q19=$q19.'-No';
												}
								$q20=$qc->Q20;			
												if($q20=='A')
												{
													$q20=$q20.'-Yes';
												}
												if($q20=='B')
												{
													$q20=$q20.'-Too Some Extent';
												}
												if($q20=='C')
												{
													$q20=$q20.'-No';
												}
								$q21=$qc->Q21;			
												if($q21=='A')
												{
													$q21=$q21.'-Frequently';
												}
												if($q21=='B')
												{
													$q21=$q21.'-Occasionally';
												}
												if($q21=='C')
												{
													$q21=$q21.'-Rarely';
												}
												if($q21=='D')
												{
													$q21=$q21.'-Never';
												}
												
								$q22=$qc->Q22;			
												if($q22=='A')
												{
													$q22=$q22.'-Very Good';
												}
												if($q22=='B')
												{
													$q22=$q22.'-Good';
												}
												if($q22=='C')
												{
													$q22=$q22.'-Average';
												}
												if($q22=='D')
												{
													$q22=$q22.'-Poor';
												}
								$q23=$qc->Q23;			
												if($q23=='A')
												{
													$q23=$q23.'-Very Good';
												}
												if($q23=='B')
												{
													$q23=$q23.'-Good';
												}
												if($q23=='C')
												{
													$q23=$q23.'-Average';
												}
												if($q23=='D')
												{
													$q23=$q23.'-Poor';
												}
								$q24=$qc->Q24;			
												if($q24=='A')
												{
													$q24=$q24.'-Very Good';
												}
												if($q24=='B')
												{
													$q24=$q24.'-Good';
												}
												if($q24=='C')
												{
													$q24=$q24.'-Average';
												}
												if($q24=='D')
												{
													$q24=$q24.'-Poor';
												}
								$q25=$qc->Q25;			
												if($q25=='A')
												{
													$q25=$q25.'-Very Good';
												}
												if($q25=='B')
												{
													$q25=$q25.'-Good';
												}
												if($q25=='C')
												{
													$q25=$q25.'-Average';
												}
												if($q25=='D')
												{
													$q25=$q25.'-Poor';
												}
								$q26=$qc->Q26;			
												if($q26=='A')
												{
													$q26=$q26.'-Always';
												}
												if($q26=='B')
												{
													$q26=$q26.'-Sometimes';
												}
												if($q26=='C')
												{
													$q26=$q26.'-Rarely';
												}
												if($q26=='D')
												{
													$q26=$q26.'-Never';
												}

									$output .='<tr><td width="5%">'.$user.'</td>
									<td width="3%">1.</td>
									<td width="40%">The Syllabus Was</th>
									<th width="40%">'.$q1.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">2.</td>
									<td width="40%">Your background for pursing the course was</th>
									<th width="40%">'.$q2.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">3.</td>
									<td width="40%">Conceptually how difficult the courses was</th>
									<th width="40%">'.$q3.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">4.</td>
									<td width="40%">How much of the syllabus was covered in class?</th>
									<th width="40%">'.$q4.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">5.</td>
									<td width="40%">What is your opinion about the library materials for the course?</th>
									<th width="40%">'.$q5.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">6.</td>
									<td width="40%">Were you able to get the prescribed reading material?</th>
									<th width="40%">'.$q6.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">7.</td>
									<td width="40%">How well did the teachers prepare for class?</th>
									<th width="40%">'.$q7.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">8.</td>
									<td width="40%">How well did the teachers communicate?</th>
									<th width="40%">'.$q8.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">9.</td>
									<td width="40%">Did the teachers encourage student participation in class?</th>
									<th width="40%">'.$q9.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">10.</td>
									<td width="40%">How helpful was the teachers’ advice? </th>
									<th width="40%">'.$q10.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">11.</td>
									<td width="40%">Were the teachers </th>
									<th width="40%">'.$q11.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">12.</td>
									<td width="40%">Internal assessment in the department was</th>
									<th width="40%">'.$q12.'</th>
									</tr>';
									
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">13.</td>
									<td width="40%">How did the teachers provide feedback on your performance?</th>
									<th width="40%">'.$q13.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">14.</td>
									<td width="40%">Were your assignments discussed with you?</th>
									<th width="40%">'.$q14.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">15.</td>
									<td width="40%">Were you briefed with an outline of the coursework and the scheme of evaluation at the beginning?</th>
									<th width="40%">'.$q15.'</th>
									</tr>';
									
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">16.</td>
									<td width="40%">Was the briefing helpful?</th>
									<th width="40%">'.$q16.'</th>
									</tr>';
									
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">17.</td>
									<td width="40%">Was the outline followed?</th>
									<th width="40%">'.$q17.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">18.</td>
									<td width="40%">Was there any opportunity for personal interaction with teachers?</th>
									<th width="40%">'.$q18.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">19.</td>
									<td width="40%">Was there a provision for counselling in the department </th>
									<th width="40%">'.$q19.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">20.</td>
									<td width="40%">Was there any opportunity for group study? </th>
									<th width="40%">'.$q20.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">21.</td>
									<td width="40%">Were external experts invited to address you? </th>
									<th width="40%">'.$q21.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">22.</td>
									<td width="40%">Orientation given by the teachers through field and lab studies was </th>
									<th width="40%">'.$q22.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">23.</td>
									<td width="40%">Encouragement of the department for co-curricular activities was </th>
									<th width="40%">'.$q23.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">24.</td>
									<td width="40%">Overall academic atmosphere in the department was? </th>
									<th width="40%">'.$q24.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">25.</td>
									<td width="40%">Discipline and good practices of the teachers in the department were</th>
									<th width="40%">'.$q25.'</th>
									</tr>';
									
									$output .='<tr>
									<td width="3%"></td>
									<td width="3%">26.</td>
									<td width="40%">Do the teachers motivate students to pursue research? </th>
									<th width="40%">'.$q26.'</th>
									</tr>';
									
									
								}
								
								
								
							}
							
							
								
						}
						
						$output .='</table>';
						
					}
		return $output;
		
	}
	
	
	
	
	
}

