<?php

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Import;

use App\Utils\EDI\ProductListService\Entity\EdiProductListFile;
use App\Utils\EDI\ProductListService\Entity\EdiProductListFileItem;
use App\Utils\Exception\RuntimeException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractProductListImporter implements ProductListImporterInterface
{
    private $serializer;

    abstract protected function getFormat(): string;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param File $file
     *
     * @return EdiProductListFile|null
     *
     * @throws RuntimeException
     */
    public function getProductListFileObject(File $file): ?EdiProductListFile
    {
        if (false === $fileContent = \file_get_contents($file->getRealPath())) {
            throw new RuntimeException('File can not be read.');
        }

        if (empty($fileContent)) {
            return null;
        }

        /** @var EdiProductListFileItem[] $items */
        $items = $this->serializer->deserialize($fileContent, EdiProductListFileItem::class.'[]', $this->getFormat());

        if (empty($items)) {
            return null;
        }

        if (null !== $duplication = $this->searchDuplication($items)) {
            throw new RuntimeException("Duplication was found. Product name: {$duplication->getName()}");
        }

        return (new EdiProductListFile())->setItems($items);
    }

    /**
     * @return EdiProductListFileItem|null
     *
     * @var EdiProductListFileItem[]
     */
    private function searchDuplication(array $items): ?EdiProductListFileItem
    {
        foreach ($items as $index1 => $item1) {
            foreach ($items as $index2 => $item2) {
                if ($index1 !== $index2 && $item1->getName() === $item2->getName()) {
                    return $item1;
                }
            }
        }

        return null;
    }
}
