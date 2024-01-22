<?php
include("baglanti.php");

if (isset($_POST["adi"]) && isset($_POST["aciklama"]) && isset($_POST["fiyat"]) && isset($_FILES["foto"])) {
    $dir = 'resimler/';
    
    if (is_dir($dir)) {
        if (chmod($dir, 0755)) {
            echo "Dosya izinleri başarıyla ayarlandı.";
        } else {
            echo "Dosya izinleri ayarlanamadı.";
        }
    } else {
        echo "Belirtilen dizin mevcut değil.";
    }
    $adi = mysqli_real_escape_string($conn, $_POST["adi"]);
    $aciklama = mysqli_real_escape_string($conn, $_POST["aciklama"]);
    $fiyat = floatval($_POST["fiyat"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"],"resimler/" . $_FILES["foto"]["name"]);			
    $dosya=$_FILES["foto"]["name"];
    $sql = "INSERT INTO ürünler (ad, bilgi, fiyat, resim) VALUES ('$adi','$aciklama',$fiyat,'$dosya')";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

} else if (isset($_POST["kadi"]) && isset($_POST["kaciklama"]) && isset($_POST["kfiyat"]) && isset($_FILES["kfoto"])) {
    $dir = 'kitaplar/';
        
        if (is_dir($dir)) {
            if (chmod($dir, 0755)) {
                echo "Dosya izinleri başarıyla ayarlandı.";
            } else {
                echo "Dosya izinleri ayarlanamadı.";
            }
        } else {
            echo "Belirtilen dizin mevcut değil.";
        }
        $kadi = mysqli_real_escape_string($conn, $_POST["kadi"]);
        $kaciklama = mysqli_real_escape_string($conn, $_POST["kaciklama"]);
        $kfiyat = floatval($_POST["kfiyat"]);
        move_uploaded_file($_FILES["kfoto"]["tmp_name"],"kitaplar/" . $_FILES["kfoto"]["name"]);			
        $kdosya=$_FILES["kfoto"]["name"];
        $sql = "INSERT INTO kitaplar (ad, bilgi, fiyat, resim) VALUES ('$kadi','$kaciklama',$kfiyat,'$kdosya')";
        if (mysqli_query($conn, $sql)) {
              echo "New record created successfully";
        } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);

} else if (isset($_POST["oadi"]) && isset($_POST["oaciklama"]) && isset($_POST["ofiyat"]) && isset($_FILES["ofoto"])) {
    $dir = 'oyuncaklar/';
        
        if (is_dir($dir)) {
            if (chmod($dir, 0755)) {
                echo "Dosya izinleri başarıyla ayarlandı.";
            } else {
                echo "Dosya izinleri ayarlanamadı.";
            }
        } else {
            echo "Belirtilen dizin mevcut değil.";
        }
        $oadi = mysqli_real_escape_string($conn, $_POST["oadi"]);
        $oaciklama = mysqli_real_escape_string($conn, $_POST["oaciklama"]);
        $ofiyat = floatval($_POST["ofiyat"]);
        move_uploaded_file($_FILES["ofoto"]["tmp_name"],"oyuncaklar/" . $_FILES["ofoto"]["name"]);			
        $odosya=$_FILES["ofoto"]["name"];
        $sql = "INSERT INTO oyuncaklar (ad, bilgi, fiyat, resim) VALUES ('$oadi','$oaciklama',$ofiyat,'$odosya')";
        if (mysqli_query($conn, $sql)) {
              echo "New record created successfully";
        } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    
    }else if (isset($_POST["isim"]) && isset($_POST["mail"]) && isset($_POST["sifre"])) {
    $isim = mysqli_real_escape_string($conn, $_POST["isim"]);
    $mail = mysqli_real_escape_string($conn, $_POST["mail"]);
    $sifre = mysqli_real_escape_string($conn, $_POST["sifre"]);
    
    // Doğrulama kontrollerini yap
    $hatalar = array();
    
    if (empty($isim)) {
        $hatalar[] = "İsim alanı boş olamaz.";
    }
    
    if (empty($mail)) {
        $hatalar[] = "Mail alanı boş olamaz.";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $hatalar[] = "Geçersiz bir mail adresi girdiniz.";
    }
    
    if (empty($sifre)) {
        $hatalar[] = "Şifre alanı boş olamaz.";
    }
    
    // Hata kontrolü
    if (count($hatalar) > 0) {
        foreach ($hatalar as $hata) {
            echo $hata . "<br>";
        }
    } else {
        // Veritabanına ekleme işlemi
        $sql = "INSERT INTO kullanicilar (username, email, password) VALUES ('$isim', '$mail', '$sifre')";
        //hashlenmiş şifre için;
        //$hashedSifre = password_hash($sifre, PASSWORD_DEFAULT);
        //$sql = "INSERT INTO kullanicilar (username, email, password) VALUES ('$isim', '$mail', '$hashedSifre')";

        
        if (mysqli_query($conn, $sql)) {
            echo "Yeni kayıt başarıyla oluşturuldu.";
        } else {
            echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
    }

}else {
    echo "Form verileri eksik veya hatalı!";
}

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Papirus Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/pen.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Admin Paneli</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Ahmet Bayram</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Ana Sayfa</a>
                    <a href="form.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Ürün Formu</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Kullanıcı Tablosu</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Diğer</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="404.html" class="dropdown-item">404 Error</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Ahmet Bayram</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Kullanıcı Ekle</h6>
                            <form method="POST">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="exampleInputname1" class="form-label">İsim</label>
                                        <input type="Name" class="form-control" name="isim">
                                    </div>

                                    <label for="exampleInputEmail1" class="form-label">Mail</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="mail">
                                </div>   
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Şifre</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="sifre">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </form>
                        </div>
                    </div>


                    <div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Kitap ekle</h6>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="kadi" id="floatingInput" required>
                <label for="floatingInput">Ürün Adı</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="kaciklama" id="floatingInput" required>
                <label for="floatingTextarea">Ürün Açıklaması</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="kfiyat" id="floatingInput" required>
                <label for="floatingInput">Fiyat</label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Fotoğraf için:</label>
                <input class="form-control" type="file" id="formFile" name="kfoto" required>
            </div>
           <!-- <div class="mb-3">
                <label for="formFileMultiple" class="form-label" name="foto">Birden Fazla Fotoğraf için:</label>
                <input class="form-control" type="file" id="formFileMultiple" name="fotolar[]" multiple>
            </div>   --> 
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
</div>


<!-- Aşağıdaki bu bölüm  ürünler veritabanına bağlandı -->

                    <div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Kırtasiye ürünü ekle</h6>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="adi" id="floatingInput" required>
                <label for="floatingInput">Ürün Adı</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="aciklama" id="floatingInput" required>
                <label for="floatingTextarea">Ürün Açıklaması</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="fiyat" id="floatingInput" required>
                <label for="floatingInput">Fiyat</label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Fotoğraf için:</label>
                <input class="form-control" type="file" id="formFile" name="foto" required>
            </div>
           <!-- <div class="mb-3">
                <label for="formFileMultiple" class="form-label" name="foto">Birden Fazla Fotoğraf için:</label>
                <input class="form-control" type="file" id="formFileMultiple" name="fotolar[]" multiple>
            </div>   --> 
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
</div>

<div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Oyuncak Ekle</h6>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="oadi" id="floatingInput" required>
                <label for="floatingInput">Ürün Adı</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="oaciklama" id="floatingInput" required>
                <label for="floatingTextarea">Ürün Açıklaması</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="ofiyat" id="floatingInput" required>
                <label for="floatingInput">Fiyat</label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Fotoğraf için:</label>
                <input class="form-control" type="file" id="formFile" name="ofoto" required>
            </div>
           <!-- <div class="mb-3">
                <label for="formFileMultiple" class="form-label" name="foto">Birden Fazla Fotoğraf için:</label>
                <input class="form-control" type="file" id="formFileMultiple" name="fotolar[]" multiple>
            </div>   --> 
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
</div>

               
                    
                    </div>
                  
                    </div>
                  
                </div>
            </div>
            <!-- Form End -->
        </div>
        <!-- Content End -->
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>