<div class="container">
<h1>Login</h1>

<form action="<?=base_url()?>persona/loginPost" method="post" class="form">
	DNI
	<input type="text" name="dni" class="form-item"/>
	<br/>
	
	Contraseña
	<input type="password" name="password" class="form-item"/>
	<br/>

	<input type="submit" value="Crear"/>
</form>

</div>