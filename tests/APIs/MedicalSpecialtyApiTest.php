<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MedicalSpecialty;

class MedicalSpecialtyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_medical_specialty()
    {
        $medicalSpecialty = factory(MedicalSpecialty::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/medical_specialties', $medicalSpecialty
        );

        $this->assertApiResponse($medicalSpecialty);
    }

    /**
     * @test
     */
    public function test_read_medical_specialty()
    {
        $medicalSpecialty = factory(MedicalSpecialty::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/medical_specialties/'.$medicalSpecialty->id
        );

        $this->assertApiResponse($medicalSpecialty->toArray());
    }

    /**
     * @test
     */
    public function test_update_medical_specialty()
    {
        $medicalSpecialty = factory(MedicalSpecialty::class)->create();
        $editedMedicalSpecialty = factory(MedicalSpecialty::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/medical_specialties/'.$medicalSpecialty->id,
            $editedMedicalSpecialty
        );

        $this->assertApiResponse($editedMedicalSpecialty);
    }

    /**
     * @test
     */
    public function test_delete_medical_specialty()
    {
        $medicalSpecialty = factory(MedicalSpecialty::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/medical_specialties/'.$medicalSpecialty->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/medical_specialties/'.$medicalSpecialty->id
        );

        $this->response->assertStatus(404);
    }
}
