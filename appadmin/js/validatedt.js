
/****************************************************************/

function istxt(s)
    {
		var tx;
        tx = /^[A-Za-z",._'\s]*$/i;
        if (tx.test(s) == true)
			return true;
        else
			return false;
	}

/****************************************************************/

function isEmail(s)
    {
		var re;
        re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
        if (re.test(s) == true)
			return true;
        else
			return false;
	}

/****************************************************************/

// whitespace characters
var whitespace = " \t\n\r";

/****************************************************************/

// Check whether string s is empty.

function isEmpty(s)
{   return ((s == null) || (s.length == 0))
}

/****************************************************************/

// Returns true if string s is empty or 
// whitespace characters only.

function isWhitespace (s)

{   var i;

    // Is s empty?
    if (isEmpty(s)) return true;

    // Search through string's characters one by one
    // until we find a non-whitespace character.
    // When we do, return false; if we don't, return true.

    for (i = 0; i < s.length; i++)
    {   
	// Check that current character isn't whitespace.
	var c = s.charAt(i);

	if (whitespace.indexOf(c) == -1) return false;
    }

    // All characters are whitespace.
    return true;
}

function valForm2(frm){
	alert("jff"+frm.email.value);
	if(isWhitespace(frm.email.value) ) {
		alert("Please enter the Login Name.");
		frm.email.focus();
		return false;
	}
	if(isWhitespace(frm.password.value) ) {
		alert("Please enter the Password.");
		frm.password.focus();
		return false;
	}
}	

/****************************************************************/

function validUsername(str) {
	return str.length>1 && isAlphaNumeric(str) && isNaN(str.substring(0,1));
}

/****************************************************************/

function validPassword(str) {
	return str.length>1 && isAlphaNumeric(str) && isNaN(str.substring(0,1));
}

/****************************************************************/

function isAlphaNumeric(str) {
	return str == str.replace(/[^a-zA-Z0-9_-]+/g,'');
}

/****************************************************************/

function validPrice(str) {
	return str.length>0 && isNaN(str.substring(0,1));
}

/****************************************************************/

function validNumberVal(str) {
	return str.length>0 && isNaN(str.substring(0));
}

/****************************************************************/

