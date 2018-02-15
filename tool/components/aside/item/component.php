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
                    <?php $element = (isset($item['aside_url'])) ? 'a href="' . $item['aside_url'] . '"' : 'div class="a"'; ?>
                    <<?= $element; ?>>
                        <span>
                            <div class="icon icon-<?= $item['type']; ?>"></div>
                            <div class="text">
                                <?= $key; ?>
                                <div class="count"><?= $item['count']; ?></div>
                            </div>
                        </span>
                    </<?= $element; ?>>

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