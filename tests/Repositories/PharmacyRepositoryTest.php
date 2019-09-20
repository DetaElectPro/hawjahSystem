<?php namespace Tests\Repositories;

use App\Models\Pharmacy;
use App\Repositories\PharmacyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PharmacyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PharmacyRepository
     */
    protected $pharmacyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pharmacyRepo = \App::make(PharmacyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pharmacy()
    {
        $pharmacy = factory(Pharmacy::class)->make()->toArray();

        $createdPharmacy = $this->pharmacyRepo->create($pharmacy);

        $createdPharmacy = $createdPharmacy->toArray();
        $this->assertArrayHasKey('id', $createdPharmacy);
        $this->assertNotNull($createdPharmacy['id'], 'Created Pharmacy must have id specified');
        $this->assertNotNull(Pharmacy::find($createdPharmacy['id']), 'Pharmacy with given id must be in DB');
        $this->assertModelData($pharmacy, $createdPharmacy);
    }

    /**
     * @test read
     */
    public function test_read_pharmacy()
    {
        $pharmacy = factory(Pharmacy::class)->create();

        $dbPharmacy = $this->pharmacyRepo->find($pharmacy->id);

        $dbPharmacy = $dbPharmacy->toArray();
        $this->assertModelData($pharmacy->toArray(), $dbPharmacy);
    }

    /**
     * @test update
     */
    public function test_update_pharmacy()
    {
        $pharmacy = factory(Pharmacy::class)->create();
        $fakePharmacy = factory(Pharmacy::class)->make()->toArray();

        $updatedPharmacy = $this->pharmacyRepo->update($fakePharmacy, $pharmacy->id);

        $this->assertModelData($fakePharmacy, $updatedPharmacy->toArray());
        $dbPharmacy = $this->pharmacyRepo->find($pharmacy->id);
        $this->assertModelData($fakePharmacy, $dbPharmacy->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pharmacy()
    {
        $pharmacy = factory(Pharmacy::class)->create();

        $resp = $this->pharmacyRepo->delete($pharmacy->id);

        $this->assertTrue($resp);
        $this->assertNull(Pharmacy::find($pharmacy->id), 'Pharmacy should not exist in DB');
    }
}
