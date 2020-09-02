<?php

namespace App\Repositories;

use App\Models\Topic;

/**
 * Class TopicRepository
 * @package App\Repositories
 * @version Sep 2, 2020, 2:27 pm UTC +2
 */
class TopicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
       'name', 'status'
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
        return Topic::class;
    }
}
