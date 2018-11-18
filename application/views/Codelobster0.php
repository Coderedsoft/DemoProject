<script>
  $(document).ready(function (){
 	$(document).on("submit","#frm_member_insert",function(e){
 		alert("");
			e.preventDefault();
		 
			var member_registration_no = $("#member_registration_no").val();
			var member_name = $("#member_name").val();
			var member_mobile_no = $("#member_mobile_no").val();
			var member_emailid = $("#member_emailid").val();
			var member_gender = $("#member_gender").val();
			var member_address = $("#member_address").val();
			var medical_history = $("#medical_history").val();
			var image = $("#image").val();
			var imageExtention = $("#image").val().split('.').pop().toLowerCase();
			var email_regu = /([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})/;
			if (imageExtention != '') {
				if (jQuery.inArray(imageExtention,['png','jpg','jpeg','gif']) == -1) {
					swal({
						title:"Picture Invalid",
						icon:"warning"
					});
					$("#image").val('');
					return false;
				}
			}else{
				$.ajax({
					url:"Ctrl_master_entry/create_update_account",
					method:"POST",
					data: new FormData(this),
					contentType:false,
					processData:false,
					success:function(data){
						swal({
								title:"Developer Account Created successfull",
								icon:"success"
							});
						if (data.trim()=='created') {
							swal({
								title:"Developer Account Created successfull",
								icon:"success"
							});
							$("#create_form_modal").modal('hide');
							$("#developer_cu_form")[0].reset();
						}
							if (data.trim()=='update') {
							swal({
								title:"Developer Account Update successfull",
								icon:"success"
							});
							$("#create_form_modal").modal('hide');
							$("#developer_cu_form")[0].reset();
						}
						//viewData();
					}
				});
			}


		});
    
    //Add New
		$('#addNew').click(function(){
			$('#insert_form_modal').modal('show');
			$('#insert_form_modal').find('.modal-title').text('Add New Branch');
			$('#frm_plan_insert').attr('action', '<?php echo base_url() ?>Ctrl_master_entry/insertBranch');
		});
     });
    
    
    
    
    
     foreach ($data->result() as $row) {
                $sr = $sr + 1;
                
          
             echo"<tr><td>" . $sr . "</td>
             <td>" . $row->firstName . "</td>
             <td>" . $row->lastName . "</td>
             <td>" . $row->gender . "</td>
             <td>" . $row->address . "</td>
             <td>" . $row->dob . "</td>
             
             <td><img height='45' width='39' class='img-responsive'  src=".base_url().'upload/'.$row->photo."></td>
             
                <a data-url='$urledit' class='btn btn-primary btn-xs item-edit' id='editBtnId'data-editBtnId='$row->id' title='Edit'><i class='glyphicon glyphicon-pencil' title='Edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a data-url='$urldelete' class='btn btn-xs btn-danger item-delete' id='deleteBtnId' data-deleteBtnId='$row->id' title='delete'><i class='glyphicon glyphicon-trash'></i></a></td>"
                ."</tr>";
            }
    
    
  
  
  
   $data = array(
                'member_registration_no' => $this->input->post('member_registration_no'),
                'member_firstname' => $this->input->post('member_firstname'),
                'member_lastname' => $this->input->post('member_lastname'),
                'member_address' => $this->input->post('member_address'),
                'member_mobile_no' => $this->input->post('member_mobile_no'),
                'member_email' => $this->input->post('member_email'),
                'member_gender' => $this->input->post('member_gender'),
                'member_reg_date' => $this->input->post('gender'),
                'member_dob' => $this->input->post('member_dob'),
                'member_medical_history' => $this->input->post('member_medical_history'),
            );
  
  
  
  
  
  
  
    
    
 </script>
 
 
 