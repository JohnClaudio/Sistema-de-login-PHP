<main>
	<div class="row justify-content-md-center">
		<h3 class="text-center text-warning mt-5"> PHP Login System</h3>
		<div class="col-sm-4 mt-5">
		
		<?php if(isset($_SESSION['CADASTRO_CONCLUIDO'])): ?>
		
		<div class="alert alert-success" role="alert">
          Cadastro Realizado com sucesso!
        </div>
		<?php SESSION_UNSET($_SESSION['CADASTRO_CONCLUIDO']); endif;  ?>
		
		<?php if(isset($_SESSION['EMAIL_EXISTENTE'])): ?>
		
		<div class="alert alert-danger" role="alert">
          Este email já está cadastrado
        </div>
		<?php  SESSION_UNSET($_SESSION['EMAIL_EXISTENTE']); endif; ?>
		
			<form  METHOD="POST">
			
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text icone">
							<i class="fas fa-user"></i>
						</span>
					</div>
					<input type="text" name="nome" class="form-control formulario" placeholder="digite seu nome" required>
					</div>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text icone">
								<i class="fas fa-envelope"></i>
							</span>
						</div>
						<input type="email" name="email" class="form-control formulario" placeholder="digite seu email" required>
						</div>
						
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text icone">
									<i class="fas fa-key"></i>
								</span>
							</div>
							<input type="password" name="password" class="form-control formulario" placeholder="password" required>
							</div>
							
							<button class="btn btn-danger btn-lg botao mt-4" name="cadastro" value="true" type="submit">Cadastrar</button>
					</form>
					
				</div>
				
					<a class="text-white smalltext mt-4" href="index.php"> Ja tenho uma conta </a>
				</div>
</main>