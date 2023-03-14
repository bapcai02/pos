<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use App\Traits\FormatDates;

class SalePayment extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'sale_payments';

    protected $fillable = [
        'sale_id',
        'amount',
        'date',
        'reference',
        'payment_method',
        'note',
    ];

    protected $guarded = [];

    public function sale() {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }

    public function setAmountAttribute($value) {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value) {
        return $value / 100;
    }

    public function scopeBySale($query) {
        return $query->where('sale_id', request()->route('sale_id'));
    }
}
