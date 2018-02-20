<?php
$is_super = $this->session->userdata('is_super');
?>
<div class="row">
				<div class="col-lg-12 bottom35">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h2>Home</h2>
									<?php if ($is_super) { ?>
										<div class="ibox-tools"><a class="btn red btn-xs" href="<?php echo site_url('Home_ctrl/AddCategory');?>"> ADD Category</a></div>
									<?php } ?>
							</div>
							<div class="ibox-content collapse in">
								<div class="widgets-container">
									<div class="table table-hover">
										<div id="SalaryTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div class="dt-buttons"><a
													class="dt-button buttons-copy buttons-html5 btn dark btn-outline" tabindex="0"
													aria-controls="SalaryTable" href="#"><span>copy</span></a><a
													class="dt-button buttons-csv buttons-html5 btn aqua btn-outline" tabindex="0"
													aria-controls="SalaryTable" href="#"><span>csv</span></a><a
													class="dt-button buttons-excel buttons-html5 btn aqua btn-outline" tabindex="0"
													aria-controls="SalaryTable" href="#"><span>excel</span></a><a
													class="dt-button buttons-pdf buttons-html5 btn yellow btn-outline" tabindex="0"
													aria-controls="SalaryTable" href="#"><span>pdf</span></a><a
													class="dt-button buttons-print btn purple btn-outline" tabindex="0"
													aria-controls="SalaryTable" href="#"><span>print</span></a>
											</div>
											<div id="SalaryTable_filter" class="dataTables_filter"><label>Search:<input
														type="search" class="form-control input-sm" placeholder=""
														aria-controls="SalaryTable"></label>
											</div>
											<table id="categoryTable"
												   class="display nowrap table  responsive nowrap table-bordered dataTable dtr-inline collapsed"
												   role="grid">
											<thead>
											<tr>
												<th>ID</th>
												<th>Sort_id</th>
												<th>Title</th>
												<th>Description</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
													<?php foreach($category_list as $rows){ ?>
											<tr>
												<td id="cat_id"><?php echo $rows->id ?></td>
												<td><?php echo $rows->sort_id ?></td>
												<td><?php echo $rows->title ?></td>
												<td><?php echo $rows->description ?></td>
												<td>	<?php if($rows->image != ''){ ?>
													<img src="<?php echo base_url().'upload/category/'.$rows->image ?>" alt="img.jpg"
												 		height="100" width="120"></td>
											 				<?php } else { ?>
												 <img src=" <?php echo base_url()?>assets/images/teem/placeholders.jpg" alt="img.jpg"
														height="100" width="120"></td>
															<?php } ?>
												<td>
													<?php if (!($is_super)) { ?>
														<input id="category_toggle" type="checkbox" data-toggle="toggle" value="<?php echo $rows->isactive?>" onclick="isCategory(this)">
													<?php } ?>
													<p id="active_value"></p>
													<?php if ($is_super && $rows->isactive == 0) {  ?>
														<a title="Edit" class="blue btn btn-outline"
														   href="<?php echo site_url("Home_ctrl/EditCategory/$rows->id") ?>">
															 <i class="fa fa-pencil"></i>
														</a>
														<a title="Delete"
														   class="red btn btn-outline global_delete del<?php //echo $rows->id; ?>"
														   rel="<?php //echo $rows->id; ?>" bel="notice"
														   href="javascript:void(0)"><i class="fa fa-trash-o"></i></a>
													<?php } else { ?>
														<a title="Edit" class="blue btn btn-outline"
														   href="<?php //echo site_url("Feedback_ctrl/edit_feedback/$rows->id") ?>" disabled><i
																class="fa fa-pencil" ></i></a>
														<a title="Delete"
														   class="red btn btn-outline global_delete del<?php //echo $rows->id; ?>"
														   rel="<?php //echo $rows->id; ?>" bel="notice"
														   href="javascript:void(0)" disabled><i class="fa fa-trash-o"></i></a>
												<?php } ?>
												</td>
											</tr>
													<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
<script>
var action_value = document.getElementById("category_toggle").value;
if(action_value ==1)
{
	document.getElementById("category_toggle").checked = true;
}else{
	document.getElementById("category_toggle").checked = false;
}


function isCategory(action_value)
{
	if(action_value.value == 1)
	{
		action_value.value = 0
		document.getElementById("active_value").innerHTML="Enabled";
	}else if(action_value.value == 0){
		action_value.value = 1
		document.getElementById("active_value").innerHTML="disabled";
	}

												///AJAX Enable/Disable for Admin//
		if(action_value.value == 1)
		{
			var action_value = $("#category_toggle").val();
			var id = $("#cat_id").html();
			//alert(action_value);
			$.ajax({
				type:'POST',
				data:{
								action_value:action_value,
								id:id
							},
				url:'<?php echo base_url('Home_ctrl/ActivateCategory/'.$rows->id); ?>',
				processData: true,
				success:function(result){
					alert($("#active_value").html());
				},
				error:function(data){
					alert('Error Occured');
				}
			});
		}else if(action_value.value == 0) {
			var action_value = $("#category_toggle").val();
			var id = $("#cat_id").html();
			//alert(action_value);
			$.ajax({
				type:'POST',
				data:{
								action_value:action_value,
								id:id
							},
				url:'<?php echo base_url('Home_ctrl/ActivateCategory/'.$rows->id); ?>',
				processData: true,
				success:function(result){
					alert($("#active_value").html());
				},
				error:function(data){
					alert('Error Occured');
				}
			});
		}
}
</script>
