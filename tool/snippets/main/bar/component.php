<?php extract($data); ?>
<div class="bar">
    <ul>
        <li<?= (isset($name)) ? ' class="active"' : ''; ?>>
            <a href="#">Preview</a>
        </li>
        <?php /*
        <li>
            <a href="#">Code</a>
        </li>
        */
        ?>
        <li>
            <a href="#">HTML</a>
        </li>
        <li>
            <a href="#">Raw</a>
        </li>
    </ul>
</div>