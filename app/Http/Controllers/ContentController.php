<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    private $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    /**
     * Get content data by content type and id
     *
     * @return \Illuminate\Http\Response
     */
    public function index($contentType, $id)
    {
        $content = $this->contentService->prepareContent($contentType, $id);
        return response()->json($content);
    }

}
