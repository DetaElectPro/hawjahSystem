<?php

namespace App\Repositories;

use App\Models\DoctorAwardsRecognitions;

/**
 * Class DoctorAwardsRecognitionsRepository
 * @package App\Repositories
 * @version Sep 2, 2020, 2:23 pm UTC +2
 */
class DoctorAwardsRecognitionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = ['name', 'given_by', 'country', 'date'];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DoctorAwardsRecognitions::class;
    }
}
