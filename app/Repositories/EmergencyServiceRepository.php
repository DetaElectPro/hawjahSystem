<?php

namespace App\Repositories;

use App\Models\EmergencyServices;

/**
 * Class EmergencyServiceRepository
 * @package App\Repositories
 * @version August 18, 2019, 6:35 am UTC
 */
class EmergencyServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = ['name', 'address', 'price_per_day', 'available_bed', 'type', 'user_id'];

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
        return EmergencyServices::class;
    }
}
