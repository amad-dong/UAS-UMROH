<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KepulanganUmrohResource\Pages;
use App\Models\KepulanganUmroh;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;

class KepulanganUmrohResource extends Resource
{
    protected static ?string $model = KepulanganUmroh::class;

    protected static ?string $navigationIcon = 'heroicon-c-adjustments-horizontal'; // Ganti dengan ikon yang tersedia

    protected static ?string $navigationLabel = 'Kepulangan Umroh';
    protected static ?string $pluralLabel = 'Kepulangan Umroh';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('nama_jemaah')
                    ->label('Nama Jemaah')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('tanggal_kepulangan')
                    ->label('Tanggal Kepulangan')
                    ->required(),

                    Select::make('status_kepulangan')
                    ->label('Status Kepulangan')
                    ->options([
                        'Menunggu' => 'Menunggu',
                        'Selesai' => 'Selesai',
                        'Tertunda' => 'Tertunda',
                    ])
                    ->default('Menunggu')
                    ->required(),

                Textarea::make('catatan')
                    ->label('Catatan')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_jemaah')
                    ->label('Nama Jemaah')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tanggal_kepulangan')
                    ->label('Tanggal Kepulangan')
                    ->date()
                    ->sortable(),

                TextColumn::make('status_kepulangan')
                    ->label('Status Kepulangan')
                    ->sortable(),

                TextColumn::make('catatan')
                    ->label('Catatan')
                    ->limit(50),
            ])
            ->filters([
                // Tambahkan filter di sini jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListKepulanganUmrohs::route('/'),
            'create' => Pages\CreateKepulanganUmroh::route('/create'),
            'edit' => Pages\EditKepulanganUmroh::route('/{record}/edit'),
        ];
    }
}
