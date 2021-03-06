<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyComponenteRequest;
use App\Http\Requests\StoreComponenteRequest;
use App\Http\Requests\UpdateComponenteRequest;
use App\Models\Componente;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ComponentesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('componente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Componente::with(['created_by'])->select(sprintf('%s.*', (new Componente())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'componente_show';
                $editGate = 'componente_edit';
                $deleteGate = 'componente_delete';
                $crudRoutePart = 'componentes';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('nombre_del_activo', function ($row) {
                return $row->nombre_del_activo ? $row->nombre_del_activo : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.componentes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('componente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.componentes.create');
    }

    public function store(StoreComponenteRequest $request)
    {
        $componente = Componente::create($request->all());

        return redirect()->route('admin.componentes.index');
    }

    public function edit(Componente $componente)
    {
        abort_if(Gate::denies('componente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $componente->load('created_by');

        return view('admin.componentes.edit', compact('componente'));
    }

    public function update(UpdateComponenteRequest $request, Componente $componente)
    {
        $componente->update($request->all());

        return redirect()->route('admin.componentes.index');
    }

    public function show(Componente $componente)
    {
        abort_if(Gate::denies('componente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $componente->load('created_by', 'componentesFichasTecnicas');

        return view('admin.componentes.show', compact('componente'));
    }

    public function destroy(Componente $componente)
    {
        abort_if(Gate::denies('componente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $componente->delete();

        return back();
    }

    public function massDestroy(MassDestroyComponenteRequest $request)
    {
        Componente::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
