<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ward extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    protected $table = 'wards';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function districts()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }
}
