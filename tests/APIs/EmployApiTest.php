<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Employ;

class EmployApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_employ()
    {
        $employ = factory(Employ::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/employs', $employ
        );

        $this->assertApiResponse($employ);
    }

    /**
     * @test
     */
    public function test_read_employ()
    {
        $employ = factory(Employ::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/employs/'.$employ->id
        );

        $this->assertApiResponse($employ->toArray());
    }

    /**
     * @test
     */
    public function test_update_employ()
    {
        $employ = factory(Employ::class)->create();
        $editedEmploy = factory(Employ::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/employs/'.$employ->id,
            $editedEmploy
        );

        $this->assertApiResponse($editedEmploy);
    }

    /**
     * @test
     */
    public function test_delete_employ()
    {
        $employ = factory(Employ::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/employs/'.$employ->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/employs/'.$employ->id
        );

        $this->response->assertStatus(404);
    }
}
