<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDetails extends Model
{
    use HasFactory;
    protected $table = 'account_document_details';
    protected $fillable = ['doc_id', 'topic_id', 'detailed_id', 'child_id', 'des', 'debtor', 'creaditor'];
    public function document(){
        return $this->belongsTo(Document::class , 'doc_id');
    }
    public function topic(){
        return $this->belongsTo(Topics::class , 'topic_id');
    }
    public function detailed(){
        return $this->belongsTo(Detailed::class , 'detailed_id');
    }
    public function childDocument(){
        return $this->belongsTo(Document::class , 'child_id');
    }
}
