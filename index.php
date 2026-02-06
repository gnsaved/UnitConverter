<?php
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
$categories = $converter->getCategories();
$currentCategory = $_GET['category'] ?? 'length';
$units = $converter->getUnits($currentCategory);

$inputUnit = $_POST['input_unit'] ?? ($units[0]['id'] ?? '');
$outputUnit = $_POST['output_unit'] ?? ($units[1]['id'] ?? $inputUnit);
$inputValue = $_POST['input_value'] ?? '1';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['convert'])) {
    $result = $converter->convert(
        floatval($inputValue),
        $inputUnit,
        $outputUnit,
        $currentCategory
    );
}

$inputInfo = $converter->getUnitInfo($currentCategory, $inputUnit);
$outputInfo = $converter->getUnitInfo($currentCategory, $outputUnit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniConvert - Unit Converter</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/window.css">
    <link rel="stylesheet" href="assets/css/controls.css">
</head>
<body>
    <div class="desktop">
        <div class="window" id="mainWindow">
            <div class="title-bar">
                <div class="title-bar-icon"></div>
                <span class="title-bar-text">UniConvert</span>
                <div class="title-bar-controls">
                    <button class="title-btn minimize"></button>
                    <button class="title-btn maximize"></button>
                    <button class="title-btn close"></button>
                </div>
            </div>
            
            <div class="menu-bar">
                <span class="menu-item">File</span>
                <span class="menu-item">Edit</span>
                <span class="menu-item">Help</span>
            </div>
            
            <div class="window-body">
                <div class="main-content">
                    <div class="left-panel">
                        <div class="form-group">
                            <label class="field-label">Select Category</label>
                            <select id="categorySelect" class="dropdown" onchange="window.location.href='?category='+this.value">
                                <?php foreach ($categories as $cat): ?>
                                <option value="<?= htmlspecialchars($cat['id']) ?>" <?= $cat['id'] === $currentCategory ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat['name']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <form method="post" action="?category=<?= htmlspecialchars($currentCategory) ?>" id="convertForm">
                            <div class="units-section">
                                <label class="field-label">Select Units</label>
                                <div class="units-container">
                                    <div class="unit-column">
                                        <span class="column-header">INPUT</span>
                                        <select name="input_unit" id="inputUnit" class="unit-list" size="10">
                                            <?php foreach ($units as $unit): ?>
                                            <option value="<?= htmlspecialchars($unit['id']) ?>" <?= $unit['id'] === $inputUnit ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($unit['name']) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="unit-abbrev"><?= htmlspecialchars($inputInfo['abbrev'] ?? '') ?></div>
                                    </div>
                                    
                                    <div class="swap-button-container">
                                        <button type="button" id="swapBtn" class="swap-btn" title="Swap units">⇄</button>
                                    </div>
                                    
                                    <div class="unit-column">
                                        <span class="column-header">OUTPUT</span>
                                        <select name="output_unit" id="outputUnit" class="unit-list" size="10">
                                            <?php foreach ($units as $unit): ?>
                                            <option value="<?= htmlspecialchars($unit['id']) ?>" <?= $unit['id'] === $outputUnit ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($unit['name']) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="unit-abbrev"><?= htmlspecialchars($outputInfo['abbrev'] ?? '') ?></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="result-section">
                                <label class="field-label">Result</label>
                                <div class="result-container">
                                    <input type="text" name="input_value" id="inputValue" class="result-input" 
                                           value="<?= htmlspecialchars($inputValue) ?>" placeholder="Enter value">
                                    <input type="text" id="outputValue" class="result-input" readonly 
                                           value="<?= htmlspecialchars($result) ?>">
                                </div>
                            </div>
                            
                            <input type="hidden" name="convert" value="1">
                        </form>
                    </div>
                    
                    <div class="right-panel">
                        <div class="logo-container">
                            <div class="logo">
                                <span class="logo-icon">⚙</span>
                                <span class="logo-text">UniConvert</span>
                                <span class="logo-tagline">Precision Unit Conversion</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="status-bar">
                    <span id="statusText">Ready</span>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
