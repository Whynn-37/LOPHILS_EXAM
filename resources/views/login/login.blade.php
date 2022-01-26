<!DOCTYPE html>

<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>LTS (Laravel Testing System)</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Cache-control" content="no-cache">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../node_modules/admin-lte/plugins/toastr/toastr.min.css">
        <link rel="shortcut icon" href="{{ asset('icons/logo.png') }}">
<style>
        .vertical-center
        {
            min-height: 100%;
            min-height: 100vh;
            display:flex;
            align-items:center;
        }
        /* .card-about {
        position: relative;
        top: 0;
        transition: top ease 0.5s;
        }
        .card-about:hover {
        top: -10px;
        } */
        /* .position {
            margin: 0em;
        } */
        /* .name {
            margin: 0em;
        }
        .title {
            margin: 0em;
        } */
        .btn-login:hover{
            color: #27B5F5 !important;
            background-color: white !important;
        }

        /* Small devices (landscape phones, 544px and up) */
        @media (min-width: 544px) {  

        }

        /* Medium devices (tablets, 768px and up) 
        The navbar toggle appears at this breakpoint */
        @media (min-width: 768px) {  

        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) { 

        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {  
            
        }


    </style>
	</head>

    <body style="background-image: url(../public/image/log-bg.jpg); background-size:cover; overflow-y:hidden ">
      <div class="loader" style="background-color: #ffffff;opacity: 0.5; filter: alpha(opacity=50);"></div>
        <div class="jumbotron vertical-center" style="background-color:transparent;">
            <center>
                <button class="btn" id="btn_love" style="background-color:transparent">
                    &nbsp;     &nbsp;
                </button>
            </center>
            <br>
            <div class="container shadow-lg p-3 mb-5 bg-white h-100" style="border-radius:40px; background-image: url(../public/image/login_bg.png); background-size:cover;">
                <div class="card border-0" style="background:transparent">
                    <div class="row ">
                        <div class="col-md-4 text-center">
                            <h3 style="color:#388BCD; margin-top: 0.3rem">LARAVEL</h3>
                            <h3 style="color:#388BCD; margin-top: 0.3rem">TESTING SYSTEM</h3>
                            {{-- <img src="../public/image/spm_logo_1.png" style="height:70%; width:100%; margin-top: 1rem; " class="rounded">      --}}
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <br><br>
                                <div class="row">
                                  <div class="col-md-6" style="padding-bottom: 0%; padding-right: 0px; padding-left: 0%">
                                    <!-- {{-- <img src="../public/image/img_warehouse.png" style="height:90%; width:100%; margin-top: 5rem; "> --}} -->
                                  </div>
                                  <div class="col-md-6">
                                    <h3 class="text-white" style="font-size:25px; font-weight:bold;"><u>Sign-In</u></h3><br>             
                                    <input type="text" id="txt_employee_no" class="form-control form-control-lg border-0 text-center" style="background-color:#104977; color:white" placeholder="Enter ID Number" onkeypress="">
                                    <br>
                                    <input type="password" id="txt_password" class="form-control form-control-lg border-0 text-center" style="background-color:#104977; color:white" placeholder="Enter Password" onkeypress="">
                                    <!-- <i><small class="text-white">Use your barcode scanner, touch screen or keyboard.</small><i> -->
                                    <br/> <br/>
                                    <button type="button" class="form-control btn btn-lg btn-login" style="background-color:#27B5F5; color:white;" onclick="LOGIN.sign_up();"><i class="fas fa-qrcode">&nbsp;<label style="font-family:custom-font-label;">Login</label></i></button>
                                    <br/> <br/>
                                    <!-- <button type="button" class="form-control btn btn-lg btn-guest" style="background-color:#7F8389; color:white;" onclick="LOGIN.guest_login();"><i class="fas fa-question-circle">&nbsp;<label style="font-family:custom-font-label;">Guest</label></i></button> -->
                                      <br>
                                      <a href="#" style="color:white">Forgot Password?</a> 

                                      <input type="hidden" id="txt_app_url"  value="{{URL('/')}}">
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

		<!-- jquery latest version -->
		<script src="../node_modules/jquery/dist/jquery.min.js"></script>
		<!-- bootstrap 4 js -->
		<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    	<!-- other scripts -->
		<script src="../node_modules/axios/dist/axios.min.js"></script>
        <script src="../node_modules/admin-lte/plugins/toastr/toastr.min.js"></script>

		<script>
            const _APP_URL = $("#txt_app_url").val();
			// const _TOKEN = $('#csrf-token').attr('content');
	
		</script>
        <script src="{{asset('scripts/login/login.js')}}"></script>
	</body>
</html>
