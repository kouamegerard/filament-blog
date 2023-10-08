<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function form(Form $form): Form
    {
        return $form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('posts')
                    ->circular(),
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]));
    }
}
