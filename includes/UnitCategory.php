<?php

abstract class UnitCategory
{
    protected string $name;
    protected string $baseUnit;
    protected array $units = [];

    abstract public function getName(): string;

    public function getUnits(): array
    {
        $result = [];
        foreach ($this->units as $id => $unit) {
            $result[] = [
                'id' => $id,
                'name' => $unit['name'],
                'abbrev' => $unit['abbrev']
            ];
        }
        return $result;
    }

    public function getUnitInfo(string $unitId): ?array
    {
        if (!isset($this->units[$unitId])) {
            return null;
        }
        return [
            'name' => $this->units[$unitId]['name'],
            'abbrev' => $this->units[$unitId]['abbrev']
        ];
    }

    public function convert(float $value, string $fromUnit, string $toUnit): float
    {
        if (!isset($this->units[$fromUnit]) || !isset($this->units[$toUnit])) {
            return NAN;
        }

        $baseValue = $value * $this->units[$fromUnit]['toBase'];
        return $baseValue / $this->units[$toUnit]['toBase'];
    }
}
