<?php

require_once __DIR__ . '/../UnitCategory.php';

class Mass extends UnitCategory
{
    protected string $name = 'Mass';
    protected string $baseUnit = 'kilogram';

    public function __construct()
    {
        $this->units = [
            'kilogram' => [
                'name' => 'kilogram',
                'abbrev' => 'kg',
                'toBase' => 1
            ],
            'gram' => [
                'name' => 'gram',
                'abbrev' => 'g',
                'toBase' => 0.001
            ],
            'milligram' => [
                'name' => 'milligram',
                'abbrev' => 'mg',
                'toBase' => 0.000001
            ],
            'metricTon' => [
                'name' => 'metric ton',
                'abbrev' => 't',
                'toBase' => 1000
            ],
            'pound' => [
                'name' => 'pound',
                'abbrev' => 'lb',
                'toBase' => 0.45359237
            ],
            'ounce' => [
                'name' => 'ounce',
                'abbrev' => 'oz',
                'toBase' => 0.028349523125
            ],
            'stone' => [
                'name' => 'stone',
                'abbrev' => 'st',
                'toBase' => 6.35029318
            ],
            'shortTon' => [
                'name' => 'short ton (US)',
                'abbrev' => 'ton',
                'toBase' => 907.18474
            ],
            'longTon' => [
                'name' => 'long ton (UK)',
                'abbrev' => 'long ton',
                'toBase' => 1016.0469088
            ],
            'carat' => [
                'name' => 'carat',
                'abbrev' => 'ct',
                'toBase' => 0.0002
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
