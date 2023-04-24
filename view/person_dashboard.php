<?php

ob_start();

?>

<?php

$person = $detailQuery->fetch();
$isActor = $checkActorQuery->fetch();
$isDirector = $checkDirectorQuery->fetch();

if (!empty($isActor)) {
    $isActor = "checked";
} else {
    $isActor = "";
}

if (!empty($isDirector)) {
    $isDirector = "checked";
} else {
    $isDirector = "";
}

?>

<form class="row g-3 w-25 p-3 m-3 border" action="index.php?action=updatePerson">

    <div class="col-md-6">
        <label class="form-label">
            First name :
            <input type="text" name="first_name" class="form-control" value="<?= $person['first_name'] ?>" required>
        </label>
    </div>

    <div class="col-md-6">
        <label class="form-label">
            Last name :
            <input type="text" name="last_name" class="form-control" value="<?= $person['last_name'] ?>" required>
        </label>
    </div>

    <div class="col-12">
        <label class="form-label">
            Birth-date :
            <input type="date" name="birthdate" class="form-control" value="<?= $person['birthdate'] ?>" required>
        </label>
    </div>

    <div class="col-md-6">
        <label class="form-label">
            Genre :
            <select name="genre" class="form-select">
                <option selected disabled><?= $person['genre'] ?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </label>
    </div>

    <div class="col-md-6">
        <label class="form-label">
            Portrait :
            <input type="file" name="portrait" class="form-control" value="<?= $person['portrait'] ?>">
        </label>
    </div>

    <div class="col-md-6">
        <div class="form-check">
            <label class="form-check-label">
                Actor
                <input type="checkbox" name="isActor" class="form-check-input" <?= $isActor ?>>
            </label>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-check">
            <label class="form-check-label">
                Director
                <input type="checkbox" name="isDirector" class="form-check-input" <?= $isDirector ?>>
            </label>
        </div>
    </div>

    <div class="col-12">
        <input type="submit" name="submit" class="btn btn-primary">
    </div>

</form>

<?php

$content = ob_get_clean();
$title = "Dashboard";
$secondTitle = "Dashboard";
require 'template.php';

?>