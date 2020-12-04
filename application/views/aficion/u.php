<div class="container">

<h1>Editar afición</h1>

<form action="<?=base_url()?>aficion/uPost" method="post">
	Nombre
	<input id="idNombre" type="text" name="nombre" class="form-item" value="<?=$pais->nombre?>"/>
	<br />
	
	<input type="hidden" name="id" value="<?=$pais->id?>"/>

	<input type="submit" onclick="f()" value="Crear"/>

</form>

</div>