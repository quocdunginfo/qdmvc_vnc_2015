<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 09/03/2015
 * Time: 7:08 PM
 */
Qdmvc::loadLayout('layout_root');

class Qdmvc_Layout_Navigation extends Qdmvc_Layout_Root
{
    function __construct($page)
    {
        parent::__construct($page);
        $this->data['view_style'] = 'compact';

        // Moved to qdmvc because of files caches
        //jquery ui
        QdJqwidgets::loadSinglePluginJS('jquery-ui/jquery-ui.js', false);
        QdJqwidgets::loadSinglePluginCSS('jquery-ui/jquery-ui.css', false);
        //jquery fancytree
        QdJqwidgets::loadSinglePluginJS('fancytree/jquery.fancytree.js', false);
        QdJqwidgets::loadSinglePluginJS('fancytree/jquery.fancytree.filter.js', false);
        QdJqwidgets::loadSinglePluginCSS('fancytree/ui.fancytree.css', false);
        //underscore
        QdJqwidgets::loadSinglePluginJS('underscore-min.js', false);

    }

    public function render()
    {
        $this->style();
        parent::render();
        $this->onReadyHook();
        ?>
        <div id="qdmvcRootDiv" style="display: none; width: inherit; height: inherit">
            <style>
                #wpbody-content {
                    overflow-y: hidden !important;
                }
            </style>
            <script>
                MYAPP = {};
                MYAPP.openInNewTab = function (url) {
                    if (window == window.parent) {
                        window.open(url, '_blank');
                        return;
                    }
                    window.parent.MYAPP.openInNewTab(url);
                };
                MYAPP.TreeUnflatten = function( array, parent, tree ){

                    tree = typeof tree !== 'undefined' ? tree : [];
                    parent = typeof parent !== 'undefined' ? parent : { key: -1 };

                    var children = _.filter( array, function(child){ return child.parentid == parent.key; });

                    if( !_.isEmpty( children )  ){
                        if( parent.key == -1 ){
                            tree = children;
                        }else{
                            parent['children'] = children
                        }
                        _.each( children, function( child ){ MYAPP.TreeUnflatten( array, child ) } );
                    }

                    return tree;
                };

                (function ($) {
                    $(document).ready(function () {
                        //height = $(window).height()-3;

                        $("#splitter").jqxSplitter({width: '100%', height: '100%', panels: [{size: 230}]});
                        $("#splitter2").jqxSplitter({orientation: 'horizontal', width: '100%', height: '100%', panels: [{size: '90%'}]});

                        // Create jqxTree
                        Array.prototype.insert = function (index, item) {
                            this.splice(index, 0, item);
                        };

                        var data = <?=Qdmvc_Page_Index::buildJSONTree($this->data['language'])?>;
                        data = MYAPP.TreeUnflatten(data);
                        var autoexpand = false;
                        <?php if($this->data['setup']->autoexpandmenu==true): ?>
                        autoexpand = true;
                        <?php endif; ?>

                        $("#jqxTree").fancytree({
                            extensions: ["filter"],
                            quicksearch: true,
                            checkbox: false,
                            source: data,
                            autoScroll: true,
                            filter: {
                                autoApply: true,  // Re-apply last filter if lazy data is loaded
                                counter: true,  // Show a badge with number of matching child nodes near parent icons
                                fuzzy: false,  // Match single characters in order, e.g. 'fb' will match 'FooBar'
                                hideExpandedCounter: true,  // Hide counter badge, when parent is expanded
                                highlight: true,  // Highlight matches by wrapping inside <mark> tags
                                mode: "hide"  // Grayout unmatched nodes (pass "hide" to remove unmatched node instead)
                            },
                            activate: function(event, data) {
                                var node = data.node;
                                //add tab
                                var args = event.args;

                                var label = node.title;
                                var url = node.data.value;
                                if (url == '') {
                                    return;//ignore folder
                                }

                                //check existed
                                var totaltab = $('#jqxTabs').jqxTabs('length');
                                var i = 0;
                                for (i = 0; i < totaltab; i++) {
                                    var title = $('#jqxTabs').jqxTabs('getTitleAt', i);
                                    if (title == label) {
                                        $('#jqxTabs').jqxTabs('select', i);//switch to tab
                                        return;//ignore duplicate tab
                                    }
                                }

                                $('#jqxTabs').jqxTabs('addLast', label, '<iframe id="pagepart" src="' + url + '" width="100%" height="99%" scrolling="yes" frameborder="0"><p>Your browser does not support iframes</p> </iframe>');
                            },
                            create: function(event, data){
                                //alert('create done');
                            },
                            init: function(event, data){
                                if(autoexpand!=undefined && autoexpand==true) {
                                    $("#jqxTree").fancytree("getRootNode").visit(function (node) {
                                        node.setExpanded(true);
                                    });
                                }
                            }
                        });

                        //Tabs
                        $('#jqxTabs').jqxTabs({height: '100%', width: '100%', showCloseButtons: true, reorder: true});


                        /*Handle Tab Panel Context Menu
                        var contextMenu = $("#jqxMenu").jqxMenu({ width: '120px', height: '80px', autoOpenPopup: false, mode: 'popup'});
                        $("#jqxMenu").bind('itemclick', function(event)
                        {
                            var item = $(event.args).text();
                            var tabS = $('#jqxTabs');
                            switch (item)
                            {
                                case "Close Others":
                                    var currentIndex = tabS.jqxTabs('selectedItem');
                                    var currentTabTitle = tabS.jqxTabs('getTitleAt', currentIndex);
                                    for(var kk=currentIndex+1;kk<tabS.jqxTabs('length');kk++)
                                    {
                                        tabS.jqxTabs('removeAt', kk);
                                    }
                                    while(tabS.jqxTabs('length') > 1){
                                        tabS.jqxTabs('removeFirst');
                                    }
                                    break;
                                case "Close All":

                                    while(tabS.jqxTabs('length') > 0){
                                        tabS.jqxTabs('removeLast');
                                    }
                                    break;
                            }
                        });
                        */
                        // open the context menu when the user presses the mouse right button.
                        $("#jqxTabs").bind('mousedown', function (event) {
                            var rightClick = isRightClick(event);
                            if (rightClick) {
                                var scrollTop = $(window).scrollTop();
                                var scrollLeft = $(window).scrollLeft();

                                contextMenu.jqxMenu('open', parseInt(event.clientX) + 5 + scrollLeft, parseInt(event.clientY) + 5 + scrollTop);
                                return false;
                            }
                        });
                        /*

                        // disable the default browser's context menu.
                        $(document).bind('contextmenu', function (e) {
                            //return false;
                        });
                        */

                        function isRightClick(event) {
                            var rightclick;
                            if (!event) var event = window.event;
                            if (event.which) rightclick = (event.which == 3);
                            else if (event.button) rightclick = (event.button == 2);
                            return rightclick;
                        }
                        /*Handle Context Menu*/
                        $("#searchbox").keyup(function(e){
                            var match = $(this).val();
                            var tree = $("#jqxTree").fancytree("getTree");
                            if(e && e.which === $.ui.keyCode.ESCAPE || $.trim(match) === ""){
                                //reset filter
                                tree.clearFilter();
                                return;
                            }

                            // Pass text as filter string (will be matched as substring in the node title)
                            var n = tree.filterNodes(match, {autoExpand: true});
                        }).focus();

                    });
                })(jQuery);
            </script>
            <div id="splitter">
                <div>
                    <div id="splitter2">
                        <div>
                            <div style="width: 100%;">
                                <div style="float: left;">Search:</div>
                                <input id="searchbox" style="float: left;" />
                                <div style="clear: both"></div>
                            </div>

                            <div id='jqxTree' style="height: 95%; overflow: auto;">

                            </div>
                        </div>
                        <div>
                            <a target="_blank" href="<?= admin_url('profile.php') ?>"><?php $tmp = wp_get_current_user();
                                echo $tmp->user_login; ?> </a> |
                            <a onclick="return confirm('<?= Qdmvc_Message::getMsg('msg_confirm') ?>')"
                               href="<?= wp_logout_url(Qdmvc_Helper::getCompactPageListLink('navigation')) ?>">
                                <?= Qdmvc_Message::getMsg('msg_logout') ?>
                            </a>
                        </div>
                    </div>

                </div>
                <div id="ContentPanel">
                    <!--
                    <div id='jqxMenu'>
                        <ul>
                            <li>Close Others</li>
                            <li>Close All</li>
                        </ul>
                    </div>-->
                    <div id='jqxTabs' style="float: left;">
                        <ul style="margin-left: 30px;" id="unorderedList">
                            <li>Home</li>
                        </ul>
                        <div>
                            Home page content
                        </div>
                    </div>
                </div>
            </div>
            <script>
                (function ($) {
                    $(document).ready(function () {
                        $('#panelContentpaneljqxTree li').click(function () {
                            //alert('wtf');
                        });


                    });
                })(jQuery);
            </script>
            <style>
                #hidden {
                    display: none
                }
            </style>
        </div>
    <?php
    }

    protected function onReadyHook()
    {
        parent::onReadyHook(); // TODO: Change the autogenerated stub
    }
}