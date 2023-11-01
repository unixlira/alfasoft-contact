<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request): Factory|View|Application
    {
        $search = $request->input('search');

        $contacts = Contact::when($search, function ($q) use ($search) {
                                $q->where('name', 'like', '%' . $search . '%');
                            })
                            ->orderByDesc('id')
                            ->paginate(5);

        $contacts = ContactResource::collection($contacts);

        $contacts->appends(['search' => $search]);

        return view('index', compact('contacts'));
    }
}
