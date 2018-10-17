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
                    <div class="content">
                        <form action="." method="post">
                            <fieldset>
                                <legend>Task Information</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="problem">Short description of the problem</label>
                                            <input type="text"
                                                   id="problem"
                                                   name="problem"
                                                   class="form-control"
                                                   placeholder="A couple words that accurately describes the problem">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Detailed description of the problem</label>
                                            <textarea rows="5"
                                                      id="description"
                                                      name="description"
                                                      class="form-control"
                                                      placeholder="Specific details of the problem"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Contact</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact">Contact list</label>
                                            <select id="contact" name="contact" class="form-control">
                                                <option value="0">Choose a contact</option>
                                                <?php foreach($contact_list as $contact) : ?>

                                                    <option value="<?php echo $contact["contact_id"]; ?>">
                                                        <?php echo $contact["fname"] . " " . $contact["lname"]; ?>
                                                    </option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-warning btn-fill pull-right" id="button-contact-add">
                                            <i class="pe-7s-add-user"></i>
                                            <span>Input new contact information</span>
                                        </button>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset id="add-contact" class="hidden">
                                <legend>Contact Information</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text"
                                                   id="fname"
                                                   name="fname"
                                                   class="form-control"
                                                   placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text"
                                                   id="lname"
                                                   name="lname"
                                                   class="form-control"
                                                   placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text"
                                                   id="street"
                                                   name="street"
                                                   class="form-control"
                                                   placeholder="1 Some Street">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text"
                                                   id="city"
                                                   name="city"
                                                   class="form-control"
                                                   placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text"
                                                   id="state"
                                                   name="state"
                                                   class="form-control"
                                                   placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zip">Zip Code</label>
                                            <input type="number"
                                                   id="zip"
                                                   name="zip"
                                                   class="form-control"
                                                   placeholder="Zip code">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text"
                                                   id="phone"
                                                   name="phone"
                                                   class="form-control"
                                                   placeholder="555-555-5555">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Assigned worker</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="worker">Worker list</label>
                                            <select id="worker" name="worker" class="form-control">
                                                <option value="0">Assign a worker</option>
                                                <?php foreach($worker_list as $worker) : ?>

                                                <option value="<?php echo $worker["id"]; ?>">
                                                    <?php echo $worker["email"]; ?>
                                                </option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <button type="submit" class="btn btn-warning btn-fill pull-right">
                                <i class="pe-7s-note"></i>
                                <span>Create task</span>
                            </button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("_footer.php"); ?>