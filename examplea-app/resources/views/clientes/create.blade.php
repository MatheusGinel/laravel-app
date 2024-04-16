<h3>Novo Cliente<h3>
 <form action="{{route('clientes.store')}}" method='POST'>
     @csrf
     <input type='text' name="nome"></input>
     <input type="submit" value = 'salvar'></input>
 </form>   
