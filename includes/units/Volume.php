<?php

require_once __DIR__ . '/../UnitCategory.php';

class Volume extends UnitCategory
{
    protected string $name = 'Volume';
    protected string $baseUnit = 'liter';

    public function __construct()
    {
        $this->units = [
            'liter' => [
                'name' => 'liter',
                'abbrev' => 'L',
                'toBase' => 1
            ],
            'milliliter' => [
                'name' => 'milliliter',
                'abbrev' => 'mL',
                'toBase' => 0.001
            ],
            'cubicMeter' => [
                'name' => 'cubic meter',
                'abbrev' => 'm続',
                'toBase' => 1000
            ],
            'cubicCentimeter' => [
                'name' => 'cubic centimeter',
                'abbrev' => 'cm続',
                'toBase' => 0.001
            ],
            'gallon' => [
                'name' => 'gallon (US)',
                'abbrev' => 'gal',
                'toBase' => 3.785411784
            ],
            'gallonUK' => [
                'name' => 'gallon (UK)',
                'abbrev' => 'gal UK',
                'toBase' => 4.54609
            ],
            'quart' => [
                'name' => 'quart (US)',
                'abbrev' => 'qt',
                'toBase' => 0.946352946
            ],
            'pint' => [
                'name' => 'pint (US)',
                'abbrev' => 'pt',
                'toBase' => 0.473176473
            ],
            'cup' => [
                'name' => 'cup (US)',
                'abbrev' => 'cup',
                'toBase' => 0.2365882365
            ],
            'fluidOunce' => [
                'name' => 'fluid ounce (US)',
                'abbrev' => 'fl oz',
                'toBase' => 0.0295735295625
            ],
            'tablespoon' => [
                'name' => 'tablespoon',
                'abbrev' => 'tbsp',
                'toBase' => 0.01478676478125
            ],
            'teaspoon' => [
                'name' => 'teaspoon',
                'abbrev' => 'tsp',
                'toBase' => 0.00492892159375
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
