<h3>Editar Cliente Cliente<h3>
 <form action="{{route('clientes.update', $cliente['id'])}}" method='POST'>
     @csrf
     <!-- para poder mandar um formulário com requisisção put -->
     @method('PUT')
     <input type='text' name="nome" value = "{{$cliente['nome']}}"></input>
     <input type="submit" value = 'salvar'></input>
 </form>
