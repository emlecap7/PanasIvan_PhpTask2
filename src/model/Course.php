<?php

class Course
{
    public $id;
    public $code;
    public $name;
    public $description;
    public $languages=array();
    

    public function __construct($id, $code, $name, $description)
    {
        $this->id=$id;
        $this->code=$code;
        $this->name=$name;
        $this->description=$description;
    }

}


