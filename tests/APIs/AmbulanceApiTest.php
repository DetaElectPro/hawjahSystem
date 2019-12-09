<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Ambulance;

class AmbulanceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ambulance()
    {
        $ambulance = factory(Ambulance::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ambulances', $ambulance
        );

        $this->assertApiResponse($ambulance);
    }

    /**
     * @test
     */
    public function test_read_ambulance()
    {
        $ambulance = factory(Ambulance::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/ambulances/'.$ambulance->id
        );

        $this->assertApiResponse($ambulance->toArray());
    }

    /**
     * @test
     */
    public function test_update_ambulance()
    {
        $ambulance = factory(Ambulance::class)->create();
        $editedAmbulance = factory(Ambulance::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ambulances/'.$ambulance->id,
            $editedAmbulance
        );

        $this->assertApiResponse($editedAmbulance);
    }

    /**
     * @test
     */
    public function test_delete_ambulance()
    {
        $ambulance = factory(Ambulance::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ambulances/'.$ambulance->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ambulances/'.$ambulance->id
        );

        $this->response->assertStatus(404);
    }
}
