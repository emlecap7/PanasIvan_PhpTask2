<?php

class CourseInfo extends Course
{
    public $students=array();

    public function __construct($id, $code, $name, $description, $students, $languages)
    {
        parent::__construct($id, $title, $description, $releaseYear, $length);
        $this->students=$students;
        $this->languages=$languages;
    }
}

