<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 02/03/2015
 * Time: 12:59 PM
 */
class Qdmvc_Layout_Card
{
    protected $obj = null;
    protected $obj_json = null;
    protected $page = null;
    protected $data = null;
    protected static $ctl_prefix = 'ctl_';

    function __construct($page)
    {
        $this->page = $page;
        $this->data = $page->getData();
        if (isset($this->data['obj'])) {
            $this->obj = $this->data['obj'];
            $this->obj_json = json_encode($this->data['obj_json']);
        }
    }

    protected function internalGateway()
    {
        ?>
        <script>
            MYAPP.formValidation = {};
            MYAPP.formValidationError = function() {
                for (i in MYAPP.formValidation) {
                    if (MYAPP.formValidation[i].type == 'error') {
                        return true;
                    }
                }
                return false;
            };
            MYAPP.clearFormValidationMark = function () {
                (function ($) {
                    //clear form validation mark and tooltip
                    //var $inputs = $("#cardForm :input[type=text]");
                    var $inputs = $("#cardForm :input");
                    $inputs.each(function () {
                        $(this).css('border-color', '#ddd');//set to boootstrap default
                        try {
                            $(this).jqxTooltip('destroy');//{ content: '', position: 'bottom', name: ''});
                        } catch (error) {
                            console.log(error);
                        }
                    });

                })(jQuery);
            };
            MYAPP.addDataPortFilter = function(url, index, field, value, operator){
                if(operator==undefined) operator='EQUAL';
                return url + '&filterdatafield' + index + '=' + field + '&filtervalue' + index + '=' + value + '&filtercondition' + index + '=' + operator;
            };
            MYAPP.showMsg = function (msg) {
                (function ($) {
                    //clear notification
                    $('#jqxMsg').jqxNotification('closeAll');
                    //dis[lay new validation mark and msg bus

                    for (key in msg) {
                        var type = msg[key].type;
                        var template = type == '' ? 'success' : type;

                        if (msg[key].field != null && msg[key].field != '') {
                            var field = $("#cardForm input[name='" + msg[key].field + "']");
                            field.jqxTooltip({content: msg[key].msg, position: 'bottom', name: msg[key].field});

                            if (type == 'error') {
                                field.css('border-color', 'red');
                            }
                            else if (type == 'warning') {
                                field.css('border-color', 'orange');
                            }
                            else if (type == 'info') {
                                field.css('border-color', 'blue');
                            }
                        }

                        $('#jqxMsg').jqxNotification({template: template});
                        $("#jqxMsgContent").html(msg[key].msg);
                        $("#jqxMsg").jqxNotification("open");
                    }
                    /*
                     for (i = 0; i < msg.length; i++) {

                     }*/
                })(jQuery);
            }
        </script>
        <script>
            MYAPP.requestLookupWindow = function(src) {
                //set window iframe source
                //alert(src);
                (function ($) {
                    $("#windowFrame").contents().find("body").html('');//do a trick to hide previous result
                    $('#windowFrame').attr('src', src);
                    $('#jqxlookupwin').jqxWindow('open');
                })(jQuery);
            };
            MYAPP.addQueryToLookupURL = function(lurl, dynamic_filter_fields){
                var i;
                for(i=0;i<dynamic_filter_fields.length;i++)
                {
                    var tmp_id = $('#ctl_'+dynamic_filter_fields[i]).val();
                    if(tmp_id!='')
                    {
                        lurl += '&filterdatafield'+i+'='+dynamic_filter_fields[i]+'&filtervalue'+i+'='+tmp_id;
                    }
                }
                return lurl;
            };
            MYAPP.datepicker_tmp_return_id = null;
            MYAPP.requestDatePickerWindow = function(return_id) {
                (function ($) {
                    MYAPP.datepicker_tmp_return_id = return_id;
                    $('#qddatepicker').val($('#' + return_id).val());
                    $('#jqxdatepickerwin').jqxWindow('open');
                })(jQuery);
            };
            MYAPP.requestFormValidate = function(rules_) {
                (function ($) {
                    //register validate
                    $('#cardForm').jqxValidator({
                        rules: rules_
                    });
                })(jQuery);
            }
        </script>
    <?php
    }

    protected function formValidation()
    {
        ?>
        <script>
            //trigger open windows
            (function ($) {
                $(document).ready(function () {
                    //auto assign value from obj
                    //validate, require
                    MYAPP.requestFormValidate(
                        []
                    );
                });
            })(jQuery);
        </script>
    <?php
    }

    private function progressSpinner()
    {
        ?>
        <style>
            .ajax_loader {
                background: url(<?=Qdmvc_Helper::getImgURL("ajax-loader_blue.gif")?>) no-repeat center center transparent;
                width: 100%;
                height: 100%;
            }
        </style>
        <script>
            /*
             * Ajax overlay 1.0
             * Author: Simon Ilett @ aplusdesign.com.au
             * Descrip: Creates and inserts an ajax loader for ajax calls / timed events
             * Date: 03/08/2011
             */
            function ajaxLoader(el, options) {
                // Becomes this.options
                var defaults = {
                    bgColor: '#fff',
                    duration: 800,
                    opacity: 0.7,
                    classOveride: false
                };
                this.options = jQuery.extend(defaults, options);
                this.container = jQuery(el);

                this.init = function () {
                    var container = this.container;
                    // Delete any other loaders
                    this.remove();
                    // Create the overlay
                    var overlay = jQuery('<div></div>').css({
                        'background-color': this.options.bgColor,
                        'opacity': this.options.opacity,
                        'width': container.width(),
                        'height': container.height(),
                        'position': 'absolute',
                        'top': '0px',
                        'left': '0px',
                        'z-index': 99999
                    }).addClass('ajax_overlay');
                    // add an overiding class name to set new loader style
                    if (this.options.classOveride) {
                        overlay.addClass(this.options.classOveride);
                    }
                    // insert overlay and loader into DOM
                    container.append(
                        overlay.append(
                            jQuery('<div></div>').addClass('ajax_loader')
                        ).fadeIn(this.options.duration)
                    );
                };

                this.remove = function () {
                    var overlay = this.container.children(".ajax_overlay");
                    if (overlay.length) {
                        overlay.fadeOut(this.options.classOveride, function () {
                            overlay.remove();
                        });
                    }
                };

                this.init();
            }

        </script>
        <script>
            //trigger open windows
            (function ($) {
                $(document).ready(function () {
                    //var ajax_loader;
                    $.ajaxSetup({
                        beforeSend: function () {

                        },
                        complete: function () {
                            //$('#loader').hide();
                            //ajax_loader.remove();
                        }
                        /*
                         ,success: function() {

                         }*/
                    });
                });
            })(jQuery);
        </script>

    <?php
    }

    protected function preConfig()
    {
        ?>
        <script>
            var MYAPP = MYAPP || {};
            // prepare the data
            MYAPP.data_port = '<?=$this->data['data_port']?>';
            MYAPP.current_obj = null;
            MYAPP.init_obj = <?=$this->data['init_obj']?>;
            //ajax_loader
            MYAPP.ajax_loader;
            MYAPP.viewModel = {};
            MYAPP.is_insert = true;
            MYAPP.manual_no = true;
        </script>
    <?php
    }

    private function lookupWindowLayout()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    //init window for lookup
                    $('#jqxlookupwin').jqxWindow({
                        showCollapseButton: true,
                        maxHeight: 9999,
                        maxWidth: 9999,
                        minHeight: 200,
                        minWidth: 200,
                        height: '99%',
                        width: '99%',
                        autoOpen: false,
                        isModal: true,
                        initContent: function () {
                            //$('#tab').jqxTabs({ height: '100%', width:  '100%' });
                            //$('#window').jqxWindow('focus');
                        }
                    });

                    //init window for editor
                    $('#jqxwptexteditor').jqxWindow({
                        showCollapseButton: false,
                        //maxHeight: 600,
                        //maxWidth: 1020,
                        minHeight: 200,
                        minWidth: 200,
                        height: '80%',
                        width: '100%',
                        autoOpen: false,
                        isModal: true,
                        initContent: function () {
                            //$('#tab').jqxTabs({ height: '100%', width:  '100%' });
                            //$('#window').jqxWindow('focus');
                        }
                    });

                });
            })(jQuery);
        </script>

        <div id="jqxlookupwin" style="display: none">
            <div id="windowHeader">
                    <span>
                        Lookup Window
                    </span>
            </div>
            <div style="overflow: hidden;" id="windowContent">
                <iframe id="windowFrame" src="" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"
                        width="100%" height="100%">
                    <p>Your browser does not support iframes</p>
                </iframe>
            </div>
        </div>
        <div id="jqxwptexteditor">
            <div id="windowHeader">
                    <span>
                        WYSIWYG Editor Window
                    </span>
            </div>
            <div style="overflow: hidden;" id="wptexteditor_wrapper">
                <div>
                    <button type="button" id="wptexteditor_done">Done</button>
                </div>
                <?php wp_editor('', 'wptexteditor', $settings = array()); ?>
                <script>
                    MYAPP.wptexteditor_returnid = 'notset';
                    (function ($) {
                        $(document).ready(function () {
                            $('#wptexteditor_done').click(function () {
                                var content = tinyMCE.get('wptexteditor').getContent();
                                $('#' + MYAPP.wptexteditor_returnid).val(content);
                                $('#' + MYAPP.wptexteditor_returnid).trigger('change');
                                //close editor
                                $('#jqxwptexteditor').jqxWindow('close');
                            });
                        });
                    })(jQuery);
                    MYAPP.requestEditorWindow = function(initVal, returnId) {
                        (function ($) {
                            MYAPP.wptexteditor_returnid = returnId;
                            console.log('WYSIWYG opened, returnId: ' + MYAPP.wptexteditor_returnid);
                            $('#jqxwptexteditor').jqxWindow('open');

                            tinyMCE.get('wptexteditor').setContent(initVal);
                        })(jQuery);
                    }
                </script>
            </div>
        </div>
    <?php
    }

    private function lookupDatePickerLayout()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    //init window for lookup
                    $('#jqxdatepickerwin').jqxWindow({
                        showCollapseButton: true,
                        maxHeight: 9999,
                        maxWidth: 9999,
                        minHeight: 200,
                        minWidth: 200,
                        height: '60%',
                        width: '50%',
                        autoOpen: false,
                        isModal: true,
                        initContent: function () {
                            //$('#tab').jqxTabs({ height: '100%', width:  '100%' });
                            //$('#window').jqxWindow('focus');
                        }
                    });

                });
            })(jQuery);
        </script>

        <div id="jqxdatepickerwin">
            <div id="windowHeader">
                    <span>
                        DatePicker Window
                    </span>
            </div>
            <div style="overflow: hidden;" id="windowContent">
                <div style="position: relative">
                    <button id="datepicker_chooser" type="button" class="btn btn-primary btn-xs">Choose</button>
                    <br>
                    <input type='text' id='qddatepicker' name="qddatepicker"/>
                    <script type="text/javascript">
                        (function ($) {
                            $(document).ready(function () {
                                // Create a jqxDateTimeInput
                                $('#qddatepicker').datetimepicker(
                                    {format: 'DD/MM/YYYY', inline: true, keepOpen: true}
                                );

                                $('#datepicker_chooser').click(function () {
                                    $('#' + MYAPP.datepicker_tmp_return_id).val($('#qddatepicker').val());
                                    $('#' + MYAPP.datepicker_tmp_return_id).trigger('change');
                                    $('#jqxdatepickerwin').jqxWindow('close');
                                });
                            });
                        })(jQuery);
                    </script>
                </div>

            </div>
        </div>
    <?php
    }

    protected function externalGateway()
    {
        ?>
        <script>
            MYAPP.getObj = function() {
                return ko.toJS(MYAPP.viewModel);
            };
            //gate way to comunicate with parent windows
            MYAPP.setObj = function(obj) {//do not change func name
                /*(function ($) {
                    //clear form validation mark but not error msg
                    MYAPP.clearFormValidationMark();
                    MYAPP.current_obj = obj;
                    //fill data
                    $("#cardForm").autofill(obj);

                    $("#cardForm input").change();
                    //$('#jqxNavigationBar').jqxNavigationBar('collapseAt', 0);
                    console.log('layout_cardnavigate -> setObj: ');
                    console.log(obj);
                })(jQuery);*/
                MYAPP.is_insert = false;
                MYAPP.manual_no = false;
                MYAPP.clearFormValidationMark();
                ko.mapping.fromJS(obj, MYAPP.viewModel);
            };
            MYAPP.setLookupResult = function(value, txtId) {
                (function ($) {
                    eval('MYAPP.viewModel.'+txtId)(value);
                    //auto close window
                    $('#jqxlookupwin').jqxWindow('close');
                })(jQuery);
            }
        </script>
    <?php
    }

    private function msgPanelLayout()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    //register notification
                    $("#jqxMsg").jqxNotification({
                        width: 400,
                        position: "bottom-right",
                        opacity: 0.9,
                        autoOpen: false,
                        animationOpenDelay: 300,
                        autoClose: true,
                        autoCloseDelay: 3000,
                        template: "info",
                        appendContainer: "#jqxMsgContainer"
                    });
                });
            })(jQuery);
        </script>

        <div id="jqxMsg">
            <span id="jqxMsgContent"></span>
        </div>
        <div style="position: fixed; bottom: 0px; right: 0px;">
            <div id="jqxMsgContainer">

            </div>
            <script>
                (function ($) {
                    $(document).ready(function () {
                        //register notification
                        //card button event
                        $("#qdmsgclear").bind("click", function (event) {
                            $('#jqxMsg').jqxNotification('closeAll');
                        });
                    });
                })(jQuery);
            </script>
            <button style="opacity: 0.8;" id="qdmsgclear" class="btn btn-info btn-xs pull-right">MSG</button>

            <!-- Single button
            <div class="btn-group dropup pull-right">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                    Help <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#" id="tourPageCardNewRecord">New record ?</a></li>
                    <li class="divider"></li>
                </ul>
            </div> -->
            <div style="clear: both"></div>
        </div>
    <?php
    }

    private function generateFieldLookup($f_name, $f_val, $f_lku, $readonly = false)
    {
        if($readonly)
        {
            $this->generateFieldText($f_name, $f_val, $readonly);
            return;
        }
        ?>
        <div class="qd-lookup-input">
            <input <?= $readonly == true ? 'readonly' : '' ?> class="text-input" type="text" name="<?= $f_name ?>" id='<?= static::$ctl_prefix . $f_name ?>' data-bind="jqxInput: {value: <?=$f_name?>}" />
            <button onclick='MYAPP.requestLookupWindow("<?= $f_lku ?>")'
                    data-lookupurl="<?= $f_lku ?>" id="lookup_cs_<?= $f_name ?>"
                    value="">...
            </button>
        </div>
    <?php
    }

    private function generateFieldDate($f_name, $value, $readonly=false)
    {
        ?>
        <div class="qd-lookup-input">
            <input class="text-input" type="text" id='<?= static::$ctl_prefix . $f_name ?>' data-bind="jqxInput: {value: <?=$f_name?>}" />
            <button onclick='MYAPP.requestDatePickerWindow("<?= static::$ctl_prefix . $f_name ?>")'
                    id="datepicker_cs_<?= $f_name ?>">...
            </button>
        </div>
    <?php
    }
    private function generateFieldText($f_name, $value, $readonly = false)
    {
        ?>
        <input <?= $readonly == true ? 'readonly' : '' ?> class="text-input" type="text" name="<?= $f_name ?>" id='<?= static::$ctl_prefix . $f_name ?>' data-bind="jqxInput: {value: <?=$f_name?>}" />
    <?php
    }
    private function generateFieldInteger($f_name, $value, $readonly = false)
    {
        ?>
        <input <?= $readonly == true ? 'readonly' : '' ?> class="text-input" type="text" name="<?= $f_name ?>" id='<?= static::$ctl_prefix . $f_name ?>' data-bind="jqxInput: {value: <?=$f_name?>}" />
    <?php
    }

    private function generateFieldColor($f_name, $value, $readonly=false)
    {
        ?>
        <input class="text-input color {hash:true}" type="text" name="<?= $f_name ?>"
               id="<?= static::$ctl_prefix . $f_name ?>" data-bind="value: <?=$f_name?>">
    <?php
    }

    private function generateFieldHidden($f_name, $value, $readonly=false)
    {
        ?>
        <input type="hidden" name="<?= $f_name ?>" id='<?= static::$ctl_prefix . $f_name ?>' data-bind="value: <?=$f_name?>" />
    <?php
    }

    private function generateFieldCombobox($f_name, $value, $options, $readonly = false)
    {
        ?>
        <select class="qd-option-field" name="<?= $f_name ?>"
                id="<?= static::$ctl_prefix . $f_name ?>" <?= $readonly ? 'disabled' : '' ?> data-bind="value: <?=$f_name?>">
            <?php foreach ($options as $key => $caption): ?>
                <option value="<?= $key ?>"><?= $caption ?></option>
            <?php endforeach; ?>
        </select>
    <?php
    }

    private function generateFieldImage($f_name, $value, $readonly=false)
    {
        ?>
        <div class="qd-lookup-input">
            <input class="text-input" type="text" name="<?= $f_name ?>" id='<?= static::$ctl_prefix . $f_name ?>' data-bind="jqxInput: {value: <?=$f_name?>}" />

            <button id="media_cs_<?= $f_name ?>" value="">...</button>
            <?php
            Qdmvc_Helper::qd_media_choose("media_cs_{$f_name}", static::$ctl_prefix . $f_name, false);
            ?>
            <script>
                (function ($) {
                    $(document).ready(function () {
                        $("#<?=static::$ctl_prefix.$f_name?>").hover(function () {
                            var imgURL = $(this).val();
                            if (imgURL != "") {
                                var content = '<img style="width: 300px;" src="' + imgURL + '" />';
                                var selector = $("#<?=static::$ctl_prefix.$f_name?>");
                                selector.jqxTooltip({content: content, position: 'bottom', opacity: 0.8});
                                selector.jqxTooltip('open');
                            }
                        });
                    });
                })(jQuery);
            </script>
        </div>

    <?php
    }

    private function generateFieldBoolean($f_name, $value = 0, $readonly = false)
    {
        ?>
        <!--<input type="checkbox" name="<?= $f_name ?>" id="<?= static::$ctl_prefix . $f_name ?>" value="1">-->
        <input type="checkbox" data-bind="checked: <?=$f_name?>" name="<?= $f_name ?>" id="<?= static::$ctl_prefix . $f_name ?>" value="1"/>
    <?php
    }

    private function generateFieldWYSIWYG($f_name, $value = 0, $readonly=false)
    {
        ?>
        <div class="qd-lookup-input">
            <input class="text-input" type="text" name="<?= $f_name ?>" id='<?= static::$ctl_prefix . $f_name ?>' data-bind="jqxInput: {value: <?=$f_name?>}" />

            <button id="editor_cs_<?= $f_name ?>" value="">...</button>

            <script>
                (function ($) {
                    $(document).ready(function () {
                        $("#editor_cs_<?=$f_name?>").click(function () {
                            MYAPP.requestEditorWindow($('#<?=static::$ctl_prefix.$f_name?>').val(), '<?=static::$ctl_prefix.$f_name?>');
                        });
                    });
                })(jQuery);
            </script>
        </div>
    <?php
    }

    private function generateFields()
    {
        $tmp_page = $this->page;
        ?>
        <style>
            .qd-card-grid .col-md-6 {
                /*height: 30px;*/
                margin-bottom: 7px;
            }

            .qd-card-grid .qd-option-field {
                height: 24px;
            }

            .qd-card-grid .qd-field-caption {
                height: 100%;
                width: 40%;
            }

            .qd-card-grid input[type=text] {
                display: block;
                width: 250px;
                height: 24px;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }

            .qd-lookup-input {
                position: relative;
            }

            .qd-lookup-input input {
                padding-right: 35px;
            }

            .qd-lookup-input button {
                position: absolute;
                top: 0;
                right: 0;
            }
        </style>
        <div class="container qd-card-grid" style="width: 100%">
            <div class="row clearfix" style="overflow-x: hidden">
                <script type="text/javascript">
                    (function ($) {
                        $(document).ready(function () {
                            $('#jqxTabs').jqxTabs({width: '100%', position: 'top'});
                        });
                    })(jQuery);

                </script>
                <div id='jqxTabs'>
                    <ul>
                        <?php
                        foreach ($tmp_page::getLayout() as $group => $config) :
                            ?>
                            <li>
                                <?= $tmp_page::getTabConfig($group, 'Name', $this->data['language']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php
                    foreach ($tmp_page::getLayout() as $group => $config) :
                        if (isset($config['Type']) && $config['Type'] == 'Group') :
                            echo '<div>';
                            if (isset($config['Fields'])) :
                                foreach ($config['Fields'] as $key => $f_config) :
                                    $type = $tmp_page::getDataType($key);

                                    $readonly = $tmp_page::isReadOnly($key);
                                    $readonly = QdT_Library::isNullOrEmpty($readonly) ? false : true;

                                    $f_name = $tmp_page::getSourceExpr($key);
                                    if ($type == 'Option') {
                                        $options = $tmp_page::getFieldOptions($f_name, $this->data['language']);
                                    }
                                    $f_val = '';
                                    $f_lku = $tmp_page::getLookupURL($f_name);

                                    if ($f_config['Hidden']) {
                                        $this->generateFieldHidden($f_name, $f_val);
                                        continue;
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <!-- Caption -->
                                        <div
                                            class="qd-field-caption pull-left"><?= $this->page->getFieldCaption($f_name, $this->data['language']) ?>
                                            :
                                        </div>
                                        <!-- END Caption -->
                                        <div class="pull-right">
                                            <?php
                                            if ($type == 'Color') {
                                                $this->generateFieldColor($f_name, $f_val, $readonly);
                                            } else if ($type == 'Boolean') {
                                                $this->generateFieldBoolean($f_name, $f_val, $readonly);
                                            } else if ($type == 'Image') {
                                                $this->generateFieldImage($f_name, $f_val, $readonly);
                                            } else if ($type == 'Integer') {
                                                $this->generateFieldInteger($f_name, $f_val, $readonly);
                                            } else if ($type == 'Date') {
                                                $this->generateFieldDate($f_name, $f_val, $readonly);
                                            } else if ($type == 'WYSIWYG') {
                                                $this->generateFieldWYSIWYG($f_name, $f_val, $readonly);
                                            } else if ($type == 'Option') {
                                                $this->generateFieldCombobox($f_name, $f_val, $options, $readonly);
                                            } else if (!Qdmvc_Helper::isNullOrEmpty($f_lku)) {
                                                $this->generateFieldLookup($f_name, $f_val, $f_lku, $readonly);
                                            } else {
                                                $this->generateFieldText($f_name, $f_val, $readonly);
                                            }
                                            ?>
                                        </div>

                                        <div style="clear: both"></div>

                                    </div>
                                <?php
                                endforeach;
                            endif;
                            echo '</div>';
                        endif;
                    endforeach;
                    ?>
                </div>

            </div>
        </div>
    <?php
    }

    protected function onReadyHook()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    <?php if($this->page->hasLines()): ?>
                    $("#qdlines").show();
                    <?php endif; ?>

                    MYAPP.viewModel = ko.mapping.fromJS(MYAPP.init_obj);
                    ko.applyBindings(MYAPP.viewModel); // This makes Knockout get to work

                    $('#ctl_id').keyup(function(){
                        MYAPP.manual_no = true;
                    });
                });
            })(jQuery);
        </script>
    <?php
    }

    protected function onDeleteOK()
    {

    }

    protected function onCloneOK()
    {

    }

    protected function onNewOK()
    {

    }
    /*
    private function linesBar()
    {
        ?>
        <div>
            <div style='margin-top: 2px;'>
                <div style='margin-left: 4px; float: left;'>
                    Lines
                </div>
            </div>
        </div>
        <div>
            <div style="height: 520px; width: 100%">
                <!-- Content Place Holder 2 -->
                <iframe id="pagepart" src="<?= $this->getPagePartURL() ?>"
                        width="100%" height="99%" scrolling="no" frameborder="0">
                    <p>Your browser does not support iframes</p>
                </iframe>
                <!-- ENd Content Place Holder 2 -->
            </div>
        </div>
    <?php
    }*/

    private function cardBar()
    {
        ?>
        <div>
            <div style='margin-top: 2px;'>
                <div style='margin-left: 4px; float: left;'>
                    Card
                </div>
            </div>
        </div>
        <div>
            <div>
                <script>
                    (function ($) {
                        $(document).ready(function () {
                            //validate trigger
                            $("#cardForm").on("validationSuccess", function (event) {
                                //AJAX progress Bar
                                MYAPP.ajax_loader = new ajaxLoader("#cardForm");
                                //build data
                                var json = MYAPP.getObj();//form2js("cardForm", ".", false, null, true);//skip empty some time cause lack field
                                //begin lock
                                console.log(json);
                                var action = MYAPP.is_insert ? "insert" : "update";
                                var postdata = {submit: "submit", action: action, data: json, manual_no: MYAPP.manual_no};
                                console.log(postdata);
                                $.post(MYAPP.data_port, postdata)
                                    .done(function (data) {
                                        //data JSON
                                        console.log(data);
                                        //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format
                                        console.log(data.rows[0]);

                                        MYAPP.clearFormValidationMark();
                                        MYAPP.setObj(data.rows[0]);

                                        MYAPP.formValidation = data.msg;
                                        //tracking insert fail
                                        if(data.working_mode == 'insert_fail'){
                                            MYAPP.is_insert = true;//manual noseries insert but fail
                                        }
                                        //show error msg
                                        MYAPP.showMsg(data.msg);//must be called after setObj(...)

                                        <?=$this->onSaveOK()?>
                                    })
                                    .fail(function (data) {
                                        console.log(data);
                                    })
                                    .always(function () {
                                        //release lock
                                        MYAPP.ajax_loader.remove();
                                    });
                            });

                            //card form event
                            $("#qdupdate").bind("click", function (event) {
                                $("#cardForm").jqxValidator("validate");
                            });

                            //card button event
                            $("#qdnew").bind("click", function (event) {
                                //To disable
                                try {
                                    //document.getElementById("cardForm").reset();
                                    //set init obj
                                    MYAPP.setObj(MYAPP.init_obj);
                                    //force set id = 0
                                    MYAPP.viewModel.id(0);
                                    MYAPP.is_insert = true;

                                    <?=$this->onNewOK()?>
                                } catch (error) {
                                    console.log(error);
                                }
                            });

                            //card button event
                            $("#qdclone").bind("click", function (event) {
                                if (!confirm("Xác nhận ?")) {
                                    return false;
                                }

                                MYAPP.viewModel.id(0);
                                MYAPP.is_insert = true;
                                MYAPP.manual_no = false;
                                $("#qdupdate").click();

                                <?=$this->onCloneOK()?>
                            });

                            //card button event
                            $("#qdnote").bind("click", function (event) {
                                MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_note_url']);
                            });
                            $("#qdimage").bind("click", function (event) {
                                MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_image_url']);
                            });
                            //card button event
                            $("#qdlog").bind("click", function (event) {
                                MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_log_url']);
                            });
                            $("#qdlines").bind("click", function (event) {
                                MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_lines_url']);
                            });


                            $("#qddelete").bind("click", function (event) {
                                if (!confirm("Xác nhận ?")) {
                                    return false;
                                }
                                //AJAX loader
                                MYAPP.ajax_loader = new ajaxLoader("#cardForm");
                                //begin lock
                                var id_ = MYAPP.viewModel.id();
                                console.log(id_);
                                $.post(MYAPP.data_port, {submit: "submit", action: "delete", data: {id: id_}})
                                    .done(function (data) {
                                        //data JSON
                                        //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format

                                        //....
                                        MYAPP.showMsg(data.msg);

                                        <?=$this->OnDeleteOK()?>
                                    })
                                    .fail(function (data) {
                                        console.log("FAIL:" + data);
                                    })
                                    .always(function () {
                                        //release lock
                                        MYAPP.ajax_loader.remove();
                                    });
                            });

                            //prevent form enter key
                            $("#cardForm").keypress(function (e) {
                                if (e.which == 13) { // Checks for the enter key
                                    e.preventDefault(); // Stops IE from triggering the button to be clicked

                                    //simulate save click
                                    $('#qdupdate').focus();//knock out js only update value to model after lose focus
                                    $("#qdupdate").click();
                                }
                            });
                            //catch submit
                            $(document).on("submit", "#testForm", function () {
                                // code
                                return false;
                            });
                        });
                    })(jQuery);
                </script>
                <form style="width: 100%" id="cardForm" action=""
                      onsubmit="return false">
                    <div>
                        <div style="margin-top: 5px">

                            <style>
                                .qd-action-btn {
                                    margin-right: 20px;
                                }

                                .glyphicon {
                                    font-size: 18px;
                                }
                            </style>
                            <span>
                                <button class="btn btn-primary btn-xs qd-action-btn" type="button" id="qdupdate">
                                    <?=Qdmvc_Message::getMsg('btn_save')?>
                                </button>
                            </span>
                            <span>
                                <button class="btn btn-primary btn-xs qd-action-btn" type="button" id="qdnew">
                                    <?=Qdmvc_Message::getMsg('btn_new')?>
                                </button>
                            </span>
                            <span>
                                <button class="btn btn-primary btn-xs qd-action-btn" type="button" id="qddelete">
                                    <?=Qdmvc_Message::getMsg('btn_delete')?>
                                </button>
                            </span>
                            <span>
                                <button class="btn btn-primary btn-xs qd-action-btn" type="button" id="qdclone">
                                    <?=Qdmvc_Message::getMsg('btn_clone')?>
                                </button>
                            </span>
                            <span>
                                <button class="btn btn-success btn-xs qd-action-btn" type="button" id="qdnote">
                                    <?=Qdmvc_Message::getMsg('btn_note')?>
                                </button>
                            </span>
                            <span>
                                <button class="btn btn-success btn-xs qd-action-btn" type="button" id="qdimage">
                                    <?=Qdmvc_Message::getMsg('btn_image')?>
                                </button>
                            </span>
                            <span>
                                <button class="btn btn-success btn-xs qd-action-btn" type="button" id="qdlog">
                                    <?=Qdmvc_Message::getMsg('btn_log')?>
                                </button>
                            </span>
                            <span>
                                <button class="btn btn-info btn-xs qd-action-btn" type="button" id="qdlines"
                                        style="display: none">
                                    <?= $this->page->getFieldCaption('__sys_lines_url', $this->data['language']) ?>
                                </button>
                            </span>

                            <?= $this->render_serverFunctions() ?>
                        </div>
                        <hr style="margin-top: 5px; margin-bottom: 5px ">
                        <!-- Content place Holder -->
                        <?= $this->generateFields() ?>
                        <!-- End content place holder -->

                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    protected function onSaveOK()
    {

    }

    protected function onCallFnOK()
    {

    }

    protected function Bars()
    {
        $this->cardBar();
        return;
        $tmp_page = $this->page;

        //render Page Part from Page Setup
        foreach ($tmp_page::getLayout() as $group => $config) :
            if (isset($config['Type']) && $config['Type'] == 'Part'):
                ?>
                <div>
                    <div style='margin-top: 2px;'>
                        <div style='margin-left: 4px; float: left;'>
                            Part
                        </div>
                    </div>
                </div>
                <div>
                    <div style="height: 520px; width: 100%">
                        <iframe id="pagePart_<?= $group ?>" src="<?= $this->page->getPagePartURL() ?>" frameborder="0"
                                marginwidth="0" marginheight="0" scrolling="auto"
                                width="100%" height="100%">
                            <p>Your browser does not support iframes</p>
                        </iframe>
                    </div>
                </div>
            <?php
            endif;
        endforeach;
    }

    private function Bar()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $("#jqxNavigationBar").css("visibility", "visible");
                    //navigation bar
                    $("#jqxNavigationBar").jqxNavigationBar({
                        width: '100%',
                        expandMode: 'multiple',
                        expandedIndexes: [0, 1, 2]
                    });
                });
            })(jQuery);
        </script>

        <div id='jqxWidget'>
            <div id="jqxNavigationBar" style="visibility: hidden">
                <?= $this->Bars() ?>
            </div>
        </div>

    <?php
    }

    protected function style()
    {
        //var_dump($this->data);
        if ($this->data['view_style'] == 'compact') {
            Qdmvc_Helper::requestCompact();
        }
        ?>
        <style>
            #wpfooter {
                display: none;
            }
        </style>
    <?php
    }

    protected function getHelpTourPipes()
    {
        return array(
            '#tourPageCardNewRecord' => array(
                '#qdnew' => 20,
                '#cardForm' => 40,
                '#qdupdate' => 60,
            ),
        );
    }

    protected function getHelpTourNodes()
    {
        //range 1 => 2999
        return array(
            20 => array(
                'Caption' => array(
                    'en-US' => 'Create new record for input (but NOT saved yet)',
                    'vi-VN' => 'Tạo mới một record để nhập liệu (tuy nhiên KHÔNG lưu)'
                )
            ),
            40 => array(
                'Caption' => array(
                    'en-US' => 'Input record property',
                    'vi-VN' => 'Nhập liệu cho từng thuộc tính'
                )
            ),
            60 => array(
                'Caption' => array(
                    'en-US' => 'Press Save button',
                    'vi-VN' => 'Click nút lưu'
                )
            ),
            80 => array(
                'Caption' => array(
                    'en-US' => 'Focus on this area to see new added record',
                    'vi-VN' => 'Quan sát ở đây để thấy record mới thêm'
                )
            ),
            100 => array(
                'Caption' => array(
                    'en-US' => 'Notification area, validation msg will raise beside here, click to clear msgs',
                    'vi-VN' => 'Khi lưu, các thông báo lỗi (nếu có) sẽ xuất hiện ở đây'
                )
            ),
            101 => array(
                'Caption' => array(
                    'en-US' => 'Validation also marked on each field which cause error',
                    'vi-VN' => 'Đồng thời cũng sẽ đánh dấu trên Form các Field gây lỗi (màu viền: đỏ (lỗi), vàng (cảnh báo), xanh(dữ liệu tự động gán),...)'
                )
            )
        );
    }

    private $sample_serverfns =
        array(
            'id1' => array(
                'fn_name' => 'action1',
                'label' => 'button_name1'
            ),
            'id2' => array(
                'fn_name' => 'action2',
                'label' => 'button_name2'
            ),
        );

    protected function serverFunctions()
    {
        return array();
    }

    private function render_serverFunctions()
    {
        if (count($this->serverFunctions()) <= 0) {
            return;
        }
        ?>
        <script>
            MYAPP.callFn = function(fn_name, params, on_done_fn, on_fail_fn, on_final_fn) {
                (function ($) {
                    //AJAX progress Bar
                    MYAPP.ajax_loader = new ajaxLoader("#cardForm");
                    //build data
                    var json = MYAPP.getObj();//form2js("cardForm", ".", false, null, true);//skip empty some time cause lack field
                    //begin lock

                    console.log(json);
                    var postdata = {submit: "submit", action: '', function: fn_name, data: json, params: params};
                    console.log(postdata);
                    $.post(MYAPP.data_port, postdata)
                        .done(function (data) {
                            //data JSON
                            console.log(data);
                            //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format



                            console.log(data.rows[0]);

                            MYAPP.clearFormValidationMark();
                            MYAPP.setObj(data.rows[0]);

                            MYAPP.formValidation = data.msg;
                            MYAPP.showMsg(data.msg);//must be called after setObj(...)

                            <?=$this->onCallFnOK()?>
                            if(on_done_fn!=undefined)
                            {
                                on_done_fn(data);
                            }
                        })
                        .fail(function (data) {
                            console.log(data);
                            if(on_fail_fn!=undefined)
                            {
                                on_fail_fn(data);
                            }
                        })
                        .always(function (data) {
                            //release lock
                            MYAPP.ajax_loader.remove();
                            if(on_final_fn!=undefined)
                            {
                                on_final_fn(data);
                            }
                        });
                })(jQuery);
            }
        </script>
        <!-- Single button -->
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                <?=Qdmvc_Message::getMsg('btn_function')?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <?php
                foreach ($this->serverFunctions() as $item=>$config) {
                    $fn_label = isset($config['label'][$this->data['language']])?$config['label'][$this->data['language']]:'@'.$item;
                    ?>
                    <li><a id="<?= $item ?>"><?= $fn_label ?></a></li>
                <?php
                    if(!QdT_Library::isNullOrEmpty($config['fn_name']))
                    {
                        ?>
                        <script>
                            (function ($) {
                                $(document).ready(function () {
                                    $('#<?=$item?>').click(function(){
                                        MYAPP.callFn('<?=$config['fn_name']?>');
                                    });
                                });
                            })(jQuery);
                        </script>
                    <?php
                    }
                }
                ?>
            </ul>
        </div>
    <?php
    }

    public function render()
    {
        ?>
        <?= $this->preConfig() ?>
        <?= $this->internalGateway() ?>
        <?= $this->externalGateway() ?>
        <?= $this->style() ?>
        <?= $this->formValidation() ?>
        <?= $this->progressSpinner() ?>
        <?= $this->lookupWindowLayout() ?>
        <?= $this->lookupDatePickerLayout() ?>
        <?= $this->Bar() ?>
        <?= $this->msgPanelLayout() ?>
        <?= $this->onReadyHook() ?>
    <?php
    }
}