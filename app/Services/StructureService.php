<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\MenuRepository;
use App\Repositories\PostRepository;
use App\Repositories\ZoneRepository;
use Illuminate\Support\Collection;

class StructureService
{
    const PAGE_POST = 'post';
    const PAGE_CATEGORY = 'category';
    const PAGE_HOME = 'home';

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
    public function preparePageData($category = null, $post = null) {
        $zones = $this->prepareZonesData($category, $post);

        return $zones;
    }

    /**
     * @return Collection
     */
    public function prepareZonesData($category, $post) {
        $zones = [];

        if ($post) {

            $zones = $this->ZoneRepository()->getZonesByPage(self::PAGE_POST);

        } else if ($category) {

            $zones = $this->ZoneRepository()->getZonesByPage(self::PAGE_CATEGORY);

        } else {

            $zones = $this->ZoneRepository()->getZonesByPage(self::PAGE_HOME);

        }

        return $zones;
    }

}
