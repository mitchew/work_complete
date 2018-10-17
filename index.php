<?php
require_once("model/Matchers/MatchInterface.php");
require_once("model/Matchers/Match.php");
require_once("model/Matchers/Bruteforce.php");
require_once("model/Matchers/DigitMatch.php");
require_once("model/Matchers/DictionaryMatch.php");
require_once("model/Matchers/L33tMatch.php");
require_once("model/Matchers/DateMatch.php");
require_once("model/Matchers/RepeatMatch.php");
require_once("model/Matchers/SequenceMatch.php");
require_once("model/Matchers/SpatialMatch.php");
require_once("model/Matchers/YearMatch.php");
require_once("model/Matcher.php");
require_once("model/Searcher.php");
require_once("model/ScorerInterface.php");
require_once("model/Scorer.php");
require_once("model/Zxcvbn.php");
require_once("model/Config.php");
require_once("model/Auth.php");
require_once("model/database.model.php");
require_once("model/query.model.php");

session_start();

$db = Database::connect();
$config = new PHPAuth\Config($db);
$auth = new PHPAuth\Auth($db, $config);

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password-confirmation"]))
{
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $password_confirmation = filter_input(INPUT_POST, "password-confirmation");
    $auth->register($email, $password, $password_confirmation, Array(), NULL, NULL);
    echo $auth['message'];
}

if (isset($_POST["email"]) && isset($_POST["password"]))
{
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $login = $auth->login($email, $password, 0, NULL);
    if ($auth->isLogged())
    {
        setcookie("authID", $login["hash"]);
        $_SESSION["logged_user"] = $email;
        $_SESSION["logged_user_id"] = $auth->getUID($email);
        print_r($_SESSION);
        header("Location: .");
    }
    else
    {
        header("Location: .");
    }
}

if (!$auth->isLogged()) {

    require_once("view/login.view.php");

} else {

    if (isset($_POST["problem"]) && isset($_POST["worker"]))
    {
        $problem = filter_input(INPUT_POST, "problem");
        $description = filter_input(INPUT_POST, "description");
        $contact = filter_input(INPUT_POST, "contact", FILTER_VALIDATE_INT);
//        add user info
        $fname = filter_input(INPUT_POST, "fname");
        $lname = filter_input(INPUT_POST, "lname");
        $street = filter_input(INPUT_POST, "street");
        $city = filter_input(INPUT_POST, "city");
        $state = filter_input(INPUT_POST, "state");
        $zip = filter_input(INPUT_POST, "zip");
        $phone = filter_input(INPUT_POST, "phone");
//        the worker
        $worker = filter_input(INPUT_POST, "worker", FILTER_VALIDATE_INT);

//        if add user section is filled out
        if ($contact == 0 && $fname != "" && $lname != "" && $street != "" && $city != "" && $state != "" && $zip != "")
        {
            $add_contact = 1;
            $address_id = Query::addAddress($street, $city, $state, $zip);
            $contact_id = Query::addContact($fname, $lname, $phone, $address_id);
            Query::addTask($problem, $description, $worker, $contact_id);

            require_once("view/task.created.view.php");
        }
        else if ($contact == 0)
        {
            header("Location: .");
        }
        else
        {
            Query::addTask($problem, $description, $worker, $contact);
            require_once("view/task.created.view.php");
        }
    }

    if (empty($_GET) && empty($_POST)) {

        $page_brand = "Tasks";

        $worker_tasks = Query::getWorkerTasks($_SESSION["logged_user_id"]);

        require_once("view/main.view.php");
    }

    if (isset($_GET["page"])) {
        switch ($_GET["page"]) {
            case "create-task":

                $page_brand = "Create A Task";
                $contact_list = Query::getContactList();
                $worker_list = Query::getWorkerList();

                require_once("view/task.add.view.php");

                break;

            case "task":
                $page_brand = "Task Information";
                if (isset($_GET["id"]))
                {
                    $task_id = filter_input(INPUT_GET, "id");
                    $task_info = Query::getTaskDetails($task_id);
                    $worker_email = Query::getWorkerEmail($task_info["worker_id"]);
                    $contact_details = Query::getContactDetails($task_info["contact_id"]);
                    $task_notes = Query::getTaskNotes($task_id);

                    require_once("view/task.view.php");
                    break;
                }

            default:
                header("Location: .");
        }
    }

    if (isset($_GET["action"]))
    {
        switch ($_GET["action"]){
            case "logout":
                $auth->logout($auth->getSessionHash());
                $_SESSION = array();
                session_destroy();
                require_once("view/logout.view.php");
                break;
            default:
                break;
        }
    }
}
