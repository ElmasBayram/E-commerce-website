<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Yeni Kayıt Sayfası</title>
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
            <h1>Kayıt Ol</h1>
        </div>
        <form method="post" action="kayıt.php">
  	    <?php include('errors.php'); ?>
        <div class="input-group">
  	  <label>Kullanıcı adı</label>
  	  <input type="text" name="username">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>Şifre</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Şifreyi tekrar giriniz</label>
  	  <input type="password" name="password_2">
  	</div>
      <br>
            <button type="submit" name="reg_user">Kayıt Ol</button>
        </form>
      
        <div class="login-caard-footer">
        Zaten bir hesabınız var mı? <a href="giris.php"> Hemen giriş yap</a>
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