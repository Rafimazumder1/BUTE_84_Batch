var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;
var dom = document;
utlt['swalConfig'] = {
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
};

// Block page
utlt['Block'] = function() {
    $(document).find('.preloader-body').removeAttr('style');
    $(document).find('.preloader-body img').removeAttr('style');
}

// Block page
utlt['unBlock'] = function() {
    $(document).find('.preloader-body').attr('style', 'height:0px');
    $(document).find('.preloader-body img').attr('style', 'display:none;');
}
//end block page

/********************************/
/*         Date format          */
/********************************/
utlt["formatDate"] = function(date, format) {
    format = typeof format != 'undefined' ? format : 'MM-DD-YYYY HH:mm:ss';
    return moment(date).format(format)
}

/********************************/
/*common method for select2 ajax*/
/********************************/
utlt["select2_ajax"] = function(selector, ajaxUrl, extraParam) {
    extraParam = extraParam == undefined ? [] : extraParam;
    $(selector).select2({
        ajax: {
            url: utlt.siteUrl(ajaxUrl),
            dataType: 'json',
            placeholder: 'search',
            delay: 400,
            data: function(params) {
                return Object.assign({
                    search: params.term, // search term
                    page: params.page
                }, extraParam);
            },

            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * data.pegination) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        minimumInputLength: 1,

    });
}

utlt["cLog"] = function(url) {
    console.log(url);
}

/*********************************/
/*common method for get all value*/
/*********************************/
utlt["GetAll"] = function(url, htmlId, name, check, relationalCol, relationalName) {

    check = typeof check == "undefined" ? 0 : check;
    relationalCol = typeof relationalCol == "undefined" ? false : relationalCol;
    relationalName = typeof relationalName == "undefined" ? false : relationalName;

    var htmlData = '';
    if (!check)
        htmlData = '<option value="" disabled selected> Select ' + name + ' </option>';
    else
        htmlData = '<option value="" disabled> Select ' + name + ' </option>';

    $.ajax({
        url: utlt.siteUrl(url)

    }).done(function(resData) {
        $.each(resData, function(ind, val) {
            let optionName = ((relationalCol != false) ? val[relationalCol][relationalName] + ' >> ' : '') + val.name

            if (check == val.id) {
                htmlData += '<option value = "' + val.id + '" selected >' + optionName + '</option>';
            } else {
                htmlData += '<option value = "' + val.id + '">' + optionName + '</option>';
            }
        });
        $(htmlId).html(htmlData);

    }).fail(function(failData) {
        utlt.cLog(arguments);
    });
}
/*End getAll elements method*/

/************************************************/
/***common  method for Delete a specefic data****/
/************************************************/
utlt['Delete'] = function(url, dataTableId, modalId, successCallBackFun) {

    axios.delete(utlt.siteUrl(url))
        .then(resData => {
            showToast("Successfully Deleted!! :-)", 'warning')
            if (typeof dataTableId == 'string')
                $(dataTableId).DataTable().ajax.reload();
            if (typeof modalId == 'string') {
                $(modalId).modal('hide');
                $('.modal-backdrop').removeClass('modal-backdrop fade in');
            }

            if (typeof successCallBackFun == "function") {
                successCallBackFun();
            }
        }).catch(failData => {
            utlt.cLog(arguments);
            if (failData.response.data.message.search('SQLSTATE\\[23000\\]') != -1) {
                if (typeof modalId == 'string') {
                    $(modalId).modal('hide');
                    $('.modal-backdrop').removeClass('modal-backdrop fade in');
                }

                showToast("Database Relation Exist :-", 'error')
            } else if (failData.response.data.message.search('No query results') != -1) {
                if (typeof modalId == 'string') {
                    $(modalId).modal('hide');
                    $('.modal-backdrop').removeClass('modal-backdrop fade in');
                }

                showToast("This data has not found on server :-", 'error')
            }
        });
}
/*end Delete method*/


/****************************************/
/*common add method for insert form data*/
/****************************************/
utlt['asyncFalseRequest'] = function(type, url, formId, dataTable, redirectUrl, returnData, successCallBackFun, hideMsg) {
    utlt.Block();
    return new Promise((resolvePost, rejectPost) => {
        $(document).find(formId + ' .submitBtn').addClass('disabled');
        if (typeof type == 'undefined') {
            showToast('Please use the request type', 'warning');
            $(document).find(formId + ' .submitBtn').removeClass('disabled');
            utlt.unBlock();
            rejectPost();
        }

        $(document).find(formId + ' .is-invalid').removeClass('is-invalid');
        $(document).find(formId).find('.invalid-feedback').empty();

        let axiosOption = {
            method: 'Post',
            url: utlt.siteUrl(url),
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        };

        let formData = new FormData($(document).find(formId)[0]);
        formData.append("_method", type);
        axiosOption.data = formData;

        axios(axiosOption).then(resData => {
            if (resData == 'fail') {
                utlt.unBlock();
                showToast("NO network connection :( mail send failed)", 'danger');
                $(document).find(formId + ' .submitBtn').removeClass('disabled');
            } else {
                if (typeof hideMsg == 'undefined' || hideMsg == false) {
                    showToast("Successfully!!");
                }

                if (typeof successCallBackFun == "function") {
                    utlt.unBlock();
                    successCallBackFun();
                } else {
                    $(document).find(formId + ' .submitBtn').removeClass('disabled');
                }

                if (typeof returnData != 'undefined' && returnData == true) {
                    var Jreturn = resData;
                    $(document).find(formId + ' .submitBtn').removeClass('disabled');
                }
            }
            if (typeof redirectUrl == "string") {
                setTimeout(function() {
                    window.location.replace(utlt.siteUrl(redirectUrl));
                    utlt.unBlock();
                }, 1500);
            }

            if (typeof dataTable == "string") {
                $(dataTable).DataTable().ajax.reload();
                $(document).find(formId + ' .submitBtn').removeClass('disabled');
            }

            if (typeof returnData != 'undefined' && returnData == true) {
                utlt.unBlock();
                resolvePost(Jreturn);
            } else {
                setTimeout(function() {
                    utlt.unBlock();
                    resolvePost(true);
                }, 1500);
            }

        }).catch(failData => {
            utlt.unBlock();
            setError(failData, formId);
            $(document).find(formId + ' .submitBtn').removeClass('disabled');
            if ((typeof failData.response.data.message != 'undefined') && failData.response.data.message.search('SQLSTATE\\[23000\\]') != -1) {
                showToast("Database Error!!", 'error');
            }

            resolvePost(false);
        });
    });
}

utlt['asyncFalseStepRequeststep'] = function(type, url, formId, returnData, successCallBackFun) {
    $(document).find(formId + ' .submitBtn').addClass('disabled');
    return new Promise((resolvePost, rejectPost) => {
        if (typeof type == 'undefined') {
            showToast('Please use the request type', 'warning');
            $(document).find(formId + ' .submitBtn').removeClass('disabled');
            resolvePost(false);
        }

        $(document).find(formId + ' .is-invalid').removeClass('is-invalid');
        $(document).find(formId).find('.invalid-feedback').empty();

        let axiosOption = {
            method: 'Post',
            url: utlt.siteUrl(url),
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        };

        let formData = new FormData($(document).find(formId)[0]);
        formData.append("_method", type);
        axiosOption.data = formData;

        axios(axiosOption).then(resData => {

            if (typeof successCallBackFun == "function") {
                successCallBackFun();
            }

            if (typeof returnData != 'undefined' && returnData == true) {
                resolvePost(resData);
            } else {
                $(document).find(formId + ' .submitBtn').removeClass('disabled');
                resolvePost(true);
            }

            $(document).find(formId + ' .submitBtn').removeClass('disabled');

        }).catch(failData => {
            setError(failData, formId);
            $(document).find(formId + ' .submitBtn').removeClass('disabled');
            if ((typeof failData.response.data.message != 'undefined') && failData.response.data.message.search('SQLSTATE\\[23000\\]') != -1) {
                showToast("Database Error!!", 'error');
            }

            resolvePost(false);
        });
    });
}

function setError(failData, formId) {
    $.each(failData.response.data.errors, function(inputName, errors) {
        try {

            let arrayInd = null;
            if (inputName.indexOf('.') > -1) {
                nameArray = inputName.split('.');
                inputName = '';
                $.each(nameArray, function(index) {
                    if ($.isNumeric(nameArray[index]) && (typeof nameArray[index + 1] == 'undefined'))
                        return false;
                    if (index > 0) {
                        inputName += '[';
                    }
                    inputName += nameArray[index];
                    if (index > 0) {
                        inputName += ']';
                    }
                });
                arrayInd = nameArray[(nameArray.length - 1)];
            }

            inputSelector = $(document).find(formId + ' [name^="' + inputName + '"]');
            if (inputSelector.length > 1) {
                let newInputName = inputName + '[' + arrayInd + ']';
                let newInputSelector = $(document).find(formId + ' [name^="' + newInputName + '"]');
                if (typeof newInputSelector != 'undefined' && newInputSelector != null && newInputSelector.length != 0) {
                    inputSelector = newInputSelector;
                } else {
                    inputSelector = $(inputSelector)[arrayInd];
                }
            }

            $(inputSelector).addClass('is-invalid');

            if (typeof errors == "object") {
                $(inputSelector).closest('.form-group').find('.invalid-feedback').empty();
                $.each(errors, function(indE, valE) {
                    if (arrayInd != null) {
                        valE = valE.split(('.' + arrayInd)).join('');
                        valE = valE.split('_').join(' ');
                    }
                    $(inputSelector).closest('.form-group').find('.invalid-feedback').append(valE + "<br>");
                });

            } else {
                $(inputSelector).closest('.form-group').find('.invalid-feedback').html(valE);
            }

            $(inputSelector).closest('.form-group').find('.invalid-feedback').removeClass('d-none');
        } catch {}

        showToast('Please Check your Inputs', 'error');

    });
}

/**
 *   @abstract reset form
 *   @param formId, formId
 */
utlt['resetForm'] = function(formId) {
    $(document).find(formId).trigger("reset");
}

utlt["ranStr"] = function(length) {
    length = typeof length != "undefined" ? length : 5;
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

/**
 *   @abstract to show massege
 *   @param type, Type of the massege
 *   @param msg, Text of the massege
 *   @param position, position of the massege
 *   @param time, time to show of the massege
 */
function showToast(msg, type, position, time) {
    var Toast = Swal.mixin({
        toast: true,
        position: typeof position != 'undefined' ? position : 'top-right',
        showConfirmButton: false,
        timer: typeof time != 'undefined' ? time : 3000
    });

    Toast.fire({
        icon: typeof type != 'undefined' ? type : 'success',
        title: typeof msg != 'undefined' ? ' ' + msg : ' This is default message'
    })
}
/*end add method*/

window.addEventListener("load", function() {
    $(document).on("click", '.paginate_button', function() {
        $('.main-panel').animate({
            scrollTop: 0
        }, 1000);
    });
});

$(document).on('change', 'input[type=file]', function() {
    let fileName = $(this)[0].files[0].name;
    $(this).closest('.form-group').find('.custom-file-label').text(fileName);
});


setInterval(function() {
    $.get(utlt.siteUrl('alive'));
}, 1000 * 60 * 10);


function previewFile(input) {
    var file = $(input).get(0).files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function() {
            $(input).closest('.form-group').find('.selected_image').attr("src", reader.result);
            $(input).closest('.form-group').find('.selected_image').attr("data-src", reader.result);
            $(input).closest('.form-group').find('.image-preview').removeClass('d-none');
        }

        reader.readAsDataURL(file);
    }
}

function previewFiles(input) {

    var files = $(input).get(0).files;
    $.each(files, function(index, file) {

        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $(input).closest('.form-group').find('.selected_image').attr("src", reader.result);
                $(input).closest('.form-group').find('.selected_image').attr("data-src", reader.result);
                $(input).closest('.form-group').find('.image-preview').removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
    });



}

function removePreview(input) {
    $(input).closest('.image-preview').addClass('d-none');
    $(input).closest('.image-preview').find('.selected_image').attr('data-src', '');
    $(input).closest('.image-preview').find('.selected_image').attr('src', '');
    $(input).closest('.form-group').find('.custom-file-input').val('');
    $(input).closest('.form-group').find('.custom-file-input').next('label').html('');

    if ($(input).closest('.image-preview').find('input[name=previous_image]').length) {
        $(input).closest('.image-preview').find('input[name=previous_image]').remove();
    }

    if ($(input).closest('.image-preview').find('.old_thumbnails').length) {
        $(input).closest('.image-preview').find('.old_thumbnails').remove();
    }


}

/**
 *   @abstract update status
 *   @param url, url
 *   @param status, changing status
 */
utlt['updateStatus'] = function(el, url, columnName, isConf) {
    isConf = typeof isConf == "undefined" ? true : false;
    let status = (el.checked) ? 1 : 0;
    let postData = {
        _token: $('meta[name="csrf-token"]').attr('content')
    };
    postData[columnName] = status;
    if (isConf) {
        let updateConfig = utlt.swalConfig;
        updateConfig.confirmButtonText = 'YES';
        updateConfig.title = 'Are you sure to do this action?';
        updateConfig.text = '';
        updateConfig.icon = 'info';
        let config = Object.assign(updateConfig);
        Swal.fire(config).then(function(result) {
            if (result.value === true) {
                $.post(utlt.siteUrl(url), postData, function(data) {
                    if (data == 1) {
                        showToast("Successfully Updated!!");
                    } else {
                        showToast("Something went wrong!", 'error');
                    }
                }).fail(function() {
                    showToast("Something went wrong!", 'error');
                    el.checked = !status;
                });
            } else {
                el.checked = !status;
            }
        });
    }
}

/**
 *   @abstract update status
 *   @param url, url
 *   @param status, changing status
 */
utlt['updateValidate'] = function(el, url, columnName, isConf, isReaload = 0) {

    let status = (el.checked) ? 1 : 0;
    let postData = {
        _token: $('meta[name="csrf-token"]').attr('content')
    };
    postData[columnName] = status;
    if (isConf) {
        let updateConfig = utlt.swalConfig;
        updateConfig.confirmButtonText = 'YES';
        updateConfig.title = 'Are you sure to do this action?';
        updateConfig.text = '';
        updateConfig.icon = 'info';
        let config = Object.assign(updateConfig);
        Swal.fire(config).then(function(result) {
            if (result.value === true) {
                $.post(utlt.siteUrl(url), postData, function(data) {
                    if (data == 1) {
                        showToast("Successfully Updated!!");
                        if (isReaload == 1) {
                            location.reload();
                        }
                    } else {
                        showToast("Something went wrong!", 'error');
                    }
                }).fail(function() {
                    showToast("Something went wrong!", 'error');
                    el.checked = !status;
                });
            } else {
                el.checked = !status;
            }
        });
    }
}

function getUrlParam(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}


function sendOrderToServer(table, url, start_page) {
    start_page = typeof start_page == 'undefined' ? 0 : start_page;
    var postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        'order': []
    };
    $(table + ' tbody tr').each(function(index, element) {
        postData.order.push({
            id: $(element).attr('data-id'),
            position: index + (start_page * $(table + ' tbody tr').length)
        });
    });

    $.post(utlt.siteUrl(url), postData, function(data) {
        if (data == 1) {
            $(table).DataTable().ajax.reload();
            showToast("Successfully Updated!!");
        } else {
            showToast("Something went wrong!", 'error');
        }
    }).fail(function() {
        showToast("Something went wrong!", 'error');
    });
}

utlt['crc32'] = function(r) {
    for (var a, o = [], c = 0; c < 256; c++) {
        a = c;
        for (var f = 0; f < 8; f++) a = 1 & a ? 3988292384 ^ a >>> 1 : a >>> 1;
        o[c] = a
    }
    for (var n = -1, t = 0; t < r.length; t++) n = n >>> 8 ^ o[255 & (n ^ r.charCodeAt(t))];
    return (-1 ^ n) >>> 0
};

utlt["isEqual"] = function(value, other) {

    // Get the value type
    var type = Object.prototype.toString.call(value);

    // If the two objects are not the same type, return false
    if (type !== Object.prototype.toString.call(other)) return false;

    // If items are not an object or array, return false
    if (['[object Array]', '[object Object]'].indexOf(type) < 0) return false;

    // Compare the length of the length of the two items
    var valueLen = type === '[object Array]' ? value.length : Object.keys(value).length;
    var otherLen = type === '[object Array]' ? other.length : Object.keys(other).length;
    if (valueLen !== otherLen) return false;

    // Compare two items
    var compare = function(item1, item2) {

        // Get the object type
        var itemType = Object.prototype.toString.call(item1);

        // If an object or array, compare recursively
        if (['[object Array]', '[object Object]'].indexOf(itemType) >= 0) {
            if (!utlt.isEqual(item1, item2)) return false;
        }

        // Otherwise, do a simple comparison
        else {

            // If the two items are not the same type, return false
            if (itemType !== Object.prototype.toString.call(item2)) return false;

            // Else if it's a function, convert to a string and compare
            // Otherwise, just compare
            if (itemType === '[object Function]') {
                if (item1.toString() !== item2.toString()) return false;
            } else {
                if (item1 !== item2) return false;
            }

        }
    };


    // Compare properties
    if (type === '[object Array]') {
        for (var i = 0; i < valueLen; i++) {
            if (compare(value[i], other[i]) === false) return false;
        }
    } else {
        for (var key in value) {
            if (value.hasOwnProperty(key)) {
                if (compare(value[key], other[key]) === false) return false;
            }
        }
    }

    // If nothing failed, return true
    return true;
};