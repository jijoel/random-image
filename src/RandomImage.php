<?php namespace Jijoel\RandomImage;


class RandomImage
{
    /**
     * Return a list of image files in the given folder
     * Note: This relies on the image extension,
     * which may not be reliable in all cases.
     */
    public static function files($folder)
    {
        if (! file_exists(public_path($folder)))
            throw new FolderNotFoundException;

        $images = preg_grep(
            '~\.(jpeg|jpg|png|gif)$~',
            scandir(public_path($folder))
        );

        if (! $images)
            throw new EmptyFolderException;

        return $images;
    }

    /**
     * Load a uri to a random file name
     */
    public static function uri($folder)
    {
        $array = self::files($folder);

        return $folder . DIRECTORY_SEPARATOR . $array[array_rand($array)];
    }

    /**
     * Load a background image, eg:
     * style="{{ RandomImage::style('images/backgrounds') }}"
     * style="background-image:url(images/backgrounds/file.jpg)"
     */
    public static function style($folder)
    {
        $file = self::uri($folder);

        return "background-image:url($file)";
    }

}
