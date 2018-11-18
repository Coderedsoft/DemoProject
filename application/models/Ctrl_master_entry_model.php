    
  <?php
  
  class Ctrl_master_entry_model extends CI_Model
  {
  	private $table;
  	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'tbl_member_registration';
    }
  	
  	
      public function branchList()
     {
        $result = $this->db->get('tbl_branch_registration');
        return $result;
     }
     
     
      public function memberList()
     {
        $result = $this->db->get('tbl_member_registration');
        return $result;
     }
     
   
     
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('member_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('member_id', $id);
        $this->db->delete($this->table);
    }
   
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
      public function editData()
      {
			$id=$this->input->get('editBtnId');
			$this->db->where('branch_id',$id);
			$Query=$this->db->get('tbl_branch_registration');
			if ($Query->num_rows()>0)
			{
				return $Query-> row();
			}
			else
			{
				return FALSE;
			}
			
		}
        
        
      public function insertBranch(){
		$field = array(
		'branch_name'=>$this->input->post('branchname'),
		'branch_location'=>$this->input->post('branchlocation'),
		'branch_no'=>$this->input->post('branchnumber')
			);
		$this->db->insert('tbl_branch_registration', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
        
      
		public function updateBranch(){
		$id = $this->input->post('branch_id');
		$field = array(
		'branch_name'=>$this->input->post('branch_name'),
		'branch_location'=>$this->input->post('branch_location'),
		'branch_no'=>$this->input->post('branch_number')
		 
		);
		$this->db->where('branch_id', $id);
		$this->db->update('tbl_branch_registration', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	 public function deleteBranch(){
			$id=$this->input->get('deleteBtnId');
			$this->db->where('branch_id',$id);
			$Query=$this->db->delete('tbl_branch_registration');
			 
				return true;
			
		}
		public function insertGroup(){
			$field = array(
			'group_name'=>$this->input->post('group_name')
			 );
			$this->db->insert('tbl_group', $field);
			
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
			
		}
		public function groupList(){
			 $result = $this->db->get('tbl_group');
        	return $result;
		}
		
		  public function editGroup()
      {
			$id=$this->input->get('editBtnId');
			$this->db->where('group_id',$id);
			$Query=$this->db->get('tbl_group');
			if ($Query->num_rows()>0)
			{
				return $Query-> row();
			}
			else
			{
				return FALSE;
			}
			
		}
		
		public function updateGroup(){
		$id = $this->input->post('group_id');
		$field = array(
		'group_name'=>$this->input->post('groupname')
		 
		);
		$this->db->where('group_id', $id);
		$this->db->update('tbl_group', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
		 public function deleteGroup(){
			$id=$this->input->get('deleteBtnId');
			$this->db->where('group_id',$id);
			$Query=$this->db->delete('tbl_group');
			 
				return true;
			
		}
		
		
  }
  
  
  
  
           ?>