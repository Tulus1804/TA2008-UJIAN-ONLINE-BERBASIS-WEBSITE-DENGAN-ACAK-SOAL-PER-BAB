<!DOCTYPE html>
<html>

<head>
	<title>Halaman <?= $title ?></title>
	<!-- Fontfaces CSS-->
	<link href="<?= base_url('assets') ?>/css/font-face.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="<?= base_url('assets') ?>/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/js/jquery.datetimepicker.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="<?= base_url('assets') ?>/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets') ?>/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

	<link href="<?= base_url('assets') ?>/froala_editor/css/froala_editor.css" rel="stylesheet" media="all">


	<!-- Main CSS-->
	<link href="<?= base_url('assets') ?>/css/theme.css" rel="stylesheet" media="all">



	<script src="<?= base_url('assets') ?>/js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('assets') ?>/js/jquery.js"></script>


	<script type="text/javascript">
		let base_url = '<?= base_url() ?>';
	</script>
</head>

<body class="animsition" style="background-color: #EBEBEB;">
	<div class="page-wrapper">
		<!-- HEADER DESKTOP-->
		<header class="header-desktop3 d-none d-lg-block">
			<div class="section__content section__content--p35">
				<div class="header3-wrap">
					<div class="header__logo">
						<a href="#">
							<img src="<?= base_url('assets') ?>/img/icon/logo-exam.png" width="110" height="100" alt="TA.2008" />
						</a>
					</div>
					<div class="header__navbar">
						<ul class="list-unstyled">
							<li class="has-sub">
								<a href="<?= base_url('guru') ?>">
									<i class="fas fa-tachometer-alt"></i>Home
									<span class="bot-line"></span>
								</a>
							</li>
							<li>
								<a href="<?= base_url('guru/kelas') ?>">
									<i class="fas fa-trophy"></i>
									<span class="bot-line"></span>Kelas</a>
							</li>
						</ul>
					</div>
					<div class="header__tool">
						<div class="header-button-item js-item-menu">
							<i class="zmdi zmdi-search"></i>
							<div class="search-dropdown js-dropdown">
								<form action="">
									<input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
									<span class="search-dropdown__icon">
										<i class="zmdi zmdi-search"></i>
									</span>
								</form>
							</div>
						</div>
						<div class="account-wrap">
							<div class="account-item account-item--style2 clearfix js-item-menu">
								<div class="image">
									<img src="<?= base_url('uploads/img/') . $user['role_id'] . '/' . $user['image']; ?>" alt="<?= $user['name']; ?>" />
								</div>
								<div class="content">
									<a class="js-acc-btn" href="#"><?= $user['name']; ?></a>
								</div>
								<div class="account-dropdown js-dropdown">
									<div class="info clearfix">
										<div class="image">
											<a href="#">
												<img src="<?= base_url('uploads/img/') . $user['role_id'] . '/'  . $user['image']; ?>" alt="<?= $user['name'] ?>" />
											</a>
										</div>
										<div class="content">
											<h5 class="name">
												<a href=""><?= $user['name'] ?></a>
											</h5>
											<span class="email"><?= $user['email'] ?></span>
										</div>
									</div>
									<div class="account-dropdown__body">
										<div class="account-dropdown__item">
											<a href="<?= base_url('guru/profil/' . $user['id']) ?>">
												<i class="zmdi zmdi-account"></i>Profil</a>
										</div>
										<div class="account-dropdown__item">
											<a href="<?= base_url('guru/getubahpassword/' . $user['id']) ?>">
												<i class="zmdi zmdi-settings"></i>Ganti Password</a>
										</div>
									</div>
									<div class="account-dropdown__footer">
										<a class="logout" href="<?= base_url('auth/logout') ?>">
											<i class="zmdi zmdi-power"></i>Logout</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- Header Mobile -->
		<header class="header-mobile header-mobile-2 d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">
						<a href="#">
							<img src="<?= base_url('assets') ?>/img/icon/logo-exam.png" width="100" height="100" alt="TA.2008" />
						</a>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<nav class="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li class="has-sub">
							<ul class="list-unstyled">
								<li class="has-sub">
									<a href="<?= base_url('guru') ?>">
										<i class="fas fa-tachometer-alt"></i>Home
										<span class="bot-line"></span>
									</a>
								</li>
								<li>
									<a href="<?= base_url('guru/profil') ?>">
										<i class="fas fa-shopping-basket"></i>
										<span class="bot-line"></span>About</a>
								</li>
								<li>
									<a href="<?= base_url('guru/kelas') ?>">
										<i class="fas fa-trophy"></i>
										<span class="bot-line"></span>Kelas</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="sub-header-mobile-2 d-block d-lg-none">
			<div class="header__tool">
				<div class="header-button-item js-item-menu">
					<i class="zmdi zmdi-search"></i>
					<div class="search-dropdown js-dropdown">
						<form action="">
							<input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
							<span class="search-dropdown__icon">
								<i class="zmdi zmdi-search"></i>
							</span>
						</form>
					</div>
				</div>
				<div class="account-wrap">
					<div class="account-item account-item--style2 clearfix js-item-menu">
						<div class="image">
							<img src="<?= base_url('uploads/img/') . $user['role_id'] . '/'  . $user['image']; ?>" alt="John Doe" />
						</div>
						<div class="content">
							<a class="js-acc-btn" href="#">john doe</a>
						</div>
						<div class="account-dropdown js-dropdown">
							<div class="info clearfix">
								<div class="image">
									<a href="#">
										<img src="<?= base_url('uploads/img/') . $user['role_id'] . '/'  . $user['image']; ?>" alt="John Doe" />
									</a>
								</div>
								<div class="content">
									<h5 class="name">
										<a href=""><?= $user['name'] ?></a>
									</h5>
									<span class="email"><?= $user['email'] ?></span>
								</div>
							</div>
							<div class="account-dropdown__body">
								<div class="account-dropdown__item">
									<a href="<?= base_url('guru/profil/' . $user['id']) ?>">
										<i class="zmdi zmdi-account"></i>Profil</a>
								</div>
								<div class="account-dropdown__item">
									<a href="<?= base_url('guru/getubahpassword/' . $user['id']) ?>">
										<i class="zmdi zmdi-settings"></i>Ganti Password</a>
								</div>
							</div>
							<div class="account-dropdown__footer">
								<a class="logout" href="<?= base_url('auth/logout') ?>">
									<i class="zmdi zmdi-power"></i>Logout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END HEADER MOBILE -->

		<!-- PAGE CONTENT-->
		<div class="page-content" style="background-color: #EBEBEB;">
