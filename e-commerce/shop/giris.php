<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Giriş Sayfası</title>
    <link rel="stylesheet" href="./css/loginstyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="./img/pen.ico"/>

</head>
<body>
    <div class=" login-card-container">
     <div class="login-card">
        <div class="login-card-logo">
         <img src="./img/pen.ico" alt="logo">
        </div>
        <div class="login-card-header">
            <h1>Giriş yap</h1>
            <div>Lütfen giriş yapın</div>
        </div>
        <form class="login-card-form" method="post" action="giris.php">
        <?php include('errors.php'); ?>
            <div class="form-item">
            <span class="form-item-icon material-symbols-rounded">mail</span>
           <input type="text" name="username" placeholder="Mailinizi giriniz" required autofocus>
            </div>
            <div class="form-item">
                <span class="form-item-icon material-symbols-rounded">lock</span>
            <input type="password" name="password" placeholder="Şifrenizi giriniz" required>
            </div>
            <div class="form-item-other">
                <div class="checkbox">
                    <input type="checkbox" id="rememberMeCheckbox">
                    <label for="rememberMeCheckbox">Beni hatırla</label>
                </div>
                <a href="contact.php">Şifremi unuttum</a>
            </div>
            <button type="submit"  name="login_user"> Giriş yap</button>
        </form>
        <div class="login-caard-footer">
        Henüz hesabınız yok mu? <a href="kayıt.php"> Hemen kayıt ol</a>
        </div>
     </div>
     <div class="login-card-social">
        <div>Bizi takip edebileceğiniz diğer kaynaklar</div>
        <div class="login-card-social-btn">
            <a href="https://www.facebook.com/papirus1963/?locale=tr_TR" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                 </svg>
                 <a href="https://www.instagram.com/papiruskitapkirtasiye/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                        <path d="M16.5 7.5l0 .01"></path>
                     </svg>
                 </a>
            </a>
        </div>
     </div>
    </div>
</body>
</html>