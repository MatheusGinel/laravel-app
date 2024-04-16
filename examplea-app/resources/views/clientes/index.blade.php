<h1>Clientes:</h1> | <a href="{{route('clientes.create')}}">Novo Cliente</a>
<ol>
    @foreach ($clientes as $c)
    <li>{{$c['nome']}} |
    <a href="{{route('clientes.edit', $c['id'])}}">Editar</a>
    <a href="{{route('clientes.show', $c['id'])}}">Informações</a>
    <form action="{{route('clientes.destroy', $c['id'])}}" method='POST'>
     @csrf
     <!-- para poder mandar um formulário com requisisção delete -->
     @method('DELETE')
     <input type="submit" value = 'Apagar'></input>
 </form>

    </li>
    @endforeach
</ol>
