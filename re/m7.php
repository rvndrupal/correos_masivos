<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es-es">
<head>
<title>Menus desplegable solo CSS ejemplo 7 - Recursos CSS - araudi.net</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Keywords" content="recursos, css, diseño web, xhtml, software libre" />
<meta name="Description" content="Pagina dedicada a recursos de diseño web con CSS, en castellano" />
<meta name="Author" content="Mikel Morote Donazar - Praxis Iru&ntilde;ea SLL" />
<meta name="Subject" content="Recursos CSS" />
<meta name="Language" content="espa&ntilde;ol" />
<meta name="Robots" content="index, follow" />
<link rel="alternate" href="http://www.araudi.net/indice.html" title="Indice de contenidos" media="all" lang="es" />
<link rel="stylesheet" href="menu-7.css" type="text/css" />
<style type="text/css">
#menu ul li:focus ul, #menu ul li:active ul, #menu ul li a:active ul {display: block;
position: relative;width: 160px;border: solid 1px #fff;border-top: none;background-color: #6CC;}
#menu ul li:focus span, #menu ul li:active span, #menu ul li a:active {background-color: #6CC;border-bottom: solid 1px #6CC;color: #000;border-left: solid 8px #359BB8;border-right: solid 8px #359BB8;
}
</style>
<!--[if IE]><style>#menu ul li span.nivel1 {display: none;}#menu ul li.nivel1 {margin-bottom:-1px}#menu ul li a:active ul {margin-bottom: 1px;}</style><![endif]-->
</head>
<body>
<div id="menu">
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">Organizacion</span>
<!--[if IE]><a href="#" class="nivel1ie">Opción 1<table class="falsa"><tr><td><![endif]-->
	<ul>
		<li class="primera"><a href="http://www.google.es">Opción </a></li>
		<li><a href="http://www.idplus.org">idplus.org</a></li>
	</ul>
<!--[if IE]></td></tr></table></a><![endif]-->
  </li>
  <li class="nivel1" tabindex="2"><span class="nivel1">Opción 2</span>
<!--[if IE]><a href="#" class="nivel1ie">Opción 2<table class="falsa"><tr><td><![endif]-->
	<ul>
		<li class="primera"><a href="#">Opción 2.1</a></li>
		<li><a href="http://www.google.es">Opción 2.2</a></li>
		<li><a href="#">Opción 2.3</a></li>
		<li><a href="#">Opción 2.4</a></li>
		<li><a href="http://www.idplus.org">idplus.org</a></li>
	</ul>
<!--[if IE]></td></tr></table></a><![endif]-->
</li>
  <li class="nivel1" tabindex="3"><span class="nivel1">Opción 3</span>
<!--[if IE]><a href="#" class="nivel1ie">Opción 3<table class="falsa"><tr><td><![endif]-->
	<ul>
		<li class="primera"><a href="http://www.google.es">Opción 3.1</a></li>
		<li><a href="#">Opción 3.2</a></li>
		<li><a href="http://www.idplus.org">idplus.org</a></li>
	</ul>
<!--[if IE]></td></tr></table></a><![endif]-->
</li>
  <li class="nivel1" tabindex="4"><span class="nivel1">Opción 4</span>
<!--[if IE]><a href="#" class="nivel1ie">Opción 4<table class="falsa"><tr><td><![endif]-->
	<ul>
		<li class="primera"><a href="#">Opción 4.1</a></li>
		<li><a href="#">Opción 4.2</a></li>
		<li><a href="#">Opción 4.3</a></li>
		<li><a href="http://www.idplus.org">idplus.org</a></li>
	</ul>
<!--[if IE]></td></tr></table></a><![endif]-->
</li>
  <li class="nivel1" tabindex="5"><span class="nivel1">Opción 5</span>
<!--[if IE]><a href="#" class="nivel1ie">Opción 5<table class="falsa"><tr><td><![endif]-->
	<ul>
		<li class="primera"><a href="#">Opción 5.1</a></li>
		<li><a href="#">Opción 5.2</a></li>
		<li><a href="http://www.idplus.org">idplus.org</a></li>
	</ul>
<!--[if IE]></td></tr></table></a><![endif]-->
</li>
</ul>
</div>
</body>
</html>