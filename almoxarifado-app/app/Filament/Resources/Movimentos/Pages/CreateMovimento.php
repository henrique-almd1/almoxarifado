<?php

namespace App\Filament\Resources\Movimentos\Pages;

use App\Filament\Resources\Movimentos\MovimentoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMovimento extends CreateRecord
{
    protected static string $resource = MovimentoResource::class;

    /**
    * verifica se há estoque suficiente antes de criar um movimento.
    *
    * esse hook é executado antes da gravação do registro. Quando o
    * movimento for do tipo saída ('s'), o sistema valida se a quantidade
    * solicitada é menor ou igual ao estoque disponível do produto.
    * Caso não haja estoque suficiente, uma notificação é exibida ao usuário
    * e a criação do movimento é interrompida.
    *
    * @var array    $data        Dados recebidos do formulário.
    * @var Produto  $produto     Produto selecionado para o movimento.
    * @var int      $quantidade  Quantidade informada para movimentação.
    * @var string   $tipo        Tipo do movimento ('e' para entrada ou 's' para saída).
    *
    * @return void
    */
    
    // Hook - Verificar se há estoque suficiente para saída
protected function beforeCreate(): void
    {
    // Recebe a lista de produtos
        $data = $this->data;

    // Selecionando o produto, quantidade e tipo pelo ID recebido
        $produto = Produto::find($data['produto_id']);
        $quantidade = $data['quantidade'];
        $tipo = $data['tipo'];

    // Verificar se é uma saída e se o estoque é suficiente
        if ($tipo === 's' && $quantidade > $produto->estoque) {

        // Notificar o usuário sobre o estoque insuficiente
            Notification::make()
                ->danger()
                ->title('Estoque Insuficiente!')
                ->body(
                    "O estoque de {$produto->nome} é de apenas {$produto->estoque}, mas você tentou retirar {$quantidade}."
                )
                ->send();

        // Impede a criação do movimento
            $this->halt();
        }
    }
}
