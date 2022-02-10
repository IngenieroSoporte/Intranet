<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEstudioRequest;
use App\Http\Requests\StoreEstudioRequest;
use App\Http\Requests\UpdateEstudioRequest;
use App\Models\Estudio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EstudiosController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('estudio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Estudio::with(['created_by'])->select(sprintf('%s.*', (new Estudio())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'estudio_show';
                $editGate = 'estudio_edit';
                $deleteGate = 'estudio_delete';
                $crudRoutePart = 'estudios';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.estudios.index');
    }

    public function create()
    {
        abort_if(Gate::denies('estudio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estudios.create');
    }

    public function store(StoreEstudioRequest $request)
    {
        $estudio = Estudio::create($request->all());

        return redirect()->route('admin.estudios.index');
    }

    public function edit(Estudio $estudio)
    {
        abort_if(Gate::denies('estudio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estudio->load('created_by');

        return view('admin.estudios.edit', compact('estudio'));
    }

    public function update(UpdateEstudioRequest $request, Estudio $estudio)
    {
        $estudio->update($request->all());

        return redirect()->route('admin.estudios.index');
    }

    public function show(Estudio $estudio)
    {
        abort_if(Gate::denies('estudio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estudio->load('created_by');

        return view('admin.estudios.show', compact('estudio'));
    }

    public function destroy(Estudio $estudio)
    {
        abort_if(Gate::denies('estudio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estudio->delete();

        return back();
    }

    public function massDestroy(MassDestroyEstudioRequest $request)
    {
        Estudio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
