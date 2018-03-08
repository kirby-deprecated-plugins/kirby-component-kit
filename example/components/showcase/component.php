<?php

$projects = page('projects')->children()->visible();

/*

The $limit parameter can be passed to this snippet to
display only a specified amount of projects:

```
<?php snippet('showcase', ['limit' => 3]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/
?>

<ul class="showcase grid gutter-1">

  <?php foreach($cases as $i => $case): ?>
    <?php if(isset($limit) && $i>=$limit) continue; ?>
    <li class="showcase-item column">
        <a href="<?= $case->url ?>" class="showcase-link">
          <?php if($case->image_url) : ?>
            <img src="<?= $case->image_url ?>" alt="Thumbnail for <?= $case->title ?>" class="showcase-image" />
          <?php endif ?>
          <div class="showcase-caption">
            <h3 class="showcase-title"><?= $case->title ?></h3>
          </div>
        </a>
    </li>

  <?php endforeach ?>

</ul>