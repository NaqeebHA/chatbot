<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $table = 'debt';

    protected $casts = [
        'due_date' => 'date',
    ];

    public function debtor()
    {
        return $this->belongsTo(Debtor::class);
    }
}
