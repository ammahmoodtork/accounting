<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'account_setting';
    protected $fillable = ['title', 'char', 'len_g', 'len_k', 'len_m2', 'len_t1', 'len_t2', 'len_t3', 'add_gr_code'];
    public function year(){
        return $this->hasMany(Year::class , 'setting_id');
    }

}
