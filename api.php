<?php
header('Content-Type: application/json');

function lerDados() {
    return json_decode(file_get_contents('dados.json'), true);
}

function salvarDados($dados) {
    file_put_contents('dados.json', json_encode($dados, JSON_PRETTY_PRINT));
}

$dados = lerDados();
$metodo = $_SERVER['REQUEST_METHOD'];

// ** GET: Buscar informações **
if ($metodo === 'GET') {
    $tipo = $_GET['tipo'] ?? '';

    if ($tipo === 'cliente') {
        $usuario = $_GET['usuario'] ?? '';
        foreach ($dados['clientes'] as $cliente) {
            if ($cliente['usuario'] === $usuario) {
                echo json_encode($cliente);
                exit;
            }
        }
        echo json_encode(["erro" => "Cliente não encontrado"]);
    }

    elseif ($tipo === 'revendedor') {
        echo json_encode($dados['revendedores']);
    }

    elseif ($tipo === 'produtos') {
        echo json_encode($dados['produtos']);
    }

    else {
        echo json_encode(["erro" => "Parâmetro 'tipo' inválido"]);
    }
}

// ** POST: Cadastrar dados **
elseif ($metodo === 'POST') {
    $json = json_decode(file_get_contents('php://input'), true);
    $acao = $json['acao'] ?? '';

    if ($acao === 'add_revendedor') {
        $novo_revendedor = [
            "nome" => $json['nome'],
            "usuario" => $json['usuario'],
            "senha" => password_hash($json['senha'], PASSWORD_DEFAULT)
        ];
        $dados['revendedores'][] = $novo_revendedor;
    }

    elseif ($acao === 'add_produto') {
        $novo_produto = [
            "nome" => $json['nome'],
            "valor" => floatval($json['valor'])
        ];
        $dados['produtos'][] = $novo_produto;
    }

    elseif ($acao === 'add_cliente') {
        $novo_cliente = [
            "nome" => $json['nome'],
            "usuario" => $json['usuario'],
            "senha" => password_hash($json['senha'], PASSWORD_DEFAULT),
            "produto_contratado" => $json['produto'],
            "data_contratacao" => $json['data_contratacao'],
            "vencimento" => $json['vencimento'],
            "revendedor" => $json['revendedor']
        ];
        $dados['clientes'][] = $novo_cliente;
    }

    else {
        echo json_encode(["erro" => "Ação inválida"]);
        exit;
    }

    salvarDados($dados);
    echo json_encode(["status" => "sucesso"]);
}

else {
    echo json_encode(["erro" => "Método inválido"]);
}
