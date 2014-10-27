<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 23.10.14
 * Time: 21:15
 */

return array(
    'home' => array(
        'pattern' => '/',
        'controller' => 'HomeController',
        'action' => 'index'
    ),

    'showStudents' => array(
        "pattern" => "/students",
        'controller' => 'StudentsController',
        'action' => 'show',
        "requirements" => array(
            "method" => "GET"
        )
    ),

    'addStudent' => array(
        "pattern" => "/students/add",
        'controller' => 'StudentsController',
        'action' => 'add',
        "requirements" => array(
            "method" => "GET"
        )
    ),

    'editStudent' => array(
        "pattern" => "/students/{id}/edit",
        'controller' => 'StudentsController',
        'action' => 'edit',
        "requirements" => array(
            "method" => "GET",
            "id" => '\d+'
        )
    ),

    'updateStudent' => array(
        "pattern" => "/students/{id}/update",
        'controller' => 'StudentsController',
        'action' => 'update',
        "requirements" => array(
            "method" => "POST",
            "id" => '\d+'
        )
    ),

    'insertStudent' => array(
        "pattern" => "/students/insert",
        'controller' => 'StudentsController',
        'action' => 'insert',
        "requirements" => array(
            "method" => "POST"
        )
    ),

    'removeStudent' => array(
        "pattern" => "/students/remove",
        'controller' => 'StudentsController',
        'action' => 'remove',
        "requirements" => array(
            "method" => "POST"
        )
    )
);