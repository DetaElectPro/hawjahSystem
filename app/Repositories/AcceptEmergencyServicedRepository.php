<?php

namespace App\Repositories;

use App\Models\AcceptEmergencyServiced;
use App\Repositories\BaseRepository;

/**
 * Class AcceptEmergencyServicedRepository
 * @package App\Repositories
 * @version October 9, 2019, 9:45 am UTC
*/

class AcceptEmergencyServicedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'needing',
        'image',
        'price'
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
        return AcceptEmergencyServiced::class;
    }
}
