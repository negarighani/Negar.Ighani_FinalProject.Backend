<?php

namespace Helper;

use Model\Person;

class PersonHelper
{
    public function __construct()
    {
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "CREATE TABLE IF NOT EXISTS person (id INT AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR(255) NOT NULL,last_name VARCHAR(255) NOT NULL,username VARCHAR(255) NOT NULL,password VARCHAR(255) NOT NULL, role BOOLEAN DEFAULT 1 )";
        $dbHelper->execQuery($sql);
        if ($dbHelper->execQuery($sql)) {
            $sql2 = "INSERT INTO person (first_name, last_name, username,password,role)VALUES ('NEG', 'IGH', 'ADMIN','ADMIN',0)";
            $dbHelper->execQuery($sql2);
//            echo "table added successfully";
        } else {
//            echo "An Error Occurred";
        }
    }

    /**
     * @throws \Exception
     */
    public function insert(Person $person)
    {
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "INSERT INTO person (first_name, last_name, username,password) VALUES ('" . $person->getFirstName() . "', '" . $person->getLastName() . "', '" . $person->getUsername() . "', ' " . $person->getPassword() . "')";
        if ($dbHelper->execQuery($sql)) {
//            echo "Record added successfully";
        } else {
//            echo "An Error Occurred";
        }
    }

    /**
     * @throws \Exception
     */
    public function fetch(int $username, $password)
    {
        $person = new Person();
        /** @var DBConnector $dbHelper */
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "SELECT * FROM person WHERE username=" . $username . " AND the_password=" . $password;
        $result = $dbHelper->execQuery($sql);
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $person->setId($row[0]['id']);
        $person->setUsername($row[0]['username']);
        $person->setFirstName($row[0]['first_name']);
        $person->setLastName($row[0]['last_name']);
        return $person;
    }

    public function fetchAll()
    {
        $persons = [];
        /** @var DBConnector $dbHelper */
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $result = $dbHelper->execQuery("SELECT * FROM person ORDER BY ID");
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($rows as $row) {
            $person = new Person();
            $person->setId($row['id']);
            $person->setUsername($row['username']);
            $person->setFirstName($row['first_name']);
            $person->setLastName($row['last_name']);
            $persons[] = $person;
        }
        return $persons;
    }


}