<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOfimaticaRequest;
use App\Http\Requests\StoreOfimaticaRequest;
use App\Http\Requests\UpdateOfimaticaRequest;
use App\Models\Ofimatica;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OfimaticaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('ofimatica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Ofimatica::with(['created_by'])->select(sprintf('%s.*', (new Ofimatica())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'ofimatica_show';
                $editGate = 'ofimatica_edit';
                $deleteGate = 'ofimatica_delete';
                $crudRoutePart = 'ofimaticas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('nuevo', function ($row) {
                return $row->nuevo ? $row->nuevo : '';
            });
            $table->editColumn('nivel', function ($row) {
                return $row->nivel ? $row->nivel : '';
            });
            $table->editColumn('cetificacion', function ($row) {
                return $row->cetificacion ? Ofimatica::CETIFICACION_RADIO[$row->cetificacion] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.ofimaticas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ofimatica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ofimaticas.create');
    }

    public function store(StoreOfimaticaRequest $request)
    {
        $ofimatica = Ofimatica::create($request->all());

        return redirect()->route('admin.ofimaticas.index');
    }

    public function edit(Ofimatica $ofimatica)
    {
        abort_if(Gate::denies('ofimatica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ofimatica->load('created_by');

        return view('admin.ofimaticas.edit', compact('ofimatica'));
    }

    public function update(UpdateOfimaticaRequest $request, Ofimatica $ofimatica)
    {
        $ofimatica->update($request->all());

        return redirect()->route('admin.ofimaticas.index');
    }

    public function show(Ofimatica $ofimatica)
    {
        abort_if(Gate::denies('ofimatica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ofimatica->load('created_by');

        return view('admin.ofimaticas.show', compact('ofimatica'));
    }

    public function destroy(Ofimatica $ofimatica)
    {
        abort_if(Gate::denies('ofimatica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ofimatica->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfimaticaRequest $request)
    {
        Ofimatica::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
