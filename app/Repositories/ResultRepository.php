<?php

namespace App\Repositories;

use App\Models\Result;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ResultRepository
 * @package App\Repositories
 * @version April 18, 2018, 10:12 pm CST
 *
 * @method Result findWithoutFail($id, $columns = ['*'])
 * @method Result find($id, $columns = ['*'])
 * @method Result first($columns = ['*'])
*/
class ResultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'result',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Result::class;
    }
}
