@extends('layouts.main')

@section('title', 'Encoraja')
@section('content')

<h1 class="tittle1">Página de Eventos</h1>

<div  class="users-list">

    <div class="col-md-6 d-flex">
        <form action="/events" method="GET" class="input-group mb-3">
            <input type="text"  class="form-control" id="search" name="search" placeholder="Procure um evento">
            <button type="input" class="btn-search rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill=" #f89051" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </button>

            @if (Auth::user()->can('viewVoluntary', $user) || Auth::user()->can('viewAdmin', $user))
                    <a href="/events/create" class="btn-search rounded btn-form">Criar evento</a>   
            @endif

        </form>
    </div>
    <table border="1" class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Modalidade</th>
            <th>Status</th>
            <th>Tipo</th>
            <th>Público alvo</th>
            <th>Vagas</th>
            <th>Vagas sociais</th>
            <th>Vagas normais</th>
            <th>Materiais</th>
            <th>Áreas de interesse</th>
            <th>Price</th>
            <th>Ações</th>
        </thead>
        <tbod>
            @foreach($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td>{{$event->name}}</td>
                    <td>{{$event->description}}</td>
                    <td>{{$event->date}}</td>
                    <td>{{$event->time}}</td>
                    <td>{{$event->modality}}</td>
                    <td>{{$event->status}}</td>
                    <td>{{$event->type}}</td>
                    <td>{{$event->target_audience}}</td>
                    <td>{{$event->vacancies}}</td>
                    <td>{{$event->social_vacancies}}</td>
                    <td>{{$event->regular_vacancies}}</td>
                    <td>{{$event->material}}</td>
                    <td>{{$event->interest_area}}</td>
                    <td>{{$event->price}}</td>
                    <td class="actions-form">
                        @if (Auth::user()->can('viewVoluntary', $user) || Auth::user()->can('viewAdmin', $user))
                            <form action="/events/{{ $event->id }}/edit" method="GET">
                                @csrf
                                @method('GET')
                                <button class="btn" type="submit">Editar</button>
                            </form>
                        @endif

                        @if (Auth::user()->can('viewAdmin', $user))
                            <form action="/events/{{ $event->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn" type="submit" onclick="return confirmDelete()">Apagar</button>
                            </form>
                        @endif

                        @can('viewBeneficiary', $user)
                            <form action="/inscriptions" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" value="{{$event -> id}}" name="eventId" id="eventId">
                                <button class="btn" type="submit" onclick="return confirmInscription()">Se Inscrever</button>
                            </form> 
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbod>
    </table>
</div>
@endsection