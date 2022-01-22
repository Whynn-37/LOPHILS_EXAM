<div class="modal fade" id="newsfeed_modal" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header navbar-white">
          <h4 class="modal-title" id="modal_title"><span class="fas fa-newspaper"></span>  NewsFeed Details </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @csrf
        <div class="modal-body">
          <div class="container-fluid">  
            <form id="form-newsfeed_modal" method="post" enctype="multipart/form-data">
              <input type="hidden" id="txt_action" value="add">
              @method('POST')
              @csrf

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label>Date Published</label>
                   
                    <div class="input-group date" id="reservationdate_modal" data-target-input="nearest">
                      <input type="text" class="form-control" name="DatePublish" id="date_published_modal" data-target="#date_published_modal" readonly>
                      <div class="input-group-append">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" placeholder="Title" type="text" name="Title" id="txt_titles_modal" required onkeypress="return /[a-z ]/i.test(event.key)">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>Author</label>
                    <input class="form-control" placeholder="Name of Author" type="text" name="Author" id="txt_Author_modal" required onkeypress="return /[a-z ]/i.test(event.key)">
                    <input class="form-control" hidden placeholder="Name of Author" type="text" name="LastUpdatedBy" id="txt_lastupdateby_modal" required onkeypress="return /[a-z ]/i.test(event.key)" value="{{Session::get('last_name') .", ". Session::get('first_name')}}">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>Short Details</label>
                    <textarea  class="form-control" placeholder="Short Details here" name="ShortDetails" id="txt_description_modal" required >
                  </textarea>
                  </div>
                </div>
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
  <div class="modal fade" id="delete_newsfeed_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header navbar-white">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Delete User?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4 class="text-center"> ARE YOU SURE YOU WANT TO DELETE THIS STORY?</h4>
        </div>
        <div class="modal-footer justify-content-between">
          
          <button type="button" class="btn btn-primary" onclick="NEWSFEED.delete_newsfeed();">Confirm</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->