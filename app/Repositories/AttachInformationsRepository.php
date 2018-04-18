<?php

namespace App\Repositories;

use App\Models\AttachInformations;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AttachInformationsRepository
 * @package App\Repositories
 * @version April 18, 2018, 9:55 pm CST
 *
 * @method AttachInformations findWithoutFail($id, $columns = ['*'])
 * @method AttachInformations find($id, $columns = ['*'])
 * @method AttachInformations first($columns = ['*'])
*/
class AttachInformationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'content',
        'info_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AttachInformations::class;
    }
}
