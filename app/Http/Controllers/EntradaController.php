<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

/**
 * Class EntradaController
 * @package App\Http\Controllers
 */
class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Entrada::paginate(10);

        return view('entrada.index', compact('entradas'))
            ->with('i', (request()->input('page', 1) - 1) * $entradas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entrada = new Entrada();
        return view('entrada.create', compact('entrada'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Entrada::$rules);

        $entrada = Entrada::create($request->all());

        return redirect()->route('entrada.index')
            ->with('success', 'Entrada created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrada = Entrada::find($id);

        return view('entrada.show', compact('entrada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrada = Entrada::find($id);

        return view('entrada.edit', compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Entrada $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        request()->validate(Entrada::$rules);

        $entrada->update($request->all());

        return redirect()->route('entrada.index')
            ->with('success', 'Entrada updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $entrada = Entrada::find($id)->delete();

        return redirect()->route('entrada.index')
            ->with('success', 'Entrada deleted successfully');
    }
}
