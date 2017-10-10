<?php

interface IServiceDB
{
    public function connect();
    public function getAllCourses();
    public function getAllStudents();
    public function getCourseByID($id);
    public function getAllCoursesInfo();
}