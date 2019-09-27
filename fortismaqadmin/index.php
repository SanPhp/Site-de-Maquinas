<?php $title = 'Home - Fortis Maquinas'; ?>
<?php require 'header.php'; ?>

<body>
	<?php $menuHome = 'active' ?>
	<?php require 'cabecalho.php'; ?>


<div id="all">

	
	<div id="conteudo_administrativo">
    
    
    	<?php
		
			if(isset($_GET['pag'])) {
		
				$pagina = $_GET['pag'];
		
			switch($pagina) {
			
				case 'galeria';
					DeletarFotoGaleria();
					AdicionarFotosGaleria();
					ListarFotoBacked();
				break;	
				
				
				
				case 'banner';
					DeletarBanner();
					AdicionarBanner();
					ListarBannerBackend();
				break;
				
				
				case 'produto';
					DeletarImagemProduto();
					AdicionarProduto();
					ListarImagemProdutosBackend();
				break;
			
			
			}//switch
			
	
			
			}//if isset $_GET['pag'
		
		
		?>
    
    
    
    
    
    </div><!--conteudo_administrativo-->





</div><!--all-->







</body>
</html>