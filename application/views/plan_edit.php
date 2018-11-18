	
	
	
	<form id="frm_plan_update" class="form" action="" method="POST">
	    <?php foreach ($data->result() as $row): ?>
	    
	    <label class="required">Plan name</label>
	    <input type="text" id="nameupdate" name="name" class="form-control" value="<?php echo $row->branch_name?>">
	    <label class="required">Plan code</label>
	    <input type="text" name="code" class="form-control">
	    <input type="hidden" name="id" value="<?php echo $branch_id?>">
	    <?php endforeach; ?>
	</form>

	<?php exit;