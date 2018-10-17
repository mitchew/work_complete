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
                            <h4 class="title">Assigned Tasks</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Problem</th>
                                        <th>Contact</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($worker_tasks as $task) : ?>
                                    <tr id="<?php echo $task["task_id"]; ?>">
                                        <td><?php echo $task["problem"]; ?></td>
                                        <td><?php echo $task["fname"]; ?></td>
                                        <td><?php echo $task["street"]." ".$task["city"].", ".$task["state"]." ".$task["zip"]; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <script>
                                document.addEventListener("DOMContentLoaded", function(){
                                    $('td').click(function(){
                                        var ID = $(this).parent().attr('id');
                                        window.location = "?page=task&id=" + ID;
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require_once("_footer.php"); ?>