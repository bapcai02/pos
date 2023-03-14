<?php

namespace Modules\Adjustment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use App\Traits\FormatDates;

class Adjustment extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'adjustments';

    protected $fillable = [
        'date',
        'reference',
        'note',
    ];

    protected $guarded = [];

    public function adjustedProducts() {
        return $this->hasMany(AdjustedProduct::class, 'adjustment_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Adjustment::max('id') + 1;
            $model->reference = make_reference_id('ADJ', $number);
        });
    }

}
