<?php

require_once __DIR__ . '/../UnitCategory.php';

class Length extends UnitCategory
{
    protected string $name = 'Length';
    protected string $baseUnit = 'meter';

    public function __construct()
    {
        $this->units = [
            'meter' => [
                'name' => 'meter',
                'abbrev' => 'm',
                'toBase' => 1
            ],
            'kilometer' => [
                'name' => 'kilometer',
                'abbrev' => 'km',
                'toBase' => 1000
            ],
            'centimeter' => [
                'name' => 'centimeter',
                'abbrev' => 'cm',
                'toBase' => 0.01
            ],
            'millimeter' => [
                'name' => 'millimeter',
                'abbrev' => 'mm',
                'toBase' => 0.001
            ],
            'mile' => [
                'name' => 'mile',
                'abbrev' => 'mi',
                'toBase' => 1609.344
            ],
            'yard' => [
                'name' => 'yard',
                'abbrev' => 'yd',
                'toBase' => 0.9144
            ],
            'foot' => [
                'name' => 'foot',
                'abbrev' => 'ft',
                'toBase' => 0.3048
            ],
            'inch' => [
                'name' => 'inch',
                'abbrev' => 'in',
                'toBase' => 0.0254
            ],
            'nauticalMile' => [
                'name' => 'nautical mile',
                'abbrev' => 'nmi',
                'toBase' => 1852
            ],
            'micrometer' => [
                'name' => 'micrometer',
                'abbrev' => 'μm',
                'toBase' => 0.000001
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
