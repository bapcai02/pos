<?php

namespace Modules\Expense\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use App\Traits\FormatDates;

class Expense extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'expenses';

    protected $fillable = [
        'category_id',
        'date',
        'reference',
        'details',
        'amount',
    ];

    protected $guarded = [];

    public function category() {
        return $this->belongsTo(ExpenseCategory::class, 'category_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Expense::max('id') + 1;
            $model->reference = make_reference_id('EXP', $number);
        });
    }

    public function setAmountAttribute($value) {
        $this->attributes['amount'] = ($value * 100);
    }

    public function getAmountAttribute($value) {
        return ($value / 100);
    }
}
