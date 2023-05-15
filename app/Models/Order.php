<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    /**
     * @OA\Schema(
     *     schema="Order",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="customer_email", type="string", example="example@example.com"),
     *     @OA\Property(property="total_amount", type="number", format="float", example=123.45),
     *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-05-14 13:42:21"),
     *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-05-14 13:42:21"),
     *     @OA\Property(property="items", type="array", @OA\Items(ref="#/components/schemas/Item")),
     * )
     */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_email',
        'total_amount',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}