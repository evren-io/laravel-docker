<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class HomePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @return void
     */
    public function assert(Browser $browser)
    {
        $this->testFavourite($browser);
    }

    private function testFavourite(Browser $browser)
    {
        /**
         * @var $browser Browser
         */
        $browser->assertSee('Channels');
        $browser->waitUntil('bus._isMounted');
        $browser->pause(2000);
        $browser->click('#favourites');
        $browser->assertSee('CH 101');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
