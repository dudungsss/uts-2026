<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Portofolio';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Contacts';

    protected static ?string $modelLabel = 'Contact';

    protected static ?string $pluralModelLabel = 'Contacts';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contact Information')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name / Title')
                            ->maxLength(255)
                            ->placeholder('Contoh: GitHub / Email / Nama Pengirim')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('email@domain.com')
                            ->columnSpan(1),

                        Forms\Components\Textarea::make('message')
                            ->label('Message')
                            ->rows(5)
                            ->columnSpanFull()
                            ->placeholder('Isi pesan dari form contact'),
                    ]),

                Forms\Components\Section::make('Contact Type Settings')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Toggle::make('is_system_contact')
                            ->label('System Contact')
                            ->helperText('Aktifkan kalau data ini untuk link social/contact yang tampil di website.')
                            ->default(false)
                            ->live(),

                        Forms\Components\Select::make('contact_type')
                            ->label('Contact Type')
                            ->required()
                            ->options([
                                'email' => 'Email',
                                'github' => 'GitHub',
                                'linkedin' => 'LinkedIn',
                                'instagram' => 'Instagram',
                                'whatsapp' => 'WhatsApp',
                                'website' => 'Website',
                                'message' => 'Message / Form Submission',
                            ])
                            ->default('message')
                            ->native(false),
                    ]),

                Forms\Components\Section::make('Social Media Settings')
                    ->description('Isi bagian ini kalau System Contact aktif.')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('url')
                            ->label('URL')
                            ->maxLength(255)
                            ->placeholder('https://github.com/username')
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('icon')
                            ->label('Icon')
                            ->maxLength(10)
                            ->placeholder('✉ / ⑂ / in')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('display_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('display_order')
                    ->label('Order')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_system_contact')
                    ->label('System')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name / Title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('contact_type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'email' => 'success',
                        'github' => 'gray',
                        'linkedin' => 'info',
                        'instagram' => 'danger',
                        'whatsapp' => 'success',
                        'website' => 'warning',
                        'message' => 'primary',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->limit(35)
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->limit(40)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
                Tables\Filters\TernaryFilter::make('is_system_contact')
                    ->label('System Contact')
                    ->placeholder('All contacts')
                    ->trueLabel('System contacts')
                    ->falseLabel('Form submissions'),

                Tables\Filters\SelectFilter::make('contact_type')
                    ->label('Contact Type')
                    ->options([
                        'email' => 'Email',
                        'github' => 'GitHub',
                        'linkedin' => 'LinkedIn',
                        'instagram' => 'Instagram',
                        'whatsapp' => 'WhatsApp',
                        'website' => 'Website',
                        'message' => 'Message',
                    ]),
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
            ->defaultSort('display_order', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}