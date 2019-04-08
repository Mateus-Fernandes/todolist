@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Todos Cadastrados</h2>
            <div class="row">
                <a class="ml-auto" href="/addtodo"><button class="btn btn-success btn_add_new_todo">ADICIONAR NOVA LISTA</button></a>
            </div>
            
            @if(session()->has('alert-success'))
                <div class="alert alert-success">
                    {{ session()->get('alert-success') }}
                </div>
            @endif            
            <div class="todos_list mt-4">
                @forelse ($todo as $t)
                    <div class="todo_item d-flex justify-content-between align-items-center">
                            <div class="name_todo">{{ $t->name }}</div>
                            <div class="actions_todo d-flex">
                                <a href="/{{ $t->id }}/edit"><button class="btn trash_button mr-1"><i class="fas fa-edit"></i></button></a>
                                <form action="/{{ $t->id }}/destroy" method="POST">
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                    <button class="btn trash_button mr-1" type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                
                            </div>
                    </div>
                @empty
                    <p>Você ainda não possui nenhuma lista cadastrada.</p>
                @endforelse                
            </div>
        </div>
    </div>
</div>
@endsection
