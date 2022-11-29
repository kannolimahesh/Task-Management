<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Task Management</title>	
</head>
<body>

<div id="container">
	
	<h1>Task Management</h1>
	<button><a href="<?php echo base_url()."index.php/login/signout"; ?>">Signout</a></button>		
	
	<hr m-t-5>
	<h2>Task List</h2>
	<button><a href="<?php echo base_url()."index.php/task/add"; ?>">Add Task</a></button>	
	<div class="table">
		<table id="tasklist">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Action</th>
				</tr>	
			</thead>	
			<tbody>
				<?php if(!empty($result)): ?>
					<?php foreach($result as $row): ?>
						<tr>
							<td><?php echo $row["task_id"]; ?></td>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["description"]; ?></td>
							<td><?php echo date("Y-m-d",strtotime($row["start_date"])); ?></td>
							<td><?php echo date("Y-m-d",strtotime($row["end_date"])); ?></td>
							<?php 
								$json_arr = array("task_id"=>$row["task_id"]);
								$json_arr_encode = json_encode($json_arr);
								$json_base64_encode = base64_encode($json_arr_encode);
							
							?>
							<td><button><a href="<?php echo base_url()."index.php/task/edit_task/".$json_base64_encode; ?>">Edit</a></button></td>
						</tr>
					<?php endforeach; ?>	
				<?php else: ?>	
					<tr>
						<td></td>
						<td></td>
						<td ><?php echo "No Record Found"; ?></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>	
				<?php endif; ?>	
			</tbody>
		<table>	
	</div>	
	
	
	<p style="color:green"><?php if($this->session->flashdata("success_msg")!="") echo $this->session->flashdata("success_msg");?></p>
	<p style="color:red"><?php if($this->session->flashdata("error_msg")!="") echo $this->session->flashdata("error_msg");	 ?>	</p>
	
	
	
</div>



</body>
</html>
