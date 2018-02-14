<?php
extract($data);

if(isset($paths)) {
    foreach($paths as $key => $item) : ?>
        <ul>
            <?php if(isset($item['path'])) : ?>
                <?php
                $active = '';
                if(in_array($current['view'], ['preview', 'html'])) {
                    if($current['id'] == $item['id']) {
                        $active = ' class="active"';
                    }
                }
                ?>
                <li<?= $active; ?>>
                    <a href="<?= u('component-kit/file/' . $item['id'] . '?file=component.php'); ?>"> <?php /* FEL, ska ta option */ ?>
                        <span>
                            <div class="icon icon-<?= $item['type']; ?>"></div>
                            <div class="text"><?= $key; ?></div>
                        </span>
                    </a>

                    <?= snippet('ckit/aside/item/files', ['item' => $item]); ?>
                </li>
            <?php else : ?>
                <li>
                    <a href="#">
                        <span>
                            <div class="icon icon-empty"></div>
                            <div class="text"><?= $key; ?></div>
                        </span>
                    </a>
                </li>
            <?php endif; ?>
            
            <?php if(isset($item['_children'])) : ?>
                <li>
                    <?php
                        $data['paths'] = $item['_children'];
                        snippet('ckit/aside/item', ['data' => $data]);
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    <?php endforeach;
}