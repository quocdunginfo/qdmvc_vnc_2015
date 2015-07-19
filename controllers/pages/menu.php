<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 03/05/2015
 * Time: 9:48 AM
 */
class Qdmvc_Page_IndexMenu {
    public static function getIndex()
    {
        return static::$index;
    }
    private static $index = array(
        'main' => array(
            'ParentId' => -1,
            'Active'=>false,
            'Class'=>'Qdmvc_Page_Main',
            'Caption' => array(
                'en-US' => 'Page Main',
                'vi-VN' => 'Trang chính',
            ),
            'Model' => 'QdNote',
            'DataPort' => 'note_port',
        ),
        'product' => array(
            'ParentId' => 'folder10',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Product_Card',
            'Caption' => array(
                'en-US' => 'Product (All)',
                'vi-VN' => 'Sản phẩm (Tất cả)',
            ),
            'Model' => 'QdProduct',
            'DataPort' => 'product_port',
            'PageList' => 'product_list'
        ),
        'product_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Product_List',
            'Caption' => array(
                'en-US' => 'Product List',
                'vi-VN' => 'Product List'
            ),
            'Model' => 'QdProduct',
            'DataPort' => 'product_port'
        ),
        'product_df' => array(
            'ParentId' => 'folder10',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductDF_Card',
            'Caption' => array(
                'en-US' => 'Product DF',
                'vi-VN' => 'Sản phẩm DF',
            ),
            'Model' => 'QdProductDF',
            'DataPort' => 'product_df_port',
            'PageList' => 'product_df_list'
        ),
        'product_df_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProductDF_List',
            'Caption' => array(
                'en-US' => 'Product DF List',
                'vi-VN' => 'Product DF List'
            ),
            'Model' => 'QdProductDF',
            'DataPort' => 'product_df_port'
        ),
        'product_qa' => array(
            'ParentId' => 'folder10',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductQA_Card',
            'Caption' => array(
                'en-US' => 'Product QA',
                'vi-VN' => 'Sản phẩm QA',
            ),
            'Model' => 'QdProductQA',
            'DataPort' => 'product_qa_port',
            'PageList' => 'product_qa_list'
        ),
        'product_qa_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProductQA_List',
            'Caption' => array(
                'en-US' => 'Product QA List',
                'vi-VN' => 'Product QA List'
            ),
            'Model' => 'QdProductQA',
            'DataPort' => 'product_qa_port'
        ),
        'product_gd' => array(
            'ParentId' => 'folder10',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductGD_Card',
            'Caption' => array(
                'en-US' => 'Product GD',
                'vi-VN' => 'Sản phẩm GD',
            ),
            'Model' => 'QdProductGD',
            'DataPort' => 'product_gd_port',
            'PageList' => 'product_gd_list'
        ),
        'product_gd_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProductGD_List',
            'Caption' => array(
                'en-US' => 'Product GD List',
                'vi-VN' => 'Product GD List'
            ),
            'Model' => 'QdProductGD',
            'DataPort' => 'product_gd_port'
        ),
        'product_cat_card' => array(
            'ParentId' => 'folder20',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductCat_Card',
            'Caption' => array(
                'en-US' => 'Product Category (All)',
                'vi-VN' => 'Loại sản phẩm (Tất cả)',
            ),
            'Model' => 'QdProductCat',
            'DataPort' => 'product_cat_port',
            'PageList' => 'product_cat_list'
        ),
        'product_cat_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProductCat_List',
            'Caption' => array(
                'en-US' => 'Product Cat List',
                'vi-VN' => 'Product Cat List',
            ),
            'Model' => 'QdProductCat',
            'DataPort' => 'product_cat_port'
        ),
        'product_cat_df' => array(
            'ParentId' => 'folder20',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductCatDF_Card',
            'Caption' => array(
                'en-US' => 'Product Cat DF',
                'vi-VN' => 'Loại sản phẩm DF',
            ),
            'Model' => 'QdProductCatDF',
            'DataPort' => 'product_cat_df_port',
            'PageList' => 'product_cat_df_list'
        ),
        'product_cat_df_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProductCatDF_List',
            'Caption' => array(
                'en-US' => 'Product Cat DF List',
                'vi-VN' => 'Product Cat DF List',
            ),
            'Model' => 'QdProductCatDF',
            'DataPort' => 'product_cat_df_port'
        ),
        'product_cat_qa' => array(
            'ParentId' => 'folder20',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductCatQA_Card',
            'Caption' => array(
                'en-US' => 'Product Cat QA',
                'vi-VN' => 'Loại sản phẩm QA',
            ),
            'Model' => 'QdProductCatQA',
            'DataPort' => 'product_cat_qa_port',
            'PageList' => 'product_cat_qa_list'
        ),
        'product_cat_qa_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProductCatQA_List',
            'Caption' => array(
                'en-US' => 'Product Cat QA List',
                'vi-VN' => 'Product Cat QA List',
            ),
            'Model' => 'QdProductCatQA',
            'DataPort' => 'product_cat_qa_port'
        ),
        'product_cat_gd' => array(
            'ParentId' => 'folder20',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductCatGD_Card',
            'Caption' => array(
                'en-US' => 'Product Cat GD',
                'vi-VN' => 'Loại sản phẩm GD',
            ),
            'Model' => 'QdProductCatGD',
            'DataPort' => 'product_cat_gd_port',
            'PageList' => 'product_cat_gd_list'
        ),
        'product_cat_gd_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProductCatGD_List',
            'Caption' => array(
                'en-US' => 'Product Cat GD List',
                'vi-VN' => 'Product Cat GD List',
            ),
            'Model' => 'QdProductCatGD',
            'DataPort' => 'product_cat_gd_port'
        ),
        'product_order_card' => array(
            'ParentId' => 'folder100',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductOrder_Card',
            'Caption' => array(
                'en-US' => 'Product Order',
                'vi-VN' => 'Đơn đặt hàng (Open)',
            ),
            'Model' => 'QdProductOrder',
            'DataPort' => 'product_order_port',
            'PageList' => 'product_order_list'
        ),
        'product_order_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProductOrder_List',
            'Caption' => array(
                'en-US' => 'Product Order List',
                'vi-VN' => 'Product Order List',
            ),
            'Model' => 'QdProductOrder',
            'DataPort' => 'product_order_port'
        ),
        'product_order_done_card' => array(
            'ParentId' => 'product_order_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductOrderDone_Card',
            'Caption' => array(
                'en-US' => 'Product Order Done',
                'vi-VN' => 'Đơn đặt hàng (Done)',
            ),
            'Model' => 'QdProductOrder',
            'DataPort' => 'product_order_port',
            'PageList' => 'product_order_done_list'
        ),
        'product_order_done_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProductOrderDone_List',
            'Caption' => array(
                'en-US' => 'Product Order Done List',
                'vi-VN' => 'Product Order Done List'
            ),
            'Model' => 'QdProductOrder',
            'DataPort' => 'product_order_port'
        ),
        'feedback_card' => array(
            'ParentId' => 'folder100',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Feedback_Card',
            'Caption' => array(
                'en-US' => 'Feedback',
                'vi-VN' => 'Phản hồi KH (Open)',
            ),
            'Model' => 'QdFeedback',
            'DataPort' => 'feedback_port',
            'PageList' => 'feedback_list'
        ),
        'feedback_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Feedback_List',
            'Caption' => array(
                'en-US' => 'Feedback List',
                'vi-VN' => 'Feedback List'
            ),
            'Model' => 'QdFeedback',
            'DataPort' => 'feedback_port'
        ),
        'feedback_done_card' => array(
            'ParentId' => 'feedback_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_FeedbackDone_Card',
            'Caption' => array(
                'en-US' => 'Feedback Done',
                'vi-VN' => 'Phản hồi KH (Done)',
            ),
            'Model' => 'QdFeedback',
            'DataPort' => 'feedback_port',
            'PageList' => 'feedback_done_list'
        ),
        'feedback_done_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_FeedbackDone_List',
            'Caption' => array(
                'en-US' => 'Feedback Done List',
                'vi-VN' => 'Feedback Done List'
            ),
            'Model' => 'QdFeedback',
            'DataPort' => 'feedback_port'
        ),
        'product_setup' => array(
            'ParentId' => 'folder50',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductSetup',
            'Caption' => array(
                'en-US' => 'Product Setup',
                'vi-VN' => 'Cấu hình Sản phẩm',
            ),
            'Model' => 'QdSetupProduct',
            'DataPort' => 'product_setup_port'
        ),
        'setup_product_order' => array(
            'ParentId' => 'folder50',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_SetupProductOrder',
            'Caption' => array(
                'en-US' => 'Product Order Setup',
                'vi-VN' => 'Cấu hình đặt hàng SP',
            ),
            'Model' => 'QdSetupProductOrder',
            'DataPort' => 'setup_product_order_port'
        ),
        'theme_root_setup' => array(
            'ParentId' => 'folder50',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_TRootSetup',
            'Caption' => array(
                'en-US' => 'Theme Root Setup',
                'vi-VN' => 'Theme Root Setup',
            ),
            'Model' => 'QdTRootSetup',
            'DataPort' => 'theme/root_setup_port'
        ),
        'user_personalization' => array(
            'ParentId' => 'folder50',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_UserPersonalization',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_UserPersonalization_List',
            'Caption' => array(
                'en-US' => 'User Personalization List',
                'vi-VN' => 'User Personalization List',
            ),
            'Model' => 'QdUserPersonalization',
            'DataPort' => 'user_personalization_port'
        ),
        'qdmvcpage' => array(
            'ParentId' => 'folder70',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_QdmvcPage',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_QdmvcPage_List',
            'Caption' => array(
                'en-US' => 'User Personalization List',
                'vi-VN' => 'User Personalization List',
            ),
            'Model' => 'QdQdmvcPage',
            'DataPort' => 'qdmvcpage_port'
        ),
        'wpmenu' => array(
            'ParentId' => 'folder70',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_WpMenu',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_WpMenu_List',
            'Caption' => array(
                'en-US' => 'List',
                'vi-VN' => 'List',
            ),
            'Model' => 'QdWpMenu',
            'DataPort' => 'wpmenu_port'
        ),
        'user' => array(
            'ParentId' => 'folder60',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_User',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_User_List',
            'Caption' => array(
                'en-US' => 'User List',
                'vi-VN' => 'User List',
            ),
            'Model' => 'QdUser',
            'DataPort' => 'user_port'
        ),
        'usergroup' => array(
            'ParentId' => 'folder60',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_UserGroup',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_UserGroup_List',
            'Caption' => array(
                'en-US' => 'UserGroup List',
                'vi-VN' => 'UserGroup List',
            ),
            'Model' => 'QdUserGroup',
            'DataPort' => 'usergroup_port'
        ),
        'permission' => array(
            'ParentId' => 'folder60',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Permission',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Permission_List',
            'Caption' => array(
                'en-US' => 'Permission List',
                'vi-VN' => 'Permission List',
            ),
            'Model' => 'QdPermission',
            'DataPort' => 'permission_port'
        ),
        'useringroup' => array(
            'ParentId' => 'folder60',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_UserInGroup',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_UserInGroup_List',
            'Caption' => array(
                'en-US' => 'UserInGroup List',
                'vi-VN' => 'UserInGroup List',
            ),
            'Model' => 'QdUserInGroup',
            'DataPort' => 'useringroup_port'
        ),
        'noseries' => array(
            'ParentId' => 'folder50',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_NoSeries',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_NoSeries_List',
            'Caption' => array(
                'en-US' => 'Noseries',
                'vi-VN' => 'Noseries',
            ),
            'Model' => 'QdNoSeries',
            'DataPort' => 'noseries_port'
        ),
        'setup' => array(
            'ParentId' => 'folder50',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Setup',
            'Caption' => array(
                'en-US' => 'General Setup',
                'vi-VN' => 'Cấu hình chung',
            ),
            'Model' => 'QdSetup',
            'DataPort' => 'setup_port'
        ),
        'note' => array(
            'ParentId' => 'folder70',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Note',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Note_list',
            'Caption' => array(
                'en-US' => 'Note List',
                'vi-VN' => 'Note List'
            ),
            'Model' => 'QdNote',
            'DataPort' => 'note_port'
        ),
        'image' => array(
            'ParentId' => 'imggrp',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Image',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Image_list',
            'Caption' => array(
                'en-US' => 'Image List',
                'vi-VN' => 'Image List'
            ),
            'Model' => 'QdImage',
            'DataPort' => 'image_port'
        ),
        'log' => array(
            'ParentId' => 'folder70',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Log',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Log_list',
            'Caption' => array(
                'en-US' => 'Log List',
                'vi-VN' => 'Log List'
            ),
            'Model' => 'QdLog',
            'DataPort' => 'log_port'
        ),
        'bestchoiceitem_card' => array(
            'ParentId' => 'bestchoicecat_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_BestChoiceItem',
            'Caption' => array(
                'en-US' => 'Best Choice Item',
                'vi-VN' => 'Best Choice Item'
            ),
            'Model' => 'QdBestChoiceItem',
            'DataPort' => 'bestchoiceitem_port',
            'PageList' => 'bestchoiceitem_list'
        ),
        'bestchoiceitem_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_BestChoiceItem_list',
            'Caption' => array(
                'en-US' => 'Best Choice Item List',
                'vi-VN' => 'Best Choice Item List'
            ),
            'Model' => 'QdBestChoiceItem',
            'DataPort' => 'bestchoiceitem_port'
        ),
        'bestchoicecat_card' => array(
            'ParentId' => 'folder110',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_BestChoiceCat',
            'Caption' => array(
                'en-US' => 'Best Choice Category',
                'vi-VN' => 'Best Choice Cat'
            ),
            'Model' => 'QdBestChoiceCat',
            'DataPort' => 'bestchoicecat_port',
            'PageList' => 'bestchoicecat_list'
        ),
        'bestchoicecat_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_BestChoiceCat_list',
            'Caption' => array(
                'en-US' => 'Best Choice Cat List',
                'vi-VN' => 'Best Choice Cat List'
            ),
            'Model' => 'QdBestChoiceCat',
            'DataPort' => 'bestchoicecat_port'
        ),
        'postcat_card' => array(
            'ParentId' => 'folder80',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_PostCat',
            'Caption' => array(
                'en-US' => 'Post Category',
                'vi-VN' => 'Danh mục bài viết'
            ),
            'Model' => 'QdPostCat',
            'DataPort' => 'postcat_port',
            'PageList' => 'postcat_list'
        ),
        'postcat_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_PostCat_list',
            'Caption' => array(
                'en-US' => 'Post Cat List',
                'vi-VN' => 'Post Cat List'
            ),
            'Model' => 'QdPostCat',
            'DataPort' => 'postcat_port'
        ),
        'post_card' => array(
            'ParentId' => 'folder80',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Post',
            'Caption' => array(
                'en-US' => 'General Post',
                'vi-VN' => 'Bài viết chung'
            ),
            'Model' => 'QdPost',
            'DataPort' => 'post_port',
            'PageList' => 'post_list'
        ),
        'post_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_post_list',
            'Caption' => array(
                'en-US' => 'Post List',
                'vi-VN' => 'Post List'
            ),
            'Model' => 'QdPost',
            'DataPort' => 'post_port'
        ),
        'widgetnavcat' => array(
            'ParentId' => 'folder110',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_WidgetNavCat',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_WidgetNavCat_list',
            'Caption' => array(
                'en-US' => 'Widget Nav Cat List',
                'vi-VN' => 'Widget Nav Cat List'
            ),
            'Model' => 'QdWidgetNavCat',
            'DataPort' => 'widgetnavcat_port',
        ),
        'partnergrp' => array(
            'ParentId' => 'folder110',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_PartnerGrp',
            'Caption' => array(
                'en-US' => 'Partner Group',
                'vi-VN' => 'Nhóm Đối tác'
            ),
            'Model' => 'QdPartnerGrp',
            'DataPort' => 'partnergrp_port',
            'PageList' => 'partnergrp_list'
        ),
        'partnergrp_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_PartnerGrp_list',
            'Caption' => array(
                'en-US' => 'PartnerGrp List',
                'vi-VN' => 'PartnerGrp List'
            ),
            'Model' => 'QdPartnerGrp',
            'DataPort' => 'partnergrp_port',
        ),
        'partner' => array(
            'ParentId' => 'partnergrp',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Partner',
            'Caption' => array(
                'en-US' => 'Partner',
                'vi-VN' => 'Đối tác'
            ),
            'Model' => 'QdPartner',
            'DataPort' => 'partner_port',
            'PageList' => 'partner_list'
        ),
        'partner_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Partner_list',
            'Caption' => array(
                'en-US' => 'Partner List',
                'vi-VN' => 'Partner List'
            ),
            'Model' => 'QdPartner',
            'DataPort' => 'partner_port',
        ),
        'widgetnav' => array(
            'ParentId' => 'widgetnavcat',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_WidgetNav',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_WidgetNav_List',
            'Caption' => array(
                'en-US' => 'Widget Nav List',
                'vi-VN' => 'Widget Nav List'
            ),
            'Model' => 'QdWidgetNav',
            'DataPort' => 'widgetnav_port',
        ),
        /*'progrp' => array(
            'ParentId' => 'product_cat_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProGrp_Card',
            'Caption' => array(
                'en-US' => 'Product-Group',
                'vi-VN' => 'SP-Nhóm'
            ),
            'Model' => 'QdProGrp',
            'DataPort' => 'progrp_port',
            'PageList' => 'progrp_list'
        ),
        'progrp_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProGrp_List',
            'Caption' => array(
                'en-US' => 'Product Group List',
                'vi-VN' => 'Product Group List'
            ),
            'Model' => 'QdProGrp',
            'DataPort' => 'progrp_port',
        ),*/
        'probigsale' => array(
            'ParentId' => 'folder40',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProBigSale_Card',
            'Caption' => array(
                'en-US' => 'BigSale Products',
                'vi-VN' => 'Các sản phẩm bán chạy'
            ),
            'Model' => 'QdProBigSale',
            'DataPort' => 'probigsale_port',
            'PageList' => 'probigsale_list'
        ),
        'probigsale_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProBigSale_List',
            'Caption' => array(
                'en-US' => 'BigSale Products',
                'vi-VN' => 'BigSale Products'
            ),
            'Model' => 'QdProBigSale',
            'DataPort' => 'probigsale_port',
        ),
        'bigsalecat' => array(
            'ParentId' => 'folder40',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_BigSaleCat_Card',
            'Caption' => array(
                'en-US' => 'BigSale Category',
                'vi-VN' => 'Danh mục bán chạy',
            ),
            'Model' => 'QdBigSaleCat',
            'DataPort' => 'bigsalecat_port',
            'PageList' => 'bigsalecat_list'
        ),
        'bigsalecat_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_BigSaleCat_List',
            'Caption' => array(
                'en-US' => 'BigSale Cat List',
                'vi-VN' => 'BigSale Cat List',
            ),
            'Model' => 'QdBigSaleCat',
            'DataPort' => 'bigsalecat_port'
        ),
        'propromotion' => array(
            'ParentId' => 'folder40',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProPromotion_Card',
            'Caption' => array(
                'en-US' => 'Promotion Products',
                'vi-VN' => 'Các sản phẩm KM'
            ),
            'Model' => 'QdProPromotion',
            'DataPort' => 'progrp_port',
            'PageList' => 'propromotion_list'
        ),
        'propromotion_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ProPromotion_List',
            'Caption' => array(
                'en-US' => 'Promotion Products',
                'vi-VN' => 'Promotion Products'
            ),
            'Model' => 'QdProPromotion',
            'DataPort' => 'progrp_port',
        ),
        'promotioncat' => array(
            'ParentId' => 'folder40',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_PromotionCat_Card',
            'Caption' => array(
                'en-US' => 'Promotion Category',
                'vi-VN' => 'Danh mục KM',
            ),
            'Model' => 'QdPromotionCat',
            'DataPort' => 'promotioncat_port',
            'PageList' => 'promotioncat_list'
        ),
        'promotioncat_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_PromotionCat_List',
            'Caption' => array(
                'en-US' => 'Promotion Cat List',
                'vi-VN' => 'Promotion Cat List',
            ),
            'Model' => 'QdPromotionCat',
            'DataPort' => 'promotioncat_port'
        ),
        'manufactor' => array(
            'ParentId' => 'folder30',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Manufactor',
            'Caption' => array(
                'en-US' => 'Manufactor (All)',
                'vi-VN' => 'Hãng sản xuất (Tất cả)'
            ),
            'Model' => 'QdManufactor',
            'DataPort' => 'manufactor_port',
            'PageList' => 'manufactor_list'
        ),
        'manufactor_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Manufactor_list',
            'Caption' => array(
                'en-US' => 'Manufactor List',
                'vi-VN' => 'Manufactor List'
            ),
            'Model' => 'QdManufactor',
            'DataPort' => 'manufactor_port',
        ),
        'manufactor_df' => array(
            'ParentId' => 'folder30',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ManufactorDF',
            'Caption' => array(
                'en-US' => 'Manufactor DF',
                'vi-VN' => 'Hãng sản xuất DF'
            ),
            'Model' => 'QdManufactorDF',
            'DataPort' => 'manufactor_df_port',
            'PageList' => 'manufactor_df_list'
        ),
        'manufactor_df_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ManufactorDF_list',
            'Caption' => array(
                'en-US' => 'Manufactor DF List',
                'vi-VN' => 'Manufactor DF List'
            ),
            'Model' => 'QdManufactorDF',
            'DataPort' => 'manufactor_df_port',
        ),
        'manufactor_qa' => array(
            'ParentId' => 'folder30',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ManufactorQA',
            'Caption' => array(
                'en-US' => 'Manufactor QA',
                'vi-VN' => 'Hãng sản xuất QA'
            ),
            'Model' => 'QdManufactorQA',
            'DataPort' => 'manufactor_qa_port',
            'PageList' => 'manufactor_qa_list'
        ),
        'manufactor_qa_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ManufactorQA_list',
            'Caption' => array(
                'en-US' => 'Manufactor QA List',
                'vi-VN' => 'Manufactor QA List'
            ),
            'Model' => 'QdManufactorQA',
            'DataPort' => 'manufactor_qa_port',
        ),
        'manufactor_gd' => array(
            'ParentId' => 'folder30',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ManufactorGD',
            'Caption' => array(
                'en-US' => 'Manufactor GD',
                'vi-VN' => 'Hãng sản xuất GD'
            ),
            'Model' => 'QdManufactorGD',
            'DataPort' => 'manufactor_gd_port',
            'PageList' => 'manufactor_gd_list'
        ),
        'manufactor_gd_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ManufactorGD_list',
            'Caption' => array(
                'en-US' => 'Manufactor GD List',
                'vi-VN' => 'Manufactor GD List'
            ),
            'Model' => 'QdManufactorGD',
            'DataPort' => 'manufactor_gd_port',
        ),
        'object_task' => array(
            'ParentId' => 'folder70',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ObjectTask',
            'Caption' => array(
                'en-US' => 'ObjectTask',
                'vi-VN' => 'ObjectTask'
            ),
            'Model' => 'QdObjectTask',
            'DataPort' => 'object_task_port',
            'PageList' => 'object_task_list'
        ),
        'object_task_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ObjectTask_list',
            'Caption' => array(
                'en-US' => 'ObjectTask List',
                'vi-VN' => 'ObjectTask List'
            ),
            'Model' => 'QdObjectTask',
            'DataPort' => 'object_task_port',
        ),
        'imggrp' => array(
            'ParentId' => 'folder110',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ImgGrp',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_ImgGrp_list',
            'Caption' => array(
                'en-US' => 'Img Group List',
                'vi-VN' => 'Img Group List',
            ),
            'Model' => 'QdImgGrp',
            'DataPort' => 'imggrp_port',
        ),
        'size' => array(
	        'ParentId' => 'folder20',
	        'Active'=>true,
	        'PageType' => 'Card',
	        'Class'=>'Qdmvc_Page_Size',
	        'Caption' => array(
		        'en-US' => 'Size (QA & GD)',
		        'vi-VN' => 'Size (QA & GD)'
	        ),
	        'Model' => 'QdSize',
	        'DataPort' => 'size_port',
	        'PageList' => 'size_list'
        ),
        'size_list' => array(
	        'ParentId' => -1,
	        'Active'=>false,
	        'PageType' => 'List',
	        'Class'=>'Qdmvc_Page_Size_list',
	        'Caption' => array(
		        'en-US' => 'Size List',
		        'vi-VN' => 'Size List'
	        ),
	        'Model' => 'QdSize',
	        'DataPort' => 'size_port'
        ),
        'about' => array(
            'ParentId' => 'folder80',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_About',
            'Caption' => array(
                'en-US' => 'About Page',
                'vi-VN' => 'Bài giới thiệu'
            ),
            'Model' => 'QdAbout',
            'DataPort' => 'about_port',
            'PageList' => 'about_list'
        ),
        'about_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_About_list',
            'Caption' => array(
                'en-US' => 'About List',
                'vi-VN' => 'About List'
            ),
            'Model' => 'QdAbout',
            'DataPort' => 'about_port'
        ),
        'menu' => array(
            'ParentId' => 'folder70',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Menu',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Menu_list',
            'Caption' => array(
                'en-US' => 'Menu List',
                'vi-VN' => 'Menu List'
            ),
            'Model' => 'QdMenu',
            'DataPort' => 'menu_port'
        ),
        'pro2pro' => array(
            'ParentId' => 'product',
            'Active'=>false,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_Pro2Pro_Card',
            'Caption' => array(
                'en-US' => 'Linking Products',
                'vi-VN' => 'SP liên kết'
            ),
            'Model' => 'QdPro2Pro',
            'DataPort' => 'pro2pro_port',
            'PageList' => 'pro2pro_list'
        ),
        'pro2pro_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_pro2pro_list',
            'Caption' => array(
                'en-US' => 'List',
                'vi-VN' => 'List'
            ),
            'Model' => 'QdPro2Pro',
            'DataPort' => 'pro2pro_port'
        ),
        'pro2shop' => array(
            'ParentId' => 'product',
            'Active'=>false,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_Pro2Shop_Card',
            'Caption' => array(
                'en-US' => 'Products in Shop',
                'vi-VN' => 'SP thuộc cửa hàng'
            ),
            'Model' => 'QdPro2Shop',
            'DataPort' => 'pro2shop_port',
            'PageList' => 'pro2shop_list'
        ),
        'pro2shop_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_pro2shop_list',
            'Caption' => array(
                'en-US' => 'List',
                'vi-VN' => 'List'
            ),
            'Model' => 'QdPro2Shop',
            'DataPort' => 'pro2shop_port'
        ),
        'contact' => array(
            'ParentId' => 'folder90',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_Contact_Card',
            'Caption' => array(
                'en-US' => 'Contact',
                'vi-VN' => 'Liên hệ'
            ),
            'Model' => 'QdContact',
            'DataPort' => 'contact_port',
            'PageList' => 'contact_list'
        ),
        'contact_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Contact_list',
            'Caption' => array(
                'en-US' => 'List',
                'vi-VN' => 'List'
            ),
            'Model' => 'QdContact',
            'DataPort' => 'contact_port'
        ),
        'shop' => array(
            'ParentId' => 'folder90',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_Shop_Card',
            'Caption' => array(
                'en-US' => 'Shop',
                'vi-VN' => 'Cửa hàng'
            ),
            'Model' => 'QdShop',
            'DataPort' => 'shop_port',
            'PageList' => 'shop_list'
        ),
        'shop_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Shop_list',
            'Caption' => array(
                'en-US' => 'List',
                'vi-VN' => 'List'
            ),
            'Model' => 'QdShop',
            'DataPort' => 'shop_port'
        ),
        'subscriber' => array(
            'ParentId' => 'folder100',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_Subscriber_Card',
            'Caption' => array(
                'en-US' => 'Subscriber',
                'vi-VN' => 'Đăng ký nhận tin'
            ),
            'Model' => 'QdSubscriber',
            'DataPort' => 'subscriber_port',
            'PageList' => 'subscriber_list'
        ),
        'subscriber_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_Subscriber_list',
            'Caption' => array(
                'en-US' => 'List',
                'vi-VN' => 'List'
            ),
            'Model' => 'QdSubscriber',
            'DataPort' => 'subscriber_port'
        ),
        'csdl' => array(
            'ParentId' => 'folder70',
            'Active'=>true,
            'PageType' => 'Folder',
            'Caption' => array(
                'en-US' => 'CSDL Hành chính',
                'vi-VN' => 'CSDL Hành chính'
            ),
        ),
        'vndistrict' => array(
            'ParentId' => 'csdl',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_VnDistrict_Card',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_VnDistrict_list',
            'Caption' => array(
                'en-US' => 'List',
                'vi-VN' => 'List'
            ),
            'Model' => 'QdVnDistrict',
            'DataPort' => 'vndistrict_port'
        ),
        'vnprovince' => array(
            'ParentId' => 'csdl',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_VnProvince_Card',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_VnProvince_list',
            'Caption' => array(
                'en-US' => 'List',
                'vi-VN' => 'List'
            ),
            'Model' => 'QdVnProvince',
            'DataPort' => 'vnprovince_port'
        ),
        'vnward' => array(
            'ParentId' => 'csdl',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_VnWard_Card',
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
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_VnWard_list',
            'Caption' => array(
                'en-US' => 'List',
                'vi-VN' => 'List'
            ),
            'Model' => 'QdVnWard',
            'DataPort' => 'vnward_port'
        ),
        'navigation' => array(
            'ParentId' => '',
            'Active'=>false,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Navigation',
            'Caption' => array(
                'en-US' => 'Navigation',
                'vi-VN' => 'Navigation'
            ),
            'Model' => 'QdNote',
            'DataPort' => 'note_port',
            'PageList' => 'note_list'
        ),
        /*Folder*/
        'folder10' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Sản phẩm',
                'en-US' => 'Product'
            )
        ),
        'folder20' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Loại sản phẩm',
                'en-US' => 'Product Category'
            )
        ),
        'folder30' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Hãng sản xuất',
                'en-US' => 'Manufacturer'
            )
        ),
        'folder40' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Bán chạy & Khuyến mãi',
                'en-US' => 'BigSales & Promotion'
            )
        ),
        'folder50' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Cấu hình & Cài đặt',
                'en-US' => 'Setup & Options'
            )
        ),
        'folder60' => array(
            'ParentId' => 'folder50',
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Phân quyền',
                'en-US' => 'User Role'
            )
        ),
        'folder70' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Hệ thống',
                'en-US' => 'System'
            )
        ),
        'folder80' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Bài viết',
                'en-US' => 'Archives'
            )
        ),
        'folder90' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Cơ cấu VNC',
                'en-US' => 'VNC System'
            )
        ),
        'folder100' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Khách hàng',
                'en-US' => 'Customer'
            )
        ),
        'folder110' => array(
            'ParentId' => -1,
            'PageType' => 'Folder',
            'Active' => true,
            'Caption' => array(
                'vi-VN' => 'Khác',
                'en-US' => 'Other'
            )
        ),
    );
}