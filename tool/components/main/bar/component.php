<?php
extract($data)
?>
<div class="actions bar">
    <ul>
        <li>
            <div class="views">
                <div class="view view-preview<?= (isset($name)) ? ' active' : ''; ?>">
                    <a href="#">Preview</a>
                </div>
                <div class="view view-html">
                    <a href="#">Html</a>
                </div>
            </div>
        </li>
        <li>
            <div class="raw">
                <a href="<?= u('component-kit/raw/' . $name); ?>" target="_blank">RAW</a>
            </div>
        </li>
    </ul>
</div>