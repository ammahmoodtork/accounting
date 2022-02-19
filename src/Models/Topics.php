<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topics extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'account_topic';
    protected $fillable = ['name', 'code', 'min_debtor', 'min_creditor', 'max_debtor', 'max_creditor', 'year_id', 'topic_group_id', 'topic_source_id', 'parent_id'];

    public function topic_group(){
        return $this->belongsTo(TopicGroups::class , 'topic_group_id');
    }
    public function topic_source(){
        return $this->belongsTo(TopicSources::class , 'topic_source_id');
    }
    public function topic_parent(){
        return $this->belongsTo(Topics::class , 'parent_id');
    }
    public function year(){
        return $this->belongsTo(Year::class , 'year_id');
    }
    public function document_detail(){
        return $this->hasMany(DocumentDetails::class , 'topic_id');
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            
            $topic_type = [];
                $topic_type[] = ['type_of_topic_id' => 2];
                $topic_type[] = ['type_of_topic_id' => 6];
                $topic_type[] = ['type_of_topic_id' => 7];
                $topic_type[] = ['type_of_topic_id' => 1];
                $topic_type[] = ['type_of_topic_id' => 3];
                $topic_type[] = ['type_of_topic_id' => 5];
                $topic_type[] = ['type_of_topic_id' => 4];
                $topic_type[] = ['type_of_topic_id' => 8];
            foreach ($topic_type as $item) {
                TopicTypes::create(array_merge($item, ['topic_id' => $model->id]));
            }
        });
    }
}
