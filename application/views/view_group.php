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
        Group Entry
        <small>Group Registration</small>
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
 	
 
    <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			 
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-list"></i>&nbsp; View Group Data</h3>
			
		
			 
		<div class="pull-right"><a  id="addNew" class="btn btn-danger">
                    <i class="fa fa-plus"></i></a>
                    <a href="" data-toggle="tooltip" title="Rebuild" class="btn btn-default">
                    <i class="fa fa-refresh"></i></a>
                     
                </div>
           </div>    
			 
		 
       <div class="row">
		<div class="col-md-12">
			<div class="alert alert-success" style="display: none;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
			</div>
			 
		</div>
		</div>   
       <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Group Name</th>
                  
                   
                   <th>Action</th>
                </tr>
                </thead>
                <tbody id="ajaxlistplan">
                            
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          
		
	</div>
	</div>
	</section>
  	</div>
   
    <?php include 'footer.php';?>
	</div>
      
	
	
	<!-- Modal Insert-->
<div class="modal fade animated pulse" id="insert_form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="form-title">Add New Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="alert alert-danger" id="error_block" style="display:none">
				
	   </div>
			
		<div id="alert-msg"></div>	 
		
      <div class="modal-body">
      <form id="frm_group_insert">
        <div class="form-group">
				<label for="exampleInputEmail1">Group Name</label>
				
				 
				
				<input type="text" class="form-control" name="group_name" id="group_name"  placeholder="Enter name" autofocus  >
			</div>
			 
			 </form>
      </div>
     
      <div class="modal-footer">
      	<button type="button" id="btnInsert" class="btn btn-danger">Add New</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
		
	
	
	
		<!-- Modal Update-->
<div class="modal fade animated pulse" id="create_form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="form-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-danger" id="error_block_update" style="display:none">
				
	   </div>
      <div class="modal-body">
      <form id="frm_group_update">
        <div class="form-group">
				<label for="exampleInputEmail1">Group Name</label>
				
				<input type="hidden" class="form-control" name="group_id" id="group_id">
				
				<input type="text" class="form-control" name="groupname" id="groupname"  placeholder="Enter name" autofocus  >
			</div>
			 
			 </form>
      </div>
     
      <div class="modal-footer">
      	<button type="button" id="btnUpdate" class="btn btn-danger">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
		
		<!-- Modal Delete-->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        	Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->	
		
		
			
   
 
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
        groupList();
         
//      
   $(document).on("click","#editBtnId",function(e){
      e.preventDefault();
      
      var editBtnId = $(this).attr('data-editBtnId');
    $('#frm_group_update').attr('action', '<?php echo base_url() ?>Ctrl_master_entry/updateGroup');	
      //var action = 'editData';
      //alert(editBtnId);
      
      $.ajax({
      	type:'ajax',
      	 method:'get',
        url:'<?php echo base_url()?>Ctrl_master_entry/editGroup',
       
        data:{editBtnId:editBtnId},
        dataType:'json',
        success:function(data){
       
       
        $("#groupname").val(data.group_name);
       	$("#group_id").val(data.group_id);
        $("#create_form_modal").modal('show');
        $("#form-title").text('Group Entry Update');
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
    	 
			var url = $('#frm_group_update').attr('action');
			var data = $('#frm_group_update').serialize();
			//validate form
			
			 
		 
			 
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
							$('#frm_group_update')[0].reset();
							if(data.type=='add'){
								var type = 'added'
							}else if(data.type=='update'){
								var type ="updated"
							}
							$('.alert-success').html('Update Group successfully').fadeIn().delay(4000).fadeOut('slow');
							groupList();
							
			              }else{
			              	 
			              	
			              	$(".alert-danger").html(data.error);
			              	document.getElementById("error_block_update").style.display = "Block";
							setTimeout(function() {
							$('#error_block_update').fadeOut('fast');
							}, 2000);
			              }

          			}
					 
				});
			 
		});

    });
     $('#btnInsert').click(function(){
    	 
			var url = $('#frm_group_insert').attr('action');
			var data = $('#frm_group_insert').serialize();
			//validate form
			
			 
			 
				$.ajax({
					url:'Ctrl_master_entry/insertGroup',
					method:"POST",
					url: url,
					data: data,
					async: false,
					dataType: 'json',
				
					success: function(data) {

			              if($.isEmptyObject(data.error)){
							$('#insert_form_modal').modal('hide');
							$('#frm_group_insert')[0].reset();
							 if(data.type=='add'){
								var type = 'added'
							}else if(data.type=='update'){
								var type ="updated"
							}
							$('.alert-success').html('New Group Created successfully').fadeIn().delay(4000).fadeOut('slow');
							groupList();
							
			              }else{
			              	$(".alert-danger").html(data.error);
			              	document.getElementById("error_block").style.display = "Block";
							setTimeout(function() {
							$('#error_block').fadeOut('fast');
							}, 2000);
			              }

          			}
				 
				});
    });
     var groupList = function (){
     	 $("#preloader").css('display','block');
		 
         $.ajax({
               url:'<?php echo base_url()?>Ctrl_master_entry/GroupList',
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
			$('#insert_form_modal').find('.modal-title').text('Add New Group');
			$('#frm_group_insert').attr('action', '<?php echo base_url() ?>Ctrl_master_entry/insertGroup');
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
					url: '<?php echo base_url() ?>Ctrl_master_entry/deleteGroup',
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
							$('.alert-success').html('Group Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
							groupList();
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
