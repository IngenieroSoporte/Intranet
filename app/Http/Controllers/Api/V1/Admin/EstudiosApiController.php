<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEstudioRequest;
use App\Http\Requests\UpdateEstudioRequest;
use App\Http\Resources\Admin\EstudioResource;
use App\Models\Estudio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstudiosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('estudio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EstudioResource(Estudio::with(['created_by'])->get());
    }

    public function store(StoreEstudioRequest $request)
    {
        $estudio = Estudio::create($request->all());

        return (new EstudioResource($estudio))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Estudio $estudio)
    {
        abort_if(Gate::denies('estudio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EstudioResource($estudio->load(['created_by']));
    }

    public function update(UpdateEstudioRequest $request, Estudio $estudio)
    {
        $estudio->update($request->all());

        return (new EstudioResource($estudio))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Estudio $estudio)
    {
        abort_if(Gate::denies('estudio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estudio->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
