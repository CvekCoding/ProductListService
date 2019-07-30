<?php

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Entity;

use Webmozart\Assert\Assert;

final class EdiProductListFile
{
    /**
     * @var EdiProductListFileItem[]
     */
    private $items = [];

    /**
     * @return EdiProductListFileItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param EdiProductListFileItem[] $items
     *
     * @return EdiProductListFile
     */
    public function setItems(array $items): self
    {
        Assert::allIsInstanceOf($items, EdiProductListFileItem::class);

        $this->items = $items;

        return $this;
    }

    /**
     * @param EdiProductListFileItem $productListFileItem
     */
    public function addItem(EdiProductListFileItem $productListFileItem): void
    {
        $this->items[] = $productListFileItem;
    }
}
