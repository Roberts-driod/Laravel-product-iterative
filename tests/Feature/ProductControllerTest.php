<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_index_is_accessible(): void
    {
        Product::factory()->count(3)->create();

        $response = $this->get(route('products.index'));

        $response->assertOk();
    }

    public function test_product_create_page_is_accessible(): void
    {
        $response = $this->get(route('products.create'));

        $response->assertOk();
    }

    public function test_product_can_be_created(): void
    {
        $data = [
            'name' => 'Test Product',
            'quantity' => 10,
            'description' => 'Test description',
            'expiration_date' => '2027-12-31',
            'status' => 'active',
            'price' => 5.99,
        ];

        $response = $this->post(route('products.store'), $data);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
        ]);
    }

    public function test_product_show_page_is_accessible(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.show', $product));

        $response->assertOk();
    }

    public function test_product_edit_page_is_accessible(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.edit', $product));

        $response->assertOk();
    }

    public function test_product_can_be_updated(): void
    {
        $product = Product::factory()->create();

        $data = [
            'name' => 'Updated Product',
            'quantity' => 20,
            'description' => 'Updated description',
            'expiration_date' => '2027-12-31',
            'status' => 'inactive',
            'price' => 10.50,
        ];

        $response = $this->put(
            route('products.update', $product),
            $data
        );

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Product',
        ]);
    }

    public function test_product_can_be_deleted(): void
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }

    public function test_product_creation_requires_name(): void
    {
        $data = [
            'name' => '',
            'quantity' => 10,
            'description' => 'Test description',
            'expiration_date' => '2027-12-31',
            'status' => 'active',
            'price' => 5.99,
        ];

        $response = $this->post(route('products.store'), $data);

        $response->assertSessionHasErrors('name');
    }
    
        public function test_product_quantity_can_be_increased(): void
    {
        $product = Product::factory()->create([
            'quantity' => 10,
        ]);

        $response = $this->post(
            route('products.quantity.increase', $product),
            ['amount' => 5]
        );

        $response->assertRedirect(route('products.show', $product));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'quantity' => 15,
        ]);
    }

    public function test_product_quantity_can_be_decreased(): void
    {
        $product = Product::factory()->create([
            'quantity' => 10,
        ]);

        $response = $this->post(
            route('products.quantity.decrease', $product),
            ['amount' => 3]
        );

        $response->assertRedirect(route('products.show', $product));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'quantity' => 7,
        ]);
    }

    public function test_product_quantity_cannot_be_decreased_below_zero(): void
    {
        $product = Product::factory()->create([
            'quantity' => 5,
        ]);

        $response = $this->from(route('products.show', $product))
            ->post(
                route('products.quantity.decrease', $product),
                ['amount' => 10]
            );

        $response->assertRedirect(route('products.show', $product));
        $response->assertSessionHasErrors('amount');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'quantity' => 5,
        ]);
    }

    public function test_quantity_change_requires_positive_amount(): void
    {
        $product = Product::factory()->create([
            'quantity' => 10,
        ]);

        $response = $this->post(
            route('products.quantity.increase', $product),
            ['amount' => 0]
        );

        $response->assertSessionHasErrors('amount');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'quantity' => 10,
        ]);
    }
}