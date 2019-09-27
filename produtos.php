<?php $title = 'Produtos - Fortis Maquinas'; ?>
<?php require 'header.php'; ?>

<body>
	<?php $menuProdutos = 'active' ?>
	<?php require 'cabecalho.php'; ?>


<div id="all">

	


	<div id="conteudo_produtos">
    
  		<h1>Produtos</h1>
		<p>Algumas imagens de nossos produtos:</p>        
       
        <div id="produtos">
       
      <?php ListaProdutosImagemFrontend(); ?>
       
       
       
       
       </div><!--produtos-->
       
     
       
     
    
    </div><!--conteudo_produtos-->






</div><!--all-->



	<?php require 'footer.php'; ?>




</body>
</html>