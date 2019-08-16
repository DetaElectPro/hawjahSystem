<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MedicalField;

class MedicalFieldApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_medical_field()
    {
        $medicalField = factory(MedicalField::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/medical_fields', $medicalField
        );

        $this->assertApiResponse($medicalField);
    }

    /**
     * @test
     */
    public function test_read_medical_field()
    {
        $medicalField = factory(MedicalField::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/medical_fields/'.$medicalField->id
        );

        $this->assertApiResponse($medicalField->toArray());
    }

    /**
     * @test
     */
    public function test_update_medical_field()
    {
        $medicalField = factory(MedicalField::class)->create();
        $editedMedicalField = factory(MedicalField::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/medical_fields/'.$medicalField->id,
            $editedMedicalField
        );

        $this->assertApiResponse($editedMedicalField);
    }

    /**
     * @test
     */
    public function test_delete_medical_field()
    {
        $medicalField = factory(MedicalField::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/medical_fields/'.$medicalField->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/medical_fields/'.$medicalField->id
        );

        $this->response->assertStatus(404);
    }
}
