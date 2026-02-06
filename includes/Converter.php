<?php

class Converter
{
    private array $categories = [];

    public function __construct()
    {
        $this->categories = [
            'length' => new Length(),
            'mass' => new Mass(),
            'temperature' => new Temperature(),
            'time' => new Time(),
            'area' => new Area(),
            'volume' => new Volume(),
            'speed' => new Speed(),
            'data' => new DataStorage(),
            'pressure' => new Pressure(),
            'energy' => new Energy(),
        ];
    }

    public function getCategories(): array
    {
        $result = [];
        foreach ($this->categories as $id => $category) {
            $result[] = [
                'id' => $id,
                'name' => $category->getName()
            ];
        }
        return $result;
    }

    public function getUnits(string $categoryId): array
    {
        if (!isset($this->categories[$categoryId])) {
            return [];
        }
        return $this->categories[$categoryId]->getUnits();
    }

    public function convert(float $value, string $fromUnit, string $toUnit, string $categoryId): string
    {
        if (!isset($this->categories[$categoryId])) {
            return '';
        }

        $result = $this->categories[$categoryId]->convert($value, $fromUnit, $toUnit);
        return $this->formatResult($result);
    }

    public function getUnitInfo(string $categoryId, string $unitId): ?array
    {
        if (!isset($this->categories[$categoryId])) {
            return null;
        }
        return $this->categories[$categoryId]->getUnitInfo($unitId);
    }

    private function formatResult(float $value): string
    {
        if (is_nan($value)) {
            return '';
        }

        $absValue = abs($value);

        if ($absValue == 0) {
            return '0';
        }

        if ($absValue < 0.0001 || $absValue >= 1e10) {
            return sprintf('%.6e', $value);
        }

        if ($absValue < 1) {
            return rtrim(rtrim(sprintf('%.8f', $value), '0'), '.');
        }

        if (floor($value) == $value) {
            return number_format($value, 0, '.', '');
        }

        $decimalPlaces = max(0, 8 - floor(log10($absValue)) - 1);
        return rtrim(rtrim(number_format($value, (int)$decimalPlaces, '.', ''), '0'), '.');
    }
}
