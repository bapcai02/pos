<?php

namespace Modules\Quotation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;
use App\Traits\FormatDates;
class QuotationDetails extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'quotation_details';

    protected $fillable = [
        'quotation_id',
        'product_id',
        'product_name',
        'product_code',
        'quantity',
        'price',
        'unit_price',
        'sub_total',
        'product_discount_amount',
        'product_discount_type',
        'product_tax_amount',
    ];

    protected $guarded = [];

    protected $with = ['product'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function quotation() {
        return $this->belongsTo(Quotation::class, 'quotation_id', 'id');
    }

    public function getPriceAttribute($value) {
        return $value / 100;
    }

    public function getUnitPriceAttribute($value) {
        return $value / 100;
    }

    public function getSubTotalAttribute($value) {
        return $value / 100;
    }

    public function getProductDiscountAmountAttribute($value) {
        return $value / 100;
    }

    public function getProductTaxAmountAttribute($value) {
        return $value / 100;
    }}
