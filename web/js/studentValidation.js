/**
 * Created by Dimona on 25.10.14.
 */


/**
 * Bootstrap Validation
 */
$(document).ready(function () {
    $('#formStudent').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstname: {
                message: 'The first name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'The first name must be less than 100 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The first name can only consist of alphabetical'
                    }
                }
            },
            lastname: {
                message: 'The last name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'The last name must be less than 100 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The last name can only consist of alphabetical'
                    }
                }
            },
            sex: {
                message: 'The sex is not valid',
                validators: {
                    notEmpty: {
                        message: 'The sex is required and cannot be empty'
                    }
                }
            },
            age: {
                message: 'The age is not valid',
                validators: {
                    notEmpty: {
                        message: 'The age is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The age can only consist of number'
                    }
                }
            },
            group: {
                message: 'The group is not valid',
                validators: {
                    notEmpty: {
                        message: 'The group is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 15,
                        message: 'The group must be less than 15 characters long'
                    }
                }
            },
            faculty: {
                message: 'The faculty is not valid',
                validators: {
                    notEmpty: {
                        message: 'The faculty is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'The faculty must be less than 100 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The faculty can only consist of alphabetical'
                    }
                }
            }
        }
    });
});