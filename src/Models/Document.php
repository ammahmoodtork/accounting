<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'account_document';
    protected $fillable = ['des', 'order', 'year_id', 'doc_id_rel', 'type_id', 'state_id'];
    protected $with = ['document_details' , 'document_state' , 'document_type' , 'document_year'];
    public function document_state()
    {
        return $this->belongsTo(DocumentState::class, 'topic_group_id');
    }
    public function document_type()
    {
        return $this->belongsTo(DocumentType::class, 'topic_source_id');
    }
    public function document_year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
    public function realated_document()
    {
        return $this->belongsTo(Document::class, 'doc_id_rel');
    }
    public function document_details()
    {
        return $this->hasMany(DocumentDetails::class, 'doc_id');
    }



}
