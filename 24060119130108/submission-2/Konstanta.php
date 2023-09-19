<html>
 <head>
	<title>Hello World</title>
 </head>
 <body>
	<?php
		define("PWI", "Permograman Web dan Internet ");
		echo 'Hari ini sedang praktikum '.PWI.'<br />';
		$constant_name = "PWI";
		echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';
		//konstanta bawaan PHP
		echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'.
		__LINE__ .'"<br />';
	?>
 </body>
</html>