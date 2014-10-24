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

    'getStudents' => array(
        "pattern" => "/students",
        "requirements" => array(
            "method" => "GET"
        ),
        'controller' => 'StudentsController',
        'action' => 'show'
    )

    /*   'getTeam' => array(
           "pattern" => "/teams/{id}",
           "requirements" => array(
               "method" => "GET",
               "id" => '\d+'
           ),
           'controller' => 'Teams',
           'action' => 'get'
       ),

       'editTeam' => array(
           "pattern" => "/teams/{id}",
           "requirements" => array(
               "method" => "POST",
               "id" => '\d+'
           ),
           'controller' => 'Teams',
           'action' => 'edit'
       ),

       'addTeam' => array(
           "pattern" => "/teams",
           "requirements" => array(
               "method" => "POST"
           ),
           'controller' => 'Teams',
           'action' => 'add'
       ),

       'getTeams' => array(
           "pattern" => "/teams",
           "requirements" => array(
               "method" => "GET"
           ),
           'controller' => 'Teams',
           'action' => 'index'
       )*/
);