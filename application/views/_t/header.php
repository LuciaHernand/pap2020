<header class="container">
	<?php if (!isset($_header['usuario'])):?>
    	<a href="<?=base_url()?>registro">Registro</a>/
    	<a href="<?=base_url()?>login">Login</a>
    <?php else: ?>
    	Hola <?= $_header['usuario']->nombre ?> /
    	<a href="<?=base_url()?>logout">Logout</a>
    <?php endif; ?>
</header>
