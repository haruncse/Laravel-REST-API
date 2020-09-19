<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
	protected $table="customer_info";
    protected $fillable = [
        'customer_name','customer_code'
    ];
}
