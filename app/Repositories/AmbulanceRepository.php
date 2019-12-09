<?php

namespace App\Repositories;

use App\Models\Ambulance;
use App\Repositories\BaseRepository;

/**
 * Class AmbulanceRepository
 * @package App\Repositories
 * @version December 9, 2019, 9:14 pm UTC
*/

class AmbulanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'address',
        'longitude',
        'latitude'
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
        return Ambulance::class;
    }
}
