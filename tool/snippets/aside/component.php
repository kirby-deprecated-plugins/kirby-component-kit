<?php
namespace JensTornell\ComponentKit;
?>
<aside>
    <h1><a href="<?= u(settings::route()); ?>">Component Kit</a></h1>
    <?= snippet('ckit/aside/item', ['data' => $data]); ?>
</aside>