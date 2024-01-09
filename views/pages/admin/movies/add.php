<?php

use App\Kernel\View\View;

/**
 *
 * @var View $view
 */

?>

<?php

$view->getHeader() ?>
    <h1>Movie add Page</h1>

    <form method="post" action="">
        <div>
            <label aria-label="name">
                <input name="name" type="text"/>
            </label>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>
<?php
$view->getFooter() ?>