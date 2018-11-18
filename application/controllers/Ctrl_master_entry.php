<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_master_entry extends CI_Controller {

	  

	 
	 function _construct(){
	 	parent::__construct();
	 	$this->load->model('Ctrl_master_entry_model','model');
	 	$this->load->model('Ctrl_master_entry_model'); 
	 }
	 
	 
	//this function show Main Dashboard 
	public function index()
	{
		$this->load->view('Dashboard');
	}
	//End Dashboard Function
	
	//to show member Data
	public function view_member_entry()
	{
		$this->load->view('member_registration');
	}
	//End Member List
	//member Insert
	
	
	
	
	
	
	
	public function memberList() 
	{
	 	$this->load->model('Ctrl_master_entry_model');
        $data = $this->Ctrl_master_entry_model->memberList();
        if ($data->num_rows() > 0) {
            $sr = 0;
            $urldelete = base_url() . 'Ctrl_master_entry/ajax_delete/';
            $urledit = base_url() . 'Ctrl_master_entry/ajax_edit/';
           foreach ($data->result() as $row) {
                $sr = $sr + 1;
                
          
                
             echo"<tr><td>" . $sr . "</td>
             <td>" . $row->member_registration_no . "</td>
             <td>" . $row->member_firstname . "</td>
             <td>" . $row->member_lastname . "</td>
              <td>" . $row->member_mobile_no . "</td>
               <td>" . $row->member_email . "</td>
               <td>" . $row->member_gender . "</td>
             <td>" . $row->member_address . "</td>
              <td>" . $row->member_dob . "</td>
             <td>" . $row->member_reg_date . "</td>
             <td><img height='45' width='39' class='img-responsive'  src=".base_url().'upload/'.$row->photo."></td>
             
               .<td> <a data-url='$urledit' class='btn btn-primary btn-xs item-edit' id='editBtnId'data-editBtnId='$row->member_id' title='Edit'><i class='glyphicon glyphicon-pencil' title='Edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a data-url='$urldelete' class='btn btn-xs btn-danger item-delete' id='deleteBtnId' data-deleteBtnId='$row->member_id' title='delete'><i class='glyphicon glyphicon-trash'></i></a></td>"
                ."</tr>";
            }
        } else {
            echo'<tr><td colspan = 12 class="text-info">No Data Found.</td></tr>';
        }
        exit;
    }
	
 
 
    public function ajax_edit($id)
    
    {
    	$this->load->model('Ctrl_master_entry_model');
        $data = $this->Ctrl_master_entry_model->get_by_id($id);
        $data->member_dob = ($data->member_dob == '0000-00-00') ? '' : $data->member_dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
		$this->load->library('form_validation');
		$this->load->model('Ctrl_master_entry_model');
        $this->form_validation->set_rules('member_mobile_no','Mobile No','required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('member_email','Email ID','trim|required|valid_email');
         
        $this->form_validation->run();
        if ($this->form_validation->run() == FALSE){
      		$errors = validation_errors();
            echo json_encode(['error'=>$errors]);   
    	}else{
        	$this->load->model('Ctrl_master_entry_model');
        	$this->_validate();
         
	        $data = array(
	                'member_registration_no' => $this->input->post('member_registration_no'),
	                'member_firstname' => $this->input->post('member_firstname'),
	                'member_lastname' => $this->input->post('member_lastname'),
	                'member_address' => $this->input->post('member_address'),
	                'member_mobile_no' => $this->input->post('member_mobile_no'),
	                'member_email' => $this->input->post('member_email'),
	                'member_gender' => $this->input->post('member_gender'),
	                'member_reg_date' =>date('Y-m-d'),
	                'member_dob' => $this->input->post('member_dob'),
	                'member_medical_history' => $this->input->post('member_medical_history'),
	            );
 
		        if(!empty($_FILES['photo']['name']))
		        {
		            $upload = $this->_do_upload();
		            $data['photo'] = $upload;
		        }
		 		$this->load->model('Ctrl_master_entry_model');
		        $insert = $this->Ctrl_master_entry_model->save($data);
		        echo json_encode(array("status" => TRUE));			
				}	
	}
 
    public function ajax_update()
    {
    	$this->load->model('Ctrl_master_entry_model');
        $this->_validate();
        $data = array(
                 'member_registration_no' => $this->input->post('member_registration_no'),
                'member_firstname' => $this->input->post('member_firstname'),
                'member_lastname' => $this->input->post('member_lastname'),
                'member_address' => $this->input->post('member_address'),
                'member_mobile_no' => $this->input->post('member_mobile_no'),
                'member_email' => $this->input->post('member_email'),
                'member_gender' => $this->input->post('member_gender'),
                'member_reg_date' =>date('Y-m-d'),
                'member_dob' => $this->input->post('member_dob'),
                'member_medical_history' => $this->input->post('member_medical_history'),
            );
 
        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('upload/'.$this->input->post('remove_photo'));
            $data['photo'] = '';
        }
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $this->load->model('Ctrl_master_entry_model');
            $person = $this->Ctrl_master_entry_model->get_by_id($this->input->post('id'));
            if(file_exists('upload/'.$person->photo) && $person->photo)
                unlink('upload/'.$person->photo);
 
            $data['photo'] = $upload;
        }
 
        $this->Ctrl_master_entry_model->update(array('member_id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $this->load->model('Ctrl_master_entry_model');
        $person = $this->Ctrl_master_entry_model->get_by_id($id);
        if(file_exists('upload/'.$person->photo) && $person->photo)
            unlink('upload/'.$person->photo);
         
        $this->Ctrl_master_entry_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
    private function _do_upload()
    {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('member_firstname') == '')
        {
            $data['inputerror'][] = 'member_firstname';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('member_lastname') == '')
        {
            $data['inputerror'][] = 'member_lastname';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }
 
 
  if($this->input->post('member_address') == '')
        {
            $data['inputerror'][] = 'member_address';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
        }
 
  if($this->input->post('member_mobile_no') == '')
        {
            $data['inputerror'][] = 'member_mobile_no';
            $data['error_string'][] = 'Mobile No. is required';
            
            
            $data['status'] = FALSE;
        }
 
   
 
        if($this->input->post('member_dob') == '')
        {
            $data['inputerror'][] = 'member_dob';
            $data['error_string'][] = 'Date of Birth is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('member_gender') == '')
        {
            $data['inputerror'][] = 'member_gender';
            $data['error_string'][] = 'Please select gender';
            $data['status'] = FALSE;
        }
 
       
        if($data['status'] === FALSE)
        {
        	 
            echo json_encode($data);
            exit();
        }
    }

	
	
	
	
	 
	
	//to show List of all Branch
	public function view_branch_entry()
	{
			 
            $this->load->view('view_branch_registration');
	}
	
	public function branchList() 
	{
	 	$this->load->model('Ctrl_master_entry_model');
        $data = $this->Ctrl_master_entry_model->branchList();
        if ($data->num_rows() > 0) {
            $sr = 0;
            $urldelete = base_url() . 'Ctrl_master_entry/deletePlan/';
            $urledit = base_url() . 'Ctrl_master_entry/editPlan/';
            foreach ($data->result() as $row) {
                $sr = $sr + 1;
             echo"<tr><td>" . $sr . "</td><td>" . $row->branch_name . "</td><td>" . $row->branch_location . "</td><td>".$row->branch_no."</td>"
                . "<td><a data-url='$urledit' class='btn btn-primary btn-xs item-edit' id='editBtnId'data-editBtnId='$row->branch_id' title='Edit'><i class='glyphicon glyphicon-pencil' title='Edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a data-url='$urldelete' class='btn btn-xs btn-danger item-delete' id='deleteBtnId' data-deleteBtnId='$row->branch_id' title='delete'><i class='glyphicon glyphicon-trash'></i></a></td>"
                . "</tr>";
            }
        } else {
            echo'<tr><td colspan = 4 class="text-info">No Data Found.</td></tr>';
        }
        exit;
    }
    //End of List SHOW
    
    //for edit entry of branch
	public function editData(){
		$this->load->model('Ctrl_master_entry_model');
		$result = $this->Ctrl_master_entry_model->editData();
		echo json_encode($result);
	}
	//END
	
	//to insert branch 
	public function insertBranch(){
			$this->load->library('form_validation');
			$this->load->model('Ctrl_master_entry_model');
            $this->form_validation->set_rules('branchname','Branch Name','trim|required|is_unique[tbl_branch_registration.branch_name]');
            $this->form_validation->set_rules('branchlocation','Branch Location','trim|required');
            $this->form_validation->set_rules('branchnumber','Branch No.','trim|required|is_unique[tbl_branch_registration.branch_no]');
            $this->form_validation->run();
            if ($this->form_validation->run() == FALSE){
          		$errors = validation_errors();
	            echo json_encode(['error'=>$errors]);   
        	}else{
					$this->load->model('Ctrl_master_entry_model');
					$result = $this->Ctrl_master_entry_model->insertBranch();
					$msg['success'] = false;
					$msg['type'] = 'added';
					if($result){
						$msg['success'] = true;
					}
					echo json_encode($msg);
				}
	}
			//End 

	//update branch
		public function updateBranch(){
			
			$this->load->library('form_validation');
			$this->load->model('Ctrl_master_entry_model');
            $this->form_validation->set_rules('branch_name','Branch Name','trim|required');
            $this->form_validation->set_rules('branch_location','Branch Location','trim|required');
            $this->form_validation->set_rules('branch_number','Branch No.','trim|required|is_unique[tbl_branch_registration.branch_no]');
            $this->form_validation->run();
            if ($this->form_validation->run() == FALSE){
          		$errors = validation_errors();
	            echo json_encode(['error'=>$errors]);   
        	}else{
        		
        		$this->load->model('Ctrl_master_entry_model');	
				$result = $this->Ctrl_master_entry_model->updateBranch();
				$msg['success'] = false;
				$msg['type'] = 'update';
				if($result){
					$msg['success'] = true;
				}
				echo json_encode($msg);
			}	
	}
//Delete Branch Data
	public function deleteBranch(){
		$this->load->model('Ctrl_master_entry_model');
		$result = $this->Ctrl_master_entry_model->deleteBranch();
		$msg['success'] = false;
		$msg['type'] = 'deleted';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
//End Branch





/* *************************User Sign up Ctrl******************* */

	// shows user signup form
	public function view_user_signup_form()
	{
		 $this->load->view('view_user_signup_form');	
	} 
	
	//to add new user
	public function insertNewUser()
	{
		$this->load->library('form_validation');
			$this->load->model('Ctrl_master_entry_model');
            $this->form_validation->set_rules('signup_username','User Name','trim|required|is_unique[tbl_user_signup.signup_username]');
            //$this->form_validation->set_rules('branchlocation','Branch Location','trim|required');
            $this->form_validation->set_rules('signup_branch_no','Branch No.','trim|required|is_unique[tbl_user_signup.signup_branch_no]');
            $this->form_validation->run();
            if ($this->form_validation->run() == FALSE){
          		$errors = validation_errors();
	            echo json_encode(['error'=>$errors]);   
        	}else{
					$this->load->model('Ctrl_master_entry_model');
					$result = $this->Ctrl_master_entry_model->insertNewUser();
					$msg['success'] = false;
					$msg['type'] = 'added';
					if($result){
						$msg['success'] = true;
					}
					echo json_encode($msg);
				}
	}
	

	
	
/* ************************* End User Sign up Ctrl******************* */	 
           	 

/* ************************* Add Group******************* */				

	public function view_group_entry(){
		$this->load->view('view_group');
	}
	
	
	public function groupList() 
	{
	 	$this->load->model('Ctrl_master_entry_model');
        $data = $this->Ctrl_master_entry_model->groupList();
        if ($data->num_rows() > 0) {
            $sr = 0;
            
            
            $urldelete = base_url() . 'Ctrl_master_entry/deletePlan/';
            
            $urledit = base_url() . 'Ctrl_master_entry/editGroup/';
            
            
            
            foreach ($data->result() as $row) {
                $sr = $sr + 1;
             echo"<tr><td>" . $sr . "</td><td>" . $row->group_name . "</td>"
                . "<td><a data-url='$urledit' class='btn btn-primary btn-xs item-edit' id='editBtnId'data-editBtnId='$row->group_id' title='Edit'><i class='glyphicon glyphicon-pencil' title='Edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a data-url='$urldelete' class='btn btn-xs btn-danger item-delete' id='deleteBtnId' data-deleteBtnId='$row->group_id' title='delete'><i class='glyphicon glyphicon-trash'></i></a></td>"
                . "</tr>";
            }
        } else {
            echo'<tr><td colspan = 2 class="text-info">No Data Found.</td></tr>';
        }
        exit;
    }
	
	
	public function editGroup(){
		$this->load->model('Ctrl_master_entry_model');
		$result = $this->Ctrl_master_entry_model->editGroup();
		echo json_encode($result);
	}
	
	
	public function insertGroup(){
		
		$this->load->library('form_validation');
			$this->load->model('Ctrl_master_entry_model');
            $this->form_validation->set_rules('group_name','Group Name','trim|required|is_unique[tbl_group.group_name]');
            $this->form_validation->run();
            if ($this->form_validation->run() == FALSE){
          		$errors = validation_errors();
	            echo json_encode(['error'=>$errors]);   
        	}else{
				$this->load->model('Ctrl_master_entry_model');
				$result = $this->Ctrl_master_entry_model->insertGroup();
				$msg['success'] = false;
				$msg['type'] = 'added';
				if($result){
				$msg['success'] = true;
				}
				echo json_encode($msg);
				}
	}
	public function updateGroup(){
			
			$this->load->library('form_validation');
			$this->load->model('Ctrl_master_entry_model');
            $this->form_validation->set_rules('groupname','Group Name','trim|required|is_unique[tbl_group.group_name]');
            $this->form_validation->run();
            if ($this->form_validation->run() == FALSE){
          		$errors = validation_errors();
	            echo json_encode(['error'=>$errors]);   
        	}else{
        		$this->load->model('Ctrl_master_entry_model');	
				$result = $this->Ctrl_master_entry_model->updateGroup();
				$msg['success'] = false;
				$msg['type'] = 'update';
				if($result){
					$msg['success'] = true;
				}
				echo json_encode($msg);
			}	
	}
	//Delete Branch Data
	public function deleteGroup(){
		$this->load->model('Ctrl_master_entry_model');
		$result = $this->Ctrl_master_entry_model->deleteGroup();
		$msg['success'] = false;
		$msg['type'] = 'deleted';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
//End Branch


/* ************************* End Group******************* */				
    
    
}
