<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pagecontent',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
