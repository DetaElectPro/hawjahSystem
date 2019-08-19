<?php

namespace App\Repositories;

use App\Models\EmergencyServiced;
use App\Repositories\BaseRepository;

/**
 * Class EmergencyServicedRepository
 * @package App\Repositories
 * @version August 18, 2019, 6:56 am UTC
*/

class EmergencyServicedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'price_per_day',
        'type',
        'available'
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
        return EmergencyServiced::class;
    }
}
