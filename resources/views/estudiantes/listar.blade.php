@extends('layouts.base')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Estudiantes</h2>
            <a class="btn btn-success mb-4" href="{{ url('/form') }}">Agregar estudiante</a>
            <!--Mensaje flash-->
            @if(session('estudianteEliminado'))
            <div class="alert alert-success">
                {{ session('estudianteEliminado') }}
            </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead style="background-color: #2C3E50;">
                    <tr style="color: white;">
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody style="background-color: #EAF2F8;">
                    @foreach($ests as $est)
                    <tr>
                        <td>{{ $est->nombres }}</td>
                        <td>{{ $est->apellidos }}</td>
                        <td>{{ $est->email }}</td>
                        <td>
                        <a href="{{ route('editform', $est->id) }}" class="btn btn-primary mb-2">
                            <i class="fas fa-pencil-alt"></i> 
                        </a>
                        <form action="{{ route('delete', $est->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('¿desea borrar?');" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-dark btn-xs mt-5" href="{{ url ('/dashboard') }}">&laquo volver</a>
        </div>
    </div>
</div>