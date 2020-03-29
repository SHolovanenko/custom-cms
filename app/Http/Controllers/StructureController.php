<?php

namespace App\Http\Controllers;

use App\Services\StructureService;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    private $structureService;

    public function __construct(StructureService $structureService)
    {
        $this->structureService = $structureService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = null, $post = null)
    {
        $result = $this->structureService->preparePageData($category, $post);
        
        return response()->json($result);
    }

}
