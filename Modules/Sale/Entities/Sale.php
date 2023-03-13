<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\FormatDates;

class Sale extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'sales';
    protected $fillable = [
        'date', 
        'reference', 
        'customer_id', 
        'customer_name', 
        'tax_percentage', 
        'tax_amount', 
        'discount_percentage', 
        'discount_amount',
        'shipping_amount', 
        'total_amount', 
        'paid_amount', 
        'due_amount', 
        'status', 
        'payment_status', 
        'payment_method', 
        'note'
    ];

    protected $guarded = [];

    public function saleDetails() {
        return $this->hasMany(SaleDetails::class, 'sale_id', 'id');
    }

    public function salePayments() {
        return $this->hasMany(SalePayment::class, 'sale_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Sale::max('id') + 1;
            $model->reference = make_reference_id('SL', $number);
        });
    }

    public function scopeCompleted($query) {
        return $query->where('status', 'Completed');
    }

    public function getShippingAmountAttribute($value) {
        return $value / 100;
    }

    public function getPaidAmountAttribute($value) {
        return $value / 100;
    }

    public function getTotalAmountAttribute($value) {
        return $value / 100;
    }

    public function getDueAmountAttribute($value) {
        return $value / 100;
    }

    public function getTaxAmountAttribute($value) {
        return $value / 100;
    }

    public function getDiscountAmountAttribute($value) {
        return $value / 100;
    }
}
