<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $primaryKey = 'order_id';

    public function user(){
        return $this->belongsTo(User::class, 'account_id', 'account_id');
    }

    public function ebook(){
        return $this->belongsTo(Ebook::class, 'ebook_id', 'ebook_id');
    }
}
