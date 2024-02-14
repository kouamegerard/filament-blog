<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use App\Models\Category;
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
use App\Filament\Resources\PostResource\Widgets\StatsOverview;
use Filament\Forms\Components\Actions\Action;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = "Post Manage";

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
                                Forms\Components\RichEditor::make('conclusion')
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

                    Section::make('Featured')
                        ->schema([

                            Forms\Components\Toggle::make('is_featured')
                                ->required(),
                        ])
                        ->compact(),

                    Section::make('Categories')
                        ->schema([
                            Forms\Components\Select::make('category_id')
                                ->multiple()
                                ->relationship('categories', 'title')
                                ->createOptionAction(
                                    fn (Action $action) => $action->modalWidth('3xl'),
                                )
                                ->preload()
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('title')
                                        ->live(onBlur: true)
                                        ->required()
                                        ->maxLength(255)
                                        ->unique()
                                        ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                            if (($get('slug') ?? '') !== Str::slug($old)) {
                                                return;
                                            }
                                            $set('slug', Str::slug($state));
                                        }),
                                    Forms\Components\TextInput::make('slug')
                                        ->disabled()
                                        ->dehydrated()
                                        ->unique(table: Category::class, column: "slug", ignoreRecord: true),
                                    Forms\Components\TextInput::make('content')
                                        ->required()
                                        ->maxLength(255),
                                    Forms\Components\ColorPicker::make('color')
                                        ->required()
                                        ->default('#FFFFFF'),
                                    Forms\Components\ColorPicker::make('bg_color')
                                        ->required()
                                        ->default('#000000'),
                                    Forms\Components\Select::make('user_id')
                                        // ->default(auth()->user()->name)
                                        ->relationship('user', 'name')
                                        ->searchable()
                                        ->loadingMessage('Loading authors...')
                                        ->noSearchResultsMessage('No authors found.')
                                        ->required(),
                                ])
                                ->required(),
                        ])
                        ->compact(),

                    Section::make('Excerpt')
                        ->schema([

                            Forms\Components\RichEditor::make('excerpt')
                                ->required(),
                        ])
                        ->compact(),

                    Section::make('Thumbnail')
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->collection('posts')
                            ->directory("posts"),
                        ])
                        ->compact(),

                    Section::make('Author')
                        ->schema([
                            Forms\Components\Select::make('user_id')
                                //->default(auth()->user()->name)
                                ->relationship('user', 'name')
                                ->searchable()
                                ->preload()
                                ->loadingMessage('Loading authors...')
                                ->noSearchResultsMessage('No authors found.')
                                ->required(),
                        ])
                        ->compact(),

                ])
                ->columnSpan(1),
                Grid::make(2)
                ->schema([
                        
                    Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make("Description")
                            ->schema([
                                Forms\Components\RichEditor::make('content')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsVisibility('public')
                                    ->fileAttachmentsDirectory('uploads/blog/posts')
                                    // ->profile('default|simple|full|minimal|none|custom')
                                    // ->rtl() // Set RTL or use ->direction('auto|rtl|ltr')
                                    // ->direction('auto|rtl|ltr')
                                    ->columnSpan('full')
                                    ->required(),
                                    
                                Forms\Components\Builder::make('body')
                                    ->blocks([
                                        Forms\Components\Builder\Block::make('heading')
                                            ->icon('heroicon-m-bars-3-bottom-left')
                                            ->schema([
                                                // Forms\Components\TextInput::make('body')->required(),
                                                Forms\Components\Select::make('body')
                                                    ->label('Heading')
                                                    ->options([
                                                        'h1' => 'Heading 1',
                                                        'h2' => 'Heading 2',
                                                        'h3' => 'Heading 3',
                                                        'h4' => 'Heading 4',
                                                        'h5' => 'Heading 5',
                                                        'h6' => 'Heading 6',
                                                    ])
                                                // ...
                                            ]),
                                        Forms\Components\Builder\Block::make('paragraph')
                                            ->icon('heroicon-m-bars-3-bottom-left')
                                            ->schema([
                                                Forms\Components\TextInput::make('body')
                                                    ->label('Paragraph')
                                                    ->required(),
                                                // ...
                                            ]),
                                        Forms\Components\Builder\Block::make('image')
                                            ->icon('heroicon-m-bars-3-bottom-left')
                                            ->schema([
                                                Forms\Components\FileUpload::make('body')
                                                    ->label('Image')
                                                    ->image()
                                                    ->required(),
                                                // ...
                                            ]),
                                    ])
                                    ->cloneable()
                                    ->reorderableWithButtons()
                                    ->collapsible()
                                    ->collapsed()
                                    ->addActionLabel('Add a new block')
                                    ->deleteAction(
                                        fn (Forms\Components\Actions\Action $action) => $action->requiresConfirmation(),
                                    )
                                    ->collapseAllAction(
                                        fn (Forms\Components\Actions\Action $action) => $action->label('Collapse all content'),
                                    )
                            ])->columnSpan('full')
                            ->collapsed()
                    ])->columnSpanFull(),
                
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('posts')
                    ->circular(),
                Tables\Columns\TextColumn::make('categories.title')
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
                Tables\Filters\SelectFilter::make('categories.title')
                    ->relationship('categories', 'title')
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

    public static  function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

}
