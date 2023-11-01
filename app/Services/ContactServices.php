<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\Factory;
use App\Http\Resources\ContactResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Foundation\Application;

class ContactServices
{

    public function create(): Factory|View|Application
    {
        return view('web.contact.create');
    }

    public function store($request): RedirectResponse
    {
        try {

            $data = $request->all();

            Contact::create($data);

            session()->flash('success', 'Contact registered successfully');

            return redirect()->route('index');
        } catch (\Exception $e) {
            Log::error('Error when registering contact: '.$e->getMessage());
            session()->flash('error', 'Error when registering contact');
            return redirect()->route('index');
        }
    }

    public function show($publicId): Factory|View|Application
    {
        $contact = Contact::where('id', $publicId)
                          ->first();

        $contact = ContactResource::make($contact);

        return view('web.contact.show', compact('contact'));
    }

    public function edit($publicId)
    {
        $contact = Contact::where('id', $publicId)
                          ->first();

        $contact = ContactResource::make($contact);

        return view('web.contact.edit', compact('contact'));
    }

    public function update($request, $publicId): RedirectResponse
    {
        try {

            $data = $request->all();

            $contact = Contact::where('id', $publicId)
                ->first();

            $contact->update($data);

            session()->flash('success', 'Jogador atualizado com sucesso');


            return redirect()->route('index');
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar jogador: '.$e->getMessage());
            session()->flash('error', 'Erro ao atualizar jogador');
            return redirect()->route('index');
        }
    }

    public function destroy($publicId): RedirectResponse
    {
        try {

            $contact = Contact::where('id', $publicId)
                              ->first();

            $contact->delete();

            session()->flash('error', 'Jogador excluido com sucesso');

            return redirect()->route('index', [], Response::HTTP_FOUND);
        } catch (\Exception $e) {
            Log::error('Erro ao excluir jogador: '.$e->getMessage());
            session()->flash('error', 'Erro ao excluir jogador');
            return redirect()->route('index');
        }
    }
}
