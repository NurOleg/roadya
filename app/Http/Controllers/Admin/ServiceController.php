<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\service\StoreserviceRequest;
use App\Http\Requests\Admin\service\UpdateserviceRequest;
use App\Models\service;
use App\Services\Admin\AccomodationService;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Admin\Login\RegisterRequest;
use App\Services\Admin\serviceService;
use Illuminate\Http\RedirectResponse;

class ServiceController extends Controller
{
    /**
     * @var AccomodationService
     */
    private AccomodationService $service;

    /**
     * ServiceController constructor.
     * @param AccomodationService $service
     */
    public function __construct(AccomodationService $service)
    {
        $this->service = $service;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $services = $this->service->index(auth()->user());

        return view('admin.service.index', ['services' => $services]);

    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.service.create');
    }

   ///**
   // * @param StoreserviceRequest $request
   // * @return RedirectResponse
   // */
   //public function store(StoreserviceRequest $request): RedirectResponse
   //{
   //    if ($service = $this->service->store($request->validated())) {
   //        return redirect()->route('service_index')->with('success', 'Заведение успешно создано!');
   //    }

   //    return redirect()->back()->withErrors('Что-то пошло не так.');
   //}

    /**
     * @param Service $service
     * @return View
     */
    public function detail(Service $service): View
    {
        $service->load(['user', 'placemark']);

        return view('admin.service.detail', ['service' => $service]);
    }

    ///**
    // * @param UpdateserviceRequest $request
    // * @param service $service
    // * @return RedirectResponse
    // */
    //public function update(UpdateserviceRequest $request, Service $service): RedirectResponse
    //{
       // if ($updatedservice = $this->service->update($request, $service)) {
       //     return redirect()->route('service_index')->with('success', 'Заведение успешно обновлено!');
       // }
//
       // return redirect()->back()->withErrors('Что-то пошло не так.');
   // }

    /**
     * @param service $service
     * @return RedirectResponse
     * @throws \Exception
     */
    public function delete(Service $service): RedirectResponse
    {
        if ($this->service->delete($service)) {
            return redirect()->route('service_index')->with('success', 'Заведение успешно удалено!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так.');
    }
}
