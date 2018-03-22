# Tricks

## Don't let the component rely on a page

It can be tempting to use `page()` all over the place.

To make the component completely independent of the content, you need to follow these simple rules:

- If you use `controller.preview.php`, send some dummy data.
- If you use `controller.php`, don't send the whole page object. Instead, send the values you need.
- In the `component.php`, use the data from the `controller.php`. Don't use the page object directly.

This way, your components will not rely on your content files. It means that you can use your component on another site.

To see how it works, look at the [modified starterkit](docs/starterkit.md).

### Example

**controller.php**

```php
<?php
return function() {
    return [
        'title' => page('about')->title(),
        'text' => page('about')->text(),
    ];
};
```

**controller.preview.php**

```php
<?php
return function() {
    return [
        'title' => 'This is a title',
        'text' => 'This is a text',
    ];
};
```

## Get startet quickly by using the page object

In the above we learned how to have the component independent from the content. In this case we will do the exact opposite.

To get started really quickly, we can if we want, send the page object in our `component.preview.php`. The component will then be aware of what page you what to use.

**controller.preview.php**

```php
<?php
return function() {
    return [
        'page' => page('about')
    ];
};
```

**component.php**

In the component you can use the page object.

```php
<?= $page->title() ?>
```

*Be aware that with this way, you will be dependent of the content. See the first chapter to see how you can have independent components*

## Use custom elements

In all major browsers you can use custom elements like this:

```php
<hello-world>Hi Kirby!</hello-world>
```

It may not validate, but it's stable and perfect for building components.

**Be aware that they don't behave like block elements, so you need to do this:**

```css
hello-world {
    display: block;
}
```

Also be aware that custom elements should always contain a dash.