<?PHP
//--------------------------------------------------------------------------------------------
// * ADICONAR BANNER
//--------------------------------------------------------------------------------------------
?>


<?php function AdicionarBanner() { ?>

	<?php

	/**
		 * 
		 * @copyright (c) 2012, SANDRO GONÇALVES
		 */
		echo '<center><h1 style="font-size: 22px;">Adicionar Banner</h1></center>';
	
		if(isset($_POST['submit_form_add_banner'])) {
		
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
			$titulo_banner = $_POST['titulo_banner'];
			$link_banner = $_POST['link_banner'];
			$imagem_banner = str_replace(" ", "", date('dmHisu') . '-' . $_FILES['imagem_banner']['name']);
			$imagem_banner_size = $_FILES['imagem_banner']['size'];
			$imagem_banner_type = $_FILES['imagem_banner']['type'];
			
			
			if(($imagem_banner_type == 'image/jpg') || ($imagem_banner_type == 'image/jpeg') || ($imagem_banner_type == 'image/pjpeg') || ($imagem_banner_type == 'image/png') && ($imagem_banner_size > 0) && ($imagem_banner_size <= FORTISMAQ_MAXFILESIZE)) {
			
			
				$target = FORTISMAQ_UPLOADPATH_BANNER . $imagem_banner;
				if(move_uploaded_file($_FILES['imagem_banner']['tmp_name'], $target)) {
				
					$query = "INSERT INTO banner (titulo_banner, link_banner, imagem_banner) VALUES (                             '$titulo_banner', '$link_banner', '$imagem_banner')";
					$sql = mysqli_query($dbc, $query)
					or die('mysqli_error');
				
				
					echo '<center><p id="sucesso">Banner adicionado com sucesso!</p></center>';
				
				
				}//if move_uplodaded_file
			
			
			
			
			
			}// imagem type and imagem size
			else {
				echo '<center><p id="error">A imagem é obrigatória e deve ser em JPG ou PNG e menor que 1MB!</p></center>';
			}//else type
		

		
		}//if_isset submit banner
	
	
	
	?>



	<form id="formulario_geral" action="" method="post" enctype="multipart/form-data">
    
    	<label for="imagem_titulo">Titulo</label>
    	<input type="text" id="titulo_banner" name="titulo_banner">
        
        <label for="imagem_legenda">Link</label>
        <input type="text" id="link_banner" name="link_banner">
    	
        <label for="imagem">Imagem</label>
        <input type="file" id="imagem_banner" name="imagem_banner">
        
        <input type="submit" id="submit_form_add_banner" name="submit_form_add_banner" value="Adicionar">
    
    
    </form>



<?php }//AdicionarBanner() ?>


<?PHP
//--------------------------------------------------------------------------------------------
// * LISTAR BANNER BACKEND
//--------------------------------------------------------------------------------------------
?>

<?php  function ListarBannerBackend() { ?>

	<div id="listar_banner_backend">
    
    
    <?php
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "SELECT * FROM banner ORDER BY id_banner DESC";
		$sql = mysqli_query($dbc, $query)
		or die('mysqli_error');
		
		
		while($row = mysqli_fetch_assoc($sql)) {
		
			$id_banner = $row['id_banner'];
			$titulo_banner = $row['titulo_banner'];
			$link_banner = $row['link_banner'];
			$imagem_banner = $row['imagem_banner'];
		
		
		
	?>	
    
    	<figure>
        	<img src="<?php echo FORTISMAQ_UPLOADPATH_BANNER . $imagem_banner ?>" alt="<?php if(!empty(             $titulo_banner)) echo $titulo_banner ?>" width="450" height="156">
            
             <figcaption><a href="?id_banner=<?php echo $id_banner ?>&img_ban=<?php echo $imagem_banner ?>&pag=banner"              title="Deletar?">Deletar</a></figcaption>
        </figure>
    
    
    <?php }//while ?>
    
	<?php mysqli_close($dbc); ?>
    
    </div><!--listar_banner_backend-->


<?php }//ListarBannerBackend() ?>


<?PHP
//--------------------------------------------------------------------------------------------
// * LISTAR BANNER FRONTEND
//--------------------------------------------------------------------------------------------
?>

<?php function ListarBannerFrontend() { ?>


	<?php
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "SELECT * FROM banner ORDER BY id_banner DESC";
		$sql = mysqli_query($dbc, $query)
		or die('mysqli_error');
		
		
		while($row = mysqli_fetch_array($sql)) {
		
			$titulo_banner = $row['titulo_banner'];
			$link_banner = $row['link_banner'];
			$imagem_banner = $row['imagem_banner'];
			
		
		?>
        
        
        <li><a href="<?php if(!empty($link_banner)) { echo $link_banner; }  else {  echo '#'; }  ?>"><img src="<?php echo FORTISMAQ_UPLOADPATH_BANNER_FRONTEND . $imagem_banner ?>" class="cube"></a><div class="label_text"><p></p></div></li>
        
        
        
        
        
        <?php }//while ?>
	
	





<?php }//ListarBannerFrontend() ?>










<?PHP
//--------------------------------------------------------------------------------------------
// * DELETAR BANNER
//--------------------------------------------------------------------------------------------
?>


<?php function DeletarBanner() { ?>


	<?php
		if(isset($_GET['id_banner']) and isset($_GET['img_ban'])) {
	
			$id_banner = $_GET['id_banner'];
			$imagem_banner = $_GET['img_ban'];
	
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "DELETE FROM banner WHERE id_banner = '$id_banner'";
		$sqll = mysqli_query($dbc, $query)
		or die('mysqli_error');
		
		
		@unlink(FORTISMAQ_UPLOADPATH_BANNER . $imagem_banner);
		
		
		echo '<script>alert("Banner deletado com suceso!");</script>';
		
		mysqli_close($dbc);
		
		}//if isset id_banner...
	
	
	?>




<?php }//DeletarBanner() ?>