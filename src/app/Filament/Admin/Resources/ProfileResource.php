<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationLabel = 'Profile';

    protected static ?string $modelLabel = 'Profile';

    protected static ?string $pluralModelLabel = 'Profiles';

    protected static ?string $navigationGroup = 'Portofolio';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Profile Settings')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Profile')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Yuliadhy Nugraha'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Gunakan profile ini')
                            ->hint('Hanya satu profile yang bisa aktif')
                            ->default(true)
                            ->live()
                            ->afterStateUpdated(function ($state, $record) {
                                if ($state && $record) {
                                    Profile::where('id', '!=', $record->id)
                                        ->update(['is_active' => false]);
                                }
                            }),
                    ]),

                Forms\Components\Section::make('Hero Content')
                    ->schema([
                        Forms\Components\TextInput::make('hero_badge')
                            ->label('Hero Badge')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: available for work'),

                        Forms\Components\Textarea::make('typing_texts')
                            ->label('Typing Animation Texts')
                            ->hint('Pisahkan dengan koma. Contoh: Mahasiswa Esa Unggul,Fullstack Learner,Vibe Coder')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('hero_description')
                            ->label('Hero Description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Social Links')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('github_label')
                            ->label('GitHub Label')
                            ->maxLength(255)
                            ->placeholder('Contoh: GitHub'),

                        Forms\Components\TextInput::make('github_url')
                            ->label('GitHub URL')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://github.com/username'),
                    ]),

                Forms\Components\Section::make('Hero Buttons')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('projects_button_text')
                            ->label('Text Tombol Projects')
                            ->maxLength(255)
                            ->placeholder('Contoh: lihat projects →'),

                        Forms\Components\TextInput::make('projects_button_url')
                            ->label('URL Tombol Projects')
                            ->maxLength(255)
                            ->placeholder('/projects'),

                        Forms\Components\TextInput::make('contact_button_text')
                            ->label('Text Tombol Contact')
                            ->maxLength(255)
                            ->placeholder('Contoh: hubungi saya'),

                        Forms\Components\TextInput::make('contact_button_url')
                            ->label('URL Tombol Contact')
                            ->maxLength(255)
                            ->placeholder('/contact'),
                    ]),

                Forms\Components\Section::make('Hero Stats')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('projects_stat_label')
                            ->label('Projects Stat Label')
                            ->maxLength(255)
                            ->placeholder('projects'),

                        Forms\Components\TextInput::make('tech_stack_stat_label')
                            ->label('Tech Stack Stat Label')
                            ->maxLength(255)
                            ->placeholder('tech stack'),

                        Forms\Components\TextInput::make('total_tech_stack')
                            ->label('Total Tech Stack')
                            ->numeric()
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Otomatis dihitung dari jumlah Tech Stack'),

                        Forms\Components\TextInput::make('architecture_status')
                            ->label('Architecture Status')
                            ->maxLength(255)
                            ->placeholder('MVC'),

                        Forms\Components\TextInput::make('architecture_label')
                            ->label('Architecture Label')
                            ->maxLength(255)
                            ->placeholder('architecture'),

                        Forms\Components\TextInput::make('dark_mode_status')
                            ->label('Dark Mode Status')
                            ->maxLength(255)
                            ->placeholder('100%'),

                        Forms\Components\TextInput::make('dark_mode_label')
                            ->label('Dark Mode Label')
                            ->maxLength(255)
                            ->placeholder('dark mode'),
                    ]),

                Forms\Components\Section::make('Tech Stack Section')
                    ->schema([
                        Forms\Components\TextInput::make('tech_section_label')
                            ->label('Section Label')
                            ->maxLength(255)
                            ->placeholder('tech stack'),

                        Forms\Components\TextInput::make('tech_section_title')
                            ->label('Section Title')
                            ->maxLength(255)
                            ->placeholder('Tools & Teknologi'),

                        Forms\Components\Textarea::make('tech_section_description')
                            ->label('Section Description')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('tech_stacks')
                            ->label('Tech Stack Items')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Technology Name')
                                    ->required()
                                    ->placeholder('Contoh: Laravel 11')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('icon')
                                    ->label('Icon Emoji')
                                    ->required()
                                    ->maxLength(10)
                                    ->placeholder('🐘')
                                    ->columnSpan(1),

                                Forms\Components\TextInput::make('role')
                                    ->label('Role / Description')
                                    ->required()
                                    ->placeholder('Contoh: MVC Framework')
                                    ->columnSpan(2),
                            ])
                            ->columns(3)
                            ->collapsible()
                            ->collapsed(false)
                            ->defaultItems(0)
                            ->addActionLabel('Tambah Tech Stack')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Project Section')
                    ->schema([
                        Forms\Components\TextInput::make('project_section_label')
                            ->label('Section Label')
                            ->maxLength(255)
                            ->placeholder('featured projects'),

                        Forms\Components\TextInput::make('project_section_title')
                            ->label('Section Title')
                            ->maxLength(255)
                            ->placeholder('Project Terbaru'),

                        Forms\Components\Textarea::make('project_section_description')
                            ->label('Section Description')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('view_all_projects_text')
                            ->label('Text Tombol Lihat Semua Project')
                            ->maxLength(255)
                            ->placeholder('lihat semua projects →'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('hero_badge')
                    ->label('Badge')
                    ->searchable(),

                Tables\Columns\TextColumn::make('github_url')
                    ->label('GitHub')
                    ->limit(30)
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('tech_stacks')
                    ->label('Tech Stack')
                    ->formatStateUsing(function ($state) {
                        if (is_array($state) && count($state) > 0) {
                            $techs = array_map(
                                fn ($tech) => $tech['name'] ?? 'Unknown',
                                $state
                            );

                            return implode(', ', $techs);
                        }

                        return '-';
                    })
                    ->toggleable(),

                Tables\Columns\TextColumn::make('total_tech_stack')
                    ->label('Tech Count')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('dark_mode_status')
                    ->label('Dark Mode')
                    ->searchable()
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
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Profile')
                    ->placeholder('All profiles')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}