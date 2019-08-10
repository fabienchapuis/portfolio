/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');


// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

'use strict';
var pause = 10;
var speed = 5;
var texts = ['Développeur Web junior', 'Développeur Back-end', 'Développeur Chevronné'];
(function () {
    var text = texts[0];
    var cur = 0,
        dir = 1,
        cur_text = 0;

    var s = 0;

    setInterval(function loop() {
        cur += dir;
        if (cur < 0) {
            cur = 0;
            dir = -dir;
            cur_text = (++cur_text) % 3;
            text = texts[cur_text];
        }
        if (cur > text.length) {
            cur = text.length;
            if (s++ > pause) {
                s = 0
                dir = -dir;
            }
        }
        document.querySelector('#type').setAttribute('class', text.toLowerCase())
        document.querySelector('#type').innerHTML = text.substring(0, cur);
    }, 500 / speed)

})()


const burger = document.getElementById('burger');
const burgerName = document.querySelector('p');
const nav = document.querySelector('nav');

function changeIcon() {
    if (!this.classList.contains('effect')) {
        burger.classList.add('effect');
        burgerName.textContent = 'Close';
        nav.classList.add('show');
    } else {
        burger.classList.remove('effect');
        burgerName.textContent = 'Menu';
        nav.classList.remove('show');
    }
}

burger.addEventListener('click', changeIcon);