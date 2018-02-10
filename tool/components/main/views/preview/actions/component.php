<?php
extract($data)
?>
<div class="actions bar">
    <ul>
        <li>
            <?= snippet('ckit/main/views/preview/actions/backgrounds'); ?>
        </li>
        <li>
            <div class="switches">
                <div class="switch-outline">
                    <span class="label">Outline</span>
                    <label class="switch">
                        <input type="checkbox" data-toggly-target=".switch-outline input" data-action="outline">
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="switch-margin">
                    <span class="label">Margin</span>
                    <label class="switch">
                        <input type="checkbox" data-toggly-target=".switch-margin input" data-action="margin">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </li>
        <li>
            <div class="views">
                <div class="view view-preview<?= (isset($name)) ? ' active' : ''; ?>">
                    <a href="#"></a>
                </div>
                <div class="view view-html">
                    <a href="#"></a>
                </div>
            </div>

            
            
            <a href="<?= u('component-kit/raw/' . $name); ?>" target="_blank">RAW EXternal ICON</a>
            
        </li>
    </ul>
</div>