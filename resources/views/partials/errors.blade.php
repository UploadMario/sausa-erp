@if($errors->any())
    <div class="alert alert-danger shadow-sm">
        <h6 class="fw-bold mb-2">
            <i class="fa-solid fa-circle-exclamation me-2"></i>
            Se encontraron algunos errores:
        </h6>

        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
