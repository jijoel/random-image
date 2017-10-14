RandomImage
==============
Load a random image from a directory on the server. This can be used as a background image.

Installation
---------------
Currently, this is not published to packagist. If you'd like to include it, you'll need to create a vcs repository for it:

    "repositories": [
      {
        "type": "vcs",
        "url": "https://github.com/jijoel/random-image"
      }
    ],
    "require": {
        "jijoel/random-image": "dev-master"

Then you can run `composer update`, and it will be installed. It will automatically register itself in Laravel 5.5.


Usage
--------------
To use a random background image on your page every time it is loaded, you can open your view with this:

    <html lang="{{ app()->getLocale() }}"
      class="has-wallpaper"
      style="{{ RandomImage::style('/images/files') }}"
    >

`/images/files` should be changed to wherever your actual files are kept (relative to the public_path() folder).

You can compile the styles into your project by importing them into your `resources/assets/sass/app.sass` file. You can either import the file directly:

    @import '../../../vendor/jijoel/random-image/css/wallpaper.css'

or you can publish the file so you can make changes at will. Files will be published to the folder `resources/assets/vendor/jijoel`. To do this:

    php artisan vendor:publish --tag jijoel/random-image

and in `resources/assets/sass/app.sass`:

    @import '../vendor/jijoel/wallpaper.css'


Available Methods
------------------

Generate a list of image files in the given directory
This list can be loaded directly into javascript

    RandomImage::files('/path/to/files');

Generate a uri to a single random file:

    RandomImage::uri('/path/to/files');

Include a style string in css:

    RandomImage::style('/path/to/files');

For instance, entering this in a laravel blade file:

    style="{{ RandomImage::style('/path/to/files') }}"

will result in the following markup:

    style="background-image:url('/path/to/files/file.jpg')"

