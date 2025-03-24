<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'designation',
        'branch_id',
        'extension_code',
        'personal_mobile',
    ];


    // Define the relationship with Branch model
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
