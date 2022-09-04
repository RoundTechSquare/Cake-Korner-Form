/**
 * @param {string} s
 * @return {number}
 */
function minimumMoves(s) {
    var getString = s.toString();
    var stringLength = getString.length;
    var stringCheckStatus = '';
    if (3 <= stringLength && stringLength <= 1000) {
        var explodedArray = getString.split("");
        for (i = 0; i < stringLength; i++) {
            if (explodedArray[i] == "X" || explodedArray[i] == "O") {
                stringCheckStatus = 'true';
                continue;
            } else {
                stringCheckStatus = 'false';
                break;
            }
        }

        console.log(stringCheckStatus);
        return true;
    } else {
        return false;
    }
};

minimumMoves("XXXOOO");
