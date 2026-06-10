<?php

namespace App\Filament\Resources\Movimentos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class MovimentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // TROQUE O TextInput POR Select AQUI:
                Select::make('produto_id')
                    ->label('Produto')
                    ->relationship(name: 'produto', titleAttribute: 'nome')
                    ->searchable() // Permite pesquisar pelo nome
                    ->preload()    // Carrega a lista automaticamente
                    ->required(),

                // TextInput::make('produto_id')
                //     ->required()
                //     ->numeric(),

            ]);
    }
}