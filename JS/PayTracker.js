function validateForm() {
    var gpay = Number(document.getElementById('gpay').value);
    var tax = Number(document.getElementById('tax').value);
    var tips = Number(document.getElementById('tips').value);
    var deductions = tax + tips;
    var ppstart = document.getElementById('ppstart').value;
    var ppend = document.getElementById('ppend').value;
    var pdate = document.getElementById('pdate').value;
    if(ppstart > ppend){
        alert("INVALID ENTRY: End of pay period must be after the beginning.");
        return false;
    } else if(pdate < ppend && pdate != ppend) {
        alert("INVALID ENTRY: Pay date must be after or the same day as the end of the pay period.");
        return false;
    } else if(gpay < deductions) {
        alert("INVALID ENTRY: Gross pay must be greater than the tax plus tips. Otherwise your Net pay would be negative or zero.");
        console.log(deductions);
        return false;
    } else if (ppstart == null || ppend == null || pdate == null){
        alert("INVALID ENTRY: Please enter a value for all dates");
        return false;
    } else {
        alert("Success!");
        return true;
    }
}

function validatePayHistory() {
    var start = document.getElementById('start').value;
    var end = document.getElementById('end').value;
    if(start > end){
        alert("INVALID ENTRY: Start date must be before end date");
        return false;
    } else {
        return true;
    }
}
