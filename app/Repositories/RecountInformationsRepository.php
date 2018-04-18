<?php

namespace App\Repositories;

use App\Models\RecountInformations;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RecountInformationsRepository
 * @package App\Repositories
 * @version April 18, 2018, 10:02 pm CST
 *
 * @method RecountInformations findWithoutFail($id, $columns = ['*'])
 * @method RecountInformations find($id, $columns = ['*'])
 * @method RecountInformations first($columns = ['*'])
*/
class RecountInformationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'result',
        'mistake_type',
        'mistake_conten',
        'times',
        'num'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RecountInformations::class;
    }
}
