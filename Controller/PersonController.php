<?php

namespace Controller;

use Helper\PersonHelper;
use Model\Actions;
use Model\Person;

class PersonController
{
    /**
     * @throws \Exception
     */
    public function switcher($uri, $request)
    {
        switch ($uri) {
            case Actions::SIGN_UP:
                $this->signUpAction($request);
                break;
            case Actions::LOGIN:
                $this->loginAction($request);
                break;
            default:
                break;
        }
    }

    /**
     * @throws \Exception
     */
    public function signUpAction($request)
    {
        $person = new Person();
        $person->setFirstName($_POST['firstName']);
        $person->setLastName($_POST['lastName']);
        $person->setUsername($_POST['username']);
        $personHelper = new PersonHelper();
        $personHelper->insert($person);
    }

    /**
     * @throws \Exception
     */
    public function loginAction($request)
    {
        $personHelper = new PersonHelper();

        $person = $personHelper->fetch($request['username'],$request['password']);
        return json_encode($person);
    }


}