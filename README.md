### **📌 API de Gestão Financeira (PHP + JSON)**
Uma API simples em PHP para gerenciar revendedores, produtos e clientes usando um arquivo JSON.

## 🚀 **Requisitos**
- PHP 7.4+
- Servidor local (Apache/Nginx) ou `php -S localhost:8000`
- Arquivo `dados.json` na mesma pasta que `api.php`

---

## 📁 **Estrutura do Projeto**
```
/projeto
  ├── api.php
  ├── dados.json
  ├── README.md
```

---

## ⚙ **Configuração do Banco de Dados**
A API usa um arquivo `dados.json` para armazenar as informações.

**Estrutura do `dados.json`**:
```json
{
  "admin": {
    "usuario": "admin",
    "senha": "senha_admin"
  },
  "revendedores": [],
  "produtos": [],
  "clientes": []
}
```

Se o arquivo não existir, crie um novo e copie essa estrutura.

---

## 🌍 **Rotas Disponíveis**
### **🔹 GET - Obter Informações**
| Endpoint | Parâmetros | Descrição |
|----------|-----------|-----------|
| `GET /api.php?tipo=cliente&usuario={usuario}` | `usuario` (opcional) | Retorna os dados de um cliente específico. |
| `GET /api.php?tipo=revendedor` | - | Retorna a lista de revendedores cadastrados. |
| `GET /api.php?tipo=produtos` | - | Retorna a lista de produtos cadastrados. |

**Exemplo de Resposta (Cliente)**:
```json
{
  "nome": "Cliente 1",
  "usuario": "cliente1",
  "produto_contratado": "Produto A",
  "data_contratacao": "2023-10-27",
  "vencimento": "2024-10-27",
  "revendedor": "revendedor1"
}
```

---

### **🔹 POST - Cadastrar Dados**
- **Formato:** Enviar `application/json` no corpo da requisição.

#### **1️⃣ Cadastrar um Revendedor**
| Campo | Tipo | Obrigatório | Descrição |
|-------|------|------------|-----------|
| `acao` | `string` | ✅ | Deve ser `"add_revendedor"`. |
| `nome` | `string` | ✅ | Nome do revendedor. |
| `usuario` | `string` | ✅ | Usuário/email do revendedor. |
| `senha` | `string` | ✅ | Senha do revendedor. |

📌 **Exemplo de JSON para cadastrar um revendedor:**
```json
{
  "acao": "add_revendedor",
  "nome": "Revendedor X",
  "usuario": "revendedorx",
  "senha": "senha123"
}
```

---

#### **2️⃣ Cadastrar um Produto**
| Campo | Tipo | Obrigatório | Descrição |
|-------|------|------------|-----------|
| `acao` | `string` | ✅ | Deve ser `"add_produto"`. |
| `nome` | `string` | ✅ | Nome do produto. |
| `valor` | `float` | ✅ | Valor do produto. |

📌 **Exemplo de JSON para cadastrar um produto:**
```json
{
  "acao": "add_produto",
  "nome": "Produto Y",
  "valor": 200.00
}
```

---

#### **3️⃣ Cadastrar um Cliente**
| Campo | Tipo | Obrigatório | Descrição |
|-------|------|------------|-----------|
| `acao` | `string` | ✅ | Deve ser `"add_cliente"`. |
| `nome` | `string` | ✅ | Nome do cliente. |
| `usuario` | `string` | ✅ | Usuário/email do cliente. |
| `senha` | `string` | ✅ | Senha do cliente. |
| `produto` | `string` | ✅ | Produto contratado. |
| `data_contratacao` | `string` | ✅ | Data de contratação (YYYY-MM-DD). |
| `vencimento` | `string` | ✅ | Data de vencimento (YYYY-MM-DD). |
| `revendedor` | `string` | ✅ | Usuário do revendedor responsável. |

📌 **Exemplo de JSON para cadastrar um cliente:**
```json
{
  "acao": "add_cliente",
  "nome": "Cliente Y",
  "usuario": "clienteY",
  "senha": "senhaY",
  "produto": "Produto X",
  "data_contratacao": "2025-03-17",
  "vencimento": "2026-03-17",
  "revendedor": "revendedorx"
}
```

---

### **📡 Testando a API**
#### **🔹 Usando cURL**
```sh
curl -X POST http://localhost/api.php \
-H "Content-Type: application/json" \
-d '{"acao": "add_revendedor", "nome": "Revendedor Z", "usuario": "revendedorz", "senha": "senha123"}'
```

#### **🔹 Usando Postman**
1. Selecione `POST`.
2. Digite `http://localhost/api.php`.
3. Vá em **Body** > **raw**, selecione **JSON**, e cole o JSON de exemplo.
4. Clique em **Send**.

---

## ⚠ **Tratamento de Erros**
A API retorna mensagens em JSON para indicar erros:
| Código | Mensagem |
|--------|---------|
| `{"erro": "Cliente não encontrado"}` | O usuário não existe. |
| `{"erro": "Parâmetro 'tipo' inválido"}` | Parâmetro inválido em requisições GET. |
| `{"erro": "Ação inválida"}` | Ação inválida em requisições POST. |
| `{"erro": "Método inválido"}` | Método HTTP não permitido. |

---

## 🎯 **To-Do**
- [ ] Implementar autenticação com `Bearer Token`
- [ ] Adicionar edição e remoção de registros
- [ ] Criar um dashboard para visualizar os dados

---

## 🏆 **Licença**
Este projeto é de código aberto sob a licença MIT.

---
