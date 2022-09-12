<?php

namespace App\Repositories;

use App\Models\Modtest;
use App\Repositories\BaseRepository;

/**
 * Class ModtestRepository
 * @package App\Repositories
 * @version September 12, 2022, 6:52 am UTC
*/

class ModtestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'field_A',
        'field_B'
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
        return Modtest::class;
    }
}
