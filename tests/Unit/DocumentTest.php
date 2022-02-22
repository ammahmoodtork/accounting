<?php

use ammahmoodtork\accounting\Models\Document;
use ammahmoodtork\accounting\Models\DocumentDetails;
use Illuminate\Support\Facades\Artisan;

class DocumentTest extends Tests\TestCase
{
    private $document, $document_details;
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        $this->document = Document::create([
            'id' => 1,
            'des' => "UnitTest for Document",
            'order' => 0,
            'year_id' => 1,
            'type_id' => 1,
            'state_id' => 1
        ]);


        $details =
            [
                [
                    'des' => 'test detail 1',
                    'doc_id' => 1,
                    'topic_id' => 5,
                    'detailed_id' => 1,
                    'debtor'=>50000,
                    'creaditor'=>50000
                ],
                [
                    'des' => 'test detail 2',
                    'doc_id' => 1,
                    'topic_id' => 5,
                    'detailed_id' => 1,
                    'debtor'=>50000,
                    'creaditor'=>50000
                ]
            ];
        DocumentDetails::insert($details);
    }

    public function findFIrstRecord()
    {
        try {
            $document = Document::find(1);
            $this->assertEquals(1, $document->id);
        } catch (\Throwable $th) {
            $this->assertTrue(false);
        }
    }
    /** @test */
    public function InsertedDataDescriptionIsEqual()
    {
        $this->assertEquals("UnitTest for Document", $this->document->des);
    }
    /** @test */
    public function GetDetaileds()
    {
        $doc = Document::where('id' , 1)->with('document_details')->first();
        $this->assertCount(2 , $doc->document_details);
    }
}
