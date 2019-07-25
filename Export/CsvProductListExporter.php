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

namespace App\Utils\EDI\ProductListService\Export;

use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

final class CsvProductListExporter extends AbstractProductListExporter
{
    protected function getEncoder(): EncoderInterface
    {
        return new CsvEncoder();
    }

    protected function getEncoderFormat(): string
    {
        return 'csv';
    }
}
