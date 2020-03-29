<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    private function buildClaimsTree(array &$array, $parent = null) {
        $tree = [];
        foreach ($array as $claim) {

            if ($claim->getParent() == $parent) {

                $children = $this->buildClaimsTree($array, $claim->getId());
                if ($children) {
                    $claim->setChildren($children);
                }
                $tree[] = $claim;

            }
        }

        return $tree;
    }

    public function getNestedCategories($id, $asTree = false) {
        $categories = $this->model->all();
        if ($asTree) {
            $result = $this->buildCategoriesTree($categories, $id);
        } else {
            $result[] = $id;
            $this->getNestedCategoriesListIds($result, $categories, $id);
        }

        return $result;
    }

    private function buildCategoriesTree($categories, $parentId) {
        $result = [];

        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $category->children = $this->buildCategoriesTree($categories, $category->id);
                $result[] = $category;
            }
        }

        return $result;
    }

    public function getNestedCategoriesListIds(array &$result, $categories, $parentId) {
        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $nested = $this->getNestedCategoriesListIds($result, $categories, $category->id);
                
                if ($nested)
                    $result[] = $nested;

                $result[] = $category->id;
            }
        }
    }
}
