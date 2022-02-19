<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $table = 'account_year';
    protected $fillable = ['setting_id', 'year_state_id', 'start_date', 'end_date', 'des'];
    public function setting(){
        return $this->belongsTo(Setting::class , 'setting_id');
    }

}
