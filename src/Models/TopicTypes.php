<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicTypes extends Model
{
    use HasFactory;
    protected $table = 'account_topic_type';
    protected $fillable = ['topic_id' , 'type_of_topic_id'];
    public function topic(){
        return $this->belongsTo(Topics::class , 'topic_id');
    }
    public function parent(){
        return $this->belongsTo(TypeOfTopics::class , 'type_of_topic_id');
    }
}
