<?php

ob_start();

?>

<?php

$person = $detailQry->fetch();

$genres = [
    'Male',
    'Female',
    'Other',
];

?>

<div class="p-2">

    <?php

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    ?>

    <div class="d-flex flex-row align-items-center">

        <form class="row w-50 g-3 p-3 m-3 border" action="index.php?action=updatePerson&id=<?= $person['id_person'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

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

                        <?php

                        foreach ($genres as $genre) {

                            $isSelected = ($genre === $person['genre'] ? 'selected' : '');

                            echo "<option value='$genre' $isSelected>$genre</option>"

                        ?>

                        <?php } ?>

                    </select>
                </label>
            </div>

            <div class="col-md-6">
                <label class="form-label">
                    Portrait :
                    <input type="file" name="portrait" class="form-control" value="public/img/<?= $person['portrait'] ?>">
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

            <div class="w-100 d-flex justify-content-end">
                <a href="index.php?action=deletePerson&id=<?= $person['id_person'] ?>" class="w-auto d-flex justify-content-end fs-4">
                    <i class="fa-sharp fa-solid fa-trash text-danger"></i>
                </a>
            </div>

        </form>

        <figure class="w-50">
            <img src="public/img/<?= $person['portrait'] ?>" alt="<?= $person['first_name'] . " " . $person['last_name'] ?> portrait" class="w-25 img-fluid rounded-circle">
        </figure>
    </div>

</div>

<?php

$content = ob_get_clean();
$title = "Dashboard";
$secondTitle = "Dashboard";
require 'template.php';

?>