@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Cadastrar Estudante
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Início</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cadastrar Estudante</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                 {{--
                     <p class="text-primary">
                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Remember to create related "Class" and "Section" before adding student</small>
                    </p>
                    --}}
                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.student.create')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Primeiro Nome<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Primeiro Nome" required value="{{old('first_name')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputLastName" class="form-label">Sobrenome<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Sobrenome" required value="{{old('last_name')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" required value="{{old('email')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Senha<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="password" class="form-control" id="inputPassword4" name="password" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="formFile" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                                    <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputBirthday" class="form-label">Data de Nascimento<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="date" class="form-control" id="inputBirthday" name="birthday" placeholder="Data de Nascimento" required value="{{old('birthday')}}">
                                </div>
                                <div class="col-3-md">
                                    <label for="inputAddress" class="form-label">Endereço<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Endereço..." required value="{{old('address')}}">
                                </div>
                                <div class="col-3-md">
                                    <label for="inputAddress2" class="form-label">Morada</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Morada..." value="{{old('address2')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputCity" class="form-label">Cidade<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Cidade..." required value="{{old('city')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputZip" class="form-label">Código Postal<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required value="{{old('zip')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputState" class="form-label">Género<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputState" class="form-select" name="gender" required>
                                        <option value="Male" {{old('gender') == 'male' ? 'selected' : ''}}>Masculino</option>
                                        <option value="Female" {{old('gender') == 'female' ? 'selected' : ''}}>Feminino</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputNationality" class="form-label">Nacionalidade<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="ex.: Angolano, Namibiano,..." required value="{{old('nationality')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputBloodType" class="form-label">Grupo de Sangue<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputBloodType" class="form-select" name="blood_type" required>
                                        <option {{old('blood_type') == 'A+' ? 'selected' : ''}}>A+</option>
                                        <option {{old('blood_type') == 'A-' ? 'selected' : ''}}>A-</option>
                                        <option {{old('blood_type') == 'B+' ? 'selected' : ''}}>B+</option>
                                        <option {{old('blood_type') == 'B-' ? 'selected' : ''}}>B-</option>
                                        <option {{old('blood_type') == 'O+' ? 'selected' : ''}}>O+</option>
                                        <option {{old('blood_type') == 'O-' ? 'selected' : ''}}>O-</option>
                                        <option {{old('blood_type') == 'AB+' ? 'selected' : ''}}>AB+</option>
                                        <option {{old('blood_type') == 'AB-' ? 'selected' : ''}}>AB-</option>
                                        <option {{old('blood_type') == 'other' ? 'selected' : ''}}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputReligion" class="form-label">Religião<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputReligion" class="form-select" name="religion" required>
                                        <option {{old('religion') == 'Islam' ? 'selected' : ''}}>Islamismo</option>
                                        <option {{old('religion') == 'Hinduism' ? 'selected' : ''}}>Hinduísmo</option>
                                        <option {{old('religion') == 'Christianity' ? 'selected' : ''}}>Cristianismo</option>
                                        <option {{old('religion') == 'Buddhism' ? 'selected' : ''}}>Budismo</option>
                                        <option {{old('religion') == 'Judaism' ? 'selected' : ''}}>Judaísmo</option>
                                        <option {{old('religion') == 'Others' ? 'selected' : ''}}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPhone" class="form-label">Telefone<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="ex.: (+244) 92X..." required value="{{old('phone')}}">
                                </div>
                                <div class="col-5-md">
                                    <label for="inputIdCardNumber" class="form-label">Número de Identificação<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputIdCardNumber" name="id_card_number" placeholder="Número de Identificação" required value="{{old('id_card_number')}}">
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>Informação dos Encarregados</h6>
                                <div class="col-md-3">
                                    <label for="inputFatherName" class="form-label">Nome do Pai<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherName" name="father_name" placeholder="Nome do Pai" required value="{{old('father_name')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputFatherPhone" class="form-label">Telefone<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherPhone" name="father_phone" placeholder="ex.: (+244) 92X..." required value="{{old('father_phone')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputMotherName" class="form-label">Nome da Mãe<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherName" name="mother_name" placeholder="Nome da Mãe" required value="{{old('mother_name')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputMotherPhone" class="form-label">Telefone<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherPhone" name="mother_phone" placeholder="(+244) 92X..." required value="{{old('mother_name')}}">
                                </div>
                                <div class="col-4-md">
                                    <label for="inputParentAddress" class="form-label">Endereço<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputParentAddress" name="parent_address" placeholder="Endereço..." required value="{{old('parent_address')}}">
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>Informações Académicas</h6>
                                <div class="col-md-6">
                                    <label for="inputAssignToClass" class="form-label">Matricular a um ano Académico:<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select onchange="getSections(this);" class="form-select" id="inputAssignToClass" name="class_id" required>
                                        @isset($school_classes)
                                            <option selected disabled>Selecione um Ano</option>
                                            @foreach ($school_classes as $school_class)
                                                <option value="{{$school_class->id}}" >{{$school_class->class_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAssignToSection" class="form-label">Associacar a uma Turma:<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select class="form-select" id="inputAssignToSection" name="section_id" required>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputBoardRegistrationNumber" class="form-label">Nº de Registo</label>
                                    <input type="text" class="form-control" id="inputBoardRegistrationNumber" name="board_reg_no" placeholder="Nº de Registo" value="{{old('board_reg_no')}}">
                                </div>
                                <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                            </div>
                            <div class="row mt-4">
                                <div class="col-12-md">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i>Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
<script>
    function getSections(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{route('get.sections.courses.by.classId')}}?class_id=" + class_id

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {
            var sectionSelect = document.getElementById('inputAssignToSection');
            sectionSelect.options.length = 0;
            data.sections.unshift({'id': 0,'section_name': 'Selecione uma Turma'})
            data.sections.forEach(function(section, key) {
                sectionSelect[key] = new Option(section.section_name, section.id);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
@include('components.photos.photo-input')
@endsection
