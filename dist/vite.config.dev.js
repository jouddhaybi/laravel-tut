"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vite = require("vite");

var _laravelVitePlugin = _interopRequireDefault(require("laravel-vite-plugin"));

var _vite2 = _interopRequireDefault(require("@tailwindcss/vite"));

var _pluginReact = _interopRequireDefault(require("@vitejs/plugin-react"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var _default = (0, _vite.defineConfig)({
  plugins: [(0, _laravelVitePlugin["default"])({
    input: ["resources/css/app.css", "resources/js/app.js"],
    refresh: true
  }), (0, _vite2["default"])(), (0, _pluginReact["default"])()]
});

exports["default"] = _default;