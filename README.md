# UniConvert

A unit converter with a Windows XP-style interface. Built with PHP.

## Requirements

- PHP 8.0+
- Any web server (Apache, Nginx, or just `php -S localhost:8000`)

## Setup

1. Extract the zip
2. Drop the `uniconvert` folder into your webroot
3. Open in browser

Or for quick testing:

```
cd uniconvert
php -S localhost:8000
```

Then go to http://localhost:8000

## What's in the box

10 conversion categories:

- Length (meters, miles, feet, etc.)
- Mass (kg, pounds, ounces)
- Temperature (Celsius, Fahrenheit, Kelvin)
- Time (seconds through decades)
- Area (sq meters, acres, hectares)
- Volume (liters, gallons, cups)
- Speed (m/s, mph, knots, Mach)
- Data Storage (bytes through petabytes)
- Pressure (pascal, psi, bar, atm)
- Energy (joules, calories, kWh)

## How it works

The UI posts to `api.php` via AJAX for real-time conversion as you type. Each unit category is its own class extending `UnitCategory`. Temperature has special handling since it's not a simple ratio conversion.

## File structure

```
uniconvert/
├── index.php          <- main page
├── api.php            <- AJAX endpoint
├── includes/
│   ├── Converter.php
│   ├── UnitCategory.php
│   └── units/
│       └── [10 unit classes]
└── assets/
    ├── css/
    ├── js/
    ├── UniConverterGeneral.png
    ├── UniConverterLength.png
    ├── UniConverterMass.png
    ├── UniConverterTemperature.png
    └── UniConverterTime.png

```

## Adding new units

Open the relevant file in `includes/units/` and add to the `$this->units` array:

```php
'newUnit' => [
    'name' => 'new unit',
    'abbrev' => 'nu',
    'toBase' => 123.456  // conversion factor to base unit
]
```

For non-linear conversions (like temperature), override the `convert()` method in your unit class.

## License

Do whatever you want with it.
