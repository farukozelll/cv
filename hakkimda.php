 <?php include 'header.php';

 $hakkimizdasor=$db->prepare("select * from hakkimizda where hakkimizda_id=?");
 $hakkimizdasor->execute(array(0));
 $hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
 ?>

 <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
 	<div class="container">
 		<div class="row d-flex">
 			<div class="col-md-6 col-lg-5 d-flex">
 				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(images/hakkimda/pro.jpg);">
 				</div>
 			</div>
 			<div class="col-md-6 col-lg-7 pl-lg-5 py-5">
 				<div class="py-md-5">
 					<div class="row justify-content-start pb-3">
 						<div class="col-md-12 heading-section ftco-animate">
 							<span class="subheading">Künyem</span>
 							
 							<h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?>      <button class="btn btn-dark py-2 px-3 icofont-moon"onclick="myFunction()"></button></h2>
 							<p><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></p>
 						</div>
 						<a href="images/CV.pdf" download="cv">
 							<button class="btn btn-danger py-3 px-5 icofont-download"href="images/CV.pdf">CV indir</button>
 						</a>
 					</div>
 					<div class="counter-wrap ftco-animate d-flex mt-md-3">
 						<div class="text p-4 bg-primary">
 							<p class="mb-0">
 								<span class="number" data-number="20">0</span>
 								<span>YILLIK DENEYİM</span>
 							</p>
 						</div>
 					</div>

 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <?php include 'footer.php' ?>
