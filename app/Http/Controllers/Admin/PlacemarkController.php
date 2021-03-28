<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Placemark\StorePlacemarkRequest;
use App\Models\Placemark;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Admin\Login\RegisterRequest;
use App\Services\Admin\PlacemarkService;
use Illuminate\Http\RedirectResponse;

class PlacemarkController extends Controller
{
    /**
     * @var PlacemarkService
     */
    private PlacemarkService $placemarkService;

    /**
     * PlacemarkController constructor.
     * @param PlacemarkService $placemarkService
     */
    public function __construct(PlacemarkService $placemarkService)
    {
        $this->placemarkService = $placemarkService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $placemarks = $this->placemarkService->index(auth()->user());

        return view('admin.placemark.index', ['placemarks' => $placemarks]);

    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.placemark.create', ['types' => Placemark::TYPES_NAMES]);
    }

    /**
     * @param StorePlacemarkRequest $request
     * @return RedirectResponse
     */
    public function store(StorePlacemarkRequest $request): RedirectResponse
    {
        if ($placemark = $this->placemarkService->store($request->validated())) {
            return redirect()->route('placemark_index')->with('success', 'Заведение успешно создано!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так.');
    }

    public function tags(\Illuminate\Http\Request $request)
    {
        return response()->json(Placemark::TAGS_BY_TYPES[$request->get('type')]);
    }
}
