<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    /**
     * @OA\Schema(
     *     schema="Item",
     *     required={"quantity", "individual_price", "order_id", "product_id"},
     *     @OA\Property(
     *         property="id",
     *         type="integer",
     *         format="int64"
     *     ),
     *     @OA\Property(
     *         property="quantity",
     *         type="integer",
     *         format="int64"
     *     ),
     *     @OA\Property(
     *         property="individual_price",
     *         type="number",
     *         format="float"
     *     ),
     *     @OA\Property(
     *         property="order_id",
     *         type="integer",
     *         format="int64"
     *     ),
     *     @OA\Property(
     *         property="product_id",
     *         type="integer",
     *         format="int64"
     *     ),
     *     @OA\Property(
     *         property="created_at",
     *         type="string",
     *         format="date-time"
     *     ),
     *     @OA\Property(
     *         property="updated_at",
     *         type="string",
     *         format="date-time"
     *     ),
     *     @OA\Property(
     *         property="order",
     *         ref="#/components/schemas/Order"
     *     ),
     *     @OA\Property(
     *         property="product",
     *         ref="#/components/schemas/Product"
     *     )
     * )
     */
class Item extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'individual_price', 'order_id', 'product_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}