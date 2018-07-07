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
						<div class="ibox-tools">
							<a class="btn red btn-xs" href="<?php echo site_url('Home_ctrl/AddCategory'); ?>">
								Add new Category</a></div>
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
									<?php foreach ($category_list as $rows) { ?>
										<tr>
											<td id="cat_id"><?php echo $rows->id ?></td>
											<td><?php echo $rows->sort_id ?></td>
											<td><?php echo $rows->title ?></td>
											<td><?php echo $rows->description ?></td>
											<td>    <?php if ($rows->image != ''){ ?>
												<img src="<?php echo base_url() . 'upload/category/' . $rows->image ?>"
													 alt="img.jpg"
													 height="100" width="120"></td>
											<?php } else { ?>
												<img src=" <?php echo base_url() ?>assets/images/teem/placeholders.jpg"
													 alt="img.jpg"
													 height="100" width="120"></td>
											<?php } ?>
											<td>
												<?php if (!($is_super)) { ?>
													<!-- Admin -->
													<?php $Active = $rows->isactive ?>
													<?php if ($Active == 1) {
														$chked = "checked";
													} else {
														$chked = '';
													}
													?>
													<input class="category_toggle" id="category_toggle" type="checkbox"
														    rel="<?php echo $rows->id ?>" value="<?php echo $rows->isactive ?>" 
														   onClick="isCategory(this,'<?php echo $rows->id ?>');" <?php echo $chked; ?> >
													<p id="active_value"></p>
												<?php } ?>
												<?php if ($is_super and $rows->isactive == 1) { ?>
													<!-- Super Admin -->
													<a title="Edit" class="blue btn btn-outline"
													   href="<?php echo site_url("Home_ctrl/EditCategory/$rows->id") ?>"
													   disabled>
														<i class="fa fa-pencil"></i>
													</a>
												<?php } else {
													if ($is_super) { ?>
														<a title="Edit" class="blue btn btn-outline"
														   href="<?php echo site_url("Home_ctrl/EditCategory/$rows->id") ?>">
															<i class="fa fa-pencil"></i>
														</a>
													<?php }
												} ?>
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

    
        var category_table = document.getElementById("categoryTable");
	//var action_value = document.getElementByClass("category_toggle").value;
	var action_value = $(".category_toggle").val();


	// for( var i=1;i<category_table.rows.length;i++)
	// {
	// 			var action_values = $(".category_toggle").attr('rel');
	// 			//alert($(".category_toggle").attr('rel'));
	// 			console.log(action_values);
	// 			 //alert(action_value);
	// 			if(action_values == 1)
	// 			{
	// 				alert("value=1");
	// 				$(".category_toggle").prop('checked',true);
	// 			}else{
	// 				alert("value = 0");
	// 				$(".category_toggle").prop('checked',false);
	// 			}
	// }

	var isEnable = action_value;
    //alert("Outside isCategory function");
	function isCategory(action_value,id) {
		/*changing value from 0-1/1-0*/
		if (action_value.value == 1) {
			isEnable = action_value.value = 0
			alert(isEnable);
			//document.getElementById("active_value").innerHTML="Enabled";
		} else if (action_value.value == 0) {
			isEnable = action_value.value = 1
			alert(isEnable);
			//document.getElementById("active_value").innerHTML="disabled";
		}
            
		/*AJAX Enable/Disable for Admin*/
		alert('Before AJAX');
		if (isEnable == 1) {
			var action_value = isEnable
			alert(action_value);
// 			var id = $('category_toggle').attr('rel');
			alert("AJAX en/dis == 1 " + action_value + "Where id = " + id);
			alert(action_value);
			$.ajax({
				type: 'POST',
				data: {
					action_value: action_value,
					id: id
				},
				url: '<?php echo base_url('Home_ctrl/ActivateCategory/')?>',
				processData: true,
				success: function (result) {
					alert(result);
				},
				error: function (data) {
					alert('Error Occured');
				}
			});
		} else {
			var action_value = isEnable;
			alert(action_value);
			//var id = $('#category_toggle').attr('rel');
			//var id = $('.category_toggle').attr('rel');
			alert("JAX en/dis == 0" +"Action value = " +action_value + "Where id = " + id);

			$.ajax({
				type: 'POST',
				data: {
					action_value: action_value,
					id: id
				},
				url: '<?php echo base_url('Home_ctrl/ActivateCategory/'); ?>',
				processData: true,
				success: function (result) {
					alert(result);
				},
				error: function (data) {
					alert('Error Occured');
				}
			});

		}
	}


	
</script>

/**Another Method to toggle checkbox**/

$('#custom7').on('change', function(){
   this.value = this.checked ? 1 : 0;
    alert(this.value);
}).change();
