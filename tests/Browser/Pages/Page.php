<?php

namespace Tests\Browser\Pages;

use Tests\DuskTestCase;

abstract class Page extends DuskTestCase
{
    /**
     * Get the global element shortcuts for the site.
     *
     * @return array
     */
    public static function siteElements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
