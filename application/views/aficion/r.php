<div class="container">

<h1>Lista de aficiones</h1>

<form action="<?=base_url()?>aficion/c">
	<input type="submit" value="Nueva"/>
</form>

<table class="table table-striped">

<tr>
	<th>Nombre</th>
	<th>Acción</th>
</tr>

<?php foreach ($aficiones as $aficion):?>
	<tr>
		<td> 
			<?=$aficion->nombre?>
		</td>
		
		<td class="row">
		<form action="<?=base_url()?>aficion/dPost" method="post">
			<button>
				<img src="<?=base_url()?>assets/img/icons/basura.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idAficion" value="<?=$aficion->id?>"/>
		</form>
		
		<form action="<?=base_url()?>aficion/u" method="get">
			<button>
				<img src="<?=base_url()?>assets/img/icons/lapiz.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idAficion" value="<?=$aficion->id?>"/>
		</form>
		</td>
		
	</tr>
<?php endforeach;?>
</table>

</div>