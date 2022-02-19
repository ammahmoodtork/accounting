<?php

namespace ammahmoodtork\accounting\Controller;

use ammahmoodtork\accounting\Models\Topics;
use ammahmoodtork\accounting\Virtual\Request\Topic\Insert;
use ammahmoodtork\accounting\Virtual\Request\Topic\Update;
use ammahmoodtork\accounting\Virtual\Resource\TopicResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        $result = Topics::where($request->all())
            ->with(['topic_group' , 'topic_source' , 'topic_parent' , 'year'])
            ->get();
        return (new TopicResource($result))->response();
    }

    public function select($id)
    {
        $result = Topics::where('id' , $id)
            ->first();
        return (new TopicResource($result))->response();
    }

    public function save(Insert $request)
    {
        $inputs = $request->all();
        $result = Topics::create($inputs);
        return (new TopicResource($result))->response();
    }

    public function update($id , Update $update)
    {
        $result = Topics::where('id' , $id)
        ->first();
        $result->update($update->all());
        return (new TopicResource($result))->response();
    }
}
