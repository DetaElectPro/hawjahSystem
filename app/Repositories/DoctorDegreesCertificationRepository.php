<?php

namespace App\Repositories;

use App\Models\DoctorDegreesCertification;

/**
 * Class DoctorDegreesCertificationRepositoryRepository
 * @package App\Repositories
 * @version Sep 2, 2020, 2:23 pm UTC +2
 */
class DoctorDegreesCertificationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name', 'location', 'country', 'date'
    ];

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
        return DoctorDegreesCertification::class;
    }
}
