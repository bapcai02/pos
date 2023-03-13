<?php

namespace Modules\SalesReturn\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use App\Traits\FormatDates;

class SaleReturnPayment extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'sale_return_payments';

    protected $fillable = [
        'sale_return_id',
        'amount',
        'date',
        'reference',
        'payment_method',
        'note'
    ];

    protected $guarded = [];

    public function saleReturn() {
        return $this->belongsTo(SaleReturn::class, 'sale_return_id', 'id');
    }

    public function setAmountAttribute($value) {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value) {
        return $value / 100;
    }

    public function scopeBySaleReturn($query) {
        return $query->where('sale_return_id', request()->route('sale_return_id'));
    }
}
