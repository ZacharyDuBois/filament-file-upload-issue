<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocResource\Pages;
use App\Filament\Resources\DocResource\RelationManagers;
use App\Models\Doc;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocResource extends Resource
{
    protected static ?string $model = Doc::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
		->schema([
			Forms\Components\RichEditor::make('rich')
				->disableToolbarButtons(['attachFiles']),
			Forms\Components\MarkdownEditor::make('md')
				->disableToolbarButtons(['attachFiles']),

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
            'index' => Pages\ListDocs::route('/'),
            'create' => Pages\CreateDoc::route('/create'),
            'edit' => Pages\EditDoc::route('/{record}/edit'),
        ];
    }
}
