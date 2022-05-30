<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar') }}
        </h2>
    </x-slot>

    <div>
        Título: {{$reuniao->titulo}}              <br>
        Descriçao: {{$reuniao->descricao}}        <br>
        Data: {{$reuniao->data}}                  <br>


        @php 
            $user = $reuniao->find($reuniao->id)->relUsers;
        @endphp

        Solicitante: {{$user->name}}    <br>
    </div>



</x-app-layout>
