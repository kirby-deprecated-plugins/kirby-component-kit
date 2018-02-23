<div class="home">
    <div class="text">
        <div class="center">
            <h1><?= $data->current->id; ?></h1>

            <br>
            <p><strong>Missing component:</strong> Place a component file in path below:</p>
            <p>
                <code>
                    <?php echo $data->current->component_root . DS; ?>component.php
                </code>
            </p>
        </div>
    </div>
</div>