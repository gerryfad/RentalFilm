<!-- header -->
<header class="header">
	<div class="header__wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- header logo -->
						<a href="index.php" class="header__logo">
							<img src="img/logo.png" alt="">
						</a>
						<!-- end header logo -->

						<!-- header nav -->
						<ul class="header__nav">
							<!-- dropdown -->
							<li class="header__nav-item">
								<a href="index.php?target=home" class="header__nav-link">Home</a>
							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a href="index.php?target=film" class="header__nav-link">Daftar Film</a>
							</li>
							<!-- end dropdown -->

							<li class="header__nav-item">
								<a href="index.php?target=fitur" class="header__nav-link">Fitur</a>
							</li>

							<li class="header__nav-item">
								<a href="index.php?target=faq" class="header__nav-link">Faq</a>
							</li>

							<!-- dropdown -->
							<li class="header__nav-item">
								<a href="index.php?target=tentang" class="header__nav-link">Tentang Kami</a>
							</li>
							<!-- end dropdown -->
						</ul>
						<!-- end header nav -->

						<!-- header auth -->
						<div class="header__auth">
							<button class="header__search-btn" type="button">
								<i class="icon ion-ios-search"></i>
							</button>
							<?php 
								session_start(); 
								
							?>
							<?php if(isset($_SESSION["login"])){ ?>
							<a class="dropdown-toggle header__nav-link" role="button" id="dropdownMenuCatalog"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button
									class="header__sign-in"><i
										class="icon ion-ios-log-in"></i><span><?= $_SESSION["user"] ?></button>
							</a>
							<ul style="width: 2px;margin-top: 14px;margin-left: 14px;"
								class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
								<li><a href="#"><i class="ion-logo-usd"></i>  <?= rupiahh($_SESSION["saldo"])?></a></li>
								<?php if(($_SESSION["role"])=='admin'){ ?>
								<li><a href="database.php"><i class="icon ion-ios-briefcase"></i> Database</a></li>
								<?php } ?>
								<li><a href="logout.php"><i class="icon ion-ios-key"></i> Logout</a></li>
							</ul>
							<?php } else { ?>
							<a href="index.php?target=login" class="header__sign-in">
								<i class="icon ion-ios-log-in"></i>
								<span>Login</span>
							</a>
							<?php } ?>
						</div>
						<!-- end header auth -->

						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- header search -->
	<form action="#" class="header__search">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__search-content">
						<input type="text" placeholder="Search for a movie, TV Series that you are looking for">

						<button type="button">search</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- end header search -->
</header>
<!-- end header -->
<?php
function rupiahh($angka){
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
}
?>