### **📌 API de Gestão Financeira (PHP + JSON)**
Uma API simples em PHP para gerenciar revendedores, produtos e clientes usando um arquivo JSON.

## URL

`https://controle-financeiro.clickhost.cloud/api.php`

## Requisições Permitidas

### Métodos

- **GET**: Para obter informações.
- **POST**: Para cadastro, edição e exclusão.

### CORS
A política de CORS está desativada, permitindo acesso de qualquer domínio.

---

## Autenticação

### Login (POST)

**URL**: `/api.php?acao=login`

**Descrição**: Realiza o login de um usuário (admin ou revendedor).

### Corpo da Requisição:

```json
{
  "usuario": "usuario_aqui",
  "senha": "senha_aqui"
}
```

### Resposta:

Se o login for bem-sucedido:

```json
{
  "token": "token_aqui"
}
```

Se o login falhar:

```json
{
  "erro": "Usuário ou senha inválidos"
}
```

---

## Ações (POST)

### 1. Cadastro de Revendedor (admin)
**URL**: `/api.php?acao=add_revendedor`

**Descrição**: Admin pode cadastrar novos revendedores.

### Corpo da Requisição:

```json
{
  "token": "token_aqui",
  "nome": "Nome do Revendedor",
  "usuario": "usuario_revendedor",
  "senha": "senha_revendedor"
}
```

### Resposta:

```json
{
  "status": "sucesso"
}
```

### 2. Edição de Revendedor (admin)
**URL**: `/api.php?acao=edit_revendedor`

**Descrição**: Admin pode editar informações de um revendedor.

### Corpo da Requisição:

```json
{
  "token": "token_aqui",
  "usuario": "usuario_revendedor",
  "nome": "Novo Nome",
  "senha": "nova_senha"
}
```

### Resposta:

```json
{
  "status": "sucesso"
}
```

### 3. Exclusão de Revendedor (admin)
**URL**: `/api.php?acao=delete_revendedor`

**Descrição**: Admin pode excluir um revendedor.

### Corpo da Requisição:

```json
{
  "token": "token_aqui",
  "usuario": "usuario_revendedor"
}
```

### Resposta:

```json
{
  "status": "sucesso"
}
```

---

### 4. Cadastro de Produto (admin)
**URL**: `/api.php?acao=add_produto`

**Descrição**: Admin pode cadastrar novos produtos.

### Corpo da Requisição:

```json
{
  "token": "token_aqui",
  "nome": "Nome do Produto",
  "valor": 100.00
}
```

### Resposta:

```json
{
  "status": "sucesso"
}
```

### 5. Edição de Produto (admin)
**URL**: `/api.php?acao=edit_produto`

**Descrição**: Admin pode editar o valor de um produto.

### Corpo da Requisição:

```json
{
  "token": "token_aqui",
  "nome": "Nome do Produto",
  "valor": 120.00
}
```

### Resposta:

```json
{
  "status": "sucesso"
}
```

### 6. Exclusão de Produto (admin)
**URL**: `/api.php?acao=delete_produto`

**Descrição**: Admin pode excluir um produto.

### Corpo da Requisição:

```json
{
  "token": "token_aqui",
  "nome": "Nome do Produto"
}
```

### Resposta:

```json
{
  "status": "sucesso"
}
```

---

### 7. Cadastro de Cliente (admin ou revendedor)
**URL**: `/api.php?acao=add_cliente`

**Descrição**: Admin ou revendedor pode cadastrar novos clientes. Revendedores só podem cadastrar clientes sob sua responsabilidade.

### Corpo da Requisição:

```json
{
  "token": "token_aqui",
  "nome": "Nome do Cliente",
  "usuario": "usuario_cliente",
  "senha": "senha_cliente",
  "produto": "Produto contratado",
  "data_contratacao": "2023-10-27",
  "vencimento": "2024-10-27",
  "revendedor": "usuario_revendedor"
}
```

### Resposta:

```json
{
  "status": "sucesso"
}
```

### 8. Edição de Cliente (admin ou revendedor)
**URL**: `/api.php?acao=edit_cliente`

**Descrição**: Admin ou revendedor pode editar informações de um cliente. Revendedores só podem editar clientes sob sua responsabilidade.

### Corpo da Requisição:

```json
{
  "token": "token_aqui",
  "usuario": "usuario_cliente",
  "nome": "Novo Nome",
  "senha": "nova_senha",
  "produto": "Produto contratado",
  "data_contratacao": "2023-10-27",
  "vencimento": "2024-10-27"
}
```

### Resposta:

```json
{
  "status": "sucesso"
}
```

### 9. Exclusão de Cliente (admin ou revendedor)
**URL**: `/api.php?acao=delete_cliente`

**Descrição**: Admin ou revendedor pode excluir um cliente. Revendedores só podem excluir clientes sob sua responsabilidade.

### Corpo da Requisição:

```json
{
  "token": "token_aqui",
  "usuario": "usuario_cliente"
}
```

### Resposta:

```json
{
  "status": "sucesso"
}
```

---

## Obter Dados (GET)

### 1. Obter Cliente
**URL**: `/api.php?tipo=cliente&usuario=usuario_cliente`

**Descrição**: Obtém as informações de um cliente.

### Resposta:

```json
{
  "nome": "Nome do Cliente",
  "usuario": "usuario_cliente",
  "senha": "senha_cliente",
  "produto_contratado": "Produto contratado",
  "data_contratacao": "2023-10-27",
  "vencimento": "2024-10-27",
  "revendedor": "usuario_revendedor"
}
```

### 2. Obter Revendedores
**URL**: `/api.php?tipo=revendedor`

**Descrição**: Obtém a lista de todos os revendedores cadastrados.

### Resposta:

```json
[
  {
    "nome": "Revendedor 1",
    "usuario": "revendedor1",
    "senha": "senha1"
  },
  {
    "nome": "Revendedor 2",
    "usuario": "revendedor2",
    "senha": "senha2"
  }
]
```

### 3. Obter Produtos
**URL**: `/api.php?tipo=produtos`

**Descrição**: Obtém a lista de todos os produtos cadastrados.

### Resposta:

```json
[
  {
    "nome": "Produto A",
    "valor": 99.99
  },
  {
    "nome": "Produto B",
    "valor": 199.99
  }
]
```

---

## Respostas de Erro

1. **Acesso negado**:

```json
{
  "erro": "Acesso negado"
}
```

2. **Usuário ou senha inválidos**:

```json
{
  "erro": "Usuário ou senha inválidos"
}
```

3. **Parâmetro inválido**:

```json
{
  "erro": "Parâmetro 'tipo' inválido"
}
```

4. **Método inválido**:

```json
{
  "erro": "Método inválido"
}
```

---

### Observações
- **Revendedores** só podem cadastrar, editar e excluir clientes sob sua responsabilidade.
- **Admin** pode realizar todas as operações de cadastro, edição e exclusão de **revendedores**, **produtos** e **clientes**.
- **Token**: Sempre que uma ação de modificação for realizada, é necessário fornecer um **token** de autenticação válido.
