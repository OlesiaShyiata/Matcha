<!DOCTYPE html>
<html>

<head>
	<title>Account</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--	<link rel="stylesheet" href="/styles/bootstrap.css">-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/styles/account.css">
	<link rel="stylesheet" href="../styles/bootstrap.css">
		<link rel="stylesheet" href="../styles/font-awesome.css">
	<link rel="stylesheet" href="/styles/main.css">

	<style>
		.container {
			display         : flex;
			flex-direction  : column;
			justify-content : center;
			align-items     : center;
		}

		.btn-default {
			background-color : #f2f2f2;;;

		}

		.photos img{
			flex-direction: row;
		}

		img {
			margin-left   : 10px;
			margin-top    : 10px;
			margin-bottom : 10px;
		}

		input {
			padding-top : 0;
			width       : 400px;
		}

		[hidden] {
			display : none !important;
		}

		.hiden {
			height : 100px;

		}

		#computer {
			text-align    : center;
			margin-bottom : 10px;
			height        : 40px;
			width         : 400px;
		}

		#photos-container img {
			height : 300px;
			width  : 400px;
		}

		@media (max-width : 901px) {
			footer {
				width : 901px;
			}

		}

		.error {
			color : red;
		}

	</style>
</head>

<body>
<header class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="#">Account</a></li>
				<li class=""><a href="/info/index">Information</a></li>
				<li><a href="/logout/index">Logout</a></li>
				<li><a href="/settings/index">Settings</a></li>
			</ul>
		</div>
	</div>
</header>


<main>
	<div id="headerwrap">
		<div class="container">
			<div class="col-lg-8 col-lg-offset-2">
				<h1>Matcha</h1>
				<h2>Because, love too can be industrialized</h2>
			</div>
		</div>
	</div>

	<section class="container w">
		<div class="row centered">

			<div class="col-lg-4">
				<img src="/images/idea.png">
				<h4>Info</h4>
				<p> Idea. It's firs that you need for good and successful trip. Which country to choose, how to plan
					correctly your budget, how to make a good company?</p>
			</div>

			<div class="col-lg-4">
				<img src="/images/plane.png">
				<h4>Interests</h4>
				<p> In psychology, decision-making is regarded as the cognitive process resulting in the selection of a
					belief or a course of action among several alternative possibilities.</p>
			</div>

			<div class="col-lg-4">
				<img src="/images/planet.png">
				<h4>Action</h4>
				<p> Action - it is the fact or process of doing something, typically to achieve an aim.
					Reasons for traveling include recreation, tourism or vacationing,research travel the
					gatherings. </p>
			</div>

		</div>
	</section>


	<section id="dg">
		<div class="container">
			<div class="row centered">
				<h4></h4>
				<br/>
				<div class="col-lg-4">
					<div class="tilt">
						<label for="computer" class="btn btn-default">
							<div id="image"></div>
							Upload avatar<input type="file" id="computer" hidden style="display:none">
						</label>
						<p class="error" id="show_errors"></p>
						<img id="avatar" src="<?= $args['avatars'] ?>" alt="img1">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="mycolor">
		<div class="container w ">
			<div class="row centered mycolor">
				<div class="col-lg-12">
					<h4>Kristian </h4>
					<p> Kristan is a California native who quit a finance career to travel the world. She’s been
						traveling for 5 years and is ‘killing it’. This girl has some amazing girl power! She works with
						top brands and sponsors from all over the globe. </p>
				</div>
			</div>
	</section>


	<section class="container wb">
		<div class="row centered">

			<div class="col-lg-10 col-lg-offset-1">
				<h4>More photos</h4>
				<p>We travel, initially, to lose ourselves; and we travel, next, to find ourselves. We travel to open
					our hearts and eyes and learn more about the world than our newspapers will accommodate. We travel
					to bring what little we can, in our ignorance and knowledge, to those parts of the globe whose
					riches are differently dispersed. And we travel, in essence, to become young fools again -- to slow
					time down and get taken in, and fall in love once more.</p>
			</div>

			<div class="col-lg-2"></div>
			<div class="col-lg-10 col-lg-offset-1">
				<?php if (count($args['photos']) < 4): ?>
					<label for="photos" class="btn btn-default">
						<div id="image_2"></div>
						Upload photos<input type="file" id="photos" hidden style="display:none">
					</label>
					<p class="error" id="show_photos_errors"></p>
					<img id="empty_photo" src="" alt="img" class="img-responsive" style="display: none">
				<?php endif; ?>
				<?php foreach ($args['photos'] as $photo): ?>
					<img id="" src="<?= $photo['path'] ?>" alt="img" class="img-responsive">
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="lg">
		<div class="row centered">

			<div class="col-lg-2 col-lg-offset-1">
				<img src="../images/logo1a.gif" alt="img" width="200px" height="200px">
			</div>

			<div class="col-lg-2">
				<img src="../images/logo2a.gif" alt="img" width="200px" height="200px">
			</div>

			<div class="col-lg-2">
				<img src="../images/logo3a.gif" alt="img" width="200px" height="200px">
			</div>

			<div class="col-lg-2">
				<img src="../images/logo4a.gif" alt="img" width="200px" height="200px">
			</div>

			<div class="col-lg-2">
				<img src="../images/logo5a.gif" alt="img" width="200px" height="200px">
			</div>
		</div>
	</section>

</main>
<div class="hiden"></div>

<footer>
</footer>


<script src="/js/photo.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/styles/bootstrap.min.js"></script>

</body>
</html>
