<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<style>body{padding-top: 60px;}</style>

    <link href="/css/bootstrap.min.css" rel="stylesheet" />

	<link href="/css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/js/login-register.js" type="text/javascript"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <!-- <div class="col-sm-4">
                 <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a>
                 <a class="btn big-register" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Register</a>
            </div> -->
            <div class="col-sm-4"></div>
        </div>


		 <div class="modal fade login" id="loginModal"  style="background: url(/img/bg.jpg) no-repeat center center fixed;background-size: cover">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                <!-- <div class="social">
                                    <a class="circle github" href="/auth/github">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="/auth/google_oauth2">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>
                                </div> -->
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="post" action="/login" accept-charset="UTF-8">
                                      {{ csrf_field() }}
                                      <input id="email" class="form-control" type="text" placeholder="Username" name="username">
                                      <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                      <input class="btn btn-default btn-login" type="submit" value="Login">
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                                  {{ csrf_field() }}
                                  <input id="email" class="form-control" type="text" placeholder="Username" name="username">
                                  <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                  <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                  <input id="password_confirmation" class="form-control" type="password" placeholder="Ulangi Password" name="password_confirmation">
                                  <input class="btn btn-default btn-register" type="submit" value="Buat Akun" name="commit">
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Buat
                                 <a href="javascript: showRegisterForm();">akun baru</a>
                            </span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Sudah terdaftar?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
    		      </div>
		      </div>
		  </div>
    </div>
    <script>
        $(document).ready(function(){
            openLoginModal();
            $("#loginModal").modal({
                backdrop:'static',
                keyboard:false
            });
        });
    </script>
</body>
</html>
