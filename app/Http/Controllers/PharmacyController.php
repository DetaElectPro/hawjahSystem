<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePharmacyRequest;
use App\Http\Requests\UpdatePharmacyRequest;
use App\Repositories\PharmacyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PharmacyController extends AppBaseController
{
    /** @var  PharmacyRepository */
    private $pharmacyRepository;

    public function __construct(PharmacyRepository $pharmacyRepo)
    {
        $this->pharmacyRepository = $pharmacyRepo;
    }

    /**
     * Display a listing of the Pharmacy.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pharmacies = $this->pharmacyRepository->all();

        return view('pharmacies.index')
            ->with('pharmacies', $pharmacies);
    }

    /**
     * Show the form for creating a new Pharmacy.
     *
     * @return Response
     */
    public function create()
    {
        return view('pharmacies.create');
    }

    /**
     * Store a newly created Pharmacy in storage.
     *
     * @param CreatePharmacyRequest $request
     *
     * @return Response
     */
    public function store(CreatePharmacyRequest $request)
    {
        $input = $request->all();

        $pharmacy = $this->pharmacyRepository->create($input);

        Flash::success('Pharmacy saved successfully.');

        return redirect(route('pharmacies.index'));
    }

    /**
     * Display the specified Pharmacy.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            Flash::error('Pharmacy not found');

            return redirect(route('pharmacies.index'));
        }

        return view('pharmacies.show')->with('pharmacy', $pharmacy);
    }

    /**
     * Show the form for editing the specified Pharmacy.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            Flash::error('Pharmacy not found');

            return redirect(route('pharmacies.index'));
        }

        return view('pharmacies.edit')->with('pharmacy', $pharmacy);
    }

    /**
     * Update the specified Pharmacy in storage.
     *
     * @param int $id
     * @param UpdatePharmacyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePharmacyRequest $request)
    {
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            Flash::error('Pharmacy not found');

            return redirect(route('pharmacies.index'));
        }

        $pharmacy = $this->pharmacyRepository->update($request->all(), $id);

        Flash::success('Pharmacy updated successfully.');

        return redirect(route('pharmacies.index'));
    }

    /**
     * Remove the specified Pharmacy from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            Flash::error('Pharmacy not found');

            return redirect(route('pharmacies.index'));
        }

        $this->pharmacyRepository->delete($id);

        Flash::success('Pharmacy deleted successfully.');

        return redirect(route('pharmacies.index'));
    }
}
