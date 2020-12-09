<div class="container">
<h1>Editar persona</h1>

<form action="<?=base_url()?>persona/uPost" method="post" class="form">
	DNI
	<input type="text" name="dni" class="form-item" value="<?=$persona->dni?>"/>
	<br/>
	
	Nombre
	<input type="text" name="nombre" class="form-item" value="<?=$persona->nombre?>"/>
	<br/>
	
	País nacimiento
	<select name="idPais">
		<?php foreach ($paises as $pais):?>
		<option value="<?=$pais->id?>" <?= (($pais->id == $persona->nace_id)?'selected="selected"':'')?> ><?=$pais->nombre?></option>
		<?php endforeach;?>
	</select>
	<br/>
	
	<fieldset>
	<legend>Aficiones</legend>
	<?php foreach ($aficiones as $aficion):?>
		<input id="id-<?=$aficion->id?>" type="checkbox" name="idAficiones[]" value="<?=$aficion->id?>"/>
		<label for="id-<?=$aficion->id?>"><?=$aficion->nombre?></label> 
	<?php endforeach;?>
	</fieldset>
	<br/>
	
	<input type="submit" value="Crear"/>
</form>

</div>