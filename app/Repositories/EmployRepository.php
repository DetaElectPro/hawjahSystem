<?php

namespace App\Repositories;

use App\Models\Employ;
use App\Repositories\BaseRepository;

/**
 * Class EmployRepository
 * @package App\Repositories
 * @version August 19, 2019, 7:09 am UTC
*/

class EmployRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'job_title',
        'graduation_date',
        'birth_of_date',
        'address',
        'years_of_experience',
        'cv'
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
        return Employ::class;
    }
}
