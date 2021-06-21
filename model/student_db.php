<?php

function insert_student($studentName, $studentBranch, $studentDob)
{
    global $db;
    $count = 0;
    $query = "INSERT INTO students (studentName,studentBranch,studentDob) VALUES (:studentName, :studentBranch, :studentDob)";
    $statement = $db->prepare($query);
    $statement->bindValue(':studentName', $studentName);
    $statement->bindValue(':studentBranch', $studentBranch);
    $statement->bindValue(':studentDob', $studentDob);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
}

function select_student_by_name($studentName)
{
    global $db;
    $query = 'SELECT * FROM students 
                WHERE studentName = :studentName 
                ORDER BY studentBranch DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentName', $studentName);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function update_student($id, $studentName, $studentBranch, $studentDob)
{
    global $db;
    $count = 0;
    $query = 'UPDATE students 
                SET studentName = :studentName, studentBranch = :studentBranch, studentDob = :studentDob WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':studentName', $studentName);
    $statement->bindValue(':studentBranch', $studentBranch);
    $statement->bindValue(':studentDob', $studentDob);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
}

function delete_student($id)
{
    global $db;
    $count = 0;
    $query = 'DELETE FROM students 
                WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
}
