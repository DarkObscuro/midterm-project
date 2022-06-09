/********************************************* Light Theme ************************************************************/

const checkNotEmptyBlueLight = function(id) {
    const elem = document.getElementById(id);
    changeNRStyle(elem, elem.value ? '0 0 3px 0 blue' : '1px 2px 5px rgba(0,0,0,.09)', elem.value ? 'transparent' : '#cbc9c9');
}

const checkNotEmptyRedLight = function(id) {
    const elem = document.getElementById(id);
    const labelicon = document.getElementById('icon' + id);
    changeStyle(elem, labelicon, elem.value ? '#fff' : '#fff', elem.value ? 'blue' : 'red');
}

/********************************************* Dark Theme ************************************************************/

const checkNotEmptyBlueDark = function(id) {
    const elem = document.getElementById(id);
    changeNRStyle(elem, elem.value ? '0 0 3px 0 #0077ff' : '1px 2px 5px rgba(0,0,0,.09)', elem.value ? 'transparent' : '#cbc9c9');
}

const checkNotEmptyRedDark = function(id) {
    const elem = document.getElementById(id);
    const labelicon = document.getElementById('icon' + id);
    changeStyle(elem, labelicon, elem.value ? '#050032' : '#320000', elem.value ? '#0077ff' : 'red');
}

/********************************************* Blue Switch ************************************************************/

const checkNotEmptyBlue = function(id) {
    const themeCSS = document.querySelector("#theme-link-css");;
    if (themeCSS.getAttribute("href") == "css/style.css") {
        checkNotEmptyBlueLight(id);
    } else {
        checkNotEmptyBlueDark(id);
    }
}

/********************************************* Red Switch ************************************************************/

const checkNotEmptyRed = function(id) {
    const themeCSS = document.querySelector("#theme-link-css");;
    if (themeCSS.getAttribute("href") == "css/style.css") {
        checkNotEmptyRedLight(id);
    } else {
        checkNotEmptyRedDark(id);
    }
}

/********************************************* All Fields ************************************************************/

const checkAllFields = function() {
    const fields = document.getElementsByTagName("input");
    for (let i = 0; i < fields.length; i++) {
        const id = fields[i].id;
        if (fields[i].getAttribute("onkeyup") == 'checkNotEmptyBlue(this.id);') {
            checkNotEmptyBlue(id);
        } else if (fields[i].getAttribute("onkeyup") == 'checkString(this.id);') {
            checkString(id);
        } else if (fields[i].getAttribute("onkeyup") == 'checkNotEmpty(this.id);') {
            checkNotEmpty(id);
        } else if (id == "email") {
            checkMail(id);
        } else if (id == "mobilephone") {
            checkPhone(id);
        } else if (id == "dob") {
            checkDate(id);
        } else {
            checkNotEmptyRed(id);
        }
    }
}
