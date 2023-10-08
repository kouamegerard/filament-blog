<?php

namespace App\Filament\Resources\TagResource\RelationManagers;

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
            Grid::make(2)
                ->schema([

                    Section::make('Published/Draft')
                        ->schema([

                            Forms\Components\Toggle::make('is_published')
                                ->required(),
                        ])
                        ->compact()
                        ->columnSpan(1),

                    Section::make('Categories')
                        ->schema([
                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'title')
                                ->required(),
                        ])
                        ->compact()
                        ->columnSpan(1),

                    Section::make('Excerpt')
                        ->schema([

                            Forms\Components\TextInput::make('excerpt')
                                ->required()
                                ->maxLength(255),
                        ])
                        ->compact()
                        ->columnSpan(1),

                    Section::make('Thumbnail')
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->collection('posts'),
                        ])
                        ->compact()
                        ->columnSpan(1),

                ])
                ->columnSpan(2)
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
