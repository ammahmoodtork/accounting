<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentState extends Model
{
    use HasFactory;
    protected $table = 'account_document_state';
    protected $fillable = ['name'];
    
    public function documents(){
        return $this->hasMany(Topics::class , 'type_id');
    }
}
