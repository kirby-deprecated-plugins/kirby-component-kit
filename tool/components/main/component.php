<?php
extract($data);
?>
<div class="main">
    <?php
        if(isset($filename)) {
            if($file_group == 'code') {
                snippet('ckit/main/views/file/code', ['data' => $data]);
            } elseif($file_group == 'image') {
                snippet('ckit/main/views/file/image', ['data' => $data]);
            }
        } else {
            if(isset($name)) {
                #snippet('ckit/main/bar', ['data' => $data]);
                snippet('ckit/main/views/preview', ['data' => $data]);
            } else {
                snippet('ckit/main/views/home', ['data' => $data]);
            }
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