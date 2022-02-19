<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedSource extends Model
{
    use HasFactory;
    protected $table = 'account_detailed_source';
    protected $fillable = ['name'];

    public function detaileds(){
        return $this->hasMany(Detailed::class , 'source_id');
    }
}
