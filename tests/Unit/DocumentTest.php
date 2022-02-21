<?php

use ammahmoodtork\accounting\Models\Document;
use Illuminate\Support\Facades\Artisan;

class DocumentTest extends Tests\TestCase
{
    private $document , $document_details;
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        $this->document = Document::create([
            'id'=>1,
            'des' => "UnitTest for Document",
            'order'=>0,
            'year_id' =>1,
            'type_id'=>1,
            'state_id'=>1
        ]);
    }

    public function testSomethingIsTrue()
    {
        try {
            $document = Document::find(1);
            $this->assertEquals(1 , $document->id);
        } catch (\Throwable $th) {
            $this->assertTrue(false);
        }
    }
    /** @test */
    public function a_user_has_a_first_name()
    {
        $this->assertEquals("UnitTest for Document", $this->document->des);
    }
}
