<?php

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Export;

final class CsvProductListExporter extends AbstractProductListExporter
{
    protected function getEncoderFormat(): string
    {
        return 'csv';
    }
}
