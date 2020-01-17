const content = document.querySelector('body');

// FORM Inscription -------------------------------------------
const insFormElt = document.getElementById('inscription_form');
const insBtnElt = document.getElementById('inscription_btnForm');

let insNameElt = document.getElementById('inscription_name');
let insFirstnameElt = document.getElementById('inscription_firstname');
let insPseudoElt = document.getElementById('inscription_pseudo');
let insEmailElt = document.getElementById('inscription_email');
let insErrorElt = document.getElementById('inscription_error');
insErrorElt.style.display = 'none';

// FORM Login -----------------------------------------------
const loginFormElt = document.getElementById('login_form');
const loginBtnElt = document.getElementById('login_connexion');

let loginEmailElt = document.getElementById('login_email');
let loginPassElt = document.getElementById('login_pass');
let loginErrorElt = document.getElementById('login_error');
loginErrorElt.style.display = 'none';

// FORM Contact -----------------------------------------------
const contactFormElt = document.getElementById('contact_form');
const contactBtnElt = document.getElementById('contact_btnForm');

let contactNameElt = document.getElementById('contact_name');
let contactEmailElt = document.getElementById('contact_email');
let contactMsgElt = document.getElementById('contact_msg');
let contactErrorElt = document.getElementById('contact_error');
contactErrorElt.style.display = 'none';

// FORM Pass -----------------------------------------------
const nxPassFormElt = document.getElementById('nxPass_form');
const nxPassBtnElt = document.getElementById('nxPass_btnForm');

let nxPassEmailElt = document.getElementById('nxPass_email');
let nxPassErrorElt = document.getElementById('nxPass_error');
contactErrorElt.style.display = 'none';

// FORM Add Chapter -----------------------------------------
const nxPassFormElt = document.getElementById('chapter_form');
const nxPassBtnElt = document.getElementById('chapter_btnForm');

let nxPassEmailElt = document.getElementById('chapter_title');
let nxPassErrorElt = document.getElementById('chapter_img');
let nxPassErrorElt = document.getElementById('chapter_imageAlt');
let nxPassErrorElt = document.getElementById('chapter_content');
let nxPassErrorElt = document.getElementById('chapter_error');
contactErrorElt.style.display = 'none';