<?php print_r($data); ?>
<?php
if(isset($data->nested)) {
    foreach($data->nested as $key => $item) : ?>
        <ul>
            <li>
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