<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Grid::make(2)
                    ->schema([
                        Section::make("Reference")
                            ->description("Put Post description")
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->live()->debounce(2000)
                                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                        if (($get('slug') ?? '') !== Str::slug($old)) {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    })->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('slug')
                                        ->required(),
                                Forms\Components\RichEditor::make('content')
                                    ->required()
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                            ])
                    ])
                    ->columnSpan(2),
                Grid::make(1)
                    ->schema([

                        Section::make('Published/Draft')
                            ->schema([

                                Forms\Components\Toggle::make('is_published')
                                    ->required(),
                            ])
                            ->compact(),

                        Section::make('Categories')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'title')
                                    ->required(),
                            ])
                            ->compact(),

                        Section::make('Excerpt')
                            ->schema([

                                Forms\Components\TextInput::make('excerpt')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->compact(),

                        Section::make('Thumbnail')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('thumbnail')
                                ->collection('posts'),
                            ])
                            ->compact(),

                    ])
                    ->columnSpan(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('posts')
                    ->circular(),
                Tables\Columns\TextColumn::make('category.title')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->limit('20')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->limit('20')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category.title')
                    ->relationship('category', 'title')
                    ->searchable()
                    ->preload(),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->headerActions([

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\TagsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
