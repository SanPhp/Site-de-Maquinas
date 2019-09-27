<?php $title = 'Galeria de Fotos - Fortis Maquinas'; ?>
<?php require 'header.php'; ?>

<body>
	<?php $menuGaleria = 'active' ?>
	<?php require 'cabecalho.php'; ?>


<div id="all">

	


	<div id="conteudo_galeria">
    
  		<h1>Galeria</h1>
		<p style="width:350px; margin:35px 0px 0px 460px">Confira algumas imagens de nossa galeria:</p>        
       
       
       
       <div id="galeria">
       
        <?php ListarGaleriaFrontend(); ?>
       
       </div><!--galeria-->
       
       
     
    
    </div><!--conteudo_galeria-->






</div><!--all-->



	<?php require 'footer.php'; ?>




</body>
</html>