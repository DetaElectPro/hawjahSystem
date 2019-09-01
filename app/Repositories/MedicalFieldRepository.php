<?php

namespace App\Repositories;

use App\Models\MedicalField;
use App\Repositories\BaseRepository;

/**
 * Class MedicalFieldRepository
 * @package App\Repositories
 * @version August 16, 2019, 8:14 am UTC
*/

class MedicalFieldRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return MedicalField::class;
    }
}
