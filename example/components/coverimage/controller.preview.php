<?php
return function() {
    return [
        'image_url' => u(ckit::assets() . '/coverimage/image.jpg'),
    ];
};

/*
if($image = $item->coverimage()->toFile()) {
        $url = $image->url();
    }
*/