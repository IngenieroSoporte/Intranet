<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyImportarEmpleadoRequest;
use App\Http\Requests\StoreImportarEmpleadoRequest;
use App\Http\Requests\UpdateImportarEmpleadoRequest;
use App\Models\ImportarEmpleado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ImportarEmpleadosController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('importar_empleado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ImportarEmpleado::with(['created_by'])->select(sprintf('%s.*', (new ImportarEmpleado())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'importar_empleado_show';
                $editGate = 'importar_empleado_edit';
                $deleteGate = 'importar_empleado_delete';
                $crudRoutePart = 'importar-empleados';

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
            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : '';
            });
            $table->editColumn('cedula', function ($row) {
                return $row->cedula ? $row->cedula : '';
            });
            $table->editColumn('lugar_de_expedicion_de_la_cedula', function ($row) {
                return $row->lugar_de_expedicion_de_la_cedula ? $row->lugar_de_expedicion_de_la_cedula : '';
            });
            $table->editColumn('cargo_actual', function ($row) {
                return $row->cargo_actual ? $row->cargo_actual : '';
            });

            $table->editColumn('salario', function ($row) {
                return $row->salario ? $row->salario : '';
            });
            $table->editColumn('salario_en_letras', function ($row) {
                return $row->salario_en_letras ? $row->salario_en_letras : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.importarEmpleados.index');
    }

    public function create()
    {
        abort_if(Gate::denies('importar_empleado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importarEmpleados.create');
    }

    public function store(StoreImportarEmpleadoRequest $request)
    {
        $importarEmpleado = ImportarEmpleado::create($request->all());

        return redirect()->route('admin.importar-empleados.index');
    }

    public function edit(ImportarEmpleado $importarEmpleado)
    {
        abort_if(Gate::denies('importar_empleado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importarEmpleado->load('created_by');

        return view('admin.importarEmpleados.edit', compact('importarEmpleado'));
    }

    public function update(UpdateImportarEmpleadoRequest $request, ImportarEmpleado $importarEmpleado)
    {
        $importarEmpleado->update($request->all());

        return redirect()->route('admin.importar-empleados.index');
    }

    public function show(ImportarEmpleado $importarEmpleado)
    {
        abort_if(Gate::denies('importar_empleado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importarEmpleado->load('created_by');

        return view('admin.importarEmpleados.show', compact('importarEmpleado'));
    }

    public function destroy(ImportarEmpleado $importarEmpleado)
    {
        abort_if(Gate::denies('importar_empleado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importarEmpleado->delete();

        return back();
    }

    public function massDestroy(MassDestroyImportarEmpleadoRequest $request)
    {
        ImportarEmpleado::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
