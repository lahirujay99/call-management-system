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
        'designation_id', // Changed from 'designation' to 'designation_id'
        'branch_id',
        'extension_code',
        'personal_mobile',
        'image_path',
        'active_status',
    ];


    // Define the relationship with Branch model
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    // Define the relationship with Designation model
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
