<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 03/05/2015
 * Time: 9:48 AM
 */
//load Custom menu
Qdmvc::loadIndex('controllers/menus/custom', false);
class Qdmvc_Page_IndexMenu
{
    public static function getIndex()
    {
        return array_merge(static::getMenu());
    }
    private static function getMenuFolder(){

        return array(
            /*Folder*/
            'folder50' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Cấu hình & Cài đặt',
                    'en-US' => 'Setup & Options'
                ),
                'Order' => 10000
            ),
            'folder60' => array(
                'ParentId' => 'folder50',
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Phân quyền',
                    'en-US' => 'User Role'
                ),
                'Order' => 20000
            ),
            'folder70' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Hệ thống',
                    'en-US' => 'System'
                ),
                'Order' => 30000
            ),
            'folder110' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Khác',
                    'en-US' => 'Other'
                ),
                'Order' => 50000
            ),
            'folder140' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Báo cáo',
                    'en-US' => 'Reports'
                ),
                'Order' => 60000
            ),
        );
    }
    private static function getMenuOther(){
        return array(
            'imggrp' => array(
                'ParentId' => 'folder110',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ImgGrp',
                'Caption' => array(
                    'en-US' => 'Img Group',
                    'vi-VN' => 'Danh mục hình ảnh',
                ),
                'Model' => 'QdImgGrp',
                'DataPort' => 'imggrp_port',
                'PageList' => 'imggrp_list'
            ),
            'imggrp_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ImgGrp_list',
                'Caption' => array(
                    'en-US' => 'Img Group List',
                    'vi-VN' => 'Img Group List',
                ),
                'Model' => 'QdImgGrp',
                'DataPort' => 'imggrp_port',
            ),

            'image' => array(
                'ParentId' => 'imggrp',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Image',
                'Caption' => array(
                    'en-US' => 'Image',
                    'vi-VN' => 'Hình ảnh'
                ),
                'Model' => 'QdImage',
                'DataPort' => 'image_port',
                'PageList' => 'image_list'
            ),
            'image_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Image_list',
                'Caption' => array(
                    'en-US' => 'Image List',
                    'vi-VN' => 'Image List'
                ),
                'Model' => 'QdImage',
                'DataPort' => 'image_port'
            ),
            'image_unused' => array(
                'ParentId' => 'image',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ImageUnused',
                'Caption' => array(
                    'en-US' => 'Image (Unused)',
                    'vi-VN' => 'Hình ảnh (Rác)'
                ),
                'Model' => 'QdImage',
                'DataPort' => 'image_port',
                'PageList' => 'image_unused_list'
            ),
            'image_unused_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ImageUnused_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdImage',
                'DataPort' => 'image_port'
            ),
            'widgetnavcat' => array(
                'ParentId' => 'folder110',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_WidgetNavCat',
                'Caption' => array(
                    'en-US' => 'Widget Nav Cat',
                    'vi-VN' => 'Widget Nav Cat'
                ),
                'Model' => 'QdWidgetNavCat',
                'DataPort' => 'widgetnavcat_port',
                'PageList' => 'widgetnavcat_list'
            ),
            'widgetnavcat_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_WidgetNavCat_list',
                'Caption' => array(
                    'en-US' => 'Widget Nav Cat List',
                    'vi-VN' => 'Widget Nav Cat List'
                ),
                'Model' => 'QdWidgetNavCat',
                'DataPort' => 'widgetnavcat_port',
            ),
            'widgetnav' => array(
                'ParentId' => 'widgetnavcat',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_WidgetNav',
                'Caption' => array(
                    'en-US' => 'Widget Nav',
                    'vi-VN' => 'Widget Nav'
                ),
                'Model' => 'QdWidgetNav',
                'DataPort' => 'widgetnav_port',
                'PageList' => 'widgetnav_list'
            ),
            'widgetnav_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_WidgetNav_List',
                'Caption' => array(
                    'en-US' => 'Widget Nav List',
                    'vi-VN' => 'Widget Nav List'
                ),
                'Model' => 'QdWidgetNav',
                'DataPort' => 'widgetnav_port',
            ),
        );
    }
    private static function getMenuReport(){
        return array();
    }
    private static function getMenuSystem(){
        return array(
            'qdmvcpage' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_QdmvcPage',
                'Caption' => array(
                    'en-US' => 'Qdmvc Page',
                    'vi-VN' => 'Qdmvc Page',
                ),
                'Model' => 'QdQdmvcPage',
                'DataPort' => 'qdmvcpage_port',
                'PageList' => 'qdmvcpage_list'
            ),
            'qdmvcpage_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_QdmvcPage_List',
                'Caption' => array(
                    'en-US' => 'User Personalization List',
                    'vi-VN' => 'User Personalization List',
                ),
                'Model' => 'QdQdmvcPage',
                'DataPort' => 'qdmvcpage_port'
            ),
            'qdmvcmodel' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_QdmvcModel',
                'Caption' => array(
                    'en-US' => 'Qdmvc Model',
                    'vi-VN' => 'Qdmvc Model',
                ),
                'Model' => 'QdQdmvcModel',
                'DataPort' => 'qdmvcmodel_port',
                'PageList' => 'qdmvcmodel_list'
            ),
            'qdmvcmodel_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_QdmvcModel_List',
                'Caption' => array(
                    'en-US' => 'User Personalization List',
                    'vi-VN' => 'User Personalization List',
                ),
                'Model' => 'QdQdmvcModel',
                'DataPort' => 'qdmvcmodel_port'
            ),
            'mytags' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_MyTags',
                'Caption' => array(
                    'en-US' => 'My Tags',
                    'vi-VN' => 'My Tags',
                ),
                'Model' => 'QdMyTags',
                'DataPort' => 'mytags_port',
                'PageList' => 'mytags_list'
            ),
            'mytags_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_MyTags_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdMyTags',
                'DataPort' => 'mytags_port'
            ),
            'setup_version' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_SetupVersion',
                'Caption' => array(
                    'en-US' => 'Version',
                    'vi-VN' => 'Version',
                ),
                'Model' => 'QdVersion',
                'DataPort' => 'version_port'
            ),
            'wpmenu' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_WpMenu',
                'Caption' => array(
                    'en-US' => 'WP Menu',
                    'vi-VN' => 'WP Menu',
                ),
                'Model' => 'QdWpMenu',
                'DataPort' => 'wpmenu_port',
                'PageList' => 'wpmenu_list'
            ),
            'wpmenu_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_WpMenu_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdWpMenu',
                'DataPort' => 'wpmenu_port'
            ),
            'menu' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Menu',
                'Caption' => array(
                    'en-US' => 'Main Menu',
                    'vi-VN' => 'Menu chính'
                ),
                'Model' => 'QdMenu',
                'DataPort' => 'menu_port',
                'PageList' => 'menu_list'
            ),
            'menu_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Menu_list',
                'Caption' => array(
                    'en-US' => 'Menu List',
                    'vi-VN' => 'Menu List'
                ),
                'Model' => 'QdMenu',
                'DataPort' => 'menu_port'
            ),


            'note' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Note',
                'Caption' => array(
                    'en-US' => 'Note',
                    'vi-VN' => 'Ghi chú'
                ),
                'Model' => 'QdNote',
                'DataPort' => 'note_port',
                'PageList' => 'note_list'
            ),
            'note_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Note_list',
                'Caption' => array(
                    'en-US' => 'Note List',
                    'vi-VN' => 'Note List'
                ),
                'Model' => 'QdNote',
                'DataPort' => 'note_port'
            ),
            'seometa' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_SEOMeta',
                'Caption' => array(
                    'en-US' => 'SEO Meta',
                    'vi-VN' => 'SEO Meta'
                ),
                'Model' => 'QdSEOMeta',
                'DataPort' => 'seometa_port',
                'PageList' => 'seometa_list'
            ),
            'seometa_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_SEOMeta_list',
                'Caption' => array(
                    'en-US' => 'SEOMeta List',
                    'vi-VN' => 'SEOMeta List'
                ),
                'Model' => 'QdSEOMeta',
                'DataPort' => 'seometa_port'
            ),
            'log' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Log',
                'Caption' => array(
                    'en-US' => 'Log',
                    'vi-VN' => 'Log'
                ),
                'Model' => 'QdLog',
                'DataPort' => 'log_port',
                'PageList' => 'log_list'
            ),
            'log_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Log_list',
                'Caption' => array(
                    'en-US' => 'Log List',
                    'vi-VN' => 'Log List'
                ),
                'Model' => 'QdLog',
                'DataPort' => 'log_port'
            ),
            'object_task' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ObjectTask',
                'Caption' => array(
                    'en-US' => 'Objects Version',
                    'vi-VN' => 'Objects Version'
                ),
                'Model' => 'QdObjectTask',
                'DataPort' => 'object_task_port',
                'PageList' => 'object_task_list'
            ),
            'object_task_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ObjectTask_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdObjectTask',
                'DataPort' => 'object_task_port',
            ),
            'csdl' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Folder',
                'Caption' => array(
                    'en-US' => 'CSDL Hành chính',
                    'vi-VN' => 'CSDL Hành chính'
                ),
            ),
            'vndistrict' => array(
                'ParentId' => 'csdl',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_VnDistrict_Card',
                'Caption' => array(
                    'en-US' => 'VnDistrict',
                    'vi-VN' => 'VnDistrict'
                ),
                'Model' => 'QdVnDistrict',
                'DataPort' => 'vndistrict_port',
                'PageList' => 'vndistrict_list'
            ),
            'vndistrict_list' => array(
                'ParentId' => 'csdl',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_VnDistrict_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdVnDistrict',
                'DataPort' => 'vndistrict_port'
            ),
            'vnprovince' => array(
                'ParentId' => 'csdl',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_VnProvince_Card',
                'Caption' => array(
                    'en-US' => 'VnProvince',
                    'vi-VN' => 'VnProvince'
                ),
                'Model' => 'QdVnProvince',
                'DataPort' => 'vnprovince_port',
                'PageList' => 'vnprovince_list'
            ),
            'vnprovince_list' => array(
                'ParentId' => 'csdl',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_VnProvince_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdVnProvince',
                'DataPort' => 'vnprovince_port'
            ),
            'vnward' => array(
                'ParentId' => 'csdl',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_VnWard_Card',
                'Caption' => array(
                    'en-US' => 'VnWard',
                    'vi-VN' => 'VnWard'
                ),
                'Model' => 'QdVnWard',
                'DataPort' => 'vnward_port',
                'PageList' => 'vnward_list'
            ),
            'vnward_list' => array(
                'ParentId' => 'csdl',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_VnWard_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdVnWard',
                'DataPort' => 'vnward_port'
            ),
            'importdata' => array(
                'ParentId' => 'folder70',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ImportData',
                'Caption' => array(
                    'en-US' => 'Import Data',
                    'vi-VN' => 'Import Data'
                ),
                'Model' => 'QdImportData',
                'DataPort' => 'importdata_port',
                'PageList' => 'importdata_list'
            ),
            'importdata_list' => array(
                'ParentId' => 'folder70',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Report_ImportData_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdImportData',
                'DataPort' => 'importdata_port'
            ),
        );
    }
    private static function getMenuUserRole(){
        return array(
            'user' => array(
                'ParentId' => 'folder60',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_User',
                'Caption' => array(
                    'en-US' => 'User',
                    'vi-VN' => 'User',
                ),
                'Model' => 'QdUser',
                'DataPort' => 'user_port',
                'PageList' => 'user_list'
            ),
            'user_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_User_List',
                'Caption' => array(
                    'en-US' => 'User List',
                    'vi-VN' => 'User List',
                ),
                'Model' => 'QdUser',
                'DataPort' => 'user_port'
            ),
            'usergroup' => array(
                'ParentId' => 'folder60',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_UserGroup',
                'Caption' => array(
                    'en-US' => 'UserGroup',
                    'vi-VN' => 'UserGroup',
                ),
                'Model' => 'QdUserGroup',
                'DataPort' => 'usergroup_port',
                'PageList' => 'usergroup_list'
            ),
            'usergroup_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_UserGroup_List',
                'Caption' => array(
                    'en-US' => 'UserGroup List',
                    'vi-VN' => 'UserGroup List',
                ),
                'Model' => 'QdUserGroup',
                'DataPort' => 'usergroup_port'
            ),
            'permission' => array(
                'ParentId' => 'folder60',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Permission',
                'Caption' => array(
                    'en-US' => 'Permission',
                    'vi-VN' => 'Permission',
                ),
                'Model' => 'QdPermission',
                'DataPort' => 'permission_port',
                'PageList' => 'permission_list'
            ),
            'permission_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Permission_List',
                'Caption' => array(
                    'en-US' => 'Permission List',
                    'vi-VN' => 'Permission List',
                ),
                'Model' => 'QdPermission',
                'DataPort' => 'permission_port'
            ),
            'useringroup' => array(
                'ParentId' => 'folder60',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_UserInGroup',
                'Caption' => array(
                    'en-US' => 'UserInGroup',
                    'vi-VN' => 'UserInGroup',
                ),
                'Model' => 'QdUserInGroup',
                'DataPort' => 'useringroup_port',
                'PageList' => 'useringroup_list'
            ),
            'useringroup_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_UserInGroup_List',
                'Caption' => array(
                    'en-US' => 'UserInGroup List',
                    'vi-VN' => 'UserInGroup List',
                ),
                'Model' => 'QdUserInGroup',
                'DataPort' => 'useringroup_port'
            ),
        );
    }
    private static function getMenuSetupOption(){
        return array(
            'noseries' => array(
                'ParentId' => 'folder50',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_NoSeries',
                'Caption' => array(
                    'en-US' => 'Noseries',
                    'vi-VN' => 'Noseries',
                ),
                'Model' => 'QdNoSeries',
                'DataPort' => 'noseries_port',
                'PageList' => 'noseries_list'
            ),
            'noseries_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_NoSeries_List',
                'Caption' => array(
                    'en-US' => 'Noseries',
                    'vi-VN' => 'Noseries',
                ),
                'Model' => 'QdNoSeries',
                'DataPort' => 'noseries_port'
            ),
            'noseriesmap' => array(
                'ParentId' => 'folder50',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_NoSeriesMap',
                'Caption' => array(
                    'en-US' => 'NoSeries Map',
                    'vi-VN' => 'NoSeries Map',
                ),
                'Model' => 'QdNoSeriesMap',
                'DataPort' => 'noseriesmap_port',
                'PageList' => 'noseriesmap_list'
            ),
            'noseriesmap_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_NoSeriesMap_List',
                'Caption' => array(
                    'en-US' => '',
                    'vi-VN' => '',
                ),
                'Model' => 'QdNoSeriesMap',
                'DataPort' => 'noseriesmap_port'
            ),
            'template' => array(
                'ParentId' => 'folder50',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Template',
                'Caption' => array(
                    'en-US' => 'Template',
                    'vi-VN' => 'Template',
                ),
                'Model' => 'QdTemplate',
                'DataPort' => 'template_port',
                'PageList' => 'template_list'
            ),
            'template_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Template_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdTemplate',
                'DataPort' => 'template_port'
            ),
            'setup' => array(
                'ParentId' => 'folder50',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Setup',
                'Caption' => array(
                    'en-US' => 'General Setup',
                    'vi-VN' => 'Cấu hình chung',
                ),
                'Model' => 'QdSetup',
                'DataPort' => 'setup_port'
            ),
            'user_personalization' => array(
                'ParentId' => 'folder50',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_UserPersonalization',
                'Caption' => array(
                    'en-US' => 'User Personalization',
                    'vi-VN' => 'User Personalization',
                ),
                'Model' => 'QdUserPersonalization',
                'DataPort' => 'user_personalization_port',
                'PageList' => 'user_personalization_list'
            ),
            'user_personalization_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_UserPersonalization_List',
                'Caption' => array(
                    'en-US' => 'User Personalization List',
                    'vi-VN' => 'User Personalization List',
                ),
                'Model' => 'QdUserPersonalization',
                'DataPort' => 'user_personalization_port'
            ),
        );
    }
    private static function getMenu()
    {
        $obj = array(
            'navigation' => array(
                'ParentId' => '',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Navigation',
                'Caption' => array(
                    'en-US' => 'Navigation',
                    'vi-VN' => 'Navigation'
                ),
                'Model' => 'QdNote',
                'DataPort' => 'note_port',
                'PageList' => 'note_list'
            ),
        );
        //collect menu items
        $obj = array_merge($obj, static::getMenuUserRole());
        $obj = array_merge($obj, static::getMenuSetupOption());
        $obj = array_merge($obj, static::getMenuReport());
        $obj = array_merge($obj, static::getMenuOther());
        $obj = array_merge($obj, static::getMenuSystem());
        $obj = array_merge($obj, static::getMenuFolder());

        //get custom items
        if(class_exists('Qdmvc_Page_IndexCustomMenu')){
            $obj = array_merge($obj, Qdmvc_Page_IndexCustomMenu::getIndex());
        }

        //Order
        uasort($obj, "static::compareArray");

        return $obj;
    }
    private static function compareArray($a, $b)
    {
        if (isset($a['Order']) && isset($b['Order'])) {
            if ($a['Order'] == $b['Order']) {
                return 0;
            }
            return $a['Order'] - $b['Order'];
        }
        return 0;
    }
}