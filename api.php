<?php
header('Content-Type: application/json');

require_once 'includes/Converter.php';
require_once 'includes/units/Length.php';
require_once 'includes/units/Mass.php';
require_once 'includes/units/Temperature.php';
require_once 'includes/units/Time.php';
require_once 'includes/units/Area.php';
require_once 'includes/units/Volume.php';
require_once 'includes/units/Speed.php';
require_once 'includes/units/DataStorage.php';
require_once 'includes/units/Pressure.php';
require_once 'includes/units/Energy.php';

$converter = new Converter();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'convert':
        $value = floatval($_GET['value'] ?? 0);
        $from = $_GET['from'] ?? '';
        $to = $_GET['to'] ?? '';
        $category = $_GET['category'] ?? '';
        
        $result = $converter->convert($value, $from, $to, $category);
        $inputInfo = $converter->getUnitInfo($category, $from);
        $outputInfo = $converter->getUnitInfo($category, $to);
        
        echo json_encode([
            'success' => true,
            'result' => $result,
            'inputAbbrev' => $inputInfo['abbrev'] ?? '',
            'outputAbbrev' => $outputInfo['abbrev'] ?? ''
        ]);
        break;
        
    case 'units':
        $category = $_GET['category'] ?? '';
        $units = $converter->getUnits($category);
        
        echo json_encode([
            'success' => true,
            'units' => $units
        ]);
        break;
        
    default:
        echo json_encode(['success' => false, 'error' => 'Invalid action']);
}
