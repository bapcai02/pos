<?php

namespace Modules\People\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\FormatDates;

class Customer extends Model
{

    use HasFactory, FormatDates;

    protected $table = 'customers';

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'city',
        'country',
        'address'
    ];

    protected $guarded = [];

    protected static function newFactory() {
        return \Modules\People\Database\factories\CustomerFactory::new();
    }

}
