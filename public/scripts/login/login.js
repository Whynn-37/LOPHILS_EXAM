$(document).ready(function(){

});

const LOGIN = (() => {
    var this_login = {};

    this_login.sign_up = () => {
        
        var employee_id = $("#txt_employee_no").val();
        var password  = $("#txt_password").val();

        axios({
            method: 'post',
            url: 'sign-in',
            data: {
                employee_number : employee_id,
                password : password,
            }
        })
        .then(function (response){
            console.log(response)
            if(response.data.status == 'success'){
                toastr[`success`](`Successfully Login. Redirecting to Dashboard`)
               window.location.href = `${_APP_URL}/dashboard`
            }
            else
            {
                toastr[`${response.data.status}`](`${response.data.message}`)
            }
        })
    };

    this_login.guest_login = () => {
        axios({
            method: 'get',
            url: 'api/test',
        })
        .then(function (response){
            console.log(response)
        })
    };

    return this_login;

})();

