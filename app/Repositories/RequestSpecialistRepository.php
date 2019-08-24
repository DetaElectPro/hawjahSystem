<?php

namespace App\Repositories;


use App\Models\RequestSpecialist;

/**
 * Class RequestSpecialistRepository
 * @package App\Repositories
 * @version August 24, 2019, 4:09 am UTC
 */
class RequestSpecialistRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name', 'address', 'start_time', 'end_time', 'price', 'latitude', 'longitude', 'medical_id', 'status', 'user_id'

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
        return RequestSpecialist::class;
    }
}
