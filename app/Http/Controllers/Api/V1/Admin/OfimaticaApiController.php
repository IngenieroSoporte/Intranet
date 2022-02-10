<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfimaticaRequest;
use App\Http\Requests\UpdateOfimaticaRequest;
use App\Http\Resources\Admin\OfimaticaResource;
use App\Models\Ofimatica;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfimaticaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ofimatica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfimaticaResource(Ofimatica::all());
    }

    public function store(StoreOfimaticaRequest $request)
    {
        $ofimatica = Ofimatica::create($request->all());

        return (new OfimaticaResource($ofimatica))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ofimatica $ofimatica)
    {
        abort_if(Gate::denies('ofimatica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfimaticaResource($ofimatica);
    }

    public function update(UpdateOfimaticaRequest $request, Ofimatica $ofimatica)
    {
        $ofimatica->update($request->all());

        return (new OfimaticaResource($ofimatica))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ofimatica $ofimatica)
    {
        abort_if(Gate::denies('ofimatica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ofimatica->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
