define(function(require, exports, module) {
    var Validator = require('bootstrap.validator');
    require('common/validator-rules').inject(Validator);
    var Notify = require('common/bootstrap-notify');

    exports.run = function() {

        var validator = new Validator({
                element: '#payment-form'
            });
        
        $('[name=alipay_enabled]').change(function(e) {
            var radio = e.target.value;

            if (radio == '1') {
                validator.addItem({
                    element: '[name="alipay_secret"]',
                    required: true,
                    errormessageRequired: '请输入Key'
                });
                validator.addItem({
                    element: '[name=alipay_key]',
                    required: true,
                    errormessageRequired: '请输入PID'
                });
            } else {
                validator.removeItem('[name="alipay_secret"]');
                validator.removeItem('[name="alipay_key"]');
            }
        });

        $('[name=wxpay_enabled]').change(function(e) {
            var radio = e.target.value;

            if (radio == '1') {
                validator.addItem({
                    element: '[name="wxpay_key"]',
                    required: true,
                    errormessageRequired: '请输入PID'
                });
                validator.addItem({
                    element: '[name=wxpay_account]',
                    required: true,
                    errormessageRequired: '请输入商户号'
                });
                validator.addItem({
                    element: '[name=wxpay_secret]',
                    required: true,
                    errormessageRequired: '请输入商户平台Key'
                });
            } else {
                validator.removeItem('[name="wxpay_key"]');
                validator.removeItem('[name="wxpay_account"]');
                validator.removeItem('[name="wxpay_secret"]');
            }
        });

        $('[name=heepay_enabled]').change(function(e) {
            var radio = e.target.value;

            if (radio == '1') {
                validator.addItem({
                    element: '[name="heepay_key"]',
                    required: true,
                    errormessageRequired: '请输入PID'
                });
                validator.addItem({
                    element: '[name=heepay_secret]',
                    required: true,
                    errormessageRequired: '请输入商户平台Key'
                });
            } else {
                validator.removeItem('[name="heepay_key"]');
                validator.removeItem('[name="heepay_secret"]');
            }
        });

        $('[name=quickpay_enabled]').change(function(e) {
            var radio = e.target.value;

            if (radio == '1') {
                validator.addItem({
                    element: '[name="quickpay_key"]',
                    required: true,
                    errormessageRequired: '请输入PID'
                });
                validator.addItem({
                    element: '[name=quickpay_secret]',
                    required: true,
                    errormessageRequired: '请输入Key'
                });
                validator.addItem({
                    element: '[name=quickpay_aes]',
                    required: true,
                    errormessageRequired: '请输入Aes'
                });
            } else {
                validator.removeItem('[name="quickpay_key"]');
                validator.removeItem('[name="quickpay_secret"]');
                validator.removeItem('[name="quickpay_aes"]');
            }
        });

        $('[name=llcbpay_enabled]').change(function(e) {
            var radio = e.target.value;

            if (radio == '1') {
                validator.addItem({
                    element: '[name="llcbpay_key"]',
                    required: true,
                    errormessageRequired: '请输入商户账号'
                });
                validator.addItem({
                    element: '[name=llcbpay_secret]',
                    required: true,
                    errormessageRequired: '请输入商户平台Key'
                });
            } else {
                validator.removeItem('[name="llcbpay_key"]');
                validator.removeItem('[name="llcbpay_secret"]');
            }
        });

        $('[name=llquickpay_enabled]').change(function(e) {
            var radio = e.target.value;
            
            if (radio == '1') {
                validator.addItem({
                    element: '[name="llquickpay_key"]',
                    required: true,
                    errormessageRequired: '请输入商户账号'
                });
                validator.addItem({
                    element: '[name=llcbpay_secret]',
                    required: true,
                    errormessageRequired: '请输入商户平台Key'
                });
            } else {
                validator.removeItem('[name="llquickpay_key"]');
                validator.removeItem('[name="llcbpay_secret"]');
            }
        });

        $('input[name="alipay_enabled"]:checked').change();
        $('input[name="wxpay_enabled"]:checked').change();
        $('input[name="heepay_enabled"]:checked').change();
        $('input[name="quickpay_enabled"]:checked').change();
        $('input[name="llcbpay_enabled"]:checked').change();
        $('input[name="llquickpay_enabled"]:checked').change();
    };

});