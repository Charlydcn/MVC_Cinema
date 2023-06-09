<?php

ob_start();

?>

<?php

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

?>
<div class="d-flex flex-row">
    <div class="w-25">
        <form class="row g-3 p-3 m-3 border" action="index.php?action=casting&id=<?= $id ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
            <h2>Role : </h2>

            <div class="col-md-12"> <!-- DIRECTOR -->

                <label for="movies">
                    Movie :
                </label>
                <select name="movies" class="form-select">
                    <option value="<?= $movie['title'] ?>" selected><?= $movie['title'] ?></option>
                </select>

            </div>

            <div class="col-md-12"> <!-- DIRECTOR -->

                <label for="actors">
                    Actor :
                </label>
                <select name="actors" class="form-select">

                    <option value="" selected disabled>Choose...</option>
                    <?php
                    foreach ($actors as $actor) {
                    ?>

                        <option value="<?= $actor['id_actor'] ?>"><?= $actor['first_name'] . " " . $actor['last_name'] ?></option>

                    <?php } ?>

                </select>

            </div>

            <div class="col-md-12"> <!-- DIRECTOR -->

                <label for="roles">
                    Role :
                </label>
                <select name="roles" class="form-select">

                    <option value="" selected disabled>Choose...</option>
                    <?php
                    foreach ($roles as $role) {
                    ?>

                        <option value="<?= $role['id_role'] ?>"><?= $role['role_name'] ?></option>

                    <?php } ?>

                </select>

            </div>

            <div class="col-md-12 d-flex justify-content-end"> <!-- SUBMIT -->
                <input type="submit" name="submit" value="Add role" class="btn btn-primary w-50">
            </div>

        </form>

        <div class="col-md-12 m-3"> <!-- EXIT -->
            <a class="btn btn-success" href="index.php?action=movie_detail&id=<?= $id ?>">Go to movie</a>
        </div>
    </div>

    <table class="table table-hover m-3 w-25">
        <thead>
            <tr>
                <th colspan="4" class="text-center">
                    Casting
                </th>
            </tr>
            <tr>
                <th class="text-center">Movie</th>
                <th class="text-center">Actor/Actress</th>
                <th class="text-center">Role</th>
                <th class="text-center"></th>
                <th class="text-center"></th>
            </tr>
        </thead>

        <tbody>

            <?php
            foreach ($castings as $casting) {
            ?>

                <tr>
                    <td class="text-center"><?= $casting['movie'] ?></td>
                    <td class="text-center"><?= $casting['first_name'] . " " . $casting['last_name'] ?></td>
                    <td class="text-center"><?= $casting['role'] ?></td>
                    <td><a href="index.php?action=deleteCasting&id=<?= $casting['id_casting'] ?>"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

</div>

<?php

$content = ob_get_clean();
$title = "Casting";
$secondTitle = "Casting";
require 'template.php';

?>