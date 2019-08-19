<?php namespace Tests\Repositories;

use App\Models\Employ;
use App\Repositories\EmployRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EmployRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EmployRepository
     */
    protected $employRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->employRepo = \App::make(EmployRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_employ()
    {
        $employ = factory(Employ::class)->make()->toArray();

        $createdEmploy = $this->employRepo->create($employ);

        $createdEmploy = $createdEmploy->toArray();
        $this->assertArrayHasKey('id', $createdEmploy);
        $this->assertNotNull($createdEmploy['id'], 'Created Employ must have id specified');
        $this->assertNotNull(Employ::find($createdEmploy['id']), 'Employ with given id must be in DB');
        $this->assertModelData($employ, $createdEmploy);
    }

    /**
     * @test read
     */
    public function test_read_employ()
    {
        $employ = factory(Employ::class)->create();

        $dbEmploy = $this->employRepo->find($employ->id);

        $dbEmploy = $dbEmploy->toArray();
        $this->assertModelData($employ->toArray(), $dbEmploy);
    }

    /**
     * @test update
     */
    public function test_update_employ()
    {
        $employ = factory(Employ::class)->create();
        $fakeEmploy = factory(Employ::class)->make()->toArray();

        $updatedEmploy = $this->employRepo->update($fakeEmploy, $employ->id);

        $this->assertModelData($fakeEmploy, $updatedEmploy->toArray());
        $dbEmploy = $this->employRepo->find($employ->id);
        $this->assertModelData($fakeEmploy, $dbEmploy->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_employ()
    {
        $employ = factory(Employ::class)->create();

        $resp = $this->employRepo->delete($employ->id);

        $this->assertTrue($resp);
        $this->assertNull(Employ::find($employ->id), 'Employ should not exist in DB');
    }
}
