<?php


namespace App\Services;


use App\Http\Requests\Tag\ListTagRequest;
use App\Models\Placemark;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagService
{

    /**
     * @param ListTagRequest $request
     * @return Collection
     */
    public function list(ListTagRequest $request): Collection
    {
        $tagsQuery = Tag::query();

        if ($request->filled('type')) {
            $codes = Placemark::TAGS_BY_TYPES[$request->get('type')];

            $tagsQuery->whereIn('code', $codes);
        }

        return $tagsQuery->get();
    }
}
