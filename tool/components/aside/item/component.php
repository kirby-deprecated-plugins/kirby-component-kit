<?php
if(isset($data->components)) {
    foreach($data->components as $key => $item) :
        $object = (object)$item;
    ?>
        <ul>
            <?php $active = ($object->id == $data->current->id && $data->current->view == 'preview') ? ' class="active"' : ''; ?>
            <li<?= $active; ?>>
                <?php $element = (isset($object->aside_url)) ? 'a href="' . $object->aside_url . '"' : 'div class="a"'; ?>
                <<?= $element; ?>>
                    <span>
                        <div class="icon icon-<?= $object->type; ?>"></div>
                        <div class="text">
                            <?= $key; ?>
                            <?php if($object->count > 0) : ?>
                                <div class="count"><?= $object->count; ?></div>
                            <?php endif; ?>
                        </div>
                    </span>
                </<?= $element; ?>>

                <?php if(isset($data->current->id) && $data->current->id == $object->id) : ?>
                    <?= snippet('ckit/aside/item/files', ['item' => $item]); ?>
                <?php endif; ?>
            </li>
            
            <?php if(isset($object->_children)) : ?>
                <li>
                    <?php
                        $data->components = $object->_children;
                        snippet('ckit/aside/item', ['data' => $data]);
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    <?php endforeach;
}