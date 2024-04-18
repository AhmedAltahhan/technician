<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'sub_service_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function publicService()
    {
        return $this->belongsTo(PublicService::class);
    }
}
