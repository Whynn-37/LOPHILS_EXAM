<div class="modal fade" id="add_user_modal" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header navbar-white">
          <h4 class="modal-title" id="modal_title"> Account Registration <span class="fas fa-user"></span></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @csrf
        <div class="modal-body">
          <div class="container-fluid">  
            <form id="form-user" method="post" enctype="multipart/form-data">
              <input type="hidden" id="txt_action" value="add">
              @method('POST')
              @csrf
              <div class="row">
                <div class="col-8">
                  <img class="img-fluid" src="../public/images/add_info.png" alt="add_info">
                </div>
                <div class="col-4">
                  <img class="img-thumbnail rounded" src="../public/images/avatar.png" id="img_user" alt="user_avatar" style="width:240px;height:240px;">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input form-control" accept="image/*" id="txt_user_img" name="upload-photo" onchange="USER.loadImage(event);">
                      <label class="custom-file-label" for="txt_user_img">Choose File</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>Employee Number</label>
                    <input class="form-control" placeholder="Employee Number" type="text" min="0" name="employee_number" id="emp_id" required onkeypress="return /[0-9]/i.test(event.key)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" placeholder="First Name" type="text" name="first_name" id="txt_first_name" required onkeypress="return /[a-z]/i.test(event.key)">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Middle Name</label>
                    <input class="form-control" placeholder="Middle Name" type="text" name="middle_name" id="txt_middle_name" required onkeypress="return /[a-z]/i.test(event.key)">
                  </div>
               </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" placeholder="Last Name" type="text" name="last_name" id="txt_last_name" required onkeypress="return /[a-z]/i.test(event.key)">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" placeholder="Email" type="email" name="email" id="txt_email">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Position</label>
                    <select class="form-control" name="position" id="slc_position" required>
                      <option disabled selected value="">Select</option>
                      <option value="Admin"> Admin </option>
                      <option value="Editor"> Editor </option>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Section</label>
                    <select class="form-control" name="section" id="slc_section" required>
                      <option disabled selected value="">Select</option>
                      <option value="Admin - HR"> Admin - HR </option>
                      <option value="Management Information System"> Management Information System </option>
                    </select>
                  </div>
                </div>
                <input class="form-control" hidden placeholder="Status" type="text" value="0" name="status" id="txt_status">
              </div>
              <div class="modal-footer d-flex justify-content-end">
                <button type="submit" id="btn_save" class="btn btn-primary"> Save </button>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- DELETE MODAL --}}
  <div class="modal fade" id="delete_user_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header navbar-white">
          <h4 class="modal-title">Delete User?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4 class="text-center"> ARE YOU SURE YOU WANT TO DELETE THIS USER?</h4>
        </div>
        <div class="modal-footer justify-content-between">
          
          <button type="button" class="btn btn-primary" onclick="USER.delete_user();">Confirm</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->