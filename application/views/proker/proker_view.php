<section id="services" class="section-bg mt-5">
	<div class="container">

		<header class="section-header">
			<br>
			<h3><?= $proker_item['title']; ?></h3>
			<p><?= $proker_item['text']; ?></p>
		</header>

		<section id="portfolio" class="section-bg">
			<div class="container">
				<div class="row text-center">
					<? foreach ($imgproker as $img) : ?>
					<div class="col-lg-3 col-md-4 col-6 portfolio-item filter-app">
						<div class="portfolio-wrap">
							<img src="<?= base_url('assets/img/proker-img/') . $img['img']; ?>" class="img-fluid" alt="">
							<div class="portfolio-info">
								<h6><a href="#"><?= $img['text']; ?></a></h6>
								<div>
									<a href="<?= base_url('assets/img/proker-img/') . $img['img']; ?>" data-lightbox="portfolio" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
								</div>
							</div>
						</div>
					</div>
					<? endforeach; ?>

				</div>
		</section>
	</div>
</section>
