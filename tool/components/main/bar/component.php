<?php
namespace JensTornell\ComponentKit;
?>
<div class="actions bar">
    <ul>
        <li>
            <div class="views">
                <?php foreach($data->bar as $key => $item) : ?>
                    <div class="view view-<?= $key; ?><?= ($item->active) ? ' active' : ''; ?>">
                        <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </li>
        <li>
            <div class="raw">
                <a href="<?= $data->current->raw_url; ?>" target="_blank"></a>
            </div>
        </li>
    </ul>
</div>