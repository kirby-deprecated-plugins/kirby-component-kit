<?php if($pagination->hasPages()): ?>
  <nav class="pagination wrap cf">

    <?php if($pagination->hasPrevPage()): ?>
      <a class="pagination-item left" href="<?= $pagination->prevPageURL() ?>" rel="prev" title="newer articles">
        <?= f::read($assets_path . 'arrow-left.svg'); ?>
      </a>
    <?php else: ?>
      <span class="pagination-item left is-inactive">
        <?= f::read($assets_path . 'arrow-left.svg'); ?>
      </span>
    <?php endif ?>

    <?php if($pagination->hasNextPage()): ?>
      <a class="pagination-item right" href="<?= $pagination->nextPageURL() ?>" rel="next" title="older articles">
      <?= f::read($assets_path . 'arrow-right.svg'); ?>
      </a>
    <?php else: ?>
      <span class="pagination-item right is-inactive">
      <?= f::read($assets_path . 'arrow-right.svg'); ?>
      </span>
    <?php endif ?>

  </nav>
<?php endif ?>