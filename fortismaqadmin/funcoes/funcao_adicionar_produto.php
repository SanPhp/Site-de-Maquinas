<?PHP
//--------------------------------------------------------------------------------------------
// * ADICIONAR PRODUTO
//--------------------------------------------------------------------------------------------
?>

<?php function AdicionarProduto() { ?>

	<?php
	/**
		 * 
		 * @copyright (c) 2012, SANDRO GONÇALVES
		 */
	
		echo '<center><h1 style="font-size: 22px;">Adicionar Imagem Produto</h1></center>';
	
		if(isset($_POST['submit_form_add_produto'])) {
					
					
			$titulo_produto = $_POST['titulo_produto'];
			$legenda_produto = $_POST['legenda_produto'];
					

					$pasta = '../imagens/imgG/';
					
			     foreach($_FILES['imagem']['error'] as $key => $error) {
				
				
					if($error == UPLOAD_ERR_OK) {
							
						$tmp_name = $_FILES['imagem']['tmp_name'][$key];
						$nome = str_replace(" ", "", (date('dmHisu') . '-' . $_FILES['imagem']['name'][$key]));
						$nome_type = $_FILES['imagem']['type'];
							
					if(!empty($nome)) {
												
							$uploadfile = $pasta . basename($nome);
				$nova = '../imagens/imgP/';
				$largura = 150;  
			       
             	$img = imagecreatefromjpeg($tmp_name);
                $x   = imagesx($img);
                $y   = imagesy($img);
                $altura = ($largura * $y)/$x;
                $nova = imagecreatetruecolor($largura, $altura);
                imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
                imagejpeg($nova, FORTISMAQ_UPLOADPATH_THUBNAILS . $nome);
                imagedestroy($img);
                imagedestroy($nova);
							
							
							
					if(move_uploaded_file($tmp_name, $uploadfile)) {
					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			        $query = "INSERT INTO produto (titulo_produto, legenda_produto, imagem_produto,                           thumbnails_produto) VALUES ('$titulo_produto', '$legenda_produto', '$nome', '$nome')";
			        $sql = mysqli_query($dbc, $query)
					or die('mysqli_error');
			        
					
						echo'<center><p id="sucesso">Imagem produto adicionada com sucesso!</p></center>';
						
						mysqli_close($dbc);
					}
					else {
						echo'<center><p id="error">Erro!</p><center>';
					}
					
						
					
					}//UPLOAD_ERR_OK
										
					}// !empty $nome (IMAGEM)
					else {
						echo '<center><p id="error">Imagem Obrigatória</p></center>';
					}
				
				}//foreach
				
			}//isset
	
	
	?>



	<form id="formulario_geral" action="" method="post" enctype="multipart/form-data">
    
    	<label for="imagem_titulo">Titulo</label>
    	<input type="text" id="titulo_produto" name="titulo_produto">
        
        <label for="imagem_legenda">Legenda</label>
        <input type="text" id="legenda_produto" name="legenda_produto">
    	
        <label for="imagem">Imagem</label>
        <input type="file" id="imagem" name="imagem[]"class="multi" accept="jpg|pjpeg|jpeg" multiple="multiple">
        
        <input type="submit" id="submit_form_add_fotos" name="submit_form_add_produto" value="Adicionar">
    
    
    </form>


<?php }//AdicionarProduto() ?>


<?PHP
//--------------------------------------------------------------------------------------------
// * LISTAR IMAGEM PRODUTOS BACKEND
//--------------------------------------------------------------------------------------------
?>


<?php  function ListarImagemProdutosBackend() { ?>


	<div id="listar_imagem_produtos_backend">
    
    	<?php
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$query = "SELECT * FROM produto ORDER BY id_produto DESC";
			$sql = mysqli_query($dbc, $query)
			or die('msyqli_error');
			
			
			while($row = mysqli_fetch_array($sql)) {
			
				$id_produto = $row['id_produto'];
				$titulo_produto = $row['titulo_produto'];
				$legenda_produto = $row['legenda_produto'];
				$imagem_produto = $row['imagem_produto'];
				$thumbnails_produto = $row['thumbnails_produto'];
			
			
		?>	
        
        
        <figure>
        
   <a href="<?php echo FORTISMAQ_UPLOADPATH_NORMAL . $imagem_produto ?>" class="highslide" onClick="return hs.expand(this)"><img src="<?php echo FORTISMAQ_UPLOADPATH_THUBNAILS . $thumbnails_produto ?>" alt="<?php if(!empty($titulo_produto)) echo $titulo_produto ?>" width="259" height="147"></a>
             
        <div class="highslide-caption">
	   	   <?php if(!empty($legenda_produto)) echo $legenda_produto  ?>
	    </div>
             
       <figcaption><a href="?id_produto=<?php echo $id_produto ?>&img_pro=<?php echo $imagem_produto ?>&pag=produto" title="Deletar?">Deletar</a></figcaption>
       
        </figure>
        
        
        <?php }//while ?>
	
    	<?php mysqli_close($dbc); ?>
        
    </div><!--listar_imagem_produtos_backend-->


<?php }//ListarImagemProdutosBackend() ?>



<?PHP
//--------------------------------------------------------------------------------------------
// * LISTAR IMAGEM PRODUTO FRONTEND
//--------------------------------------------------------------------------------------------
?>

<?php function ListaProdutosImagemFrontend() { ?>

	<?php
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "SELECT * FROM produto ORDER BY id_produto DESC";
		$sql = mysqli_query($dbc, $query)
		or die('mysqli_error');
		
		
		while($row = mysqli_fetch_array($sql)) {
		
			$titulo_produto = $row['titulo_produto'];
			$legenda_produto = $row['legenda_produto'];
			$imagem_produto = $row['imagem_produto'];
			$thumbnails_produto = $row['thumbnails_produto'];
		
		
		?>
        
        
        <figure>
       
       <a href="<?php echo FORTISMAQ_UPLOADPATH_NORMAL_FRONTEND . $imagem_produto ?>" class="highslide" onClick="return hs.expand(this)"><img src="<?php echo FORTISMAQ_UPLOADPATH_THUBNAILS_FRONTEND . $thumbnails_produto  ?>" alt="<?php if(!empty($titulo_produto)) echo $titulo_produto ?>" width="259" height="147"
	   title="Click para Visualizar"></a>

	   <div class="highslide-caption">
	   	<?php if(!empty($legenda_produto)) echo $legenda_produto ?>
	   </div>

       </figure>
        
        
        
        <?php }//while ?>
	
	
	
	





<?php }//ListaProdutosImagemFrontend() ?>








<?PHP
//--------------------------------------------------------------------------------------------
// * DELETAR IMAGEM PRODUTO
//--------------------------------------------------------------------------------------------
?>

<?php function DeletarImagemProduto() { ?>


	<?php
		if(isset($_GET['id_produto']) && isset($_GET['img_pro'])) {
		
			$id_produto = $_GET['id_produto'];
			$imagem_produto = $_GET['img_pro'];
	
	
	
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "DELETE FROM produto WHERE id_produto = '$id_produto'";
		$sql = mysqli_query($dbc, $query)
		or die('mysqli_error');
		
		@unlink(FORTISMAQ_UPLOADPATH_THUBNAILS . $imagem_produto);
		@unlink(FORTISMAQ_UPLOADPATH_NORMAL . $imagem_produto);
		
		
		echo '<script>alert("Imagem produto deletada com sucesso!");</script>';
		
		mysqli_close($dbc);
		
		}//isset id_produto
	
	?>

<?php }//DeletarImagemProduto() ?>


