<div class="container">

<h1>Lista de personas</h1>

<form action="<?=base_url()?>persona/c">
	<input type="submit" value="Nuevo"/>
</form>


<table class="table table-striped">
	<tr>
		<th>(rol)</th>
		<th>DNI</th>
		<th>Nombre</th>
		<th>País</th>
		<th>Aficiones</th>
		<th>Acción</th>
	</tr>

    <?php foreach ($personas as $persona):?>
    <tr>
		<td> <?=$persona->rol->nombre?> 	</td>
		<td> <?=$persona->dni?> 	</td>
		<td> <?=$persona->nombre?> 	</td>
		<td><?=$persona->nace_id != null ? $persona->fetchAs('pais')->nace->nombre : '-'?>	</td>
		<td>
			<?php foreach ($persona->ownGustoList as $gusto):?>
				<?= $gusto->aficion->nombre ?> 
			<?php endforeach;?>
		</td>
		
		<td class="row">
		
		<form action="<?=base_url()?>persona/dPost" method="post">
			<button>
				<img src="<?=base_url()?>assets/img/icons/basura.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idPersona" value="<?=$persona->id?>"/>
		</form>
		
		<form action="<?=base_url()?>persona/u" method="get">
			<button>
				<img src="<?=base_url()?>assets/img/icons/lapiz.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idPersona" value="<?=$persona->id?>"/>
		</form>

		</td>
	</tr>
    <?php endforeach;?>
</table>

</div>