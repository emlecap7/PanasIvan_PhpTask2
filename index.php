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
			$students=$db->getAllCourses();
			foreach ($students as $student) {
				var_dump($student);
			}
			echo "</pre>";
        ?>
    </body>
</html>
