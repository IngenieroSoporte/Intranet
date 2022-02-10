<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocumentosCandidatoRequest;
use App\Http\Requests\UpdateDocumentosCandidatoRequest;
use App\Http\Resources\Admin\DocumentosCandidatoResource;
use App\Models\DocumentosCandidato;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentosCandidatosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documentos_candidato_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentosCandidatoResource(DocumentosCandidato::with(['created_by'])->get());
    }

    public function store(StoreDocumentosCandidatoRequest $request)
    {
        $documentosCandidato = DocumentosCandidato::create($request->all());

        foreach ($request->input('fotocopia_de_la_cedula', []) as $file) {
            $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('fotocopia_de_la_cedula');
        }

        foreach ($request->input('acta_de_grado', []) as $file) {
            $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('acta_de_grado');
        }

        foreach ($request->input('certificaciones', []) as $file) {
            $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('certificaciones');
        }

        return (new DocumentosCandidatoResource($documentosCandidato))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocumentosCandidato $documentosCandidato)
    {
        abort_if(Gate::denies('documentos_candidato_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentosCandidatoResource($documentosCandidato->load(['created_by']));
    }

    public function update(UpdateDocumentosCandidatoRequest $request, DocumentosCandidato $documentosCandidato)
    {
        $documentosCandidato->update($request->all());

        if (count($documentosCandidato->fotocopia_de_la_cedula) > 0) {
            foreach ($documentosCandidato->fotocopia_de_la_cedula as $media) {
                if (!in_array($media->file_name, $request->input('fotocopia_de_la_cedula', []))) {
                    $media->delete();
                }
            }
        }
        $media = $documentosCandidato->fotocopia_de_la_cedula->pluck('file_name')->toArray();
        foreach ($request->input('fotocopia_de_la_cedula', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('fotocopia_de_la_cedula');
            }
        }

        if (count($documentosCandidato->acta_de_grado) > 0) {
            foreach ($documentosCandidato->acta_de_grado as $media) {
                if (!in_array($media->file_name, $request->input('acta_de_grado', []))) {
                    $media->delete();
                }
            }
        }
        $media = $documentosCandidato->acta_de_grado->pluck('file_name')->toArray();
        foreach ($request->input('acta_de_grado', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('acta_de_grado');
            }
        }

        if (count($documentosCandidato->certificaciones) > 0) {
            foreach ($documentosCandidato->certificaciones as $media) {
                if (!in_array($media->file_name, $request->input('certificaciones', []))) {
                    $media->delete();
                }
            }
        }
        $media = $documentosCandidato->certificaciones->pluck('file_name')->toArray();
        foreach ($request->input('certificaciones', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $documentosCandidato->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('certificaciones');
            }
        }

        return (new DocumentosCandidatoResource($documentosCandidato))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocumentosCandidato $documentosCandidato)
    {
        abort_if(Gate::denies('documentos_candidato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosCandidato->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
