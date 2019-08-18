<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Repositories\TestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TestController extends AppBaseController
{
    /** @var  TestRepository */
    private $testRepository;

    public function __construct(TestRepository $testRepo)
    {
        $this->testRepository = $testRepo;
    }

    /**
     * Display a listing of the Test.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tests = $this->testRepository->all();

        return view('tests.index')
            ->with('tests', $tests);
    }

    /**
     * Show the form for creating a new Test.
     *
     * @return Response
     */
    public function create()
    {
        return view('tests.create');
    }

    /**
     * Store a newly created Test in storage.
     *
     * @param CreateTestRequest $request
     *
     * @return Response
     */
    public function store(CreateTestRequest $request)
    {
        $input = $request->all();

        $test = $this->testRepository->create($input);

        Flash::success('Test saved successfully.');

        return redirect(route('tests.index'));
    }

    /**
     * Display the specified Test.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $test = $this->testRepository->find($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tests.index'));
        }

        return view('tests.show')->with('test', $test);
    }

    /**
     * Show the form for editing the specified Test.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $test = $this->testRepository->find($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tests.index'));
        }

        return view('tests.edit')->with('test', $test);
    }

    /**
     * Update the specified Test in storage.
     *
     * @param int $id
     * @param UpdateTestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestRequest $request)
    {
        $test = $this->testRepository->find($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tests.index'));
        }

        $test = $this->testRepository->update($request->all(), $id);

        Flash::success('Test updated successfully.');

        return redirect(route('tests.index'));
    }

    /**
     * Remove the specified Test from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $test = $this->testRepository->find($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tests.index'));
        }

        $this->testRepository->delete($id);

        Flash::success('Test deleted successfully.');

        return redirect(route('tests.index'));
    }
}
