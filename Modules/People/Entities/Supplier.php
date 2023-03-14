<?php

namespace Modules\People\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\FormatDates;

class Supplier extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'suppliers';

    protected $fillable = [
        'supplier_name',
        'supplier_email',
        'customer_phone',
        'supplier_phone',
        'city',
        'country',
        'address'
    ];


    protected $guarded = [];

    protected static function newFactory() {
        return \Modules\People\Database\factories\SupplierFactory::new();
    }
}
