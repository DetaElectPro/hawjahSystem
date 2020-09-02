<?php

namespace App\Repositories;

use App\Models\DoctorProfile;

/**
 * Class DoctorProfileRepository
 * @package App\Repositories
 * @version Sep 2, 2020, 2:21 pm UTC +2
 */
class DoctorProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'about_me',
        'username', 'language', 'available', 'percentage'
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
        return DoctorProfile::class;
    }
}
