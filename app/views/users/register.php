<?php
require APP_ROOT . '/views/inc/head.php';
?>

<body>
    <?php
    require APP_ROOT . '/views/inc/header.php';
    ?>
    <?php
    require APP_ROOT . '/views/inc/nav.php';
    ?>

    <main class="users-register">
        <div class="container-login">
            <div class="wrapper-login">

                <div class="login-reg-panel">
                    <div class="login-info-box">
                        <h2>Vous avez déjà un compte ?</h2>
                        <label id="label-register" for="log-reg-show">Login</label>
                        <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
                    </div>

                    <div class="register-info-box">
                        <h2>Vous n'avez pas de compte?</h2>
                        <label id="label-login" for="log-login-show">Register</label>
                        <input type="radio" name="active-log-panel" id="log-login-show">
                    </div>

                    <div class="white-panel">
                        <form
                                id="register-form"
                                method="POST"
                                action="<?php echo URL_ROOT; ?>/users/register"
                        >
                            <div class="login-show">
                                <h2>LOGIN</h2>
                                <input type="text" placeholder="Email">
                                <input type="password" placeholder="Password">
                                <input type="button" value="Login">
                                <a href="">Forgot password?</a>
                            </div>
                        </form>
                        <form
                                id="register-form"
                                method="POST"
                                action="<?php echo URL_ROOT; ?>/users/register"
                                enctype="multipart/form-data"
                        >
                            <div class="register-show">
                                <h2>REGISTER</h2>

                                <input type="text" placeholder="Nom *" name="lastname">
                                <span class="invalidFeedback">
                                    <?php echo $data['lastnameError']; ?>
                                </span>

                                <input type="text" placeholder="¨Prénom *" name="firstname">
                                <span class="invalidFeedback">
                                    <?php echo $data['firstnameError']; ?>
                                </span>

                                <input type="email" placeholder="Email *" name="email">
                                <span class="invalidFeedback">
                                    <?php echo $data['emailError']; ?>
                                </span>

                                <input type="file" name="avatar" id="avatar">

                                <input type="password" placeholder="Password *" name="password">
                                <span class="invalidFeedback">
                                    <?php echo $data['passwordError']; ?>
                                </span>

                                <input type="password" placeholder="Confirm Password *" name="confirmPassword">
                                <span class="invalidFeedback">
                                    <?php echo $data['confirmPasswordError']; ?>
                                </span>

                                <input type="text" placeholder="Bio" name="bio">

                                <input type="text" placeholder="Hobbies" name="hobbies">

                                <h2>Vous êtes journaliste ?</h2>

                                <input type="text" placeholder="Indiquez le nom de votre journal" name="newspaperName">

                                <button id="submit" type="submit" value="submit" value="Register">
                            </div>
                        </form>
                    </div>
                </div>

                <!--<form
                        id="register-form"
                        method="POST"
                        action="<?php echo URL_ROOT; ?>/users/register"
                >
                    <input type="text" placeholder="Nom *" name="lastname">
                    <span class="invalidFeedback">
                    <?php echo $data['lastnameError']; ?>
                </span>

                    <input type="text" placeholder="¨Prénom *" name="firstname">
                    <span class="invalidFeedback">
                    <?php echo $data['firstnameError']; ?>
                </span>

                    <input type="text" placeholder="Séléctionner une image de profile *" name="name">
                    <span class="invalidFeedback">
                    <?php echo $data['usernameError']; ?>
                </span>

                    <input type="text" placeholder="Nom *" name="name">
                    <span class="invalidFeedback">
                    <?php echo $data['usernameError']; ?>
                </span>

                    <input type="email" placeholder="Email *" name="email">
                    <span class="invalidFeedback">
                    <?php echo $data['emailError']; ?>
                </span>

                    <input type="password" placeholder="Password *" name="password">
                    <span class="invalidFeedback">
                    <?php echo $data['passwordError']; ?>
                </span>

                    <input type="password" placeholder="Confirm Password *" name="confirmPassword">
                    <span class="invalidFeedback">
                    <?php echo $data['confirmPasswordError']; ?>
                </span>

                    <button id="submit" type="submit" value="submit">Submit</button>

                    <p class="options">Not registered yet? <a href="<?php echo URL_ROOT; ?>/users/register">Create an account!</a></p>
                </form>-->
            </div>
        </div>

        <script>

            $(document).ready(function(){
                $('.login-info-box').fadeOut();
                $('.login-show').addClass('show-log-panel');
            });


            $('.login-reg-panel input[type="radio"]').on('change', function() {
                if($('#log-login-show').is(':checked')) {
                    $('.register-info-box').fadeOut();
                    $('.login-info-box').fadeIn();

                    $('.white-panel').addClass('right-log');
                    $('.register-show').addClass('show-log-panel');
                    $('.login-show').removeClass('show-log-panel');

                }
                else if($('#log-reg-show').is(':checked')) {
                    $('.register-info-box').fadeIn();
                    $('.login-info-box').fadeOut();

                    $('.white-panel').removeClass('right-log');

                    $('.login-show').addClass('show-log-panel');
                    $('.register-show').removeClass('show-log-panel');
                }
            });
        </script>

    </main>

</body>