@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar eleccion
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('eleccion.update', $eleccion->id) }} " 
        enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')

            <div class="form-group">
                <label for="periodo">Periodo:</label>
                <input type="text" id="periodo"
                value="{{$eleccion->periodo}}"
                 class="form-control" name="periodo" />
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha"
                value="{{$eleccion->fecha->format('Y-m-d')}}"
                 class="form-control" name="fecha" />
            </div>
            
            <div class="form-group">
                <label for="fechaapertura">Fecha de apertura:</label>

                <input type="date" id="fechaapertura"
                value="{{$eleccion->fechaapertura->format('Y-m-d')}}"
                 class="form-control" name="fechaapertura" />
                 
            </div>
              
            <div class="form-group">
                <label for="horaapertura">Hora de apertura:</label>
            
                <input type="time" id="horaapertura"
                value="{{$eleccion->horaapertura->format('H:i')}}"
                 class="form-control" name="horaapertura" />
            </div>

            <div class="form-group">
                <label for="fechacierre">Fecha de cierre:</label>
                <input type="date" id="fechacierre"
                value="{{$eleccion->fechacierre->format('Y-m-d')}}"
                 class="form-control" name="fechacierre" />
            </div>

            <div class="form-group">
                <label for="horacierre">Hora de cierre:</label>
                <input type="time" id="horacierre"
                value="{{$eleccion->horaapertura->format('H:i')}}"
                 class="form-control" name="horacierre" />
            </div>

            <div class="form-group">
                <label for="observaciones">Observaciones:</label>
                <input type="text" id="observaciones"
                value="{{$eleccion->observaciones}}"
                 class="form-control" name="observaciones" />
            </div>


            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection