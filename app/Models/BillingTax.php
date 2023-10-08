<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingTax extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public $table = 'billing_tax';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'organization_id',
		'billing_id',
        'tax_id',
		'percentage',
        'tax_price'
    ];

    protected $casts = [
        'organization_id' => 'integer',
		'billing_id' => 'integer',
        'tax_id' => 'integer',
		'percentage' => 'string',
        'tax_price' => 'double'
    ];

    public function tax()
    {
    	return $this->hasOne('App\Models\BillingTax', 'id', 'tax_id');
    }
}
