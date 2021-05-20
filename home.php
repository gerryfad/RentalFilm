<?php 
	require 'function.php';

	$sql = "SELECT * FROM dataFilm INNER JOIN genreFilm ON dataFilm.genre = genreFilm.id_genre";
	$query = mysqli_query($db,$sql);
?>

<?php session_start();?>
<?php if(!isset($_SESSION["login"])){ ?>
<section style="margin-top:42px;" class="home">

	<!-- home bg -->
	<div  class="owl-carousel home__bg">
		<div style="opacity: 0.1;" class="item home__cover" data-bg="img/home/home.jpg"></div>
	</div>
	<!-- end home bg -->

	<div style="height: 500px;" class="container">
		<div class="row">
			<div class="col-12">

				<h1 style="text-align: left;margin-top: 30px;" class="home__title"><b>Tonton film favorit</b> mu Dengan harga <b>murah</b></h1>
				<h1 style="text-align: left;margin-top: 30px;" class="home__title"><b>nikmati kapan saja</b> dan di mana saja</h1>
				<h1 style="text-align: left;margin-top: 30px;" class="home__title"><b>Dengan</b> kualitas <b>terbaik</b></h1>
				<a style="margin: auto;margin-top: 90px;" href="index.php?target=daftar" class="header__sign-in">
					<i class="icon ion-ios-log-in"></i>
					<span>Daftar</span>
				</a>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php if(isset($_SESSION["login"])){ ?>
<section style="margin-top:20px;" class="home">
	<!-- home bg -->
	<div class="owl-carousel home__bg">
		<div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
		<div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
		<div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
		<div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
	</div>
	<!-- end home bg -->

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="home__title"><b>FILM</b> TERLARIS MINGGU INI</h1>

				<button class="home__nav home__nav--prev" type="button">
					<i class="icon ion-ios-arrow-round-back"></i>
				</button>
				<button class="home__nav home__nav--next" type="button">
					<i class="icon ion-ios-arrow-round-forward"></i>
				</button>
			</div>

			<div class="col-12">
				<div class="owl-carousel home__carousel">


					<?php for($i=0;$i<=3;$i++): ?>
					<?php $data = mysqli_fetch_assoc($query); ?>
					<div class="item">
						<!-- card -->
						<div class="card card--big">
							<div class="card__cover">
								<img src="data/<?= $data['gambar']; ?>" height="370" width="70" alt="">
								<a href="index.php?judul=<?= $data['id']; ?>" class="card__play">
									<i class="icon ion-ios-play"></i>
								</a>
							</div>
							<div class="card__content">
								<h3 class="card__title"><a
										href="index.php?judul=<?= $data['id']; ?>"><?= $data['judul']; ?></a></h3>
								<span class="card__category">
									<a href="#"><?= $data['genre']; ?></a>
								</span>
								<span class="card__rate"><i class="icon ion-ios-star"></i><?= $data['rating']; ?></span>
								<ul class="card__list">
									<li><?= rupiah($data['harga']); ?></li>
								</ul>
							</div>
						</div>
						<!-- end card -->
					</div>
					<?php endfor; ?>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- end home -->
<?php } ?>
<!-- content -->
<section class="content">
	<div class="content__head">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- content title -->
					<h2 class="content__title">Film Terbaru</h2>
					<!-- end content title -->

					<!-- content tabs nav -->
					<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
								aria-selected="true"></a>
						</li>

					</ul>
					<!-- end content tabs nav -->

					<!-- content mobile tabs nav -->
					<div class="content__mobile-tabs" id="content__mobile-tabs">
						<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<input type="button" value="New items">
							<span></span>
						</div>

						<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab"
										href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Film
										Terbaru</a></li>
							</ul>
						</div>
					</div>
					<!-- end content mobile tabs nav -->
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<!-- content tabs -->
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
				<div class="row">
					<?php
					$terbaru = mysqli_query($db,"SELECT * FROM dataFilm INNER JOIN genreFilm ON dataFilm.genre = genreFilm.id_genre ORDER BY id DESC"); ?>
					<?php while($data = mysqli_fetch_array($terbaru)): ?>
					<!-- card -->
					<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
						<div class="card">
							<div class="card__cover">
								<img src="data/<?= $data['gambar']; ?>" height="240" width="60" alt="">
								<a href="index.php?judul=<?= $data['id']; ?>" class="card__play">
									<i class="icon ion-ios-play"></i>
								</a>
							</div>
							<div class="card__content">
								<h3 class="card__title"><a
										href="index.php?judul=<?= $data['id']; ?>"><?= $data['judul']; ?></a></h3>
								<span class="card__category">
									<a href="#"><?= $data['genre']; ?></a>
								</span>
								<span class="card__rate"><i class="icon ion-ios-star"></i><?= $data['rating']; ?></span>
								<ul class="card__list">
									<li><?= rupiah($data['harga']); ?></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- end card -->
					<?php endwhile; ?>
				</div>
			</div>
		</div>
		<!-- end content tabs -->
	</div>
</section>
<!-- end content -->

<!-- expected premiere -->
<section class="section section--bg" data-bg="img/section/section.jpg">
	<div class="container">
		<div class="row">
			<!-- section title -->
			<div class="col-12">
				<h2 class="section__title">Semua Film</h2>
			</div>
			<!-- end section title -->
			<?php mysqli_data_seek($query, 0); ?>
			<?php while($data = mysqli_fetch_array($query)): ?>
			<!-- card -->
			<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
				<div class="card">
					<div class="card__cover">
						<img src="data/<?= $data['gambar']; ?>" height="240" width="60" alt="">
						<a href="index.php?judul=<?= $data['id']; ?>" class="card__play">
							<i class="icon ion-ios-play"></i>
						</a>
					</div>
					<div class="card__content">
						<h3 class="card__title"><a href="index.php?judul=<?= $data['id']; ?>"><?= $data['judul']; ?></a>
						</h3>
						<span class="card__category">
							<a href="#"><?= $data['genre']; ?></a>
						</span>
						<span class="card__rate"><i class="icon ion-ios-star"></i><?= $data['rating']; ?></span>
						<ul class="card__list">
							<li><?= rupiah($data['harga']); ?></li>
						</ul>

					</div>
				</div>
			</div>
			<!-- end card -->
			<?php endwhile; ?>

			<!-- section btn -->
			<div class="col-12">
				<a href="index.php?target=film" class="section__btn">Show more</a>
			</div>
			<!-- end section btn -->
		</div>
	</div>
</section>
<!-- end expected premiere -->
