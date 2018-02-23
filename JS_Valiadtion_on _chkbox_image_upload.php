<form action="<?php echo base_url().'sales_manager/approveRejectInformation';?>" name="approveRejectForm" id="approveRejectForm" method="post">
      <div class="modal-body">
        <div class="form-group row">
          <div class="col-md-3">
            <label for="name">Approval Status</label>
          </div>
          <div class="col-md-9">
            <input type="hidden" name="information_id" id="information_id" value="">
            <select name="approval_status" id="approval_status" class="form-control isApproved" onblur="isApproved();" required>
              <option value="0">-Select-</option>
              <option value="approved">Approved</option>
              <option value="rejected">Rejected</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label for="name">Reason</label>
          </div>
          <div class="col-md-9">
            <textarea class="form-control" name="approval_reason" id="approval_reason" rows="4"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label for="name">Approval From</label>
          </div>
          <div class="col-md-9">
            <input type="checkbox" name="ceochairman[]"
            class="ceochairman" value="ceo">CEO
            <input type="checkbox" name="ceochairman[]" class="ceochairman" value="chairman">Chairman
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3">
            <label for="name">Document</label>
          </div>
          <div class="col-md-9">
            <div class='space col-sm-12' id='document_1' style="padding-right: 0px; padding-left: 0px;">
              <div class="col-sm-3" style="padding-right: 0px; padding-left: 0px;">
                <select class="form-control" name="document_type" id="document_type_1" >
                  <option value="0" selected="selected">-Select-</option>
                  <?php
                    /* print_r($documentType_details); */
                    foreach($documentType_details as $document_type)
                    {
                  ?>
                    <option value="<?php echo $document_type->id;?>"><?php echo $document_type->document_type; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-1">&emsp;</div>
              <div class="col-sm-5" style="padding-right: 0px; padding-left: 0px;">

                <span class="btn btn-green fileinput-button ">
                 <i class="glyphicon glyphicon-plus"></i>
                <span>Upload Document...</span>
                <input id="image_fileupload_1" type="file" onclick="uploadDocument('1')"  name="files" data-url="http://flying-colour.com/server/download/">
                </span>
                <label for="inputEmail1" class="req-messge"></label>
                <div id="image_progress_1">
                <div class="bar"></div>
                </div>
                <div id="gallery_show_image_1">
                <ul class="list-group-app">
                </ul>
                </div>
              </div>
              <div class="col-sm-1">&emsp;<input type="hidden" id="image_uploaded" value="0" /></div></div>
          </div>
        </div>
                  </div>
                  <div class="modal-footer">
        <input type="submit" class="btn btn-success" name="btnsub" value="Submit">
      </div>
    </form>
    /*Require image when document is selected or vice versa on submit*/
    $("#approveRejectForm").on("submit", function(e)
    {
        var flagImg = true;
        var image_uploaded = document.getElementById("image_uploaded").value;
        var document_type = document.getElementById("document_type_1").value;
        console.log("image_uploaded : "+image_uploaded);
        console.log("document_type : "+document_type);
        if(image_uploaded == 1 && document_type == 0)
        {
          alert("Please select Document Type");
          flagImg = false;
        }
        else if(image_uploaded == 0 && document_type != 0)
        {
          alert("Please Upload Image");
          flagImg = false;
        }
        else
        {
          flagImg = true;
        }


        if(flagImg == true)
          return true;
        else
          return false;

    });
    /*End Require image when document is selected or vice versa on submit*/

    <!-- /*Approval Form fields Mandate*/ -->
        function isApproved()
        {
            //console.log('In isApproved function');
            if($(".isApproved option:selected").text()=="Approved")
            {
                console.log('values is approved');
                    /*CheckBox Reuired*/
                
                    $("#ceochairman").prop('checked',true);
                    $('[name ="approval_reason"]').prop('required',false);
                    checked = $("input[type=checkbox]:checked").length;
                      if(!checked) {
                        alert("You must check at least one checkbox.");
                        return false ;
                      }
                
            }else  if($(".isApproved option:selected").text()=="Rejected"){
                
                    console.log('Approval is rejected');
                    $("#ceochairman").prop('checked',false);
                     $('[name ="approval_reason"]').prop('required',true);
                     return true;
                }else {
                    $(".isApproved").prop('required',true);
                    return false;
                }
        }
    /* End Approval Form fields Mandate */
