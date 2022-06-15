<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesStatusTest extends TestCase
{
    /**
     * Main page test.
     *
     * @return void
     */
    public function test_main_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * File explorer.
     *
     * @return void
     */
    public function test_filetree_feature()
    {
        $response = $this->get('/filetree');

        $response->assertStatus(200);
    }


}
