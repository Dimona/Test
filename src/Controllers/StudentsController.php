<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 12:36
 */

namespace src\Controllers;

use Framework\Messages\Message;
use Framework\Renderer\Renderer;
use Framework\Router\Router;
use src\Models\Students;

/**
 * Class StudentsController
 * @package src\Controllers
 */
class StudentsController
{
    /**
     * Controller for the showing of main student's page
     *
     * @return string
     */
    public function showAction()
    {
        $students = new Students();
        $students = $students->find();
        $headers = count($students) ? array_keys($students[0]) : array();
        $renderer = new Renderer('students');
        $renderer->assign('students', $students);
        $renderer->assign('headers', $headers);
        return $renderer->render();
    }

    /**
     * Controller for clicking on one student's record
     *
     * @param $id
     * @return string
     */
    public function editAction($id)
    {
        $students = new Students();
        $students = $students->find(array('id' => $id));
        $student = array_shift($students);
        $renderer = new Renderer('student');
        $renderer->assign('student', $student);
        $renderer->assign('isEdit', true);
        return $renderer->render();
    }

    /**
     * Controller for clicking on [Add Student] button
     *
     * @return string
     */
    public function addAction()
    {
        $renderer = new Renderer('student');
        $renderer->assign('isEdit', false);
        return $renderer->render();
    }

    /**
     * Controller for submitting of the updating student's record
     *
     * @param $id
     */
    public function updateAction($id)
    {
        $student = new Students();
        $params = $_POST;
        $params['id'] = $id;
        $message = ($student->save($params)) ? new Message(array('type'=>'success', 'text'=>'The student is successfully updated')) : new Message(array('type'=>'danger', 'text'=>'Error during updating'));
        $message->send();
        header("Location: " . Router::getInstance()->generate('showStudents'));
        exit();
    }

    /**
     * Controller for submitting of the inserting student's record
     *
     */
    public function insertAction()
    {
        $student = new Students();
        $params = $_POST;
        $message = ($student->save($params)) ? new Message(array('type'=>'success', 'text'=>'The student is successfully inserted')) : new Message(array('type'=>'danger', 'text'=>'Error during inserting'));
        $message->send();
        header("Location: " . Router::getInstance()->generate('showStudents'));
        exit();
    }

    /**
     * Controller for submitting of the deleting student's record or records
     *
     */
    public function removeAction()
    {

        $students = new Students();
        $params = $_POST['id'];
        $msgInjection = (count($params) > 1) ? 'students are' : 'student is';
        $message = ($students->remove($params)) ? new Message(array('type'=>'success', 'text'=>'The ' . $msgInjection . ' successfully deleted')) : new Message(array('type'=>'danger', 'text'=>'Error during deleting'));
        $message->send();
        header("Location: " . Router::getInstance()->generate('showStudents'));
        exit();
    }


}