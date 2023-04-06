// ver cuando es un celular o una pc waly
function isMobile() {
    if (sessionStorage.desktop)
        return false;
    else if (localStorage.mobile)
        return true;
    var mobile = ['iphone', 'ipad', 'android', 'blackberry', 'nokia', 'opera mini', 'windows mobile', 'windows phone', 'iemobile'];
    for (var i in mobile)
        if (navigator.userAgent.toLowerCase().indexOf(mobile[i].toLowerCase()) > 0) return true;
    return false;
}

// const formulario = document.querySelector('#formulario');
// const buttonSubmit = document.querySelector('#submit');
const urlDesktop = 'https://web.whatsapp.com/';
const urlMobile = 'whatsapp://';
const telefono = '+5493516694444';

function mandarWap(){

	console.log ("entro");
    // e.preventDefault()
    // buttonSubmit.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i>'
    // buttonSubmit.disabled = true
    // setTimeout(() => {
        let nombre = "document.querySelector(#nombre).value"
        let apellidos = "document.querySelector(#apellidos).value"
        let email = "document.querySelector(#email).value"
        let mensaje = 'send?phone=' + telefono + 
        	'&text=*_Formulario Easy App CODE_*%0A*'
        	+ '¿Cual es tu nombre?*%0A' + nombre
        	+ '%0A*¿Cuáles son tus apellidos?*%0A' + apellidos 
        	+ '%0A*¿Cuál es tu correo electrónico?*%0A' + email 
        	+ '%0A*¿Cuál es tu correo electrónico?*%0A' + 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png'
        	+ '%0A*¿Cuál es tu foto?*%0A'+ encodeURIComponent('https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png')

        if(isMobile()) {
            window.open(urlMobile + mensaje, '_blank')
        }else{
            window.open(urlDesktop + mensaje, '_blank')
        }

};
