<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewCatalogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_example2()
    {
        $this->assertDatabaseCount('catalogs',2);
    }

    public function test_example3()
    {
        $this->assertDatabaseHas('catalogs', ['name'=>'Solar Panel']);
    }

    public function test_example4()
    {
        $this->assertDatabaseMissing('catalogs', ['name'=>'Solar Panel']);
    }

    public function test_example5()
    {
        $response = $this->withHeaders(['X-Header' => 'Value',])->post('/catalog',['name'=>'Battery','description'=>'Keeps a charge','price'=>'1500.00',]);
        $response->assertStatus(201);
    }

    public function test_example6()
    {
        $response = $this->withHeaders(['X-Header' => 'Value',])->post('/catalog',['name'=>'Battery','description'=>'Keeps a charge','price'=>'1500.00',]);
        $this->assertDatabaseHas('catalogs', ['name'=>'Battery','description'=>'Keeps a charge','price'=>'1500.00']);
    }

    public function test_example7()
    {
        $response = $this->withHeaders(['X-Header' => 'Value',])->post('/login',['email'=>'adeyahmck@hotmail.com','password'=>'12345678']);
        $response->assertStatus(200);
    }


}
