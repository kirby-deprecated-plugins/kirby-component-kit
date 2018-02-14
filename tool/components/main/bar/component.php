<?php
namespace JensTornell\ComponentKit;
?>
<div class="actions bar">
    <ul>
        <li>
            <div class="views">
                <?php foreach($data['current']['urls'] as $key => $item) : ?>
                    <?php
                    $match = ($data['current']['view'] == $key);
                    $filematch = ($data['current']['filename'] == 'component.php' && $key == 'php' && $data['current']['view'] == 'file');

                    $active = ($match || $filematch) ? ' active' : ''; ?>
                    <div class="view view-<?= $key . $active; ?>">
                        <a href="<?= $item['url']; ?>"><?= $item['title']; ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </li>
        <li>
            <div class="raw">
                <a href="<?= u(settings::path() . '/raw/' . $data['current']['id']); ?>" target="_blank"></a>
            </div>
        </li>
    </ul>
</div>