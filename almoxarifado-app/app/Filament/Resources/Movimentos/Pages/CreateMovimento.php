<?php

namespace App\Filament\Resources\Movimentos\Pages;

use App\Filament\Resources\Movimentos\MovimentoResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Produto;
use Filament\Notifications\Notification;

class CreateMovimento extends CreateRecord
{
    protected static string $resource = MovimentoResource::class;

    /**
     * Verifica se há estoque suficiente antes de criar um movimento.
     */
    protected function beforeCreate(): void
    {
        $data = $this->data;

        $produto = Produto::find($data['produto_id']);
        $quantidade = $data['quantidade'];
        $tipo = $data['tipo'];

        // Verificar se é uma saída e se o estoque é suficiente
        if ($tipo === 's' && $quantidade > $produto->estoque) {

            Notification::make()
                ->danger()
                ->title('Estoque Insuficiente!')
                ->body(
                    "O estoque de {$produto->nome} é de apenas {$produto->estoque}, mas você tentou retirar {$quantidade}."
                )
                ->send();

            $this->halt();
        }
    }

    /**
     * Atualiza o estoque após a criação do movimento.
     */
    protected function afterCreate(): void
    {
        $movimento = $this->getRecord(); // Movimento criado
        $produto = $movimento->produto;  // Produto relacionado

        if ($movimento->tipo === 'e') {
            // Entrada: aumenta o estoque
            $produto->increment('estoque', $movimento->quantidade);
        } else {
            // Saída: diminui o estoque
            $produto->decrement('estoque', $movimento->quantidade);
        }
    }
}