<?php require 'funcoes/util/connect.php' ?>
<?php require 'funcoes/util/appvars.php' ?>
<?php require 'funcoes/funcao_adicionar_foto_galeria.php' ?>
<?php require 'funcoes/funcao_adicionar_banner.php' ?>
<?php require 'funcoes/funcao_adicionar_produto.php' ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">




<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="css/style_admin.css">
<link href="banner/css/skitter.styles.css" type="text/css" media="all" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../lightbox/lightbox.css">

<script type="text/javascript" src="../lightbox/lightbox-with-gallery.js"></script>
<script type="text/javascript" language="javascript" src="banner/js/jquery-1.6.3.min.js"></script>
<script type="text/javascript" language="javascript" src="banner/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" language="javascript" src="banner/js/jquery.skitter.min.js"></script>


<script type="text/javascript" src="../multi/jquery.js"></script>
<script type="text/javascript" src="../multi/jquery.MultiFile.js"></script>



<link rel="shortcut icon" type="image/png" href="estru/favicon.png">
<link rel="icon" href="estru/favicon.png" sizes="32x32">



<title><?php echo $title; ?></title>


<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('.box_skitter_large').skitter({
				theme: 'clean',
				numbers_align: 'center',
				progressbar: false, 
				dots: false,
				numbers: false, 
				animation: 'cube',
				label: false,
				preview: true
				
			});
		});
	</script>



<script type="text/javascript">
hs.graphicsDir = '../lightbox/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'rounded-white';
hs.fadeInOut = true;
//hs.dimmingOpacity = 0.75;

// Add the controlbar
hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		opacity: 0.75,
		position: 'bottom center',
		hideOnMouseOut: true
	}
});
</script>



</head>