<?php

namespace App\Utils\EDI\ProductListService\Import;

use App\Utils\EDI\ProductListService\Entity\EdiProductListFile;
use Symfony\Component\HttpFoundation\File\File;

interface ProductListImporterInterface
{
	public function getProductListFileObject(File $file): ?EdiProductListFile;
}
