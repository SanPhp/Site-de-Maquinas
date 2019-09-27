<?PHP
//--------------------------------------------------------------------------------------------
// * ADICIONAR FOTOS GALERIA
//--------------------------------------------------------------------------------------------
?>

<?php function AdicionarFotosGaleria() {  ?>

	<?php 
	/**
		 * 
		 * @copyright (c) 2012, SANDRO GONÇALVES
		 */
		echo '<center><h1 style="font-size: 22px;">Adicionar Imagem na Galeria</h1></center>';
	
		if(isset($_POST['submit_form_add_fotos'])) {
					
					
			$titulo_foto = $_POST['titulo_foto'];
			$legenda = $_POST['legenda'];
					

					$pasta = '../imagens/imgG/';
					
			     foreach($_FILES['imagem']['error'] as $key => $error) {
				
				
					if($error == UPLOAD_ERR_OK) {
							
						$tmp_name = $_FILES['imagem']['tmp_name'][$key];
						$nome = str_replace(" ", "", date('dmHisu') . '-' . $_FILES['imagem']['name'][$key]);
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
			        $query = "INSERT INTO galeria (titulo, legenda, imagem, thumbnails) VALUES                              ('$titulo_foto', '$legenda', '$nome', '$nome')";
			        $sql = mysqli_query($dbc, $query)
					or die('mysqli_error');
			        
					
						echo'<center><p id="sucesso">Imagem adicionada com sucesso!</p></center>';
						
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
    	<input type="text" id="titulo_foto" name="titulo_foto">
        
        <label for="imagem_legenda">Legenda</label>
        <input type="text" id="legenda" name="legenda">
    	
        <label for="imagem">Imagem</label>
        <input type="file" id="imagem" name="imagem[]"class="multi" accept="jpg|pjpeg|jpeg" multiple="multiple">
        
        <input type="submit" id="submit_form_add_fotos" name="submit_form_add_fotos" value="Adicionar">
    
    
    </form>


<?php }//adicionar_fotos_galeria() ?>


<?PHP
//--------------------------------------------------------------------------------------------
// * LISTAR FOTOS BACKEND
//--------------------------------------------------------------------------------------------
?>

<?php function ListarFotoBacked() { ?>

	<div id="listar_fotos_backend">
    
    
    <?php
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "SELECT * FROM galeria ORDER BY id_galeria DESC";
		$sql = mysqli_query($dbc, $query)
		or die('mysqli_error');
		
		while($row = mysqli_fetch_array($sql)) {
		
			$id_galeria = $row['id_galeria'];
			$titulo = $row['titulo'];
			$legenda = $row['legenda'];
			$imagem = $row['imagem'];
			$thumbnails = $row['thumbnails'];
		
		
		?>
        
        
        <figure>
        
        <a href="<?php echo FORTISMAQ_UPLOADPATH_NORMAL . $imagem ?>" class="highslide" onClick="return         hs.expand(this)"><img src="<?php echo FORTISMAQ_UPLOADPATH_THUBNAILS . $thumbnails ?>" alt="<?php if(!empty($titulo)) echo $titulo ?>" width="150" height="112"></a>
             
        <div class="highslide-caption">
	   	   <?php if(!empty($legenda)) echo $legenda  ?>
	    </div>
             
       <figcaption><a href="?id_galeria=<?php echo $id_galeria ?>&img_nom=<?php echo $imagem ?>&pag=galeria" title="Deletar?">Deletar</a></figcaption>
       
        </figure>
        

        
        <?php }//while ?>
	
	<?php mysqli_close($dbc); ?>
    
    </div><!--listar_fotos_backend-->



<?php }//ListarFotoBacked ?>


<?PHP
//--------------------------------------------------------------------------------------------
// * LISTAR FOTOS FRONTEND
//--------------------------------------------------------------------------------------------
?>

<?php function ListarGaleriaFrontend() { ?>

	
	<?php 
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "SELECT * FROM galeria ORDER BY id_galeria DESC";
		$sql = mysqli_query($dbc, $query)
		or die('mysqli_error');
		
		while($row = mysqli_fetch_array($sql)) {
		
		$titulo = $row['titulo'];
		$legenda = $row['legenda'];
		$imagem = $row['imagem'];
		$thumbnails = $row['thumbnails'];
		
		
		?>
        
        
       <figure>
       
       <a href="<?php echo FORTISMAQ_UPLOADPATH_NORMAL_FRONTEND . $imagem ?>" class="highslide" onClick="return hs.expand(this)"><img src="<?php echo FORTISMAQ_UPLOADPATH_THUBNAILS_FRONTEND . $thumbnails ?>" alt="<?php if(!empty($titulo)) echo $titulo ?>" width="130" height="113"
	   title="Click para Visualizar"></a>

	   <div class="highslide-caption">
	   		<?php if(!empty($legenda)) echo $legenda ?>
	   </div>

       </figure>
        
        
        
        
        <?php }//while ?>
	
	
	
	




<?php }//ListarGaleriaFrontend() ?>









<?PHP
//--------------------------------------------------------------------------------------------
// * DELETAR FOTO GALERIA
//--------------------------------------------------------------------------------------------
?>

<?php function DeletarFotoGaleria() { ?>

	<?php
		if(isset($_GET['id_galeria']) && isset($_GET['img_nom'])) {
	
			$id_galeria = $_GET['id_galeria'];
			$imagem = $_GET['img_nom'];
	
	
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "DELETE FROM galeria WHERE id_galeria = '$id_galeria'";
		$sql = mysqli_query($dbc, $query)
		or die('mysqli_error');
		
		@unlink(FORTISMAQ_UPLOADPATH_THUBNAILS . $imagem);
		@unlink(FORTISMAQ_UPLOADPATH_NORMAL . $imagem);
		
		
		//echo '<center><p id="sucesso">Imagem deletada com sucesso!</p></center>';
		echo '<script>alert("Imagem deletada com sucesso!");</script>';
	
		mysqli_close($dbc);
		
		}// if_isset
	
	?>



<?php }//DeletarFotoGaleria ?>