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
