<?php include('header.php') ?>
<?php if ($results) { ?>
    <section>
        <br>
        <h2><u>Update Or Delete Data</u></h2><br>
        <?php foreach ($results as $result) {
            $id = $result['id'];
            $studentName = $result['studentName'];
            $studentBranch = $result['studentBranch'];
            $studentDob = $result['studentDob'];
        ?>
            <form class="update" action="." method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $id ?>">
                <label for="studentName-<?= $id ?>">Student Name:</label>
                <input type="text" id="studentName-<?= $id ?>" name="studentName" value="<?= $studentName ?>" required>
                <label for="studentBranch-<?= $id ?>">Student Branch:</label>
                <input type="text" id="studentBranch-<?= $id ?>" name="studentBranch" value="<?= $studentBranch ?>" required>
                <label for="studentDob-<?= $id ?>">Student Dob:</label>
                <input type="date" id="studentDob-<?= $id ?>" name="studentDob" value="<?= $studentDob ?>" required>
                <button>Update</button>
            </form>
            <form class="delete" action="." method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button class="red">Delete</button>
            </form>
        <?php } ?>
    </section>
<?php } else { ?>
    <p>Sorry, no results.</p>
<?php } ?>
<?php include('status.php') ?>
<p><br><a href=".">Back to Request Forms</a></p>
<?php include('footer.php') ?>