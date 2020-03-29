<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\MenuRepository;
use App\Repositories\PostRepository;
use App\Repositories\ZoneRepository;
use Illuminate\Support\Collection;

class ContentService
{
    const CONTENT_TYPE_MENU = 'menu';
    const CONTENT_TYPE_POST = 'post';
    const CONTENT_TYPE_LIST_POSTS = 'list-posts';
    const CONTENT_TYPE_LIST_CATEGORIES = 'list-categories';
    
    /** @var ZoneRepository */
    private $zoneRepository;

    /** @var MenuRepository */
    private $menuRepository;
    
    /** @var PostRepository */
    private $postRepository;
    
    /** @var CategoryRepository */
    private $categoryRepository;

    public function __construct()
    {
        $this->zoneRepository = app(ZoneRepository::class);
        $this->menuRepository = app(MenuRepository::class);
        $this->postRepository = app(PostRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * @return ZoneRepository
     */
    private function ZoneRepository() {
        return $this->zoneRepository;
    }

    /**
     * @return MenuRepository
     */
    private function MenuRepository() {
        return $this->menuRepository;
    }

    /**
     * @return PostRepository
     */
    private function PostRepository() {
        return $this->postRepository;
    }

    /**
     * @return CategoryRepository
     */
    private function CategoryRepository() {
        return $this->categoryRepository;
    }

    /** 
     * @param string $category
     * @param string $post
     * 
     * @return Collection 
     */
    public function prepareContent($contentType, $id) {
        $content = null;
        
        switch ($contentType) {
            case self::CONTENT_TYPE_MENU:
                $content = $this->MenuRepository()->find($id);
                break;

            case self::CONTENT_TYPE_POST:
                $content = $this->PostRepository()->find($id);
                break;
                
            case self::CONTENT_TYPE_LIST_POSTS:
                $categoriesIds = $this->CategoryRepository()->getNestedCategories($id);
                $content = $this->PostRepository()->getListPostsByCategoryIds($categoriesIds);
                break;
                
            case self::CONTENT_TYPE_LIST_CATEGORIES:
                $content = $this->CategoryRepository()->getNestedCategories($id, true);
                break;
            
            default:
                //TODO throw Exception "not implemented yet"
                break;
        }

        return $content;
    }

}
