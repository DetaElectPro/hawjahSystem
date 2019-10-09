<?php namespace Tests\Repositories;

use App\Models\AcceptEmergencyServiced;
use App\Repositories\AcceptEmergencyServicedRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AcceptEmergencyServicedRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AcceptEmergencyServicedRepository
     */
    protected $acceptEmergencyServicedRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->acceptEmergencyServicedRepo = \App::make(AcceptEmergencyServicedRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_accept_emergency_serviced()
    {
        $acceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->make()->toArray();

        $createdAcceptEmergencyServiced = $this->acceptEmergencyServicedRepo->create($acceptEmergencyServiced);

        $createdAcceptEmergencyServiced = $createdAcceptEmergencyServiced->toArray();
        $this->assertArrayHasKey('id', $createdAcceptEmergencyServiced);
        $this->assertNotNull($createdAcceptEmergencyServiced['id'], 'Created AcceptEmergencyServiced must have id specified');
        $this->assertNotNull(AcceptEmergencyServiced::find($createdAcceptEmergencyServiced['id']), 'AcceptEmergencyServiced with given id must be in DB');
        $this->assertModelData($acceptEmergencyServiced, $createdAcceptEmergencyServiced);
    }

    /**
     * @test read
     */
    public function test_read_accept_emergency_serviced()
    {
        $acceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->create();

        $dbAcceptEmergencyServiced = $this->acceptEmergencyServicedRepo->find($acceptEmergencyServiced->id);

        $dbAcceptEmergencyServiced = $dbAcceptEmergencyServiced->toArray();
        $this->assertModelData($acceptEmergencyServiced->toArray(), $dbAcceptEmergencyServiced);
    }

    /**
     * @test update
     */
    public function test_update_accept_emergency_serviced()
    {
        $acceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->create();
        $fakeAcceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->make()->toArray();

        $updatedAcceptEmergencyServiced = $this->acceptEmergencyServicedRepo->update($fakeAcceptEmergencyServiced, $acceptEmergencyServiced->id);

        $this->assertModelData($fakeAcceptEmergencyServiced, $updatedAcceptEmergencyServiced->toArray());
        $dbAcceptEmergencyServiced = $this->acceptEmergencyServicedRepo->find($acceptEmergencyServiced->id);
        $this->assertModelData($fakeAcceptEmergencyServiced, $dbAcceptEmergencyServiced->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_accept_emergency_serviced()
    {
        $acceptEmergencyServiced = factory(AcceptEmergencyServiced::class)->create();

        $resp = $this->acceptEmergencyServicedRepo->delete($acceptEmergencyServiced->id);

        $this->assertTrue($resp);
        $this->assertNull(AcceptEmergencyServiced::find($acceptEmergencyServiced->id), 'AcceptEmergencyServiced should not exist in DB');
    }
}
