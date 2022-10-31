/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/home.js":
/*!*********************!*\
  !*** ./src/home.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _js_navigation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js/navigation */ \"./src/js/navigation.js\");\n/* harmony import */ var _js_scroll_top__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/scroll-top */ \"./src/js/scroll-top.js\");\n/* harmony import */ var _js_scroll_fade__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/scroll-fade */ \"./src/js/scroll-fade.js\");\n\n\n\n\n//# sourceURL=webpack://maenokikaku/./src/home.js?");

/***/ }),

/***/ "./src/js/navigation.js":
/*!******************************!*\
  !*** ./src/js/navigation.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"ToggleNavigation\": () => (/* binding */ ToggleNavigation)\n/* harmony export */ });\n\n\n/**\n * Toggle navigation menu\n */\nconst ToggleNavigation = (() => {\n\n  const BODY = document.body;\n  const BURGER_BUTTON = document.querySelector('[data-burger-button]');\n\n  BURGER_BUTTON.addEventListener('click', () => {\n    BODY.classList.toggle('nav-open');\n  });\n\n})();\n\n\n//# sourceURL=webpack://maenokikaku/./src/js/navigation.js?");

/***/ }),

/***/ "./src/js/scroll-fade.js":
/*!*******************************!*\
  !*** ./src/js/scroll-fade.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"ScrollFadeIn\": () => (/* binding */ ScrollFadeIn)\n/* harmony export */ });\n\n\n/**\n * Behavior to fade in when scrolling\n */\nconst ScrollFadeIn = (() => {\n\n  const FADE_IN_ELEMENTS = document.querySelectorAll('.js-fade-in');\n  const scrollFadeIn = () => {\n    for (let i = 0, len = FADE_IN_ELEMENTS.length; i < len; i++) {\n      const TRIGER_MARGIN = 10;\n      if (window.innerHeight > FADE_IN_ELEMENTS[i].getBoundingClientRect().top + TRIGER_MARGIN) {\n        FADE_IN_ELEMENTS[i].classList.add('is-show');\n      }\n    }\n  }\n  window.addEventListener('load', scrollFadeIn);\n  window.addEventListener('scroll', scrollFadeIn);\n\n})();\n\n\n//# sourceURL=webpack://maenokikaku/./src/js/scroll-fade.js?");

/***/ }),

/***/ "./src/js/scroll-top.js":
/*!******************************!*\
  !*** ./src/js/scroll-top.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"ScrollToTop\": () => (/* binding */ ScrollToTop),\n/* harmony export */   \"ShowScrollToTopButton\": () => (/* binding */ ShowScrollToTopButton)\n/* harmony export */ });\n\n\n/**\n * Behavior when scroll to top button is clicked\n */\nconst ScrollToTop = (() => {\n\n  const SCROLL_TO_TOP_BUTTON = document.querySelector('[data-scroll-to-top-button]');\n\n  SCROLL_TO_TOP_BUTTON.addEventListener('click', (e) => {\n    e.preventDefault();\n    window.scrollTo({\n      top: 0,\n      behavior: 'smooth'\n    });\n  });\n\n})();\n\n/**\n * Show Smooth scroll button\n */\nconst ShowScrollToTopButton = (() => {\n\n  const SCROLL_TO_TOP_BUTTON = document.querySelector('[data-scroll-to-top-button]');\n  const TARGET = document.querySelector('[data-target-for-show-button]');\n\n  const OBSERVER = new IntersectionObserver((entries) => {\n    for (const e of entries) {\n      if (e.isIntersecting) {\n        SCROLL_TO_TOP_BUTTON.classList.remove('is-show');\n      } else {\n        SCROLL_TO_TOP_BUTTON.classList.add('is-show');\n      }\n    }\n  });\n  OBSERVER.observe(TARGET);\n\n})();\n\n\n//# sourceURL=webpack://maenokikaku/./src/js/scroll-top.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/home.js");
/******/ 	
/******/ })()
;