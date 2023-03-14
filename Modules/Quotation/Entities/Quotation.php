<?php

namespace Modules\Quotation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Modules\People\Entities\Customer;
use App\Traits\FormatDates;

class Quotation extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'quotations';

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
        'status',
        'note'
    ];

    protected $guarded = [];

    public function quotationDetails() {
        return $this->hasMany(QuotationDetails::class, 'quotation_id', 'id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Quotation::max('id') + 1;
            $model->reference = make_reference_id('QT', $number);
        });
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
