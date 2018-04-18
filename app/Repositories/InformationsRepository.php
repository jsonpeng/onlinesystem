<?php

namespace App\Repositories;

use App\Models\Informations;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InformationsRepository
 * @package App\Repositories
 * @version April 18, 2018, 9:38 pm CST
 *
 * @method Informations findWithoutFail($id, $columns = ['*'])
 * @method Informations find($id, $columns = ['*'])
 * @method Informations first($columns = ['*'])
*/
class InformationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'type',
        'analysis',
        'sort',
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Informations::class;
    }
}
