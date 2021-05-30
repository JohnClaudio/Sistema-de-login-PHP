
<main>

<div class="row justify-content-md-center">
<h3 class="text-center text-warning mt-5"> PHP Login System</h3>

<div class="col-sm-4 mt-5">

	<?php if(isset($_SESSION['FALHA_LOGIN'])): ?>
		
		<div class="alert alert-danger" role="alert">
          Email ou Senha incorretos tente novamente.
        </div>
		<?php  SESSION_UNSET($_SESSION['EMAIL_EXISTENTE']); endif; ?>
		
<form  METHOD="POST">

    <div class="input-group form-group">
   
    	<div class="input-group-prepend">
    	<span class="input-group-text icone"><i class="fas fa-user"></i></span>
    	</div>
    	<input type="text" name="nome" class="form-control formulario" placeholder="username">   				
    </div>
    
    <div class="input-group form-group">
    
    	<div class="input-group-prepend">
    	<span class="input-group-text icone"><i class="fas fa-key"></i></span>
    	</div>
    	<input type="password" class="form-control formulario" placeholder="password">  						
    </div>

    <button class="btn btn-warning btn-lg botao mt-4 " name="btnLogin" type="submit"> Login</button>

</form>

</div>
<a class="text-danger smalltext mt-4" href="cadastro.php"> Nao tenho cadastro </a>
</div>

</main>