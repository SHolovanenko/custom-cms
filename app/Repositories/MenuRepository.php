<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository extends BaseRepository
{
    protected $model;

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

}
