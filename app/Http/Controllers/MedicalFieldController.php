<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicalFieldRequest;
use App\Http\Requests\UpdateMedicalFieldRequest;
use App\Repositories\MedicalFieldRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MedicalFieldController extends AppBaseController
{
    /** @var  MedicalFieldRepository */
    private $medicalFieldRepository;

    public function __construct(MedicalFieldRepository $medicalFieldRepo)
    {
        $this->medicalFieldRepository = $medicalFieldRepo;
    }

    /**
     * Display a listing of the MedicalField.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $medicalFields = $this->medicalFieldRepository->all();

        return view('medical_fields.index')
            ->with('medicalFields', $medicalFields);
    }

    /**
     * Show the form for creating a new MedicalField.
     *
     * @return Response
     */
    public function create()
    {
        return view('medical_fields.create');
    }

    /**
     * Store a newly created MedicalField in storage.
     *
     * @param CreateMedicalFieldRequest $request
     *
     * @return Response
     */
    public function store(CreateMedicalFieldRequest $request)
    {
        $input = $request->all();

        $medicalField = $this->medicalFieldRepository->create($input);

        Flash::success('Medical Field saved successfully.');

        return redirect(route('medicalFields.index'));
    }

    /**
     * Display the specified MedicalField.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $medicalField = $this->medicalFieldRepository->find($id);

        if (empty($medicalField)) {
            Flash::error('Medical Field not found');

            return redirect(route('medicalFields.index'));
        }

        return view('medical_fields.show')->with('medicalField', $medicalField);
    }

    /**
     * Show the form for editing the specified MedicalField.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $medicalField = $this->medicalFieldRepository->find($id);

        if (empty($medicalField)) {
            Flash::error('Medical Field not found');

            return redirect(route('medicalFields.index'));
        }

        return view('medical_fields.edit')->with('medicalField', $medicalField);
    }

    /**
     * Update the specified MedicalField in storage.
     *
     * @param int $id
     * @param UpdateMedicalFieldRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedicalFieldRequest $request)
    {
        $medicalField = $this->medicalFieldRepository->find($id);

        if (empty($medicalField)) {
            Flash::error('Medical Field not found');

            return redirect(route('medicalFields.index'));
        }

        $medicalField = $this->medicalFieldRepository->update($request->all(), $id);

        Flash::success('Medical Field updated successfully.');

        return redirect(route('medicalFields.index'));
    }

    /**
     * Remove the specified MedicalField from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $medicalField = $this->medicalFieldRepository->find($id);

        if (empty($medicalField)) {
            Flash::error('Medical Field not found');

            return redirect(route('medicalFields.index'));
        }

        $this->medicalFieldRepository->delete($id);

        Flash::success('Medical Field deleted successfully.');

        return redirect(route('medicalFields.index'));
    }
}
