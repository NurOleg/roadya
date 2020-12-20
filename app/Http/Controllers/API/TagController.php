<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Tag\ListTagRequest;
use App\Services\TagService;
use Illuminate\Http\JsonResponse;

class TagController extends BaseApiController
{
    /**
     * @var TagService|null
     */
    private ?TagService $service = null;

    public function _construct(TagService $service)
    {
        $this->service = $service;
    }

    /**
     * @param ListTagRequest $request
     * @return JsonResponse
     */
    public function index(ListTagRequest $request): JsonResponse
    {
        return $this->successResponse($this->service->list($request));
    }
}
