<nav class="navigation column" role="navigation">
  <ul class="menu">
    <?php foreach($menu as $item): ?>
    <li class="menu-item<?= $item->class ?>">
      <a href="<?= $item->url ?>"><?= $item->title ?></a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>