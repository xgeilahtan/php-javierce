<h1>Categorias</h1>
<a href="{{ route('categorias.create') }}">Nova Categoria</a>
<ul>
@foreach ($categorias as $cat)
    <li>
        <img src="{{ asset($cat->imagem) }}" width="150">
        <br>
        {{ $cat->nome }}
        
        <a href="{{ route('categorias.edit', $cat) }}">Editar</a>
        <form action="{{ route('categorias.destroy', $cat) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</button>
        </form>
    </li>
@endforeach
</ul>
