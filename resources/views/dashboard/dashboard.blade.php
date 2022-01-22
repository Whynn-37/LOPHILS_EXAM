@extends('templates.template')

@section('custom-css')
  <!-- daterange picker -->
  <link rel="stylesheet" href="../node_modules/daterangepicker/daterangepicker.css">
@endsection

@section('content_body')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><span><i class="fas fa-newspaper"></i></span> News Feed Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">News Feed Management</li>
          </ol>
        </div>

      </div>
      <hr>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-4 adminonly"  hidden>
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title"><b> Register NewsFeed: </b></h2>
            </div>
            <div class="card-body">
              <form id="form-newsfeed" method="post" enctype="multipart/form-data">
                <input type="hidden" id="txt_action" value="add">
                @method('POST')
                @csrf

                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Date Published</label>
                    
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control" name="DatePublish" id="date_published" data-target="#date_published" readonly>
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
                      <input class="form-control" placeholder="Title" type="text" name="Title" id="txt_titles" required onkeypress="return /[a-z ]/i.test(event.key)">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Author</label>
                      <input class="form-control" placeholder="Name of Author" type="text" name="Author" id="txt_Author" required onkeypress="return /[a-z ]/i.test(event.key)">
                      <input class="form-control" hidden placeholder="Name of Author" type="text" name="LastUpdatedBy" id="txt_lastupdateby" required onkeypress="return /[a-z ]/i.test(event.key)" value="{{Session::get('last_name') .", ". Session::get('first_name')}}">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Short Details</label>
                      <textarea  class="form-control" placeholder="Short Details here" name="ShortDetails" id="txt_description" required >
                    </textarea>
                    </div>
                  </div>
                </div>

           
            </div>
            <div class="card-footer">
              <div class="card-tools  text-right">
                <button type="submit" id="btn_savenewsfeed" class="btn btn-md btn-success">
                  <i class="fas fa-check">&nbsp; Register</i>
                </button>

              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b> NewsFeed Table_modules</b></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <table class="table table-bordered table-hover" id="tbl_newsfeed">
                          <thead>
                            <tr class="text-center">
                              <th>ID</th>
                              <th>Title</th>
                              <th>ShortDetails</th>
                              <th>Date Published</th>
                              <th>Author</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbody_tbl_newsfeed"></tbody>
                        </table>
            </div>
            <div class="card-footer">
           
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('dashboard.dashboard_modal')


  </section>
</div>
@endsection

@section('custom-js')
{{-- <script src="../node_modules/admin-lte/plugins/jquery/jquery.min.js"></script> --}}
<script src="../node_modules/daterangepicker/moment.min.js"></script>
<script src="../node_modules/daterangepicker/daterangepicker.js"></script>

<!-- date-range-picker -->
<!-- <script src="../node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js"></script> -->
<script src="../public/scripts/Dashboard.js"></script>
@endsection