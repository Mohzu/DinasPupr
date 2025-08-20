<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenResource\Pages;
use App\Models\Dokumen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DokumenResource extends Resource
{
    protected static ?string $model = Dokumen::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Dokumen';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dokumen')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('year')
                            ->label('Tahun')
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue(3000)
                            ->required(),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->seconds(false),

                        Forms\Components\FileUpload::make('file_path')
                            ->label('Berkas PDF')
                            ->required()
                            ->disk('public')
                            ->directory('dokumen')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240)
                            ->preserveFilenames()
                            ->getUploadedFileNameForStorageUsing(fn (\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string => $file->getClientOriginalName()),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('year')
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('year')
                    ->options(fn () => Dokumen::query()->distinct()->orderByDesc('year')->pluck('year', 'year')->toArray())
                    ->label('Tahun'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDokumens::route('/'),
            'create' => Pages\CreateDokumen::route('/create'),
            'edit' => Pages\EditDokumen::route('/{record}/edit'),
        ];
    }
}

