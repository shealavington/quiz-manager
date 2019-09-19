/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VAlert.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/VAlert.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    data: {
      required: true,
      type: String
    },
    type: {
      "default": 'primary',
      type: String
    },
    visible: {
      "default": false,
      type: Boolean
    }
  },
  data: function data() {
    return {
      control: {
        message: this.data,
        type: this.type,
        visible: this.visible
      }
    };
  },
  computed: {
    alertType: function alertType() {
      return this.control.type ? "alert-".concat(this.control.type) : false;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VExampleComponent.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/VExampleComponent.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {}
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VQuiz.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/VQuiz.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _quiz__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../quiz */ "./resources/js/quiz.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    quizData: {
      required: false
    }
  },
  data: function data() {
    return {
      quiz: this.quizData ? new _quiz__WEBPACK_IMPORTED_MODULE_0__["default"](this.quizData) : new _quiz__WEBPACK_IMPORTED_MODULE_0__["default"]()
    };
  },
  methods: {
    showAlert: function showAlert(message) {
      var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'primary';
      this.$root.$refs.alert.control.visible = true;
      this.$root.$refs.alert.control.message = message;
      this.$root.$refs.alert.control.type = type;
    },
    showAlertError: function showAlertError(message) {
      console.log('Error:', message);
      this.showAlert(message, 'danger');
    },
    submitQuiz: function submitQuiz() {
      var canSubmit = true;

      if (this.quiz.isNameBlank()) {
        this.showAlertError('The name of the quiz can\'t be blank');
        canSubmit = false;
      } else if (!this.quiz.hasEnoughQuestions()) {
        this.showAlertError('You\'re required to have at least one question.');
        canSubmit = false;
      } else if (this.quiz.hasBlankQuestions()) {
        this.showAlertError('One or more of the questions are blank.');
        canSubmit = false;
      } else if (this.quiz.hasDuplicateQuestions()) {
        this.showAlertError('One or more of the questions are a duplicate.');
        canSubmit = false;
      } else if (!this.quiz.hasEnoughAnswers()) {
        this.showAlertError('You must have no less or no more than 3-5 answers for each this.quiz.');
        canSubmit = false;
      } else if (this.quiz.hasBlankAnswers()) {
        this.showAlertError('One or more of the answers are blank.');
        canSubmit = false;
      } else if (this.quiz.hasDuplicateAnswers()) {
        this.showAlertError('One or more of the answers are a duplicate.');
        canSubmit = false;
      } else if (this.quiz.isMissingCorrectAnswers()) {
        this.showAlertError('There needs to be at least one correct answer for all questions.');
        canSubmit = false;
      }

      if (canSubmit) {
        this.$root.$refs['quizData'].value = JSON.stringify(this.quiz);
        this.$root.$refs['quizSubmit'].submit();
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VAlert.vue?vue&type=template&id=34a16db1&":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/VAlert.vue?vue&type=template&id=34a16db1& ***!
  \*********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "alert",
      class: [{ "d-none": !_vm.control.visible }, _vm.alertType],
      attrs: { role: "alert" }
    },
    [
      _c("span", { domProps: { innerHTML: _vm._s(_vm.control.message) } }),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: { type: "button", "aria-label": "close" },
          on: {
            click: function($event) {
              _vm.control.visible = false
            }
          }
        },
        [_c("span", { attrs: { "aria-hidden": "true" } }, [_vm._v("×")])]
      )
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VExampleComponent.vue?vue&type=template&id=b3568824&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/VExampleComponent.vue?vue&type=template&id=b3568824& ***!
  \********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container" }, [
    _c("div", { staticClass: "row justify-content-center" }, [
      _c("div", { staticClass: "col-md-8" }, [
        _c("div", { staticClass: "card" }, [
          _c(
            "div",
            { staticClass: "card-header" },
            [
              _vm._t("title", [
                _vm._v(
                  "\n                        Example Component\n                    "
                )
              ])
            ],
            2
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "card-body" },
            [
              _vm._t("default", [
                _vm._v(
                  "\n                        I'm an example component.\n                    "
                )
              ])
            ],
            2
          )
        ])
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VQuiz.vue?vue&type=template&id=213411e0&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/VQuiz.vue?vue&type=template&id=213411e0& ***!
  \********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("div", { staticClass: "jumbotron mb-2" }, [
      _c(
        "h1",
        { staticClass: "display-4" },
        [_vm._t("header", [_vm._v("Quiz Settings")])],
        2
      ),
      _vm._v(" "),
      _c("p", { staticClass: "lead" }, [
        _vm._v("Edit the settings of the quiz here.")
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "input-group mb-3" }, [
        _vm._m(0),
        _vm._v(" "),
        _c("input", {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.quiz.name,
              expression: "quiz.name"
            }
          ],
          staticClass: "form-control",
          attrs: { type: "text", placeholder: "Name..." },
          domProps: { value: _vm.quiz.name },
          on: {
            input: function($event) {
              if ($event.target.composing) {
                return
              }
              _vm.$set(_vm.quiz, "name", $event.target.value)
            }
          }
        })
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "input-group mb-3" }, [
        _vm._m(1),
        _vm._v(" "),
        _c("input", {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.quiz.description,
              expression: "quiz.description"
            }
          ],
          staticClass: "form-control",
          attrs: { type: "text", placeholder: "Description..." },
          domProps: { value: _vm.quiz.description },
          on: {
            input: function($event) {
              if ($event.target.composing) {
                return
              }
              _vm.$set(_vm.quiz, "description", $event.target.value)
            }
          }
        })
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "btn-toolbar justify-content-between" }, [
        _c("div", { staticClass: "btn-group mr-2" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-primary",
              attrs: { type: "button" },
              on: {
                click: function($event) {
                  return _vm.quiz.questionAdd({})
                }
              }
            },
            [_vm._v("Add Question")]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "btn-group" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-success",
              attrs: { type: "button" },
              on: { click: _vm.submitQuiz }
            },
            [_vm._v("Save Quiz")]
          )
        ])
      ])
    ]),
    _vm._v(" "),
    _c("div", { attrs: { id: "quiz-region" } }, [
      _c("div", { staticClass: "row" }, [
        _c(
          "div",
          { staticClass: "col-md-12" },
          _vm._l(_vm.quiz.questions, function(question, qIndex) {
            return _c(
              "div",
              {
                key: qIndex + question.question,
                staticClass: "card my-3",
                attrs: { id: "questions" }
              },
              [
                _c("div", { staticClass: "card-header" }, [
                  _c("div", { staticClass: "input-group" }, [
                    _vm._m(2, true),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: question.question,
                          expression: "question.question"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { type: "text" },
                      domProps: { value: question.question },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(question, "question", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "input-group-append",
                        attrs: { id: "button-addon3" }
                      },
                      [
                        _vm.quiz.questions.length > 1
                          ? _c(
                              "button",
                              {
                                staticClass: "btn btn-primary",
                                attrs: { type: "button" },
                                on: {
                                  click: function($event) {
                                    _vm.quiz.questionMoveUp(question.id)
                                    _vm.$forceUpdate()
                                  }
                                }
                              },
                              [
                                _vm._v(
                                  "\n                                    Move Up\n                                "
                                )
                              ]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _c(
                          "button",
                          {
                            staticClass: "btn btn-outline-primary",
                            attrs: { type: "button" },
                            on: {
                              click: function($event) {
                                return _vm.quiz.questionRemove(question.id)
                              }
                            }
                          },
                          [
                            _vm._v(
                              "\n                                    ×\n                                "
                            )
                          ]
                        )
                      ]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "card-body" },
                  [
                    _vm._l(_vm.quiz.getQuestionAnswers(question.id), function(
                      answer,
                      aIndex
                    ) {
                      return _c(
                        "div",
                        {
                          key: aIndex,
                          staticClass: "input-group mb-3",
                          attrs: { id: "answers" }
                        },
                        [
                          _c("div", { staticClass: "input-group-prepend" }, [
                            _c("div", { staticClass: "input-group-text" }, [
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: answer.is_correct,
                                    expression: "answer.is_correct"
                                  }
                                ],
                                attrs: {
                                  type: "checkbox",
                                  "aria-label":
                                    "Checkbox for following text input"
                                },
                                domProps: {
                                  checked: Array.isArray(answer.is_correct)
                                    ? _vm._i(answer.is_correct, null) > -1
                                    : answer.is_correct
                                },
                                on: {
                                  change: function($event) {
                                    var $$a = answer.is_correct,
                                      $$el = $event.target,
                                      $$c = $$el.checked ? true : false
                                    if (Array.isArray($$a)) {
                                      var $$v = null,
                                        $$i = _vm._i($$a, $$v)
                                      if ($$el.checked) {
                                        $$i < 0 &&
                                          _vm.$set(
                                            answer,
                                            "is_correct",
                                            $$a.concat([$$v])
                                          )
                                      } else {
                                        $$i > -1 &&
                                          _vm.$set(
                                            answer,
                                            "is_correct",
                                            $$a
                                              .slice(0, $$i)
                                              .concat($$a.slice($$i + 1))
                                          )
                                      }
                                    } else {
                                      _vm.$set(answer, "is_correct", $$c)
                                    }
                                  }
                                }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: answer.answer,
                                expression: "answer.answer"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Answer Here..."
                            },
                            domProps: { value: answer.answer },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(answer, "answer", $event.target.value)
                              }
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "input-group-append",
                              attrs: { id: "button-addon3" }
                            },
                            [
                              _c(
                                "button",
                                {
                                  staticClass: "btn btn-outline-secondary",
                                  attrs: { type: "button" },
                                  on: {
                                    click: function($event) {
                                      return _vm.quiz.answerRemove(answer.id)
                                    }
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                        ×\n                                "
                                  )
                                ]
                              )
                            ]
                          )
                        ]
                      )
                    }),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-primary",
                        attrs: { type: "submit" },
                        on: {
                          click: function($event) {
                            return _vm.quiz.answerAdd({
                              question_id: question.id
                            })
                          }
                        }
                      },
                      [_vm._v("+ Add Answer")]
                    )
                  ],
                  2
                )
              ]
            )
          }),
          0
        )
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c("span", { staticClass: "input-group-text" }, [_vm._v("Name:")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c("span", { staticClass: "input-group-text" }, [_vm._v("Description:")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c("span", { staticClass: "input-group-text" }, [_vm._v("Question:")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js sync recursive \\.vue$/":
/*!***********************************!*\
  !*** ./resources/js sync \.vue$/ ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./components/VAlert.vue": "./resources/js/components/VAlert.vue",
	"./components/VExampleComponent.vue": "./resources/js/components/VExampleComponent.vue",
	"./components/VQuiz.vue": "./resources/js/components/VQuiz.vue"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./resources/js sync recursive \\.vue$/";

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
var files = __webpack_require__("./resources/js sync recursive \\.vue$/");

files.keys().map(function (key) {
  return Vue.component(key.split('/').pop().split('.')[0], files(key)["default"]);
}); // Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
  el: '#app'
});

/***/ }),

/***/ "./resources/js/components/VAlert.vue":
/*!********************************************!*\
  !*** ./resources/js/components/VAlert.vue ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VAlert_vue_vue_type_template_id_34a16db1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VAlert.vue?vue&type=template&id=34a16db1& */ "./resources/js/components/VAlert.vue?vue&type=template&id=34a16db1&");
/* harmony import */ var _VAlert_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VAlert.vue?vue&type=script&lang=js& */ "./resources/js/components/VAlert.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VAlert_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VAlert_vue_vue_type_template_id_34a16db1___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VAlert_vue_vue_type_template_id_34a16db1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/VAlert.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/VAlert.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/components/VAlert.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VAlert_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./VAlert.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VAlert.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VAlert_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/VAlert.vue?vue&type=template&id=34a16db1&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/VAlert.vue?vue&type=template&id=34a16db1& ***!
  \***************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VAlert_vue_vue_type_template_id_34a16db1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./VAlert.vue?vue&type=template&id=34a16db1& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VAlert.vue?vue&type=template&id=34a16db1&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VAlert_vue_vue_type_template_id_34a16db1___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VAlert_vue_vue_type_template_id_34a16db1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/VExampleComponent.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/VExampleComponent.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VExampleComponent_vue_vue_type_template_id_b3568824___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VExampleComponent.vue?vue&type=template&id=b3568824& */ "./resources/js/components/VExampleComponent.vue?vue&type=template&id=b3568824&");
/* harmony import */ var _VExampleComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VExampleComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/VExampleComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VExampleComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VExampleComponent_vue_vue_type_template_id_b3568824___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VExampleComponent_vue_vue_type_template_id_b3568824___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/VExampleComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/VExampleComponent.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/VExampleComponent.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VExampleComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./VExampleComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VExampleComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VExampleComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/VExampleComponent.vue?vue&type=template&id=b3568824&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/VExampleComponent.vue?vue&type=template&id=b3568824& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VExampleComponent_vue_vue_type_template_id_b3568824___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./VExampleComponent.vue?vue&type=template&id=b3568824& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VExampleComponent.vue?vue&type=template&id=b3568824&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VExampleComponent_vue_vue_type_template_id_b3568824___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VExampleComponent_vue_vue_type_template_id_b3568824___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/VQuiz.vue":
/*!*******************************************!*\
  !*** ./resources/js/components/VQuiz.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VQuiz_vue_vue_type_template_id_213411e0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VQuiz.vue?vue&type=template&id=213411e0& */ "./resources/js/components/VQuiz.vue?vue&type=template&id=213411e0&");
/* harmony import */ var _VQuiz_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VQuiz.vue?vue&type=script&lang=js& */ "./resources/js/components/VQuiz.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VQuiz_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VQuiz_vue_vue_type_template_id_213411e0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VQuiz_vue_vue_type_template_id_213411e0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/VQuiz.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/VQuiz.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/components/VQuiz.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VQuiz_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./VQuiz.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VQuiz.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VQuiz_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/VQuiz.vue?vue&type=template&id=213411e0&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/VQuiz.vue?vue&type=template&id=213411e0& ***!
  \**************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VQuiz_vue_vue_type_template_id_213411e0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./VQuiz.vue?vue&type=template&id=213411e0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VQuiz.vue?vue&type=template&id=213411e0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VQuiz_vue_vue_type_template_id_213411e0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VQuiz_vue_vue_type_template_id_213411e0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/quiz.js":
/*!******************************!*\
  !*** ./resources/js/quiz.js ***!
  \******************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Quiz; });
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function uuidv4() {
  return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, function (c) {
    return (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16);
  });
}

function temporaryId() {
  return '_' + uuidv4();
}

function isTemporaryId(id) {
  return id[0] === '_';
}

var Answer = function Answer() {
  var answer = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

  _classCallCheck(this, Answer);

  this.id = answer.id ? answer.id : temporaryId();
  this.answer = answer.answer ? answer.answer : '';
  this.is_correct = answer.is_correct ? answer.is_correct : false;
  this.question_id = answer.question_id ? answer.question_id : null;
};

var Question = function Question() {
  var question = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

  _classCallCheck(this, Question);

  this.id = question.id ? question.id : temporaryId();
  this.question = question.question ? question.question : '';
  this.sort = question.sort ? question.sort : 0;
  this.quiz_id = question.quiz_id ? question.quiz_id : null;
};

var Quiz =
/*#__PURE__*/
function () {
  function Quiz() {
    var _this = this;

    var quiz = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

    _classCallCheck(this, Quiz);

    this.id = quiz.id ? quiz.id : temporaryId();
    this.uuid = quiz.uuid ? quiz.uuid : null;
    this.name = quiz.name ? quiz.name : '';
    this.description = quiz.description ? quiz.description : null;
    this.user_id = quiz.user_id ? quiz.user_id : null;
    this.questions = [];
    this.answers = [];
    this.deletedQuestions = [];
    this.deletedAnswers = [];

    if (quiz.questions) {
      quiz.questions.forEach(function (question) {
        _this.questionAdd(question);
      });
    }

    if (quiz.answers) {
      quiz.answers.forEach(function (question) {
        _this.answerAdd(question);
      });
    }
  }

  _createClass(Quiz, [{
    key: "answerAdd",
    value: function answerAdd(answer) {
      this.answers.push(new Answer(answer));
      return this;
    }
  }, {
    key: "questionAdd",
    value: function questionAdd(question) {
      this.questions.push(new Question(question));
      return this;
    }
  }, {
    key: "answerRemove",
    value: function answerRemove(answerId) {
      var answerIndex = this.answers.findIndex(function (answer) {
        return answer.id === answerId;
      });

      if (!isTemporaryId(answerId)) {
        this.deletedAnswers.push(this.answers[answerIndex]);
      }

      this.answers.splice(answerIndex, 1);
      return this;
    }
  }, {
    key: "questionRemove",
    value: function questionRemove(questionId) {
      if (!confirm('Are you sure? This will remove all the answers too.')) {
        return;
      }

      var questionIndex = this.questions.findIndex(function (question) {
        return question.id === questionId;
      });

      if (!isTemporaryId(questionId)) {
        this.deletedQuestions.push(this.questions[questionIndex]);
      }

      this.answers = this.answers.filter(function (answer) {
        return answer.question_id !== questionId;
      });
      this.questions.splice(questionIndex, 1);
      return this;
    }
  }, {
    key: "questionMoveUp",
    value: function questionMoveUp(qId) {
      var questionIndex = this.questions.findIndex(function (q) {
        return q.id === qId;
      });
      console.log(questionIndex);

      if (questionIndex === 0) {
        this.questions.push(this.questions.shift());
      } else {
        var replacement = this.questions[questionIndex - 1];
        this.questions[questionIndex - 1] = this.questions[questionIndex];
        this.questions[questionIndex] = replacement;
      }

      return this;
    }
  }, {
    key: "getQuestionAnswers",
    value: function getQuestionAnswers(questionId) {
      var answers = this.answers.filter(function (answer) {
        return answer.question_id === questionId;
      });
      return answers;
    } // Checks & Validation

  }, {
    key: "hasEnoughQuestions",
    value: function hasEnoughQuestions() {
      return this.questions.length > 0 ? true : false;
    }
  }, {
    key: "hasBlankQuestions",
    value: function hasBlankQuestions() {
      var isBlank = false;
      this.questions.forEach(function (question) {
        if (question.question == '') {
          isBlank = true;
        }
      });
      return isBlank;
    }
  }, {
    key: "hasDuplicateQuestions",
    value: function hasDuplicateQuestions() {
      var hasDuplicate = false;
      var questions = [];
      this.questions.forEach(function (question) {
        if (questions.includes(question.question)) {
          hasDuplicate = true;
        }

        questions.push(question.question);
      });
      return hasDuplicate;
    }
  }, {
    key: "hasEnoughAnswers",
    value: function hasEnoughAnswers() {
      var _this2 = this;

      var hasEnough = true;
      this.questions.forEach(function (question) {
        var answers = _this2.getQuestionAnswers(question.id);

        if (answers.length < 3 || answers.length > 5) {
          console.log('aa');
          hasEnough = false;
        }
      });
      return hasEnough;
    }
  }, {
    key: "hasBlankAnswers",
    value: function hasBlankAnswers() {
      var isBlank = false;
      this.answers.forEach(function (answer) {
        if (answer.answer == '') {
          isBlank = true;
        }
      });
      return isBlank;
    }
  }, {
    key: "hasDuplicateAnswers",
    value: function hasDuplicateAnswers() {
      var _this3 = this;

      var hasDuplicate = false;
      this.questions.forEach(function (question) {
        var answers = _this3.getQuestionAnswers(question.id);

        var answerList = [];
        answers.forEach(function (answer) {
          if (answerList.includes(answer.answer)) {
            hasDuplicate = true;
          }

          answerList.push(answer.answer);
        });
      });
      return hasDuplicate;
    }
  }, {
    key: "isMissingCorrectAnswers",
    value: function isMissingCorrectAnswers() {
      var _this4 = this;

      var isMissingCorrectAnswer = false;
      this.questions.forEach(function (question) {
        var answers = _this4.getQuestionAnswers(question.id);

        var correctAnswerFound = false;
        answers.forEach(function (answer) {
          if (answer.is_correct) {
            correctAnswerFound = true;
          }
        });

        if (!correctAnswerFound) {
          isMissingCorrectAnswer = true;
        }
      });
      return isMissingCorrectAnswer;
    }
  }, {
    key: "isNameBlank",
    value: function isNameBlank() {
      return this.name === '' || this.name === null ? true : false;
    }
  }]);

  return Quiz;
}();



/***/ }),

/***/ 1:
/*!***********************************!*\
  !*** multi ./resources/js/app.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! I:\quiz-manager\resources\js\app.js */"./resources/js/app.js");


/***/ })

/******/ });