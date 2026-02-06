<?php

require_once __DIR__ . '/../UnitCategory.php';

class Pressure extends UnitCategory
{
    protected string $name = 'Pressure';
    protected string $baseUnit = 'pascal';

    public function __construct()
    {
        $this->units = [
            'pascal' => [
                'name' => 'pascal',
                'abbrev' => 'Pa',
                'toBase' => 1
            ],
            'kilopascal' => [
                'name' => 'kilopascal',
                'abbrev' => 'kPa',
                'toBase' => 1000
            ],
            'megapascal' => [
                'name' => 'megapascal',
                'abbrev' => 'MPa',
                'toBase' => 1000000
            ],
            'bar' => [
                'name' => 'bar',
                'abbrev' => 'bar',
                'toBase' => 100000
            ],
            'millibar' => [
                'name' => 'millibar',
                'abbrev' => 'mbar',
                'toBase' => 100
            ],
            'psi' => [
                'name' => 'pound per square inch',
                'abbrev' => 'psi',
                'toBase' => 6894.757293168
            ],
            'atmosphere' => [
                'name' => 'atmosphere',
                'abbrev' => 'atm',
                'toBase' => 101325
            ],
            'torr' => [
                'name' => 'torr',
                'abbrev' => 'Torr',
                'toBase' => 133.3223684211
            ],
            'mmHg' => [
                'name' => 'millimeter of mercury',
                'abbrev' => 'mmHg',
                'toBase' => 133.322387415
            ],
            'inHg' => [
                'name' => 'inch of mercury',
                'abbrev' => 'inHg',
                'toBase' => 3386.389
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
