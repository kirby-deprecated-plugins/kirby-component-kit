<?php
return function() {
    $site_controller = ckitSiteController();

    $results = [
        'title' => 'Default',
        'intro' => 'Tiramisu soufflé donut topping jelly-o. Lemon drops brownie cake sweet sweet roll donut donut. Oat cake gummies brownie danish pastry tart.',
        'text' => 'Gingerbread chocolate bar candy canes pastry gummi bears marzipan gummi bears chocolate bar wafer. Jujubes bear claw fruitcake gingerbread. Cake sweet pie.',
    ];
    return array_merge($site_controller, $results);
};