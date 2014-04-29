<?php
/**
 * Created by PhpStorm.
 * User: sccouch
 * Date: 4/29/14
 * Time: 1:18 PM
 */

class SearchControllerTest extends TestCase {

    public function testController()
    {
        $this->call('GET', 'search');
        $this->assertViewHas('albums');
    }
}