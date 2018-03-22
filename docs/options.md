# Options

The following options can be set in your `/site/config/config.php` file:

```php
c::set('component.kit.path', 'component-kit');
c::set('component.kit.directory', kirby()->roots()->site() . DS . 'components');
c::set('component.kit.preview.css', null);
c::set('component.kit.preview.js', null);
c::set('component.kit.lock', false);
c::set('component.kit.preview.background', false);
c::set('component.kit.preview.margin', false);
c::set('component.kit.preview.outline', false);
c::set('component.kit.tool.active', true);
```

To make it easy to migrate from Patterns to Component Kit, I've used the same names on matching options.

### path

Path is the slug that is used for the tool. By default the url will be `https://example.com/component-kit`.

### directory

If you have not change the folder structure the default directory will be `../site/components`.

### preview.css

The preview css for the built in header snippet in the tool.

**Add a relative url like this:**

```php
c::set('component.kit.preview.css', '/component-kit/assets/{component}/{file}');
```

### preview.js

The preview js for the built in footer snippet in the tool.

**Add a relative url like this:**

```php
c::set('component.kit.preview.js', '/component-kit/assets/{component}/{file}');
```

### lock

If you have lock set to `true`, the tool will only work when you are logged in.

### preview.background

You can set a default preview background for the tool. You can use one of the values below:

- `'black'`
- `'white'`
- `'transparent'`
- `false`

### preview.outline

Sometimes it can be useful to have an outline around the component in the tool. You can set this to `true` to have it by default on all components.

### tool.active

Maybe you don't need/want to use the tool at all. Then you can disable it by set this value to `false`.