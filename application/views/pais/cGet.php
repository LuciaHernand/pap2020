<div class="container">

<h1>Nuevo país</h1>

<form action="<?=base_url()?>pais/cPost" method="post" class="form">

	Nombre
	<input type="text" name="nombre" class="form-item"/>
	<br />

	<input type="submit" value="Crear"/>
</form>
<button><a href="<?=base_url()?>">Inicio</a></button>

</div>