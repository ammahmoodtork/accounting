<?php

namespace ammahmoodtork\accounting\Controller;

use ammahmoodtork\accounting\Models\Detailed;
use ammahmoodtork\accounting\Virtual\Request\Detaileds\Insert;
use ammahmoodtork\accounting\Virtual\Request\Detaileds\Update;
use ammahmoodtork\accounting\Virtual\Resource\DetailedResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailedsController extends Controller
{
    public function index(Request $request)
    {
        $result = Detailed::where($request->all())
            ->with(['detailed_source' , 'detailed_parent' , 'detailed_type' , 'detailed_year'])
            ->get();
        return (new DetailedResource($result))->response();
    }

    public function select($id)
    {
        $result = Detailed::where('id' , $id)
            ->with(['detailed_source' , 'detailed_parent'])
            ->first();
        return (new DetailedResource($result))->response();
    }

    public function save(Insert $request)
    {
        $inputs = $request->all();
        $result = Detailed::create($inputs);
        return (new DetailedResource($result))->response();
    }

    public function update($id , Update $update)
    {
        $result = Detailed::where('id' , $id)
        ->first();
        $result->update($update->all());
        return (new DetailedResource($result))->response();
    }
}
