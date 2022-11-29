<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Task Management</title>	
</head>
<body>


<form action="<?php echo base_url()."index.php/task/edit_task/".$edit_url; ?>"  method="post" enctype="multipart/form-data" >

<div id="container">
	<h1>Task Management</h1>
	<button><a href="<?php echo base_url()."index.php/login/signout"; ?>">Signout</a></button>	
	<hr m-t-5>

	<h2>Edit Task</h2>	

	<div class="row">	
		<div class="col-md-6">
			<div class="form-group-row">
				<label class="col-md-4">Task Name : </label>
				<div class="col-md-8">
					<input type="text" name="task_name" id="task_name" value="<?php echo set_value('task_name',$result["name"]); ?>">
				</div>	
			</div>	
		</div>			
	</div>	

	<div class="row">	
		<div class="col-md-12">
			<div class="form-group-row">
				<label class="col-md-4">Description : </label>
				<div class="col-md-8">					
					<textarea name="description" id="description" value="" rows="5" cols="40"> <?php echo set_value('description',$result["description"]); ?></textarea>
				</div>	
			</div>	
		</div>			
	</div>	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group-row">
				<label class="col-md-4">Start date : </label>
				<div class="col-md-8">
					<input type="date" name="start_date" id="start_date" value="<?php echo set_value('start_date',date("Y-m-d",strtotime($result["start_date"]))); ?>">
				</div>	
			</div>	
		</div>			
	</div>	
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group-row">
				<label class="col-md-4">End date : </label>
				<div class="col-md-8">
					<input type="date" name="end_date" id="end_date" value="<?php echo set_value('end_date',date("Y-m-d",strtotime($result["end_date"]))); ?>">
				</div>	
			</div>	
		</div>			
	</div>	

	<div class="row">	
		<div class="col-md-6">
			<div class="form-group-row">
				<label class="col-md-4">Task Status : </label>
				<div class="col-md-8">					
					<select class="form-control" name="task_status" id="task_status" >
						<option value="">Select</option>
						<option value="1" <?php if($result["task_status"]=="1") echo "selected";?> >Ongoing</option>
						<option value="2" <?php if($result["task_status"]=="2") echo "selected";?> >Pending</option>
						<option value="3" <?php if($result["task_status"]=="3") echo "selected";?> >Completed</option>						
					</select>	
				</div>	
			</div>	
		</div>			
	</div>		
	<br/>
	<div class="row">	
		<div class="col-md-6">
			<div class="form-group-row">								
					<input type="submit" name="submitbtn" id="submitbtn" value="Submit">
					<button><a href="<?php echo base_url()."index.php/task/task_list"; ?>">Back</a></button>
			</div>	
		</div>			
	</div>	

	<?php echo validation_errors(); ?>
	<p style="color:green"><?php if($this->session->flashdata("success_msg")!="") echo $this->session->flashdata("success_msg");?></p>
	<p style="color:red"><?php if($this->session->flashdata("error_msg")!="") echo $this->session->flashdata("error_msg");	 ?>	</p>

	
</div>

</form>

</body>
</html>
