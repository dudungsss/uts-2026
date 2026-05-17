<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectReportResource\Pages;
use App\Filament\Admin\Resources\ProjectReportResource\RelationManagers;
use App\Models\ProjectReport;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectReportResource extends Resource
{
    protected static ?string $model = ProjectReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('project_id')
                    ->relationship('project', 'title')
                    ->required(),
                RichEditor::make('problem_analysis'),
                RichEditor::make('system_requirements'),
                RichEditor::make('main_features'),
                RichEditor::make('architecture'),
                FileUpload::make('erd_image')->directory('erd'),
                FileUpload::make('flowchart_image')->directory('flowcharts'),
                TextInput::make('progress_status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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