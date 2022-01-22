$(document).ready(function () {

  USER.LoadUsers();

  

});

const USER = (() => {

  var this_user = {};
  let _cur_id = 0;


  this_user.LoadUsers = () => {

    axios({
      method: 'get',
      url: 'UserManagement',
    })
      .then(function (response) {
        data = response.data.data;
        console.log(data);
        $('#tbl_user').DataTable().destroy();
        $('#tbody_tbl_user').empty();
        let tbody = '';
        let status = '<h5 class=""> <span class="badge badge-success"> Online </span> </h5>';
        data.forEach(value => {
          if (value.status != 1) {
            status = '<h5 class=""> <span class="badge badge-danger"> Offline </span> </h5>';
          }
          tbody +=
            `<tr class="text-center">
                <td> ${value.employee_number} </td>
                <td> ${value.first_name} ${value.middle_name} ${value.last_name} </td>
                <td> ${value.email} </td>
                <td> ${value.position} </td>
                <td> ${value.section} </td>
                <td> ${status} </td>
                <td> <button class="btn btn-success btn-md" onclick="USER.show_edit_user(${value.id})"> <span class="fa fa-pencil-alt"></span> </button> 
                <button class="btn btn-danger btn-md" onclick="USER.show_delete_user(${value.id});"> <span class="fa fa-trash"></span> </button> </td>
                </tr>`;
        });
        $('#tbody_tbl_user').html(tbody);
        $('#tbl_user').DataTable({
          "paging": false,
          "ordering": false,
        });
        toastr[`${response.data.status}`](`${response.data.message}`)
      })
      .catch(function (error) {
        console.log(error);
      });

  }

  this_user.showModalUser = () => {

    $("#emp_id").val('');
    $('#emp_id').attr('disabled', false);
    $("#txt_first_name").val('');
    $("#txt_middle_name").val('');
    $("#txt_last_name").val('');
    $("#txt_email").val('');
    $("#slc_position").val('');
    $("#slc_section").val('');
    $('.custom-file-label').text('Choose File');
    $('#img_user').attr('src', '../public/images/avatar.png');
    $("#modal_title").html('<h4 class="modal-title" id="modal_title"> Account Registration <span class="fas fa-user"></span></h4>');
    $('#add_user_modal').modal('show');
    
  }

  this_user.show_edit_user = (id) => {

    _cur_id = id;

    $("#modal_title").html('<h4 class="modal-title" id="modal_title"> Update Info <span class="fas fa-user"></span></h4>');

    axios({
      method: 'get',
      url: 'UserManagement/' + id,
    })
      .then(function (response) {
        data = response.data.data;

        $('#emp_id').val(data.employee_number);
        $('#emp_id').attr('disabled', true);
        $('#txt_first_name').val(data.first_name);
        $('#txt_middle_name').val(data.middle_name);
        $('#txt_last_name').val(data.last_name);
        $('#txt_email').val(data.email);
        $('#slc_position').val(data.position);
        $('#slc_section').val(data.section);
        $('#txt_action').val('add');
        $('.custom-file-label').text('Choose File');

        $("#txt_action").val('update');

        if(data.photo == null)
        {
          $('#img_user').attr('src', '../public/images/avatar.png');
        }
        else
        {
          $('#img_user').attr('src', '../storage/app/images/user-pic/' + data.photo);
        }

      })
      .catch(function (error) {
        console.log(error);
      });

    $('#add_user_modal').modal('show');
  }

  $('#form-user').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    var action = $('#txt_action').val();
    var api    = '';

    if(action != 'add')
    {
      api = 'user-update/'+_cur_id;
    }
    else
    {
      api = 'UserManagement';
    }

    axios({
      method: 'POST',
      url: api,
      enctype: 'multipart/form-data',
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
    })
    .then(function (response) {
      console.log(response);
      $("#add_user_modal").modal('hide');
     USER.LoadUsers();
     toastr[`${response.data.status}`](`${response.data.message}`)

    })
    .catch(function (error) {
      console.log(error);
    });

  });

  this_user.EditUser = () => {

    var first_name = $('#txt_first_name').val();
    var middle_name = $('#txt_middle_name').val();
    var last_name = $('#txt_last_name').val();
    var email = $('#txt_email').val();
    var position = $('#slc_position').val();
    var section = $('#slc_section').val();
    $('#txt_action').val('update');

    var data = {
      first_name  : first_name,
      middle_name : middle_name,
      last_name   : last_name,
      email       : email,
      position    : position,
      section     : section
    }

    axios({
      method: 'PATCH',
      url: 'UserManagement/'+_cur_id,
      enctype: 'multipart/form-data',
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      data: data,
    })
    .then(function (response) {
      console.log(response);
      $("#add_user_modal").modal('hide');
     USER.LoadUsers();
     toastr[`${response.data.status}`](`${response.data.message}`)

    })
    .catch(function (error) {
      console.log(error);
    });

  }

  this_user.loadImage = (event) => {

    var reader = new FileReader();

    reader.onload = function () {
      var output = document.getElementById('img_user');
      output.src = reader.result;
      output.style.width = "240px";
      output.style.height = "240px";
    };

    reader.readAsDataURL(event.target.files[0]);

  }

  $('.custom-file-input').change(function (e) {
      if (e.target.files.length) {
          $(this).next('.custom-file-label').html(e.target.files[0].name);
      }
  });

  this_user.show_delete_user = (id) => {

    $('#delete_user_modal').modal('show');

    _cur_id = id;

  }

  this_user.delete_user = () => {

    axios({
      method: 'delete',
      url: 'api/UserManagement/' + _cur_id,
    })
      .then(function (response) {
        console.log(response);

        toastr[`${response.data.status}`](`${response.data.message}`)

        $("#delete_user_modal").modal('hide');
        USER.LoadUsers();
      })
      .catch(function (error) {
        console.log(error);
      });

  }


  return this_user;
})();

