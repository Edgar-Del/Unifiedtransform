@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Editar Professor
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Início</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Lista de Professores</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar Professor</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.teacher.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                            <div class="col-3">
                                <label for="inputFirstName" class="form-label">Primeiro Nome<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Primeiro Nome" required value="{{$teacher->first_name}}">
                            </div>
                            <div class="col-3">
                                <label for="inputLastName" class="form-label">Último Nome<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Último Nome" required value="{{$teacher->last_name}}">
                            </div>
                            <div class="col-3">
                                <label for="inputEmail" class="form-label">Email<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required value="{{$teacher->email}}">
                            </div>
                            <div class="col-4">
                                <label for="inputAddress" class="form-label">Endereço<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Endereço..." required value="{{$teacher->address}}">
                            </div>
                            <div class="col-3">
                                <label for="inputAddress2" class="form-label">Morada</label>
                                <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Morada..." value="{{$teacher->address2}}">
                            </div>
                            <div class="col-2">
                                <label for="inputCity" class="form-label">Cidade<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputCity" name="city" placeholder="Cidade..." required value="{{$teacher->city}}">
                            </div>
                            <div class="col-2">
                                <label for="inputZip" class="form-label">Código Postal<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputZip" name="zip" required value="{{$teacher->zip}}">
                            </div>
                            <div class="col-3">
                                <label for="inputPhone" class="form-label">Telefone<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="(+244) 92X..." required value="{{$teacher->phone}}">
                            </div>
                            <div class="col-2">
                                <label for="inputState" class="form-label">Género<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <select id="inputState" class="form-select" name="gender" required>
                                    <option value="Male" {{($teacher->gender == 'Male')?'selected':null}}>Masculino</option>
                                    <option value="Female" {{($teacher->gender == 'Female')?'selected':null}}>Feminino</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="inputNationality" class="form-label">Nationalidade<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="Nacionalidade" required value="{{$teacher->nationality}}">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-check"></i> Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>

@include('components.photos.photo-input')
@endsection
