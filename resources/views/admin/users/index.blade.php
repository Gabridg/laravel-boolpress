@extends('layouts.app')

@section('content')
<header>
    <div class="container d-flex align-items-center justify-content-between mb-2">
        <h1 class="text-center">TUTTI GLI UTENTI</h1>
    </div>
</header>
<main>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Nome Completo</th>
                <th scope="col">Età</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Telefono</th>
                <th scope="col" class="text-center">Post creati</th>
              </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <th scope="col">{{ $user->id }}</th>
                    <td >{{ $user->name }}</td>
                    <td >{{ $user->email }}</td>
                    <td >{{ $user->detail->getFullName() }}</td>
                    <td >{{ $user->detail->getAge() }}</td>
                    <td >{{ $user->detail->address }}</td>
                    <td >{{ $user->detail->phone }}</td>
                    <td class="text-center">{{ count($user->posts) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">
                        <h2>Nessun utente registrato</h2>
                    </td>
                </tr>
                @endforelse
            </tbody>
</main>
@endsection