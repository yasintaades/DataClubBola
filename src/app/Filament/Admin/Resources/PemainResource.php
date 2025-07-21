<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PemainResource\Pages;
use App\Filament\Admin\Resources\PemainResource\RelationManagers;
use App\Models\Pemain;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemainResource extends Resource
{
    protected static ?string $model = Pemain::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('position')->required(),
            Forms\Components\TextInput::make('number')->numeric()->required(),
            Forms\Components\DatePicker::make('birthdate')->required(),
            Forms\Components\Select::make('club_id')
                ->relationship('club', 'name')
                ->required(),
            Forms\Components\Textarea::make('medical_record')
                ->label('Rekam Medis')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('position'),
            Tables\Columns\TextColumn::make('number'),
            Tables\Columns\TextColumn::make('birthdate'),
            Tables\Columns\TextColumn::make('club.name')->label('Klub'), // hasil dekripsi
            Tables\Columns\TextColumn::make('medical_record')
            ->label('Rekam Medis')
            ->getStateUsing(function ($record) {
                $encrypted = $record->getRawOriginal('medical_record');
                return $encrypted
                    ? substr($encrypted, 0, 10) . '...' . substr($encrypted, -10)
                    : '-';
            })
            ->tooltip(fn ($record) => $record->getRawOriginal('medical_record')) // tampilkan seluruh isi saat hover
            ->wrap()
            ->toggleable(true),

        ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListPemains::route('/'),
            'create' => Pages\CreatePemain::route('/create'),
            'edit' => Pages\EditPemain::route('/{record}/edit'),
        ];
    }
}
