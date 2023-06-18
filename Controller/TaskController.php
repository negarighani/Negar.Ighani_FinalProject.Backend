<?php

namespace Controller;

use Helper\PersonHelper;
use Model\Actions;
use Model\Task;

class  TaskController
{
    public function switcher($uri, $request)
    {
        switch ($uri) {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }
    }

    public function createAction($request)
    {
        $person = new task();
        $person->setFirstName($_POST['firstName']);
        $person->setLastName($_POST['lastName']);
        $person->setUsername($_POST['username']);
        $personHelper = new PersonHelper();
        $personHelper->insert($person);
    }

    public function updateAction($request)
    {
        $person = new Person();
        $person->setFirstName($_POST['firstName']);
        $person->setLastName($_POST['lastName']);
        $person->setUsername($_POST['username']);
        $personHelper = new PersonHelper();
        $personHelper->update($person);
    }

    public function readAction($request)
    {
        $personHelper = new PersonHelper();
        $body = "<table>
                  <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                  </tr>";

        /** @var Person $person */
        $person = $personHelper->fetch($request['id']);
        $body = $body . "  <tr>
            <td>" . $person->getId() . "</td>
            <td>" . $person->getUsername() . "</td>
            <td>" . $person->getFirstName() . "</td>
            <td>" . $person->getLastName() . "</td>
          </tr>";

        $body = $body . "</table>";
        echo $body;
    }

    public function readAllAction($request)
    {
        $personHelper = new PersonHelper();
        $body = "<table>
                  <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                  </tr>";

        /** @var Person $person */
        foreach ($personHelper->fetchAll() as $person) {
            $body = $body . "  <tr>
            <td>" . $person->getId() . "</td>
            <td>" . $person->getUsername() . "</td>
            <td>" . $person->getFirstName() . "</td>
            <td>" . $person->getLastName() . "</td>
          </tr>";
        }
        $body = $body . "</table>";
        echo $body;

    }

    public function deleteAction($request)
    {
        $personHelper = new PersonHelper();
        $personHelper->delete($request['username']);
    }


}