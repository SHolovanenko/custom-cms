<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function getListPostsByCategoryIds(array $ids) {
        $result = $this->model->whereIn('category_id', $ids)->get();

        return $result;
    }
}
