import _ from 'lodash';
import Popper from 'popper.js';
import $ from 'jquery';
import 'bootstrap';
import axios from 'axios';

window._ = _;

try {
  window.Popper = Popper;
  window.$ = window.jQuery = $;
} catch (e) {}

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
