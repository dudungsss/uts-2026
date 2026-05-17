<?php

namespace App\Filament\Admin\Resources\ProjectReportResource\Pages;

use App\Filament\Admin\Resources\ProjectReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectReports extends ListRecords
{
    protected static string $resource = ProjectReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
