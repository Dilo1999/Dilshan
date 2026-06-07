<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Projects';

    protected static ?string $modelLabel = 'Project';

    protected static ?string $pluralModelLabel = 'Projects';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $slug = 'projects';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Select::make('category')
                            ->required()
                            ->options([
                                'Mobile Apps' => 'Mobile Apps',
                                'Machine Learning' => 'Machine Learning',
                                'Web Dev' => 'Web Dev',
                                'Plugins' => 'Plugins',
                                'E-commerce' => 'E-commerce',
                                'Other' => 'Other',
                            ]),
                        Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        TextInput::make('problem')
                            ->label('Role')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Shown as the project role on the detail page.'),
                        TagsInput::make('tech')
                            ->required()
                            ->separator(',')
                            ->helperText('Press Enter after each technology.'),
                        TextInput::make('url')
                            ->label('External URL')
                            ->url()
                            ->maxLength(500),
                        TextInput::make('url_label')
                            ->maxLength(100)
                            ->default('Visit Project'),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Case study')
                    ->schema([
                        Textarea::make('case_study_overview')
                            ->label('Overview')
                            ->rows(4)
                            ->columnSpanFull(),
                        Textarea::make('case_study_challenge')
                            ->label('The Challenge')
                            ->rows(4),
                        Textarea::make('case_study_solution')
                            ->label('The Solution')
                            ->rows(4),
                        TagsInput::make('case_study_features')
                            ->label('Key Features')
                            ->separator(',')
                            ->helperText('Leave empty to auto-generate from the description.')
                            ->columnSpanFull(),
                        TagsInput::make('case_study_outcomes')
                            ->label('Outcomes')
                            ->separator(',')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Project gallery')
                    ->schema([
                        FileUpload::make('gallery_paths')
                            ->label('Images')
                            ->multiple()
                            ->disk('public')
                            ->directory('projects/gallery')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/avif', 'image/gif', 'image/svg+xml'])
                            ->maxFiles(20)
                            ->helperText('Select or drop multiple images at once.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category')
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),
                TextColumn::make('sort_order')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
