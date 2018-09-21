<div class="page-container">
   <div class="page-content-wrapper">
      <div class="page-content">
         <div class="container">
            <div class="page-content-inner">
               <div class="mt-content-body">
                  <div class="row">
                     <div class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                        <div class="portlet box blue ">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-search" aria-hidden="true"></i> Change Password 
                              </div>
                           </div>
                           <div class="portlet-body form">
                              <form role="form" method="POST" action="<?= base_url('change_password');?>">
                                 <div class="form-body">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="fomt-group">
                                             <label class="control-label">Old Password</label>
                                             <input type="text" class="form-control" name="oldPassword" id="oldPassword">
                                             <span id="oldpass_error"></span>  
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="fomt-group">
                                             <label class="control-label">New Password</label>
                                             <input type="text" class="form-control" name="password" id="password"> 
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="fomt-group">
                                             <label class="control-label">Confirm New Password</label>
                                             <input type="text" class="form-control" name="confirm_password" id="confirm_password">
                                             <span id="pass_error"></span> 
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-actions">
                                    <button type="submit" name="submit" id="submit" value="submit"class="btn red">Change Password</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- On Page Scripts -->
<!-- Confirm Password -->
<script>
$(document).ready(function(){
    $("#submit").prop('disabled',true);
    $('#password').focus(function(){
        var old_pwd = $("#oldPassword").val();
        if(old_pwd == ''){
            $("#oldpass_error").html('<span style="color:blue">Enter password</span>');
        }else{
            $("#oldpass_error").hide();
        }
        
    });
    $("#confirm_password").keyup(psswd_match);

});
      function psswd_match(){
        
            var passwd = $("#password").val();
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
