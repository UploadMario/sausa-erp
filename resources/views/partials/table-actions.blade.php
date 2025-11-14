<div class="d-flex gap-2">

    {{-- Ver --}}
    <a href="{{ $show }}" class="btn btn-sm btn-info text-white" title="Ver">
        <i class="fa-solid fa-eye"></i>
    </a>

    {{-- Editar --}}
    <a href="{{ $edit }}" class="btn btn-sm btn-warning text-white" title="Editar">
        <i class="fa-solid fa-pen"></i>
    </a>

    {{-- Eliminar --}}
    <form action="{{ $delete }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este registro?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" title="Eliminar">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>

</div>
