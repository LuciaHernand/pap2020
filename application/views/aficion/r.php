<h1>Lista de aficiones</h1>

<table>

<tr>
	<th>Nombre</th>
</tr>

<?php foreach ($aficiones as $aficion):?>
	<tr>
		<td> <?=$aficion->nombre?></td>
	</tr>
<?php endforeach;?>
</table>