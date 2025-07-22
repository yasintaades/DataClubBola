<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KeuanganResource\Pages;
use App\Filament\Admin\Resources\KeuanganResource\RelationManagers;
use App\Models\Keuangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Crypt; 

class KeuanganResource extends Resource
{
    protected static ?string $model = Keuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('club_id')
                ->relationship('club', 'name')
                ->required(),

                Forms\Components\DatePicker::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->required(),

                Forms\Components\Select::make('type')
                    ->options([
                        'income' => 'Pemasukan',
                        'expense' => 'Pengeluaran',
                    ])
                    ->label('Tipe')
                    ->required(),

                Forms\Components\TextInput::make('category')
                    ->label('Kategori')
                    ->required(),

                Forms\Components\TextInput::make('amount')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi (Terenkripsi)')
                    ->required()
                    ->columnSpanFull(),
                    // ->dehydrateStateUsing(fn ($state) => Crypt::encryptString($state))
                    // ->afterStateHydrated(fn ($component, $state) => 
                    //     $component->state(Crypt::decryptString($state))
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('club.name')->label('Klub'),
                Tables\Columns\TextColumn::make('transaction_date')->label('Tanggal'),
                Tables\Columns\TextColumn::make('type')->label('Tipe')->badge(),
                Tables\Columns\TextColumn::make('category')->label('Kategori'),
                Tables\Columns\TextColumn::make('amount')->label('Jumlah')->money('IDR'),
               Tables\Columns\TextColumn::make('description')
            ->label('Deskripsi')
            ->getStateUsing(function ($record) {
                $encrypted = $record->getRawOriginal('description');
                return $encrypted
                    ? substr($encrypted, 0, 10) . '...' . substr($encrypted, -10)
                    : '-';
            })
            ->tooltip(fn ($record) => $record->getRawOriginal('description')) // tampilkan seluruh isi saat hover
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
            'index' => Pages\ListKeuangans::route('/'),
            'create' => Pages\CreateKeuangan::route('/create'),
            'edit' => Pages\EditKeuangan::route('/{record}/edit'),
        ];
    }
}
