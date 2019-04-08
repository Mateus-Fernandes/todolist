@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{$todo->name}}</h2>
            <div id="todo" data-todoid={{$todo->id}}></div>
        </div>
        <div class="share">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{route('todo.editShare', ['id' => $todo->id])}}" target="_blank" class="ico fb"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/home?status=Social%20Share%20by%20%40supahfunk%20{{route('todo.editShare', ['id' => $todo->id])}}" target="_blank" class="ico tw"><i class="fab fa-twitter"></i></a>
            <a href="mailto:someone@example.com?Subject=Edite%20minha%20lista&Body=Ola%20aqui%20esta%20o%20link%20editável%20da%20minha%20lista:%20{{route('todo.editShare', ['id' => $todo->id])}}" target="_blank" class="ico gp"><i class="fas fa-mail-bulk"></i></a>
            <span class="text"><em>COMPARTILHAR</em></span>
            <svg class="ico-share"><use xlink:href="#ico-share"></use></svg>
          </div>
          <div class="share">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('todo.editShare', ['id' => $todo->id])}}" target="_blank" class="ico fb"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/home?status=Social%20Share%20by%20%40supahfunk%20{{route('todo.editShare', ['id' => $todo->id])}}" target="_blank" class="ico tw"><i class="fab fa-twitter"></i></a>
            <a href="mailto:someone@example.com?Subject=Edite%20minha%20lista&Body=Ola%20aqui%20esta%20o%20link%20editável%20da%20minha%20lista:%20{{route('todo.editShare', ['id' => $todo->id])}}" target="_blank" class="ico gp"><i class="fas fa-mail-bulk"></i></a>
            <span class="text"><em>COMPARTILHAR</em></span>
            <svg class="ico-share"><use xlink:href="#ico-share"></use></svg>
          </div>
          
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
          <symbol id="ico-share" x="0px" y="0px"
           viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
            <g>
          <path fill="#FFFFFF" d="M13.26,10.387c-0.781,0-1.484,0.328-1.982,0.854L5.445,8.385c0.02-0.133,0.034-0.27,0.034-0.41
                  c0-0.136-0.013-0.269-0.032-0.399l5.823-2.824c0.5,0.529,1.205,0.861,1.99,0.861c1.514,0,2.74-1.227,2.74-2.74
                  s-1.227-2.74-2.74-2.74c-1.513,0-2.739,1.227-2.739,2.74c0,0.136,0.013,0.269,0.032,0.399L4.73,6.097
                  c-0.5-0.529-1.205-0.861-1.99-0.861C1.227,5.236,0,6.462,0,7.976c0,1.513,1.227,2.739,2.74,2.739c0.781,0,1.484-0.328,1.983-0.854
                  l5.832,2.855c-0.021,0.134-0.035,0.27-0.035,0.41c0,1.514,1.227,2.739,2.74,2.739S16,14.641,16,13.127S14.773,10.387,13.26,10.387z
                  "/></g>
            </symbol></svg>
    </div>
</div>
@endsection
