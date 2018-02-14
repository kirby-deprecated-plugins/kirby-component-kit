<div class="home">
    <div class="text">
        <h1>Component Kit!</h1>

        <?php
            $start = microtime(true);
            $root = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
            $package = file_get_contents($root . DS . 'package.json');
            $object = json_decode($package);
            echo $object->version;
            $time_elapsed_secs = microtime(true) - $start;
            echo $time_elapsed_secs;
            ?>

        <ol>
            <li>Create a file in <code>site</code> called <code>/components/my-snippet/component.php</code></li>
            <li>Refresh this page and your new component should appear in the sidebar</li>
        </ol>

        <p><a href="https://github.com/jenstornell/kirby-component-kit">https://github.com/jenstornell/kirby-component-kit</a></p>
    </div>
</div>