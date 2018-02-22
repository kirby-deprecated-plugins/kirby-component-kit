<div class="main">
    <?php
    if(isset($data->current)) {
        if(in_array($data->current->view, ['preview', 'code', 'html']) && $data->current->filename == 'component.php') {
            snippet('ckit/main/bar');
        }

        switch($data->current->view) {
            case 'preview':
                snippet('ckit/main/views/preview');
                break;
            case 'html':
                snippet('ckit/main/views/html');
                break;
            case 'image':
                snippet('ckit/main/views/image');
                break;
            case 'code':
                snippet('ckit/main/views/code');
                break;
            case 'missing':
                snippet('ckit/main/views/missing');
                break;
        }
    } else {
        snippet('ckit/main/views/home');
    }
    ?>
</div>