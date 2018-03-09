# Work with components

## Folders

By default your components are saved in `site/components`.

- There are two kind of components, one for templates and one for snippets.
- The folder name will be the name of the component. You are allowed to use `a-z` and `-` as folder name.
- No matter which component type you create, you are allowed to put any file you want in there. To prevent collisions, make sure you don't use a filename that is used by the plugin.

## Template component

### Specifics

- It works like a template.
- It can't be nested. The folder needs to be placed in the root.
- The folder name need to start with `--` followed by a name, like `--projects`. It will tell the plugin that it should behave like a template. It will also improve the sorting of the folders.

### Preserved files

**Will be registered if they exists:**

- `blueprint.yml` ([more info](https://getkirby.com/docs/panel/blueprints))
- `component.php` (will register template, [more info](https://getkirby.com/docs/templates/hello-world))
- `controller.php` ([more info](https://getkirby.com/docs/developer-guide/advanced/controllers))

**Will be used in the tool if they exists:**

- `component.config.yml`
- `component.preview.php`
- `controller.preview.php`

*(see [tool](docs/tool.md) for more information)*

## Snippet component

### Specifics

- It works like a snippet.
- It can be nested at an infinite depth in any type of component.
- The folder name can not start with `--`, because it's reserved by the plugin for template components.

### Preserved files

**Will be registered if they exists:**

- `component.php` (will register snippet, [more info](https://getkirby.com/docs/templates/snippets))

**Will be used in the tool if they exists:**

- `component.config.yml`
- `component.preview.php`
- `controller.preview.php`

*(see [tool](docs/tool.md) for more information)*

## Example of folder and file structure

`--blog` and `pagination` are folders in this example:

```text
--blog
  blueprint.yml
  component.php
  controller.php
  pagination
    component.php
```

- [CSS and JS](docs/css-and-js.md)
- [Assets in components](docs/assets.md)