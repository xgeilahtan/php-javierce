<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <ul>
        @foreach ($produtos as $produto)
            <li>{{ $produto['nome'] }} - R$ {{ $produto['preco'] }}</li>
        @endforeach
    </ul>
</body>
</html>