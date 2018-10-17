<?php
require_once("_header.php");
require_once("_sidebar.php");
require_once("_navbar.php");
?>

    <div class="content">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"><h1>Task created!</h1></div>
            <div class="col-sm-4"></div>
        </div>
        <?php if (isset($add_contact) && $add_contact == 1): ?>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">Contact Added!</div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p>
                    First name: <?php echo $fname; ?>
                    Last name: <?php echo $lname; ?>
                    Street: <?php echo $street; ?>
                    City: <?php echo $city; ?>
                    State: <?php echo $state; ?>
                    Zip: <?php echo $zip; ?>
                    Phone: <?php echo $phone?>
                </p>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">Redirecting to <a href=".">home</a> in <span id="redirect"></span></div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var second = 3;
            $('#redirect').text(second);
            setInterval(function() {
                second -= 1;
                $('#redirect').text(second);
            }, 1000);

            setTimeout(function() {
                window.location = ".";
            }, 3000)
        });
    </script>
<?php require_once("_footer.php"); ?>