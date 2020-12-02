<div class="container">

<h1>Lista de personas</h1>

<form action="<?=base_url()?>persona/c">
	<input type="submit" value="Nuevo"/>
</form>


<table class="table table-striped">
	<tr>
		<th>DNI</th>
		<th>Nombre</th>
		<th>País</th>
		<th>Aficiones</th>
	</tr>

    <?php foreach ($personas as $persona):?>
    <tr>
		<td> <?=$persona->dni?> 	</td>
		<td> <?=$persona->nombre?> 	</td>
		<td><?=$persona->fetchAs('pais')->nace->nombre?>	</td>
		<td>
			<?php foreach ($persona->ownGustoList as $gusto):?>
				<?= $gusto->aficion->nombre ?> 
			<?php endforeach;?>
		</td>
	</tr>
    <?php endforeach;?>
</table>

</div>