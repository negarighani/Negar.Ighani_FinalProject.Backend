<?php

namespace Helper;

use Model\Task;

class TaskHelper
{


    public function __construct()
    {
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "CREATE TABLE IF NOT EXISTS task (id INT AUTO_INCREMENT PRIMARY KEY, title VARCHAR(255) NOT NULL,description VARCHAR(255) NOT NULL,status VARCHAR(255) NOT NULL)";
        if ($dbHelper->execQuery($sql)) {
//            echo "table added successfully";
        } else {
//            echo "An Error Occurred";
        }
    }
    /**
     * @throws \Exception
     */
    public function insert(Task $task)
    {
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "INSERT INTO task (title, description, status) VALUES ('" . $task->getTitle() . "', '" . $task->getDescription() . "', '" . $task->getStatus() . "')";
        if ($dbHelper->execQuery($sql)) {
//            echo "Record added successfully";
        } else {
//            echo "An Error Occurred";
        }
    }

    /**
     * @throws \Exception
     */
    public function fetch(int $id): ?Task
    {
        $task = new Task();
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $result = $dbHelper->execQuery("SELECT * FROM task WHERE id =" . $id);
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $task->setId($row[0]['id']);
        $task->setTitle($row[0]['title']);
        $task->setDescription($row[0]['description']);
        $task->setStatus($row[0]['status']);

        return $task;
    }

    /**
     * @throws \Exception
     */
    public function fetchAll(): ?array
    {
        $tasks = [];
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $result = $dbHelper->execQuery("SELECT * FROM task ORDER BY ID");
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($rows as $row) {
            $task = new Task();
            $task->setId($row[0]['id']);
            $task->setTitle($row[0]['title']);
            $task->setDescription($row[0]['description']);
            $task->setStatus($row[0]['status']);
            $persons[] = $task;
        }
        return $persons;
    }

    /**
     * @throws \Exception
     */
    public function update(Task $task)
    {
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "UPDATE task SET title = '" . $task->getTitle() . "', description = '" . $task->getDescription() ."', status = '" . $task->getStatus() . "' WHERE id = '" . $task->getId() . "'";
        if ($dbHelper->execQuery($sql)) {
            echo "Record updated successfully";
        } else {
            echo "An Error Occurred";
        }
    }

    /**
     * @throws \Exception
     */
    public function delete($id)
    {
        $dbHelper = new DBConnector();
        $dbHelper->connect();
        $sql = "DELETE FROM task WHERE id = '" . $id . "'";
        if ($dbHelper->execQuery($sql)) {
            echo "Record deleted successfully";
        } else {
            echo "An Error Occurred";
        }
    }
}