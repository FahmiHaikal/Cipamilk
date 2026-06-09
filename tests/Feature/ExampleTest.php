<?php

namespace Tests\Feature;

use Database\Seeders\CipaMilkSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(CipaMilkSeeder::class);
    }

    public function test_landing_page_returns_catalog_with_product_detail_links(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('Menu Kami')
            ->assertSee('Yoghurt Botol Ciyo')
            ->assertSee('/p/yoghurt-botol-ciyo', false)
            ->assertSee('Lihat Detail');
    }

    public function test_product_detail_page_returns_qr_product_content_and_navigation(): void
    {
        $response = $this->get('/p/yoghurt-botol-ciyo');

        $response
            ->assertOk()
            ->assertSee('Yoghurt Botol Ciyo')
            ->assertSee('Rp 8.000')
            ->assertSee('Yoghurt Ciyoo')
            ->assertSee('Katalog')
            ->assertSee('Produk Lainnya');
    }
}
