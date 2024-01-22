<?php
// Veritabanı bağlantısı için gerekli bilgileri burada ayarlayın
// Veritabanı bağlantısı için gerekli bilgileri burada ayarlayın
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "papirus";


// Arama formundan gelen kelimeyi al
$kelime = $_POST['kelime'];

// Veri tabanına bağlan
$conn = new mysqli('localhost', 'root', '', 'papirus');

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}



// Veritabanından ürünler tablosunda arama yap
$ürünler_query = "SELECT * FROM ürünler WHERE ad LIKE '%$kelime%'";
$ürünler_result = $conn->query($ürünler_query);

// Veritabanından kitaplar tablosunda arama yap
$kitaplar_query = "SELECT * FROM kitaplar WHERE ad LIKE '%$kelime%'";
$kitaplar_result = $conn->query($kitaplar_query);

// Veritabanından oyuncaklar tablosunda arama yap
$oyuncaklar_query = "SELECT * FROM oyuncaklar WHERE ad LIKE '%$kelime%'";
$oyuncaklar_result = $conn->query($oyuncaklar_query);


// Sonuçları görüntüle
?>

<!DOCTYPE html>
<html>
<head>
    <title>Arama Sonuçları</title>
    <style>
        .result {
            margin-bottom: 10px;
        }
    </style>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/pen.ico" rel="icon"/>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- Libraries Stylesheet -->
      <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
     <!-- Topbar Start -->
     <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Hesabım</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="giris.php"> <button class="dropdown-item" type="button">Giriş Yap</button></a>
                            <a href="kayıt.php"><button class="dropdown-item" type="button">Kayıt Ol</button></a>
                        </div>
                    </div>
                 
                    
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="profil.php" class="btn px-0 ml-2">
                        <i class="fas fa-user text-dark"></i>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Papirus</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
    <form action="arama.php" method="post">
        <div class="input-group">
            <input type="text" class="form-control" name="kelime" placeholder="Ürün, marka veya kategori arayın">
            <div class="input-group-append">
                <span class="input-group-text bg-transparent text-primary">
                   <button class="fa fa-search"></button>
                </span>
            </div>
        </div>
        </form>
        </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">İletişim No:</p>
                <h5 class="m-0">+90 536 241 05 70</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Kategoriler</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100"> 
                        <a href="index.php" class="nav-item nav-link active">Ana Sayfa</a>
                        <a href="kirtasiye.php" class="nav-item nav-link">Kırtasiye</a>
                        <a href="oyuncak.php" class="nav-item nav-link">Oyuncak</a>
                        <a href="kitap.php" class="nav-item nav-link">Kitap</a>
                        <a href="contact.php" class="nav-item nav-link">İletişim</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-primary bg-dark px-2">Papirus</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Ana Sayfa</a>
                            <a href="kirtasiye.php" class="nav-item nav-link">Kırtasiye</a>
                            <a href="oyuncak.php" class="nav-item nav-link">Oyuncak</a>
                            <a href="kitap.php" class="nav-item nav-link">Kitap</a>
                            <a href="contact.php" class="nav-item nav-link">İletişim</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="profil.php" class="btn px-0">
                            <i class="fas fa-user text-primary"></i>
                            </a>
                            <a href="sepet.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle cart-count" style="padding-bottom: 2px;">0</span>
                            </a> 
                            <!-- <a href="sepet.php">
                              <span class="glyphicon glyphicon-shopping-cart cart-icon"></span>
                                <span class="badge cart-count">10</span>
                            </a> -->
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <style>
    .card {
        height: 100%;
    }
</style>

<h1 align="center">Arama Sonuçları</h1>
<br><br>

<?php if ($ürünler_result->num_rows > 0) { ?>
    <br><h2>Kırtasiye ürünlerinde bulunan sonuçlar:</h2>
    <div class="container">
        <div class="row">
            <?php $counter = 0; ?>
        <?php while ($row = $ürünler_result->fetch_assoc()) { ?>
            <?php if ($counter % 4 === 0) { ?>
                    </div>
                    <div class="row">
                <?php } ?>
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="./admin/resimler/<?php echo $row['resim']; ?>" alt="<?php echo $row['ad']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['ad']; ?></h5>
                        <p class="card-text"><?php echo $row['bilgi']; ?></p>
                        <p class="card-text"><?php echo $row['fiyat']; ?>₺</p>
                        <button ürün-id="<?php echo $row['id']; ?>" class="btn btn-primary addToCartBtn">Sepete ekle</button>
                    </div>
                </div>
            </div>
            <?php $counter++; ?>

            <?php } ?>
    </div>
</div>
<?php } ?>

<?php if ($kitaplar_result->num_rows > 0) { ?>
    <br><h2>Kitaplarda bulunan sonuçlar:</h2>
    <div class="container">
        <div class="row">
            <?php $counter = 0; ?>
            <?php while ($row = $kitaplar_result->fetch_assoc()) { ?>
                <?php if ($counter % 4 === 0) { ?>
                    </div>
                    <div class="row">
                <?php } ?>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="./admin/kitaplar/<?php echo $row['resim']; ?>" alt="<?php echo $row['ad']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['ad']; ?></h5>
                            <p class="card-text"><?php echo $row['bilgi']; ?></p>
                            <p class="card-text"><?php echo $row['fiyat']; ?>₺</p>
                            <button ürün-id="<?php echo $row['id']; ?>" class="btn btn-primary addToCartBtn">Sepete ekle</button>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php } ?>
        </div>
    </div>

    <?php } ?>

    <?php if ($oyuncaklar_result->num_rows > 0) { ?>
        <br><h2>Oyuncaklarda bulunan sonuçlar:</h2>
    <div class="container">
        <div class="row">
            <?php $counter = 0; ?>
            <?php while ($row = $oyuncaklar_result->fetch_assoc()) { ?>
                <?php if ($counter % 4 === 0) { ?>
                    </div>
                    <div class="row">
                <?php } ?>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="./admin/oyuncaklar/<?php echo $row['resim']; ?>" alt="<?php echo $row['ad']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['ad']; ?></h5>
                            <p class="card-text"><?php echo $row['bilgi']; ?></p>
                            <p class="card-text"><?php echo $row['fiyat']; ?>₺</p>
                            <button ürün-id="<?php echo $row['id']; ?>" class="btn btn-primary addToCartBtn">Sepete ekle</button>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php } ?>
        </div>
    </div>
<br>
<?php } ?>
<br>
<br>
<br>
<br>

<?php if ($oyuncaklar_result->num_rows == 0 && $kitaplar_result->num_rows == 0 && $ürünler_result->num_rows == 0) { ?>
    <h2 align="center">Aradığınız kategoride hiçbir ürün bulunamadı :(</h2>
<?php } ?>





</div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">İletişimde Kalalım</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Akdeniz, Fatih Cd., 33340 Mezitli/Mersin</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>papirus0a@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+90 536 241 05 70</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                   
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Hızlı rişim</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Ana Sayfa</a>
                            <a class="text-secondary mb-2" href="contact.php"><i class="fa fa-angle-right mr-2"></i>İletişim</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                     
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Bizi Takip Edin</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <!-- Footer End -->
</body>
</html>


<?php
// Veritabanı bağlantısını kapat
$conn->close();
?>
