<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfDetailed extends Model
{
    use HasFactory;
    protected $table = 'account_type_of_detailed';
    protected $fillable = ['title'];
    public function topicTypes(){
        return $this->hasMany(DetailedType::class , 'topic_id');
    }
}
