<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PejabatStrukturalResource\Pages;
use App\Models\PejabatStruktural;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PejabatStrukturalResource extends Resource
{
    protected static ?string $model = PejabatStruktural::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pejabat Struktural';
    protected static ?string $navigationGroup = 'Profil';
    protected static ?int $navigationSort = 4;

    public static function getPluralLabel(): string
    {
        return 'Pejabat Struktural';
    }

    public static function getLabel(): string
    {
        return 'Pejabat Struktural';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(12)
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->maxLength(150)
                            ->columnSpan(6),
                        Forms\Components\TextInput::make('jabatan')
                            ->required()
                            ->maxLength(180)
                            ->columnSpan(6),
                        Forms\Components\FileUpload::make('foto')
                            ->image()
                            ->directory('pejabat-foto')
                            ->disk('public')
                            ->imageEditor()
                            ->columnSpan(6),
                        Forms\Components\TextInput::make('urutan')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->columnSpan(3),
                        Forms\Components\Toggle::make('aktif')
                            ->default(true)
                            ->columnSpan(3),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->disk('public')
                    ->square()
                    ->size(48),
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('jabatan')->searchable()->sortable()->wrap(),
                Tables\Columns\ToggleColumn::make('aktif')->sortable(),
                Tables\Columns\TextColumn::make('urutan')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y H:i')->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('urutan')
            ->filters([
                Tables\Filters\TernaryFilter::make('aktif')->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus yang Dipilih'),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPejabatStruktural::route('/'),
            'create' => Pages\CreatePejabatStruktural::route('/create'),
            'edit' => Pages\EditPejabatStruktural::route('/{record}/edit'),
        ];
    }
}