@extends('layouts.app')

@section('content')
<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-tools"></i> Área Académica
                    </h1>

                    @include('session-messages')

                    <div class="mb-4">
                        <div class="row" data-masonry='{"percentPosition": true }'>
                            @if ($latest_school_session_id == $current_school_session_id)
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Criar Ano Letivo</h6>
                                {{--
                                     <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Create one Session per academic year. Last created session will be considered as the latest academic session.</small>
                                    </p>
                                    --}}
                                    <form action="{{route('school.session.store')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="2021 - 2022" aria-label="Current Session" name="session_name" required>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Criar</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Pesquisar por Ano Lectivo</h6>
                                    {{--
                                        <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Only use this when you want to browse data from previous Sessions.</small>
                                    </p>
                                        --}}

                                    <form action="{{route('school.session.browse')}}" method="POST">
                                        @csrf
                                    <div class="mb-3">
                                        <p class="mt-2">Selecione o Ano Lectivo:</p>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm" name="session_id" required>
                                            @isset($school_sessions)
                                                @foreach ($school_sessions as $school_session)
                                                    <option value="{{$school_session->id}}">{{$school_session->session_name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Navegar</button>
                                    </form>
                                </div>
                            </div>
                            @if ($latest_school_session_id == $current_school_session_id)
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Criar Semestre</h6>
                                    <form action="{{route('school.semester.create')}}" method="POST">
                                        @csrf
                                    <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                    <div class="mt-2">
                                        <p>Nome do Semestre<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <input type="text" class="form-control form-control-sm" placeholder="Primerio Semestre" aria-label="Semester name" name="semester_name" required>
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputStarts" class="form-label">Início do Semestre<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="date" class="form-control form-control-sm" id="inputStarts" placeholder="Início do Semestre" name="start_date" required>
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputEnds" class="form-label">Fim do Semestre<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="date" class="form-control form-control-sm" id="inputEnds" placeholder="Fim do Semestre" name="end_date" required>
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i>Criar</button>
                                </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Formas de Controlo de Frequência</h6>
                                 {{--
                                     <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Att não alterar ao longo do semestre.</small>
                                    </p>
                                    --}}
                                    <form action="{{route('school.attendance.type.update')}}" method="POST">
                                        @csrf
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type" id="attendance_type_section" {{($academic_setting->attendance_type == 'section')?'checked="checked"':null}} value="section">
                                            <label class="form-check-label" for="attendance_type_section">
                                                Frequência por Turma
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type" id="attendance_type_course" {{($academic_setting->attendance_type == 'course')?'checked="checked"':null}} value="course">
                                            <label class="form-check-label" for="attendance_type_course">
                                               Frequência por disciplina
                                            </label>
                                        </div>

                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Guardar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Criar Ano Académico</h6>
                                    <form action="{{route('school.class.create')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-sm" name="class_name" placeholder="1º Ano" aria-label="Class name" required>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Criar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                <h6>Criar Turma</h6>
                                    <form action="{{route('school.section.create')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-3">
                                            <input class="form-control form-control-sm" name="section_name" type="text" placeholder="Turma" required>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-sm" name="room_no" type="text" placeholder="Nº da Sala" required>
                                        </div>
                                        <div>
                                            <p>Classe(Ano Académico):</p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                @isset($school_classes)
                                                    @foreach ($school_classes as $school_class)
                                                    <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Guardar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Criar Disciplina</h6>
                                    <form action="{{route('school.course.create')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-1">
                                            <input type="text" class="form-control form-control-sm" name="course_name" placeholder="Nome da Disciplina" aria-label="Course name" required>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mt-2">Tipo de Disciplina:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" name="course_type" aria-label=".form-select-sm" required>
                                                <option value="Core">Completementar</option>
                                                <option value="General">Nuclear</option>
                                                <option value="Elective">Electiva</option>
                                                <option value="Optional">Optional</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Semestre:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="semester_id" required>
                                                @isset($semesters)
                                                    @foreach ($semesters as $semester)
                                                    <option value="{{$semester->id}}">{{$semester->semester_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Classe(Ano):<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                @isset($school_classes)
                                                    @foreach ($school_classes as $school_class)
                                                    <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Create</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Associar a um professor</h6>
                                    <form action="{{route('school.teacher.assign')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-3">
                                            <p class="mt-2">Selecione um Professor:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="teacher_id" required>
                                                @isset($teachers)
                                                    @foreach ($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Semestre:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="semester_id" required>
                                                @isset($semesters)
                                                    @foreach ($semesters as $semester)
                                                    <option value="{{$semester->id}}">{{$semester->semester_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div>
                                            <p>Classe(Ano):<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select onchange="getSectionsAndCourses(this);" class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                @isset($school_classes)
                                                    <option selected disabled>Selecione a Classe(Ano)</option>
                                                    @foreach ($school_classes as $school_class)
                                                    <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mt-2">Turma:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" id="section-select" aria-label=".form-select-sm" name="section_id" required>
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mt-2">Disciplina:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" id="course-select" aria-label=".form-select-sm" name="course_id" required>
                                            </select>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Guardar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Habilitar lançamento de notas</h6>
                                    <form action="{{route('school.final.marks.submission.status.update')}}" method="POST">
                                        @csrf
                                      {{--  <p class="text-danger">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Usually teachers are allowed to submit final marks just before the end of a "Semester".</small>
                                        </p>
                                        <p class="text-primary">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Disallow at the start of a "Semester".</small>
                                        </p>
                                    --}}
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="marks_submission_status" id="marks_submission_status_check" {{($academic_setting->marks_submission_status == 'on')?'checked="checked"':null}}>
                                            <label class="form-check-label" for="marks_submission_status_check">{{($academic_setting->marks_submission_status == 'on')?'Habilitado':'Desabilitado'}}</label>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Guardar</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
<script>
    function getSectionsAndCourses(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{route('get.sections.courses.by.classId')}}?class_id=" + class_id

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {
            var sectionSelect = document.getElementById('section-select');
            sectionSelect.options.length = 0;
            data.sections.unshift({'id': 0,'section_name': 'Selecione a Turma'})
            data.sections.forEach(function(section, key) {
                sectionSelect[key] = new Option(section.section_name, section.id);
            });

            var courseSelect = document.getElementById('course-select');
            courseSelect.options.length = 0;
            data.courses.unshift({'id': 0,'course_name': 'Selecione a Disciplina'})
            data.courses.forEach(function(course, key) {
                courseSelect[key] = new Option(course.course_name, course.id);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
@endsection
