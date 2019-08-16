<?php namespace Tests\Repositories;

use App\Models\MedicalField;
use App\Repositories\MedicalFieldRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MedicalFieldRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MedicalFieldRepository
     */
    protected $medicalFieldRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->medicalFieldRepo = \App::make(MedicalFieldRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_medical_field()
    {
        $medicalField = factory(MedicalField::class)->make()->toArray();

        $createdMedicalField = $this->medicalFieldRepo->create($medicalField);

        $createdMedicalField = $createdMedicalField->toArray();
        $this->assertArrayHasKey('id', $createdMedicalField);
        $this->assertNotNull($createdMedicalField['id'], 'Created MedicalField must have id specified');
        $this->assertNotNull(MedicalField::find($createdMedicalField['id']), 'MedicalField with given id must be in DB');
        $this->assertModelData($medicalField, $createdMedicalField);
    }

    /**
     * @test read
     */
    public function test_read_medical_field()
    {
        $medicalField = factory(MedicalField::class)->create();

        $dbMedicalField = $this->medicalFieldRepo->find($medicalField->id);

        $dbMedicalField = $dbMedicalField->toArray();
        $this->assertModelData($medicalField->toArray(), $dbMedicalField);
    }

    /**
     * @test update
     */
    public function test_update_medical_field()
    {
        $medicalField = factory(MedicalField::class)->create();
        $fakeMedicalField = factory(MedicalField::class)->make()->toArray();

        $updatedMedicalField = $this->medicalFieldRepo->update($fakeMedicalField, $medicalField->id);

        $this->assertModelData($fakeMedicalField, $updatedMedicalField->toArray());
        $dbMedicalField = $this->medicalFieldRepo->find($medicalField->id);
        $this->assertModelData($fakeMedicalField, $dbMedicalField->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_medical_field()
    {
        $medicalField = factory(MedicalField::class)->create();

        $resp = $this->medicalFieldRepo->delete($medicalField->id);

        $this->assertTrue($resp);
        $this->assertNull(MedicalField::find($medicalField->id), 'MedicalField should not exist in DB');
    }
}
