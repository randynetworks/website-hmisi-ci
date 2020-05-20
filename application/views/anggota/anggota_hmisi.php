<section id="team" class="section-bg">
	<div class="container">
		<div class="section-header">
			<br><br><br><br>
			<h3>Anggotanya HMISI</h3>
			<p>Banyak sekali anggota anggota yang memberikan inspirasi dan membangun HMISI secara global.</p>
		</div>

		<div class="row text-center">

			<? foreach ($members as $member ) : ?>
			<div class="col-lg-3 col-md-6 wow fadeInUp">
				<div class="member">
					<img src="<?= base_url(). '/assets/img/SO/' . $member['img'];?>" class="img-fluid" alt="">
					<div class="member-info">
						<div class="member-info-content">
							<h4><?= $member['nama-lengkap'];?></h4>
							<span><?= $member['jabatan'];?></span>
						</div>
					</div>
				</div>
			</div>
			<? endforeach;?>

		</div>
	</div>
</section>
