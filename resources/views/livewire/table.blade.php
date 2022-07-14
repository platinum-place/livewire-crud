<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descripción</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Costo</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($json as $key => $item)
    <tr>
      <th scope="row"> {{ $key }}</th>
      <td>{{ $item['descripcion'] }}</td>
      <td>{{ $item['cantidad'] }}</td>
      <td>${{ $item['costo'] }}</td>
      <td>
        <a href="{{ url('detalles', $key) }}" class="btn btn-primary btn-sm">Editar</a>
        |
        <button class="btn btn-danger btn-sm" wire:click="delete({{ $key }})">Eliminar</button>
      </td>
    </tr>

    @php
    $cantidad+=$item['cantidad'];
    $total+=$item['costo'];
    @endphp
    @empty
    <div class="alert alert-danger" role="alert">
      No se encuentran registros
    </div>
    @endforelse
  </tbody>
  <tfoot>
    <tr>
      <th scope="col">Total</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">{{$cantidad}} unidades</th>
      <th scope="col">${{$total}}</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </tfoot>
</table>