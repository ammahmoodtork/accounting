<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicSources extends Model
{
    use HasFactory;
    protected $table = 'account_topic_source';
    protected $fillable = ['name'];
    public function topics(){
        return $this->hasMany(Topics::class , 'topic_source_id');
    }
}
