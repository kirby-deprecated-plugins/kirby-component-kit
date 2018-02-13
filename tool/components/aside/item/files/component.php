<?php extract($data['current']); ?>
<ul class="files">
    <?php
    if($item['id'] ==  $id) {
        if(isset($files)) {
            foreach($files as $file) : ?>
                <li<?= $file['active']; ?>>
                    <a href="<?= $file['url']; ?>">
                        <span>
                            <div class="icon icon-file"></div>
                            <div class="text">
                                <?= $file['filename']; ?>
                            </div>
                        </span>
                    </a>
                </li>
            <?php endforeach;
        }
    }
    ?>
</ul>