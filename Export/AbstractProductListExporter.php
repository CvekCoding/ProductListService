<?php

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Export;

use App\Entity\Main\CustomMeasureUnit;
use App\Entity\Main\Location;
use App\Entity\Main\LocationProductSettings;
use App\Entity\Main\Product;
use App\Entity\Main\ProductList;
use App\Utils\EDI\ProductListService\Entity\EdiProductListFile;
use App\Utils\EDI\ProductListService\Entity\EdiProductListFileItem;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractProductListExporter implements ProductListExporterInterface
{
    private $serializer;

    abstract protected function getEncoderFormat(): string;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param Location    $location
     * @param ProductList $productList
     *
     * @return string
     */
    public function export(Location $location, ProductList $productList): string
    {
        $productListFileObject = $this->getProductListObject($location, $productList);

        return $this->serializer->serialize($productListFileObject->getItems(), $this->getEncoderFormat());
    }

    /**
     * @param Location    $location
     * @param ProductList $productList
     *
     * @return EdiProductListFile
     */
    private function getProductListObject(Location $location, ProductList $productList): EdiProductListFile
    {
        $productListObject = new EdiProductListFile();

        foreach ($productList->getProducts() as $product) {
            $productListObject->addItem($this->createEdiItem($location, $product));
        }

        return $productListObject;
    }

    /**
     * @param Location $location
     * @param Product  $product
     *
     * @return EdiProductListFileItem
     */
    private function createEdiItem(Location $location, Product $product): EdiProductListFileItem
    {
        $locationSettings = $product->getLocationSettings($location);
        /** @var LocationProductSettings $locationSetting */
        $locationSetting = $locationSettings->isEmpty() ? null : $locationSettings->first();

        $isCustomUnit = $product->getStandardMeasure()->getUnit() instanceof CustomMeasureUnit;

        return (new EdiProductListFileItem())
            ->setName($product->getName())
            ->setCategory($product->getProductCategory() ? $product->getProductCategory()->getName() : null)
            ->setStorage('')
            ->setMeasure($isCustomUnit ? null : (string) $product->getStandardMeasure())
            ->setCustomMeasure($isCustomUnit ? (string) $product->getStandardMeasure() : null)
            ->setTaxable(isset($locationSetting) ? $locationSetting->getHasTax() : false)
            ->setShowOnGrid(isset($locationSetting) ? $locationSetting->isShowOnGrid() : false)
            ->setParLevel(isset($locationSetting) ? $locationSetting->getParLevel() ?? 0.0 : 0.0);
    }
}
