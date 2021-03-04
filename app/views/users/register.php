<?php
require APP_ROOT . '/views/inc/head.php';
?>

<div class="navbar">
    <?php
    require APP_ROOT . '/views/inc/nav.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Register</h2>

        <form
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
        </form>
    </div>
</div>
