<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'qr_code',
    ];

    public function movements(): HasMany
    {
        return $this->hasMany(Movement::class);
    }

    public function updateQuantity(): void
    {
        $entradas = $this->movements()->where('type', 'entrada')->sum('quantity');
        $saidas = $this->movements()->where('type', 'saida')->sum('quantity');
        
        $this->quantity = $entradas - $saidas;
        $this->save();
    }
}