<?php
extract($data);
if(isset($paths)) {
    foreach($paths as $key => $item) : ?>
        <ul>
            <?php if(isset($item['path'])) : ?>
                <li<?= (isset($name) && !isset($filename) && $name == $item['id']) ? ' class="active"' : ''; ?>>
                    <a href="<?= u('component-kit/preview/' . $item['id']); ?>">
                        <span>
                            <div class="icon icon-<?= $item['type']; ?>">
                                <?php #snippet('ckit/icons/puzzle-piece'); ?>
                            </div>
                            <div class="text">
                                <?= $key; ?>
                            </div>
                        </span>
                    </a>

                    <ul class="files">
                        <?php
                        if(isset($data['name']) && $item['id'] ==  $data['name']) {
                            $pattern = pathinfo($item['path'])['dirname'] . '/*.{jpg,jpeg,png,gif,css,scss,txt,yml,php,less}';
                            $glob = glob($pattern, GLOB_BRACE);

                            usort($glob, function($a, $b) {
                                return strcmp($a, $b);
                            });

                            foreach($glob as $file) :
                                $extension = pathinfo($file)['extension'];
                                $code = ['php'];
                                $markup = ['css', 'yml', 'scss', 'less'];
                                $image = ['jpg', 'jpeg', 'png', 'gif'];
                                $text = ['txt'];

                                if(in_array($extension, $code)) {
                                    $snippet = 'file-code';
                                } elseif(in_array($extension, $text)) {
                                    $snippet = 'file-alt';
                                } elseif(in_array($extension, $image)) {
                                    $snippet = 'file-image';
                                } elseif(in_array($extension, $markup)) {
                                    $snippet = 'file';
                                }
                            ?>
                                <li<?= (isset($name) && isset($filename) && $filename == basename($file)) ? ' class="active"' : ''; ?>>
                                    <a href="<?= u('component-kit/file/' . $item['id'] . '?file=' . basename($file)); ?>">
                                        <span>
                                            <div class="icon icon-file">
                                            </div>
                                            <div class="text">
                                                <?= basename($file); ?>
                                            </div>
                                        </span>
                                    </a>
                                </li>
                            <?php endforeach;
                        }
                        ?>
                    </ul>
                </li>
            <?php endif; ?>
            
            <?php if(isset($item['_children'])) : ?>
                <li>
                    <?php
                    $data = [
                        'paths' => $item['_children'],
                        'root' => $root,
                    ];
                    if(isset($name)) {
                        $data['name'] = $name;
                    }
                    snippet('ckit/aside/item', ['data' => $data]);
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    <?php endforeach;
}