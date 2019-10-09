<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AcceptEmergencyServiced;

class AcceptEmergencyServicedApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_accept_emergency_serviced()
    {
        $acceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accept_emergency_serviceds', $acceptEmergencyServiced
        );

        $this->assertApiResponse($acceptEmergencyServiced);
    }

    /**
     * @test
     */
    public function test_read_accept_emergency_serviced()
    {
        $acceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/accept_emergency_serviceds/'.$acceptEmergencyServiced->id
        );

        $this->assertApiResponse($acceptEmergencyServiced->toArray());
    }

    /**
     * @test
     */
    public function test_update_accept_emergency_serviced()
    {
        $acceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->create();
        $editedAcceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accept_emergency_serviceds/'.$acceptEmergencyServiced->id,
            $editedAcceptEmergencyServiced
        );

        $this->assertApiResponse($editedAcceptEmergencyServiced);
    }

    /**
     * @test
     */
    public function test_delete_accept_emergency_serviced()
    {
        $acceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accept_emergency_serviceds/'.$acceptEmergencyServiced->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accept_emergency_serviceds/'.$acceptEmergencyServiced->id
        );

        $this->response->assertStatus(404);
    }
}
