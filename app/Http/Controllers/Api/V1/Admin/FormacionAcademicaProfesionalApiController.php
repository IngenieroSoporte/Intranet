<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormacionAcademicaProfesionalRequest;
use App\Http\Requests\UpdateFormacionAcademicaProfesionalRequest;
use App\Http\Resources\Admin\FormacionAcademicaProfesionalResource;
use App\Models\FormacionAcademicaProfesional;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormacionAcademicaProfesionalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('formacion_academica_profesional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FormacionAcademicaProfesionalResource(FormacionAcademicaProfesional::all());
    }

    public function store(StoreFormacionAcademicaProfesionalRequest $request)
    {
        $formacionAcademicaProfesional = FormacionAcademicaProfesional::create($request->all());

        return (new FormacionAcademicaProfesionalResource($formacionAcademicaProfesional))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FormacionAcademicaProfesional $formacionAcademicaProfesional)
    {
        abort_if(Gate::denies('formacion_academica_profesional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FormacionAcademicaProfesionalResource($formacionAcademicaProfesional);
    }

    public function update(UpdateFormacionAcademicaProfesionalRequest $request, FormacionAcademicaProfesional $formacionAcademicaProfesional)
    {
        $formacionAcademicaProfesional->update($request->all());

        return (new FormacionAcademicaProfesionalResource($formacionAcademicaProfesional))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FormacionAcademicaProfesional $formacionAcademicaProfesional)
    {
        abort_if(Gate::denies('formacion_academica_profesional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formacionAcademicaProfesional->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
