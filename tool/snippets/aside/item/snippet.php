<?php
extract($data);
if(isset($paths)) {
    foreach($paths as $key => $item) : ?>
        <ul>
            <?php if(isset($item['path'])) : ?>
                <li>
                    <a href="<?= u('component-kit/snippet/' . $item['id']); ?>">
                        <div class="icon icon-<?= $item['type']; ?>">
                            <?php
                                if($item['type'] == 'component') {
                                    snippet('ckit/icons/puzzle-piece');
                                } else {
                                    snippet('ckit/icons/code');
                                }
                            ?>
                        </div>
                        <div class="text">
                            <?= $key; ?>
                        </div>
                    </a>

                    <?php if($item['type'] == 'component') : ?>
                        <ul>
                            <?php foreach(glob(pathinfo($item['path'])['dirname'] . '/*.{jpg,css}', GLOB_BRACE) as $file) : ?>
                                <li>
                                    <a href="<?= u('component-kit/file/' . basename($file)); ?>">
                                        <div class="icon icon-file">
                                            <?= snippet('ckit/icons/file-alt'); ?>
                                        </div>
                                        <div class="text">
                                            <?= basename($file); ?>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
            
            <?php if(isset($item['_children'])) : ?>
                <li>
                    <?php
                    $data = [
                        'paths' => $item['_children'],
                        'root' => $root
                    ];
                    snippet('ckit/aside/item', ['data' => $data]);
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    <?php endforeach;
}