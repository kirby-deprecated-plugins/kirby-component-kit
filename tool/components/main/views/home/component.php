<div class="home">
    <div class="text">
        <?php
            $root = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
            $package = file_get_contents($root . DS . 'package.json');
            $object = json_decode($package);
        ?>

        <h1>Component Kit <span class="version">v<?= $object->version; ?></span></h1>

        <?php if(c::get('component.kit.license') != md5('Trust supported this software')) : ?>
                <div class="unlicensed">Unlicensed copy</div>
            <?php endif; ?>

        <div class="center">
            

            <?php if($data->component_count != 0) : ?>
                <p>Create a component file to get started:</p>
                <p>
                    <code>
                        <?php echo $data->globals->roots->components; ?><?= DS; ?>my-component<?= DS; ?>component.php
                    </code>
                </p>
            <?php else : ?>
                <ul>
                    <li><?php echo $data->component_count; ?> component folders</li>
                    <li><?php echo $data->file_count; ?> component files</li>
                </ul>
            <?php endif; ?>

            <p>Visit <a href="https://github.com/jenstornell/kirby-component-kit" target="_blank">Github</a> for more information</p>
        </div>
    </div>
</div>