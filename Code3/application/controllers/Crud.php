<?php 
class Crud extends CI_Controller 
{
	var $result = array();
	
	var $total1=0;

	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	$this->load->helper('form','url');
	
	$this->load->library('session');
	
	$this->load->library('form_validation');

	
	/*load database libray manually*/
	$this->load->database();
	
	/*load Model*/
	$this->load->model('Crud_model');
	
	$this->load->library('pdf');
	}
	
	public function index()  
    {  
			
			$this->load->view('index');
	}
	
	public function admin()  
    {  
			
			$this->load->view('admin/indexadmin');
	}
	
	
	public function student()  
    {  
			
			$this->load->view('LoginPage');
	}
	
	public function dashboard()  
    {  
			
			$this->load->view('admin/dashboard');
	}
	
	public function adminlogin()  
    {  			$username=$this->input->post('uname');
				$password=$this->input->post('pass');
				
				
				if($this->Crud_model->loginadmin($username,$password))
				{
					$session_data=array(
					'username' => $username,
					'password' => $password
					);
					$this->session->set_userdata($session_data);
			
					$this->load->view('admin/dashboard');
				}
				else
				{
					echo "<script>alert('Invalid Username or Password');</script>";
						redirect(base_url().'Crud/index','refresh');
				}
	}
	
	
	public function add_faculty()  
	{  			
			$Fresult['data']=$this->Crud_model->getcampus();
			$this->load->view('admin/add_faculty',$Fresult);	
	}
   
	public function add_campus()  
	{  			
			$this->load->view('admin/add_campus');	
	}
   
	public function add_dept()  
	{  		$Dresult['data']=$this->Crud_model->getcampus();
			$this->load->view('admin/add_dept',$Dresult);	
	}
   
    public function add_pgm()  
   {  		
			$Presult['cdata']=$this->Crud_model->getcampus();
			$this->load->view('admin/add_prgm',$Presult);	
   }
   
   public function add_course()  
   {  		
			$Cresult['cdata']=$this->Crud_model->getcampus();
			$this->load->view('admin/add_course',$Cresult);	
   }
   
   public function add_studentstr()  
   {  		
			$sresult['cdata']=$this->Crud_model->getcampus();
			$this->load->view('admin/add_studentstr',$sresult);	
   }
   
   
   public function manage_faculty()  
   {  			
			$Ccode=$this->input->post('myCampus');
			$Dcode=$this->input->post('myDept');
			$type=$this->input->post('type');
			$pgm=$this->input->post('myPgm');
			
			
				$Fresult['data']=$this->Crud_model->get_allfaculty($Dcode,$Ccode);
				$this->load->view('admin/manage_faculty',$Fresult);		
			
   }
   
   public function manage_campus()  
   {  			
				$cresult['data']=$this->Crud_model->getcampus();
				$this->load->view('admin/manage_campus',$cresult);		
   }
   
   public function manage_dept()  
   {  			 
				$Dresult['data']=$this->Crud_model->getdept();
				$this->load->view('admin/manage_dept',$Dresult);		
   }
   
   public function manage_pgm()  
   {  			 
				$Ccode=$this->input->post('myCampus');
				$Dcode=$this->input->post('myDept');
				
				$Presult['data']=$this->Crud_model->get_allpgm($Dcode,$Ccode);
					
				$this->load->view('admin/manage_pgm',$Presult);		
   }
   
   public function manage_stdstr()  
   {  			 
				$Ccode=$this->input->post('myCampus');
				$Dcode=$this->input->post('myDept');
				
				$Sresult['data']=$this->Crud_model->get_allstdstr($Dcode,$Ccode);
				$Sresult['dept']=$this->Crud_model->get_deptname($Dcode);
				if($Sresult['data'])
				{
					
				$this->load->view('admin/manage_stdstr',$Sresult);	
				
				}		

				else
				{
					echo "<script>alert('Student Details not Found');</script>";
				    redirect(base_url().'Crud/dashboard','refresh');
				}
   }
   
    public function manage_course()  
   {  			 
				$Ccode=$this->input->post('myCampus');
				$Dcode=$this->input->post('myDept');
				$Pname=$this->input->post('myPgm');
				
				
				$Cresult['data']=$this->Crud_model->get_allcourse($Pname,$Dcode,$Ccode);
				$Cresult['dept']=$this->Crud_model->get_deptname($Dcode);
				
				
				if($Cresult['data'])
				{
					$this->load->view('admin/manage_course',$Cresult);		
				}
					
				//echo "<script>alert('Course Details not Found');</script>";
				//redirect(base_url().'Crud/dashboard','refresh');
   }
   
   public function deletet()  
   {  			
			$id=$this->input->post('id');
			
			$output=$this->Crud_model->delete_faculty($id);
			
			print_r($output);
			
   }
   
   public function deletec()  
   {  			
			$id=$this->input->post('id');
			
			$output=$this->Crud_model->delete_campus($id);
			
			print_r($output);
			
   }
   
   public function deletecourse()  
   {  			
			$id=$this->input->post('id');
			
			$output=$this->Crud_model->delete_course($id);
			
			print_r($output);
			
   }
   
   public function deleted()  
   {  			
			$id=$this->input->post('id');
			
			$output=$this->Crud_model->delete_department($id);
			
			print_r($output);
			
   }
   
   public function deletep()  
   {  			
			$id=$this->input->post('id');
			
			$output=$this->Crud_model->delete_programme($id);
			
			print_r($output);
			
   }
   
   public function deletes()  
   {  			
			$id=$this->input->post('id');
			
			$output=$this->Crud_model->delete_stdstr($id);
			
			print_r($output);
   }
   
   
   public function updatet()  
   {  			
			$id=$this->input->post('id');
			
			$session_update=array(
					'id' => $id
					);
					$this->session->set_userdata($session_update);
					
					print_r($id);
   }
   
   public function updatec()  
   {  			
			$id=$this->input->post('id');
			
			$session_update=array(
					'id' => $id
					);
					$this->session->set_userdata($session_update);
					
					print_r($id);
   }
   
   public function updated()  
   {  			
			$id=$this->input->post('id');
			
			$session_update=array(
					'id' => $id
					);
					$this->session->set_userdata($session_update);
					
					print_r($id);
   }
   
   public function updatep()  
   {  			
			$id=$this->input->post('id');
			
			$session_update=array(
					'id' => $id
					);
					$this->session->set_userdata($session_update);
					
					print_r($id);
   }
   
   public function updates()  
   {  			
			$id=$this->input->post('id');
			
			$session_update=array(
					'id' => $id
					);
					$this->session->set_userdata($session_update);
					
					print_r($id);
   }
   
   public function updatecourse()  
   {  			
			$id=$this->input->post('id');
			
			$session_update=array(
					'id' => $id
					);
					$this->session->set_userdata($session_update);
					
					print_r($id);
   }
   
   
   
   public function updateform()  
   {  			
			$id   = $this->session->userdata('id');
			
			$Fresult['data']=$this->Crud_model->get_ufaculty($id);
			$this->load->view('admin/update_faculty',$Fresult);	
			
   }
   
   public function updateformc()  
   {  			
			$id   = $this->session->userdata('id');
			
			$cresult['data']=$this->Crud_model->get_ucampus($id);
			$this->load->view('admin/update_campus',$cresult);	
			
   }
   
   public function updateformd()  
   {  			
			$id   = $this->session->userdata('id');
			
			$Dresult['data']=$this->Crud_model->get_udepartment($id);
			$this->load->view('admin/update_dept',$Dresult);	
			
   }
   
   
   public function updateformp()  
   {  			
			$id   = $this->session->userdata('id');
			
			$Presult['data']=$this->Crud_model->get_upgm($id);
			$this->load->view('admin/update_pgm',$Presult);	
			
   }
   
    public function updateforms()  
   {  			
			$id   = $this->session->userdata('id');
			
			$Presult['data']=$this->Crud_model->get_ustdstr($id);

			$dcode=$Presult['data'][0]->Dept_code;
			$Presult['dept']=$this->Crud_model->get_deptname($dcode);			
			$this->load->view('admin/update_stdstr',$Presult);	
			
   }
   
   public function updatefcourse()  
   {  			
			$id   = $this->session->userdata('id');
			
			$Cresult['data']=$this->Crud_model->get_ucourse($id);
			$dcode=$Cresult['data'][0]->dept_code;
			$Cresult['dept']=$this->Crud_model->get_deptname($dcode);
			$this->load->view('admin/update_course',$Cresult);	
			
   }
   
   public function change_pass()  
   {  			
			$this->load->view('admin/update_password');
			
   }
   public function update_faculty()  
   {  			
			$id=$this->input->post('fid');
			$fname=$this->input->post('fname');
			$Dname=$this->input->post('fdname');
			$Pname=$this->input->post('fpname');
			
			$Fresult['dept']=$this->Crud_model->getdeptdetails($Dname);
			
			if($Fresult['dept'])
			{
				$Fresult['pgm']=$this->Crud_model->getpgmdetails($Dname,$Pname);
				
				if($Fresult['pgm'])
				{
					$output=$this->Crud_model->updatefactinfo($id,$fname,$Dname,$Pname,$Fresult['dept'][0]->Dept_code,$Fresult['dept'][0]->Campus_code,$Fresult['pgm'][0]->Pgm_code);
				}
				
			}
			
			print_r($id);
   }
   
   public function update_campus()  
   {  			
			$id=$this->input->post('fid');
			$cname=$this->input->post('cname');
			
			$output=$this->Crud_model->updatecampusinfo($id,$cname);
	
			print_r($id);
   }
   
   public function update_dept()  
   {  			
			$id=$this->input->post('fid');
			$dname=$this->input->post('dname');
			$ccode=$this->input->post('ccode');
			$output=$this->Crud_model->updatedeptinfo($id,$dname,$ccode);
	
			print_r($ccode);
   }
   
   
   public function update_pgm()  
   {  			
			$id=$this->input->post('pid');
			$pcode=$this->input->post('pcode');
			$ccode=$this->input->post('ccode');
			$dname=$this->input->post('dname');
			$pname=$this->input->post('pname');
			$output=$this->Crud_model->updatepgminfo($id,$pcode,$ccode,$dname,$pname);
	
			print_r($output);
   }
   
   
   public function update_course()  
   {  			
			$id=$this->input->post('pid');
			$crcode=$this->input->post('crcode');
			$crname=$this->input->post('crname');
			$pname=$this->input->post('pname');
			$dname=$this->input->post('dname');
			$ccode=$this->input->post('campcode');
			
			//$cresult['dcode']=$this->Crud_model->getdeptcode($dname);
			//$dcode=$cresult['dcode'][0]->Dept_code;
			
					$output=$this->Crud_model->updatecourseinfo($id,$crcode,$crname,$pname);
   }
   
   public function update_str()  
   {  			
			$id=$this->input->post('id');
			//$pname=$this->input->post('pname');
			//$sem=$this->input->post('sem');
			$str=$this->input->post('str');
			//$dname=$this->input->post('dname');
			
					$output=$this->Crud_model->updatestrinfo($id,$str);
			
			
			print_r($id);
   }
   
   public function search_faculty()  
   {  			
			$Fresult['campus']=$this->Crud_model->getcampus();
			$this->load->view('admin/searchfaculty',$Fresult);	
   }
   
   public function search_pgm()  
   {  			
			$Presult['campus']=$this->Crud_model->getcampus();
			$this->load->view('admin/searchpgm',$Presult);	
   }
   
   public function search_std()  
   {  			
			$Presult['campus']=$this->Crud_model->getcampus();
			$this->load->view('admin/searchstd',$Presult);	
   }
   
   public function search_course()  
   {  			
			$Cresult['campus']=$this->Crud_model->getcampus();
			$this->load->view('admin/searchcourse',$Cresult);	
   }
   
   public function insert_campus()  
   {  		
			$campusname=$this->input->post('cname');
			
			$cresult['check']=$this->Crud_model->checkc($campusname);
			
			if ($cresult['check'])
			{
				
				$res['error']="Campus Details Already Exists..!!";
				$this->load->view('admin/add_campus',$res);	
				
			}
			else
			{
			
					$cresult['data']=$this->Crud_model->getcampusdata();
					
					if ($cresult['data'])
					{
						
						$ccode=$cresult['data'][0]->Campus_code;
						$ccode=$ccode+111;
						
					}
					else
					{
						$ccode="111";
					}
					
					$data["Campus_code"]=$ccode;
					$data["Campus_name"]=$campusname;
					
					
					$cresult['insert']=$this->Crud_model->insertcampus($data);
					
					if($cresult['insert'])
					{
						
						$res['message']="Campus Details Inserted Successfully!!";
						$this->load->view('admin/add_campus',$res);	
						
					}
			}
			
   }
   
public function insert_dept()  
{  		
			$Ccode=$this->input->post('fcampus');
			$Dname=$this->input->post('dname');
			
			$Dresult['check']=$this->Crud_model->checkd($Ccode,$Dname);
			
			if ($Dresult['check'])
			{
				
				$res['error']="Department Details Already Exists..!!";
				$this->load->view('admin/add_dept',$res);	
				
				
			}
			else
			{
			
				$data["Dept_name"]=$Dname;
				$data["Campus_code"]=$Ccode;
				
				$Dresult['insert']=$this->Crud_model->insertdept($data);
				
				if($Dresult['insert'])
				{
						$res['message']="Department Details Inserted Successfully!!";
						$this->load->view('admin/add_dept',$res);	
				}
			}
			
			
}

public function insert_pgm()  
{  		
			$Ccode=$this->input->post('fcampus');
			$Dcode=$this->input->post('dname');
			$Pcode=$this->input->post('pcode');
			$Pname=$this->input->post('pname');
			
			$Presult['check']=$this->Crud_model->checkp($Pcode,$Pname,$Dcode,$Ccode);
			
			if ($Presult['check'])
			{
				
				$res['error']="Programme Details Already Exists..!!";
				$this->load->view('admin/add_prgm',$res);	
				
			}
			else
			{
			
					$Pcode=strtoupper($Pcode);
					
					$Presult['dept']=$this->Crud_model->get_deptname($Dcode);
					$deptname = $Presult['dept'][0]->Dept_name;
					
					$data["Pgm_code"]=$Pcode;
					$data["Pgm_name"]=$Pname;
					$data["Dept_code"]=$Dcode;
					$data["Dept_name"]=$deptname;
					$data["Campus_code"]=$Ccode;
					
					
					$Presult['insert']=$this->Crud_model->insertpgm($data);
					
					if($Presult['insert'])
					{
						$res['message']="Programme Details Inserted Successfully!!";
								$this->load->view('admin/add_prgm',$res);
					}
			}
			
}

public function insert_studentstr()  
{  		
			$Ccode=$this->input->post('fcampus');
			$Dcode=$this->input->post('dname');
			$Pname=$this->input->post('pname');
			$sem=$this->input->post('sem');
			$strength=$this->input->post('str');
			
			$Presult['check']=$this->Crud_model->checkstr($sem,$Pname,$Dcode,$Ccode);
			
			if ($Presult['check'])
			{
				
				$res['error']="Student Strength Details Already Exists..!!";
				$this->load->view('admin/add_studentstr',$res);	
				
			}
			else
			{
			
				$data["Pgm_name"]=$Pname;
				$data["Sem"]=$sem;
				$data["Std_strength"]=$strength;
				$data["Dept_code"]=$Dcode;
				$data["Campus_code"]=$Ccode;
				
				
				$Presult['insert']=$this->Crud_model->insertstdstr($data);
				
				if($Presult['insert'])
				{
							$res['message']="Student Strength Details Inserted Successfully!!";
							$this->load->view('admin/add_studentstr',$res);
				}
			}
			
}


public function insert_course()  
{  		
			$Ccode=$this->input->post('fcampus');
			$Dcode=$this->input->post('dname');
			$Pname=$this->input->post('pname');
			$Sem=$this->input->post('sem');
			
			$code1=$this->input->post('dcode1');
			$code2=$this->input->post('dcode2');
			$code3=$this->input->post('dcode3');
			$code4=$this->input->post('dcode4');
			$code5=$this->input->post('dcode5');
			$code6=$this->input->post('dcode6');
			
			$cname1=$this->input->post('dname1');
			$cname2=$this->input->post('dname2');
			$cname3=$this->input->post('dname3');
			$cname4=$this->input->post('dname4');
			$cname5=$this->input->post('dname5');
			$cname6=$this->input->post('dname6');
			
			$status=0;
			$i=0;
			
			$arrcode = array(
			'0' =>$code1,
			'1' =>$code2,
			'2' =>$code3,
			'3' =>$code4,
			'4' =>$code5,
			'5'  =>$code6
			);
			
			$arrname = array(
			'0' =>$cname1,
			'1' =>$cname2,
			'2' =>$cname3,
			'3' =>$cname4,
			'4' =>$cname5,
			'5' =>$cname6
			);
			
			
			
		
			for( $i=0; $i<=5; $i++ )
			{
				if($arrcode[$i]!="" || $arrname[$i]!="")
				{
					
					$cres['check']=$this->Crud_model->checkcourse($arrcode[$i],$arrname[$i],$Sem,$Pname,$Dcode,$Ccode);
				
					if ($cres['check'])
					{
						
						$arrcode[$i]="";
						$arrname[$i]="";
						
						
					}
					else
					{
					
						$cres['pgm']=$this->Crud_model->getpcode($Pname);
						$pcode = $cres['pgm'][0]->Pgm_code;
						
						$data["campus_code"]=$Ccode;
						$data["dept_code"]=$Dcode;
						$data["prgrm_code"]=$pcode;
						$data["course_code"]=$arrcode[$i];
						$data["course_name"]=$arrname[$i];
						$data["semester"]=$Sem;
						$data["programme_name"]=$Pname;
						
					
						$cres['insert']=$this->Crud_model->insertcourse($data);
						
						if($cres['insert'])
						{
							$status=1;
						}
					}
				}
				
			}
			if($status==0)
			{
					$res['error']="Course Details Already Exists..!!";
					$this->load->view('admin/add_course',$res);	
					
			}
			else
			{
				$res['message']="Course Details Inserted Successfully!!";
								$this->load->view('admin/add_course',$res);
			}		
}
   
public function insert_faculty()  
{  		
			$Ccode=$this->input->post('fcampus');
			$Dcode=$this->input->post('dfaculty');
			$type=$this->input->post('tfaculty');
			$pgm=$this->input->post('fpgm');
			$n=$this->input->post('name');
			$name=$this->input->post('fname');
			$facultyname=$n." ".$name;
			$pname= explode(' ', trim($facultyname));
			
			
			$Fresult['check']=$this->Crud_model->checkf($Ccode,$Dcode,$facultyname);
			
			if ($Fresult['check'])
			{
				
					$res['error']="Faculty Details Already Exists..!!";
					$this->load->view('admin/add_faculty',$res);	
				
			}
			else{
			if(sizeof($pname)>3)
			{
				$f1=substr($pname[1],0,1);
				$f2=substr($pname[2],0,1);
				$f3=substr($pname[3],0,1);
				$fcode=$f1.$f2.$f3;
				$factcode=strtoupper($fcode);
			}
			else if(sizeof($pname)==3)
			{
				$f1=substr($pname[1],0,2);
				$f2=substr($pname[2],0,1);
				$fcode=$f1.$f2;
				$factcode=strtoupper($fcode);
			}
			else
			{
				$f1=substr($pname[1],0,3);
				$factcode=strtoupper($f1);
			}
			
			
			$Fresult['data']=$this->Crud_model->get_deptname($Dcode);
			$dname=$Fresult['data'][0]->Dept_name;
			
			
			if($pgm=="Select Programme")
			{
				$pgm='X';
			}
			
			$data["P_G_faculty"]=$type;
			$data["Faculty_name"]=$facultyname;
			$data["F_code"]=$factcode;
			$data["Dept_name"]=$dname;
			$data["Dept_code"]=$Dcode;
			$data["Campus_code"]=$Ccode;
			$data["Pgm_name"]=$pgm;
			
			$Fresult['insert']=$this->Crud_model->saverecords($data);
			
			if($Fresult['insert'])
			{
							$res['message']="Faculty Details Inserted Successfully!!";
							$this->load->view('admin/add_faculty',$res);
			}
			}

}
	
	
	public function viewcredentials()  
    {  
			$result['data1']=$this->Crud_model->getcampus();
		 
			$this->load->view('Viewcred',$result); 
			
	}
	
	public function Pdfview()  
    {  
			$Ccode=$this->input->post('myCampus');
			$Dcode=$this->input->post('myDept');
			$pgm=$this->input->post('myPgm');
			$Sem=$this->input->post('mySem');
			
			$html_content='<h3 align="center">Credential Details</h3>';
			$html_content .=$this->Crud_model->getCampusDept($Ccode,$Dcode,$pgm,$Sem);
			$html_content .=$this->Crud_model->getcredential($Ccode,$Dcode,$pgm,$Sem);
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("Credentials", array("Attachment"=>0));
			
	}
	
	
	public function displaydata()  
    {  
			$result['data']=$this->Crud_model->display_records();
			$this->load->view('QS2',$result); 
      } 
	  
	  
	  public function generatecredentials()  
      {  
         $result['data']=$this->Crud_model->generate();
		$this->load->view('Gencred',$result); 
      }
	  
	  public function login()  
      {  
		
				$username=$this->input->post('uname');
				$password=$this->input->post('upass');
				$language=$this->input->post('lang');
				
				if($this->Crud_model->logincred($username,$password))
				{
					$session_data=array(
					'username' => $username,
					'password' => $password,
					'lang' => $language
					);
					$this->session->set_userdata($session_data);
					$result['user']=$this->Crud_model->display_records($username,$password);
					
					if (empty($result['user']))
					{
						show_404();
					}
					
					if($result['user'][0]->Status=='Unused')
					{
						$result['course'] = $this->Crud_model->get_course($result['user'][0]->Campus_code,$result['user'][0]->Dept_code,$result['user'][0]->Pgm_name,$result['user'][0]->Sem);
						$result['dname']=$this->Crud_model->get_deptname($result['user'][0]->Dept_code);
						if($language=='Eng')
						{
							$this->load->view('QS1',$result); 
						}
						else
						{
							$this->load->view('QSK1a',$result);
						}
						
					}
					if($result['user'][0]->Status=='Form1')
					{
						$result['faculty'] = $this->Crud_model->get_faculty($result['user'][0]->Dept_code,$result['user'][0]->Campus_code);
						$result['dname']=$this->Crud_model->get_deptname($result['user'][0]->Dept_code);
						if(empty($result['faculty']))
						{
							$result['faculty'] = $this->Crud_model->get_gfaculty($result['user'][0]->Dept_code,$result['user'][0]->Campus_code,$result['user'][0]->Pgm_name);
							$result['dname']=$this->Crud_model->get_deptname($result['user'][0]->Dept_code);
							if($language=='Eng')
							{
								$output=$this->Crud_model->setUserStatus($username);
								
								$this->load->view('QS2a',$result); 
							}
							else
							{
								$this->load->view('QSKG2a',$result);
							}
						}
						else
						{
							if($language=='Eng')
							{
								$this->load->view('QS2',$result); 
							}
							else
							{
								$this->load->view('QSK2a',$result);
							}
						}
						
					}
					
					if($result['user'][0]->Status=='Form2')
					{
						$result['faculty'] = $this->Crud_model->get_gfaculty($result['user'][0]->Dept_code,$result['user'][0]->Campus_code,$result['user'][0]->Pgm_name);
						$result['dname']=$this->Crud_model->get_deptname($result['user'][0]->Dept_code);
						
						if($language=='Eng')
						{
							$this->load->view('QS2a',$result); 
						}
						else
						{
							$this->load->view('QSKG2a',$result);
						}
						
					}
					
					
					if($result['user'][0]->Status=='Form2a')
					{
						
						$result['dname']=$this->Crud_model->get_deptname($result['user'][0]->Dept_code);
						if($language=='Eng')
						{
							$this->load->view('Q3eng',$result); 
						}
						else
						{
							$this->load->view('Q3kan',$result);
						}
						
					}
					
					if($result['user'][0]->Status=='Submitted')
					{
						
						$res["error"]="You have Already Submitted the Feedback!! Thank You!!";
						$this->load->view('LoginPage',$res);	
						
					}
					
					
				}
				else
				{
						$res["uperror"]="Invalid Username or Password";
						$this->load->view('LoginPage',$res);
				}
			
			
	  }
	  
	  public function Pteachersform()
	  {
		  $username   = $this->session->userdata('username');
		  $password   = $this->session->userdata('password');
		  $language   = $this->session->userdata('lang');
		  
		  $result['user']=$this->Crud_model->display_records($username,$password);
		  if (empty($result['user']))
			{
						show_404();
			}
				$result['faculty'] = $this->Crud_model->get_faculty($result['user'][0]->Dept_code,$result['user'][0]->Campus_code);
				$result['dname']=$this->Crud_model->get_deptname($result['user'][0]->Dept_code);
				if(empty($result['faculty']))
				{
							$result['faculty'] = $this->Crud_model->get_gfaculty($result['user'][0]->Dept_code,$result['user'][0]->Campus_code,$result['user'][0]->Pgm_name);
							$result['dname']=$this->Crud_model->get_deptname($result['user'][0]->Dept_code);
							if($language=='Eng')
							{
								$output=$this->Crud_model->setUserStatus($username);
								$this->load->view('QS2a',$result); 
							}
							else
							{
								$this->load->view('QSKG2a',$result);
							}
				}
				else
				{
						if($language=='Eng')
						{
							$this->load->view('QS2',$result); 
						}
						else
						{
							$this->load->view('QSK2a',$result);
						}
				}
				
		  
	  }
	  public function Gteachersform()
	  {
		  $username   = $this->session->userdata('username');
		  $password   = $this->session->userdata('password');
		  $language   = $this->session->userdata('lang');
		  
		  $result['user']=$this->Crud_model->display_records($username,$password);
		  if (empty($result['user']))
			{
						show_404();
			}
				$result['faculty'] = $this->Crud_model->get_gfaculty($result['user'][0]->Dept_code,$result['user'][0]->Campus_code,$result['user'][0]->Pgm_name);
				$result['dname']=$this->Crud_model->get_deptname($result['user'][0]->Dept_code);
				if($language=='Eng')
				{
					$this->load->view('QS2a',$result); 
				}
				else
				{
					$this->load->view('QSKG2a',$result);
				}
		  
	  }
	  
	  
	  public function Overallform()
	  {
		  $username   = $this->session->userdata('username');
		  $password   = $this->session->userdata('password');
		  $language   = $this->session->userdata('lang');
		  
		  $result['user']=$this->Crud_model->display_records($username,$password);
		  if (empty($result['user']))
			{
						show_404();
			}
				$result['dname']=$this->Crud_model->get_deptname($result['user'][0]->Dept_code);
				if($language=='Eng')
				{
					$this->load->view('Q3eng',$result); 
				}
				else
				{
					$this->load->view('Q3kan',$result);
				}
		  
	  }
	  
	  public function enter()
	  {
		  if($this->session->userdata('username')!='')
		  {
			  echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';
			  echo '<label><a href="'.base_url().'main/logout">Logout</a></label>';
		  }
		  else{
			  redirect(base_url().'Crud/index');
		  }
	  }
	  
	  public function logout()
	  {
		  $this->session->unset_userdata('username');
		  redirect(base_url().'Crud/index');
	  }
	  
	  public function gencredview()  
      {  
         $result['data1']=$this->Crud_model->getcampus();
		 $result['data2']=$this->Crud_model->getdept();
		 $result['data3']=$this->Crud_model->getpgm();
		 $this->load->view('Gen_Credview',$result); 
      }
	  
	  
	  public function genUP()  
      {  
			$Ccode=$this->input->post('myCampus');
			$Dcode=$this->input->post('myDept');
			$pgm=$this->input->post('myPgm');
			$Sem=$this->input->post('mySem');
			
			$result['data1']=$this->Crud_model->get_stdstrength($Ccode,$Dcode,$pgm,$Sem);
			
			if (($result['data1']))
			{
				$result['data3']=$this->Crud_model->check($Ccode,$Dcode,$pgm,$Sem);
			
						if ($result['data3'])
						{
										
										$res['error']="Credentials Already Generated";
										$this->load->view('Gen_Credview',$res);
							
						}
						else
						{
								$result['data2']=$this->Crud_model->getCD($Ccode,$Dcode);
								
								$std_strength=$result['data1'][0]->Std_strength;
								$pgmname=$result['data1'][0]->Pgm_name;
								$deptname=$result['data2'][0]->Dept_name;
								
								$pname= explode(' ', trim($pgmname));
								$dname = explode(' ', trim($deptname));
								$flag=0;
								$k=1;
									if(sizeof($dname)>1)
									{
										$j=1;
										;
										while($j<=$std_strength)
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
											
											$data["Dept_code"]=$Dcode;
											$data["Pgm_name"]=$pgmname;
											$data["Sem"]=$Sem;
											$data["Campus_code"]=$Ccode;
											$data["Username"]=$un;
											$data["Password"]=$pw;
											$data["Status"]="Unused";
											
											$result["credres"]=$this->Crud_model->insertcred($data);
											
											if($result["credres"])
											{
												$flag=1;
											}
											$j++;
										}
									}
									else
									{
										while($k<=$std_strength)
										{
											$username = mt_rand(100,999);
											$l1 = substr($dname[0],0,3);
											$us = strtoupper($l1);
											$un=$pname[0].$us.$username;
											
											
											$password = mt_rand(100,999);
											$p1 = substr($pname[1],0,4);
											$pw = strtoupper($p1);
											$pw="D".$pw.$password;
											
											
											$data["Dept_code"]=$Dcode;
											$data["Pgm_name"]=$pgmname;
											$data["Sem"]=$Sem;
											$data["Campus_code"]=$Ccode;
											$data["Username"]=$un;
											$data["Password"]=$pw;
											$data["Status"]="Unused";
											
											$result["credres"]=$this->Crud_model->insertcred($data);
											
											if($result["credres"])
											{
												$flag=1;
											}
											$k++;
										}
										
									}
					
								if($flag==1)
								{
									$res['message']="Credentials Generated Successfully!!";
									$this->load->view('Gen_Credview',$res);	
								}
								
								if($flag==0)
								{
									$res['error2']="not inserted!!";
									$this->load->view('Gen_Credview',$res);	
								}
					}
					
			}
			else
			{
							$res['error1']="Student Strength not Found";
							$this->load->view('Gen_Credview',$res);
			}
			

      }
	  
	  public function deptget()
	  {
		  $Ccode=$_POST['Campus_code'];
		  $result=$this->Crud_model->deptsget($Ccode);
		  echo $result;
		  
	  }
	  
	  public function pgmget()
	  {
		  $Ccode=$_POST['Campus_code'];
		  $Dcode=$_POST['Dept_code'];
	
			  $result=$this->Crud_model->pgmsget($Ccode,$Dcode);
			  echo $result;
		  
	  }
	  
	  public function feedget()
	  {
			$feedback[]= $this->input->post('feedbacks');
			$num=$this->input->post('num');
			$dept=$this->input->post('dname');
			$user=$this->input->post('user');
			$campus=$this->input->post('ccode');
			for($i=1;$i<=$num;$i++)
			{
				$name=$feedback[0][$i][0];
				
					$data['Dept_name']=$dept;
					$data['T_name']=$feedback[0][$i][0];
					$data['P1']=$feedback[0][$i][1];
					$data['P2']=$feedback[0][$i][2];
					$data['P3']=$feedback[0][$i][3];
					$data['P4']=$feedback[0][$i][4];
					$data['P5']=$feedback[0][$i][5];
					$data['P6']=$feedback[0][$i][6];
					$data['P7']=$feedback[0][$i][7];
					$data['P8']=$feedback[0][$i][8];
					$data['P9']=$feedback[0][$i][9];
					$data['User']=$user;
					$data['Campus_code']=$campus;
					$result['feed']=$this->Crud_model->insertFB($data);
				
			}
			if ($result['feed'])
			{
				$password   = $this->session->userdata('password');
				$output=$this->Crud_model->setUserStatus($user,$password);
			}
			
		print_r($output);
		
	  }
	  
	  public function guestinsert()
	  {
			$feedback[]= $this->input->post('feedbacks');
			$num=$this->input->post('num');
			$dept=$this->input->post('dname');
			$user=$this->input->post('user');
			$pgm=$this->input->post('pgmname'); 
			$campus=$this->input->post('ccode');
			for($i=1;$i<=$num;$i++)
			{
				$name=$feedback[0][$i][0];
				
					$data['Dept_name']=$dept;
					$data['Pgm_name']=$pgm;
					$data['T_name']=$feedback[0][$i][0];
					$data['P1']=$feedback[0][$i][1];
					$data['P2']=$feedback[0][$i][2];
					$data['P3']=$feedback[0][$i][3];
					$data['P4']=$feedback[0][$i][4];
					$data['P5']=$feedback[0][$i][5];
					$data['P6']=$feedback[0][$i][6];
					$data['P7']=$feedback[0][$i][7];
					$data['P8']=$feedback[0][$i][8];
					$data['P9']=$feedback[0][$i][9];
					$data['User']=$user;
					$data['Campus_code']=$campus;
					$result['feed']=$this->Crud_model->insertFBG($data);
				
			}
			if ($result['feed'])
			{
				$password   = $this->session->userdata('password');
				$output=$this->Crud_model->setUserStatus($user,$password);
			}
			
		print_r($output);
		
	  }
	  
	  
	  public function overallinsert()
	  {
			
			$sem=$this->input->post('sem');
			$dept=$this->input->post('dname');
			$user=$this->input->post('user');
			$pgm=$this->input->post('pgmname');
				$Q27=$this->input->post('QS27'); 
				$camp=$this->input->post('ccode');
			
					$data['Dept_name']=$dept;
					$data['Pgm_name']=$pgm;
					$data['Sem']=$sem;
					$data['Q1']=$this->input->post('QS1');
					$data['Q2']=$this->input->post('QS2'); 
					$data['Q3']=$this->input->post('QS3');
					$data['Q4']=$this->input->post('QS4'); 
					$data['Q5']=$this->input->post('QS5');
					$data['Q6']=$this->input->post('QS6'); 
					$data['Q7']=$this->input->post('QS7');
					$data['Q8']=$this->input->post('QS8'); 
					$data['Q9']=$this->input->post('QS9');
					$data['Q10']=$this->input->post('QS10'); 
					$data['Q11']=$this->input->post('QS11');
					$data['Q12']=$this->input->post('QS12'); 
					$data['Q13']=$this->input->post('QS13');
					$data['Q14']=$this->input->post('QS14'); 
					$data['Q15']=$this->input->post('QS15');
					$data['Q16']=$this->input->post('QS16'); 
					$data['Q17']=$this->input->post('QS17'); 
					$data['Q18']=$this->input->post('QS18');
					$data['Q19']=$this->input->post('QS19'); 
					$data['Q20']=$this->input->post('QS20');
					$data['Q21']=$this->input->post('QS21'); 
					$data['Q22']=$this->input->post('QS22');
					$data['Q23']=$this->input->post('QS23'); 
					$data['Q24']=$this->input->post('QS24');
					$data['Q25']=$this->input->post('QS25'); 
					$data['Q26']=$this->input->post('QS26');
					$data['Q27']=$this->input->post('QS27'); 
					$data['Q28']=$this->input->post('QS28');
					$data['User']=$user;
					$data['Campus_code']=$camp;
					$result['feed']=$this->Crud_model->insertFBO($data);
				
			
			if ($result['feed'])
			{
				$password   = $this->session->userdata('password');
				$output=$this->Crud_model->setUserStatus($user,$password);
			}
			
		print_r($Q27);
		
	  }
	  
	  
	  
	  public function courseinsert()
	  {
			$feedback[]= $this->input->post('feedbacks');
			$num=$this->input->post('num');
			$dept=$this->input->post('dname');
			$user=$this->input->post('user');
			$pgm=$this->input->post('pname');
			$sem=$this->input->post('sem');
			$crscode=$this->input->post('code');
			$ccode=$this->input->post('campcode');
			for($i=1;$i<=$num;$i++)
			{
					$data['Dept_name']=$dept;
					$data['Pgm_name']=$pgm;
					$data['Sem']=$sem;
					$data['C_name']=$feedback[0][$i][0];
					$data['C_code']=$feedback[0][$i][1];
					$data['P1']=$feedback[0][$i][2];
					$data['P2']=$feedback[0][$i][3];
					$data['P3']=$feedback[0][$i][4];
					$data['P4']=$feedback[0][$i][5];
					$data['P5']=$feedback[0][$i][6];
					$data['P6']=$feedback[0][$i][7];
					$data['P7']=$feedback[0][$i][8];
					$data['User']=$user;
					$data['Campus_code']=$ccode;
					$result['feed']=$this->Crud_model->insertCR($data);
				
			}
			if ($result['feed'])
			{
				$password   = $this->session->userdata('password');
				$output=$this->Crud_model->setUserStatus($user,$password);
			}
			
		print_r($feedback);
		
	  }
	  
	  public function QS1report()
	  {
		  $this->load->view('admin/ReportPageQ1');
	  }
	  
	  public function QS2report()
	  {
		  $this->load->view('admin/ReportPageQ2');
	  }
	  
	  public function QS3report()
	  {
		  $this->load->view('admin/ReportPageQ3');
	  }
	  
	  public function QS1res()
	  {
			$html_content='';
		
			$html_content .=$this->Crud_model->getResponse();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS1Response", array("Attachment"=>0));
	  }
	  
	  
	  public function QS1rc()
	  {
		
			$html_content='';
		
			$html_content .=$this->Crud_model->getResponsecount();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS1ResponseCount", array("Attachment"=>0));
	  }
	  
	  
	  
	  
	  public function QS1resanalysis()
	  {
			$html_content='';
		
			$html_content .=$this->Crud_model->getResponseanalysis();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS1Responseanalysis", array("Attachment"=>0));
		
	  }
	  
	  
	  
	  
	   public function QS2res()
	  {
			$html_content='';
		
			$html_content .=$this->Crud_model->getResponseQ2();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS2Response", array("Attachment"=>0));
	  }
	  
	  public function QS2resguest()
	  {
			$html_content='';
		
			$html_content .=$this->Crud_model->getResponseQ2Guest();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS1Response", array("Attachment"=>0));
	  }
	  
	  
	  public function QS2resanalysis()
	  {
			$html_content='';
		
			$html_content .=$this->Crud_model->getResponseanalysisQ2();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS1Responseanalysis", array("Attachment"=>0));
		
	  }
	  
	  
	   public function QS2resanalysisguest()
	  {
			$html_content='';
		
			$html_content .=$this->Crud_model->getResponseanalysisQ2guest();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS1Responseanalysis", array("Attachment"=>0));
		
	  }
	  
	  
	  public function QS3resanalysis()
	  {
			$html_content='';
		
			$html_content .=$this->Crud_model->getResponseanalysisQ3();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS1Responseanalysis", array("Attachment"=>0));
		
	  }
	  
	  public function QS3comments()
	  {
			$html_content='';
		
			$html_content .=$this->Crud_model->getQ3comments();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS1Responseanalysis", array("Attachment"=>0));
		
	  }
	  
	  
	  public function QS3responses()
	  {
			$html_content='';
		
			$html_content .=$this->Crud_model->getQ3responses();
			
			$this->pdf->setPaper('A4', 'landscape');
			
			$this->pdf->loadHtml($html_content);
			
			$this->pdf->render();
			
			$this->pdf->stream("QS1Responseanalysis", array("Attachment"=>0));
		
	  }
	  
	  
	  
	  public function pie_chart_js() {
  
      $this->load->view('indexchart');
	}
	  
	  
	  public function data() {
  
      $connect = new PDO("mysql:host=localhost;dbname=feedback", "root", "");


		if($_POST["action"] == 'fetch')
		{
			$query = "
			SELECT Parameter, data  
			FROM graph 
			";

			$result = $connect->query($query);

			$data = array();

			foreach($result as $row)
			{
				$data[] = array(
					'language'		=>	$row["Parameter"],
					 'total'			=>	$row["data"],
					'color'			=>	'#' . rand(100000, 999999) . ''
				);
			}

			echo json_encode($data);
		}
}

    
	  
	
}
?>