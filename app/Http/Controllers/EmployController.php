<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployRequest;
use App\Http\Requests\UpdateEmployRequest;
use App\Repositories\EmployRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EmployController extends AppBaseController
{
    /** @var  EmployRepository */
    private $employRepository;

    public function __construct(EmployRepository $employRepo)
    {
        $this->employRepository = $employRepo;
    }

    /**
     * Display a listing of the Employ.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $employs = $this->employRepository->all();

        return view('employs.index')
            ->with('employs', $employs);
    }

    /**
     * Show the form for creating a new Employ.
     *
     * @return Response
     */
    public function create()
    {
        return view('employs.create');
    }

    /**
     * Store a newly created Employ in storage.
     *
     * @param CreateEmployRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployRequest $request)
    {
        $input = $request->all();

        $employ = $this->employRepository->create($input);

        Flash::success('Employ saved successfully.');

        return redirect(route('employs.index'));
    }

    /**
     * Display the specified Employ.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            Flash::error('Employ not found');

            return redirect(route('employs.index'));
        }

        return view('employs.show')->with('employ', $employ);
    }

    /**
     * Show the form for editing the specified Employ.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            Flash::error('Employ not found');

            return redirect(route('employs.index'));
        }

        return view('employs.edit')->with('employ', $employ);
    }

    /**
     * Update the specified Employ in storage.
     *
     * @param int $id
     * @param UpdateEmployRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployRequest $request)
    {
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            Flash::error('Employ not found');

            return redirect(route('employs.index'));
        }

        $employ = $this->employRepository->update($request->all(), $id);

        Flash::success('Employ updated successfully.');

        return redirect(route('employs.index'));
    }

    /**
     * Remove the specified Employ from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            Flash::error('Employ not found');

            return redirect(route('employs.index'));
        }

        $this->employRepository->delete($id);

        Flash::success('Employ deleted successfully.');

        return redirect(route('employs.index'));
    }
}
