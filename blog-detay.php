<?php include 'header.php';

$iceriksor=$db->prepare("SELECT * from icerik where icerik_id=:icerik_id");
$iceriksor->execute(array(
  'icerik_id' => $_GET['icerik_id']
));

$icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC); ?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">




 <section class="hero-wrap hero-wrap-2 "  data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
    <div id="particles-js"></div>
  <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="blog.php">Blog</a></span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Akıllı  Blogu</h1>
        </div>
      </div>
  </div>
</section>


<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-2"><?php echo $icerikcek['icerik_ad']; ?></h2>
         <p>
          <img src="<?php echo $icerikcek['icerik_resimyol']; ?>" alt="" class="img-fluid">
        </p>
        <!-- .col-md-8  --> <p class="mb-2"><?php echo $icerikcek['icerik_detay']; ?></p>
       
       



      </div>



      <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate">
       <div class="sidebar-box">
        <form id="searchForm" action="arama" method="POST">
          <div class="input-group">
            <input type="text" minlength="2" class="form-control" name="aranan" id="q" placeholder="Arama..." required>
            <span class="input-group-btn">
              <button class="btn btn-default" name="arama" type="submit"><i class="icon fa fa-search"></i></button>
            </span>
          </div>
        </form>
      </div>
      <!-- .col-md-8 -->   <div class="sidebar-box ftco-animate">
       <h3 class="heading-sidebar">Categories</h3>
       <ul class="categories">
        <li><a href="#">Interior Design <span>(12)</span></a></li>
        <li><a href="#">Exterior Design <span>(22)</span></a></li>
        <li><a href="#">Industrial Design <span>(37)</span></a></li>
        <li><a href="#">Landscape Design <span>(42)</span></a></li>
      </ul>
    </div>


    <?php

                $sayfada = 4; // sayfada gösterilecek içerik miktarını belirtiyoruz.


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

                  <div class="block-21 mb-4 d-flex">

                    <a href="blog-<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>"class="blog-img mr-4" style="background-image: url('<?php echo $icerikcek['icerik_resimyol']; ?>');">
                    </a>
                    <div class="text">
                     <h3 class="heading"href="blog-<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>"><a href="blog-<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>"><?php echo $icerikcek['icerik_ad']; ?></a></h3>

                     <div class="meta">

                     </div>
                   </div>



                 </div>


               <?php } ?>

               <div class="sidebar-box ftco-animate">
                <h3 class="heading-sidebar">Anahtar Kelimeler:</h3>
                <div class="tagcloud">


                  <?php 
                  $iceriksor=$db->prepare("SELECT * from icerik where icerik_id=:icerik_id");
                  $iceriksor->execute(array(
                    'icerik_id' => $_GET['icerik_id']
                  ));

                  $icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC); 
                  $etiketler=explode(', ',$icerikcek['icerik_keyword']); 



                  foreach ($etiketler as $etiketbas) {?>


                   <button href="arama?aranan=<?php echo $etiketbas; ?>" class="btn btn-primary btn-xs"><?php echo $etiketbas; ?></button>
                 <?php }     
                 ?>
               </div>
             </div>

           </div>






         </div>
       </div>
     </section> <!-- .section -->





     <?php include 'footer.php';?>
