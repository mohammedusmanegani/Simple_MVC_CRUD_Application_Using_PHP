<?php
$created = filter_input(INPUT_GET, "created", FILTER_VALIDATE_INT);
$updated = filter_input(INPUT_GET, "updated", FILTER_VALIDATE_INT);
$deleted = filter_input(INPUT_GET, "deleted", FILTER_VALIDATE_INT);

if ($created) {
    echo "<span class='status success'>New Student record successfully created.</span>";
}

if ($updated) {
    echo "<span class='status primary'>Student record successfully updated.</span>";
}


if ($deleted) {
    echo "<span class='status danger'>Student record successfully deleted.</span>";
}
