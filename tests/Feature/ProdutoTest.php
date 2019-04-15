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

    public function testList()
    {
        factory(\App\Produto::class)->create();
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testView()
    {
        $data = factory(\App\Produto::class)->create();
        $response = $this->json('GET', '/editar/'.$data->id);

        $response->assertStatus(200);
    }



    public function testDelete()
    {

        $data = factory(\App\Produto::class)->create();
        $response = $this->json('DELETE', '/deletar/'.$data->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {

        $data = factory(\App\Produto::class)->create();
        $toUpdate = ['name' => 'Martelo'];

        $response = $this->json('PUT', 'editar/'.$data->id, $toUpdate);
        $response->assertStatus(200)
            ->assertJson($toUpdate);
    }


}

