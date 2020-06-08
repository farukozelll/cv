 <?php include 'header.php' ?>

 <!-- ======= Portfolio Section ======= -->
 <section id="portfolio" class="portfolio">
  <div class="container">

    <div class="section-title" data-aos="fade-up">

      <p>3D Tasarımlarım</p><button class="btn btn-dark py-2 px-3 icofont-moon"onclick="myFunction()"></button>
    </div>

      <!--  <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Hepsi</li>
              <li data-filter=".filter-app">Uygulama</li>
              <li data-filter=".filter-card">Dizayn</li>
              <li data-filter=".filter-web">Web Siteleri</li>
            </ul>
          </div>
        </div>
      -->
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php

                $sayfada = 9; // sayfada gösterilecek içerik miktarını belirtiyoruz.


                $sorgu=$db->prepare("select * from galeri");
                $sorgu->execute();
                $toplam_galeri=$sorgu->rowCount();

                $toplam_sayfa = ceil($toplam_galeri / $sayfada);

                  // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

          // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1; 

        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 

                $limit = ($sayfa - 1) * $sayfada;

                $galerisor=$db->prepare("select * from galeri order by galeri_id DESC limit $limit,$sayfada");
                $galerisor->execute();

                while($galericek=$galerisor->fetch(PDO::FETCH_ASSOC)) { ?>

                  <div class="col-lg-4 col-md-6 portfolio-item ">
                    <div class="portfolio-wrap">
                      <img src="<?php echo $galericek['galeri_resimyol']; ?>" class="img-fluid" alt="">
                    

                      <div class="portfolio-links">
                        <a href="<?php echo $galericek['galeri_resimyol']; ?>" data-gall="portfolioGallery" class="venobox" title="Görüntüle"><i class="icofont-expand"></i></a>
                        <a href="<?php echo $galericek['galeri_resimyol']; ?>"title="İndir" download="<?php echo $galericek['galeri_ad']; ?>">
                          <i class="icofont-turkish-lira"href="<?php echo $galericek['galeri_resimyol']; ?>"></i>
                        </a>
                        <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"title="Paylaş"><i href="https://simplesharebuttons.com/images/somacro/pinterest.png" class="icofont-pinterest"></i></a>
                      </div>
                    
                      <div class="portfolio-info">
                        <h4><?php echo $galericek['galeri_ad']; ?></h4>
                      </div>
                    </div>
                  </div>
                <?php } ?>



              </div>

            </div>

            <div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
                  <ul class="pagination">

                    <?php

                    $s=0;

                    while ($s < $toplam_sayfa) {

                      $s++; ?>

                      <?php 

                      if ($s==$sayfa) {?>

                        <li class="active">

                          <a href="galeri?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                        </li>

                      <?php } else {?>


                        <li>

                          <a href="galeri?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                        </li>

                      <?php   }

                    }

                    ?>

                  </ul>
                </div>
              </div>
            </div>
          </section><!-- End Portfolio Section -->

          <?php include 'footer.php' ?>
