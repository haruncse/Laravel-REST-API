<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiTestTable extends Model
{
	protected $table = 'ApiTestTable';
    protected $fillable = [
        'api_data'
    ];
}
