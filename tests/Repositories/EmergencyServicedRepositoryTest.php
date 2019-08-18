<?php namespace Tests\Repositories;

use App\Models\EmergencyServiced;
use App\Repositories\EmergencyServicedRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EmergencyServicedRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EmergencyServicedRepository
     */
    protected $emergencyServicedRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->emergencyServicedRepo = \App::make(EmergencyServicedRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_emergency_serviced()
    {
        $emergencyServiced = factory(EmergencyServiced::class)->make()->toArray();

        $createdEmergencyServiced = $this->emergencyServicedRepo->create($emergencyServiced);

        $createdEmergencyServiced = $createdEmergencyServiced->toArray();
        $this->assertArrayHasKey('id', $createdEmergencyServiced);
        $this->assertNotNull($createdEmergencyServiced['id'], 'Created EmergencyServiced must have id specified');
        $this->assertNotNull(EmergencyServiced::find($createdEmergencyServiced['id']), 'EmergencyServiced with given id must be in DB');
        $this->assertModelData($emergencyServiced, $createdEmergencyServiced);
    }

    /**
     * @test read
     */
    public function test_read_emergency_serviced()
    {
        $emergencyServiced = factory(EmergencyServiced::class)->create();

        $dbEmergencyServiced = $this->emergencyServicedRepo->find($emergencyServiced->id);

        $dbEmergencyServiced = $dbEmergencyServiced->toArray();
        $this->assertModelData($emergencyServiced->toArray(), $dbEmergencyServiced);
    }

    /**
     * @test update
     */
    public function test_update_emergency_serviced()
    {
        $emergencyServiced = factory(EmergencyServiced::class)->create();
        $fakeEmergencyServiced = factory(EmergencyServiced::class)->make()->toArray();

        $updatedEmergencyServiced = $this->emergencyServicedRepo->update($fakeEmergencyServiced, $emergencyServiced->id);

        $this->assertModelData($fakeEmergencyServiced, $updatedEmergencyServiced->toArray());
        $dbEmergencyServiced = $this->emergencyServicedRepo->find($emergencyServiced->id);
        $this->assertModelData($fakeEmergencyServiced, $dbEmergencyServiced->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_emergency_serviced()
    {
        $emergencyServiced = factory(EmergencyServiced::class)->create();

        $resp = $this->emergencyServicedRepo->delete($emergencyServiced->id);

        $this->assertTrue($resp);
        $this->assertNull(EmergencyServiced::find($emergencyServiced->id), 'EmergencyServiced should not exist in DB');
    }
}
