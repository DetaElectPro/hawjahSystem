<?php

namespace App\Repositories;

use App\Models\Pharmacy;
use App\Repositories\BaseRepository;

/**
 * Class PharmacyRepository
 * @package App\Repositories
 * @version September 20, 2019, 5:19 pm UTC
*/

class PharmacyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'longitude'
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
        return Pharmacy::class;
    }
}
