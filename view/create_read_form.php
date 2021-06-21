<?php include('header.php') ?>
<section>
    <br>
    <h2><u>Create Data</u></h2><br>
    <form action="." method="POST">
        <input type="hidden" name="action" value="insert">
        <label for="studentName">Student Name:</label>
        <input placeholder="Student Name" type="text" id="studentName" name="studentName" required>
        <label for="studentBranch">Student Branch:</label>
        <input placeholder="Student Branch" type="text" id="studentBranch" name="studentBranch" maxlength="3" required>
        <label for="studentDob">Student Dob:</label>
        <input placeholder="Student Dob" type="date" id="studentDob" name="studentDob" required>
        <button>Submit</button>
    </form>
</section>
<section>
    <h2><u>Read Data</u></h2><br>
    <form action="." method="GET">
        <input type="hidden" name="action" value="select">
        <label for="studentName">Student Name:</label>
        <input placeholder="Student Name" type="text" id="studentName" name="studentName" required>
        <button>Submit</button>
    </form>
</section>
<?php include('status.php') ?>
<?php include('footer.php') ?>