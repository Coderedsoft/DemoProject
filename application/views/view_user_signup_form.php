<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <title>List - of All Branches</title>
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>dist\css\AdminLTE.min.css">
   
  <link rel="stylesheet" href="<?php echo base_url();?>dist\css\skins\_all-skins.min.css">
   
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components\morris.js\morris.css">
   
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components\jvectormap\jquery-jvectormap.css">
   
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components\bootstrap-datepicker\dist\css\bootstrap-datepicker.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components\bootstrap-daterangepicker\daterangepicker.css">
   <link rel="stylesheet" href="<?php echo base_url();?>dist/css/style.css">
  <link rel="shortcut icon" href="<?php echo base_url();?>img\logo.ico">
       

	
     
  
  
   
  <link rel="stylesheet" href="<?php echo base_url();?>plugins\bootstrap-wysihtml5\bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'header.php';?>
  
 <?php include 'menubar.php';?> 
   
  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Master Entry
        <small>User SignUp</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

	

	<div id="preloader" class="loader" style='display:none' >
				<img src="<?php echo base_url()?>img/lg.comet-spinner.gif" height="100" width="100">
	</div>
 	

	<div id="result" style='display:none' >
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Data successfully Update..!</strong>
				</div>
	</div>
 
 
  
 
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style='align:center'>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">SignUp Here </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="signup_user_form">
              <div class="box-body">
               <div class="form-group">
                  <label>User Type</label>
                  <select class="form-control" id="selectUserType">
                    <option value="admin">Admin</option>
                    <option value="trainer">Trainer</option>
                    <option value="member">Gym Member</option>
                    <option value="receptionist">Receptionist</option>
                    <option value="accountant">Accountant</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="signup_username" placeholder="Enter username" name="signup_username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="signup_password" placeholder="Password" name="signup_password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Branch No.</label>
                  <input type="text" class="form-control" id="signup_branch_no" placeholder="Branch Number" name="signup_branch_no">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="btnInsert">Submit</button>
                <button type="reset" class="btn btn-primary">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
         </div>
        </div>
    </section>  
		
		
			
   
 
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="<?php echo base_url();?>bower_components\jquery\dist\jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>bower_components\bootstrap\dist\js\bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>bower_components\fastclick\lib\fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist\js\adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>dist\js\demo.js"></script>
 
<script src="<?php echo base_url();?>assets/lib/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/lib/propeller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/lib/sweetalert.min.js"></script>

 
 
 
 
 
 
 <script>
       
    $(document).ready(function (){
//        call plan list method for populate table
        branchList();
         
//      
   $(document).on("click","#editBtnId",function(e){
      e.preventDefault();
      
      var editBtnId = $(this).attr('data-editBtnId');
    $('#frm_plan_update').attr('action', '<?php echo base_url() ?>Ctrl_master_entry/updateBranch');	
      //var action = 'editData';
      //alert(editBtnId);
      
      $.ajax({
      	type:'ajax',
      	 method:'get',
        url:'<?php echo base_url()?>Ctrl_master_entry/editData',
       
        data:{editBtnId:editBtnId},
        dataType:'json',
        success:function(data){
       
        $('input[name=branch_name]').val(data.branch_name);
        $('input[name=branch_location]').val(data.branch_location);
        $("#branch_number").val(data.branch_no);
       	$("#branch_id").val(data.branch_id);
        $("#create_form_modal").modal('show');
        $("#form-title").text('Branch Entry Update');
        $("#action").val('update');
        $("#submit").val('update');
        $("#updateId").val(editBtnId);
        },
        error:function(){
				//alert("Not Post data");
			}
      });
    });
    
    
   
    $('#btnUpdate').click(function(){
    	 
			var url = $('#frm_plan_update').attr('action');
			var data = $('#frm_plan_update').serialize();
			//validate form
			
			 
			var branch_name = $('input[name=branch_name]');
			var branch_location = $('input[name=branch_location]');
			var branch_number = $('input[name=branch_number]');
			var branch_id = $('input[name=branch_id]');
			 
			var result = '';
		 
			 
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					 
					 success: function(data) {

			              if($.isEmptyObject(data.error)){
							$('#create_form_modal').modal('hide');
							$('#frm_plan_update')[0].reset();
							if(data.type=='add'){
								var type = 'added'
							}else if(data.type=='update'){
								var type ="updated"
							}
							$('.alert-success').html('Update Branch successfully').fadeIn().delay(4000).fadeOut('slow');
							branchList();
							
			              }else{

			                $(".alert-danger").css('display','block');

			                $(".alert-danger").html(data.error);

			              }

          			}
					 
				});
			 
		});

    });
     $('#btnInsert').click(function(){
    	 
			var url = $('#signup_user_form').attr('action');
			var data = $('#signup_user_form').serialize();
			//validate form
			
			 
			var user_type ={select:$('#selectUserType option:selected').val()};
			var signup_username = $('input[name=signup_username]');
			var signup_password = $('input[name=signup_password]');
			var signup_branch_no = $('input[name=signup_branch_no]'); 
			 
			var result = '';
		 
			 
				$.ajax({
					url:'Ctrl_master_entry/insertNewUser',
					method:"POST",
					url: url,
					data: data,
					async: false,
					dataType: 'json',
				
					success: function(data) {

			              if($.isEmptyObject(data.error)){
							
							 
							
							$('#signup_user_form')[0].reset();
							 if(data.type=='add'){
								var type = 'added'
							}else if(data.type=='update'){
								var type ="updated"
							}
							$('.alert-success').html('New User Created successfully').fadeIn().delay(4000).fadeOut('slow');
							branchList();
							
			              }else{

			                $(".alert-danger").css('display','block');

			                $(".alert-danger").html(data.error);

			              }

          			}
				 
				});
    });
     var branchList = function (){
     	 $("#preloader").css('display','block');
		 
         $.ajax({
               url:'<?php echo base_url()?>Ctrl_master_entry/branchList',
               type:'GET'
            }).done(function (html){
                $('#ajaxlistplan').html(html);
                var btnedit= $('.btnedit');
                var btndelete= $('.btndelete');
                document.getElementById("preloader").style.display = "none";
              
                
            });
    };
    
     //Add New
		$('#addNew').click(function(){
			$('#insert_form_modal').modal('show');
			$('#insert_form_modal').find('.modal-title').text('Add New Branch');
			$('#frm_plan_insert').attr('action', '<?php echo base_url() ?>Ctrl_master_entry/insertBranch');
		});
     
     //delete- 
		$('#ajaxlistplan').on('click', '.item-delete', function(){
			 var deleteBtnId = $(this).attr('data-deleteBtnId');
			$('#deleteModal').modal('show');
			//prevent previous handler - unbind()
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '<?php echo base_url() ?>Ctrl_master_entry/deleteBranch',
					data:{deleteBtnId:deleteBtnId},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							if(response.type=='add'){
								var type = 'added'
							}else if(response.type=='update'){
								var type ="updated"
							}else if(response.type=='deleted'){
								var type ="deleted"
							}
							$('.alert-success').html('Branch Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
							branchList();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Error deleting');
					}
				});
			});
		});
     
    
    
</script>
  
</body>
</html>
