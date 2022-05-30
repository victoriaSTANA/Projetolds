<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página Inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Você é um usuário<br>
                    @can('user')
                        Dados do usuário
                    @elsecan('admin')
                        Se está vendo isso, então você é um administrador
                    @endcan

                    

                </div>
            </div>
        </div>

        <div class="text-center mt-3 mb-4">
            <a href="{{url('reuniaos/create')}}">
                <button>Cadastrar</button>
            </a>
        </div>

        <div>
        @csrf
        <table >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Solicitante</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($reuniao as $reuniaos)
                    @php 
                        $user = $reuniaos->find($reuniaos->id)->relUsers;
                    @endphp
                    <tr>
                        <th>{{$reuniaos->id}}</th>
                        <th>{{$reuniaos->titulo}}</th>
                        <td>{{$reuniaos->descricao}}</td>
                        <th>{{$reuniaos->data}}</th>
                        <td>{{$user->name}}</td>
                        <td>
                            <a href="{{url("reuniaos/$reuniaos->id")}}">
                                <button>Visualizar</button>
                            </a>
                            <a href="{{url("reuniaos/$reuniaos->id/edit")}}">
                                <button>Editar</button>
                            </a>
                            <a href="{{url("reuniaos/$reuniaos->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                    </tr>
                
                    
                @endforeach


            </tbody>
        </table>    

    </div>

    </div>



</x-app-layout>
