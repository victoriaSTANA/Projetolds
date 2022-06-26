<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if(isset($reuniao)) {{ __('Editar') }}   @else {{ __('Cadastrar') }}  @endif
        </h2>
    </x-slot>

    <div>

        @if(isset($reuniao))
            <form name="formEdit" id="formEdit" enctype="multipart/form-data" action="{{url("reuniaos/$reuniao->id")}}" method="post">
            @method('PUT')    
        @else
            <form name="formCad" id="formCad" action="{{url('reuniaos')}}" method="post" enctype="multipart/form-data">
        @endif

        
            @csrf
            <input type="text" name="titulo" id="titulo" placeholder="Título" value="{{$reuniao->titulo ?? ''}}" required>
            <input type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{$reuniao->descricao ?? ''}}" required>
            <input type="date" name="data" id="data" placeholder="Data" value="{{$reuniao->data ?? ''}}" required>
            <select name="id_user" id="id_user" required>
                <option value="{{$reuniao->relUsers->id ?? ''}}">{{$reuniao->relUsers->name ?? 'Solicitante'}}</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input type="file" name="arquivo">
            <input type="submit" value="@if(isset($reuniao)) {{ __('Editar') }}   @else {{ __('Cadastrar') }}  @endif">
        </form>
    </div>



</x-app-layout>
