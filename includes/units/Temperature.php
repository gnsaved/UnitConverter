<?php

require_once __DIR__ . '/../UnitCategory.php';

class Temperature extends UnitCategory
{
    protected string $name = 'Temperature';
    protected string $baseUnit = 'celsius';

    public function __construct()
    {
        $this->units = [
            'celsius' => [
                'name' => 'Celsius',
                'abbrev' => '째C'
            ],
            'fahrenheit' => [
                'name' => 'Fahrenheit',
                'abbrev' => '째F'
            ],
            'kelvin' => [
                'name' => 'Kelvin',
                'abbrev' => 'K'
            ],
            'rankine' => [
                'name' => 'Rankine',
                'abbrev' => '째R'
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function convert(float $value, string $fromUnit, string $toUnit): float
    {
        if (!isset($this->units[$fromUnit]) || !isset($this->units[$toUnit])) {
            return NAN;
        }

        $celsius = $this->toBase($value, $fromUnit);
        return $this->fromBase($celsius, $toUnit);
    }

    private function toBase(float $value, string $unit): float
    {
        return match ($unit) {
            'celsius' => $value,
            'fahrenheit' => ($value - 32) * 5 / 9,
            'kelvin' => $value - 273.15,
            'rankine' => ($value - 491.67) * 5 / 9,
            default => NAN
        };
    }

    private function fromBase(float $celsius, string $unit): float
    {
        return match ($unit) {
            'celsius' => $celsius,
            'fahrenheit' => $celsius * 9 / 5 + 32,
            'kelvin' => $celsius + 273.15,
            'rankine' => $celsius * 9 / 5 + 491.67,
            default => NAN
        };
    }
}
