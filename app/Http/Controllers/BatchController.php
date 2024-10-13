<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Batch;
use Faker\Provider\Base;
use Illuminate\View\View;

class BatchController extends Controller
{
    public function index(): View
    {
        $batches = Batch::all();
        return view('batches.index')->with('batches', $batches);
    }

    public function create(): View
    {
        return view('batches.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Batch::create($input);
        return redirect('batches')->with('flash_message', 'batches Added!');
    }

    public function show(string $id): View
    {
        $batches = Batch::find($id);
        return view('batches.show')->with('batches', $batches);
    }

    public function edit(string $id): View
    {
        $batches = Batch::find($id);
        return view('batches.edit')->with('batches', $batches);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $batches = Batch::find($id);
        $input = $request->all();
        $batches->update($input);
        return redirect('batches')->with('flash_message', 'batches Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'batches deleted!');
    }
}
