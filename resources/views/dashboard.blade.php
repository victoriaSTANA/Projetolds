<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-success text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        
                    @can('user')
                        <div>{{ Auth::user()->name }}</div>
                    @elsecan('admin')
                        <div>{{ Auth::user()->name }} | Admin</div>
                    @endcan



                </div>
            </div>
        </div>

        <div class="text-center text-success mt-3 mb-4">
            <a href="{{url('reuniaos/create')}}">
                <button class="text-success">Cadastrar</button>
            </a>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div>
                    @csrf
                    <table class="table table-striped ">
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
                                            <button class="btn btn-outline-primary btn-sm">Visualizar</button>
                                        </a>
                                        <a href="{{url("reuniaos/$reuniaos->id/edit")}}">
                                            <button class="btn btn-outline-warning btn-sm">Editar</button>
                                        </a>
                                        <a href="{{url("reuniaos/$reuniaos->id")}}" class="js-del">
                                            <button class="btn btn-outline-danger btn-sm">Deletar</button>
                                        </a>
                                    </td>
                                </tr>


                            @endforeach


                        </tbody>
                    </table>

                </div>

            </div>

            <div class="col-4">
                <img src="https://img.freepik.com/fotos-grati s/calendario-de-icone-plana-de-janeiro-de-2022-sobre-um-fundo-azul-renderizacao-3d_476612-19363.jpg"/>
            </div>

        </div>
 
    </div>





</x-app-layout>
