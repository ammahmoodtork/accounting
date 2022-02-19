<?php

namespace ammahmoodtork\accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detailed extends Model
{
    use SoftDeletes;
    protected $table = 'account_detailed';
    use HasFactory;
    protected $fillable = ['name', 'code', 'source_id', 'parent_id'];

    protected $with = ['detailed_source' , 'detailed_parent' , 'detailed_type' , 'detailed_year'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $year = Year::orderBy('id', 'DESC')->first();
            DetailedYear::create([
                'year_id' => $year->id,
                'detailed_id' => $model->id
            ]);

            $detailed_type = [];
            if ($model->source_id == 1) {
                $detailed_type[] = ['type_of_detailed_id' => 2];
                $detailed_type[] = ['type_of_detailed_id' => 6];
            }
            if ($model->source_id == 2) {
                $detailed_type[] = ['type_of_detailed_id' => 7];
            }
            if ($model->source_id == 3) {
                $detailed_type[] = ['type_of_detailed_id' => 1];
                $detailed_type[] = ['type_of_detailed_id' => 3];
                $detailed_type[] = ['type_of_detailed_id' => 5];
            }
            if ($model->source_id == 4) {
                $detailed_type[] = ['type_of_detailed_id' => 4];
            }
            if ($model->source_id == 5) {
                $detailed_type[] = ['type_of_detailed_id' => 8];
            }
            foreach ($detailed_type as $item) {
                DetailedType::create(array_merge($item, ['detailed_id' => $model->id]));
            }
        });
    }


    public function detailed_source()
    {
        return $this->belongsTo(DetailedSource::class, 'source_id');
    }
    public function detailed_parent()
    {
        return $this->belongsTo(Detailed::class, 'parent_id');
    }
    public function detailed_type()
    {
        return $this->hasMany(DetailedType::class, 'detailed_id');
    }
    public function detailed_year()
    {
        return $this->hasMany(DetailedYear::class, 'detailed_id');
    }
}
