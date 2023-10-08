<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerInquiry extends Model
{
    use SoftDeletes;

    public $table = 'customer_inquiry';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'customer_id',
		'inquiry_subject',
        'inquiry_details',
		'status_id',
        'organization_id'
    ];

    protected $casts = [
        'customer_id' => 'integer',
		'inquiry_subject' => 'string',
        'inquiry_details' => 'string',
		'status_id' => 'integer'
    ];

	public function status()
    {
    	return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    public function customer()
    {
    	return $this->hasOne('App\Models\CustomerDetails', 'id', 'customer_id');
    }
}
