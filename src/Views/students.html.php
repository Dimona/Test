<div id="studcon" class="container">
    <form id="formStudents"
          action="<?php echo \Framework\Router\Router::getInstance()->generate('removeStudent'); ?>"
          method="post">
        <table class="form-group table table-bordered table-striped table-hover dataTable" data-search="true"
               id="students">
            <caption><h2>Students</h2></caption>

            <thead>
            <tr>
                <th data-field="checker" title="Check all"><input type="checkbox" id="checkAllStudents" value=""></th>
                <th data-field="name" data-sortable="true">Name</th>
                <th data-field="sex" data-sortable="true">Sex</th>
                <th data-field="age" data-sortable="true">Age</th>
                <th data-field="group" data-sortable="true">Group</th>
                <th data-field="faculty" data-sortable="true">Faculty</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student) { ?>
                <tr>
                    <td>
                        <input type="checkbox" name="id[]" value="<?php echo $student['id']; ?>">
                    </td>
                    <td>
                        <a href="<?php echo \Framework\Router\Router::getInstance()->generate('editStudent', array('id' => $student['id'])); ?>"><?php echo $student['firstname'] . ' ' . $student['lastname']; ?></a>
                    </td>
                    <td><?php if ($student['sex'] == 'male') {
                            print('<img title="' . $student['sex'] . '" src="/images/male.png">');
                        } else {
                            print('<img title="' . $student['sex'] . '" src="/images/female.png">');
                        } ?></td>
                    <td><?php echo $student['age']; ?></td>
                    <td><?php echo $student['group']; ?></td>
                    <td><?php echo $student['faculty']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="form-group" id="students-buttons">
            <button title="Delete Student" type="submit" class="btn btn-default" id="button-delete-student"
                    form="formStudents" onclick="return confirm('Do you really want to proceed the deleting?');">
                <img class="button-image" src="/images/delete-user.png"></button>
            <button title="Add Student" type="button" class="btn btn-default"
                    id="button-add-student"
                    onclick="window.location.href='<?php echo Framework\Router\Router::getInstance()->generate('addStudent'); ?>'">
                <img class="button-image" src="/images/add-user.png"></button>
        </div>
    </form>
</div>

<script type="application/javascript">
    $(document).ready(function () {
        $('#students').dataTable({
            "order": [
                [1, "asc"]
            ],
            "paging": false,
            "info": false,
            "filter": false,
            "columnDefs": [
                {
                    "targets": [ 0, 2 ],
                    "orderable": false
                }
            ]
        });
    });
</script>

<script type="application/javascript">
    $(document).ready(function () {
        $('#checkAllStudents').click(function() {
            if ($('#checkAllStudents').prop('checked')) {
                $("input[type=checkbox]").prop('checked', true);
            } else {
                $("input[type=checkbox]").prop('checked', false);
            }
        });
    });
</script>