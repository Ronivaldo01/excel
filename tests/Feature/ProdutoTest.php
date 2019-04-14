<?php
/**
 * Created by PhpStorm.
 * User: ssd
 * Date: 13/04/2019
 * Time: 14:50
 */

namespace Tests\Feature;


use Tests\TestCase;

class ProdutoTest extends TestCase
{

    public function testApiList()
    {
        factory(\App\Produto::class)->create();
        $response = $this->get('/');
        $response->assertStatus(200);
    }



    public function testUpload()
    {
        $data = factory(\App\Produto::class);
        $this->assertTrue(true);
    }
}

