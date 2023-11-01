<?php

namespace App\Http\Controllers\Contacts;

use App\Services\ContactServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class ContactController extends Controller
{

    public function __construct(
        public ContactServices $contactServices
    ){}

    public function create(): View|Factory|Application
    {
        return $this->contactServices->create();
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        return $this->contactServices->store($request);
    }

    public function show($id): View|Factory|Application
    {
        return $this->contactServices->show($id);
    }

    public function edit($id): Factory|View|Application
    {
        return $this->contactServices->edit($id);
    }

    public function update(ContactRequest $request, $id): RedirectResponse
    {
        return $this->contactServices->update($request, $id);
    }

    public function destroy($id): RedirectResponse
    {
        return $this->contactServices->destroy($id);
    }

}
