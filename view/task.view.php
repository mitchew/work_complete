<?php
require_once("_header.php");
require_once("_sidebar.php");
require_once("_navbar.php");
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Task Information</h4>
                        </div>
                        <div class="content">
                            <dl>
                                <dt>Problem</dt>
                                <dd><?php echo $task_info["problem"]; ?></dd>
                                <dt>Description</dt>
                                <dd><?php echo $task_info["description"]; ?></dd>
                                <dt>Assigned Worker</dt>
                                <dd><?php echo $worker_email["email"]; ?></dd>
                                <dt>Contact</dt>
                                <dd><?php echo $contact_details["fname"] . " " . $contact_details["lname"]; ?></dd>
                                <dt>Contact Phone</dt>
                                <dd><?php echo $contact_details["phone"]; ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Task Notes</h4>
                        </div>
                        <div class="content">
                            <dl>
                                <?php foreach ($task_notes as $note) : ?>
                                    <dt><?php echo $note["date"]; ?></dt>
                                    <dd><?php echo $note["note"]; ?></dd>
                                <?php endforeach; ?>
                            </dl>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-warning btn-fill pull-right">
                                        <i class="pe-7s-comment"></i>
                                        <span>Add note</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once("_footer.php"); ?>