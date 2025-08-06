<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->required()
                            ->maxLength(200)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(200)
                            ->unique(ignoreRecord: true)
                            ->disabled()
                            ->dehydrated()
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('isi')
                            ->required()
                            ->string()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'blockquote', 'bold', 'bulletList', 'codeBlock', 'h2', 'h3', 'italic', 'link', 'orderedList', 'redo', 'strike', 'underline', 'undo',
                            ]),

                        Forms\Components\FileUpload::make('gambar')
                            ->required()
                            ->image()
                            ->disk('public')
                            ->directory('berita-images')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('kategori')
                            ->nullable()
                            ->maxLength(50),

                        Forms\Components\Hidden::make('penulis')
                            ->default(fn () => auth()->user()->name),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->square()
                    ->size(50),

                // Kolom Judul saja, tanpa deskripsi.
                // Gunakan formatStateUsing untuk menghilangkan tag HTML
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->label('Judul')
                    ->formatStateUsing(fn ($state) => strip_tags($state)),

                // Kolom Isi (konten berita) dengan tag HTML dihilangkan
                Tables\Columns\TextColumn::make('isi')
                    ->searchable()
                    ->sortable()
                    ->label('Isi')
                    ->wrap()
                    ->limit(100)
                    ->formatStateUsing(fn ($state) => strip_tags($state)),

                Tables\Columns\TextColumn::make('kategori')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('penulis')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options(Berita::distinct()->pluck('kategori', 'kategori')->toArray())
                    ->label('Filter Kategori'),

                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('published_from')
                            ->placeholder('Dari Tanggal'),
                        Forms\Components\DatePicker::make('published_until')
                            ->placeholder('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    }),
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
    }
}