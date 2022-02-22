<?php

use \Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class TestCase extends BaseTestCase
{
    use CreatesApplication;
    private $document, $document_details;
    public function setUp(): void
    {
        parent::setUp();
        
    }

}
