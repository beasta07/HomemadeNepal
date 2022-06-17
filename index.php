<?php include('header.php'); ?>


<body>
	<style>
		header {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			background: #fff;
			padding: 1rem 8%;
			display: flex;
			align-items: center;
			justify-content: space-between;
			z-index: 1000;
			box-shadow: var(--box-shadow);
		}




		header .navbar a:hover {
			color: #1abc9c;
			background: var(--green);
		}

		.about .row {
			display: flex;
			flex-wrap: wrap;
			gap: 1.5rem;
			align-items: center;
		}

		.about .row .image {
			flex: 1 1 45rem;
		}

		.about .row .image img {
			width: 80%;
		}

		.about .row .content {
			flex: 1 1 45rem;
		}

		.about .row .content h3 {
			color: var(--black);
			font-size: 4rem;
			padding: .5rem 0;
		}

		.about .row .content p {
			color: var(--light-color);
			font-size: 1.5rem;
			padding: .5rem 0;
			line-height: 2;
		}

		.about .row .content .icons-container {
			display: flex;
			gap: 1rem;
			flex-wrap: wrap;
			padding: 1rem 0;
			margin-top: .5rem;
		}

		.about .row .content .icons-container .icons {
			background: #eee;
			border-radius: .5rem;
			border: .1rem solid rgba(0, 0, 0, .2);
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 1rem;
			flex: 1 1 17rem;
			padding: 1.5rem 1rem;
		}

		.about .row .content .icons-container .icons i {
			font-size: 2.5rem;
			color: var(--green);
		}

		.about .row .content .icons-container .icons span {
			font-size: 1.5rem;
			color: var(--black);
		}

		.sub-heading {
			text-align: center;
			color: var(--green);
			font-size: 2rem;
			padding-top: 1rem;
		}

		.heading {
			text-align: center;
			color: var(--black);
			font-size: 3rem;
			padding-bottom: 2rem;
			text-transform: uppercase;
		}

		.topnav a {
			float: left;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
			color: black;
			background-color: white;
			font-family: Arial, Helvetica, sans-serif;

		}



		body {
			background-color: #ecf0f1;

			font-family: Arial, Helvetica, sans-serif;
		}

		h1 {
			text-align: center;
			font-family: Caveat Brush;
			font-size: 44px;
		}
	</style>

	<?php include('navbar.php'); ?>

	<br><br />
	<br><br />
	<br><br />


	<!-- home section starts  -->

	<section class="about" id="about">

		<h3 class="sub-heading"> About us </h3>
		<h1 class="heading"> why choose us? </h1>

		<div class="row">

			<div class="image">
				<img src="img/about-img.png" alt="">
			</div>

			<div class="content">
				<h3>Best food in the country</h3>
				<p>Homemade Nepal vows top provide hygienic and delicious food to the your doorsteps from the comfort of their own homes without having to visit the Restaurant.</p>
				<p>We will guarentee we provide you with the authentic Local taste that will have you wanting for more.</p>
				<div class="icons-container">
					<div class="icons">
						<i class="fas fa-shipping-fast"></i>
						<span>free delivery</span>
					</div>
					<div class="icons">
						<i class="fas fa-dollar-sign"></i>
						<span>easy payments</span>
					</div>
					<div class="icons">
						<i class="fas fa-headset"></i>
						<span>24/7 service</span>
					</div>
				</div>
				<a href="#" class="u-full-width button-primary button input add-to-cart" data-id="1">learn more</a>
			</div>

		</div>

	</section>

	<!-- home section ends -->

	<div class="container">
		<section class="menu" id="menu">
			<h1>Menu</h1>
			<ul class="nav nav-tabs">
				<?php
				$sql = "select * from category order by categoryid asc limit 1";
				$fquery = $conn->query($sql);
				$frow = $fquery->fetch_array();
				?>
				<li class="active"><a data-toggle="tab" href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?></a></li>
				<?php

				$sql = "select * from category order by categoryid asc";
				$nquery = $conn->query($sql);
				$num = $nquery->num_rows - 1;

				$sql = "select * from category order by categoryid asc limit 1, $num";
				$query = $conn->query($sql);
				while ($row = $query->fetch_array()) {
				?>
					<li><a data-toggle="tab" href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a></li>
				<?php
				}
				?>
			</ul>


			<div class="tab-content">
				<?php
				$sql = "select * from category order by categoryid asc limit 1";
				$fquery = $conn->query($sql);
				$ftrow = $fquery->fetch_array();
				?>
				<div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
					<?php

					$sql = "select * from product where categoryid='" . $ftrow['categoryid'] . "'";
					$pfquery = $conn->query($sql);
					$inc = 4;
					while ($pfrow = $pfquery->fetch_array()) {
						$inc = ($inc == 4) ? 1 : $inc + 1;
						if ($inc == 1) echo "<div class='row'>";
					?>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading text-center">
									<b><?php echo $pfrow['productname']; ?></b>
								</div>
								<div class="panel-body">
									<img src="<?php if (empty($pfrow['photo'])) {
													echo "upload/noimage.jpg";
												} else {
													echo $pfrow['photo'];
												} ?>" height="170px;" width="90%">
								</div>
								<div class="panel-footer text-center">
									Rs <?php echo number_format($pfrow['price'], 2); ?><br />
									<br />
									<a href="Order.php">Order Now </a>
								</div>
							</div>
						</div>

					<?php
						if ($inc == 4) echo "</div>";
					}
					if ($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
					if ($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
					if ($inc == 3) echo "<div class='col-md-3'></div></div>";

					?>
				</div>
				<?php

				$sql = "select * from category order by categoryid asc";
				$tquery = $conn->query($sql);
				$tnum = $tquery->num_rows - 1;

				$sql = "select * from category order by categoryid asc limit 1, $tnum";
				$cquery = $conn->query($sql);
				while ($trow = $cquery->fetch_array()) {
				?>
					<div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">
						<?php

						$sql = "select * from product where categoryid='" . $trow['categoryid'] . "'";
						$pquery = $conn->query($sql);
						$inc = 4;
						while ($prow = $pquery->fetch_array()) {
							$inc = ($inc == 4) ? 1 : $inc + 1;
							if ($inc == 1) echo "<div class='row'>";
						?>
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="panel-heading text-center">
										<b><?php echo $prow['productname']; ?></b>
									</div>
									<div class="panel-body">
										<img src="<?php if ($prow['photo'] == '') {
														echo "upload/noimage.jpg";
													} else {
														echo $prow['photo'];
													} ?>" height="170px;" width="80%">
									</div>
									<div class="panel-footer text-center">
										Rs <?php echo number_format($prow['price'], 2); ?>
										<br />
										<br /> <a href="Order.php">Order Now </a>
									</div>
								</div>
							</div>
					</div>
				<?php
							if ($inc == 4) echo "</div>";
						}
						if ($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
						if ($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
						if ($inc == 3) echo "<div class='col-md-3'></div></div>";
				?>
			</div>
		<?php
				}
		?>
	</div>

	</div>
</body>