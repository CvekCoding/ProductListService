<?php
/*
 * This file is part of the Diningedge package.
 *
 * (c) Sergey Logachev <svlogachev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Export;

use App\Entity\Main\Location;
use App\Entity\Main\ProductList;

interface ProductListExporterInterface
{
	public function export(Location $location, ProductList $productList): string;
}
