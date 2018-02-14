<?php
extract($data['current']);
?>
<div class="main">
    <?php
    if(in_array($view, ['preview', 'html']) || $filename == 'component.php') {
        snippet('ckit/main/bar');
    }

    switch($view) {
        case 'preview':
            snippet('ckit/main/views/preview');
            break;
        case 'html':
            snippet('ckit/main/views/html');
            break;
        case 'file':
            switch($group) {
                case 'code':
                    snippet('ckit/main/views/file/code');
                    break;
                case 'image':
                    snippet('ckit/main/views/file/image');
                    break;
            }
            break;
    }
    
        /*
Markup
css
javascript
less
php
sass
yaml

coffiescript
haml
livescript
twig
markdown
json
*/
    ?>
</div>