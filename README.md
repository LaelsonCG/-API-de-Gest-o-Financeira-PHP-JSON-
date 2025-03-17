### **📌 API de Gestão Financeira (PHP + JSON)**
Uma API simples em PHP para gerenciar revendedores, produtos e clientes usando um arquivo JSON.

### **📌 Exemplos de Requisição e Retorno**  

---

#### **1️⃣ Login**
📌 **Requisição (POST `/api.php?acao=login`)**
```json
{
  "usuario": "admin",
  "senha": "senha_admin"
}
```
📌 **Retorno**
```json
{
  "token": "abcdef123456"
}
```

---

#### **2️⃣ Cadastrar Revendedor (POST `/api.php`)**
📌 **Requisição**
```json
{
  "token": "abcdef123456",
  "acao": "add_revendedor",
  "nome": "Revendedor X",
  "usuario": "revendedorx",
  "senha": "senha123"
}
```
📌 **Retorno**
```json
{
  "status": "sucesso"
}
```

---

#### **3️⃣ Cadastrar Produto (POST `/api.php`)**
📌 **Requisição**
```json
{
  "token": "abcdef123456",
  "acao": "add_produto",
  "nome": "Produto Y",
  "valor": 200.00
}
```
📌 **Retorno**
```json
{
  "status": "sucesso"
}
```

---

#### **4️⃣ Cadastrar Cliente (POST `/api.php`)**
📌 **Requisição**
```json
{
  "token": "abcdef123456",
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
📌 **Retorno**
```json
{
  "status": "sucesso"
}
```

**⚠ Se o usuário logado for revendedor, o campo `revendedor` será preenchido automaticamente.**

---

#### **5️⃣ Obter Dados (GET `/api.php`)**
📌 **Requisição**  
**Obter um cliente específico:**  
```
GET /api.php?tipo=cliente&usuario=cliente1
```
📌 **Retorno**
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

📌 **Requisição**  
**Obter lista de revendedores:**  
```
GET /api.php?tipo=revendedor
```
📌 **Retorno**
```json
[
  {
    "nome": "Revendedor 1",
    "usuario": "revendedor1"
  },
  {
    "nome": "Revendedor 2",
    "usuario": "revendedor2"
  }
]
```

📌 **Requisição**  
**Obter lista de produtos:**  
```
GET /api.php?tipo=produtos
```
📌 **Retorno**
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

#### **⚠ Erros Possíveis**
📌 **Requisição Inválida**
```json
{
  "erro": "Ação inválida"
}
```
📌 **Usuário não autenticado**
```json
{
  "erro": "Acesso negado"
}
```
📌 **Cliente não encontrado**
```json
{
  "erro": "Cliente não encontrado"
}
```
📌 **Permissão Negada**
```json
{
  "erro": "Permissão negada"
}
```
## 🏆 **Licença**
Este projeto é de código aberto sob a licença MIT.

---
