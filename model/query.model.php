<?php
require_once("database.model.php");

class Query
{
    public static function getWorkerEmail($worker_id)
    {
        $db = Database::connect();

        $query = "SELECT `email` FROM `users` WHERE `id` = :worker_id;";

        $statement = $db->prepare($query);
        $statement->bindValue(":worker_id", $worker_id);
        $statement->execute();

        $worker_details = $statement->fetch();

        $statement->closeCursor();

        return $worker_details;
    }

    public static function getWorkerTasks($worker_id)
    {
        $db = Database::connect();

        $query = "SELECT * FROM `tasks` NATURAL JOIN `contacts` NATURAL JOIN `addresses`;";
        $query .= "WHERE worker_id = :worker_id;";

        $statement = $db->prepare($query);
        $statement->bindValue(":worker_id", $worker_id);
        $statement->execute();

        $worker_tasks = $statement->fetchAll();

        $statement->closeCursor();

        return $worker_tasks;
    }

    public static function getWorkerList()
    {
        $db = Database::connect();

        $query = "SELECT * FROM `users`;";

        $statement = $db->prepare($query);
        $statement->execute();

        $worker_list = $statement->fetchAll();

        $statement->closeCursor();

        return $worker_list;
    }

    public static function getContactList()
    {
        $db = Database::connect();

        $query = "SELECT * FROM `contacts`;";

        $statement = $db->prepare($query);
        $statement->execute();

        $contact_list = $statement->fetchAll();

        $statement->closeCursor();

        return $contact_list;
    }

    public static function addContact($fname, $lname, $phone, $address_id)
    {
        $db = Database::connect();

        $query = "INSERT INTO `contacts` (`contact_id`, `fname`, `lname`, `phone`, `address_id`)";
        $query .= " VALUES (NULL, :fname, :lname, :phone, :address_id);";

        $statement = $db->prepare($query);
        $statement->bindValue(":fname", $fname);
        $statement->bindValue(":lname", $lname);
        $statement->bindValue(":phone", $phone);
        $statement->bindValue(":address_id", $address_id);

        $statement->execute();

        $contact = $db->lastInsertId();

        $statement->closeCursor();

        return $contact;
    }

    public static function getContactDetails($contact_id)
    {
        $db = Database::connect();

        $query = "SELECT * FROM `contacts` WHERE `contact_id` = :contact_id";

        $statement = $db->prepare($query);
        $statement->bindValue(":contact_id", $contact_id);
        $statement->execute();

        $contact = $statement->fetch();

        $statement->closeCursor();

        return $contact;
    }

    public static function addTask($problem, $description, $user_id, $contact_id)
    {
        $db = Database::connect();

        $query = "INSERT INTO `tasks` (task_id, problem, description, worker_id, contact_id)";
        $query .= " VALUES (NULL, :problem, :description, :user_id, :contact_id);";

        $statement = $db->prepare($query);
        $statement->bindValue(":problem", $problem);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":contact_id", $contact_id);
        $statement->execute();

        $task = $db->lastInsertId();

        $statement->closeCursor();

        return $task;

    }

    public static function getTaskDetails($task_id)
    {
        $db = Database::connect();

        $query = "SELECT * FROM `tasks` WHERE `task_id` = :task_id;";

        $statement = $db->prepare($query);
        $statement->bindValue(":task_id", $task_id);
        $statement->execute();

        $tasks = $statement->fetch();

        $statement->closeCursor();

        return $tasks;
    }

    public static function getTaskNotes($task_id)
    {
        $db = Database::connect();

        $query = "SELECT * FROM `task_notes` WHERE `task_id` = :task_id;";

        $statement = $db->prepare($query);
        $statement->bindValue(":task_id", $task_id);
        $statement->execute();

        $task_notes = $statement->fetchAll();

        $statement->closeCursor();

        return $task_notes;
    }

    public static function addAddress($street, $city, $state, $zip)
    {
        $db = Database::connect();

        $query = "INSERT INTO `addresses` (`address_id`, `street`, `city`, `state`, `zip`)";
        $query .= " VALUES (NULL, :street, :city, :state, :zip);";

        $statement = $db->prepare($query);
        $statement->bindValue(":street", $street);
        $statement->bindValue(":city", $city);
        $statement->bindValue(":state", $state);
        $statement->bindValue(":zip", $zip);
        $statement->execute();

        $address = $db->lastInsertId();

        $statement->closeCursor();

        return $address;
    }
}