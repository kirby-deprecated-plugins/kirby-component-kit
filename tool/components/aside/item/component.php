<?php
if(isset($data->components)) {
    foreach($data->components as $key => $item) : ?>
        <ul>
            <li>
                <?php $element = (isset($item['aside_url'])) ? 'a href="' . $item['aside_url'] . '"' : 'div class="a"'; ?>
                <<?= $element; ?>>
                    <span>
                        <div class="icon icon-<?= $item['type']; ?>"></div>
                        <div class="text">
                            <?= $key; ?>
                            <?php if($item['count'] > 0) : ?>
                                <div class="count"><?= $item['count']; ?></div>
                            <?php endif; ?>
                        </div>
                    </span>
                </<?= $element; ?>>

                <?php if(isset($data->current->id) && $data->current->id == $item['id']) : ?>
                    <?= snippet('ckit/aside/item/files', ['item' => $item]); ?>
                <?php endif; ?>
            </li>
            
            <?php if(isset($item['_children'])) : ?>
                <li>
                    <?php
                        $data->components = $item['_children'];
                        snippet('ckit/aside/item', ['data' => $data]);
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    <?php endforeach;
}