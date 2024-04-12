<?php

namespace App\Http\Controllers;

use App\Models\Areasadmin;
use Illuminate\Http\Request;

/**
 * Class AreasadminController
 * @package App\Http\Controllers
 */
class AreasadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get('query');

        $areasadmin = Areasadmin::where('nombre_area', 'like', "%$query%")
            ->orWhere('nombre_encargado', 'like', "%$query%")
            ->paginate(10);

        return view('areasadmin.index', compact('areasadmin'))
            ->with('i', (request()->input('page', 1) - 1) * $areasadmin->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areasadmin = new Areasadmin();
        return view('areasadmin.create', compact('areasadmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Areasadmin::$rules);

        $areasadmin = Areasadmin::create($request->all());

        return redirect()->route('areasadmin.index')
            ->with('success', 'Areasadmin created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areasadmin = Areasadmin::find($id);

        return view('areasadmin.show', compact('areasadmin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areasadmin = Areasadmin::find($id);

        return view('areasadmin.edit', compact('areasadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Areasadmin $areasadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Areasadmin $areasadmin)
    {
        request()->validate(Areasadmin::$rules);

        $areasadmin->update($request->all());

        return redirect()->route('areasadmin.index')
            ->with('success', 'Areasadmin updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $areasadmin = Areasadmin::find($id)->delete();

        return redirect()->route('areasadmin.index')
            ->with('success', 'Areasadmin deleted successfully');
    }
}
