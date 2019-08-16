<?php namespace Tests\Repositories;

use App\Models\MedicalSpecialty;
use App\Repositories\MedicalSpecialtyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MedicalSpecialtyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MedicalSpecialtyRepository
     */
    protected $medicalSpecialtyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->medicalSpecialtyRepo = \App::make(MedicalSpecialtyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_medical_specialty()
    {
        $medicalSpecialty = factory(MedicalSpecialty::class)->make()->toArray();

        $createdMedicalSpecialty = $this->medicalSpecialtyRepo->create($medicalSpecialty);

        $createdMedicalSpecialty = $createdMedicalSpecialty->toArray();
        $this->assertArrayHasKey('id', $createdMedicalSpecialty);
        $this->assertNotNull($createdMedicalSpecialty['id'], 'Created MedicalSpecialty must have id specified');
        $this->assertNotNull(MedicalSpecialty::find($createdMedicalSpecialty['id']), 'MedicalSpecialty with given id must be in DB');
        $this->assertModelData($medicalSpecialty, $createdMedicalSpecialty);
    }

    /**
     * @test read
     */
    public function test_read_medical_specialty()
    {
        $medicalSpecialty = factory(MedicalSpecialty::class)->create();

        $dbMedicalSpecialty = $this->medicalSpecialtyRepo->find($medicalSpecialty->id);

        $dbMedicalSpecialty = $dbMedicalSpecialty->toArray();
        $this->assertModelData($medicalSpecialty->toArray(), $dbMedicalSpecialty);
    }

    /**
     * @test update
     */
    public function test_update_medical_specialty()
    {
        $medicalSpecialty = factory(MedicalSpecialty::class)->create();
        $fakeMedicalSpecialty = factory(MedicalSpecialty::class)->make()->toArray();

        $updatedMedicalSpecialty = $this->medicalSpecialtyRepo->update($fakeMedicalSpecialty, $medicalSpecialty->id);

        $this->assertModelData($fakeMedicalSpecialty, $updatedMedicalSpecialty->toArray());
        $dbMedicalSpecialty = $this->medicalSpecialtyRepo->find($medicalSpecialty->id);
        $this->assertModelData($fakeMedicalSpecialty, $dbMedicalSpecialty->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_medical_specialty()
    {
        $medicalSpecialty = factory(MedicalSpecialty::class)->create();

        $resp = $this->medicalSpecialtyRepo->delete($medicalSpecialty->id);

        $this->assertTrue($resp);
        $this->assertNull(MedicalSpecialty::find($medicalSpecialty->id), 'MedicalSpecialty should not exist in DB');
    }
}
