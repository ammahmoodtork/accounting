<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;
    protected $table = 'account_document_type';
    protected $fillable = ['name'];
    
    public function documents(){
        return $this->hasMany(Document::class , 'state_id');
    }
}
