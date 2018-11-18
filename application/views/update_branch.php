<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <title>Update - Branch Details</title>
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>dist\css\AdminLTE.min.css">
   
  <link rel="stylesheet" href="<?php echo base_url();?>dist\css\skins\_all-skins.min.css">
   
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components\morris.js\morris.css">
   
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components\jvectormap\jquery-jvectormap.css">
   
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components\bootstrap-datepicker\dist\css\bootstrap-datepicker.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components\bootstrap-daterangepicker\daterangepicker.css">
   <link rel="stylesheet" href="<?php echo base_url();?>dist\css\skins\style.css">
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
        <small>Branch Entry Update</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>


 


    <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div id="result" style='display:none' >
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Data successfully Update..!</strong>
				</div>
			</div>
			 
 
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title">Update Information</h3>
			 
		</div>
			<!-- form start -->	 
		 
			 
		<?php echo form_open('Ctrl_master_entry/update_branch');?> 
		  
		 <div class="alert alert-danger" style="display:none"></div>
		 
		 
		<div class="box-body">
		<?php foreach ($edit_branch as $row): ?>
			<div class="form-group">
				<label for="exampleInputEmail1">Branch Name</label>
				
				<input type="hidden" class="form-control" name="branch_id" id="branch_id" value="<?php echo $row->branch_id;?>" placeholder="Enter name" autofocus  >
				
				<input type="text" class="form-control" name="branch_name" id="branch_name" value="<?php echo $row->branch_name;?>" placeholder="Enter name" autofocus  >
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Address</label>
				<input type="text" class="form-control" name="branch_location" id="branch_location" value="<?php echo $row->branch_location;?>" placeholder="Branch Address" >
			</div>
			<div class="form-group">
				<label for="exampleInputFile">Branch No.</label>
				<input type="text" class="form-control" name="branch_number" id="branch_number" value="<?php echo $row->branch_no;?>" placeholder="Branch Number" >
			</div>
			<?php endforeach;?>
		</div>
		
		
		
		<div class="box-footer">
			<button type="submit" class="btn btn-danger btn-flat btn-submit pull-left" data-toggle="tooltip" data-placement="right" id="submit" name="submit" title="Save" ><i class="glyphicon glyphicon-hourglass"></i>&nbsp;&nbsp;Update Data</button>
			
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url('Ctrl_master_entry/view_branch_entry'); ?>"data-toggle="tooltip" title="Add New" class="btn btn-danger "><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Go Back</a>      
             
		</div>
		<?php  echo form_close();?>
		
		
	</div>
	</div>
	</section>
  	</div>
   
    <?php include 'footer.php';?>
	</div>
      
			
   
 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>





<script type="text/javascript">

$(document).ready(function() {
  $(".btn-submit").click(function(e){

      e.preventDefault();
	  var branch_id=$("input[name='branch_id']").val();
      var branch_name = $("input[name='branch_name']").val();
      var branch_location = $("input[name='branch_location']").val();
      var branch_number = $("input[name='branch_number']").val();
      
      $.ajax({
			 
          url: $(this).closest('form').attr('action'),
          type:$(this).closest('form').attr('method'),
          dataType: "json",
		  data: {"branch_id": branch_id,"branch_name": branch_name,"branch_location":branch_location,"branch_number":branch_number},
          
          success: function(data) {
           
              if($.isEmptyObject(data.error)){
				document.getElementById("result").style.display = "Block";
				setTimeout(function() {
				$('#result').fadeOut('fast');
				$('.alert-danger').fadeOut('fast');
				 //window.location.href = 'Ctrl_master_entry/view_branch_entry';
				  //window.location.href = data.redirect;
				window.location='<?php echo site_url(); ?>/Ctrl_master_entry/view_branch_entry';
				 
				}, 5000);
				
				
				//window.location.href = resp.redirect_url;
				
				
                //alert(data.success);
				//alert(data.failed);
				//var branch_id=$('#branch_id').val('');
                //var branch_name = $("#branch_name").val('');
		    	//var branch_location = $("#branch_location").val('');
				//var branch_number = $("#branch_number").val('');
		 		//document.getElementById("branch_name").focus();
				
              }else{

                $(".alert-danger").css('display','block');

                $(".alert-danger").html(data.error);
                 

              }
 
          }
 
      });

  }); 

});

</script>













</body>
</html>
