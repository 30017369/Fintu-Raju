
<?php
		include 'config/database.php';
		 ?>



<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Generic Page - Industrious by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">


		<!-- Header -->
			<header id="header">
				<a class="logo" href="home.php">SCP</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="home.php">Home</a></li>
					<?php
                         foreach($record as $menu):

                    ?>
                 <li>
                 	<a class="nav-link" href="home.php?item='<?php echo $menu['item'];?>'"><?php echo $menu['item'];?></a>
                       </li>
              <?php endforeach;?>
					
					<li><a href="create.php">Enter a New SCP data</a></li>
				</ul>
		</nav>
					<?php
					if(isset($_GET['item']))
					{
					  $scp=trim($_GET['item'],"'");
					$item="select * from scp where item='$scp'";
					$subject=$conn->prepare($item);
					$subject->execute();
					$display=$subject->fetch(PDO::FETCH_ASSOC);

					$id=$display['id'];
					echo "
					
		<!-- Heading -->
			<div id='heading' >
				<h1>Special Containment Procedure</h1>
			</div>

		<!-- Main -->
			<section id='main' class='wrapper'>
				<div class='inner'>
					<div class='content'>
						<header>
							<h2><b>Item:</b>{$display['item']}<br> <b>Object class:</b>{$display['class']}</h2>
						</header>
						<h3><b>Procedure</b></h3>
						<p>{$display['containment']}. </p>
						<p><img class='img-fluid' src='{$display["image"]}' style='width:75%;height:auto;box-shadow:3px,3px,3px;margin-left:auto;margin-right:auto; display:block;'></p><hr>

                       <h3><b>Description</b></h3>
						<p>{$display['description']}</p>
						<hr />

						<h3><b>Reference</b></h3>
						<p>{$display['reference']}</p>
						<hr>
	                    <h3><b>Additional</b></h3>
						<p>{$display['additional']}</p>
						<hr>
				<a href='update.php?id={$id}' class='btn btn-warning'>Update record</a>
				<a href='#' onclick='delete_record({$id})' class='btn btn-danger'>Delete</a>
									</div>
				</div>
			</section>
			";
		}
		else
		{
           echo "
           	<section>
							
							<h1 style='text-align:center;font-weight:bold;'>Special containment file</h1>
						</section>
						";
		}
					?>
			<?php
			        
			        $delete=isset($_GET['action']) ? $_GET['action'] :"";

			        //if directed from delete.php
			        if($delete =='deleted')
			        {
			            echo "<div clas='alert alert-success'>Records was deleted</div>";
			        }
			 
			 
			 ?>
			 <script>
			function delete_record(id)
			{
			    var answer=confirm('ok to delete this recpord');
			    if(answer)
			    {
			      window.location='delete.php?id=' + id;
			    }
			}

			 </script>
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>Accumsan montes viverra</h3>
							<ul class="alt">
								<li><a href="#">Dolor pulvinar sed etiam.</a></li>
								<li><a href="#">Etiam vel lorem sed amet.</a></li>
								<li><a href="#">Felis enim feugiat viverra.</a></li>
								<li><a href="#">Dolor pulvinar magna etiam.</a></li>
							</ul>
						</section>
						
						<section>
							<h4>Magna sed ipsum</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section>
					</div>
					<div class="copyright">
						&copy; Untitled. Photos <a href="https://unsplash.co">Unsplash</a>, Video <a href="https://coverr.co">Coverr</a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>