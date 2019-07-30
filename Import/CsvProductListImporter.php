<?php

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Import;

final class CsvProductListImporter extends AbstractProductListImporter
{
    protected function getFormat(): string
    {
        return 'csv';
    }
}
