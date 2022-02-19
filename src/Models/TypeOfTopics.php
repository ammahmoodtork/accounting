<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfTopics extends Model
{
    use HasFactory;
    protected $table = 'account_type_of_topic';
    protected $fillable = ['name'];
    public function topicTypes(){
        return $this->hasMany(TopicTypes::class , 'topic_id');
    }
}
