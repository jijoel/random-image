<?php namespace Jijoel\RandomImage;

use PHPUnit\Framework\TestCase;
use Exception;


class RandomImageTest extends TestCase
{
    /**
     * @test
     * @expectedException Jijoel\RandomImage\FolderNotFoundException
     */
    public function it_throws_an_exception_if_image_folder_does_not_exist()
    {
        RandomImage::files('/does-not-exist');
    }

    /**
     * @test
     * @expectedException Jijoel\RandomImage\EmptyFolderException
     */
    public function it_throws_an_exception_if_image_folder_is_empty()
    {
        RandomImage::files('/images/empty');
    }

    /**
     * @test
     * This test ensures that we ONLY return image files,
     * even if there are other files in the folder
     */
    public function it_can_return_a_list_of_image_files()
    {
        $files = RandomImage::files('/images/files');

        $this->assertCount(2,$files);
    }

    /**
     * @test
     */
    public function it_can_return_a_uri_to_a_random_image()
    {
        $test = RandomImage::uri('/images/files');

        // make sure the test is a path to the image:
        // eg, /images/files/<file>
        $this->assertRegExp('/\/images\/files\/(green|blue).png/', $test);
    }

    /**
     * @test
     */
    public function it_can_return_a_style_definition_to_random_image()
    {
        $test = RandomImage::style('/images/files');

        // make sure the test is a style de to the image:
        // eg, 'background-image:url("/images/files/<file>")
        $this->assertRegExp('/background-image:url\(\'\/images\/files\/(green|blue).png\'\)/', $test);
    }

    /**
     * @test
     * We also need to be able to handle single and double
     * quotation marks in a file name
     */
    public function it_will_escape_quotation_marks()
    {
        $test = RandomImage::files('/images/quotes');

        $this->assertContains("/images/quotes/It\'s Orange!.jpeg", $test);
        $this->assertContains("/images/quotes/Some call it &quot;Purple&quot;.jpg", $test);
    }

}

// Fake some functions
function public_path($folder)
{
    // return __DIR__ . DIRECTORY_SEPARATOR . $folder;

    return $folder;
}

function file_exists($folder)
{
    if (strpos($folder, '/images') !== false)
        return true;

    return false;
}

function scandir($folder)
{
    if (strpos($folder, '/empty') !== false)
        return ['.','..'];

    if (strpos($folder, '/images/files') !== false)
        return ['.','..','.DS_Store','foo.txt','blue.png','green.png'];

    if (strpos($folder, '/images/quotes') !== false)
        return ["It's Orange!.jpeg",'Some call it "Purple".jpg'];
}
