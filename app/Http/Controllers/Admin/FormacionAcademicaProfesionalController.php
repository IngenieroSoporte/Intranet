<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFormacionAcademicaProfesionalRequest;
use App\Http\Requests\StoreFormacionAcademicaProfesionalRequest;
use App\Http\Requests\UpdateFormacionAcademicaProfesionalRequest;
use App\Models\FormacionAcademicaProfesional;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FormacionAcademicaProfesionalController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('formacion_academica_profesional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FormacionAcademicaProfesional::with(['created_by'])->select(sprintf('%s.*', (new FormacionAcademicaProfesional())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'formacion_academica_profesional_show';
                $editGate = 'formacion_academica_profesional_edit';
                $deleteGate = 'formacion_academica_profesional_delete';
                $crudRoutePart = 'formacion-academica-profesionals';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('titulo', function ($row) {
                return $row->titulo ? $row->titulo : '';
            });
            $table->editColumn('numero_de_semestres', function ($row) {
                return $row->numero_de_semestres ? $row->numero_de_semestres : '';
            });
            $table->editColumn('graduado', function ($row) {
                return $row->graduado ? FormacionAcademicaProfesional::GRADUADO_RADIO[$row->graduado] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.formacionAcademicaProfesionals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('formacion_academica_profesional_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.formacionAcademicaProfesionals.create');
    }

    public function store(StoreFormacionAcademicaProfesionalRequest $request)
    {
        $formacionAcademicaProfesional = FormacionAcademicaProfesional::create($request->all());

        return redirect()->route('admin.formacion-academica-profesionals.index');
    }

    public function edit(FormacionAcademicaProfesional $formacionAcademicaProfesional)
    {
        abort_if(Gate::denies('formacion_academica_profesional_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formacionAcademicaProfesional->load('created_by');

        return view('admin.formacionAcademicaProfesionals.edit', compact('formacionAcademicaProfesional'));
    }

    public function update(UpdateFormacionAcademicaProfesionalRequest $request, FormacionAcademicaProfesional $formacionAcademicaProfesional)
    {
        $formacionAcademicaProfesional->update($request->all());

        return redirect()->route('admin.formacion-academica-profesionals.index');
    }

    public function show(FormacionAcademicaProfesional $formacionAcademicaProfesional)
    {
        abort_if(Gate::denies('formacion_academica_profesional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formacionAcademicaProfesional->load('created_by');

        return view('admin.formacionAcademicaProfesionals.show', compact('formacionAcademicaProfesional'));
    }

    public function destroy(FormacionAcademicaProfesional $formacionAcademicaProfesional)
    {
        abort_if(Gate::denies('formacion_academica_profesional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $formacionAcademicaProfesional->delete();

        return back();
    }

    public function massDestroy(MassDestroyFormacionAcademicaProfesionalRequest $request)
    {
        FormacionAcademicaProfesional::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
