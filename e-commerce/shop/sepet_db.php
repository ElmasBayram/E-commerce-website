<?php
include "baglanti.php";
$db = new PDO("mysql:host=localhost;dbname=papirus", "root", "");
session_start();
//settype($ürün_id,"integer");


function getCart(){
    echo $_SESSION["shoppingCart"]["summary"]["total_count"];
}

function addToCart($ürün_item) {
   if(isset($_SESSION["shoppingCart"])) {
       $shoppingCart = $_SESSION["shoppingCart"];
      if (isset($shoppingCart["ürünlistesi"])){
        $ürünlistesi = $shoppingCart["ürünlistesi"];
      }else{
        $ürünlistesi = array();
      }
   } else {
       $ürünlistesi = array();
   }

   $ürün_item->count = 1;

   //adet kontrolü
   if(array_key_exists($ürün_item->id,$ürünlistesi)){
   $ürünlistesi[$ürün_item->id]->count++;
   }else{
   // Ekleme işlemi yapılıyor
   $ürünlistesi[$ürün_item->id] = $ürün_item;
   }

   //sepetin hesaplanması
   $total_price=0.0;
   $total_count=0;
   foreach($ürünlistesi as $ürün){
    $ürün->total_price=$ürün->count*$ürün->fiyat;
    $total_price= $total_price+$ürün->total_price;
    $total_count+=$ürün->count;

}
$summary["total_price"]=$total_price;
$summary["total_count"]=$total_count;


   // Birden fazla ürün
   $_SESSION["shoppingCart"]["ürünlistesi"]=$ürünlistesi;
   $_SESSION["shoppingCart"]["summary"]=$summary;

   return $total_count;
}

 function removeFromCart($ürün_id){
   if(isset($_SESSION["shoppingCart"])) {
      $shoppingCart = $_SESSION["shoppingCart"];
      $ürünlistesi = $shoppingCart["ürünlistesi"];
      
      //ürünü listeden çıkar
      if(array_key_exists($ürün_id,$ürünlistesi)){
        unset($ürünlistesi[$ürün_id]);
      }
  
       //sepetin tekrar hesaplanması
     $total_price=0.0;
     $total_count=0;
     foreach($ürünlistesi as $ürün){
      $ürün->total_price=$ürün->count*$ürün->fiyat;
      $total_price= $total_price+$ürün->total_price;
      $total_count+=$ürün->count;

    }
    $summary["total_price"]=$total_price;
     $summary["total_count"]=$total_count;


   // Birden fazla ürün
   $_SESSION["shoppingCart"]["ürünlistesi"]=$ürünlistesi;
   $_SESSION["shoppingCart"]["summary"]=$summary;
      
   return true;   
  }
 }
function incCount($ürün_id){
   if(isset($_SESSION["shoppingCart"])) {
      $shoppingCart = $_SESSION["shoppingCart"];
      $ürünlistesi = $shoppingCart["ürünlistesi"];
      
      // Ürünün sayısını arttır
      if(array_key_exists($ürün_id, $ürünlistesi)) {
        $ürünlistesi[$ürün_id]->count++;
    }
         
      // Sepeti güncelle
      $total_price=0.0;
      $total_count=0;
      foreach($ürünlistesi as $ürün){
       $ürün->total_price=$ürün->count*$ürün->fiyat;
       $total_price= $total_price+$ürün->total_price;
       $total_count+=$ürün->count;
   
   }
   $summary["total_price"]=$total_price;
   $summary["total_count"]=$total_count;
   
   
      // Birden fazla ürün
      $_SESSION["shoppingCart"]["ürünlistesi"]=$ürünlistesi;
      $_SESSION["shoppingCart"]["summary"]=$summary;
         
      return true;
        
     }
}
function decCount($ürün_id){
   if(isset($_SESSION["shoppingCart"])) {
      $shoppingCart = $_SESSION["shoppingCart"];
      $ürünlistesi = $shoppingCart["ürünlistesi"];
      
      
      // Eğer ürün sayısı 1'den büyükse sayısını azalt
      if($ürünlistesi[$ürün_id]->count > 1) {
          $ürünlistesi[$ürün_id]->count--;
      } else {
          // Eğer ürün sayısı 1 ise, ürünü sepetten sil
          unset($ürünlistesi[$ürün_id]);
      }
      
      // Sepeti güncelle
      $total_price=0.0;
      $total_count=0;
      foreach($ürünlistesi as $ürün){
       $ürün->total_price=$ürün->count*$ürün->fiyat;
       $total_price= $total_price+$ürün->total_price;
       $total_count+=$ürün->count;
   
   }
   $summary["total_price"]=$total_price;
   $summary["total_count"]=$total_count;
   
   
      // Birden fazla ürün
      $_SESSION["shoppingCart"]["ürünlistesi"]=$ürünlistesi;
      $_SESSION["shoppingCart"]["summary"]=$summary;
         
      return true;
        
     }
    
}
if (isset($_POST["p"])) {
    $islem = $_POST["p"];
    if ($islem == "addToCart") {
        $ürün_id = $_POST["ürün_id"];
        $ürün = $db->query("SELECT * FROM ürünler WHERE id={$ürün_id}", PDO::FETCH_OBJ)->fetch();
        //$ürün->count=1;

        echo addToCart($ürün);

        // removeFromCart işlemi
    }else if ($islem == "removeFromCart") {
        $id=$_POST["ürün_id"];
        echo removeFromCart($id);
       
        //sepet sayısı
    }else if($islem == "getCart"){
        echo getCart();
    }
}
 
if (isset($_GET["p"])) {
    $islem = $_GET["p"];
    if ($islem == "incCount") {
        $id = $_GET["ürün_id"];
       if(incCount($id)){
        header("Location:sepet.php");
        }
      
    }else if ($islem == "decCount") {
        $id=$_GET["ürün_id"];
        if(decCount($id)){
            header("Location:sepet.php");
            }
    }
}
?>