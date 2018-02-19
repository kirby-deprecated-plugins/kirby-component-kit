<?php if($data->files) : ?>
    <ul class="files">
        <?php foreach($data->files as $file) : ?>
            <li<?= ($file->active) ? ' class="active"' : ''; ?>>
                <a href="<?= $file->url; ?>">
                    <span>
                        <div class="icon icon-file"></div>
                        <div class="text">
                            <?= $file->title; ?>
                        </div>
                    </span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>