<div class="container">

<h1>Lista de aficiones</h1>

<form action="<?=base_url()?>aficion/c">
	<input type="submit" value="Nueva"/>
</form>

<table class="table table-striped">

<tr>
	<th>Nombre</th>
</tr>

<?php foreach ($aficiones as $aficion):?>
	<tr>
		<td> <?=$aficion->nombre?></td>
	</tr>
<?php endforeach;?>
</table>

</div>