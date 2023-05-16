<?php require_once $config['PARSERS_PATH'] . 'modal' . DS . 'header.php'; ?>

<div class="row">
    <div class="col text-center mb-3">
        <img class="img text-center" src="<?= PROJECT_LOGO_SMALL ?>" alt="<?= PROJECT_TITLE ?> Logo" width="150px" height="150px">
    </div>

    <div class="text-center text-secondary mb-1">
        <p>Welcome to the admin support!</p>
    </div>

    <div class="col-12 bg-light border-radius-xl p-3">
        <form class="" id="loginForm" style="border-radius: 7px;">
            <div id="login_message" class="message"></div>

            <div class="form-row align-items-center">
                <div class="col-12">
                    <div class="input-group mb-2">
                        <span class="input-group-text text-warning"><i class="fa fa-user"></i></span>
                        <input type="username" autocomplete="username" class="form-control shadow-none" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>
            </div>

            <div class="form-row align-items-center">
                <div class="col-12">
                    <div class="input-group mb-2">
                        <span class="input-group-text text-warning"><i class="fas fa-unlock-alt"></i></span>
                        <input type="password" autocomplete="password" class="form-control shadow-none" id="password" name="password" required>
                    </div>
                </div>
            </div>

            <button id="submitForm" type="button" class="btn btn-secondary btn-sm col-12" style="border-radius: 12px; font-weight: bolder;" onclick="postCheck('login_message', {'login_username': $('#username').val(), 'login_password': $('#password').val()});">Submit</button>

            <!-- <div class="row text-center">
                <div class="col-12 p-3">
                    <h6 class="text-secondary"> Or you can signin using:</h6>
                </div>

                <div class="col-12">
                    <a type="button" id="social_login" class="col-12 btn btn-info btn-sm" style="border-radius: 12px; font-weight: bolder;"> <i class="fab fa-twitter me-2"></i> Twitter </a>
                </div>
            </div> -->
            <input type="hidden" name="twitter">

            <br><br>
        </form>
    </div>
</div>

<?php require_once $config['PARSERS_PATH'] . 'modal' . DS . 'footer.php' ?>

<script>
    $('#social_login').on('click', function() {

        var href_data = $(this).prop('href');
        var data = $('#loginForm').serialize()
        data = data + '&form_type=twitter_signin';

        postCheck('login_message', data, 0, true);

    });
</script>