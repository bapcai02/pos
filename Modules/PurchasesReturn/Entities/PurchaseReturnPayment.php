<?php

namespace Modules\PurchasesReturn\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use App\Traits\FormatDates;

class PurchaseReturnPayment extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'purchase_return_payments';

    protected $fillable = [
        'purchase_return_id',
        'amount',
        'date',
        'reference',
        'payment_method',
        'note',
    ];

    protected $guarded = [];

    public function purchaseReturn() {
        return $this->belongsTo(PurchaseReturn::class, 'purchase_return_id', 'id');
    }

    public function setAmountAttribute($value) {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value) {
        return $value / 100;
    }

    public function scopeByPurchaseReturn($query) {
        return $query->where('purchase_return_id', request()->route('purchase_return_id'));
    }
}
