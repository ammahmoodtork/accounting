<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedYear extends Model
{
    use HasFactory;
    protected $table = 'account_detailed_year';
    protected $fillable = ['year_id', 'detailed_id'];
    protected $with = ['year'];
    public function year(){
        return $this->belongsTo(Year::class , 'year_id');
    }
    public function detailed(){
        return $this->belongsTo(Detailed::class , 'detailed_id');
    }
}
