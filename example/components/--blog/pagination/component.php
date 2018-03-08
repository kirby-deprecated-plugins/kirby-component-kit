<?php if($paging): ?>
  <nav class="pagination wrap cf">

    <?php if($paging->prev_active): ?>
      <a class="pagination-item left" href="<?= $paging->prev_url ?>" rel="prev" title="newer articles">
        <?= f::read($paging->prev_icon_url); ?>
      </a>
    <?php else: ?>
      <span class="pagination-item left is-inactive">
        <?= f::read($paging->prev_icon_url); ?>
      </span>
    <?php endif ?>

    <?php if($paging->next_active): ?>
      <a class="pagination-item right" href="<?= $paging->next_url ?>" rel="next" title="older articles">
      <?= f::read($paging->next_icon_url); ?>
      </a>
    <?php else: ?>
      <span class="pagination-item right is-inactive">
      <?= f::read($paging->next_icon_url); ?>
      </span>
    <?php endif ?>

  </nav>
<?php endif ?>