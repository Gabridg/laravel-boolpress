@extends('layouts.app')

@section('content')

<header>
    <div class="container d-flex align-items-center justify-content-between mb-2">
        <h1 class="text-center">TUTTI I POST</h1>
        <a href="{{ route('admin.posts.create') }}" class=" btn btn-sm btn-success font-weight-bold"><i class="fa-solid fa-circle-plus"></i>  Crea Post</a>
    </div>
</header>
<main>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Autore</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tags</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il</th>
                <th scope="col">Modificato il</th>
                <th scope="col" class="text-center">Interazioni</th>
              </tr>
            </thead>
            <tbody>
             @forelse($posts as $post)
             <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>
                    @if($post->author)
                        {{$post->author->name}}
                    @else
                        Anonimo
                    @endif
                    </td>
                <td>@if($post->category)<span class="badge badge-pill badge-{{ $post->category->color ?? 'green'}}">{{ $post->category->label }}</span> @else Nessuna @endif</td>
                <td>@forelse($post->tags as $tag) <span class="badge" style="border: 2px solid {{ $tag->color }}">{{ $tag->label }}</span> @empty Nessun Tag @endforelse</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td class="d-flex">
                    <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-sm btn-primary font-weight-bold mr-2"><i class="fa-regular fa-eye"></i>  Vedi</a>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning font-weight-bold mr-2"><i class="fa-regular fa-pen-to-square"></i>  Modifica</a>

                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger font-weight-bold" type="submit"><i class="fa-regular fa-trash-can"></i>  Elimina</button>
                    </form>
                </td>
             </tr>
             @empty
             <tr>
                <td colspan="6">
                    <h2>Non ci sono post</h2>
                </td>
             </tr>
             @endforelse
            </tbody>
          </table>

    </div>
</main>
@endsection