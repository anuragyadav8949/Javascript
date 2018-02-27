<?php
$is_super = $this->session->userdata('is_super');
?>
  <div class="row wrapper border-bottom page-heading">
  	<div class="col-lg-12">
  		<h2>Change Password</h2>
  		<ol class="breadcrumb">
  			<li><a href="<?php echo base_url(); ?>">Home</a></li>
  			<li class="active"><strong>Change Password</strong></li>
  		</ol>
  	</div>
  	<div class="col-lg-12"></div>
  </div>

  <div class="wrapper-content">
    <div class="row">
      <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="widgets-container">
                        <h5>Change Password </h5>
                        <hr>
                        <form method="POST" action="<?php echo base_url().'Soc_ctrl/change_password' ?>">
                            <!-- <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="exampleInputEmail1">Old Password</label>
                                <input class="form-control m-t-xxs" id="old_password"
                                        name ="old_password"
                                       placeholder="Enter Your Old Password" type="password">
                            </div> -->
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="exampleInputPassword1">New Password</label>
                                <input name="new_password" class="password form-control m-t-xxs"
                                       id="new_password" placeholder="Enter New Password" type="password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input name="confirm_password" class="password form-control m-t-xxs"
                                       id="confirm_password" placeholder="Re-Enter New Password"
                                       type="password"  required>
                                <span id="pass_error"></span>
                            </div>
                            <button type="submit" id="submit" class="btn aqua m-t-xs bottom15-xs">Submit</button>
                        </form>
                    </div>
                </div>
          </div>
    </div>
</div>
      <!-- /*Password Mathcing*/ -->
<script>
$(document).ready(function(){
  $("#confirm_password").keyup(psswd_match);
});
      function psswd_match(){
        var passwd = $("#new_password").val();
        var cnfm_passwd = $("#confirm_password").val();
        if (passwd == cnfm_passwd) {
          $("#pass_error").html('<span style="color:blue">Password Match</span>');
          $("#submit").prop('disabled',false);
        }else {
          $("#pass_error").html('<span style="color:red">Password does not Match</span>');
          $("#submit").prop('disabled',true);
        }
      }
</script>
