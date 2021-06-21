<?php
require('model/database.php');
require('model/student_db.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$studentName = filter_input(INPUT_POST, "studentName", FILTER_SANITIZE_STRING);
$studentBranch = filter_input(INPUT_POST, "studentBranch", FILTER_SANITIZE_STRING);
$studentDob = filter_input(INPUT_POST, "studentDob", FILTER_SANITIZE_STRING);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'create_read_form';
    }
}

$studentName = filter_input(INPUT_POST, "studentName", FILTER_SANITIZE_STRING);
if (!$studentName) {
    $studentName = filter_input(INPUT_GET, "studentName", FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'insert':
        if ($studentName && $studentBranch && $studentDob) {
            $count = insert_student($studentName, $studentBranch, $studentDob);
            header("Location: .?action=select&studentName={$studentName}&created={$count}");
        } else {
            $error_message = 'Invalid Student data. Check all fields and resubmit.';
            include('view/error.php');
        }
        break;
    case 'select':
        if ($studentName) {
            $results = select_student_by_name($studentName);
            include('view/update_delete_form.php');
        } else {
            $error_message = 'Invalid student data. Check all fields and resubmit.';
            include('view/error.php');
        }
        break;
    case 'update':
        if ($id && $studentName && $studentBranch && $studentDob) {
            $count = update_student($id, $studentName, $studentBranch, $studentDob);
            header("Location: .?action=select&studentName={$studentName}&updated={$count}");
        } else {
            $error_message = 'Invalid student data. Check all fields and resubmit.';
            include('view/error.php');
        }
        break;
    case 'delete':
        if ($id) {
            $count = delete_student($id);
            header("Location: .?deleted={$count}");
        } else {
            $error_message = 'Invalid student data. Check all fields and resubmit.';
            include('view/error.php');
        }
        break;
    default:
        include('view/create_read_form.php');
}
