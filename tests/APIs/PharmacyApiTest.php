<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pharmacy;

class PharmacyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pharmacy()
    {
        $pharmacy = factory(Pharmacy::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pharmacies', $pharmacy
        );

        $this->assertApiResponse($pharmacy);
    }

    /**
     * @test
     */
    public function test_read_pharmacy()
    {
        $pharmacy = factory(Pharmacy::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pharmacies/'.$pharmacy->id
        );

        $this->assertApiResponse($pharmacy->toArray());
    }

    /**
     * @test
     */
    public function test_update_pharmacy()
    {
        $pharmacy = factory(Pharmacy::class)->create();
        $editedPharmacy = factory(Pharmacy::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pharmacies/'.$pharmacy->id,
            $editedPharmacy
        );

        $this->assertApiResponse($editedPharmacy);
    }

    /**
     * @test
     */
    public function test_delete_pharmacy()
    {
        $pharmacy = factory(Pharmacy::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pharmacies/'.$pharmacy->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pharmacies/'.$pharmacy->id
        );

        $this->response->assertStatus(404);
    }
}
