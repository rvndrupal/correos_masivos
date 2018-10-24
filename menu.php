

<html>
	<head>
		<title>INICIO</title>
		<style type="text/css">
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:570px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
		</style>
	</head>
	<body>

		<div id="header" align="center">
			<ul class="nav">
				<li><a href="index.php" target="_parent" >INICIO</a></li>				
			
				<li><a href="busqueda.php" target="_parent">DIRECTORIO</a>
					<ul>
						<li><a href="busqueda.php" target="_parent">DIRECTORIO SENASICA</a></li>
					</ul>
				</li>
				<li><a href="http://www.gob.mx/senasica" target="_parent">SENASICA</a></li>
				<li><a href="cerrar.php" target="_parent">CERRAR SESIÓN</a></li>
			</ul>
		</div>	
	</body>
</html>