<?php

namespace App\Repositories;

use App\Models\Zone;
use Illuminate\Support\Facades\DB;

class ZoneRepository extends BaseRepository
{
    protected $model;

    public function __construct(Zone $model)
    {
        $this->model = $model;
    }

    public function getZonesByPage($page) {
        $zones = DB::table('zones')
                ->join('page_zones', 'zones.id', '=', 'page_zones.zone_id')
                ->join('pages', 'pages.id', '=', 'page_zones.page_id')
                ->where('pages.name', '=', $page)
                ->get(['zones.name', 'content_type', 'content_id']);
                
        return $zones;
    }
}
