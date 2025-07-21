<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KlubResource\Pages;
use App\Filament\Admin\Resources\KlubResource\RelationManagers;
use App\Models\Klub;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KlubResource extends Resource
{
    protected static ?string $model = Klub::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('stadium')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('bank_account_number')
                    ->label('Nomor Rekening')
                    ->required()
                    ->maxLength(255),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('stadium')->sortable(),
                Tables\Columns\TextColumn::make('city')->sortable(),
                Tables\Columns\TextColumn::make('bank_account_number')
                ->label('Rekening')
                ->formatStateUsing(fn ($state) => '••••••' . substr($state, -4))
                ->sortable()
                ->toggleable(),


            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKlubs::route('/'),
            'create' => Pages\CreateKlub::route('/create'),
            'edit' => Pages\EditKlub::route('/{record}/edit'),
        ];
    }
}
