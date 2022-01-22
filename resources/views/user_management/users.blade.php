@extends('templates.template')

@section('custom-css')

@endsection

@section('content_body')

<div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Management</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                        <button class="btn btn-primary" onclick="USER.showModalUser();"> Register  <span class="fas fa-plus-circle"></span></button>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered table-hover" id="tbl_user">
                          <thead>
                            <tr class="text-center">
                              <th>Emp ID</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Position</th>
                              <th>Section</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbody_tbl_user"></tbody>
                        </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    @include('user_management.user_management_modal')
    
  </div>

@endsection

@section('custom-js')
<!-- <script src="../node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>   -->
<script src="../public/scripts/user_management/users.js"></script>

@endsection


