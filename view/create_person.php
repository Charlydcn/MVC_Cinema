<?php

ob_start();

?>

<div class="p-2">

    <?php

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    ?>

    <form class="row w-50 g-3 p-3 m-3 border" action="index.php?action=createPerson" method="POST" enctype="multipart/form-data" autocomplete="off">

        <div class="col-md-6">
            <label class="form-label">
                First name :
                <input type="text" name="first_name" class="form-control" value="" required>
            </label>
        </div>

        <div class="col-md-6">
            <label class="form-label">
                Last name :
                <input type="text" name="last_name" class="form-control" value="" required>
            </label>
        </div>

        <div class="col-md-6">
            <label class="form-label">
                Birth-date :
                <input type="date" name="birthdate" class="form-control" value="" required>
            </label>
        </div>

        <div class="col-md-6">
            <label class="form-label">
                Genre :

                <select name="genre" class="form-select">
                    <option value="Genre" selected disabled>Genre</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </label>
        </div>

        <div class="col-md-6">
            <label class="form-label">
                Portrait :
                <input type="file" name="portrait" class="form-control">
            </label>
        </div>

        <div class="col-12">
            <div class="form-check">
                <label class="form-check-label">
                    Actor
                    <input type="checkbox" name="isActor" class="form-check-input">
                </label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-check">
                <label class="form-check-label">
                    Director
                    <input type="checkbox" name="isDirector" class="form-check-input">
                </label>
            </div>
        </div>

        <div class="col-12">
            <input type="submit" name="submit" class="btn btn-primary">
        </div>

    </form>

</div>

<?php

$content = ob_get_clean();
$title = "Creation";
$secondTitle = "Creation";
require 'template.php';

?>