 <br><br><br>
 <section id="portfolio" class="section-bg">
 	<div class="container">
 		<header class="section-header">
 			<h3 class="section-title">News</h3>
 		</header>
 		<? foreach ($newsAll as $new) :?>
 		<div class="row">
 			<div class="col-lg-5 col-md-6">
 				<div class="about-img">
 					<img src="<?= base_url().'/'.$new['img'];?>" alt="" class="img-fluid">
 				</div>
 			</div>
 			<div class="col-lg-7 col-md-6">
 				<div class="about-content">
 					<h3><?= $new['title'];?></h3>
 					<p>Create By <i><?= $new['create_by'];?></i></p>
 					<p><?= $new['time'];?></p>
 					<p><?= $new['text'];?></p>
 				</div>
 			</div>
 		</div>
 		<br>
 		<br>
 	<? endforeach;?>
 </section><!-- #news -->
