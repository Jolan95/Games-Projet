<!DOCTYPE html>
<?php 
session_start();
include "handleLanguage/lang.php";
?>
 <html lang="fr">
    <head>
		<link rel="icon" type="image/png" href="Img/favicon.png">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>J-Games Online</title>
		<meta name="description" content="Jeux d'arcades, quiz, jeux de dés,... Venez découvrir nos différents jeux et venez défier les autres utilisateurs !" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/carousel/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/carousel/owl.theme.default.min.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
		<?php require_once 'header.php'; ?>
		<main class="container home pt-3">
			<div class="owl-carousel ">
  				<div class="first-carousel section-carousel ">
					<div class="carousel-content p-5">
						<h2 class="title-game">Quiz Capitales</h2>
						<div class="d-lg-block d-none">
							Venez testez votre connaissance des capitales du monde, 3 niveau différents :
							<ul >
								<li>Facile (10 capitales)</li>
								<li>Moyen (50 capitales)</li>
								<li>Expert (toutes les capitales)</li>
							</ul>		
						</div>
						<div class="d-flex justify-content-center justify-content-xl-start">
							<a href="https://games-online.herokuapp.com/quiz-cap/capital.php">
								<button class="p-2">
									Lancer le Jeu
								</button>
							</a>
						</div>	
					</div>
				</div>
  				<div class="second-carousel section-carousel ">
				  	<div class="carousel-content p-5">
					  	<h2 class="title-game">Flappy Bird</h2>
						<div class="d-none d-lg-block">
							<p>Venez tester votre dexterité dans le célèbre jeu Flappy Bird<p>
							<p>Aidez l'oiseau à passer à travers le maximum de tuyaux<p>		
						</div>
						<div class="d-flex justify-content-center justify-content-xl-start">
							<a href="https://games-online.herokuapp.com/flappy-bird/index.php">
								<button class="p-2">
									Lancer le Jeu
								</button>
							</a>
						</div>
					</div>
				</div>
				<div class="third-carousel section-carousel ">
					<div class="carousel-content p-5">
						<h2 class="title-game">Guessing Number</h2>
						<div class=" d-none d-lg-block">
							<p>Venez deviner le nombre mystère à l'aide des indicateurs "+" ou "-"</p>
							<p>Le nombre aléatoire est différent à chaque partie</p>
							<p>Essayez de trouver en un minimum de tentative</p>			
						</div>
						<div class="d-flex justify-content-center justify-content-xl-start">
							<a href="https://games-online.herokuapp.com/guessing-game/jeuNumber.php">
								<button class="p-2">
									Lancer le Jeu
								</button>
							</a>
						</div>	  
					</div>
				</div>
			</div>
			<div>
				<div class="row mt-3 mb-5">
					<div class="col-12 col-lg-6">
						<div class="box-left mb-5">
							<div class="box-content p-4">
								<h2 class="title-game text-center">Pierre-Feuille-Ciseaux</h2>
								<div class="d-lg-block d-none s-bold">
									Jouez à la simulation de jeu Pierre-Feuille-Ciseaux.
									Affrontez l'ordinateur dans ce jeu de hasard.		
								</div>
								<div class="d-flex justify-content-center justify-content-xl-start">
									<a href="https://games-online.herokuapp.com/PFC/pfc.php">
										<button class="p-2">
											Lancer le Jeu
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="box-right">
							<div class="box-content p-4">
								<h2 class="title-game text-center">Jeu de Dé</h2>
								<div class="d-lg-block d-none s-bold">
									Lancez le dé antant de fois que vous voulez, si vous tombez sur le 6 vous laissez la main et perdez vos points.
									Bloquez au bon moment pour atteindre 100 en premier
								</div>
								<div class="d-flex justify-content-center justify-content-xl-start">
									<a href="https://games-online.herokuapp.com/dice-game/jeu.php">
										<button class="p-2">
											Lancer le Jeu
										</button>
									</a>
								</div>									
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>		
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="assets/carousel/owl.carousel.min.js"></script>

<script>

//   function notConnected(){
//     alert('<?php echo $notConnected; ?>')
//   }
  	$(document).ready(function(){
  		$(".owl-carousel").owlCarousel({
			items : 1,
			loop : true,
			autoplay : true,
			autoplayTimeout : 7000,
			dotsEach : true,
			dots : true
  		});
	});
      </script>




	</body>
</html>