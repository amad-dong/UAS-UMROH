<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeberangkatanUmrohResource\Pages;
use App\Models\KeberangkatanUmroh;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

class KeberangkatanUmrohResource extends Resource
{
    protected static ?string $model = KeberangkatanUmroh::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Keberangkatan Umroh';
    protected static ?string $pluralLabel = 'Keberangkatan Umroh';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('nama_jamaah')
                    ->label('Nama Jamaah')
                    ->required(),
                DatePicker::make('tanggal_keberangkatan')
                    ->label('Tanggal Keberangkatan')
                    ->required(),
                Select::make('paket')
                    ->label('Paket')
                    ->options([
                        'Reguler' => 'Reguler',
                        'VIP' => 'VIP',
                        'Eksekutif' => 'Eksekutif',
                    ])
                    ->required(),
                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'Terdaftar' => 'Terdaftar',
                        'Berangkat' => 'Berangkat',
                        'Selesai' => 'Selesai',
                    ])
                    ->default('Terdaftar')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_jamaah')->label('Nama Jamaah')->sortable()->searchable(),
                TextColumn::make('tanggal_keberangkatan')->label('Tanggal Keberangkatan')->date()->sortable(),
                TextColumn::make('paket')->label('Paket')->sortable(),
                TextColumn::make('harga')->label('Harga')->money('IDR', true)->sortable(),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => 'Terdaftar',
                        'success' => 'Berangkat',
                        'secondary' => 'Selesai',
                    ])
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'Terdaftar' => 'Terdaftar',
                        'Berangkat' => 'Berangkat',
                        'Selesai' => 'Selesai',
                    ])
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeberangkatanUmrohs::route('/'),
            'create' => Pages\CreateKeberangkatanUmroh::route('/create'),
            'edit' => Pages\EditKeberangkatanUmroh::route('/{record}/edit'),
        ];
    }
}
