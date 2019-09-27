<?php $title = 'Contato - Fortis Maquinas'; ?>
<?php require 'header.php'; ?>

<body>
	<?php $menuContato = 'active' ?>
	<?php require 'cabecalho.php'; ?>


<div id="all">

	


	<div id="conteudo_contato">
    
  		<h1>Contato</h1>
		<p>Aqui é o seu canal de comunicação com a Fotis Maq! Preencha o 
           formulário abaixo e esclareça todas as suas dúvidas sobre peças 
           e mão de obra oferecidos. 
           Depois, é só aguardar o breve retorno de nossa equipe.</p>        
       
       
       
        <div id="contato">
       
      
      	 <?php 
		 
		if(isset($_POST['submit']) and $_POST['submit'] == 'contato') {
		
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$telefone = $_POST['fone'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$mensagem = $_POST['mensagem'];
			
			
			
	
	if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($cidade) && !empty($estado) && !empty($mensagem)) {	
			
		
	$from = 'Fortis Maquinas';
	$to = 'fortismaquinas@hotmail.com, sandro@hrsweb.com.br';
	$subject = 'Contato Fortis Maquinas';
	$msg = "Formulário de Contato do Site: $from \n" .
	        "Nome: $nome \n" .
	        "Email: $email \n" .
			"Fone: $telefone \n" .
			"Cidade: $cidade \n" .
			"Estado: $estado \n" .
			"Mensagem: $mensagem";
	        mail($to, $subject, $msg);
			echo '<p id="sucesso">Mensagem enviada com sucesso!</p>';
			
			
			echo '<script language= "JavaScript">
                     alert("Mensagem Enviada com sucesso!");
                  </script>';
			
			echo '<script language= "JavaScript">
                     location.href="contato.php"
                  </script>';
		
		
			$nome = '';
			$email = '';
			$telefone = '';
			$cidade = '';
			$estado = '';
			$mensagem = '';
		
	
	}// if !empty
	else {
		//echo '<p id="error">Preencha todos os campos do formulario!</p>';
		echo '<script language= "JavaScript">
                     alert("Por favor, Preencha todos os campos do formulário!");
                  </script>';
	}
	
}// if isset
?>  
                 
             
           
      
      
      
      	<form action="" method="post" id="form_contato">
        
        	
        	<input type="text" id="nome" name="nome" value="<?php if(!empty($nome)) echo $nome ?>">
            
            <input type="email" id="email" name="email" value="<?php if(!empty($email)) echo $email ?>">
            
            <input type="tel" id="fone" name="fone" value="<?php if(!empty($telefone)) echo $telefone ?>">
            
            <input type="text" id="cidade" name="cidade" value="<?php if(!empty($cidade)) echo $cidade ?>">
            
            <input type="text" id="estado" name="estado" value="<?php if(!empty($estado)) echo $estado ?>">
            
            <textarea id="mensagem" name="mensagem"><?php if(!empty($mensagem)) echo $mensagem ?></textarea>
            
            <input type="image" src="estru/btn_submit.png" id="submit" name="submit" value="contato">
        
        </form>
      
      
      
      <p id="fale"><span>Fale Conosco:</span><br><br> Rua Garrincha do Mato Grosso, 254<br>
                 Vale das Perobas<br>
                 Arapongas - PR<br>

                 Cep: 86709-742</p>
                 
                 
        <p id="horario">Horário de Atendimento<br>
           De Segunda à Sábado das 8:00 às 18:00 h.</p>
           
           
        <p id="quatro">(43) 3312-1001</p>  
        
        <p id="compra_email">compras@fortismaqequipamentos.com.br<br>
		   nfe@fortismaqequipamentos.com.br<br>
           financeiro@fortismaqequipamentos.com.br</p> 
           
           
         <p id="como">Como chegar:</p>
           
        <div id="contato_mapa">
        <iframe width="226" height="238" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-PT&amp;geocode=&amp;q=Rua+Garrincha+do+Mato+Grosso,+254,+Jardim+Petr%C3%B3polis,+PR&amp;aq=1&amp;oq=Rua+Garrincha+do+Mato+Grosso,+254&amp;sll=-23.416547,-51.457274&amp;sspn=0.011991,0.013797&amp;ie=UTF8&amp;hq=&amp;hnear=Rua+Garrincha+do+Mato+Grosso,+254+-+Jardim+Petr%C3%B3polis,+Paran%C3%A1&amp;t=m&amp;ll=-23.40369,-51.458137&amp;spn=0.002343,0.002414&amp;z=17&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-PT&amp;geocode=&amp;q=Rua+Garrincha+do+Mato+Grosso,+254,+Jardim+Petr%C3%B3polis,+PR&amp;aq=1&amp;oq=Rua+Garrincha+do+Mato+Grosso,+254&amp;sll=-23.416547,-51.457274&amp;sspn=0.011991,0.013797&amp;ie=UTF8&amp;hq=&amp;hnear=Rua+Garrincha+do+Mato+Grosso,+254+-+Jardim+Petr%C3%B3polis,+Paran%C3%A1&amp;t=m&amp;ll=-23.40369,-51.458137&amp;spn=0.002343,0.002414&amp;z=17&amp;iwloc=A" style="color:#0000FF;text-align:left"></a></small>
        </div><!---->
                 
                 
               
      
      
       
       </div><!--contato-->
       
     
    
    </div><!--conteudo_contato-->






</div><!--all-->



	<?php require 'footer.php'; ?>




</body>
</html>