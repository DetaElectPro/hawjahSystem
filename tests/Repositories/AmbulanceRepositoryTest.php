<?php namespace Tests\Repositories;

use App\Models\Ambulance;
use App\Repositories\AmbulanceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AmbulanceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AmbulanceRepository
     */
    protected $ambulanceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ambulanceRepo = \App::make(AmbulanceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ambulance()
    {
        $ambulance = factory(Ambulance::class)->make()->toArray();

        $createdAmbulance = $this->ambulanceRepo->create($ambulance);

        $createdAmbulance = $createdAmbulance->toArray();
        $this->assertArrayHasKey('id', $createdAmbulance);
        $this->assertNotNull($createdAmbulance['id'], 'Created Ambulance must have id specified');
        $this->assertNotNull(Ambulance::find($createdAmbulance['id']), 'Ambulance with given id must be in DB');
        $this->assertModelData($ambulance, $createdAmbulance);
    }

    /**
     * @test read
     */
    public function test_read_ambulance()
    {
        $ambulance = factory(Ambulance::class)->create();

        $dbAmbulance = $this->ambulanceRepo->find($ambulance->id);

        $dbAmbulance = $dbAmbulance->toArray();
        $this->assertModelData($ambulance->toArray(), $dbAmbulance);
    }

    /**
     * @test update
     */
    public function test_update_ambulance()
    {
        $ambulance = factory(Ambulance::class)->create();
        $fakeAmbulance = factory(Ambulance::class)->make()->toArray();

        $updatedAmbulance = $this->ambulanceRepo->update($fakeAmbulance, $ambulance->id);

        $this->assertModelData($fakeAmbulance, $updatedAmbulance->toArray());
        $dbAmbulance = $this->ambulanceRepo->find($ambulance->id);
        $this->assertModelData($fakeAmbulance, $dbAmbulance->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ambulance()
    {
        $ambulance = factory(Ambulance::class)->create();

        $resp = $this->ambulanceRepo->delete($ambulance->id);

        $this->assertTrue($resp);
        $this->assertNull(Ambulance::find($ambulance->id), 'Ambulance should not exist in DB');
    }
}
