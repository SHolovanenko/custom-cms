<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function all($sortBy = 'created_at', $sortOrder = 'asc') {
        return $this->model
            ->orderBy($sortBy, $sortOrder)
            ->get();
    }

    public function find($id) {
        return $this->model->where('id', $id)->first();
    }
}
