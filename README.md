# Squeeze plugin for Craft CMS 3.x

Zip your craft assets on the fly ready for your user to download

## Requirements

This plugin requires Craft CMS 3.0.0-RC11 or later.

## Installation

Go to the Plugin Store in your project’s Control Panel and search for “Squeeze”. Then click on the “Install” button in its modal window.

## Usage

```html
<form method="post" target="_blank">
    {{ getCsrfInput() }}
    <input type="hidden" name="action" value="squeeze/download">
    <input type="hidden" name="archivename" value="your-zipfile">

    <input type="checkbox" name="files[]" value="10"><!-- asset id -->
    <input type="checkbox" name="files[]" value="20"><!-- asset id -->

    <input type="submit" value="Download!">
</form>
```

## Credits

Icon by Yazmin Alanis from the Noun Project
This plugin is mostly a port of [Bob's](https://github.com/boboldehampsink/zipassets)
