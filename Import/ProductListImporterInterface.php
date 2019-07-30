<?php
/*
 * This file is part of the Diningedge package.
 *
 * (c) Sergey Logachev <svlogachev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Utils\EDI\ProductListService\Import;

use App\Utils\EDI\ProductListService\Entity\EdiProductListFile;
use Symfony\Component\HttpFoundation\File\File;

interface ProductListImporterInterface
{
	public function getProductListFileObject(File $file): ?EdiProductListFile;
}
