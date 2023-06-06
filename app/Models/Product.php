<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     required={"id", "name", "price", "stock", "description", "product_category_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Fanta"),
 *     @OA\Property(property="price", type="number", format="float", example=999.99),
 *     @OA\Property(property="stock", type="integer", example=10),
 *     @OA\Property(property="description", type="string", example="Vaso de 300ml de Fanta."),
 *     @OA\Property(property="product_category_id", type="integer", example=1),
 *     @OA\Property(property="category", ref="#/components/schemas/ProductCategory")
 * )
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'product_category_id',
        'image',
    ];

    public function category()
    {
    return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    
}