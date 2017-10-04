<?php
require_once "autoloader.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
			///$db=new MySQLiService();
			$db=new PDOService();
			echo "<pre>";
			$films=$db->getAllStudents();
			foreach ($films as $film) {
				var_dump($film);
			}
			echo "</pre>";
			echo ''.sizeof($films);
        ?>
    </body>
</html>
