<?php extract($data); ?>
<div class="bar">
    <ul>
        <li<?= (isset($name)) ? ' class="active"' : ''; ?>>
            <a href="#">Preview</a>
        </li>
        <li>
            <a href="#">PHP</a>
        </li>
        <li>
            <a href="#">HTML</a>
        </li>
        <li>
            <a href="#">Raw</a>
        </li>
    </ul>
</div>