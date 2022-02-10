<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImportarEmpleadoRequest;
use App\Http\Requests\UpdateImportarEmpleadoRequest;
use App\Http\Resources\Admin\ImportarEmpleadoResource;
use App\Models\ImportarEmpleado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImportarEmpleadosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('importar_empleado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImportarEmpleadoResource(ImportarEmpleado::with(['created_by'])->get());
    }

    public function store(StoreImportarEmpleadoRequest $request)
    {
        $importarEmpleado = ImportarEmpleado::create($request->all());

        return (new ImportarEmpleadoResource($importarEmpleado))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ImportarEmpleado $importarEmpleado)
    {
        abort_if(Gate::denies('importar_empleado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImportarEmpleadoResource($importarEmpleado->load(['created_by']));
    }

    public function update(UpdateImportarEmpleadoRequest $request, ImportarEmpleado $importarEmpleado)
    {
        $importarEmpleado->update($request->all());

        return (new ImportarEmpleadoResource($importarEmpleado))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ImportarEmpleado $importarEmpleado)
    {
        abort_if(Gate::denies('importar_empleado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importarEmpleado->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
