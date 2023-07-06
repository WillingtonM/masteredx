<div class="container pt-10 min-vh-100">
    <div class="container pt-7 min-vh-100">
    
        <div class="row">
    
            <div class="col-12 col-sm-2 col-md-3"></div>
            <div class="col-12 col-sm-8 col-md-6">
                <div class="row card_work/ bg-white border-radius-xl shadow" style="border-radius: 35px;">
    
                    <div class="col-12 text-center">
                        <br>
                        <img class="img text-center" src="<?= PROJECT_LOGO ?>" alt="<?= PROJECT_TITLE ?> Logo" width="150px" height="150px">
                    </div>
                    <div class="col-12 text-center text-dark mt-4">
                        <p class="">
                            <span class="alt_dflt" style="font-size: 2.5em;"> <?= ucfirst(PROJECT_TITLE) ?> </span>
                        </p>
                    </div>
                    <hr class="horizontal dark mt-1 mb-3">
                    
                    <form class="col-12" id="loginFormMain" action="login" method="get" style="border-radius: 7px;">
                        <?php if ($data['error'] == true) : ?>
                            <div id="login_message" class="message alert alert-danger">
                                <h6><?= $data['message'] ?></h6>
                            </div>
                        <?php endif; ?>
                        <div class="form-row align-items-center">
                            <div class="col-12">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-warning"><i class="fa fa-user input_color"></i></span>
                                    <input type="username" autocomplete="username" class="form-control shadow-none" id="username_login" name="username" placeholder="Username" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <div class="col-12">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-warning"><i class="fa fa-unlock-alt input_color"></i></span>
                                    <input type="password" autocomplete="password" class="form-control shadow-none" id="password_login" name="password" required>
                                </div>
                            </div>
                        </div>
    
                        <div id="login_err" class="message"></div>
    
                        <button id="submitFormMain" type="button" class="btn btn-secondary btn-sm col-12" style="border-radius: 12px; font-weight: bolder;" onclick="postCheck('login_err', {'login_username': $('#username_login').val(), 'login_password': $('#password_login').val()});"> Login </button>
                        <p class="text-center mt-3">
                            <a href="home" class="text-dark font-weight-bolder">Go to gome page</a>
                        </p>
                    </form>
    
                </div>
    
            </div>
            <div class="col-12 col-sm-2 col-md-3"></div>
        </div>
    </div>
</div>
