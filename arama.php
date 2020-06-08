<?php 
include 'header.php';



if (isset($_POST['aranan'])) {
	
$aranan=$_POST['aranan'];	

} else {

	$aranan=$_GET['aranan'];

}


if (strlen($aranan)==0) {
	
	Header("Location:index.php");
	exit;
}


$sorgu=$db->prepare("select * from icerik where icerik_ad LIKE ?");
$sorgu->execute(array("%$aranan%"));
$say=$sorgu->rowCount();

?>


	<div class="container">
		<div class="row pt-xl">

			<div class="col-md-9">
				<div><br/><br/><br/><br/><br/><br/></div>

				<h1 class="mt-xl mb-none">Arama Sonuçları</h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<div class="row">

					<?php 
					if ($say==0) {?>


					<div class="col-md-12">
						<p><b><?php echo $aranan ?></b> kelimesi ile ilgili sonuç bulunamadı...</p><br/><br/>
					</div>



	
					<?php }
					?>

					

					<?php

                $sayfada = 4; // sayfada gösterilecek içerik miktarını belirtiyoruz.

                
                
                $toplam_icerik=$sorgu->rowCount();

                $toplam_sayfa = ceil($toplam_icerik / $sayfada);

                  // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

			    // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1; 

				// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 

                $limit = ($sayfa - 1) * $sayfada;

                $iceriksor=$db->prepare("select * from icerik where icerik_ad LIKE ? order by icerik_zaman DESC limit $limit,$sayfada");
                $iceriksor->execute(array("%$aranan%"));

                while($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>


                <!-- Başla -->

                <!-- hidden-xs mobilde div gizleme -->

                <div class="col-md-12">

                	<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
                		<span class="thumb-info-side-image-wrapper p-none ">

                			<img  src="<?php echo $icerikcek['icerik_resimyol']; ?>" class="img-responsive" alt="" style="width: 395px; height: 250px; padding:10px;">

                		</span>
                		<span class="thumb-info-caption">
                			<span class="thumb-info-caption-text">
                				<h2 class="mb-md mt-xs"><?php echo $icerikcek['icerik_ad']; ?></h2>
									<!--<span class="post-meta">
										<span>January 10, 2016 | <a href="#">John Doe</a></span>
									</span>-->
									<p style="font-size:16px !important;"><?php echo substr($icerikcek['icerik_detay'],0,200); ?>...</p>
									<a class="mt-md" href="<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>">Devamını Oku <i class="fa fa-long-arrow-right"></i></a>
								</span>
							</span>
						</span>

					</div>

					<!-- Bitir -->

					<?php } ?>
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
					

				</div>

			</div>


			<!-- Sidebar -->

			
			

		</div>

	</div>
</div>

<?php include 'footer.php'; ?>
