<?php

/*

The $flip parameter can be passed to the snippet to flip
prev/next items visually:

```
<?php snippet('prevnext', ['flip' => true]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/

$directionPrev = @$flip ? 'right' : 'left';
$directionNext = @$flip ? 'left'  : 'right';

if($paging->has_next || $paging->has_prev): ?>
  <nav class="pagination <?= !@$flip ?: ' flip' ?> wrap cf">

    <?php if($paging->has_prev): ?>
      <a class="pagination-item <?= $directionPrev ?>" href="<?= $paging->prev_url ?>" rel="prev" title="<?= $paging->prev_title ?>">
        <?= f::read($assets_path . 'arrow-' . $directionPrev . '.svg'); ?>
      </a>
    <?php else: ?>
      <span class="pagination-item <?= $directionPrev ?> is-inactive">
        <?= f::read($assets_path . 'arrow-' . $directionPrev . '.svg'); ?>
      </span>
    <?php endif ?>

    <?php if($paging->has_next): ?>
      <a class="pagination-item <?= $directionNext ?>" href="<?= $paging->next_url ?>" rel="next" title="<?= $paging->next_title ?>">
        <?= f::read($assets_path . 'arrow-' . $directionNext . '.svg'); ?>
      </a>
    <?php else: ?>
      <span class="pagination-item <?= $directionNext ?> is-inactive">
        <?= f::read($assets_path . 'arrow-' . $directionNext . '.svg'); ?>
      </span>
    <?php endif ?>

  </nav>
<?php endif ?>