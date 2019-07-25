<?php
/**
 * This file is part of the Diningedge package.
 *
 * (c) Sergey Logachev <svlogachev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Import;

use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

final class CsvProductListImporter extends AbstractProductListImporter
{
    protected function getDecoder(): DecoderInterface
    {
        return new CsvEncoder();
    }

    protected function getFormat(): string
    {
        return 'csv';
    }
}
