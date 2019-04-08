@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Adicionar Nova Lista</h2>
            <form action="/store" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control name_add" id="name" aria-describedby="nameHelp" name="name" placeholder="Digite o nome da lista">
                    <small id="nameHelp" class="form-text text-muted">Entre com o nome da sua nova lista!</small>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                </div>
                <button class="btn btn-primary ml-1 add_submit" type="submit">ADICIONAR</button>
            </form>
        </div>
    </div>
</div>
@endsection
