@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-file-plus"></i> Adicionar Parâmetros de Avaliação</h1>
                    @include('session-messages')
                    <div class="row">
                        <div class="col-5 mb-4">
                            <div class="p-3 border bg-light">
                                <form action="{{route('exam.grade.system.rule.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="grading_system_id" value="{{$grading_system_id}}">
                                    <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                    <div class="mt-2">
                                        <label for="inputPoint" class="form-label">Pontos<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="number" step="0.01" name="point" class="form-control" id="inputPoint" placeholder="3.5, 4.0, ...">
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputGrade" class="form-label">Nota<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="text" name="grade" class="form-control" id="inputGrade" placeholder="Nota">
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputStarts" class="form-label">Mínima<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="number" step="0.01" name="start_at" class="form-control" id="inputStarts" placeholder="Mínima">
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputEnds" class="form-label">Máxima<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="number" step="0.01" name="end_at" class="form-control" id="inputEnds" placeholder="Máxima">
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-plus"></i> Adicionar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
