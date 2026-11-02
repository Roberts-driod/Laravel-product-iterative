<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductQuantityTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_quantity_can_be_increased(): void
    {
        $product = Product::factory()->create([
            'quantity' => 10,
        ]);

        $product->increaseQuantity(5);

        $this->assertSame(15, (int) $product->fresh()->quantity);
    }

    public function test_product_quantity_can_be_decreased(): void
    {
        $product = Product::factory()->create([
            'quantity' => 10,
        ]);

        $result = $product->decreaseQuantity(3);

        $this->assertTrue($result);
        $this->assertSame(7, (int) $product->fresh()->quantity);
    }

    public function test_product_quantity_cannot_be_decreased_below_zero(): void
    {
        $product = Product::factory()->create([
            'quantity' => 5,
        ]);

        $result = $product->decreaseQuantity(10);

        $this->assertFalse($result);
        $this->assertSame(5, (int) $product->fresh()->quantity);
    }

    public function test_product_quantity_cannot_be_increased_by_zero(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $product = Product::factory()->create([
            'quantity' => 10,
        ]);

        $product->increaseQuantity(0);
    }
}