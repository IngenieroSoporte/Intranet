<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCandidatoRequest;
use App\Http\Requests\StoreCandidatoRequest;
use App\Http\Requests\UpdateCandidatoRequest;
use App\Models\Candidato;
use App\Models\Empleo;
use App\Models\FormacionAcademicaProfesional;
use App\Models\Idiomasgestionhumana;
use App\Models\Ofimatica;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CandidatosController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('candidato_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Candidato::with(['vacante_a_la_que_se_postula', 'formacion_academica_profesionals', 'idiomas', 'ofimaticas'])->select(sprintf('%s.*', (new Candidato())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'candidato_show';
                $editGate = 'candidato_edit';
                $deleteGate = 'candidato_delete';
                $crudRoutePart = 'candidatos';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->addColumn('vacante_a_la_que_se_postula_vacante', function ($row) {
                return $row->vacante_a_la_que_se_postula ? $row->vacante_a_la_que_se_postula->vacante : '';
            });

            $table->editColumn('primer_apellido', function ($row) {
                return $row->primer_apellido ? $row->primer_apellido : '';
            });
            $table->editColumn('segundo_apellido', function ($row) {
                return $row->segundo_apellido ? $row->segundo_apellido : '';
            });
            $table->editColumn('nombres', function ($row) {
                return $row->nombres ? $row->nombres : '';
            });
            $table->editColumn('documento_de_identidad', function ($row) {
                return $row->documento_de_identidad ? Candidato::DOCUMENTO_DE_IDENTIDAD_RADIO[$row->documento_de_identidad] : '';
            });
            $table->editColumn('no_de_identificacion', function ($row) {
                return $row->no_de_identificacion ? $row->no_de_identificacion : '';
            });
            $table->editColumn('telefono_personal', function ($row) {
                return $row->telefono_personal ? $row->telefono_personal : '';
            });
            $table->editColumn('telefono_familiar', function ($row) {
                return $row->telefono_familiar ? $row->telefono_familiar : '';
            });
            $table->editColumn('formacion_academica_profesional', function ($row) {
                $labels = [];
                foreach ($row->formacion_academica_profesionals as $formacion_academica_profesional) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $formacion_academica_profesional->titulo);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('ofimatica', function ($row) {
                $labels = [];
                foreach ($row->ofimaticas as $ofimatica) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $ofimatica->nuevo);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'vacante_a_la_que_se_postula', 'formacion_academica_profesional', 'ofimatica']);

            return $table->make(true);
        }

        return view('admin.candidatos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('candidato_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacante_a_la_que_se_postulas = Empleo::pluck('vacante', 'id')->prepend(trans('global.pleaseSelect'), '');

        $formacion_academica_profesionals = FormacionAcademicaProfesional::pluck('titulo', 'id');

        $idiomas = Idiomasgestionhumana::pluck('nuevo', 'id');

        $ofimaticas = Ofimatica::pluck('nuevo', 'id');

        return view('admin.candidatos.create', compact('formacion_academica_profesionals', 'idiomas', 'ofimaticas', 'vacante_a_la_que_se_postulas'));
    }

    public function store(StoreCandidatoRequest $request)
    {
        $candidato = Candidato::create($request->all());
        $candidato->formacion_academica_profesionals()->sync($request->input('formacion_academica_profesionals', []));
        $candidato->idiomas()->sync($request->input('idiomas', []));
        $candidato->ofimaticas()->sync($request->input('ofimaticas', []));

        return redirect()->route('admin.candidatos.index');
    }

    public function edit(Candidato $candidato)
    {
        abort_if(Gate::denies('candidato_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacante_a_la_que_se_postulas = Empleo::pluck('vacante', 'id')->prepend(trans('global.pleaseSelect'), '');

        $formacion_academica_profesionals = FormacionAcademicaProfesional::pluck('titulo', 'id');

        $idiomas = Idiomasgestionhumana::pluck('nuevo', 'id');

        $ofimaticas = Ofimatica::pluck('nuevo', 'id');

        $candidato->load('vacante_a_la_que_se_postula', 'formacion_academica_profesionals', 'idiomas', 'ofimaticas');

        return view('admin.candidatos.edit', compact('candidato', 'formacion_academica_profesionals', 'idiomas', 'ofimaticas', 'vacante_a_la_que_se_postulas'));
    }

    public function update(UpdateCandidatoRequest $request, Candidato $candidato)
    {
        $candidato->update($request->all());
        $candidato->formacion_academica_profesionals()->sync($request->input('formacion_academica_profesionals', []));
        $candidato->idiomas()->sync($request->input('idiomas', []));
        $candidato->ofimaticas()->sync($request->input('ofimaticas', []));

        return redirect()->route('admin.candidatos.index');
    }

    public function show(Candidato $candidato)
    {
        abort_if(Gate::denies('candidato_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidato->load('vacante_a_la_que_se_postula', 'formacion_academica_profesionals', 'idiomas', 'ofimaticas');

        return view('admin.candidatos.show', compact('candidato'));
    }

    public function destroy(Candidato $candidato)
    {
        abort_if(Gate::denies('candidato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidato->delete();

        return back();
    }

    public function massDestroy(MassDestroyCandidatoRequest $request)
    {
        Candidato::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
