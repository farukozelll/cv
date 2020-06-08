   <?php include 'header.php' ?>

  <section class="ftco-section bg-light" id="blog-section">
      <div class="container">
          <form id="searchForm" action="arama" method="POST">
          <div class="input-group">
            <input type="text" minlength="2" class="form-control" name="aranan" id="q" placeholder="Arama..." required>
            <span class="input-group-btn">
              <button class="btn btn-default" name="arama" type="submit"><i class="icon fa fa-search"></i></button>
            </span>
          </div>
        </form>
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Blog</span>
            <h2 class="mb-4">Groowdome Akıllı Çiftlik Blogu</h2>
            
          </div>
        </div>
        <div class="row d-flex">
<?php

                $sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.


                $sorgu=$db->prepare("select * from icerik");
                $sorgu->execute();
                $toplam_icerik=$sorgu->rowCount();

                $toplam_sayfa = ceil($toplam_icerik / $sayfada);

                  // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

          // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1; 

        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 

                $limit = ($sayfa - 1) * $sayfada;

                $iceriksor=$db->prepare("select * from icerik order by icerik_zaman DESC limit $limit,$sayfada");
                $iceriksor->execute();

                while($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>"  class="block-20" style="background-image: url('<?php echo $icerikcek['icerik_resimyol']; ?>');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<!--<div class="d-flex align-items-center pt-2 mb-4 topp">
              		<div class="one mr-2">
              			<span class="day">12</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">March</span>
              		</div>
              	</div>-->
                <h3 class="heading"><a href="blog-<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>"><?php echo $icerikcek['icerik_ad']; ?></a></h3>
                <p><?php echo substr($icerikcek['icerik_detay'],0,200); ?></p>
                <div class="d-flex align-items-center mt-4 meta">
	                <p class="mb-0"><a href="blog-<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>" class="btn btn-primary">Devamını Oku  <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                
	                </p>
                </div>
              </div>
            </div>
          </div>
            <?php } ?>
         
        </div>
      </div>
        <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul >
              <?php
              $s=0;
              while ($s < $toplam_sayfa) {
                $s++; ?>
                <?php 
                if ($s==$sayfa) {?>
                  <li class="active">
                   <a href="blog?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
                 </li>
               <?php } else {?>
                 <li>
                  <a href="blog?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
                </li>
              <?php   }
            }
            ?>
            <li>
              <a href="blog?sayfa=<?php echo $_GET['sayfa']+1; ?>">&raquo;</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </section>
 <?php include 'footer.php' ?>
