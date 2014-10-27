<?php
$sexList = array('male', 'female');
if ($isEdit) {
    $action = \Framework\Router\Router::getInstance()->generate('updateStudent', array('id' => $student['id']));
    $title = 'Edit ' . $student['firstname'] . ' ' . $student['lastname'];
    $firstname = @$student['firstname'];
    $lastname = @$student['lastname'];
    $sex = @$student['sex'];
    $age = @$student['age'];
    $group = @$student['group'];
    $faculty = @$student['faculty'];

} else {
    $action = \Framework\Router\Router::getInstance()->generate('insertStudent');
    $title = 'Add student';
    $firstname = '';
    $lastname = '';
    $sex = '';
    $age = '';
    $group = '';
    $faculty = '';
}
?>

<div class="container container-students-edit">
    <form class="form-horizontal registerForm" id="formStudent"
          action="<?php echo $action ?>"
          method="post">

        <h2><?php echo $title ?></h2>

        <div class="form-group" id="firstnamefg">
            <label for="firstname" class="col-sm-3 control-label">First Name</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name"
                       value="<?php echo $firstname ?>" autofocus>
            </div>
        </div>

        <div class="form-group" id="lastnamefg">
            <label for="lastname" class="col-sm-3 control-label">Last Name</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name"
                       value="<?php echo $lastname ?>">
            </div>
        </div>

        <div class="form-group" id="sexfg">
            <label for="sex" class="col-sm-3 control-label">Sex</label>

            <div class="col-sm-9">
                <select class="form-control" name="sex" id="sex"">
                <?php foreach ($sexList as $sexItem) { ?>
                    <option value="<?php echo $sexItem ?>" <?php if ($sexItem === $sex) {
                        echo 'selected';
                    } ?>><?php echo $sexItem ?></option>
                <?php } ?>
                </select>

            </div>
        </div>

        <div class="form-group" id="agefg">
            <label for="age" class="col-sm-3 control-label">Age</label>

            <div class="col-sm-9">
                <input type="number" class="form-control" name="age" id="age" placeholder="Age"
                       value="<?php echo $age ?>">
            </div>
        </div>

        <div class="form-group" id="groupfg">
            <label for="group" class="col-sm-3 control-label">Group</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" name="group" id="group" placeholder="Group"
                       value="<?php echo $group ?>">
            </div>
        </div>

        <div class="form-group" id="facultyfg">
            <label for="faculty" class="col-sm-3 control-label">Faculty</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" name="faculty" id="faculty" placeholder="Faculty"
                       value="<?php echo $faculty ?>">
            </div>
        </div>

        <div class="form-group buttons">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" id="save" form="formStudent">Submit</button>
                <button type="button" class="btn btn-danger" id="cancel"
                        onclick="window.location.href='<?php echo Framework\Router\Router::getInstance()->generate('showStudents'); ?>'">
                    Cancel
                </button>
            </div>
        </div>

    </form>

    <div id="results"></div>

</div>