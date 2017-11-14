<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?></title>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/estilo.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body class="grey lighten-3">

	<nav class="menu-topo white">
		<div class="nav-wrapper">
			<div class="brand-logo"><img class="logo" src="<?php bloginfo('template_directory'); ?>/img/cropped-sebraeufac.png"></div>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="sass.html">Sass</a></li>
				<li><a href="badges.html">Components</a></li>
				<li><a href="collapsible.html">JavaScript</a></li>
			</ul>
		</div>
	</nav>

	<section class="topo parallax-container">
		<div class="parallax"><img src="<?php bloginfo('template_directory'); ?>/img/ufac_foto.jpg"></div>
		<div class="logo-painel pulse"><img id="logo-img" src="<?php bloginfo('template_directory'); ?>/img/logo_1.png"></div>
	</section>


	<div class="">
		<div class="col s12 m8">
			<div id="defaultCountdown"></div>
		</div>
	</div>



	


	<?php get_template_part( 'palestras' ); ?>











	
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.plugin.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.countdown.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/all-animation.min.css">

	<script type="text/javascript">
		$(document).ready(function(){
			var intervalo = window.setInterval(function() {
		    	// alert("Olá mundo");
		    	$(".logo-painel").html("<img src=\'<?php bloginfo('template_directory'); ?>/img/logo_2.png\'>");
		    	// $(".logo-painel").html("oi mundo");
		    }, 3000);
		});
	</script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/funcoes.js"></script>



</body>
</html>