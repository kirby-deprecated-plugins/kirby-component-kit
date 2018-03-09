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
c::set('component.kit.component.snippet', true);
```

### option1

This option is an integer, a number which can be used for calculations.