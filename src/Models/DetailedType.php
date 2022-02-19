<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedType extends Model
{
    use HasFactory;
    protected $table = 'account_detailed_type';
    protected $fillable = ['type_of_detailed_id' , 'detailed_id'];
    protected $with =['type'];
    public function type(){
        return $this->belongsTo(TypeOfDetailed::class , 'type_of_detailed_id');
    }
    public function detailed(){
        return $this->belongsTo(Detailed::class , 'detailed_id');
    }
}
