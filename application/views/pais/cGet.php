<head>
	<script type="text/javascript">
	var x;
	
	function accionAJAX() {
		var texto = x.responseText;
		alert(texto);
		window.location.href = '<?=base_url()?>pais/r';
	}
	
	function f() {
		x = new XMLHttpRequest();
		x.open("POST","<?=base_url()?>pais/XcPost",true);
		x.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		x.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		x.send('nombre='+document.getElementById('idNombre').value);
		
		x.onreadystatechange = function() {
			if (x.readyState==4 && x.status==200) {
				accionAJAX();
			}
		}
	}
	</script>
</head>

<div class="container">

<h1>Nuevo país</h1>

	Nombre
	<input id="idNombre" type="text" name="nombre" class="form-item"/>
	<br />

	<input type="submit" onclick="f()" value="Crear"/>



</div>