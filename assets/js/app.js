document.addEventListener("DOMContentLoaded", function() {
    var inputUnit = document.getElementById("inputUnit");
    var outputUnit = document.getElementById("outputUnit");
    var inputValue = document.getElementById("inputValue");
    var outputValue = document.getElementById("outputValue");
    var inputAbbrev = document.querySelector(".unit-column:first-child .unit-abbrev");
    var outputAbbrev = document.querySelector(".unit-column:last-child .unit-abbrev");
    var swapBtn = document.getElementById("swapBtn");
    var statusText = document.getElementById("statusText");
    var categorySelect = document.getElementById("categorySelect");

    function getCategory() {
        return categorySelect.value;
    }

    function performConversion() {
        var value = inputValue.value;
        var from = inputUnit.value;
        var to = outputUnit.value;
        var category = getCategory();

        if (value === "" || value === "-") {
            outputValue.value = "";
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "api.php?action=convert&value=" + encodeURIComponent(value) + 
                 "&from=" + encodeURIComponent(from) + 
                 "&to=" + encodeURIComponent(to) + 
                 "&category=" + encodeURIComponent(category), true);
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    outputValue.value = response.result;
                    inputAbbrev.textContent = response.inputAbbrev;
                    outputAbbrev.textContent = response.outputAbbrev;
                }
            }
        };
        xhr.send();
    }

    function updateAbbreviations() {
        var from = inputUnit.value;
        var to = outputUnit.value;
        var category = getCategory();

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "api.php?action=convert&value=1&from=" + encodeURIComponent(from) + 
                 "&to=" + encodeURIComponent(to) + 
                 "&category=" + encodeURIComponent(category), true);
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    inputAbbrev.textContent = response.inputAbbrev;
                    outputAbbrev.textContent = response.outputAbbrev;
                }
            }
        };
        xhr.send();
    }

    inputUnit.addEventListener("change", function() {
        updateAbbreviations();
        performConversion();
    });

    outputUnit.addEventListener("change", function() {
        updateAbbreviations();
        performConversion();
    });

    inputValue.addEventListener("input", performConversion);

    swapBtn.addEventListener("click", function() {
        var tempIndex = inputUnit.selectedIndex;
        inputUnit.selectedIndex = outputUnit.selectedIndex;
        outputUnit.selectedIndex = tempIndex;

        inputValue.value = outputValue.value;

        updateAbbreviations();
        performConversion();
        statusText.textContent = "Units swapped";
    });

    performConversion();
});
