@extends('layouts.base')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
        <!--Mensaje flash-->
        @if(session('estudianteModificado'))
        <div class="alert alert-success">
            {{ session('estudianteModificado') }}
        </div>
        @endif

        <!--Validación de errores-->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif

            <div class="card">
                <form action="{{ route('edit', $estudiante->id) }}" method="POST">
                @csrf @method('PATCH')
                    <div class="card-header text-center" style="background-color: #F1948A;"><strong>MODIFICAR ESTUDIANTE</strong></div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombres</label>
                            <input type="text" name="nombres" class="form-control col-md-9" value="{{ $estudiante->nombres }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control col-md-9" value="{{ $estudiante->apellidos }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="email" class="form-control col-md-9" value="{{ $estudiante->email }}">
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="btn btn-dark btn-xs mt-5" href="{{ url ('/lista') }}">&laquo volver</a>
</div>