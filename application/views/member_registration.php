<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <title>List - of All Members</title>
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
        <small>Register Member List</small>
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
		<div class="col-md-12">
			 
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-list"></i>&nbsp; View Member Data</h3>
			
		
			<!-- form start -->	 
		<div class="pull-right"><a  id="addNew" onclick="add_person()" class="btn btn-danger">
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
          			<th>Reg.No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Mobile No</th>
                  <th>Email ID</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>DOB</th>
                  <th>Reg.Date</th>
                  <th>Photo</th>
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
      
	
	
	<!-- Bootstrap modal -->
<div class="modal fade animated pulse" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            
            
            <div class="alert alert-danger" id="error_block" style="display:none">
				
	   		</div>
	   
            <div class="modal-body form">
                <form action="#" id="form" >
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                     	<div class="form-group">
                     
                            <label class="control-label col-md-3">Registration No</label>
                            <div class="col-md-9">
                            
                        <input name="member_registration_no" id="member_registration_no" value="<?php echo 'CODERED - '.rand(); ?>"  class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input name="member_firstname" id="member_firstname" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input name="member_lastname" id="member_lastname" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select name="member_gender" id="member_gender" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-md-3">Mobile No</label>
                            <div class="col-md-9">
                                
                                <input name="member_mobile_no" id="member_mobile_no" placeholder="Mobile No" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Email ID</label>
                            <div class="col-md-9">
                                 
                                <input name="member_email" id="member_email" placeholder="Email ID" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="member_address" id="member_address" placeholder="Address" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="member_dob" id="member_dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3">Medical History</label>
                            <div class="col-md-9">
                                <textarea name="member_medical_history" id="member_medical_history" placeholder="Medical History" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Member Image</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->



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
 
 <script src="<?php echo base_url();?>assets/lib/bootstrap-datepicker.min.js"></script>
 
 
 <script>
       
    $(document).ready(function (){
//        call plan list method for populate table
        memberList();
         
 
   
    

    });
    
     var memberList = function (){
     	 $("#preloader").css('display','block');
		 
         $.ajax({
               url:'<?php echo base_url()?>Ctrl_master_entry/memberList',
               type:'GET'
            }).done(function (html){
                $('#ajaxlistplan').html(html);
                var btnedit= $('.btnedit');
                var btndelete= $('.btndelete');
                document.getElementById("preloader").style.display = "none";
              
                
            });
    };
    
    
</script>
 
 
 
 
 <script>
       
    $(document).ready(function (){
//        call plan list method for populate table
        //branchList();
         
         
         
//      
   $(document).on("click","#editBtnId",function(e){
   	
   	//alert("AlertBTN");
      e.preventDefault();
      
      var editBtnId = $(this).attr('data-editBtnId');
	    save_method = 'update';
	    $('#form')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string
	  
     //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Ctrl_master_entry/ajax_edit')?>/" + editBtnId,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.member_id);
            $('[name="member_registration_no"]').val(data.member_registration_no);
            $('[name="member_firstname"]').val(data.member_firstname);
            $('[name="member_lastname"]').val(data.member_lastname);
            $('[name="member_mobile_no"]').val(data.member_mobile_no);
            $('[name="member_email"]').val(data.member_email);
            $('[name="member_address"]').val(data.member_address);
             $('[name="member_gender"]').val(data.member_gender);
            $('[name="member_medical_history"]').val(data.member_medical_history);
            $('[name="member_dob"]').datepicker('update',data.member_dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Member Details'); // Set title to Bootstrap modal title
            $('#photo-preview').show(); // show photo preview modal
            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo
 
            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    });
    
    
    //delete Code
    $(document).on("click","#deleteBtnId",function(e){
    	
   	
   	//alert("DELETE BTN");
      e.preventDefault();
       var deleteBtnId = $(this).attr('data-deleteBtnId');
      $('#deleteModal').modal('show');
      
      //alert(deleteBtnId);
      $('#btnDelete').unbind().click(function(){
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Ctrl_master_entry/ajax_delete')?>/"+deleteBtnId,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#deleteModal').modal('hide');
                memberList();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
     
      
    });
     
 });    
    
 });   
    
    
    
</script>
 
 
 
 
 
 <script type="text/javascript">
 
var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
 
$(document).ready(function() {
 
 
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
   
     memberList();
         var memberList = function (){
     	 $("#preloader").css('display','block');
		 
         $.ajax({
               url:'<?php echo base_url()?>Ctrl_master_entry/memberList',
               type:'GET'
            }).done(function (html){
                $('#ajaxlistplan').html(html);
                var btnedit= $('.btnedit');
                var btndelete= $('.btndelete');
                document.getElementById("preloader").style.display = "none";
              
                
            });
    }; 

    
   
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
 
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 
});
 
 
 
function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Fill Member Details'); // Set Title to Bootstrap modal title
    $('#photo-preview').hide(); // hide photo preview modal
    $('#label-photo').text('Upload Photo'); // label photo upload
}
 
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function save()
{
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled',false); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('Ctrl_master_entry/ajax_add')?>";
    } else {
        url = "<?php echo site_url('Ctrl_master_entry/ajax_update')?>";
    }
 
    // ajax adding data to database
 
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
        	if($.isEmptyObject(data.error)){
				 if(data.status) //if success close modal and reload ajax table
				 {
                	$('#modal_form').modal('hide');
                 	memberList();
                	$(".alert-danger").css('display','none');
                	$('#form')[0].reset();
            	}
            else{
                	for (var i = 0; i < data.inputerror.length; i++) 
                	{
	                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
	                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                	}
            	}
		            $('#btnSave').text('Save'); //change button text
		            $('#btnSave').attr('disabled',false); //set button enable 
		 			memberList();
		 			 
				}else{
						document.getElementById("error_block").style.display = "Block";
						$(".alert-danger").html(data.error);
						setTimeout(function() {
						$('#error_block').fadeOut('fast');
						}, 5000);	 
						///$('#btnSave').text('Save'); 
						//$('#btnSave').attr('disabled',false);
				}
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
             
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',true); //set button enable 
            
 
        }
        
    });
}
 
 
 
</script>
</body>
</html>
