<?php
namespace JensTornell\ComponentKit;

extract($data);
?>
<div class="actions bar">
    <ul>
        <li>
            <div class="views">
                <div class="view view-preview<?= (isset($name)) ? ' active' : ''; ?>">
                    <a href="<?= u(settings::route() . '/preview/' . $name); ?>">Preview</a>
                </div>
                <div class="view view-html">
                    <a href="<?= u(settings::route() . '/html/' . $name); ?>">Html</a>
                </div>
                <div class="view view-gallery">
                    <a href="#">Images</a>
                </div>
            </div>
        </li>
        <li>
            <div class="raw">
                <a href="<?= u(settings::route() . '/raw/' . $name); ?>" target="_blank"></a>
            </div>
        </li>
    </ul>
</div>