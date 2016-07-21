<?php

namespace Yajra\CMS\Themes;

use Illuminate\View\FileViewFinder;

class ThemeViewFinder extends FileViewFinder
{
    /**
     * Base path to look for blade files.
     *
     * @var string
     */
    protected $basePath;

    /**
     * Set file view finder base path.
     *
     * @param $path
     */
    public function setBasePath($path)
    {
        $this->basePath = $path;

        array_unshift($this->paths, $this->basePath);
    }

    /**
     * Remove base path.
     */
    public function removeBasePath()
    {
        unset($this->paths[0]);
    }
}




