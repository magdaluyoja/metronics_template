window.$ = window.jQuery = require('jquery');
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
require('bootstrap-sass');
require('js-cookie');
require('bootstrap-hover-dropdown');
require('jquery-slimscroll');
require('block-ui');
require('jquery.uniform');
require('bootstrap-switch');

window.iziToast = require('izitoast');

require('../global/scripts/app.js');
require('../layouts/layout/scripts/layout.js');
require('../layouts/layout/scripts/demo.js');
require('../layouts/global/scripts/quick-sidebar.js');
require('./Classes/Data.js');
require('./Classes/Message.js');
require('./Classes/Theme.js');
require('./theme.js');