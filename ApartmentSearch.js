var outResult;
var size = 0;
var neighborhood = 0;
var priceRange = 10000; //set as no-limit option or the effective 'zero'

function makeVisible(value) {
    document.getElementById("output").innerHTML = outResult;
    dom = document.getElementById("expertSuggestions").style;
    if (value == true){
      dom.visibility = "visible";
    }
    else if (value == false){
      dom.visibility = "hidden";
    }
}


function expertSuggestions() {
    var warning = ["It is very difficult to find an apartment larger than 5 1⁄2 in downtown", "Normally an apartment of 4 1⁄2 and above costs more than 1000$ in downtown area"];
          //  outResult = size + " " + neighborhood + " " + priceRange; // to diagnose input values
          //  makeVisible();

    if ((neighborhood > 0) && (size >= 10000)) {
        outResult = warning[0];
        if ((priceRange < 1000) && (priceRange > 300)) {
            outResult = outResult + "<br>" + warning[1];
        }
        makeVisible(true);
        // size 10000 means more than 5 1/2, size 100 means 4 1/2
    } else if ((neighborhood > 0) && ((size > 100) && (size < 10000)) && (priceRange < 1000)) {
        outResult = warning[1];
        makeVisible(true);
    } else {
        outResult = "&nbsp;";
        makeVisible(false);
    }
}

function checkPriceRange(value) {
    priceRange = parseFloat(value);
    expertSuggestions();
}

// value of 1 signifies that the neighborhood of "downtown" is amongst selected options
function isDowntown(value) {
    if (value == 1 && neighborhood == 1) {
        neighborhood = 0;
    } else if (value == 0 && neighborhood == 1) {
        neighborhood = 1;
    } else if (value == 0 && neighborhood == 0) {
        neighborhood = 0;
    } else if (value == 1 && neighborhood == 0) {
        neighborhood = 1;
    }
    expertSuggestions();
}

// value of 1 signifies studio, 10 signifies 3 1/2, 100 for 4 1/2, 1000 for 5 1/2 and 10000 for more than 5 1/2
function checkSize(value) {
  if (value%10 == 1 && size%10 == 0){
    size = size + 1;
    expertSuggestions();
  }

  else if (value%10 == 1 && size%10 == 1){
    size = size - 1;
    expertSuggestions();
  }

  else if (value%100 == 10 && size%100 < 10){
    size = size + 10;
    expertSuggestions();
  }

  else if (value%100 == 10 && size%100 >= 10){
    size = size - 10;
    expertSuggestions();
  }

  else if (value%1000 == 100 && size%1000 < 100){
    size = size + 100;
    expertSuggestions();
  }

  else if (value%1000 == 100 && size%1000 >= 100){
    size = size - 100;
    expertSuggestions();
  }

  else if (value%10000 == 1000 && size%10000 < 1000){
    size = size + 1000;
    expertSuggestions();
  }

  else if (value%10000 == 1000 && size%10000 >= 1000){
    size = size - 1000;
    expertSuggestions();
  }

  else if (value%100000 == 10000 && size%100000 < 10000){
    size = size + 10000;
    expertSuggestions();
  }

  else if (value%100000 == 10000 && size%100000 >= 10000){
    size = size - 10000;
    expertSuggestions();
  }
}

//for 'start over' reset button
function resetSearch() {
  size = 0;
  neighborhood = 0;
  priceRange = 10000;
  expertSuggestions();
}
