<div class="container">

<h1>Lista de países</h1>

<?php if (rolOK('usuario')):?>
<form action="<?=base_url()?>pais/c">
	<input type="submit" value="Nuevo"/>
</form>
<?php endif;?>

<table class="table table-striped">

	<tr>
		<th>Nombre</th>
		<th>Acción</th>
	</tr>

    <?php foreach ($paises as $pais):?>
    <tr>
		<td> 
			<?=$pais->nombre?>
		</td>
	
		<td class="row">
		
		<?php if (rolOk('admin')):?>
		<form action="<?=base_url()?>pais/dPost" method="post">
			<button>
				<img src="<?=base_url()?>assets/img/icons/basura.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idPais" value="<?=$pais->id?>"/>
		</form>
		<?php endif;?>
		
		<?php if (rolOK('usuario')):?>
		<form action="<?=base_url()?>pais/u" method="get">
			<button>
				<img src="<?=base_url()?>assets/img/icons/lapiz.png" width="15" height="15"/>
			</button>
			<input type="hidden" name="idPais" value="<?=$pais->id?>"/>
		</form>
		<?php endif;?>
		
		</td>
	
	</tr>
    <?php endforeach;?>
    
    
</table>

</div>