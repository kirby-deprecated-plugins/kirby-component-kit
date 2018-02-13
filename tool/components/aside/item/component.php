<?php
extract($data);

if(isset($paths)) {
    foreach($paths as $key => $item) : ?>
        <ul>
            <?php if(isset($item['path'])) : ?>
                <?php $active = ($current['view'] == 'preview' && $current['id'] == $item['id']) ? ' class="active"' : ''; ?>
                <li<?= $active; ?>>
                    <a href="<?= u('component-kit/preview/' . $item['id']); ?>">
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