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
            <textarea name="onload"><?= json_encode($data->current->config); ?></textarea>
            <form method="post">
                <textarea name="data"><?= json_encode($data->current->config); ?></textarea>
                <input type="submit" value="Save">
            </form>
        </li>
    </ul>
</div>