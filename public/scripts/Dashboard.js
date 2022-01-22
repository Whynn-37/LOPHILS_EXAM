$(document).ready(function () {
  
    NEWSFEED.LoadNewsfeed()
    if($('#session_position').text() == '(Admin)'){
      $('.adminonly').removeAttr('hidden');
    }
});
const NEWSFEED = (() => {
    var this_newsfeed = {};
    let _cur_id = 0;

    this_newsfeed.LoadNewsfeed = () => {
        $('#txt_titles').val('');
        $('#txt_Author').val('');
        $('#txt_description').val('');
        $('#date_published').val('');
        axios({
          method: 'get',
          url: 'NewsFeed',
        })
          .then(function (response) {
            data = response.data.data;
            //console.log(data);
            $('#tbl_newsfeed').DataTable().destroy();
            $('#tbody_tbl_newsfeed').empty();
            let tbody = '';
            let deletebtn = '';
            let newdate = '';
            let dateformat = '';
            let substxt = '';
            data.forEach(value => {
              substxt = '';
              if($('#session_position').text() == '(Admin)'){
                deletebtn = `<button class="btn btn-danger btn-md" onclick="NEWSFEED.show_delete_newsfeed(${value.id});"> <span class="fa fa-trash"></span> </button>` 
              }
              dateformat = value.DatePublish.split("-") //year/month/day
              substxt =  value.ShortDetails.substring(0,50) 
              tbody +=
                `<tr class="text-center">
                    <td> ${value.id} </td>
                    <td> ${value.Title}</td>
                    <td> ${substxt+'.....'}</td>
                    <td> ${dateformat[2]+'/'+dateformat[1]+'/'+dateformat[0]} </td>
                    <td> ${value.Author} </td>
                    <td> 
                    <button class="btn btn-primary btn-md" onclick="NEWSFEED.show_edit_newsfeed(${value.id})"> <span class="fa fa-pencil-alt"></span> </button> 
                    ${deletebtn}
                    </td>
                    </tr>`;
            });
            $('#tbody_tbl_newsfeed').html(tbody);
            $('#tbl_newsfeed').DataTable({
              "paging": false,
              "ordering": false,
            });
            toastr[`${response.data.status}`](`${response.data.message}`)
          })
          .catch(function (error) {
            console.log(error);
          });
      },
      $('#form-newsfeed').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
         axios({
          method: 'POST',
          url: 'NewsFeed',
          enctype: 'multipart/form-data',
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          data: formData,
        })
        .then(function (response) {
         // console.log(response);
          NEWSFEED.LoadNewsfeed();
         toastr[`${response.data.status}`](`${response.data.message}`)
    
        })
        .catch(function (error) {
          console.log(error);
        });
    
      });
    
      this_newsfeed.show_edit_newsfeed = (id) => {
      
          $("#modal_title").html('<h4 class="modal-title" id="modal_title">  <span class="fas fa-newspaper"> Update : NewsFeed Detail</h4>');
        let dateformat ='';
          axios({
            method: 'get',
            url: 'NewsFeed/' + id,
          })
            .then(function (response) {
              data = response.data.data;
                console.log(data);
                dateformat = data.DatePublish.split("-") //year/month/day
                $('#txt_titles_modal').val(data.Title);
                $('#txt_Author_modal').val(data.Author);
                $('#txt_description_modal').val(data.ShortDetails);
                $('#date_published_modal').val(dateformat[1]+'/'+dateformat[2]+'/'+dateformat[0]);
      
            })
            .catch(function (error) {
              console.log(error);
            });
           
          $('#newsfeed_modal').modal('show');
          _cur_id =id;
         
      },

      $('#form-newsfeed_modal').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
       // alert(_cur_id);
         axios({
          method: 'POST',
          url: 'newsfeed-update/'+_cur_id,
          enctype: 'multipart/form-data',
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          data: formData,
        })
        .then(function (response) {
         // console.log(response);
          NEWSFEED.LoadNewsfeed();
         toastr[`${response.data.status}`](`${response.data.message}`)
    
        })
        .catch(function (error) {
          console.log(error);
        });
        $('#newsfeed_modal').modal('hide');
      });
    
      this_newsfeed.show_delete_newsfeed = (id) => {
        $('#delete_newsfeed_modal').modal('show');
        _cur_id = id;
      },

      this_newsfeed.delete_newsfeed = () => {

        axios({
          method: 'delete',
          url: 'NewsFeed/' + _cur_id,
        })
          .then(function (response) {
            console.log(response);
            toastr[`${response.data.status}`](`${response.data.message}`)
            $("#delete_newsfeed_modal").modal('hide');
            NEWSFEED.LoadNewsfeed();
          })
          .catch(function (error) {
            console.log(error);
          });
    
      }

    return this_newsfeed;
})();


$('#date_published,#date_published_modal').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'), 10)
});
// $('#date_published_modal').daterangepicker({
//     singleDatePicker: true,
//     showDropdowns: true,
//     minYear: 1901,
//     maxYear: parseInt(moment().format('YYYY'), 10)
// });


