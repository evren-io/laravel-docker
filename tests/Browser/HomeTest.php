<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;

class HomeTest extends DuskTestCase
{
    /**
     * Test Click Favourite
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->browse(
            function ($browser) {
                $browser->visit(new HomePage());
            }
        );
    }
}
