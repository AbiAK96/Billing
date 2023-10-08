<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelHasPermission extends Model
{
    use SoftDeletes;

    public $table = 'model_has_permissions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'permission_id',
		'model_type',
        'model_id'
    ];

    protected $casts = [
        'permission_id' => 'integer',
		'model_type' => 'string',
        'model_id' => 'integer'
    ];
}
