<?php

namespace App\Repositories;

use App\Models\DoctorTopic;

/**
 * Class DoctorTopicRepository
 * @package App\Repositories
 * @version Sep 2, 2020, 2:26 pm UTC +2
 */
class DoctorTopicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'doctor_id', 'topic_id'
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
        return DoctorTopic::class;
    }
}
