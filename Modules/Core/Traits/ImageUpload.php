<?php

namespace Modules\Core\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
trait ImageUpload
{
    /**
     * @param $image
     *
     * @return string
     */
    public function verifyAndStoreImage($image): string
    {
        $imageName = $this->getUniqueImageName($image);
        $paths = $this->makePaths();

        $this->ensureDirectoriesExist($paths);
        $this->moveImageToFolder($image, $paths->original, $imageName);

        $find_image = $paths->original.$imageName;
        $this->resizeImage($find_image, 200, $paths->thumbnail.$imageName);
        $this->resizeImage($find_image, 600, $paths->medium.$imageName);

        return $imageName;
    }

    public function getUniqueImageName($image): string
    {
        return Str::random(15).'.'.$image->getClientOriginalExtension();
    }

    public function ensureDirectoriesExist($paths): void
    {
        File::makeDirectory($paths->original, 0755, true, true);
        File::makeDirectory($paths->thumbnail, 0755, true, true);
        File::makeDirectory($paths->medium, 0755, true, true);
    }

    public function moveImageToFolder($image, $directory, $imageName): void
    {
        $image->move($directory, $imageName);
    }

    public function resizeImage($find_image, $size, $destination): void
    {

        $manager = new ImageManager(new Driver());
        $image = $manager->read($find_image);
        $image->scale(width: 300);
        $image->toPng()->save($destination);


    }
}
