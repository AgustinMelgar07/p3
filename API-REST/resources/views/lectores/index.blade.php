<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Lectores</title>
</head>
<body>
    <h1>Registrar Lector</h1>

    <form method="POST" action="{{ isset($lector) ? route('lectores.update', $lector) : route('lectores.store') }}">
        @csrf
        @if(isset($lector))
            @method('PUT')
        @endif

        <input type="text" name="nombre" placeholder="Nombre" value="{{ $lector->nombre ?? '' }}" required>
        <input type="text" name="apellido" placeholder="Apellido" value="{{ $lector->apellido ?? '' }}" required>
        <input type="email" name="email" placeholder="Email" value="{{ $lector->email ?? '' }}" required>
        <input type="text" name="direccion" placeholder="Dirección" value="{{ $lector->direccion ?? '' }}" required>
        <input type="text" name="telefono" placeholder="Teléfono" value="{{ $lector->telefono ?? '' }}" required>
        <button type="submit">{{ isset($lector) ? 'Actualizar' : 'Guardar' }}</button>
    </form>

    <h2>Lista de Lectores</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lectores as $l)
            <tr>
                <td>{{ $l->nombre }}</td>
                <td>{{ $l->apellido }}</td>
                <td>{{ $l->email }}</td>
                <td>{{ $l->direccion }}</td>
                <td>{{ $l->telefono }}</td>
                <td>
                    <a href="{{ route('lectores.edit', $l) }}">Editar</a>
                    <form method="POST" action="{{ route('lectores.destroy', $l) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este lector?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
