 <?php include 'header.php' ?>

 <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
  <div class="container">
   <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section text-center ftco-animate">
      <span class="subheading">İletisim </span>
      <h2 class="mb-4">İLETİŞİM Formu  <button class="btn btn-dark py-2 px-3 icofont-moon"onclick="myFunction()"></button></h2>
 
   </div>
 </div>
 <div class="row d-flex contact-info mb-5">
  <div class="col-md-6 col-lg-3 d-flex ftco-animate">
   <div class="align-self-stretch box p-4 text-center">
    <div class="icon d-flex align-items-center justify-content-center">
     <span class="icon-map-signs"></span>
   </div>
   <h3 class="mb-4">Adres</h3>
   <p><?php echo $ayarcek['ayar_adres']; ?><br> <?php echo $ayarcek['ayar_ilce']; ?> / <?php echo $ayarcek['ayar_il']; ?></p>
 </div>
</div>
<div class="col-md-6 col-lg-3 d-flex ftco-animate">
 <div class="align-self-stretch box p-4 text-center">
  <div class="icon d-flex align-items-center justify-content-center">
   <span class="icon-phone2"></span>
 </div>
 <h3 class="mb-4">Tel</h3>
 <p><a href="tel://<?php echo $ayarcek['ayar_tel']; ?>"><?php echo $ayarcek['ayar_gsm']; ?></a></p>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex ftco-animate">
 <div class="align-self-stretch box p-4 text-center">
  <div class="icon d-flex align-items-center justify-content-center">
   <span class="icon-paper-plane"></span>
 </div>
 <h3 class="mb-4">Email </h3>
 <p><a href="mailto:mail@example.com"><?php echo $ayarcek['ayar_mail']; ?></a></p>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex ftco-animate">
 <div class="align-self-stretch box p-4 text-center">
  <div class="icon d-flex align-items-center justify-content-center">
   <span class="icon-globe"></span>
 </div>
 <h3 class="mb-4">Çalışma Saatleri</h3>
 <p><a href="#"> <?php echo $ayarcek['ayar_mesai']; ?></a></p>
</div>
</div>
</div>
 <?php


      $iletisimgonder=isset($_GET['iletisimgonder']);

      if ($iletisimgonder=='ok') {

        echo "<div class='alert alert-dismissable alert-success'>
        <strong>Ayarlar Başarıyla Güncellendi.</strong> 
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        </div>";

      } elseif ($iletisimgonder=='no')  {

       echo "<div class='alert alert-dismissable alert-danger'>
       <strong>Veritabanına hiçbir değişiklik işlenemedi. Bunun sebebi sizin herhangi bir güncelleme yapmamış olmanız olabilir.</strong> 
       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
       </div>";

     } else {
       echo "<div class='alert alert-dismissable alert-info'>
       <strong>Bizimle iletişime geçmek için aşağıda yer alan iletişim formunu eksiksizce doldurarak gönderebilirsiniz.</strong>
       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
       </div>"; 



     } ?>
<div class="row no-gutters block-9">
  <div class="col-md-6 order-md-last d-flex">
    <form action="http://www.ozelfaruk.com/groowdome/phpmail/index.php" method="POST" id="contact-form" class="bg-light p-5 contact-form">
      <div class="form-group">
        <input type="text" class="form-control"name="adsoyad" placeholder="İsminiz">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="eposta" placeholder="Mailiniz">
      </div>
      <div class="form-group">
       <input type="text" placeholder="Konu" value="" name="konu" data-msg-required="Konu Giriniz" maxlength="100" class="form-control input-lg" id="subject" required>
     </div>
     <div class="form-group">
      <textarea maxlength="5000" placeholder="Mesaj" name="mesaj"  data-msg-required="Mesaj Giriniz..." cols="30" rows="7"class="form-control input-lg" id="message" required></textarea>
    </div>
    <input type="hidden" name="iletisim_ip" value="<?php echo $iletisimip; ?>">
    <div class="form-group">
      <input  type="submit" name="iletisimform" value="Mesajı Gönder" class="btn btn-primary py-3 px-5"data-loading-text="Loading...">
    </div>
  </form>

</div>

<div class="col-md-6 d-flex">
 <div id="map" class="bg-white"></div>
</div>
 <!-- <div class="col-md-6" id="map">
 Google Maps - Go to the bottom of the page to change settings and map location. 
  <div id="googlemaps"class="col-md-6">
    <iframe
    width="100%"
    height="100%"
    frameborder="0" style="border:0"
    src="https://www.google.com/maps/embed/v1/place?key=<?php echo $ayarcek['ayar_goooglemap']; ?>
    &q=<?php echo $ayarcek['ayar_adres']; ?>" allowfullscreen>
  </iframe>
</div>
</div>-->
</div>
</div>
</section>
<?php include 'footer.php' ?>
