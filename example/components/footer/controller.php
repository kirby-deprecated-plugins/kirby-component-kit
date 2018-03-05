<?php
return function($site) {
    return [
        'copyright' => html::decode($site->copyright()->kirbytext()),
    ];
};