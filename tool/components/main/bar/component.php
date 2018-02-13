<?php
namespace JensTornell\ComponentKit;
extract ($data['current']['urls']);
?>
<div class="actions bar">
    <ul>
        <li>
            <div class="views">
                <?php foreach($data['current']['urls'] as $key => $url) : ?>
                    <?php $active = ($data['current']['view'] == $key) ? ' active' : ''; ?>
                    <div class="view view-<?= $key . $active; ?>">
                        <a href="<?= $url; ?>"><?= ucfirst($key); ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </li>
        <li>
            <div class="raw">
                <a href="<?= $raw; ?>" target="_blank"></a>
            </div>
        </li>
    </ul>
</div>