@extends('app.index')

@section('styles')
    <link rel="stylesheet" href="{{ asset('app/css/avisos/index.css') }}">
@endsection

@section('content')
    <div id="main">

        <div class="head-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Información</h3>
                    </div>
                    @if (Auth::guard('empresasw')->user())
                        <div class="col-md-6">
                            <a href="{{ route('empresa.registrar_aviso') }}" class="pull-right">Nueva oportunidad</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="container-fluid mt-3">
            <div class="row">
                {{-- <div class="col-md-3 filter-cont">
                    <div class="filter">
                        @if (Auth::guard('empresasw')->check())
                            <div class="info-group">
                                <p> Postulantes <br> <span>{{ count($alumnosAvisos->where('estado_id', \BolsaTrabajo\App::$ESTADO_POSTULANTES)->pluck('aviso_id')->toArray()) }}</span> </p>
                                <p> Evaluandos <br> <span>{{ count($alumnosAvisos->where('estado_id', \BolsaTrabajo\App::$ESTADO_EVALUANDO)->pluck('aviso_id')->toArray()) }}</span> </p>
                                <p> Aceptados <br> <span>{{ count($alumnosAvisos->where('estado_id', \BolsaTrabajo\App::$ESTADO_ACEPTADOS)->pluck('aviso_id')->toArray()) }}</span> </p>
                                <p> Descartados <br> <span>{{ count($alumnosAvisos->where('estado_id', \BolsaTrabajo\App::$ESTADO_DESCARTADOS)->pluck('aviso_id')->toArray()) }}</span> </p>
                                <div class="mt-5">
                                  
                                    <a href="{{ route('empresa.postulantes', ['empresa' => $aviso->empresas->id, 'slug' => $aviso->id ])  }}" class="text-uppercase">
                                        Ver Postulantes
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="content-card-user-info">
                                <div class="sub-title text-center">
                                    <h5>Evaluación Progresiva</h5>
                                </div>
                                @if ($alumnoAviso != null && !in_array($alumnoAviso->estado_id, [\BolsaTrabajo\App::$ESTADO_DESCARTADOS]))
                                <div class="row">
                                    <div class="col-md-3"><div class="progress-line {{ $alumnoAviso != null && in_array($alumnoAviso->estado_id, [\BolsaTrabajo\App::$ESTADO_POSTULANTES, \BolsaTrabajo\App::$ESTADO_EVALUANDO, \BolsaTrabajo\App::$ESTADO_SELECCIONADOS, \BolsaTrabajo\App::$ESTADO_ACEPTADOS]) ? "active" : "" }}"></div></div>
                                    <div class="col-md-3"><div class="progress-line {{ $alumnoAviso != null && in_array($alumnoAviso->estado_id, [\BolsaTrabajo\App::$ESTADO_EVALUANDO, \BolsaTrabajo\App::$ESTADO_SELECCIONADOS, \BolsaTrabajo\App::$ESTADO_ACEPTADOS]) ? "active" : "" }}"></div></div>
                                    <div class="col-md-3"><div class="progress-line {{ $alumnoAviso != null && in_array($alumnoAviso->estado_id, [\BolsaTrabajo\App::$ESTADO_SELECCIONADOS, \BolsaTrabajo\App::$ESTADO_ACEPTADOS]) ? "active" : "" }}"></div></div>
                                    <div class="col-md-3"><div class="progress-line {{ $alumnoAviso != null && in_array($alumnoAviso->estado_id, [\BolsaTrabajo\App::$ESTADO_ACEPTADOS]) ? "active" : "" }}"></div></div>
                                </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-3"><div class="progress-line {{ $alumnoAviso != null ? "descarte" : "" }}"></div></div>
                                        <div class="col-md-3"><div class="progress-line {{ $alumnoAviso != null ? "descarte" : "" }}"></div></div>
                                        <div class="col-md-3"><div class="progress-line {{ $alumnoAviso != null ? "descarte" : "" }}"></div></div>
                                        <div class="col-md-3"><div class="progress-line {{ $alumnoAviso != null ? "descarte" : "" }}"></div></div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div> --}}
                <div class="col-md-7">
                    <div class="card aviso" style=" max-height: 1250px !important; overflow-y: auto;">
                        <h5>{{ $aviso->titulo }}</h5>
                        <p class="descripcion-aviso"><?php echo $aviso->descripcion; ?></p>
                    </div>


                    {{--  <div class="card aviso mt-2">
                        @if (Auth::guard('alumnos')->user())
                            <button id="postular" type="button" data-info="{{ $aviso->id }}"
                                class="{{ $alumnoAviso ? 'postulaste' : '' }}"
                                {{ $alumnoAviso ? 'disabled' : '' }}>{{ $alumnoAviso ? 'Ya estas postulando' : 'Postularme' }}</button>
                        @endif

                        @if (Auth::guard('empresasw')->check())
                            <a href="{{ Auth::guard('alumnos')->user() ? route('alumno.avisos') : route('empresa.avisos') }}"
                                class="text-uppercase">Regresar</a>
                        @else
                            <a href="javascript:void(0);" class="text-uppercase" onclick="regresar()">Regresar</a>
                        @endif


                    </div> --}}
                </div>
                <style>
                    .badge {
                        display: inline-block;
                        padding: 3px 10px !important;
                        font-size: 14px;
                        font-weight: bold;
                        color: rgb(0 114 191);
                        border-radius: 20px;
                        text-align: left;
                        white-space: nowrap;
                        font-size: 16px;
                        margin: 10px 0 0 10px;
                        font-family: 'Arial', sans-serif;
                    }
                </style>
                <div class="col-md-3">
                    <div class="card empresa" style="height: auto; position: sticky !important; top:10px;">
                        <h5><a style="font-size: 1rem; !important;font-weight: 600; color: #515151;"
                                href="{{ route('alumno.empresa_informacion', ['empresa' => $aviso->empresas->link]) }}">{{ $aviso->empresas != null ? $aviso->empresas->nombre_comercial : '-' }}</a>
                        </h5>
                        <div style="font-family: 'Arial', sans-serif;color:#236057;"><img
                                src="{{ asset('app/img/verificado.png') }}" alt=""
                                style="width: 35px !important;
                                padding: 0 5px 2px 0;">
                            Empresa Verificada</div>
                        <div class="badge">
                            <small><i class="fa fa-money" aria-hidden="true"></i> 
                                {{ $aviso->salario != null ? $aviso->salario: '-' }}</small>
                        </div>

                        <div class="badge"><small><i class="fa fa-hospital-o" aria-hidden="true"></i>
                                {{ $aviso->areas != null ? $aviso->areas->nombre : '-' }}</small></div>

                        <div class="badge">
                            <small><i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $aviso->distritos != null ? $aviso->distritos->nombre : '' }}</small>
                        </div>
                        {{-- <p>{{ $aviso->horarios != null ? $aviso->horarios->nombre : "-" }}</p>
                        <p>{{ $aviso->modalidades != null ? $aviso->modalidades->nombre : "-" }}</p> --}}
                        <div class="card aviso" style="border: 0 solid rgba(0, 0, 0, 0.125);padding: 5px;">
                            @if (Auth::guard('alumnos')->user())
                                <button id="postular" type="button" data-info="{{ $aviso->id }}" data-user="{{ Auth::guard('alumnos')->user()->id }}"
                                    class="{{ $alumnoAviso ? 'postulaste' : '' }}" {{ $alumnoAviso ? 'disabled' : '' }}>
                                    {{ $alumnoAviso ? 'Ya estas postulando' : 'Postularme' }}
                                </button>
                            @endif

                            @if (Auth::guard('empresasw')->check())
                                <a href="{{ Auth::guard('alumnos')->user() ? route('alumno.avisos') : route('empresa.avisos') }}"
                                    class="text-uppercase"><i class="fa fa-reply-all" aria-hidden="true"></i> Regresar</a>
                            @else
                                <a href="javascript:void(0);" class="text-uppercase" onclick="regresar()"> <i
                                        class="fa fa-reply-all" aria-hidden="true"></i> Regresar</a>
                            @endif
                        </div>
                        <p style="text-align: right;font-family: 'Arial', sans-serif;margin-top:30px;color:#cfcfcf;">
                            Públicado: {{ \Carbon\Carbon::parse($aviso->created_at)->format('d-m-Y') }}</p>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    @if (Auth::guard('empresasw')->check())
                        <a href="https://wa.me/923001874?text=Hola,vengo%20de%20la%20bolsa%20de%20trabajo%20y%20deseo%20conocer%20más%20de%20los%20servicios%20gratuitos%20para%20las%20empresas%20aliadas."
                            target="_blank">
                            <img src="{{ asset('app/img/nuevaimagen.png') }}" alt="Logo de WhatsApp">
                        </a>
                    @else
                        <a href="https://wa.me/922611913?text=Hola, Vengo de la Bolsa de trabajo y quiero conocer más sobre los programas de empleabilidad. Información por favor 😊"
                            target="_blank">
                            <img src="{{ asset('app/img/banner2_janet.png') }}" alt="">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var routeProgreso= "{{ route('alumno.progreso') }}";
        var tokenWeb = "{{ csrf_token() }}";
        var routeHome = "{{ route('alumno.avisos') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script type="text/javascript" src="{{ asset('app/js/avisos/informacion.min.js') }}"></script> --}}
    <script src="{{ asset('app/js/avisos/informacion.js') }}"></script>
    <script>
        function regresar() {
            window.history.back();
        }
    </script>
@endsection
