<?php

	 require 'vendor/autoload.php';
	 $loader = new Twig_Loader_FileSystem('templates');
	 $twig = new Twig_Environment($loader);

	 $users = array(
	 		array("name" => "jean", "age" => 19),
	 		array("name" => "isaias", "age" => 20),
	 		array("name" => "pedro", "age" => 15)
	 	);

	 echo $twig->render("hellow.html", array(
	 	'name' => 'Jean',
	 	'age' => 15,
	 	'users' => $users
	 	));


?>
