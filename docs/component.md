# Work with components

By default your components are saved in `site/components`.

## Reasons to use a component approach

To have different files bundled together as a component have many benefits.

- If you delete a component, all the files that belong to it will be deleted as well.
- No more jumping around to find the files you need to the thing you are creating. All you need is in the component folder.
- A component can be completely independent from the content files.

## Simple example

A very basic example with just a few files and folders.

```text
site/components
└─--blog
  ├─blueprint.yml
  ├─component.php
  ├─controller.php
  └─pagination
    └─component.php
```

- There are two kind of components, one for templates and one for snippets.
- The folder name will be the name of the component. You are allowed to use `a-z` and `-` as folder name.
- No matter which component type you create, you are allowed to put any file you want in there.
- To prevent collisions, make sure you don't use a filename that is used by the plugin (see preserved files).

## Template component

- It works like a template.
- It can't be nested. The folder needs to be placed in the root.
- The folder name need to start with `--` followed by a name, like `--projects`. It will tell the plugin that it should behave like a template. It will also improve the sorting of the folders.

**Files that will be registered if they exists:**

- `blueprint.yml` ([more info](https://getkirby.com/docs/panel/blueprints))
- `component.php` (will register template, [more info](https://getkirby.com/docs/templates/hello-world))
- `controller.php` ([more info](https://getkirby.com/docs/developer-guide/advanced/controllers))

**Files that will be used in the tool if they exists:**

- `config.yml`
- `component.preview.php`
- `controller.preview.php`

*(see [tool](docs/tool.md) for more information)*

## Snippet component

- It works like a snippet.
- It can be nested at an infinite depth in any type of component.
- The folder name can not start with `--`, because it's reserved by the plugin for template components.

**Files that will be registered if they exists:**

- `component.php` (will register snippet, [more info](https://getkirby.com/docs/templates/snippets))

**Files that will be used in the tool if they exists:**

- `config.yml`
- `component.preview.php`
- `controller.preview.php`

*(see [tool](docs/tool.md) for more information)*

## Assets

If your component has assets, you may at some point want to be able to get access to them.

You can do that by visiting `https://example.com/component-kit/assets/{component}/{filename}`.

## CSS and JS

Read about how to [build CSS and JS files](docs/css-and-js.md).