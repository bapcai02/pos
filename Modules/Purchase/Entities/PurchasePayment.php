<?php

namespace Modules\Purchase\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use App\Traits\FormatDates;

class PurchasePayment extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'purchase_payments';

    protected $fillable = [
        'purchase_id',
        'amount',
        'date',
        'reference',
        'payment_method',
        'note',
    ];

    protected $guarded = [];

    public function purchase() {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }

    public function setAmountAttribute($value) {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value) {
        return $value / 100;
    }

    public function scopeByPurchase($query) {
        return $query->where('purchase_id', request()->route('purchase_id'));
    }
}
