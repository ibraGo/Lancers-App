<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'name',
        'user_id'
    ];

    protected $visible = ['first_name', 
        'id',    
        'name',
        'user_id',
        'client_id',    
        'estimate_id',
        'tracking_code',
        'invoice_id',    
        'progress',
        'status',
        'contract_id'
    ];
    
    public function scopeOfUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
}
