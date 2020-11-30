<h1>Lista de países</h1>

<table>

<tr>
	<th>Nombre</th>
</tr>

<?php foreach ($paises as $pais):?>
	<tr>
		<td> <?=$pais->nombre?></td>
	</tr>
<?php endforeach;?>
</table>