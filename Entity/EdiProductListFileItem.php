<?php

declare(strict_types=1);

namespace App\Utils\EDI\ProductListService\Entity;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class EdiProductListFileItem
{
    /**
     * @SerializedName("Product Name")
     */
    private $name;

    /**
     * @SerializedName("Category")
     */
    private $category;

    /**
     * @SerializedName("Storage")
     */
    private $storage;

    /**
     * @SerializedName("Standard Unit of Measure")
     */
    private $measure;

    /**
     * @SerializedName("Custom Unit of Measure")
     */
    private $customMeasure;

    /**
     * @SerializedName("Taxable")
     */
    private $taxable = true;

    /**
     * @SerializedName("Comparable")
     */
    private $showOnGrid = true;

    /**
     * @SerializedName("Par Level")
     */
    private $parLevel;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return EdiProductListFileItem
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string|null $category
     *
     * @return EdiProductListFileItem
     */
    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStorage(): ?string
    {
        return $this->storage;
    }

    /**
     * @param string|null $storage
     *
     * @return EdiProductListFileItem
     */
    public function setStorage(?string $storage): self
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMeasure(): ?string
    {
        return $this->measure;
    }

    /**
     * @param string|null $measure
     *
     * @return EdiProductListFileItem
     */
    public function setMeasure(?string $measure): self
    {
        $this->measure = $measure;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTaxable(): bool
    {
        return $this->taxable;
    }

    /**
     * @param bool $taxable
     *
     * @return EdiProductListFileItem
     */
    public function setTaxable(bool $taxable): self
    {
        $this->taxable = $taxable;

        return $this;
    }

    /**
     * @return bool
     */
    public function isShowOnGrid(): bool
    {
        return $this->showOnGrid;
    }

    /**
     * @param bool $showOnGrid
     *
     * @return EdiProductListFileItem
     */
    public function setShowOnGrid(bool $showOnGrid): self
    {
        $this->showOnGrid = $showOnGrid;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getParLevel(): ?float
    {
        return $this->parLevel;
    }

    /**
     * @param float|string|null $parLevel
     *
     * @return EdiProductListFileItem
     */
    public function setParLevel($parLevel): self
    {
        $this->parLevel = empty($parLevel) ? null : (float) $parLevel;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomMeasure()
    {
        return $this->customMeasure;
    }

    /**
     * @param mixed $customMeasure
     *
     * @return EdiProductListFileItem
     */
    public function setCustomMeasure($customMeasure): self
    {
        $this->customMeasure = $customMeasure;

        return $this;
    }
}
