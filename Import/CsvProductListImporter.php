<?php

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Import;

use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

final class CsvProductListImporter extends AbstractProductListImporter
{
    protected function getFormat(): string
    {
        return 'csv';
    }
}
