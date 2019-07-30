<?php

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Export;

use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

final class CsvProductListExporter extends AbstractProductListExporter
{
    protected function getEncoderFormat(): string
    {
        return 'csv';
    }
}
