<div class="main">
    <?php
    if(isset($data->current)) {
        $is_tab = (in_array($data->current->view, ['preview', 'html']));
        $file = $data->current->filename;
        $is_file = ($file == 'component.php' || $file == 'component.preview.php');

        if($is_tab && $is_file) {
            snippet('ckit/main/bar');
        }

        snippet('ckit/main/views/' . $data->current->view);
    } else {
        snippet('ckit/main/views/home');
    }
    ?>
</div>