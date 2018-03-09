### Controller preview

In the Component Kit Tool you can preview templates and snippets. You can also use controllers but because they are bound to a page, they will only run on the site, not in the tool.

Instead you can add an additional file to your component folder called `component.preview.php`. Because it does not take `$site, $pages, $page` as arguments it will look a bit different:

```php
<?php
return [
  'foo' => 'my first template variable',
  'bar' => 'Hello from the tool'
];
```

If you are in the tool and do something like `echo $bar;` it will output the `component.preview.php` data which in this case is `Hello from the tool`. If you are on the site, it will use `controller.php` instead.