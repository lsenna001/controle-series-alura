<form action="{{ $action }}" method="post">
    @csrf

    @isset($nome)
    @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" 
        name="nome" 
        id="nome" 
        class="form-control"
        @isset($nome)value="{{ $nome }}"@endisset>
    </div>
    <button class="btn btn-primary" type="submit">Adicionar</button>
</form>