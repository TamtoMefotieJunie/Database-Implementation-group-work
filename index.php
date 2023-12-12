<!DOCTYPE html>
<?php
use Phppot\Member;

if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $loginResult = $member->loginMember();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="text">
            <img src="images/Capture.PNG" alt="">
            <p>Avec Facebook, partagez et restez en <br>contact avec votre entourage.</p>
        </div> 
        <div class="form-container">
        <div class="form">
        <form name="login" action="" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading">Login</div>
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
                <div class="form-label">
								Username<span class="required error" id="useremail-info"></span>
							</div>
            <input type="text" placeholder="Adresse e-mail ou numero de tel" 
                name="useremail" id="useremail">
                <div class="form-label">
								Password<span class="required error" id="login-password-info"></span>
							</div>
            <input type="password" placeholder="Mot de passe"
                name="login-password" id="login-password">
            <input type="submit"  class="submit"
            type="submit" name="login-btn"
							id="login-btn" value="Login">>
        </form>
        <a href="#" class="link">Mot de passe oublie ?</a>
        <div class="line"></div>
        <a href="register.php" class="new">SIGN IN</a>
        </div>
        <p class="small-text"><b>creer une page</b>pour une celebrite, une marque ou une <br>entreprise.</p>
    </div>
    </div>

    <script>
function loginValidation() {
	var valid = true;
	$("#useremail").removeClass("error-field");
	$("#password").removeClass("error-field");

	var UserName = $("#useremail").val();
	var Password = $('#login-password').val();

	$("#useremail-info").html("").hide();

	if (UserName.trim() == "") {
		$("#useremail-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</body>
</html>