<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EmergencyServiced;

class EmergencyServicedApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_emergency_serviced()
    {
        $emergencyServiced = factory(EmergencyServiced::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/emergency_serviceds', $emergencyServiced
        );

        $this->assertApiResponse($emergencyServiced);
    }

    /**
     * @test
     */
    public function test_read_emergency_serviced()
    {
        $emergencyServiced = factory(EmergencyServiced::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/emergency_serviceds/'.$emergencyServiced->id
        );

        $this->assertApiResponse($emergencyServiced->toArray());
    }

    /**
     * @test
     */
    public function test_update_emergency_serviced()
    {
        $emergencyServiced = factory(EmergencyServiced::class)->create();
        $editedEmergencyServiced = factory(EmergencyServiced::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/emergency_serviceds/'.$emergencyServiced->id,
            $editedEmergencyServiced
        );

        $this->assertApiResponse($editedEmergencyServiced);
    }

    /**
     * @test
     */
    public function test_delete_emergency_serviced()
    {
        $emergencyServiced = factory(EmergencyServiced::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/emergency_serviceds/'.$emergencyServiced->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/emergency_serviceds/'.$emergencyServiced->id
        );

        $this->response->assertStatus(404);
    }
}
