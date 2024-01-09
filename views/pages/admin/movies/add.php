<?php

use App\Kernel\View\View;

/**
 *
 * @var View $view
 */

?>

<?php

$view->getHeader() ?>
    <h1 class="text-center">Movie add Page</h1>
    <div class="container">
        <form method="post" action="/admin/movies/add">
            <div class="mb-3">
                <label for="name" class="form-label">Movie
                    name</label>
                <input type="text" class="form-control" id="name" name="name"
                       aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php
$view->getFooter() ?>