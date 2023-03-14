<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Currency\Entities\Currency;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'company_name',
        'company_email',
        'product_name',
        'product_code',
        'company_phone',
        'site_logo',
        'default_currency_id',
        'default_currency_position',
        'notification_email',
        'footer_text',
        'company_address',
    ];

    protected $guarded = [];

    protected $with = ['currency'];

    public function currency() {
        return $this->belongsTo(Currency::class, 'default_currency_id', 'id');
    }
}
