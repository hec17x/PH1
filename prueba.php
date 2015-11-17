<?php
if(isset($_COOKIE['nomUser']))
{
// Caduca en un año
setcookie('nomUser', $_COOKIE['nomUser'] + 1, time() + 365 * 24 * 60 * 60);
$mensaje = 'Número de visitas: ' .$_COOKIE['nomUser'];
}
else
{

// Caduca en un año
setcookie('nomUser', 1, time() + 365 * 24 * 60 * 60);
$mensaje = 'Bienvenido a nuestra página web';
}
?>



<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Prueba de cookie</title>
</head>
<body>
<p>
<?php echo $mensaje; ?>
</p>
</body>
</html>