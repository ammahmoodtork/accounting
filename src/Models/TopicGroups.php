<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicGroups extends Model
{
    use HasFactory;
    protected $table = 'account_topic_group';
    protected $fillable = ['name'];
    
    public function topics(){
        return $this->hasMany(Topics::class , 'topic_group_id');
    }
}
