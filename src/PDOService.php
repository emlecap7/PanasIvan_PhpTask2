<?php

class PDOService implements IServiceDB
{	
	private $connectDB;
	
	public function connect() {	
        try {
            $this->connectDB = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";charset=".DB_CHARSET, DB_USERNAME, DB_PASSWORD);
        }		
		catch (PDOException $ex) {
			printf("Connection failed: %s", $ex->getMessage());
			exit();
		}
		return true;
	}

	public function getAllStudents()
	{	
		$students=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM course_registration_task2.student')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$students[]=$row;
                 } 
			}
		}
        $this->connectDB=null;
		return $students;
	}
	
	public function getAllCourses()
	{	
		$courses=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM course_registration_task2.course')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$courses[]=new Course($row['id'], $row['code'], $row['name'], 
										$row['description']);
                 } 
			}
		}
        $this->connectDB=null;
		return $courses;
	}

	
	public function getCourseByID($id)
	{	
		$course=null;
		if ($this->connect()) {
			if ($result = $this->connectDB->prepare('SELECT * FROM course_registration_task2.course WHERE id=:id')) {
				$result->execute(array('id'=>$id));
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
				
				$numRows = $result->rowCount();
				if ($numRows==1) {
					$row=$result->fetch();
					$course=new Film($row[0], $row[1], $row[3], $row[2]);
				}
			}
		}
        $this->connectDB=null;
	    return $course;	
	}

    public function getAllCoursesInfo()
	{
		$films=array();
		if ($this->connect()) {
			if ($result = $this->connectDB->query('SELECT * FROM film_info')) {
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
					$actors=array();
					foreach (explode(";",$row['actors']) as $item) {
					   $actor=explode(",",$item);
					   $actors[]=new Actor($actor[0], $actor[1],$actor[2]);
					}
					$categories=array();
					foreach (explode(";",$row['categories']) as $item) {
					   $category=explode(",",$item);
					   $categories[]=new Category($category[0], $category[1]);
					}
					$item=explode(',',$row['language']);
					$language=new Language($item[0], $item[1]);
					$films[]=new FilmInfo($row['id'], $row['title'], $row['description'], 
										$row['year'],  $row=['length'], $actors, $categories, $language);					
                 } 				
			}
		    $this->connectDB=null;
		}
		return $films;
	}

}

