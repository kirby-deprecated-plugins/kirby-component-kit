<div class="home">
    <div class="text">
        <?php
            $root = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
            $package = file_get_contents($root . DS . 'package.json');
            $object = json_decode($package);
        ?>

        <h1>Component Kit <span class="version">v<?= $object->version; ?></span></h1>

        <ol>
            <li>Create a file called <code>/site/components/my-snippet/component.php</code></li>
            <li>Refresh this page and your new component should appear in the sidebar</li>
        </ol>

        <p><a href="https://github.com/jenstornell/kirby-component-kit">https://github.com/jenstornell/kirby-component-kit</a></p>
    </div>
</div>