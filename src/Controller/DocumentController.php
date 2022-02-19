<?php

namespace ammahmoodtork\accounting\Controller;

use ammahmoodtork\accounting\Models\Document;
use ammahmoodtork\accounting\Models\DocumentDetails;
use ammahmoodtork\accounting\Virtual\Request\Document\Insert;
use ammahmoodtork\accounting\Virtual\Resource\DocumentResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $result = Document::where($request->all())
            ->get();
        return (new DocumentResource($result))->response();
    }
    public function select($id)
    {
        $result = Document::where('id' , $id)
            ->with([])
            ->get();
        return (new DocumentResource($result))->response();
    }
    public function save(Insert $request)
    {
        $inputs = $request->all();
        $result = Document::create($inputs);
        foreach ($inputs['document_details'] as $item) {
            DocumentDetails::create(array_merge($item , ['doc_id' => $result->id]));
        }
        return (new DocumentResource($result))->response();
    }
}
