<?php

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Export;

use App\Entity\Main\Location;
use App\Entity\Main\ProductList;

interface ProductListExporterInterface
{
	public function export(Location $location, ProductList $productList): string;
}
