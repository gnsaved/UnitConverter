<?php

require_once __DIR__ . '/../UnitCategory.php';

class Area extends UnitCategory
{
    protected string $name = 'Area';
    protected string $baseUnit = 'squareMeter';

    public function __construct()
    {
        $this->units = [
            'squareMeter' => [
                'name' => 'square meter',
                'abbrev' => 'm²',
                'toBase' => 1
            ],
            'squareKilometer' => [
                'name' => 'square kilometer',
                'abbrev' => 'km²',
                'toBase' => 1000000
            ],
            'squareCentimeter' => [
                'name' => 'square centimeter',
                'abbrev' => 'cm²',
                'toBase' => 0.0001
            ],
            'squareMillimeter' => [
                'name' => 'square millimeter',
                'abbrev' => 'mm²',
                'toBase' => 0.000001
            ],
            'hectare' => [
                'name' => 'hectare',
                'abbrev' => 'ha',
                'toBase' => 10000
            ],
            'acre' => [
                'name' => 'acre',
                'abbrev' => 'ac',
                'toBase' => 4046.8564224
            ],
            'squareMile' => [
                'name' => 'square mile',
                'abbrev' => 'mi²',
                'toBase' => 2589988.110336
            ],
            'squareYard' => [
                'name' => 'square yard',
                'abbrev' => 'yd²',
                'toBase' => 0.83612736
            ],
            'squareFoot' => [
                'name' => 'square foot',
                'abbrev' => 'ft²',
                'toBase' => 0.09290304
            ],
            'squareInch' => [
                'name' => 'square inch',
                'abbrev' => 'in²',
                'toBase' => 0.00064516
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
