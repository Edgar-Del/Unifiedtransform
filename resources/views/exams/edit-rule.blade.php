@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-file-plus"></i> Editar Parâmetros de Prova</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Início</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Parâmetros de Prova</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar Parâmetros de Prova</li>
                        </ol>
                    </nav>
                    @include('session-messages')
                    <div class="row">
                        <div class="col-5 mb-4">
                            <div class="p-3 border bg-light shadow-sm">
                                <form action="{{route('exam.rule.update')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="exam_rule_id" value="{{$exam_rule_id}}">
                                    <div class="mt-2">
                                        <label for="inputTotalMarks" class="form-label">Nota Máxima<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="number" class="form-control" id="inputTotalMarks" value="{{$exam_rule->total_marks}}" name="total_marks" step="0.01">
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputPassMarks" class="form-label">Nota Positiva<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="number" class="form-control" id="inputPassMarks" value="{{$exam_rule->pass_marks}}" name="pass_marks" step="0.01">
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputMarksDistributionNote" class="form-label">Distribuição das Pontuações/Notas<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <textarea class="form-control" id="inputMarksDistributionNote" rows="3" name="marks_distribution_note">{{$exam_rule->marks_distribution_note}}</textarea>
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check"></i>Actualizar</button>
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
