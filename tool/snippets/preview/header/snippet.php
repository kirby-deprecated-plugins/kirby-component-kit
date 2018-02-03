<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="<?= u(c::get('component.kit.preview.css')); ?>">
    <title><?= $name; ?> - Kirby Component Kit</title>
    <?php /*
    <link rel="icon" href="https://assets.getkirby.com/assets/images/favicon.png" type="image/png" />
    */
    ?>

    <style>
        html.ckit-background {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='#eee' viewBox='0 0 512 512'%3E%3Cpath d='M256 256v64h-64v-64h64zm0-256h-64v64h64V0zm0 256h64v-64h-64v64zM384 0h-64v64h64V0zm0 512h64v-64h-64v64zm128-64v-64h-64v64h64zm-384 64h64v-64h-64v64zm0-512H64v64h64V0zm384 192v-64h-64v64h64zm0 128v-64h-64v64h64zM0 512h64v-64H0v64zM0 64v64h64V64H0zm0 128v64h64v-64H0zm0 128v64h64v-64H0zm256 192h64v-64h-64v64zm-64-128v64h64v-64h-64zm64-192v-64h-64v64h64zM64 384v64h64v-64H64zm64-128H64v64h64v-64zm256 128h64v-64h-64v64zM512 0h-64v64h64V0zM384 256h64v-64h-64v64zm0-192v64h64V64h-64zm-64 320v64h64v-64h-64zm-192-64v64h64v-64h-64zm128 0v64h64v-64h-64zm-64-128h-64v64h64v-64zm-64-64H64v64h64v-64zm192 192h64v-64h-64v64zM192 128V64h-64v64h64zm128 0V64h-64v64h64zm0 64h64v-64h-64v64z'/%3E%3C/svg%3E");
            background-size: 112px;
        }
        html.ckit-outline body {
            outline: 1px solid red;
        }
        html.ckit-margin {
            padding: 2rem;
        }

        html.ckit-off {
            background: none;
        }

        html.ckit-black {
            background: #000;
        }
        html.ckit-white {
            background: #fff;
        }

        html.ckit-transparent {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='#eee' viewBox='0 0 512 512'%3E%3Cpath d='M256 256v64h-64v-64h64zm0-256h-64v64h64V0zm0 256h64v-64h-64v64zM384 0h-64v64h64V0zm0 512h64v-64h-64v64zm128-64v-64h-64v64h64zm-384 64h64v-64h-64v64zm0-512H64v64h64V0zm384 192v-64h-64v64h64zm0 128v-64h-64v64h64zM0 512h64v-64H0v64zM0 64v64h64V64H0zm0 128v64h64v-64H0zm0 128v64h64v-64H0zm256 192h64v-64h-64v64zm-64-128v64h64v-64h-64zm64-192v-64h-64v64h64zM64 384v64h64v-64H64zm64-128H64v64h64v-64zm256 128h64v-64h-64v64zM512 0h-64v64h64V0zM384 256h64v-64h-64v64zm0-192v64h64V64h-64zm-64 320v64h64v-64h-64zm-192-64v64h64v-64h-64zm128 0v64h64v-64h-64zm-64-128h-64v64h64v-64zm-64-64H64v64h64v-64zm192 192h64v-64h-64v64zM192 128V64h-64v64h64zm128 0V64h-64v64h64zm0 64h64v-64h-64v64z'/%3E%3C/svg%3E");
            background-size: 112px;
        }

    </style>

</head>
<body>