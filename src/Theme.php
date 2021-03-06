<?php

namespace Yajra\CMS\Themes;

use Illuminate\Support\Fluent;

class Theme extends Fluent
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $theme;

    /**
     * @var string
     */
    public $version;

    /**
     * @var string
     */
    public $description;

    /**
     * @var array
     */
    public $positions = [];

    /**
     * @var string
     */
    public $type;

    /**
     * Theme constructor.
     *
     * @param string $name
     * @param string $theme
     * @param string $type
     * @param string $version
     * @param string $description
     * @param array $positions
     * @param array|object $attributes
     */
    public function __construct($name, $theme, $type, $version, $description, array $positions, $attributes = [])
    {
        $this->name        = $name;
        $this->theme       = $theme;
        $this->type        = $type;
        $this->version     = $version;
        $this->description = $description;
        $this->positions   = $positions;

        parent::__construct($attributes);
    }

    /**
     * Check if this team is the default theme.
     *
     * @return bool
     */
    public function isDefault()
    {
        return $this->theme == config('themes.frontend', 'default');
    }

    /**
     * Get theme image preview url.
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function preview()
    {
        return url('themes/' . $this->theme . '/preview.png');
    }
}
