
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
var reportPage = new Vue({
    el: '#reportFormContainer',
    components: {
      Datepicker
    },
    data: function () {
        return {
            reportModel: ''
        }
    },
    computed: {
        isUserReport: function() {
            return this.reportModel === 'user';
        },
        isProductReport: function() {
            return this.reportModel === 'product';
        },
        isOrderReport: function() {
            return this.reportModel === 'order';
        }
    }
});




