webpackJsonp([2],{

/***/ 12:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var log = function log() {
    ///  console.log.apply(this, v);
    //$('#status').text(v.join(','));
};
var error = function error() {
    for (var _len = arguments.length, v = Array(_len), _key = 0; _key < _len; _key++) {
        v[_key] = arguments[_key];
    }

    console.error.apply(this, v);
    //$('#status').text(v.join(','));
};

var Log = exports.Log = function () {
    function Log() {
        _classCallCheck(this, Log);
    }

    _createClass(Log, null, [{
        key: "log",
        value: function log() {
            ///  console.log.apply(this, v);
            //$('#status').text(v.join(','));
        }
    }, {
        key: "debug",
        value: function debug() {
            ///  console.log.apply(this, v);
            //$('#status').text(v.join(','));
        }
    }, {
        key: "error",
        value: function error() {
            for (var _len2 = arguments.length, v = Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
                v[_key2] = arguments[_key2];
            }

            console.error.apply(this, v);
            //$('#status').text(v.join(','));
        }
    }]);

    return Log;
}();

exports.log = log;
exports.error = error;

/***/ }),

/***/ 14:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.Size = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _point = __webpack_require__(23);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Size = exports.Size = function () {
    function Size() {
        var wd = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : -1;
        var ht = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : -1;

        _classCallCheck(this, Size);

        this.wd = wd;
        this.ht = ht;
    }

    _createClass(Size, [{
        key: "equals",
        value: function equals(otherSize) {
            return this.wd == otherSize.wd && this.ht == otherSize.ht;
        }
    }, {
        key: "clone",
        value: function clone() {
            return new Size(this.wd, this.ht);
        }
    }, {
        key: "add",
        value: function add(size) {
            return new Size(this.wd + size.wd, this.ht + size.ht);
        }
    }, {
        key: "sub",
        value: function sub(size) {
            return new Size(this.wd - size.wd, this.ht - size.ht);
        }
    }, {
        key: "mul",
        value: function mul(ratio) {
            return new Size(this.wd * ratio, this.ht * ratio);
        }
    }, {
        key: "isNull",
        value: function isNull() {
            return this.wd == 0 && this.ht == 0;
        }
    }, {
        key: "isEmpty",
        value: function isEmpty() {
            return this.wd < 1 || this.ht < 1;
        }
    }, {
        key: "isValid",
        value: function isValid() {
            return this.wd >= 0 && this.ht >= 0;
        }
    }, {
        key: "width",
        value: function width() {
            return this.wd;
        }
    }, {
        key: "height",
        value: function height() {
            return this.ht;
        }
    }, {
        key: "resize",
        value: function resize(w, h) {
            this.wd = w;
            this.ht = h;
        }
    }, {
        key: "setWidth",
        value: function setWidth(w) {
            this.wd = w;
        }
    }, {
        key: "setHeight",
        value: function setHeight(h) {
            this.ht = h;
        }
    }, {
        key: "ratio",
        value: function ratio() {
            return this.wd / this.ht;
        }
    }, {
        key: "area",
        value: function area() {
            return this.wd * this.ht;
        }
    }, {
        key: "toPoint",
        value: function toPoint() {
            return new _point.Point(this.wd, this.ht);
        }
    }]);

    return Size;
}();

/***/ }),

/***/ 15:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.DataBuffer = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _position = __webpack_require__(48);

var _pixel = __webpack_require__(83);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var DataBuffer = exports.DataBuffer = function () {
    function DataBuffer() {
        var m_capacity = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 64;

        _classCallCheck(this, DataBuffer);

        this.m_capacity = m_capacity;
        this.m_size = 0;
        this.m_buffer = new DataView(new ArrayBuffer(this.m_capacity));
    }

    _createClass(DataBuffer, [{
        key: "getUint8Array",
        value: function getUint8Array() {
            return new Uint8Array(this.m_buffer.buffer, 0, this.size());
        }
    }, {
        key: "reserve",
        value: function reserve(newSize) {
            if (newSize > this.m_capacity) {
                var buffer = new DataView(new ArrayBuffer(newSize));
                for (var i = 0; i < this.m_size; ++i) {
                    buffer.setUint8(i, this.m_buffer.getUint8(i));
                }
                this.m_buffer = buffer;
                this.m_capacity = newSize;
            }
        }
    }, {
        key: "grow",
        value: function grow(newSize) {
            if (newSize <= this.m_size) {
                return;
            }
            if (newSize > this.m_capacity) {
                var newcapacity = this.m_capacity;
                do {
                    newcapacity *= 2;
                } while (newcapacity < newSize);
                this.reserve(newcapacity);
            }
            this.m_size = newSize;
        }
    }, {
        key: "addU8",
        value: function addU8(value) {
            this.grow(this.m_size + 1);
            this.m_buffer.setUint8(this.m_size - 1, value);
            return 1;
        }
    }, {
        key: "addU16",
        value: function addU16(value) {
            this.grow(this.m_size + 2);
            this.m_buffer.setUint16(this.m_size - 2, value, true);
            return 2;
        }
    }, {
        key: "addU32",
        value: function addU32(value) {
            this.grow(this.m_size + 4);
            this.m_buffer.setUint32(this.m_size - 4, value, true);
            return 4;
        }
    }, {
        key: "add8",
        value: function add8(value) {
            this.grow(this.m_size + 1);
            this.m_buffer.setInt8(this.m_size - 1, value);
            return 1;
        }
    }, {
        key: "add16",
        value: function add16(value) {
            this.grow(this.m_size + 2);
            this.m_buffer.setInt16(this.m_size - 2, value, true);
            return 2;
        }
    }, {
        key: "add32",
        value: function add32(value) {
            this.grow(this.m_size + 4);
            this.m_buffer.setInt32(this.m_size - 4, value, true);
            return 4;
        }
    }, {
        key: "addString",
        value: function addString(value) {
            this.grow(this.m_size + 2 + value.length);
            this.m_buffer.setUint16(this.m_size - 2 - value.length, value.length, true);
            for (var i = 0; i < value.length; i++) {
                this.m_buffer.setUint8(this.m_size - value.length + i, value.charCodeAt(i));
            }
            return 2 + value.length;
        }
    }, {
        key: "addPixel",
        value: function addPixel(pixel, bytesPerPixel) {
            if (bytesPerPixel == 4) {
                this.grow(this.m_size + 4);
                this.m_buffer.setUint8(this.m_size - 4, pixel.r);
                this.m_buffer.setUint8(this.m_size - 3, pixel.g);
                this.m_buffer.setUint8(this.m_size - 2, pixel.b);
                this.m_buffer.setUint8(this.m_size - 1, pixel.a);
                return 4;
            } else {
                this.grow(this.m_size + 3);
                this.m_buffer.setUint8(this.m_size - 3, pixel.r);
                this.m_buffer.setUint8(this.m_size - 2, pixel.g);
                this.m_buffer.setUint8(this.m_size - 1, pixel.b);
                return 3;
            }
        }
    }, {
        key: "setU8",
        value: function setU8(offset, value) {
            this.grow(offset + 1);
            this.m_buffer.setUint8(offset, value);
        }
    }, {
        key: "setU32",
        value: function setU32(offset, value) {
            this.grow(offset + 4);
            this.m_buffer.setInt32(offset - 4, value, true);
        }
    }, {
        key: "setRgbaPixel",
        value: function setRgbaPixel(offset, pixel) {
            offset = offset * 4;
            this.setU8(offset, pixel.r);
            this.setU8(offset + 1, pixel.g);
            this.setU8(offset + 2, pixel.b);
            this.setU8(offset + 3, pixel.a);
        }
    }, {
        key: "getU8",
        value: function getU8(offset) {
            if (offset + 1 > this.size()) throw new Error("DataBuffer: getU8 failed");
            return this.m_buffer.getUint8(offset);
        }
    }, {
        key: "getU16",
        value: function getU16(offset) {
            if (offset + 2 > this.size()) throw new Error("DataBuffer: getU16 failed");
            return this.m_buffer.getUint16(offset, true);
        }
    }, {
        key: "getU32",
        value: function getU32(offset) {
            if (offset + 4 > this.size()) throw new Error("DataBuffer: getU32 failed");
            return this.m_buffer.getUint32(offset, true);
        }
    }, {
        key: "get8",
        value: function get8(offset) {
            if (offset + 1 > this.size()) throw new Error("DataBuffer: get8 failed");
            return this.m_buffer.getInt8(offset);
        }
    }, {
        key: "get16",
        value: function get16(offset) {
            if (offset + 2 > this.size()) throw new Error("DataBuffer: get16 failed");
            return this.m_buffer.getInt16(offset, true);
        }
    }, {
        key: "get32",
        value: function get32(offset) {
            if (offset + 4 > this.size()) throw new Error("DataBuffer: get32 failed");
            return this.m_buffer.getInt32(offset, true);
        }
    }, {
        key: "getDouble",
        value: function getDouble(offset) {
            if (offset + 8 > this.size()) throw new Error("DataBuffer: getDouble failed");
            return this.m_buffer.getFloat64(offset, true);
        }
    }, {
        key: "getString",
        value: function getString(offset) {
            var length = this.getU16(offset);
            var text = '';
            for (var i = 0; i < length; i++) {
                text += String.fromCharCode(this.getU8(offset + 2 + i));
            }
            return text;
        }
    }, {
        key: "getBytes",
        value: function getBytes(offset, bytesCount) {
            if (bytesCount == -1) bytesCount = this.size() - offset;
            if (offset + bytesCount > this.size()) throw new Error("Invalid offset. Cannot read.");
            return this.m_buffer.buffer.slice(offset, offset + bytesCount);
        }
    }, {
        key: "getPosition",
        value: function getPosition(offset) {
            if (offset + 5 > this.size()) throw new Error("DataBuffer: getPosition failed");
            return new _position.Position(this.getU16(offset), this.getU16(offset + 2), this.getU8(offset + 4));
        }
    }, {
        key: "getRgbaPixel",
        value: function getRgbaPixel(offset) {
            offset = offset * 4;
            if (offset + 4 > this.size()) throw new Error("DataBuffer: getRgbaPixel failed");
            return new _pixel.Pixel(this.getU8(offset), this.getU8(offset + 1), this.getU8(offset + 2), this.getU8(offset + 3));
        }
    }, {
        key: "reserveRgbaPixel",
        value: function reserveRgbaPixel(offset) {
            this.grow(offset * 4 + 4);
        }
    }, {
        key: "size",
        value: function size() {
            return this.m_size;
        }
    }, {
        key: "clear",
        value: function clear() {
            this.m_size = 0;
            this.m_capacity = 64;
            this.m_buffer = new DataView(new ArrayBuffer(this.m_capacity));
        }
    }]);

    return DataBuffer;
}();

/***/ }),

/***/ 209:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(110);
module.exports = __webpack_require__(411);


/***/ }),

/***/ 23:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Point = exports.Point = function () {
    function Point() {
        var x = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
        var y = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

        _classCallCheck(this, Point);

        this.x = x;
        this.y = y;
    }

    _createClass(Point, [{
        key: "equals",
        value: function equals(otherPoint) {
            return this.x == otherPoint.x && this.y == otherPoint.y;
        }
    }, {
        key: "clone",
        value: function clone() {
            return new Point(this.x, this.y);
        }
    }, {
        key: "add",
        value: function add(point) {
            return new Point(this.x + point.x, this.y + point.y);
        }
    }, {
        key: "sub",
        value: function sub(point) {
            return new Point(this.x - point.x, this.y - point.y);
        }
    }, {
        key: "mul",
        value: function mul(ratio) {
            return new Point(this.x * ratio, this.y * ratio);
        }
    }]);

    return Point;
}();

/***/ }),

/***/ 30:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.g_resources = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _inputFile = __webpack_require__(46);

var _log = __webpack_require__(12);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var __awaiter = undefined && undefined.__awaiter || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) {
            try {
                step(generator.next(value));
            } catch (e) {
                reject(e);
            }
        }
        function rejected(value) {
            try {
                step(generator["throw"](value));
            } catch (e) {
                reject(e);
            }
        }
        function step(result) {
            result.done ? resolve(result.value) : new P(function (resolve) {
                resolve(result.value);
            }).then(fulfilled, rejected);
        }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};

var Resources = function () {
    function Resources() {
        _classCallCheck(this, Resources);
    }

    _createClass(Resources, [{
        key: "openUrl",
        value: function openUrl(url) {
            return __awaiter(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee2() {
                var get, response, uInt8Array;
                return regeneratorRuntime.wrap(function _callee2$(_context2) {
                    while (1) {
                        switch (_context2.prev = _context2.next) {
                            case 0:
                                get = function get(url) {
                                    return __awaiter(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
                                        return regeneratorRuntime.wrap(function _callee$(_context) {
                                            while (1) {
                                                switch (_context.prev = _context.next) {
                                                    case 0:
                                                        return _context.abrupt("return", new Promise(function (resolve, reject) {
                                                            var xhr = new XMLHttpRequest();
                                                            xhr.responseType = 'arraybuffer';
                                                            xhr.onload = function (e) {
                                                                if (this.status >= 200 && this.status < 300) resolve(this.response);else reject('Response status: ' + this.status);
                                                            };
                                                            xhr.onerror = function (e) {
                                                                reject(e);
                                                            };
                                                            xhr.open('GET', url, true); //Async
                                                            xhr.send();
                                                        }));

                                                    case 1:
                                                    case "end":
                                                        return _context.stop();
                                                }
                                            }
                                        }, _callee, this);
                                    }));
                                };

                                _context2.prev = 1;
                                _context2.next = 4;
                                return get(url);

                            case 4:
                                response = _context2.sent;
                                uInt8Array = new Uint8Array(response);
                                return _context2.abrupt("return", new _inputFile.InputFile(new DataView(uInt8Array.buffer)));

                            case 9:
                                _context2.prev = 9;
                                _context2.t0 = _context2["catch"](1);

                                _log.Log.debug('failed to openFile', _context2.t0);
                                throw _context2.t0;

                            case 13:
                            case "end":
                                return _context2.stop();
                        }
                    }
                }, _callee2, this, [[1, 9]]);
            }));
        }
    }]);

    return Resources;
}();

var g_resources = new Resources();
exports.g_resources = g_resources;

/***/ }),

/***/ 31:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.OutputFile = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _fileStream = __webpack_require__(47);

var _dataBuffer = __webpack_require__(15);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var OutputFile = exports.OutputFile = function (_FileStream) {
    _inherits(OutputFile, _FileStream);

    function OutputFile() {
        _classCallCheck(this, OutputFile);

        var _this = _possibleConstructorReturn(this, (OutputFile.__proto__ || Object.getPrototypeOf(OutputFile)).call(this));

        _this.data = new _dataBuffer.DataBuffer();
        _this.offset = 0;
        return _this;
    }

    _createClass(OutputFile, [{
        key: "addU8",
        value: function addU8(value) {
            this.offset += this.data.addU8(value);
        }
    }, {
        key: "addU16",
        value: function addU16(value) {
            this.offset += this.data.addU16(value);
        }
    }, {
        key: "addU32",
        value: function addU32(value) {
            this.offset += this.data.addU32(value);
        }
    }, {
        key: "addString",
        value: function addString(value) {
            this.offset += this.data.addString(value);
        }
    }, {
        key: "add8",
        value: function add8(value) {
            this.offset += this.data.add8(value);
        }
    }, {
        key: "add16",
        value: function add16(value) {
            this.offset += this.data.add16(value);
        }
    }, {
        key: "add32",
        value: function add32(value) {
            this.offset += this.data.add32(value);
        }
    }, {
        key: "setU8",
        value: function setU8(offset, value) {
            this.data.setU8(offset, value);
        }
    }, {
        key: "setU32",
        value: function setU32(offset, value) {
            this.data.setU32(offset, value);
        }
    }]);

    return OutputFile;
}(_fileStream.FileStream);

/***/ }),

/***/ 32:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.SpriteManager = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _sprite = __webpack_require__(40);

var _resources = __webpack_require__(30);

var _log = __webpack_require__(12);

var _const = __webpack_require__(6);

var _size = __webpack_require__(14);

var _outputFile = __webpack_require__(31);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var __awaiter = undefined && undefined.__awaiter || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) {
            try {
                step(generator.next(value));
            } catch (e) {
                reject(e);
            }
        }
        function rejected(value) {
            try {
                step(generator["throw"](value));
            } catch (e) {
                reject(e);
            }
        }
        function step(result) {
            result.done ? resolve(result.value) : new P(function (resolve) {
                resolve(result.value);
            }).then(fulfilled, rejected);
        }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};

var SpriteManager = exports.SpriteManager = function () {
    function SpriteManager(m_client) {
        _classCallCheck(this, SpriteManager);

        this.m_client = m_client;
        this.m_signature = 0;
        this.m_sprites = [];
    }

    _createClass(SpriteManager, [{
        key: "loadSprFromUrl",
        value: function loadSprFromUrl(url) {
            return __awaiter(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
                var fin;
                return regeneratorRuntime.wrap(function _callee$(_context) {
                    while (1) {
                        switch (_context.prev = _context.next) {
                            case 0:
                                _context.next = 2;
                                return _resources.g_resources.openUrl(url);

                            case 2:
                                fin = _context.sent;
                                return _context.abrupt("return", this.loadSpr(fin));

                            case 4:
                            case "end":
                                return _context.stop();
                        }
                    }
                }, _callee, this);
            }));
        }
    }, {
        key: "loadSpr",
        value: function loadSpr(spritesFile) {
            this.m_signature = 0;
            try {
                this.m_signature = spritesFile.getU32();
                var spritesCount = this.m_client.getFeature(_const.GameFeature.GameSpritesU32) ? spritesFile.getU32() : spritesFile.getU16();
                var spritesOffset = spritesFile.tell();
                for (var id = 1; id <= spritesCount; id++) {
                    spritesFile.seek((id - 1) * 4 + spritesOffset);
                    var spriteAddress = spritesFile.getU32();
                    if (spriteAddress == 0 || this.m_sprites[id]) {
                        continue;
                    }
                    spritesFile.seek(spriteAddress);
                    var sprite = new _sprite.Sprite(new _size.Size(SpriteManager.SPRITE_SIZE, SpriteManager.SPRITE_SIZE));
                    sprite.readFromSpr(spritesFile, this.m_client);
                    this.m_sprites[id] = sprite;
                }
                return true;
            } catch (e) {
                _log.Log.error("Failed to load sprites: %s", e);
                return false;
            }
        }
    }, {
        key: "saveSpr",
        value: function saveSpr() {
            var spritesFile = new _outputFile.OutputFile();
            spritesFile.addU32(this.m_signature);
            if (this.m_client.getFeature(_const.GameFeature.GameSpritesU32)) spritesFile.addU32(this.getSpritesCount());else spritesFile.addU16(this.getSpritesCount());
            var spritesOffset = spritesFile.tell();
            for (var i = 0; i < this.m_sprites.length; i++) {
                spritesFile.addU32(0);
            }
            for (var _i = 0; _i < this.m_sprites.length; _i++) {
                if (this.m_sprites[_i]) {
                    var sprite = this.m_sprites[_i];
                    var spriteAddress = spritesFile.tell();
                    spritesFile.setU32(spritesOffset + 4 * _i, spriteAddress);
                    sprite.writeToSpr(spritesFile, this.m_client);
                }
            }
            return spritesFile;
        }
    }, {
        key: "getSignature",
        value: function getSignature() {
            return this.m_signature;
        }
    }, {
        key: "setSignature",
        value: function setSignature(value) {
            return this.m_signature = value;
        }
    }, {
        key: "getSprites",
        value: function getSprites() {
            return this.m_sprites;
        }
    }, {
        key: "getSprite",
        value: function getSprite(index) {
            return this.m_sprites[index];
        }
    }, {
        key: "getSpritesCount",
        value: function getSpritesCount() {
            return this.m_sprites.length;
        }
    }]);

    return SpriteManager;
}();

SpriteManager.SPRITE_SIZE = 32;
SpriteManager.SPRITE_DATA_SIZE = SpriteManager.SPRITE_SIZE * SpriteManager.SPRITE_SIZE * 4;

/***/ }),

/***/ 40:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.Sprite = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _color = __webpack_require__(44);

var _helpers = __webpack_require__(50);

var _dataBuffer = __webpack_require__(15);

var _const = __webpack_require__(6);

var _spriteManager = __webpack_require__(32);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Sprite = exports.Sprite = function () {
    function Sprite(size) {
        var pixels = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

        _classCallCheck(this, Sprite);

        this.m_size = size;
        if (pixels) {
            this.m_pixels = pixels;
        } else {
            this.m_pixels = new _dataBuffer.DataBuffer();
            this.m_pixels.reserve(size.area() * 4);
        }
    }

    _createClass(Sprite, [{
        key: "blit",
        value: function blit(dest, other) {
            var otherPixels = other.getPixels();
            for (var p = 0; p < other.getPixelsCount(); ++p) {
                var x = (0, _helpers.toInt)(p % other.getWidth());
                var y = (0, _helpers.toInt)(p / other.getWidth());
                var pos = (dest.y + y) * (0, _helpers.toInt)(this.m_size.width()) + (dest.x + x);
                var otherPixel = otherPixels.getRgbaPixel(p);
                if (otherPixel.a != 0) {
                    this.m_pixels.setRgbaPixel(pos, otherPixel);
                } else {
                    this.m_pixels.reserveRgbaPixel(pos);
                }
            }
        }
    }, {
        key: "overwriteMask",
        value: function overwriteMask(color) {
            var insideColor = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : _color.Color.white;
            var outsideColor = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : _color.Color.alpha;
        }
    }, {
        key: "getWidth",
        value: function getWidth() {
            return this.m_size.width();
        }
    }, {
        key: "getHeight",
        value: function getHeight() {
            return this.m_size.height();
        }
    }, {
        key: "getPixel",
        value: function getPixel(x, y) {
            return this.m_pixels.getRgbaPixel(y * this.m_size.width() + x);
        }
    }, {
        key: "getPixelsCount",
        value: function getPixelsCount() {
            return this.m_size.area();
        }
    }, {
        key: "getPixels",
        value: function getPixels() {
            return this.m_pixels;
        }
    }, {
        key: "readFromSpr",
        value: function readFromSpr(inputFile, client) {
            this.m_pixels.clear();
            // skip color key
            inputFile.getU8();
            inputFile.getU8();
            inputFile.getU8();
            var pixelDataSize = inputFile.getU16();
            var writePos = 0;
            var read = 0;
            var useAlpha = client.getFeature(_const.GameFeature.GameSpritesAlphaChannel);
            var channels = useAlpha ? 4 : 3;
            // decompress pixels
            while (read < pixelDataSize && writePos < _spriteManager.SpriteManager.SPRITE_DATA_SIZE) {
                var transparentPixels = inputFile.getU16();
                var coloredPixels = inputFile.getU16();
                for (var i = 0; i < transparentPixels && writePos < _spriteManager.SpriteManager.SPRITE_DATA_SIZE; i++) {
                    this.m_pixels.addU8(0x00);
                    this.m_pixels.addU8(0x00);
                    this.m_pixels.addU8(0x00);
                    this.m_pixels.addU8(0x00);
                    writePos += 4;
                }
                for (var _i = 0; _i < coloredPixels && writePos < _spriteManager.SpriteManager.SPRITE_DATA_SIZE; _i++) {
                    this.m_pixels.addU8(inputFile.getU8());
                    this.m_pixels.addU8(inputFile.getU8());
                    this.m_pixels.addU8(inputFile.getU8());
                    this.m_pixels.addU8(useAlpha ? inputFile.getU8() : 0xFF);
                    writePos += 4;
                }
                read += 4 + channels * coloredPixels;
            }
            // fill remaining pixels with alpha
            while (writePos < _spriteManager.SpriteManager.SPRITE_DATA_SIZE) {
                this.m_pixels.addU8(0x00);
                this.m_pixels.addU8(0x00);
                this.m_pixels.addU8(0x00);
                this.m_pixels.addU8(0x00);
                writePos += 4;
            }
        }
    }, {
        key: "writeToSpr",
        value: function writeToSpr(outputFile, client) {
            outputFile.addU8(255);
            outputFile.addU8(0);
            outputFile.addU8(255);
            var pixelsSprData = this.getSprData(client);
            outputFile.addU16(pixelsSprData.size());
            for (var i = 0; i < pixelsSprData.size(); i++) {
                outputFile.addU8(pixelsSprData.getU8(i));
            }
        }
    }, {
        key: "getSprData",
        value: function getSprData(client) {
            var pixelsSprData = new _dataBuffer.DataBuffer();
            var useAlpha = client.getFeature(_const.GameFeature.GameSpritesAlphaChannel);
            var bytesPerPixel = useAlpha ? 4 : 3;
            var read = 0;
            var pixel = this.m_pixels.getRgbaPixel(read++);
            while (read < this.getPixelsCount()) {
                var transparentPixels = 0;
                var coloredPixels = [];
                while (pixel.isTransparent()) {
                    transparentPixels++;
                    if (read == this.getPixelsCount()) break;
                    pixel = this.m_pixels.getRgbaPixel(read++);
                }
                while (!pixel.isTransparent()) {
                    coloredPixels.push(pixel);
                    if (read == this.getPixelsCount()) break;
                    pixel = this.m_pixels.getRgbaPixel(read++);
                }
                pixelsSprData.addU16(transparentPixels);
                pixelsSprData.addU16(coloredPixels.length);
                var _iteratorNormalCompletion = true;
                var _didIteratorError = false;
                var _iteratorError = undefined;

                try {
                    for (var _iterator = coloredPixels[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                        var coloredPixel = _step.value;

                        pixelsSprData.addPixel(coloredPixel, bytesPerPixel);
                    }
                } catch (err) {
                    _didIteratorError = true;
                    _iteratorError = err;
                } finally {
                    try {
                        if (!_iteratorNormalCompletion && _iterator.return) {
                            _iterator.return();
                        }
                    } finally {
                        if (_didIteratorError) {
                            throw _iteratorError;
                        }
                    }
                }
            }
            return pixelsSprData;
        }
    }]);

    return Sprite;
}();

/***/ }),

/***/ 411:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _client = __webpack_require__(76);

var _datManager = __webpack_require__(77);

var _otbManager = __webpack_require__(84);

var _spriteManager = __webpack_require__(32);

var _sprite = __webpack_require__(40);

var _inputFile = __webpack_require__(46);

var _imageGenerator = __webpack_require__(88);

var _size = __webpack_require__(14);

var _point = __webpack_require__(23);

var _const = __webpack_require__(6);

var __awaiter = undefined && undefined.__awaiter || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) {
            try {
                step(generator.next(value));
            } catch (e) {
                reject(e);
            }
        }
        function rejected(value) {
            try {
                step(generator["throw"](value));
            } catch (e) {
                reject(e);
            }
        }
        function step(result) {
            result.done ? resolve(result.value) : new P(function (resolve) {
                resolve(result.value);
            }).then(fulfilled, rejected);
        }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};

var canvas = document.getElementById('view');
var ctx = canvas.getContext("2d");
function drawImage(sprite, x, y) {
    var palette = ctx.getImageData(x, y, sprite.getWidth(), sprite.getHeight());
    palette.data.set(new Uint8ClampedArray(sprite.getPixels().m_buffer.buffer));
    ctx.putImageData(palette, x, y);
}
function testGenerateAllItemImages() {
    return __awaiter(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
        var client, serverUrl, datManager, otbManager, spriteManager;
        return regeneratorRuntime.wrap(function _callee$(_context) {
            while (1) {
                switch (_context.prev = _context.next) {
                    case 0:
                        client = new _client.Client();

                        client.setClientVersion(1076);
                        serverUrl = 'http://127.0.0.1/1076/';
                        datManager = new _datManager.DatManager(client);
                        _context.next = 6;
                        return datManager.loadDatFromUrl(serverUrl + 'Tibia.dat').then(function (datLoaded) {
                            console.log('loaded dat', datLoaded);
                        });

                    case 6:
                        otbManager = new _otbManager.OtbManager(client);
                        _context.next = 9;
                        return otbManager.loadOtbFromUrl(serverUrl + 'items.otb').then(function (otbLoaded) {
                            console.log('loaded otb', otbLoaded);
                        });

                    case 9:
                        spriteManager = new _spriteManager.SpriteManager(client);
                        _context.next = 12;
                        return spriteManager.loadSprFromUrl(serverUrl + 'Tibia.spr').then(function (sprLoaded) {
                            console.log('loaded spr', sprLoaded);
                        });

                    case 12:
                    case "end":
                        return _context.stop();
                }
            }
        }, _callee, this);
    }));
}
function testLoadFromUrlsAndDrawImage() {
    return __awaiter(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee2() {
        var client, serverUrl, datManager, otbManager, spriteManager, magicSwordClientId, magicSwordThingType, firstMagicSwordSprite, firstImagePixelsData, itemid, imageGenerator, itemSprite, sprite;
        return regeneratorRuntime.wrap(function _callee2$(_context2) {
            while (1) {
                switch (_context2.prev = _context2.next) {
                    case 0:
                        client = new _client.Client();

                        client.setClientVersion(1076);
                        serverUrl = 'http://127.0.0.1/1076/';
                        datManager = new _datManager.DatManager(client);
                        _context2.next = 6;
                        return datManager.loadDatFromUrl(serverUrl + 'Tibia.dat').then(function (datLoaded) {
                            console.log('loaded dat', datLoaded);
                        });

                    case 6:
                        otbManager = new _otbManager.OtbManager(client);
                        _context2.next = 9;
                        return otbManager.loadOtbFromUrl(serverUrl + 'items.otb').then(function (otbLoaded) {
                            console.log('loaded otb', otbLoaded);
                        });

                    case 9:
                        spriteManager = new _spriteManager.SpriteManager(client);
                        _context2.next = 12;
                        return spriteManager.loadSprFromUrl(serverUrl + 'Tibia.spr').then(function (sprLoaded) {
                            console.log('loaded spr', sprLoaded);
                        });

                    case 12:
                        // get client ID of item 2400 (magic sword in items.xml)
                        magicSwordClientId = otbManager.getItem(2400).getClientId();
                        // get data from '.dat' about that item

                        magicSwordThingType = datManager.getItem(magicSwordClientId);
                        // get first sprite [image] of that item

                        firstMagicSwordSprite = magicSwordThingType.getFrameGroup(_const.FrameGroupType.FrameGroupIdle).getSprite(0);
                        // get image from .spr file

                        firstImagePixelsData = spriteManager.getSprite(firstMagicSwordSprite);
                        // draw image in webbrowser with Canvas on position 0, 0

                        drawImage(firstImagePixelsData, 0, 0);
                        itemid = 2400;
                        imageGenerator = new _imageGenerator.ImageGenerator(datManager, spriteManager, otbManager);
                        itemSprite = imageGenerator.generateItemImageByServerId(itemid);

                        drawImage(itemSprite, 32, 0);
                        sprite = new _sprite.Sprite(new _size.Size(64, 64));

                        sprite.blit(new _point.Point(32, 32), firstImagePixelsData);
                        drawImage(sprite, 0, 0);
                        // export to global scope for debuging
                        window['d'] = {
                            client: client,
                            datManager: datManager,
                            otbManager: otbManager,
                            spriteManager: spriteManager
                        };
                        // let otbFile = otbManager.saveOtb();
                        // let a = document.createElement('a');
                        // let url = window.URL.createObjectURL(new Blob(new Array(otbFile.getUint8Array())));
                        // a.href = url;
                        // a.download = 'items.otb';
                        // a.click();
                        // window.URL.revokeObjectURL(url);
                        // a.remove();
                        // console.log('Generated dat file', datManager.saveDat());
                        // console.log('Generated otb file', otbManager.saveOtb());
                        // console.log('Generated spr file', spriteManager.saveSpr());
                        console.log('All data loaded. You can access it by variable "d".');

                    case 26:
                    case "end":
                        return _context2.stop();
                }
            }
        }, _callee2, this);
    }));
}
function testFilePicker() {
    return __awaiter(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee3() {
        var clientVersionInput, sprPicker, datPicker, otbPicker, itemIdInput, client, sprManager, datManager, otbManager, sprLoaded, datLoaded, otbLoaded, updateItemView;
        return regeneratorRuntime.wrap(function _callee3$(_context3) {
            while (1) {
                switch (_context3.prev = _context3.next) {
                    case 0:
                        updateItemView = function updateItemView(itemid) {
                            console.log(sprLoaded, datLoaded, otbLoaded, client, itemid, sprManager, datManager, otbManager);
                            if (sprLoaded && datLoaded && otbLoaded) {
                                try {
                                    var magicSwordClientId = otbManager.getItem(itemid).getClientId();
                                    var magicSwordThingType = datManager.getItem(magicSwordClientId);
                                    var firstMagicSwordSprite = magicSwordThingType.getFrameGroup(_const.FrameGroupType.FrameGroupIdle).getSprite(0);
                                    var firstImagePixelsData = sprManager.getSprite(firstMagicSwordSprite);
                                    drawImage(firstImagePixelsData, 0, 0);
                                } catch (e) {
                                    console.error(e);
                                }
                            }
                        };

                        clientVersionInput = document.getElementById('clientversion');
                        sprPicker = document.getElementById('spr');
                        datPicker = document.getElementById('dat');
                        otbPicker = document.getElementById('otb');
                        itemIdInput = document.getElementById('itemid');
                        client = void 0;
                        sprManager = void 0;
                        datManager = void 0;
                        otbManager = void 0;
                        sprLoaded = false;
                        datLoaded = false;
                        otbLoaded = false;

                        clientVersionInput.onchange = function (event) {
                            var clientVersion = parseInt(clientVersionInput.value);
                            client = new _client.Client();
                            client.setClientVersion(clientVersion);
                            sprPicker.onchange(null);
                            datPicker.onchange(null);
                            otbPicker.onchange(null);
                            updateItemView(parseInt(itemIdInput.value));
                        };
                        sprPicker.onchange = function (event) {
                            if (sprPicker.files.length > 0) {
                                sprLoaded = false;
                                sprManager = new _spriteManager.SpriteManager(client);
                                var file = sprPicker.files[0];
                                var reader = new FileReader();
                                reader.readAsArrayBuffer(file);
                                reader.onload = function (event) {
                                    sprLoaded = sprManager.loadSpr(new _inputFile.InputFile(new DataView(event.target.result)));
                                };
                            }
                        };
                        datPicker.onchange = function (event) {
                            if (datPicker.files.length > 0) {
                                datLoaded = false;
                                datManager = new _datManager.DatManager(client);
                                var file = datPicker.files[0];
                                var reader = new FileReader();
                                reader.readAsArrayBuffer(file);
                                reader.onload = function (event) {
                                    datLoaded = datManager.loadDat(new _inputFile.InputFile(new DataView(event.target.result)));
                                };
                            }
                        };
                        otbPicker.onchange = function (event) {
                            if (otbPicker.files.length > 0) {
                                otbLoaded = false;
                                otbManager = new _otbManager.OtbManager(client);
                                var file = otbPicker.files[0];
                                var reader = new FileReader();
                                reader.readAsArrayBuffer(file);
                                reader.onload = function (event) {
                                    otbLoaded = otbManager.loadOtb(new _inputFile.InputFile(new DataView(event.target.result)));
                                };
                            }
                        };
                        itemIdInput.onchange = function (event) {
                            updateItemView(parseInt(itemIdInput.value));
                        };

                    case 18:
                    case "end":
                        return _context3.stop();
                }
            }
        }, _callee3, this);
    }));
}
// testGenerateAllItemImages();
testLoadFromUrlsAndDrawImage();
// testFilePicker();
/*
download OTB:

otbFile = otbManager.saveOtb();
a = document.createElement('a');
url = window.URL.createObjectURL(new Blob(new Array(otbFile.getUint8Array())));
a.href = url;
a.download = 'items.otb';
a.click();
window.URL.revokeObjectURL(url);
a.remove();
 */

/***/ }),

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Color = exports.Color = function () {
    //Color() : m_r(1.0f), m_g(1.0f), m_b(1.0f), m_a(1.0f) { }
    //Color(uint32 rgba) { setRGBA(rgba); }
    function Color() {
        _classCallCheck(this, Color);

        if (arguments.length == 0) {
            this.m_r = 1;
            this.m_g = 1;
            this.m_b = 1;
            this.m_a = 1;
            return;
        } else if (arguments.length == 1) {
            if (typeof (arguments.length <= 0 ? undefined : arguments[0]) == 'number') {
                this.setRGBA(arguments.length <= 0 ? undefined : arguments[0]);
                return;
            }
        } else if (arguments.length == 3) {
            if (typeof (arguments.length <= 0 ? undefined : arguments[0]) == 'number' && typeof (arguments.length <= 1 ? undefined : arguments[1]) == 'number' && typeof (arguments.length <= 2 ? undefined : arguments[2]) == 'number') {
                var r = (arguments.length <= 0 ? undefined : arguments[0]) / 255;
                var g = (arguments.length <= 1 ? undefined : arguments[1]) / 255;
                var b = (arguments.length <= 2 ? undefined : arguments[2]) / 255;
                this.m_r = r;
                this.m_g = g;
                this.m_b = b;
                this.m_a = 1;
                return;
            }
        }
        throw new Error('Unhandled constructor');
    }

    _createClass(Color, [{
        key: 'equals',
        value: function equals(otherColor) {
            return this.m_r == otherColor.m_r && this.m_g == otherColor.m_g && this.m_b == otherColor.m_b && this.m_a == otherColor.m_a;
        }
    }, {
        key: 'clone',
        value: function clone() {
            var color = new Color();
            color.m_r = this.m_r;
            color.m_g = this.m_g;
            color.m_b = this.m_b;
            color.m_a = this.m_a;
            return color;
        }
    }, {
        key: 'a',
        value: function a() {
            return this.m_a * 255.0;
        }
    }, {
        key: 'b',
        value: function b() {
            return this.m_b * 255.0;
        }
    }, {
        key: 'g',
        value: function g() {
            return this.m_g * 255.0;
        }
    }, {
        key: 'r',
        value: function r() {
            return this.m_r * 255.0;
        }
    }, {
        key: 'aF',
        value: function aF() {
            return this.m_a;
        }
    }, {
        key: 'bF',
        value: function bF() {
            return this.m_b;
        }
    }, {
        key: 'gF',
        value: function gF() {
            return this.m_g;
        }
    }, {
        key: 'rF',
        value: function rF() {
            return this.m_r;
        }
    }, {
        key: 'rgba',
        value: function rgba() {
            return this.a() | this.b() << 8 | this.g() << 16 | this.r() << 24;
        }
    }, {
        key: 'setRGBA',
        value: function setRGBA(r) {
            var g = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : -1;
            var b = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : -1;
            var a = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 255;

            if (g == -1) {
                // r is rgba
                var rgba = r;
                this.setRGBA(rgba >> 0 & 0xff, rgba >> 8 & 0xff, rgba >> 16 & 0xff, rgba >> 24 & 0xff);
            } else {
                this.m_r = r / 255;
                this.m_g = g / 255;
                this.m_b = b / 255;
                this.m_a = a / 255;
            }
        }
    }], [{
        key: 'from8bit',
        value: function from8bit(color) {
            if (color >= 216 || color <= 0) return new Color(0, 0, 0);
            var r = parseInt((color / 36).toString()) % 6 * 51;
            var g = parseInt((color / 6).toString()) % 6 * 51;
            var b = color % 6 * 51;
            return new Color(r, g, b);
        }
    }]);

    return Color;
}();

Color.alpha = 0x00000000;
Color.white = 0xffffffff;
Color.red = 0xff0000ff;
Color.green = 0xff00ff00;
Color.blue = 0xffff0000;
Color.yellow = 0xff00ffff;

/***/ }),

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Light = exports.Light = function Light() {
    var intensity = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
    var color = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 215;

    _classCallCheck(this, Light);

    this.intensity = intensity;
    this.color = color;
};

/***/ }),

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.InputFile = undefined;

var _fileStream = __webpack_require__(47);

var _dataBuffer = __webpack_require__(15);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var InputFile = exports.InputFile = function (_FileStream) {
    _inherits(InputFile, _FileStream);

    function InputFile(msg) {
        _classCallCheck(this, InputFile);

        var _this = _possibleConstructorReturn(this, (InputFile.__proto__ || Object.getPrototypeOf(InputFile)).call(this));

        _this.data = new _dataBuffer.DataBuffer();
        _this.data.m_buffer = msg;
        _this.data.m_size = msg.byteLength;
        _this.data.m_capacity = msg.byteLength;
        _this.offset = 0;
        return _this;
    }

    return InputFile;
}(_fileStream.FileStream);

/***/ }),

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.FileStream = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _position = __webpack_require__(48);

var _binaryTree = __webpack_require__(49);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var FileStream = exports.FileStream = function () {
    function FileStream() {
        _classCallCheck(this, FileStream);
    }

    _createClass(FileStream, [{
        key: "getUint8Array",
        value: function getUint8Array() {
            return this.data.getUint8Array();
        }
    }, {
        key: "getU8",
        value: function getU8() {
            var v = this.data.getU8(this.offset);
            this.offset += 1;
            return v;
        }
    }, {
        key: "getU16",
        value: function getU16() {
            var v = this.data.getU16(this.offset);
            this.offset += 2;
            return v;
        }
    }, {
        key: "getU32",
        value: function getU32() {
            var v = this.data.getU32(this.offset);
            this.offset += 4;
            return v;
        }
    }, {
        key: "getU64",
        value: function getU64() {
            var v = this.data.getU32(this.offset) + this.data.getU32(this.offset) * 256 * 256 * 256 * 256;
            this.offset += 8;
            return v;
        }
    }, {
        key: "get8",
        value: function get8() {
            var v = this.data.get8(this.offset);
            this.offset += 1;
            return v;
        }
    }, {
        key: "get16",
        value: function get16() {
            var v = this.data.get16(this.offset);
            this.offset += 2;
            return v;
        }
    }, {
        key: "get32",
        value: function get32() {
            var v = this.data.get32(this.offset);
            this.offset += 4;
            return v;
        }
    }, {
        key: "getDouble",
        value: function getDouble() {
            var v = this.data.getDouble(this.offset);
            this.offset += 8;
            return v;
        }
    }, {
        key: "getString",
        value: function getString() {
            var v = this.data.getString(this.offset);
            this.offset += 2 + v.length;
            return v;
        }
    }, {
        key: "getPosition",
        value: function getPosition() {
            return new _position.Position(this.getU16(), this.getU16(), this.getU8());
        }
    }, {
        key: "getBytes",
        value: function getBytes(bytesCount) {
            var bytes = this.data.getBytes(this.offset, bytesCount);
            this.offset += bytesCount;
            return bytes;
        }
    }, {
        key: "getBinaryTree",
        value: function getBinaryTree() {
            var byte = this.getU8();
            if (byte != _binaryTree.BinaryTree.BINARYTREE_NODE_START) throw new Error("failed to read node start (getBinaryTree): " + byte);
            return new _binaryTree.BinaryTree(this);
        }
    }, {
        key: "peekU8",
        value: function peekU8() {
            return this.data.getU8(this.offset);
        }
    }, {
        key: "peekU16",
        value: function peekU16() {
            return this.data.getU16(this.offset);
        }
    }, {
        key: "peekU32",
        value: function peekU32() {
            return this.data.getU32(this.offset);
        }
    }, {
        key: "skipBytes",
        value: function skipBytes(bytesCount) {
            if (this.offset + bytesCount > this.data.size()) throw new Error("Invalid offset. Cannot read.");
            this.offset += bytesCount;
        }
    }, {
        key: "skip",
        value: function skip(bytesCount) {
            this.skipBytes(bytesCount);
        }
    }, {
        key: "getUnreadSize",
        value: function getUnreadSize() {
            return this.data.size() - this.offset;
        }
    }, {
        key: "tell",
        value: function tell() {
            return this.offset;
        }
    }, {
        key: "seek",
        value: function seek(offset) {
            this.offset = offset;
        }
    }]);

    return FileStream;
}();

/***/ }),

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Position = exports.Position = function Position() {
    var x = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
    var y = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
    var z = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;

    _classCallCheck(this, Position);

    this.x = x;
    this.y = y;
    this.z = z;
};

/***/ }),

/***/ 49:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.BinaryTree = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _dataBuffer = __webpack_require__(15);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var BinaryTree = exports.BinaryTree = function () {
    function BinaryTree(m_fin) {
        _classCallCheck(this, BinaryTree);

        this.m_fin = m_fin;
        this.m_pos = 0xFFFFFFFF;
        this.m_startPos = 0;
        this.m_buffer = new _dataBuffer.DataBuffer();
        this.m_startPos = this.m_fin.tell();
    }

    _createClass(BinaryTree, [{
        key: "skipNodes",
        value: function skipNodes() {
            while (true) {
                var byte = this.m_fin.getU8();
                switch (byte) {
                    case BinaryTree.BINARYTREE_NODE_START:
                        {
                            this.skipNodes();
                            break;
                        }
                    case BinaryTree.BINARYTREE_NODE_END:
                        return;
                    case BinaryTree.BINARYTREE_ESCAPE_CHAR:
                        this.m_fin.getU8();
                        break;
                    default:
                        break;
                }
            }
        }
    }, {
        key: "unserialize",
        value: function unserialize() {
            if (this.m_pos != 0xFFFFFFFF) return;
            this.m_pos = 0;
            this.m_fin.seek(this.m_startPos);
            while (true) {
                var byte = this.m_fin.getU8();
                switch (byte) {
                    case BinaryTree.BINARYTREE_NODE_START:
                        {
                            this.skipNodes();
                            break;
                        }
                    case BinaryTree.BINARYTREE_NODE_END:
                        this.m_pos = 0;
                        // console.log(this.m_buffer);
                        return;
                    case BinaryTree.BINARYTREE_ESCAPE_CHAR:
                        this.m_buffer.addU8(this.m_fin.getU8());
                        break;
                    default:
                        this.m_buffer.addU8(byte);
                        break;
                }
            }
        }
    }, {
        key: "getChildren",
        value: function getChildren() {
            var children = [];
            this.m_fin.seek(this.m_startPos);
            while (true) {
                var byte = this.m_fin.getU8();
                switch (byte) {
                    case BinaryTree.BINARYTREE_NODE_START:
                        {
                            var node = new BinaryTree(this.m_fin);
                            children.push(node);
                            node.skipNodes();
                            break;
                        }
                    case BinaryTree.BINARYTREE_NODE_END:
                        return children;
                    case BinaryTree.BINARYTREE_ESCAPE_CHAR:
                        this.m_fin.getU8();
                        break;
                    default:
                        break;
                }
            }
        }
    }, {
        key: "seek",
        value: function seek(pos) {
            this.unserialize();
            if (pos > this.m_buffer.size()) throw new Error("BinaryTree: seek failed");
            this.m_pos = pos;
        }
    }, {
        key: "tell",
        value: function tell() {
            return this.m_pos;
        }
    }, {
        key: "skip",
        value: function skip(len) {
            this.unserialize();
            this.seek(this.tell() + len);
        }
    }, {
        key: "getU8",
        value: function getU8() {
            this.unserialize();
            if (this.m_pos + 1 > this.m_buffer.size()) throw new Error("BinaryTree: getU8 failed");
            var v = this.m_buffer.getU8(this.m_pos);
            this.m_pos += 1;
            return v;
        }
    }, {
        key: "getU16",
        value: function getU16() {
            return this.getU8() + this.getU8() * 256;
        }
    }, {
        key: "getU32",
        value: function getU32() {
            return this.getU16() + this.getU16() * 256 * 256;
        }
    }, {
        key: "getU64",
        value: function getU64() {
            return this.getU32() + this.getU32() * 256 * 256 * 256 * 256;
        }
    }, {
        key: "getString",
        value: function getString(len) {
            this.unserialize();
            if (len == 0) len = this.getU16();
            if (this.m_pos + len > this.m_buffer.size()) throw new Error("BinaryTree: getString failed: string length exceeded buffer size.");
            var text = '';
            for (var i = 0; i < len; i++) {
                text += String.fromCharCode(this.getU8());
            }
            return text;
        }
    }, {
        key: "canRead",
        value: function canRead() {
            this.unserialize();
            return this.m_pos < this.m_buffer.size();
        }
    }]);

    return BinaryTree;
}();

BinaryTree.BINARYTREE_ESCAPE_CHAR = 0xFD;
BinaryTree.BINARYTREE_NODE_START = 0xFE;
BinaryTree.BINARYTREE_NODE_END = 0xFF;

/***/ }),

/***/ 50:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var toInt = function toInt(int) {
    return parseInt(int.toString());
};
var sortObjectByKey = function sortObjectByKey(obj) {
    if ((typeof obj === "undefined" ? "undefined" : _typeof(obj)) !== "object" || obj === null) return obj;
    if (Array.isArray(obj)) return obj.map(function (e) {
        return sortObjectByKey(e);
    }).sort();
    return Object.keys(obj).sort().reduce(function (sorted, k) {
        sorted[k] = sortObjectByKey(obj[k]);
        return sorted;
    }, {});
};
exports.toInt = toInt;
exports.sortObjectByKey = sortObjectByKey;

/***/ }),

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
var Direction = exports.Direction = undefined;
(function (Direction) {
    Direction[Direction["North"] = 0] = "North";
    Direction[Direction["East"] = 1] = "East";
    Direction[Direction["South"] = 2] = "South";
    Direction[Direction["West"] = 3] = "West";
})(Direction || (exports.Direction = Direction = {}));
var GameFeature = exports.GameFeature = undefined;
(function (GameFeature) {
    GameFeature[GameFeature["GameProtocolChecksum"] = 1] = "GameProtocolChecksum";
    GameFeature[GameFeature["GameAccountNames"] = 2] = "GameAccountNames";
    GameFeature[GameFeature["GameChallengeOnLogin"] = 3] = "GameChallengeOnLogin";
    GameFeature[GameFeature["GamePenalityOnDeath"] = 4] = "GamePenalityOnDeath";
    GameFeature[GameFeature["GameNameOnNpcTrade"] = 5] = "GameNameOnNpcTrade";
    GameFeature[GameFeature["GameDoubleFreeCapacity"] = 6] = "GameDoubleFreeCapacity";
    GameFeature[GameFeature["GameDoubleExperience"] = 7] = "GameDoubleExperience";
    GameFeature[GameFeature["GameTotalCapacity"] = 8] = "GameTotalCapacity";
    GameFeature[GameFeature["GameSkillsBase"] = 9] = "GameSkillsBase";
    GameFeature[GameFeature["GamePlayerRegenerationTime"] = 10] = "GamePlayerRegenerationTime";
    GameFeature[GameFeature["GameChannelPlayerList"] = 11] = "GameChannelPlayerList";
    GameFeature[GameFeature["GamePlayerMounts"] = 12] = "GamePlayerMounts";
    GameFeature[GameFeature["GameEnvironmentEffect"] = 13] = "GameEnvironmentEffect";
    GameFeature[GameFeature["GameCreatureEmblems"] = 14] = "GameCreatureEmblems";
    GameFeature[GameFeature["GameItemAnimationPhase"] = 15] = "GameItemAnimationPhase";
    GameFeature[GameFeature["GameMagicEffectU16"] = 16] = "GameMagicEffectU16";
    GameFeature[GameFeature["GamePlayerMarket"] = 17] = "GamePlayerMarket";
    GameFeature[GameFeature["GameSpritesU32"] = 18] = "GameSpritesU32";
    // 19 unused
    GameFeature[GameFeature["GameOfflineTrainingTime"] = 20] = "GameOfflineTrainingTime";
    GameFeature[GameFeature["GamePurseSlot"] = 21] = "GamePurseSlot";
    GameFeature[GameFeature["GameFormatCreatureName"] = 22] = "GameFormatCreatureName";
    GameFeature[GameFeature["GameSpellList"] = 23] = "GameSpellList";
    GameFeature[GameFeature["GameClientPing"] = 24] = "GameClientPing";
    GameFeature[GameFeature["GameExtendedClientPing"] = 25] = "GameExtendedClientPing";
    GameFeature[GameFeature["GameDoubleHealth"] = 28] = "GameDoubleHealth";
    GameFeature[GameFeature["GameDoubleSkills"] = 29] = "GameDoubleSkills";
    GameFeature[GameFeature["GameChangeMapAwareRange"] = 30] = "GameChangeMapAwareRange";
    GameFeature[GameFeature["GameMapMovePosition"] = 31] = "GameMapMovePosition";
    GameFeature[GameFeature["GameAttackSeq"] = 32] = "GameAttackSeq";
    GameFeature[GameFeature["GameBlueNpcNameColor"] = 33] = "GameBlueNpcNameColor";
    GameFeature[GameFeature["GameDiagonalAnimatedText"] = 34] = "GameDiagonalAnimatedText";
    GameFeature[GameFeature["GameLoginPending"] = 35] = "GameLoginPending";
    GameFeature[GameFeature["GameNewSpeedLaw"] = 36] = "GameNewSpeedLaw";
    GameFeature[GameFeature["GameForceFirstAutoWalkStep"] = 37] = "GameForceFirstAutoWalkStep";
    GameFeature[GameFeature["GameMinimapRemove"] = 38] = "GameMinimapRemove";
    GameFeature[GameFeature["GameDoubleShopSellAmount"] = 39] = "GameDoubleShopSellAmount";
    GameFeature[GameFeature["GameContainerPagination"] = 40] = "GameContainerPagination";
    GameFeature[GameFeature["GameThingMarks"] = 41] = "GameThingMarks";
    GameFeature[GameFeature["GameLooktypeU16"] = 42] = "GameLooktypeU16";
    GameFeature[GameFeature["GamePlayerStamina"] = 43] = "GamePlayerStamina";
    GameFeature[GameFeature["GamePlayerAddons"] = 44] = "GamePlayerAddons";
    GameFeature[GameFeature["GameMessageStatements"] = 45] = "GameMessageStatements";
    GameFeature[GameFeature["GameMessageLevel"] = 46] = "GameMessageLevel";
    GameFeature[GameFeature["GameNewFluids"] = 47] = "GameNewFluids";
    GameFeature[GameFeature["GamePlayerStateU16"] = 48] = "GamePlayerStateU16";
    GameFeature[GameFeature["GameNewOutfitProtocol"] = 49] = "GameNewOutfitProtocol";
    GameFeature[GameFeature["GamePVPMode"] = 50] = "GamePVPMode";
    GameFeature[GameFeature["GameWritableDate"] = 51] = "GameWritableDate";
    GameFeature[GameFeature["GameAdditionalVipInfo"] = 52] = "GameAdditionalVipInfo";
    GameFeature[GameFeature["GameBaseSkillU16"] = 53] = "GameBaseSkillU16";
    GameFeature[GameFeature["GameCreatureIcons"] = 54] = "GameCreatureIcons";
    GameFeature[GameFeature["GameHideNpcNames"] = 55] = "GameHideNpcNames";
    GameFeature[GameFeature["GameSpritesAlphaChannel"] = 56] = "GameSpritesAlphaChannel";
    GameFeature[GameFeature["GamePremiumExpiration"] = 57] = "GamePremiumExpiration";
    GameFeature[GameFeature["GameBrowseField"] = 58] = "GameBrowseField";
    GameFeature[GameFeature["GameEnhancedAnimations"] = 59] = "GameEnhancedAnimations";
    GameFeature[GameFeature["GameOGLInformation"] = 60] = "GameOGLInformation";
    GameFeature[GameFeature["GameMessageSizeCheck"] = 61] = "GameMessageSizeCheck";
    GameFeature[GameFeature["GamePreviewState"] = 62] = "GamePreviewState";
    GameFeature[GameFeature["GameLoginPacketEncryption"] = 63] = "GameLoginPacketEncryption";
    GameFeature[GameFeature["GameClientVersion"] = 64] = "GameClientVersion";
    GameFeature[GameFeature["GameContentRevision"] = 65] = "GameContentRevision";
    GameFeature[GameFeature["GameExperienceBonus"] = 66] = "GameExperienceBonus";
    GameFeature[GameFeature["GameAuthenticator"] = 67] = "GameAuthenticator";
    GameFeature[GameFeature["GameUnjustifiedPoints"] = 68] = "GameUnjustifiedPoints";
    GameFeature[GameFeature["GameSessionKey"] = 69] = "GameSessionKey";
    GameFeature[GameFeature["GameDeathType"] = 70] = "GameDeathType";
    GameFeature[GameFeature["GameIdleAnimations"] = 71] = "GameIdleAnimations";
    GameFeature[GameFeature["GameKeepUnawareTiles"] = 72] = "GameKeepUnawareTiles";
    GameFeature[GameFeature["GameIngameStore"] = 73] = "GameIngameStore";
    GameFeature[GameFeature["GameIngameStoreHighlights"] = 74] = "GameIngameStoreHighlights";
    GameFeature[GameFeature["GameIngameStoreServiceType"] = 75] = "GameIngameStoreServiceType";
    GameFeature[GameFeature["GameAdditionalSkills"] = 76] = "GameAdditionalSkills";
    GameFeature[GameFeature["LastGameFeature"] = 101] = "LastGameFeature";
})(GameFeature || (exports.GameFeature = GameFeature = {}));
var FrameGroupType = exports.FrameGroupType = undefined;
(function (FrameGroupType) {
    FrameGroupType[FrameGroupType["FrameGroupDefault"] = 0] = "FrameGroupDefault";
    FrameGroupType[FrameGroupType["FrameGroupIdle"] = 0] = "FrameGroupIdle";
    FrameGroupType[FrameGroupType["FrameGroupMoving"] = 1] = "FrameGroupMoving";
})(FrameGroupType || (exports.FrameGroupType = FrameGroupType = {}));
var DatThingCategory = exports.DatThingCategory = undefined;
(function (DatThingCategory) {
    DatThingCategory[DatThingCategory["ThingCategoryItem"] = 0] = "ThingCategoryItem";
    DatThingCategory[DatThingCategory["ThingCategoryCreature"] = 1] = "ThingCategoryCreature";
    DatThingCategory[DatThingCategory["ThingCategoryEffect"] = 2] = "ThingCategoryEffect";
    DatThingCategory[DatThingCategory["ThingCategoryMissile"] = 3] = "ThingCategoryMissile";
    DatThingCategory[DatThingCategory["ThingInvalidCategory"] = 4] = "ThingInvalidCategory";
    DatThingCategory[DatThingCategory["ThingLastCategory"] = 4] = "ThingLastCategory";
})(DatThingCategory || (exports.DatThingCategory = DatThingCategory = {}));
var DatThingAttr = exports.DatThingAttr = undefined;
(function (DatThingAttr) {
    DatThingAttr[DatThingAttr["ThingAttrGround"] = 0] = "ThingAttrGround";
    DatThingAttr[DatThingAttr["ThingAttrGroundBorder"] = 1] = "ThingAttrGroundBorder";
    DatThingAttr[DatThingAttr["ThingAttrOnBottom"] = 2] = "ThingAttrOnBottom";
    DatThingAttr[DatThingAttr["ThingAttrOnTop"] = 3] = "ThingAttrOnTop";
    DatThingAttr[DatThingAttr["ThingAttrContainer"] = 4] = "ThingAttrContainer";
    DatThingAttr[DatThingAttr["ThingAttrStackable"] = 5] = "ThingAttrStackable";
    DatThingAttr[DatThingAttr["ThingAttrForceUse"] = 6] = "ThingAttrForceUse";
    DatThingAttr[DatThingAttr["ThingAttrMultiUse"] = 7] = "ThingAttrMultiUse";
    DatThingAttr[DatThingAttr["ThingAttrWritable"] = 8] = "ThingAttrWritable";
    DatThingAttr[DatThingAttr["ThingAttrWritableOnce"] = 9] = "ThingAttrWritableOnce";
    DatThingAttr[DatThingAttr["ThingAttrFluidContainer"] = 10] = "ThingAttrFluidContainer";
    DatThingAttr[DatThingAttr["ThingAttrSplash"] = 11] = "ThingAttrSplash";
    DatThingAttr[DatThingAttr["ThingAttrNotWalkable"] = 12] = "ThingAttrNotWalkable";
    DatThingAttr[DatThingAttr["ThingAttrNotMoveable"] = 13] = "ThingAttrNotMoveable";
    DatThingAttr[DatThingAttr["ThingAttrBlockProjectile"] = 14] = "ThingAttrBlockProjectile";
    DatThingAttr[DatThingAttr["ThingAttrNotPathable"] = 15] = "ThingAttrNotPathable";
    DatThingAttr[DatThingAttr["ThingAttrPickupable"] = 16] = "ThingAttrPickupable";
    DatThingAttr[DatThingAttr["ThingAttrHangable"] = 17] = "ThingAttrHangable";
    DatThingAttr[DatThingAttr["ThingAttrHookSouth"] = 18] = "ThingAttrHookSouth";
    DatThingAttr[DatThingAttr["ThingAttrHookEast"] = 19] = "ThingAttrHookEast";
    DatThingAttr[DatThingAttr["ThingAttrRotateable"] = 20] = "ThingAttrRotateable";
    DatThingAttr[DatThingAttr["ThingAttrLight"] = 21] = "ThingAttrLight";
    DatThingAttr[DatThingAttr["ThingAttrDontHide"] = 22] = "ThingAttrDontHide";
    DatThingAttr[DatThingAttr["ThingAttrTranslucent"] = 23] = "ThingAttrTranslucent";
    DatThingAttr[DatThingAttr["ThingAttrDisplacement"] = 24] = "ThingAttrDisplacement";
    DatThingAttr[DatThingAttr["ThingAttrElevation"] = 25] = "ThingAttrElevation";
    DatThingAttr[DatThingAttr["ThingAttrLyingCorpse"] = 26] = "ThingAttrLyingCorpse";
    DatThingAttr[DatThingAttr["ThingAttrAnimateAlways"] = 27] = "ThingAttrAnimateAlways";
    DatThingAttr[DatThingAttr["ThingAttrMinimapColor"] = 28] = "ThingAttrMinimapColor";
    DatThingAttr[DatThingAttr["ThingAttrLensHelp"] = 29] = "ThingAttrLensHelp";
    DatThingAttr[DatThingAttr["ThingAttrFullGround"] = 30] = "ThingAttrFullGround";
    DatThingAttr[DatThingAttr["ThingAttrLook"] = 31] = "ThingAttrLook";
    DatThingAttr[DatThingAttr["ThingAttrCloth"] = 32] = "ThingAttrCloth";
    DatThingAttr[DatThingAttr["ThingAttrMarket"] = 33] = "ThingAttrMarket";
    DatThingAttr[DatThingAttr["ThingAttrUsable"] = 34] = "ThingAttrUsable";
    DatThingAttr[DatThingAttr["ThingAttrWrapable"] = 35] = "ThingAttrWrapable";
    DatThingAttr[DatThingAttr["ThingAttrUnwrapable"] = 36] = "ThingAttrUnwrapable";
    DatThingAttr[DatThingAttr["ThingAttrTopEffect"] = 37] = "ThingAttrTopEffect";
    // additional
    DatThingAttr[DatThingAttr["ThingAttrOpacity"] = 100] = "ThingAttrOpacity";
    DatThingAttr[DatThingAttr["ThingAttrNotPreWalkable"] = 101] = "ThingAttrNotPreWalkable";
    DatThingAttr[DatThingAttr["ThingAttrFloorChange"] = 252] = "ThingAttrFloorChange";
    DatThingAttr[DatThingAttr["ThingAttrNoMoveAnimation"] = 253] = "ThingAttrNoMoveAnimation";
    DatThingAttr[DatThingAttr["ThingAttrChargeable"] = 254] = "ThingAttrChargeable";
    DatThingAttr[DatThingAttr["ThingLastAttr"] = 255] = "ThingLastAttr";
})(DatThingAttr || (exports.DatThingAttr = DatThingAttr = {}));
var OtbItemCategory = exports.OtbItemCategory = undefined;
(function (OtbItemCategory) {
    OtbItemCategory[OtbItemCategory["ItemCategoryInvalid"] = 0] = "ItemCategoryInvalid";
    OtbItemCategory[OtbItemCategory["ItemCategoryGround"] = 1] = "ItemCategoryGround";
    OtbItemCategory[OtbItemCategory["ItemCategoryContainer"] = 2] = "ItemCategoryContainer";
    OtbItemCategory[OtbItemCategory["ItemCategoryWeapon"] = 3] = "ItemCategoryWeapon";
    OtbItemCategory[OtbItemCategory["ItemCategoryAmmunition"] = 4] = "ItemCategoryAmmunition";
    OtbItemCategory[OtbItemCategory["ItemCategoryArmor"] = 5] = "ItemCategoryArmor";
    OtbItemCategory[OtbItemCategory["ItemCategoryCharges"] = 6] = "ItemCategoryCharges";
    OtbItemCategory[OtbItemCategory["ItemCategoryTeleport"] = 7] = "ItemCategoryTeleport";
    OtbItemCategory[OtbItemCategory["ItemCategoryMagicField"] = 8] = "ItemCategoryMagicField";
    OtbItemCategory[OtbItemCategory["ItemCategoryWritable"] = 9] = "ItemCategoryWritable";
    OtbItemCategory[OtbItemCategory["ItemCategoryKey"] = 10] = "ItemCategoryKey";
    OtbItemCategory[OtbItemCategory["ItemCategorySplash"] = 11] = "ItemCategorySplash";
    OtbItemCategory[OtbItemCategory["ItemCategoryFluid"] = 12] = "ItemCategoryFluid";
    OtbItemCategory[OtbItemCategory["ItemCategoryDoor"] = 13] = "ItemCategoryDoor";
    OtbItemCategory[OtbItemCategory["ItemCategoryDeprecated"] = 14] = "ItemCategoryDeprecated";
    OtbItemCategory[OtbItemCategory["ItemCategoryLast"] = 15] = "ItemCategoryLast";
})(OtbItemCategory || (exports.OtbItemCategory = OtbItemCategory = {}));
var OtbItemTypeAttr = exports.OtbItemTypeAttr = undefined;
(function (OtbItemTypeAttr) {
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrServerId"] = 16] = "ItemTypeAttrServerId";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrClientId"] = 17] = "ItemTypeAttrClientId";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrName"] = 18] = "ItemTypeAttrName";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrDesc"] = 19] = "ItemTypeAttrDesc";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrSpeed"] = 20] = "ItemTypeAttrSpeed";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrSlot"] = 21] = "ItemTypeAttrSlot";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrMaxItems"] = 22] = "ItemTypeAttrMaxItems";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrWeight"] = 23] = "ItemTypeAttrWeight";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrWeapon"] = 24] = "ItemTypeAttrWeapon";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrAmmunition"] = 25] = "ItemTypeAttrAmmunition";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrArmor"] = 26] = "ItemTypeAttrArmor";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrMagicLevel"] = 27] = "ItemTypeAttrMagicLevel";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrMagicField"] = 28] = "ItemTypeAttrMagicField";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrWritable"] = 29] = "ItemTypeAttrWritable";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrRotateTo"] = 30] = "ItemTypeAttrRotateTo";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrDecay"] = 31] = "ItemTypeAttrDecay";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrSpriteHash"] = 32] = "ItemTypeAttrSpriteHash";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrMinimapColor"] = 33] = "ItemTypeAttrMinimapColor";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttr07"] = 34] = "ItemTypeAttr07";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttr08"] = 35] = "ItemTypeAttr08";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrLight"] = 36] = "ItemTypeAttrLight";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrDecay2"] = 37] = "ItemTypeAttrDecay2";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrWeapon2"] = 38] = "ItemTypeAttrWeapon2";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrAmmunition2"] = 39] = "ItemTypeAttrAmmunition2";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrArmor2"] = 40] = "ItemTypeAttrArmor2";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrWritable2"] = 41] = "ItemTypeAttrWritable2";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrLight2"] = 42] = "ItemTypeAttrLight2";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrTopOrder"] = 43] = "ItemTypeAttrTopOrder";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrWrtiable3"] = 44] = "ItemTypeAttrWrtiable3";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrWareId"] = 45] = "ItemTypeAttrWareId";
    OtbItemTypeAttr[OtbItemTypeAttr["ItemTypeAttrLast"] = 46] = "ItemTypeAttrLast";
})(OtbItemTypeAttr || (exports.OtbItemTypeAttr = OtbItemTypeAttr = {}));
var OtbItemFlags = exports.OtbItemFlags = undefined;
(function (OtbItemFlags) {
    OtbItemFlags[OtbItemFlags["FlagBlockSolid"] = 1] = "FlagBlockSolid";
    OtbItemFlags[OtbItemFlags["FlagBlockProjectile"] = 2] = "FlagBlockProjectile";
    OtbItemFlags[OtbItemFlags["FlagBlockPathfind"] = 4] = "FlagBlockPathfind";
    OtbItemFlags[OtbItemFlags["FlagHasHeight"] = 8] = "FlagHasHeight";
    OtbItemFlags[OtbItemFlags["FlagUseable"] = 16] = "FlagUseable";
    OtbItemFlags[OtbItemFlags["FlagPickupable"] = 32] = "FlagPickupable";
    OtbItemFlags[OtbItemFlags["FlagMoveable"] = 64] = "FlagMoveable";
    OtbItemFlags[OtbItemFlags["FlagStackable"] = 128] = "FlagStackable";
    OtbItemFlags[OtbItemFlags["FlagFloorchangedown"] = 256] = "FlagFloorchangedown";
    OtbItemFlags[OtbItemFlags["FlagFloorchangenorth"] = 512] = "FlagFloorchangenorth";
    OtbItemFlags[OtbItemFlags["FlagFloorchangeeast"] = 1024] = "FlagFloorchangeeast";
    OtbItemFlags[OtbItemFlags["FlagFloorchangesouth"] = 2048] = "FlagFloorchangesouth";
    OtbItemFlags[OtbItemFlags["FlagFloorchangewest"] = 4096] = "FlagFloorchangewest";
    OtbItemFlags[OtbItemFlags["FlagAlwaysontop"] = 8192] = "FlagAlwaysontop";
    OtbItemFlags[OtbItemFlags["FlagReadable"] = 16384] = "FlagReadable";
    OtbItemFlags[OtbItemFlags["FlagRotatable"] = 32768] = "FlagRotatable";
    OtbItemFlags[OtbItemFlags["FlagHangable"] = 65536] = "FlagHangable";
    OtbItemFlags[OtbItemFlags["FlagVertical"] = 131072] = "FlagVertical";
    OtbItemFlags[OtbItemFlags["FlagHorizontal"] = 262144] = "FlagHorizontal";
    OtbItemFlags[OtbItemFlags["FlagCannotdecay"] = 524288] = "FlagCannotdecay";
    OtbItemFlags[OtbItemFlags["FlagAllowdistread"] = 1048576] = "FlagAllowdistread";
    OtbItemFlags[OtbItemFlags["FlagUnused"] = 2097152] = "FlagUnused";
    OtbItemFlags[OtbItemFlags["FlagClientcharges"] = 4194304] = "FlagClientcharges";
    OtbItemFlags[OtbItemFlags["FlagLookthrough"] = 8388608] = "FlagLookthrough";
    OtbItemFlags[OtbItemFlags["FlagAnimation"] = 16777216] = "FlagAnimation";
    OtbItemFlags[OtbItemFlags["FlagFulltile"] = 33554432] = "FlagFulltile";
    OtbItemFlags[OtbItemFlags["FlagForceuse"] = 67108864] = "FlagForceuse";
})(OtbItemFlags || (exports.OtbItemFlags = OtbItemFlags = {}));
var SpriteMask = exports.SpriteMask = undefined;
(function (SpriteMask) {
    SpriteMask[SpriteMask["SpriteMaskRed"] = 1] = "SpriteMaskRed";
    SpriteMask[SpriteMask["SpriteMaskGreen"] = 2] = "SpriteMaskGreen";
    SpriteMask[SpriteMask["SpriteMaskBlue"] = 3] = "SpriteMaskBlue";
    SpriteMask[SpriteMask["SpriteMaskYellow"] = 4] = "SpriteMaskYellow";
})(SpriteMask || (exports.SpriteMask = SpriteMask = {}));

/***/ }),

/***/ 76:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.Client = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _const = __webpack_require__(6);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Client = exports.Client = function () {
    function Client() {
        _classCallCheck(this, Client);

        this.m_clientVersion = 0;
        this.m_features = [];
    }

    _createClass(Client, [{
        key: "getClientVersion",
        value: function getClientVersion() {
            return this.m_clientVersion;
        }
    }, {
        key: "setClientVersion",
        value: function setClientVersion(version) {
            this.m_clientVersion = version;
            this.updateFeatures(version);
        }
    }, {
        key: "enableFeature",
        value: function enableFeature(feature) {
            this.m_features[feature] = true;
        }
    }, {
        key: "disableFeature",
        value: function disableFeature(feature) {
            this.m_features[feature] = false;
        }
    }, {
        key: "getFeature",
        value: function getFeature(feature) {
            return this.m_features[feature] == true;
        }
    }, {
        key: "updateFeatures",
        value: function updateFeatures(version) {
            this.m_features = [];
            this.enableFeature(_const.GameFeature.GameFormatCreatureName);
            if (version >= 770) {
                this.enableFeature(_const.GameFeature.GameLooktypeU16);
                this.enableFeature(_const.GameFeature.GameMessageStatements);
                this.enableFeature(_const.GameFeature.GameLoginPacketEncryption);
            }
            if (version >= 780) {
                this.enableFeature(_const.GameFeature.GamePlayerAddons);
                this.enableFeature(_const.GameFeature.GamePlayerStamina);
                this.enableFeature(_const.GameFeature.GameNewFluids);
                this.enableFeature(_const.GameFeature.GameMessageLevel);
                this.enableFeature(_const.GameFeature.GamePlayerStateU16);
                this.enableFeature(_const.GameFeature.GameNewOutfitProtocol);
            }
            if (version >= 790) {
                this.enableFeature(_const.GameFeature.GameWritableDate);
            }
            if (version >= 840) {
                this.enableFeature(_const.GameFeature.GameProtocolChecksum);
                this.enableFeature(_const.GameFeature.GameAccountNames);
                this.enableFeature(_const.GameFeature.GameDoubleFreeCapacity);
            }
            if (version >= 841) {
                this.enableFeature(_const.GameFeature.GameChallengeOnLogin);
                this.enableFeature(_const.GameFeature.GameMessageSizeCheck);
            }
            if (version >= 854) {
                this.enableFeature(_const.GameFeature.GameCreatureEmblems);
            }
            if (version >= 860) {
                this.enableFeature(_const.GameFeature.GameAttackSeq);
            }
            if (version >= 862) {
                this.enableFeature(_const.GameFeature.GamePenalityOnDeath);
            }
            if (version >= 870) {
                this.enableFeature(_const.GameFeature.GameDoubleExperience);
                this.enableFeature(_const.GameFeature.GamePlayerMounts);
                this.enableFeature(_const.GameFeature.GameSpellList);
            }
            if (version >= 910) {
                this.enableFeature(_const.GameFeature.GameNameOnNpcTrade);
                this.enableFeature(_const.GameFeature.GameTotalCapacity);
                this.enableFeature(_const.GameFeature.GameSkillsBase);
                this.enableFeature(_const.GameFeature.GamePlayerRegenerationTime);
                this.enableFeature(_const.GameFeature.GameChannelPlayerList);
                this.enableFeature(_const.GameFeature.GameEnvironmentEffect);
                this.enableFeature(_const.GameFeature.GameItemAnimationPhase);
            }
            if (version >= 940) {
                this.enableFeature(_const.GameFeature.GamePlayerMarket);
            }
            if (version >= 953) {
                this.enableFeature(_const.GameFeature.GamePurseSlot);
                this.enableFeature(_const.GameFeature.GameClientPing);
            }
            if (version >= 960) {
                this.enableFeature(_const.GameFeature.GameSpritesU32);
                this.enableFeature(_const.GameFeature.GameOfflineTrainingTime);
            }
            if (version >= 963) {
                this.enableFeature(_const.GameFeature.GameAdditionalVipInfo);
            }
            if (version >= 980) {
                this.enableFeature(_const.GameFeature.GamePreviewState);
                this.enableFeature(_const.GameFeature.GameClientVersion);
            }
            if (version >= 981) {
                this.enableFeature(_const.GameFeature.GameLoginPending);
                this.enableFeature(_const.GameFeature.GameNewSpeedLaw);
            }
            if (version >= 984) {
                this.enableFeature(_const.GameFeature.GameContainerPagination);
                this.enableFeature(_const.GameFeature.GameBrowseField);
            }
            if (version >= 1000) {
                this.enableFeature(_const.GameFeature.GameThingMarks);
                this.enableFeature(_const.GameFeature.GamePVPMode);
            }
            if (version >= 1035) {
                this.enableFeature(_const.GameFeature.GameDoubleSkills);
                this.enableFeature(_const.GameFeature.GameBaseSkillU16);
            }
            if (version >= 1036) {
                this.enableFeature(_const.GameFeature.GameCreatureIcons);
                this.enableFeature(_const.GameFeature.GameHideNpcNames);
            }
            if (version >= 1038) {
                this.enableFeature(_const.GameFeature.GamePremiumExpiration);
            }
            if (version >= 1050) {
                this.enableFeature(_const.GameFeature.GameEnhancedAnimations);
            }
            if (version >= 1053) {
                this.enableFeature(_const.GameFeature.GameUnjustifiedPoints);
            }
            if (version >= 1054) {
                this.enableFeature(_const.GameFeature.GameExperienceBonus);
            }
            if (version >= 1055) {
                this.enableFeature(_const.GameFeature.GameDeathType);
            }
            if (version >= 1057) {
                this.enableFeature(_const.GameFeature.GameIdleAnimations);
            }
            if (version >= 1061) {
                this.enableFeature(_const.GameFeature.GameOGLInformation);
            }
            if (version >= 1071) {
                this.enableFeature(_const.GameFeature.GameContentRevision);
            }
            if (version >= 1072) {
                this.enableFeature(_const.GameFeature.GameAuthenticator);
            }
            if (version >= 1074) {
                this.enableFeature(_const.GameFeature.GameSessionKey);
            }
            if (version >= 1080) {
                this.enableFeature(_const.GameFeature.GameIngameStore);
            }
            if (version >= 1092) {
                this.enableFeature(_const.GameFeature.GameIngameStoreServiceType);
            }
            if (version >= 1093) {
                this.enableFeature(_const.GameFeature.GameIngameStoreHighlights);
            }
            if (version >= 1094) {
                this.enableFeature(_const.GameFeature.GameAdditionalSkills);
            }
        }
    }]);

    return Client;
}();

/***/ }),

/***/ 77:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.DatManager = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _datThingType = __webpack_require__(78);

var _const = __webpack_require__(6);

var _log = __webpack_require__(12);

var _resources = __webpack_require__(30);

var _outputFile = __webpack_require__(31);

var _helpers = __webpack_require__(50);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var __awaiter = undefined && undefined.__awaiter || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) {
            try {
                step(generator.next(value));
            } catch (e) {
                reject(e);
            }
        }
        function rejected(value) {
            try {
                step(generator["throw"](value));
            } catch (e) {
                reject(e);
            }
        }
        function step(result) {
            result.done ? resolve(result.value) : new P(function (resolve) {
                resolve(result.value);
            }).then(fulfilled, rejected);
        }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};

var DatManager = exports.DatManager = function () {
    function DatManager(m_client) {
        _classCallCheck(this, DatManager);

        this.m_client = m_client;
        this.m_thingTypes = [];
        this.m_datSignature = 0;
        this.m_contentRevision = 0;
        for (var i = _const.DatThingCategory.ThingCategoryItem; i < _const.DatThingCategory.ThingLastCategory; ++i) {
            this.m_thingTypes[i] = [];
        }
    }

    _createClass(DatManager, [{
        key: "getThingType",
        value: function getThingType(id, category) {
            if (category >= _const.DatThingCategory.ThingLastCategory || id >= this.m_thingTypes[category].length) {
                _log.Log.error("invalid thing type client id %d in category %d", id, category);
                return DatManager.m_nullThingType;
            }
            return this.m_thingTypes[category][id];
        }
    }, {
        key: "getThingTypes",
        value: function getThingTypes() {
            return this.m_thingTypes;
        }
    }, {
        key: "getCategory",
        value: function getCategory(category) {
            return this.m_thingTypes[category];
        }
    }, {
        key: "getItem",
        value: function getItem(id) {
            return this.getThingType(id, _const.DatThingCategory.ThingCategoryItem);
        }
    }, {
        key: "getOutfit",
        value: function getOutfit(id) {
            return this.getThingType(id, _const.DatThingCategory.ThingCategoryCreature);
        }
    }, {
        key: "getEffect",
        value: function getEffect(id) {
            return this.getThingType(id, _const.DatThingCategory.ThingCategoryEffect);
        }
    }, {
        key: "getMissile",
        value: function getMissile(id) {
            return this.getThingType(id, _const.DatThingCategory.ThingCategoryMissile);
        }
    }, {
        key: "isValidDatId",
        value: function isValidDatId(id, category) {
            return true;
        }
    }, {
        key: "getNullThingType",
        value: function getNullThingType() {
            return DatManager.m_nullThingType;
        }
    }, {
        key: "getDatSignature",
        value: function getDatSignature() {
            throw this.m_datSignature;
        }
    }, {
        key: "getContentRevision",
        value: function getContentRevision() {
            throw this.m_contentRevision;
        }
    }, {
        key: "loadDatFromUrl",
        value: function loadDatFromUrl(url) {
            return __awaiter(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
                var fin;
                return regeneratorRuntime.wrap(function _callee$(_context) {
                    while (1) {
                        switch (_context.prev = _context.next) {
                            case 0:
                                _context.next = 2;
                                return _resources.g_resources.openUrl(url);

                            case 2:
                                fin = _context.sent;
                                return _context.abrupt("return", this.loadDat(fin));

                            case 4:
                            case "end":
                                return _context.stop();
                        }
                    }
                }, _callee, this);
            }));
        }
    }, {
        key: "loadDat",
        value: function loadDat(fin) {
            this.m_datSignature = 0;
            this.m_contentRevision = 0;
            try {
                this.m_datSignature = fin.getU32();
                this.m_contentRevision = this.m_datSignature & 0xFFFF;
                for (var category = _const.DatThingCategory.ThingCategoryItem; category < _const.DatThingCategory.ThingLastCategory; ++category) {
                    var count = fin.getU16() + 1;
                    this.m_thingTypes[category] = [];
                    for (var thingCount = 0; thingCount < count; ++thingCount) {
                        this.m_thingTypes[category][thingCount] = DatManager.m_nullThingType;
                    }
                }
                var clientTranslationArray = this.getClientTranslationArray();
                for (var _category = 0; _category < _const.DatThingCategory.ThingLastCategory; ++_category) {
                    var firstId = 1;
                    if (_category == _const.DatThingCategory.ThingCategoryItem) firstId = 100;
                    for (var id = firstId; id < this.m_thingTypes[_category].length; ++id) {
                        var type = new _datThingType.DatThingType();
                        type.unserialize(id, _category, fin, this.m_client, clientTranslationArray);
                        this.m_thingTypes[_category][id] = type;
                    }
                }
                return true;
            } catch (e) {
                _log.Log.error("Failed to read dat: %s'", e);
                return false;
            }
        }
    }, {
        key: "saveDat",
        value: function saveDat() {
            var fin = new _outputFile.OutputFile();
            fin.addU32(this.m_datSignature);
            for (var category = 0; category < _const.DatThingCategory.ThingLastCategory; ++category) {
                fin.addU16(this.m_thingTypes[category].length - 1);
            }
            var clientTranslationArray = this.getClientTranslationArray();
            for (var _category2 = 0; _category2 < _const.DatThingCategory.ThingLastCategory; ++_category2) {
                var firstId = 1;
                if (_category2 == _const.DatThingCategory.ThingCategoryItem) firstId = 100;
                for (var id = firstId; id < this.m_thingTypes[_category2].length; ++id) {
                    this.m_thingTypes[_category2][id].serialize(fin, _category2, this.m_client, clientTranslationArray);
                }
            }
            return fin;
        }
    }, {
        key: "getClientTranslationArray",
        value: function getClientTranslationArray() {
            var clientAttributesTranslator = {};
            for (var thingAttr = 0; thingAttr < _const.DatThingAttr.ThingLastAttr; ++thingAttr) {
                if (_const.DatThingAttr[thingAttr] === undefined) {
                    continue;
                }
                var clientDatAttribute = thingAttr;
                if (this.m_client.getClientVersion() >= 1000) {
                    /* In 10.10+ all attributes from 16 and up were
                     * incremented by 1 to make space for 16 as
                     * "No Movement Animation" flag.
                     */
                    if (thingAttr == _const.DatThingAttr.ThingAttrNoMoveAnimation) clientDatAttribute = 16;else if (thingAttr >= _const.DatThingAttr.ThingAttrPickupable) clientDatAttribute += 1;
                } else if (this.m_client.getClientVersion() >= 860) {
                    /* Default attribute values follow
                     * the format of 8.6-9.86.
                     * Therefore no changes here.
                     */
                } else if (this.m_client.getClientVersion() >= 780) {
                    /* In 7.80-8.54 all attributes from 8 and higher were
                     * incremented by 1 to make space for 8 as
                     * "Item Charges" flag.
                     */
                    if (thingAttr == _const.DatThingAttr.ThingAttrChargeable) clientDatAttribute = _const.DatThingAttr.ThingAttrWritable;else if (thingAttr >= _const.DatThingAttr.ThingAttrWritable) clientDatAttribute += 1;
                } else if (this.m_client.getClientVersion() >= 755) {
                    /* In 7.55-7.72 attributes 23 is "Floor Change". */
                    if (thingAttr == _const.DatThingAttr.ThingAttrFloorChange) clientDatAttribute = 23;
                } else if (this.m_client.getClientVersion() >= 740) {
                    /* In 7.4-7.5 attribute "Ground Border" did not exist
                     * attributes 1-15 have to be adjusted.
                     * Several other changes in the format.
                     */
                    if (thingAttr > 1 && thingAttr <= 16) thingAttr -= 1;else if (thingAttr == _const.DatThingAttr.ThingAttrLight) thingAttr = 16;else if (thingAttr == _const.DatThingAttr.ThingAttrFloorChange) thingAttr = 17;else if (thingAttr == _const.DatThingAttr.ThingAttrFullGround) thingAttr = 18;else if (thingAttr == _const.DatThingAttr.ThingAttrElevation) thingAttr = 19;else if (thingAttr == _const.DatThingAttr.ThingAttrDisplacement) thingAttr = 20;else if (thingAttr == _const.DatThingAttr.ThingAttrMinimapColor) thingAttr = 22;else if (thingAttr == _const.DatThingAttr.ThingAttrRotateable) thingAttr = 23;else if (thingAttr == _const.DatThingAttr.ThingAttrLyingCorpse) thingAttr = 24;else if (thingAttr == _const.DatThingAttr.ThingAttrHangable) thingAttr = 25;else if (thingAttr == _const.DatThingAttr.ThingAttrHookSouth) thingAttr = 26;else if (thingAttr == _const.DatThingAttr.ThingAttrHookEast) thingAttr = 27;else if (thingAttr == _const.DatThingAttr.ThingAttrAnimateAlways) thingAttr = 28;
                    /* "Multi Use" and "Force Use" are swapped */
                    if (thingAttr == _const.DatThingAttr.ThingAttrMultiUse) clientDatAttribute = _const.DatThingAttr.ThingAttrForceUse;else if (thingAttr == _const.DatThingAttr.ThingAttrForceUse) clientDatAttribute = _const.DatThingAttr.ThingAttrMultiUse;
                }
                clientAttributesTranslator[clientDatAttribute] = thingAttr;
            }
            return (0, _helpers.sortObjectByKey)(clientAttributesTranslator);
        }
    }]);

    return DatManager;
}();

DatManager.m_nullThingType = new _datThingType.DatThingType();

/***/ }),

/***/ 78:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.DatThingType = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _const = __webpack_require__(6);

var _log = __webpack_require__(12);

var _animator = __webpack_require__(79);

var _color = __webpack_require__(44);

var _datThingTypeAttributes = __webpack_require__(80);

var _size = __webpack_require__(14);

var _point = __webpack_require__(23);

var _marketData = __webpack_require__(81);

var _light = __webpack_require__(45);

var _frameGroup = __webpack_require__(82);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var DatThingType = exports.DatThingType = function () {
    function DatThingType() {
        _classCallCheck(this, DatThingType);

        this.m_id = 0;
        this.m_null = true;
        this.m_attribs = new _datThingTypeAttributes.DatThingTypeAttributes();
        this.m_displacement = new _point.Point();
        this.m_elevation = 0;
        this.m_frameGroups = [];
    }

    _createClass(DatThingType, [{
        key: "serialize",
        value: function serialize(fin, category, client, clientAttributeTranslator) {
            for (var clientAttrString in clientAttributeTranslator) {
                if (clientAttributeTranslator.hasOwnProperty(clientAttrString)) {
                    var clientDatAttr = parseInt(clientAttrString);
                    var thingAttr = parseInt(clientAttributeTranslator[clientDatAttr]);
                    if (!this.hasAttr(thingAttr)) continue;
                    fin.addU8(clientDatAttr);
                    switch (thingAttr) {
                        case _const.DatThingAttr.ThingAttrDisplacement:
                            {
                                if (client.getClientVersion() >= 755) {
                                    fin.addU16(this.m_displacement.x);
                                    fin.addU16(this.m_displacement.y);
                                }
                                break;
                            }
                        case _const.DatThingAttr.ThingAttrLight:
                            {
                                var light = this.m_attribs.get(thingAttr);
                                fin.addU16(light.intensity);
                                fin.addU16(light.color);
                                break;
                            }
                        case _const.DatThingAttr.ThingAttrMarket:
                            {
                                var market = this.m_attribs.get(thingAttr);
                                fin.addU16(market.category);
                                fin.addU16(market.tradeAs);
                                fin.addU16(market.showAs);
                                fin.addString(market.name);
                                fin.addU16(market.restrictVocation);
                                fin.addU16(market.requiredLevel);
                                break;
                            }
                        case _const.DatThingAttr.ThingAttrUsable:
                        case _const.DatThingAttr.ThingAttrElevation:
                        case _const.DatThingAttr.ThingAttrGround:
                        case _const.DatThingAttr.ThingAttrWritable:
                        case _const.DatThingAttr.ThingAttrWritableOnce:
                        case _const.DatThingAttr.ThingAttrMinimapColor:
                        case _const.DatThingAttr.ThingAttrCloth:
                        case _const.DatThingAttr.ThingAttrLensHelp:
                            fin.addU16(this.m_attribs.get(thingAttr));
                            break;
                        default:
                            break;
                    }
                }
            }
            fin.addU8(_const.DatThingAttr.ThingLastAttr);
            var hasFrameGroups = category == _const.DatThingCategory.ThingCategoryCreature && client.getFeature(_const.GameFeature.GameIdleAnimations);
            if (hasFrameGroups) fin.addU8(this.m_frameGroups.length);
            for (var frameGroupType in this.m_frameGroups) {
                if (hasFrameGroups) fin.addU8(Number(frameGroupType));
                var frameGroup = this.m_frameGroups[frameGroupType];
                fin.addU8(frameGroup.m_size.width());
                fin.addU8(frameGroup.m_size.height());
                if (frameGroup.m_size.width() > 1 || frameGroup.m_size.height() > 1) fin.addU8(frameGroup.m_realSize);
                fin.addU8(frameGroup.m_layers);
                fin.addU8(frameGroup.m_numPatternX);
                fin.addU8(frameGroup.m_numPatternY);
                if (client.getClientVersion() >= 755) fin.addU8(frameGroup.m_numPatternZ);
                fin.addU8(frameGroup.m_animationPhases);
                if (client.getFeature(_const.GameFeature.GameEnhancedAnimations)) {
                    if (frameGroup.m_animationPhases > 1 && frameGroup.m_animator != null) {
                        frameGroup.m_animator.serialize(fin);
                    }
                }
                for (var i2 = 0; i2 < frameGroup.m_spritesIndex.length; i2++) {
                    if (client.getFeature(_const.GameFeature.GameSpritesU32)) fin.addU32(frameGroup.m_spritesIndex[i2]);else fin.addU16(frameGroup.m_spritesIndex[i2]);
                }
            }
        }
    }, {
        key: "unserialize",
        value: function unserialize(clientId, category, fin, client, clientTranslationArray) {
            this.m_null = false;
            this.m_id = clientId;
            this.m_category = category;
            var count = 0;
            var attr = -1;
            var done = false;
            for (var i = 0; i < _const.DatThingAttr.ThingLastAttr; ++i) {
                count++;
                attr = fin.getU8();
                if (attr == _const.DatThingAttr.ThingLastAttr) {
                    done = true;
                    break;
                }
                attr = clientTranslationArray[attr];
                switch (attr) {
                    case _const.DatThingAttr.ThingAttrDisplacement:
                        {
                            this.m_displacement = new _point.Point(0, 0);
                            if (client.getClientVersion() >= 755) {
                                this.m_displacement.x = fin.getU16();
                                this.m_displacement.y = fin.getU16();
                            } else {
                                this.m_displacement.x = 8;
                                this.m_displacement.y = 8;
                            }
                            this.m_attribs.set(attr, true);
                            break;
                        }
                    case _const.DatThingAttr.ThingAttrLight:
                        {
                            var light = new _light.Light();
                            light.intensity = fin.getU16();
                            light.color = fin.getU16();
                            this.m_attribs.set(attr, light);
                            break;
                        }
                    case _const.DatThingAttr.ThingAttrMarket:
                        {
                            var market = new _marketData.MarketData();
                            market.category = fin.getU16();
                            market.tradeAs = fin.getU16();
                            market.showAs = fin.getU16();
                            market.name = fin.getString();
                            market.restrictVocation = fin.getU16();
                            market.requiredLevel = fin.getU16();
                            this.m_attribs.set(attr, market);
                            break;
                        }
                    case _const.DatThingAttr.ThingAttrElevation:
                        {
                            this.m_elevation = fin.getU16();
                            this.m_attribs.set(attr, this.m_elevation);
                            break;
                        }
                    case _const.DatThingAttr.ThingAttrUsable:
                    case _const.DatThingAttr.ThingAttrGround:
                    case _const.DatThingAttr.ThingAttrWritable:
                    case _const.DatThingAttr.ThingAttrWritableOnce:
                    case _const.DatThingAttr.ThingAttrMinimapColor:
                    case _const.DatThingAttr.ThingAttrCloth:
                    case _const.DatThingAttr.ThingAttrLensHelp:
                        this.m_attribs.set(attr, fin.getU16());
                        break;
                    default:
                        this.m_attribs.set(attr, true);
                        break;
                }
            }
            if (!done) (0, _log.error)("corrupt data (id: %d, category: %d, count: %d, lastAttr: %d)", this.m_id, this.m_category, count, attr);
            var hasFrameGroups = category == _const.DatThingCategory.ThingCategoryCreature && client.getFeature(_const.GameFeature.GameIdleAnimations);
            var groupCount = hasFrameGroups ? fin.getU8() : 1;
            for (var _i = 0; _i < groupCount; ++_i) {
                var frameGroupType = category == _const.DatThingCategory.ThingCategoryCreature ? _const.FrameGroupType.FrameGroupMoving : _const.FrameGroupType.FrameGroupIdle;
                if (hasFrameGroups) frameGroupType = fin.getU8();
                var frameGroup = new _frameGroup.FrameGroup();
                var width = fin.getU8();
                var height = fin.getU8();
                frameGroup.m_size = new _size.Size(width, height);
                if (width > 1 || height > 1) {
                    frameGroup.m_realSize = fin.getU8();
                    frameGroup.m_exactSize = Math.min(frameGroup.m_realSize, Math.max(width * 32, height * 32));
                } else frameGroup.m_exactSize = 32;
                frameGroup.m_layers = fin.getU8();
                frameGroup.m_numPatternX = fin.getU8();
                frameGroup.m_numPatternY = fin.getU8();
                if (client.getClientVersion() >= 755) frameGroup.m_numPatternZ = fin.getU8();else frameGroup.m_numPatternZ = 1;
                var groupAnimationsPhases = fin.getU8();
                frameGroup.m_animationPhases = groupAnimationsPhases;
                if (groupAnimationsPhases > 1 && client.getFeature(_const.GameFeature.GameEnhancedAnimations)) {
                    frameGroup.m_animator = new _animator.Animator();
                    frameGroup.m_animator.unserialize(groupAnimationsPhases, fin);
                }
                var totalSprites = frameGroup.m_size.area() * frameGroup.m_layers * frameGroup.m_numPatternX * frameGroup.m_numPatternY * frameGroup.m_numPatternZ * groupAnimationsPhases;
                if (totalSprites > 4096) (0, _log.error)("a thing type has more than 4096 sprites", totalSprites, frameGroup.m_size.area(), frameGroup.m_layers, frameGroup.m_numPatternX, frameGroup.m_numPatternY, frameGroup.m_numPatternZ, groupAnimationsPhases);
                frameGroup.m_spritesIndex = [];
                for (var _i2 = 0; _i2 < totalSprites; _i2++) {
                    frameGroup.m_spritesIndex[_i2] = client.getFeature(_const.GameFeature.GameSpritesU32) ? fin.getU32() : fin.getU16();
                }
                //console.log('spr', this.m_spritesIndex);
                this.m_frameGroups[frameGroupType] = frameGroup;
            }
        }
    }, {
        key: "getId",
        value: function getId() {
            return this.m_id;
        }
    }, {
        key: "getCategory",
        value: function getCategory() {
            return this.m_category;
        }
    }, {
        key: "isNull",
        value: function isNull() {
            return this.m_null;
        }
    }, {
        key: "hasAttr",
        value: function hasAttr(attr) {
            return this.m_attribs.has(attr);
        }
    }, {
        key: "getDisplacement",
        value: function getDisplacement() {
            return this.m_displacement;
        }
    }, {
        key: "getDisplacementX",
        value: function getDisplacementX() {
            return this.getDisplacement().x;
        }
    }, {
        key: "getDisplacementY",
        value: function getDisplacementY() {
            return this.getDisplacement().y;
        }
    }, {
        key: "getElevation",
        value: function getElevation() {
            return this.m_elevation;
        }
    }, {
        key: "getFrameGroups",
        value: function getFrameGroups() {
            return this.m_frameGroups;
        }
    }, {
        key: "getFrameGroup",
        value: function getFrameGroup(frameGroupType) {
            return this.m_frameGroups[frameGroupType];
        }
    }, {
        key: "getGroundSpeed",
        value: function getGroundSpeed() {
            return this.m_attribs.get(_const.DatThingAttr.ThingAttrGround);
        }
    }, {
        key: "getMaxTextLength",
        value: function getMaxTextLength() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrWritableOnce) ? this.m_attribs.get(_const.DatThingAttr.ThingAttrWritableOnce) : this.m_attribs.get(_const.DatThingAttr.ThingAttrWritable);
        }
    }, {
        key: "getLight",
        value: function getLight() {
            return this.m_attribs.get(_const.DatThingAttr.ThingAttrLight);
        }
    }, {
        key: "getMinimapColor",
        value: function getMinimapColor() {
            return this.m_attribs.get(_const.DatThingAttr.ThingAttrMinimapColor);
        }
    }, {
        key: "getLensHelp",
        value: function getLensHelp() {
            return this.m_attribs.get(_const.DatThingAttr.ThingAttrLensHelp);
        }
    }, {
        key: "getClothSlot",
        value: function getClothSlot() {
            return this.m_attribs.get(_const.DatThingAttr.ThingAttrCloth);
        }
    }, {
        key: "getMarketData",
        value: function getMarketData() {
            return this.m_attribs.get(_const.DatThingAttr.ThingAttrMarket);
        }
    }, {
        key: "isGround",
        value: function isGround() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrGround);
        }
    }, {
        key: "isGroundBorder",
        value: function isGroundBorder() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrGroundBorder);
        }
    }, {
        key: "isOnBottom",
        value: function isOnBottom() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrOnBottom);
        }
    }, {
        key: "isOnTop",
        value: function isOnTop() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrOnTop);
        }
    }, {
        key: "isContainer",
        value: function isContainer() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrContainer);
        }
    }, {
        key: "isStackable",
        value: function isStackable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrStackable);
        }
    }, {
        key: "isForceUse",
        value: function isForceUse() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrForceUse);
        }
    }, {
        key: "isMultiUse",
        value: function isMultiUse() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrMultiUse);
        }
    }, {
        key: "isWritable",
        value: function isWritable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrWritable);
        }
    }, {
        key: "isChargeable",
        value: function isChargeable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrChargeable);
        }
    }, {
        key: "isWritableOnce",
        value: function isWritableOnce() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrWritableOnce);
        }
    }, {
        key: "isFluidContainer",
        value: function isFluidContainer() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrFluidContainer);
        }
    }, {
        key: "isSplash",
        value: function isSplash() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrSplash);
        }
    }, {
        key: "isNotWalkable",
        value: function isNotWalkable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrNotWalkable);
        }
    }, {
        key: "isNotMoveable",
        value: function isNotMoveable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrNotMoveable);
        }
    }, {
        key: "blockProjectile",
        value: function blockProjectile() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrBlockProjectile);
        }
    }, {
        key: "isNotPathable",
        value: function isNotPathable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrNotPathable);
        }
    }, {
        key: "isPickupable",
        value: function isPickupable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrPickupable);
        }
    }, {
        key: "isHangable",
        value: function isHangable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrHangable);
        }
    }, {
        key: "isHookSouth",
        value: function isHookSouth() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrHookSouth);
        }
    }, {
        key: "isHookEast",
        value: function isHookEast() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrHookEast);
        }
    }, {
        key: "isRotateable",
        value: function isRotateable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrRotateable);
        }
    }, {
        key: "hasLight",
        value: function hasLight() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrLight);
        }
    }, {
        key: "isDontHide",
        value: function isDontHide() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrDontHide);
        }
    }, {
        key: "isTranslucent",
        value: function isTranslucent() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrTranslucent);
        }
    }, {
        key: "hasDisplacement",
        value: function hasDisplacement() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrDisplacement);
        }
    }, {
        key: "hasElevation",
        value: function hasElevation() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrElevation);
        }
    }, {
        key: "isLyingCorpse",
        value: function isLyingCorpse() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrLyingCorpse);
        }
    }, {
        key: "isAnimateAlways",
        value: function isAnimateAlways() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrAnimateAlways);
        }
    }, {
        key: "hasMiniMapColor",
        value: function hasMiniMapColor() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrMinimapColor);
        }
    }, {
        key: "hasLensHelp",
        value: function hasLensHelp() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrLensHelp);
        }
    }, {
        key: "isFullGround",
        value: function isFullGround() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrFullGround);
        }
    }, {
        key: "isIgnoreLook",
        value: function isIgnoreLook() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrLook);
        }
    }, {
        key: "isCloth",
        value: function isCloth() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrCloth);
        }
    }, {
        key: "isMarketable",
        value: function isMarketable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrMarket);
        }
    }, {
        key: "isUsable",
        value: function isUsable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrUsable);
        }
    }, {
        key: "isWrapable",
        value: function isWrapable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrWrapable);
        }
    }, {
        key: "isUnwrapable",
        value: function isUnwrapable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrUnwrapable);
        }
    }, {
        key: "isTopEffect",
        value: function isTopEffect() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrTopEffect);
        }
    }, {
        key: "isNotPreWalkable",
        value: function isNotPreWalkable() {
            return this.m_attribs.has(_const.DatThingAttr.ThingAttrNotPreWalkable);
        }
    }, {
        key: "setPathable",
        value: function setPathable(v) {
            if (v == true) this.m_attribs.remove(_const.DatThingAttr.ThingAttrNotPathable);else this.m_attribs.set(_const.DatThingAttr.ThingAttrNotPathable, true);
        }
    }, {
        key: "getBestTextureDimension",
        value: function getBestTextureDimension(w, h, count) {
            var MAX = 32;
            var k = 1;
            while (k < w) {
                k <<= 1;
            }w = k;
            k = 1;
            while (k < h) {
                k <<= 1;
            }h = k;
            var numSprites = w * h * count;
            /*
            assert(numSprites <= MAX*MAX);
            assert(w <= MAX);
            assert(h <= MAX);
            */
            var bestDimension = new _size.Size(MAX, MAX);
            for (var i = w; i <= MAX; i <<= 1) {
                for (var j = h; j <= MAX; j <<= 1) {
                    var candidateDimension = new _size.Size(i, j);
                    if (candidateDimension.area() < numSprites) continue;
                    if (candidateDimension.area() < bestDimension.area() || candidateDimension.area() == bestDimension.area() && candidateDimension.width() + candidateDimension.height() < bestDimension.width() + bestDimension.height()) bestDimension = candidateDimension;
                }
            }
            return bestDimension;
        }
    }]);

    return DatThingType;
}();

DatThingType.maskColors = [_color.Color.red, _color.Color.green, _color.Color.blue, _color.Color.yellow];

/***/ }),

/***/ 79:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Animator = exports.Animator = function () {
    function Animator() {
        _classCallCheck(this, Animator);

        this.m_animationPhases = 0;
        this.m_startPhase = 0;
        this.m_loopCount = 0;
        this.m_async = false;
        this.m_phaseDurations = [];
    }

    _createClass(Animator, [{
        key: "unserialize",
        value: function unserialize(animationPhases, fin) {
            this.m_animationPhases = animationPhases;
            this.m_async = fin.getU8() == 0;
            this.m_loopCount = fin.get32();
            this.m_startPhase = fin.get8();
            for (var i = 0; i < this.m_animationPhases; ++i) {
                var minimum = fin.getU32();
                var maximum = fin.getU32();
                this.m_phaseDurations.push([minimum, maximum]);
            }
        }
    }, {
        key: "serialize",
        value: function serialize(fin) {
            fin.addU8(this.m_async ? 0 : 1);
            fin.add32(this.m_loopCount);
            fin.add8(this.m_startPhase);
            var _iteratorNormalCompletion = true;
            var _didIteratorError = false;
            var _iteratorError = undefined;

            try {
                for (var _iterator = this.m_phaseDurations[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                    var phase = _step.value;

                    fin.addU32(phase[0]);
                    fin.addU32(phase[1]);
                }
            } catch (err) {
                _didIteratorError = true;
                _iteratorError = err;
            } finally {
                try {
                    if (!_iteratorNormalCompletion && _iterator.return) {
                        _iterator.return();
                    }
                } finally {
                    if (_didIteratorError) {
                        throw _iteratorError;
                    }
                }
            }
        }
    }]);

    return Animator;
}();

/***/ }),

/***/ 80:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var DatThingTypeAttributes = exports.DatThingTypeAttributes = function () {
    function DatThingTypeAttributes() {
        _classCallCheck(this, DatThingTypeAttributes);

        this.attribs = {};
    }

    _createClass(DatThingTypeAttributes, [{
        key: "has",
        value: function has(attr) {
            return this.attribs.hasOwnProperty(attr.toString());
        }
    }, {
        key: "get",
        value: function get(attr) {
            return this.attribs[attr];
        }
    }, {
        key: "set",
        value: function set(attr, value) {
            this.attribs[attr] = value;
        }
    }, {
        key: "remove",
        value: function remove(attr) {
            delete this.attribs[attr];
        }
    }]);

    return DatThingTypeAttributes;
}();

/***/ }),

/***/ 81:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var MarketData = exports.MarketData = function MarketData() {
  _classCallCheck(this, MarketData);
};

/***/ }),

/***/ 82:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.FrameGroup = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _size = __webpack_require__(14);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var FrameGroup = exports.FrameGroup = function () {
    function FrameGroup() {
        _classCallCheck(this, FrameGroup);

        this.m_size = new _size.Size();
        this.m_animator = null;
        this.m_animationPhases = 0;
        this.m_exactSize = 0;
        this.m_realSize = 0;
        this.m_numPatternX = 0;
        this.m_numPatternY = 0;
        this.m_numPatternZ = 0;
        this.m_layers = 0;
        this.m_spritesIndex = [];
    }

    _createClass(FrameGroup, [{
        key: "getSize",
        value: function getSize() {
            return this.m_size;
        }
    }, {
        key: "getWidth",
        value: function getWidth() {
            return this.m_size.width();
        }
    }, {
        key: "getHeight",
        value: function getHeight() {
            return this.m_size.height();
        }
    }, {
        key: "getRealSize",
        value: function getRealSize() {
            return this.m_realSize;
        }
    }, {
        key: "getLayers",
        value: function getLayers() {
            return this.m_layers;
        }
    }, {
        key: "getNumPatternX",
        value: function getNumPatternX() {
            return this.m_numPatternX;
        }
    }, {
        key: "getNumPatternY",
        value: function getNumPatternY() {
            return this.m_numPatternY;
        }
    }, {
        key: "getNumPatternZ",
        value: function getNumPatternZ() {
            return this.m_numPatternZ;
        }
    }, {
        key: "getAnimationPhases",
        value: function getAnimationPhases() {
            return this.m_animationPhases;
        }
    }, {
        key: "getAnimator",
        value: function getAnimator() {
            return this.m_animator;
        }
    }, {
        key: "getSprites",
        value: function getSprites() {
            return this.m_spritesIndex;
        }
    }, {
        key: "getSprite",
        value: function getSprite(index) {
            return this.m_spritesIndex[index];
        }
    }, {
        key: "getSpriteIndex",
        value: function getSpriteIndex(w, h, l, x, y, z, a) {
            var index = (((((a % this.m_animationPhases * this.m_numPatternZ + z) * this.m_numPatternY + y) * this.m_numPatternX + x) * this.m_layers + l) * this.m_size.height() + h) * this.m_size.width() + w;
            if (!(index < this.m_spritesIndex.length)) {
                throw new Error('index < this.m_spritesIndex.length');
            }
            return index;
        }
    }, {
        key: "getTextureIndex",
        value: function getTextureIndex(l, x, y, z) {
            return ((l * this.m_numPatternZ + z) * this.m_numPatternY + y) * this.m_numPatternX + x;
        }
    }]);

    return FrameGroup;
}();

/***/ }),

/***/ 83:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Pixel = exports.Pixel = function () {
    function Pixel(_r, _g, _b, _a) {
        _classCallCheck(this, Pixel);

        this._r = _r;
        this._g = _g;
        this._b = _b;
        this._a = _a;
    }

    _createClass(Pixel, [{
        key: "isTransparent",
        value: function isTransparent() {
            return this._r == 0 && this._g == 0 && this._b == 0 && this._a == 0;
        }
    }, {
        key: "r",
        get: function get() {
            return this._r;
        },
        set: function set(value) {
            this._r = value;
        }
    }, {
        key: "g",
        get: function get() {
            return this._g;
        },
        set: function set(value) {
            this._g = value;
        }
    }, {
        key: "b",
        get: function get() {
            return this._b;
        },
        set: function set(value) {
            this._b = value;
        }
    }, {
        key: "a",
        get: function get() {
            return this._a;
        },
        set: function set(value) {
            this._a = value;
        }
    }]);

    return Pixel;
}();

Pixel.BYTES_PER_PIXEL = 4;

/***/ }),

/***/ 84:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.OtbManager = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _log = __webpack_require__(12);

var _resources = __webpack_require__(30);

var _otbItemType = __webpack_require__(85);

var _outputFile = __webpack_require__(31);

var _outputBinaryTree = __webpack_require__(87);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var __awaiter = undefined && undefined.__awaiter || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) {
            try {
                step(generator.next(value));
            } catch (e) {
                reject(e);
            }
        }
        function rejected(value) {
            try {
                step(generator["throw"](value));
            } catch (e) {
                reject(e);
            }
        }
        function step(result) {
            result.done ? resolve(result.value) : new P(function (resolve) {
                resolve(result.value);
            }).then(fulfilled, rejected);
        }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};

var OtbManager = exports.OtbManager = function () {
    function OtbManager(m_client) {
        _classCallCheck(this, OtbManager);

        this.m_client = m_client;
        this.m_loaded = false;
        this.m_lastId = 99;
        this.m_itemTypes = [];
        this.m_reverseItemTypes = [];
        this.m_otbMajorVersion = 0;
        this.m_otbMinorVersion = 0;
        this.m_otbBuildVersion = 0;
        this.m_otbDescription = '';
    }

    _createClass(OtbManager, [{
        key: "getItem",
        value: function getItem(id) {
            return this.m_itemTypes[id];
        }
    }, {
        key: "getItemByClientId",
        value: function getItemByClientId(id) {
            return this.m_reverseItemTypes[id];
        }
    }, {
        key: "isValidOtbId",
        value: function isValidOtbId(id) {
            return this.m_itemTypes[id] !== undefined;
        }
    }, {
        key: "getLastId",
        value: function getLastId() {
            return this.m_lastId;
        }
    }, {
        key: "setLastId",
        value: function setLastId(value) {
            this.m_lastId = value;
        }
    }, {
        key: "increaseLastId",
        value: function increaseLastId() {
            this.setLastId(this.getLastId() + 1);
        }
    }, {
        key: "getMajorVersion",
        value: function getMajorVersion() {
            return this.m_otbMajorVersion;
        }
    }, {
        key: "setMajorVersion",
        value: function setMajorVersion(version) {
            this.m_otbMajorVersion = version;
        }
    }, {
        key: "getMinorVersion",
        value: function getMinorVersion() {
            return this.m_otbMajorVersion;
        }
    }, {
        key: "setMinorVersion",
        value: function setMinorVersion(version) {
            this.m_otbMajorVersion = version;
        }
    }, {
        key: "getBuildVersion",
        value: function getBuildVersion() {
            return this.m_otbBuildVersion;
        }
    }, {
        key: "setBuildVersion",
        value: function setBuildVersion(version) {
            this.m_otbBuildVersion = version;
        }
    }, {
        key: "getDescription",
        value: function getDescription() {
            return this.m_otbDescription;
        }
        /**
         * Set description to 128 ASCII characters.
         * Format required by OTBI.
         * @param description
         */

    }, {
        key: "setDescription",
        value: function setDescription(description) {
            var newDescription = '';
            for (var i = 0; i < description.length, newDescription.length < 128; i++) {
                newDescription += String.fromCharCode(description.charCodeAt(i) % 256);
            }
            while (newDescription.length < 128) {
                newDescription += String.fromCharCode(0);
            }
            this.m_otbDescription = newDescription;
        }
    }, {
        key: "loadOtbFromUrl",
        value: function loadOtbFromUrl(url) {
            return __awaiter(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
                var fin;
                return regeneratorRuntime.wrap(function _callee$(_context) {
                    while (1) {
                        switch (_context.prev = _context.next) {
                            case 0:
                                _context.next = 2;
                                return _resources.g_resources.openUrl(url);

                            case 2:
                                fin = _context.sent;
                                return _context.abrupt("return", this.loadOtb(fin));

                            case 4:
                            case "end":
                                return _context.stop();
                        }
                    }
                }, _callee, this);
            }));
        }
    }, {
        key: "loadOtb",
        value: function loadOtb(fin) {
            if (this.m_loaded) {
                throw new Error("OtbManager can load OTB only once");
            }
            this.m_loaded = true;
            try {
                var signature = fin.getU32();
                if (signature != 0) throw new Error("invalid otb file 1, " + signature);
                var root = fin.getBinaryTree();
                root.skip(1);
                signature = root.getU32();
                if (signature != 0) throw new Error("invalid otb file 2, " + signature);
                var rootAttr = root.getU8();
                if (rootAttr == 0x01) {
                    // OTB_ROOT_ATTR_VERSION
                    var size = root.getU16();
                    if (size != 4 + 4 + 4 + 128) throw new Error("invalid otb root attr version size");
                    this.m_otbMajorVersion = root.getU32();
                    this.m_otbMinorVersion = root.getU32();
                    this.m_otbBuildVersion = root.getU32();
                    this.m_otbDescription = root.getString(128);
                }
                var _iteratorNormalCompletion = true;
                var _didIteratorError = false;
                var _iteratorError = undefined;

                try {
                    for (var _iterator = root.getChildren()[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                        var node = _step.value;

                        var itemType = new _otbItemType.OtbItemType();
                        itemType.unserialize(node, this);
                        this.addItemType(itemType);
                    }
                } catch (err) {
                    _didIteratorError = true;
                    _iteratorError = err;
                } finally {
                    try {
                        if (!_iteratorNormalCompletion && _iterator.return) {
                            _iterator.return();
                        }
                    } finally {
                        if (_didIteratorError) {
                            throw _iteratorError;
                        }
                    }
                }

                return true;
            } catch (e) {
                _log.Log.error("Failed to load (OTB file): %s", e);
                return false;
            }
        }
    }, {
        key: "saveOtb",
        value: function saveOtb() {
            var fout = new _outputFile.OutputFile();
            fout.addU32(0);
            var root = new _outputBinaryTree.OutputBinaryTree(fout);
            root.addU32(0); // signature
            root.addU8(1); // OTB_ROOT_ATTR_VERSION
            root.addU16(4 + 4 + 4 + 128); // size
            root.addU32(this.m_otbMajorVersion);
            root.addU32(this.m_otbMinorVersion);
            root.addU32(this.m_otbBuildVersion);
            root.addString(this.m_otbDescription, 128); // build version
            var _iteratorNormalCompletion2 = true;
            var _didIteratorError2 = false;
            var _iteratorError2 = undefined;

            try {
                for (var _iterator2 = this.m_itemTypes[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
                    var otbItemType = _step2.value;

                    if (otbItemType) {
                        root.startNode(-1);
                        otbItemType.serialize(root, this);
                        root.endNode();
                    }
                }
            } catch (err) {
                _didIteratorError2 = true;
                _iteratorError2 = err;
            } finally {
                try {
                    if (!_iteratorNormalCompletion2 && _iterator2.return) {
                        _iterator2.return();
                    }
                } finally {
                    if (_didIteratorError2) {
                        throw _iteratorError2;
                    }
                }
            }

            root.endNode();
            return fout;
        }
    }, {
        key: "addItemType",
        value: function addItemType(itemType) {
            this.m_itemTypes[itemType.getServerId()] = itemType;
            this.m_reverseItemTypes[itemType.getClientId()] = itemType;
        }
    }]);

    return OtbManager;
}();

/***/ }),

/***/ 85:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.OtbItemType = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _const = __webpack_require__(6);

var _light = __webpack_require__(45);

var _otbItemTypeAttributes = __webpack_require__(86);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var OtbItemType = exports.OtbItemType = function () {
    function OtbItemType() {
        _classCallCheck(this, OtbItemType);

        this.m_null = true;
        this.m_category = _const.OtbItemCategory.ItemCategoryInvalid;
        this.m_flags = 0;
        this.m_attribs = new _otbItemTypeAttributes.OtbItemTypeAttributes();
    }

    _createClass(OtbItemType, [{
        key: "serialize",
        value: function serialize(node, m_otbManager) {
            node.addU8(this.m_category);
            node.addU32(this.m_flags);
            for (var attrString in this.m_attribs.attribs) {
                var attr = parseInt(attrString);
                node.addU8(attr);
                switch (attr) {
                    case _const.OtbItemTypeAttr.ItemTypeAttrServerId:
                        {
                            var serverId = this.m_attribs.get(attr);
                            if (m_otbManager.m_client.getClientVersion() < 960) {
                                if (serverId > 20000 && serverId < 20100) {
                                    serverId += 20000;
                                }
                            } else {
                                if (serverId > 30000 && serverId < 30100) {
                                    serverId += 30000;
                                }
                            }
                            node.addU16(2);
                            node.addU16(serverId);
                            break;
                        }
                    case _const.OtbItemTypeAttr.ItemTypeAttrClientId:
                        node.addU16(2);
                        node.addU16(this.m_attribs.get(attr));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrName:
                        node.addString(this.m_attribs.get(attr));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrSpeed:
                        node.addU16(2);
                        node.addU16(this.m_attribs.get(attr));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrWritable:
                        node.addU16(1);
                        node.addU8(this.m_attribs.get(attr));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrSpriteHash:
                        node.addString(this.m_attribs.get(attr));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrMinimapColor:
                        node.addU16(2);
                        node.addU16(this.m_attribs.get(attr));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttr07:
                        node.addU16(2);
                        node.addU16(this.m_attribs.get(attr));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttr08:
                        node.addU16(2);
                        node.addU16(this.m_attribs.get(attr));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrLight2:
                        node.addU16(4);
                        var light = this.m_attribs.get(attr);
                        node.addU16(light.intensity);
                        node.addU16(light.color);
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrTopOrder:
                        //1: borders
                        //2: ladders, signs, splashes
                        //3: doors etc
                        //4: creatures
                        node.addU16(1);
                        node.addU8(this.m_attribs.get(attr));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrWareId:
                        node.addU16(2);
                        node.addU16(this.m_attribs.get(attr));
                        break;
                    default:
                        node.addString(this.m_attribs.get(attr));
                }
            }
        }
    }, {
        key: "unserialize",
        value: function unserialize(node, m_otbManager) {
            this.m_null = false;
            this.m_category = node.getU8();
            this.m_flags = node.getU32();
            while (node.canRead()) {
                var attr = node.getU8();
                if (attr == 0 || attr == 0xFF) {
                    break;
                }
                var len = node.getU16();
                switch (attr) {
                    case _const.OtbItemTypeAttr.ItemTypeAttrServerId:
                        {
                            var serverId = node.getU16();
                            if (m_otbManager.m_client.getClientVersion() < 960) {
                                if (serverId > 20000 && serverId < 20100) {
                                    serverId -= 20000;
                                } else if (m_otbManager.getLastId() > 99 && m_otbManager.getLastId() != serverId - 1) {
                                    while (m_otbManager.getLastId() != serverId - 1) {
                                        var tmp = new OtbItemType();
                                        tmp.setServerId(m_otbManager.getLastId());
                                        m_otbManager.increaseLastId();
                                        m_otbManager.addItemType(tmp);
                                    }
                                }
                            } else {
                                if (serverId > 30000 && serverId < 30100) {
                                    serverId -= 30000;
                                } else if (m_otbManager.getLastId() > 99 && m_otbManager.getLastId() != serverId - 1) {
                                    while (m_otbManager.getLastId() != serverId - 1) {
                                        var _tmp = new OtbItemType();
                                        _tmp.setServerId(m_otbManager.getLastId());
                                        m_otbManager.increaseLastId();
                                        m_otbManager.addItemType(_tmp);
                                    }
                                }
                            }
                            this.setServerId(serverId);
                            m_otbManager.setLastId(serverId);
                            break;
                        }
                    case _const.OtbItemTypeAttr.ItemTypeAttrClientId:
                        this.setClientId(node.getU16());
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrName:
                        this.setName(node.getString(len));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrSpeed:
                        this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrSpeed, node.getU16());
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrWritable:
                        this.setWritable(true);
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrSpriteHash:
                        this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrSpriteHash, node.getString(len));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrMinimapColor:
                        this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrMinimapColor, node.getU16());
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttr07:
                        this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttr07, node.getU16());
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttr08:
                        this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttr08, node.getU16());
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrLight2:
                        this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrLight2, new _light.Light(node.getU16(), node.getU16()));
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrTopOrder:
                        //1: borders
                        //2: ladders, signs, splashes
                        //3: doors etc
                        //4: creatures
                        this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrTopOrder, node.getU8());
                        break;
                    case _const.OtbItemTypeAttr.ItemTypeAttrWareId:
                        this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrWareId, node.getU16());
                        break;
                    default:
                        this.m_attribs.set(attr, node.getString(len));
                        break;
                }
            }
        }
    }, {
        key: "isNull",
        value: function isNull() {
            return this.m_null;
        }
    }, {
        key: "setCategory",
        value: function setCategory(category) {
            this.m_category = category;
        }
    }, {
        key: "getCategory",
        value: function getCategory() {
            return this.m_category;
        }
    }, {
        key: "setFlags",
        value: function setFlags(flags) {
            this.m_flags = flags;
        }
    }, {
        key: "getFlags",
        value: function getFlags() {
            return this.m_flags;
        }
    }, {
        key: "hasFlag",
        value: function hasFlag(flag) {
            return (this.m_flags & flag) == flag;
        }
    }, {
        key: "setFlag",
        value: function setFlag(flag, value) {
            if (value) {
                this.m_flags |= flag;
            } else {
                this.m_flags &= ~flag;
            }
        }
    }, {
        key: "setServerId",
        value: function setServerId(serverId) {
            this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrServerId, serverId);
        }
    }, {
        key: "getServerId",
        value: function getServerId() {
            return this.m_attribs.get(_const.OtbItemTypeAttr.ItemTypeAttrServerId);
        }
    }, {
        key: "setClientId",
        value: function setClientId(clientId) {
            this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrClientId, clientId);
        }
    }, {
        key: "getClientId",
        value: function getClientId() {
            return this.m_attribs.get(_const.OtbItemTypeAttr.ItemTypeAttrClientId);
        }
    }, {
        key: "setName",
        value: function setName(name) {
            this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrName, name);
        }
    }, {
        key: "getName",
        value: function getName() {
            return this.m_attribs.get(_const.OtbItemTypeAttr.ItemTypeAttrName);
        }
    }, {
        key: "setDescription",
        value: function setDescription(description) {
            this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrDesc, description);
        }
    }, {
        key: "getDescription",
        value: function getDescription() {
            return this.m_attribs.get(_const.OtbItemTypeAttr.ItemTypeAttrDesc);
        }
    }, {
        key: "setWritable",
        value: function setWritable(value) {
            this.m_attribs.set(_const.OtbItemTypeAttr.ItemTypeAttrWritable, value);
        }
    }, {
        key: "isWritable",
        value: function isWritable() {
            return this.m_attribs.get(_const.OtbItemTypeAttr.ItemTypeAttrWritable);
        }
    }, {
        key: "getAttributes",
        value: function getAttributes() {
            return this.m_attribs;
        }
    }, {
        key: "setAttributes",
        value: function setAttributes(otbItemTypeAttributes) {
            this.m_attribs = otbItemTypeAttributes;
        }
    }]);

    return OtbItemType;
}();

/***/ }),

/***/ 86:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var OtbItemTypeAttributes = exports.OtbItemTypeAttributes = function () {
    function OtbItemTypeAttributes() {
        _classCallCheck(this, OtbItemTypeAttributes);

        this.attribs = {};
    }

    _createClass(OtbItemTypeAttributes, [{
        key: "has",
        value: function has(attr) {
            return this.attribs.hasOwnProperty(attr.toString());
        }
    }, {
        key: "get",
        value: function get(attr) {
            return this.attribs[attr];
        }
    }, {
        key: "set",
        value: function set(attr, value) {
            this.attribs[attr] = value;
        }
    }, {
        key: "remove",
        value: function remove(attr) {
            delete this.attribs[attr];
        }
    }]);

    return OtbItemTypeAttributes;
}();

/***/ }),

/***/ 87:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.OutputBinaryTree = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _binaryTree = __webpack_require__(49);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

/**
 * In OutputBinaryTree we got to add BINARYTREE_ESCAPE_CHAR before every special character.
 * We also need to operate on bytes of numbers, so code is a bit dirty.
 */
var OutputBinaryTree = exports.OutputBinaryTree = function (_BinaryTree) {
    _inherits(OutputBinaryTree, _BinaryTree);

    function OutputBinaryTree(m_fin) {
        _classCallCheck(this, OutputBinaryTree);

        var _this = _possibleConstructorReturn(this, (OutputBinaryTree.__proto__ || Object.getPrototypeOf(OutputBinaryTree)).call(this, m_fin));

        _this.m_fin = m_fin;
        _this.m_pos = 0xFFFFFFFF;
        _this.m_startPos = 0;
        _this.startNode(0);
        return _this;
    }

    _createClass(OutputBinaryTree, [{
        key: "addU8",
        value: function addU8(value) {
            value = value % 256;
            if (value == _binaryTree.BinaryTree.BINARYTREE_NODE_START || value === _binaryTree.BinaryTree.BINARYTREE_NODE_END || value === _binaryTree.BinaryTree.BINARYTREE_ESCAPE_CHAR) {
                this.m_fin.addU8(_binaryTree.BinaryTree.BINARYTREE_ESCAPE_CHAR);
            }
            this.m_fin.addU8(value);
        }
    }, {
        key: "addU16",
        value: function addU16(value) {
            value = value % 65536;
            var b2 = Math.floor(value / 256);
            value -= b2 * 256;
            var b1 = value;
            this.addU8(b1);
            this.addU8(b2);
        }
    }, {
        key: "addU32",
        value: function addU32(value) {
            value = value % 4294967296;
            var b4 = Math.floor(value / 16777216);
            value -= b4 * 16777216;
            var b3 = Math.floor(value / 65536);
            value -= b3 * 65536;
            var b2 = Math.floor(value / 256);
            value -= b2 * 256;
            var b1 = value;
            this.addU8(b1);
            this.addU8(b2);
            this.addU8(b3);
            this.addU8(b4);
        }
    }, {
        key: "addString",
        value: function addString(value) {
            var length = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : -1;

            if (length === -1) {
                this.addU16(value.length);
                length = value.length;
            }
            for (var i = 0; i < length; i++) {
                this.addU8(value.charCodeAt(i));
            }
        }
    }, {
        key: "addPos",
        value: function addPos(x, y, z) {
            this.addU16(x);
            this.addU16(y);
            this.addU8(z);
        }
    }, {
        key: "addPoint",
        value: function addPoint(point) {
            this.addU8(point.x);
            this.addU8(point.y);
        }
    }, {
        key: "startNode",
        value: function startNode(node) {
            this.m_fin.addU8(_binaryTree.BinaryTree.BINARYTREE_NODE_START);
            if (node !== -1) {
                this.addU8(node);
            }
        }
    }, {
        key: "endNode",
        value: function endNode() {
            this.m_fin.addU8(_binaryTree.BinaryTree.BINARYTREE_NODE_END);
        }
    }]);

    return OutputBinaryTree;
}(_binaryTree.BinaryTree);

OutputBinaryTree.BINARYTREE_ESCAPE_CHAR = 0xFD;
OutputBinaryTree.BINARYTREE_NODE_START = 0xFE;
OutputBinaryTree.BINARYTREE_NODE_END = 0xFF;

/***/ }),

/***/ 88:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.ImageGenerator = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _spriteManager = __webpack_require__(32);

var _sprite = __webpack_require__(40);

var _size = __webpack_require__(14);

var _point = __webpack_require__(23);

var _const = __webpack_require__(6);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ImageGenerator = exports.ImageGenerator = function () {
    function ImageGenerator() {
        var datManager = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
        var sprManager = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
        var otbManager = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

        _classCallCheck(this, ImageGenerator);

        this.datManager = datManager;
        this.sprManager = sprManager;
        this.otbManager = otbManager;
    }

    _createClass(ImageGenerator, [{
        key: "generateItemImageByServerId",
        value: function generateItemImageByServerId(serverItemId) {
            var animationFrame = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

            if (this.otbManager === null) {
                throw new Error("otbManager is not set");
            }
            if (!this.otbManager.isValidOtbId(serverItemId)) {
                return null;
            }
            var clientItemId = this.otbManager.getItem(serverItemId).getClientId();
            if (!clientItemId) {
                return null;
            }
            return this.generateItemImageByClientId(clientItemId, animationFrame);
        }
    }, {
        key: "generateItemImagesByServerId",
        value: function generateItemImagesByServerId(serverItemId) {
            if (this.otbManager === null) {
                throw new Error("otbManager is not set");
            }
            if (!this.otbManager.isValidOtbId(serverItemId)) {
                return null;
            }
            var clientItemId = this.otbManager.getItem(serverItemId).getClientId();
            if (!clientItemId) {
                return null;
            }
            return this.generateItemImagesByClientId(clientItemId);
        }
    }, {
        key: "generateItemImageByClientId",
        value: function generateItemImageByClientId(clientItemId) {
            var animationFrame = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

            if (this.datManager === null) {
                throw new Error("datManager is not set");
            }
            if (this.sprManager === null) {
                throw new Error("sprManager is not set");
            }
            var itemThingType = this.datManager.getItem(clientItemId);
            if (!itemThingType) {
                console.log('missing dat item', clientItemId);
                return null;
            }
            var frameGroup = itemThingType.getFrameGroup(_const.FrameGroupType.FrameGroupIdle);
            if (!frameGroup) {
                console.log('missing idle frameGroup item', clientItemId);
                return null;
            }
            var itemSprite = new _sprite.Sprite(new _size.Size(_spriteManager.SpriteManager.SPRITE_SIZE * frameGroup.m_size.width(), _spriteManager.SpriteManager.SPRITE_SIZE * frameGroup.m_size.height()));
            for (var l = 0; l < frameGroup.m_layers; ++l) {
                for (var w = 0; w < frameGroup.m_size.width(); ++w) {
                    for (var h = 0; h < frameGroup.m_size.height(); ++h) {
                        var spriteId = frameGroup.m_spritesIndex[frameGroup.getSpriteIndex(w, h, l, 0, 0, 0, animationFrame)];
                        var sprite = this.sprManager.getSprite(spriteId);
                        if (!sprite) {
                            if (spriteId != 0) {
                                console.log('missing sprite', spriteId);
                            }
                            continue;
                        }
                        itemSprite.blit(new _point.Point(_spriteManager.SpriteManager.SPRITE_SIZE * (frameGroup.m_size.width() - w - 1), _spriteManager.SpriteManager.SPRITE_SIZE * (frameGroup.m_size.height() - h - 1)), sprite);
                    }
                }
            }
            return itemSprite;
        }
    }, {
        key: "generateItemImagesByClientId",
        value: function generateItemImagesByClientId(clientItemId) {
            if (this.datManager === null) {
                throw new Error("datManager is not set");
            }
            if (this.sprManager === null) {
                throw new Error("sprManager is not set");
            }
            var itemThingType = this.datManager.getItem(clientItemId);
            if (!itemThingType) {
                console.log('missing dat item', clientItemId);
                return null;
            }
            var frameGroup = itemThingType.getFrameGroup(_const.FrameGroupType.FrameGroupIdle);
            if (!frameGroup) {
                console.log('missing idle frameGroup item', clientItemId);
                return null;
            }
            var itemSprites = [];
            for (var a = 0; a < frameGroup.m_animationPhases; ++a) {
                var itemSprite = this.generateItemImageByClientId(clientItemId, a);
                if (itemSprite) {
                    itemSprites.push(itemSprite);
                }
            }
            return itemSprites;
        }
    }, {
        key: "generateOutfitAnimationImages",
        value: function generateOutfitAnimationImages(outfitId) {
            var frameGroupType = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : _const.FrameGroupType.FrameGroupMoving;

            if (this.datManager === null) {
                throw new Error("datManager is not set");
            }
            if (this.sprManager === null) {
                throw new Error("sprManager is not set");
            }
            var outfitThingType = this.datManager.getOutfit(outfitId);
            if (!outfitThingType) {
                console.log('missing dat outfit', outfitId);
                return null;
            }
            var frameGroup = outfitThingType.getFrameGroup(frameGroupType);
            if (!frameGroup) {
                console.log('missing frameGroup outfit', outfitId, frameGroupType);
                return null;
            }
            var sprites = [];
            for (var z = 0; z < frameGroup.m_numPatternZ; ++z) {
                for (var y = 0; y < frameGroup.m_numPatternY; ++y) {
                    for (var x = 0; x < frameGroup.m_numPatternX; ++x) {
                        for (var l = 0; l < frameGroup.m_layers; ++l) {
                            for (var a = 0; a < frameGroup.m_animationPhases; ++a) {
                                console.log('generate', 'outfits_anim/' + outfitId + '/' + (a + 1) + '/' + (z + 1) + '/' + (y + 1) + '/' + (x + 1));
                                var outfitSprite = new _sprite.Sprite(new _size.Size(_spriteManager.SpriteManager.SPRITE_SIZE * frameGroup.m_size.width(), _spriteManager.SpriteManager.SPRITE_SIZE * frameGroup.m_size.height()));
                                for (var w = 0; w < frameGroup.m_size.width(); ++w) {
                                    for (var h = 0; h < frameGroup.m_size.height(); ++h) {
                                        var spriteId = frameGroup.m_spritesIndex[frameGroup.getSpriteIndex(w, h, l, x, y, z, a)];
                                        var sprite = this.sprManager.getSprite(spriteId);
                                        if (!sprite) {
                                            if (spriteId != 0) {
                                                console.log('missing sprite', spriteId);
                                            }
                                            continue;
                                        }
                                        outfitSprite.blit(new _point.Point(_spriteManager.SpriteManager.SPRITE_SIZE * (frameGroup.m_size.width() - w - 1), _spriteManager.SpriteManager.SPRITE_SIZE * (frameGroup.m_size.height() - h - 1)), sprite);
                                    }
                                }
                                if (l == 1) {
                                    sprites.push({ file: 'outfits_anim/' + outfitId + '/' + (a + 1) + '_' + (z + 1) + '_' + (y + 1) + '_' + (x + 1) + '_template', sprite: outfitSprite });
                                } else {
                                    sprites.push({ file: 'outfits_anim/' + outfitId + '/' + (a + 1) + '_' + (z + 1) + '_' + (y + 1) + '_' + (x + 1), sprite: outfitSprite });
                                }
                            }
                        }
                    }
                }
            }
            return sprites;
        }
    }]);

    return ImageGenerator;
}();

/***/ })

},[209]);