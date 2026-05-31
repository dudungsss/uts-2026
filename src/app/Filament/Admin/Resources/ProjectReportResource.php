<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectReportResource\Pages;
use App\Models\ProjectReport;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectReportResource extends Resource
{
    protected static ?string $model = ProjectReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Portofolio';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Project Reports';

    protected static ?string $modelLabel = 'Project Report';

    protected static ?string $pluralModelLabel = 'Project Reports';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Project')
                    ->schema([
                        Select::make('project_id')
                            ->label('Project')
                            ->relationship('project', 'title')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->helperText('Satu project hanya punya satu report.'),
                    ]),

                Section::make('Analisis & Kebutuhan Sistem')
                    ->schema([
                        Textarea::make('problem_analysis')
                            ->label('Analisis Masalah')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull()
                            ->helperText('Pisahkan paragraf dengan enter.'),

                        Textarea::make('system_requirements')
                            ->label('Functional Requirements')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull()
                            ->helperText('Satu kebutuhan per baris.'),

                        Textarea::make('non_functional_requirements')
                            ->label('Non-Functional Requirements')
                            ->rows(5)
                            ->columnSpanFull()
                            ->helperText('Satu kebutuhan per baris. Contoh: Responsive layout, Docker containerized.'),
                    ]),

                Section::make('Fitur & Arsitektur')
                    ->schema([
                        Textarea::make('main_features')
                            ->label('Fitur Utama')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull()
                            ->helperText('Satu fitur per baris.'),

                        Textarea::make('architecture')
                            ->label('Arsitektur')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull()
                            ->helperText('Pisahkan paragraf dengan enter.'),

                        Textarea::make('architecture_flow')
                            ->label('Architecture Flow')
                            ->rows(4)
                            ->columnSpanFull()
                            ->helperText('Satu item per baris. Contoh: Browser, Route, Livewire Component, Eloquent Model, MariaDB, Blade View.'),
                    ]),

                Section::make('Diagram')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('erd_image')
                            ->label('ERD Image')
                            ->image()
                            ->imageEditor()
                            ->directory('erd')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(2048),

                        FileUpload::make('flowchart_image')
                            ->label('Flowchart Image')
                            ->image()
                            ->imageEditor()
                            ->directory('flowcharts')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(2048),

                        Textarea::make('flowchart_steps')
                            ->label('Flowchart Steps')
                            ->rows(5)
                            ->columnSpanFull()
                            ->helperText('Satu step per baris. Contoh: User Buka Website, Home Page, Projects Page, Detail Project.'),
                    ]),

                Section::make('Progress')
                    ->schema([
                        TextInput::make('progress_status')
                            ->label('Progress Status')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: 80% Complete')
                            ->helperText('Masukkan angka persen agar progress bar jalan. Contoh: 75%'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project.title')
                    ->label('Project')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('progress_status')
                    ->label('Progress')
                    ->badge()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('erd_image')
                    ->label('ERD')
                    ->disk('public')
                    ->square()
                    ->toggleable(),

                Tables\Columns\ImageColumn::make('flowchart_image')
                    ->label('Flowchart')
                    ->disk('public')
                    ->square()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectReports::route('/'),
            'create' => Pages\CreateProjectReport::route('/create'),
            'edit' => Pages\EditProjectReport::route('/{record}/edit'),
        ];
    }
}