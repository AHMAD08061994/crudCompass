<h1>Novo Usuário</h1>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label>Cargo:</label>
        <input type="text" name="cargo" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail:</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

    
</form>