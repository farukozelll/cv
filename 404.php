


 <?php include 'header.php';
 $hakkimizdasor=$db->prepare("select * from hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
 ?>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ftco-animate">
 
 <div class="hero-wrap js-fullheight">
    <div class="overlay"></div>
    <div id="particles-js"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
         <div class="error-404-page text-center">
                    <h2>404!</h2>
                    <h3>Üzgünüm! Böyle bir sayfa galiba yok</h3>
                    <p>Aradığınız sayfa silinmiş olabilir
                        <br>dilerseniz arama yapabilir ya da anasayfa 'ya gidebilirsiniz.</p>
                       
                    </div>
        </div>
      </div>
    </div>
  </div>

</div> <!-- .col-md-8 -->
<div class="col-md-4 sidebar ftco-animate">
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

  <div class="sidebar-box ftco-animate">
    <h3>Vizyonumuz</h3>
    <p><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></p>
  </div><hr>
    <div class="sidebar-box ftco-animate">
    <h3>Misyonumuz</h3>
    <p><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></p>
  </div>
</div>

</div>
</div>
</section> <!-- .section -->
<?php include 'footer.php';?>
