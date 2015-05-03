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
                'en' => 'Page Main',
                'vn' => 'Trang chính',
            ),
            'Model' => 'QdNote',
            'DataPort' => 'note_port',
        ),
        'product_card' => array(
            'ParentId' => 'product_cat_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Product_Card',
            'Caption' => array(
                'en' => 'Product',
                'vn' => 'Sản phẩm',
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
                'en' => 'Product List',
                'vn' => 'Product List'
            ),
            'Model' => 'QdProduct',
            'DataPort' => 'product_port'
        ),
        'product_cat_card' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductCat_Card',
            'Caption' => array(
                'en' => 'Product Cat',
                'vn' => 'Loại sản phẩm',
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
                'en' => 'Product Cat List',
                'vn' => 'Product Cat List',
            ),
            'Model' => 'QdProductCat',
            'DataPort' => 'product_cat_port'
        ),
        'product_order_card' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductOrder_Card',
            'Caption' => array(
                'en' => 'Product Order',
                'vn' => 'Đơn đặt hàng (Open)',
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
                'en' => 'Product Order List',
                'vn' => 'Product Order List',
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
                'en' => 'Product Order Done',
                'vn' => 'Đơn đặt hàng (Done)',
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
                'en' => 'Product Order Done List',
                'vn' => 'Product Order Done List'
            ),
            'Model' => 'QdProductOrder',
            'DataPort' => 'product_order_port'
        ),
        'feedback_card' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Feedback_Card',
            'Caption' => array(
                'en' => 'Feedback',
                'vn' => 'Phản hồi KH (Open)',
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
                'en' => 'Feedback List',
                'vn' => 'Feedback List'
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
                'en' => 'Feedback Done',
                'vn' => 'Phản hồi KH (Done)',
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
                'en' => 'Feedback Done List',
                'vn' => 'Feedback Done List'
            ),
            'Model' => 'QdFeedback',
            'DataPort' => 'feedback_port'
        ),
        'product_setup' => array(
            'ParentId' => 'setup',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProductSetup',
            'Caption' => array(
                'en' => 'Product Setup',
                'vn' => 'Cấu hình Sản phẩm',
            ),
            'Model' => 'QdProductSetup',
            'DataPort' => 'product_setup_port'
        ),
        'theme_root_setup' => array(
            'ParentId' => 'setup',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=> 'Qdmvc_Page_TRootSetup',
            'Caption' => array(
                'en' => 'Theme Root Setup',
                'vn' => 'Theme Root Setup',
            ),
            'Model' => 'QdTRootSetup',
            'DataPort' => 'theme/root_setup_port'
        ),
        'setup' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Setup',
            'Caption' => array(
                'en' => 'General Setup',
                'vn' => 'Cấu hình chung',
            ),
            'Model' => 'QdSetup',
            'DataPort' => 'setup_port'
        ),
        'note' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Note',
            'Caption' => array(
                'en' => 'Note',
                'vn' => 'Ghi chú'
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
                'en' => 'Note List',
                'vn' => 'Note List'
            ),
            'Model' => 'QdNote',
            'DataPort' => 'note_port'
        ),
        'image' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Image',
            'Caption' => array(
                'en' => 'Image',
                'vn' => 'Hình ảnh'
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
                'en' => 'Image List',
                'vn' => 'Image List'
            ),
            'Model' => 'QdImage',
            'DataPort' => 'image_port'
        ),
        'log' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Log',
            'Caption' => array(
                'en' => 'Log',
                'vn' => 'Log'
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
                'en' => 'Log List',
                'vn' => 'Log List'
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
                'en' => 'Best Choice Item',
                'vn' => 'Best Choice Item'
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
                'en' => 'Best Choice Item List',
                'vn' => 'Best Choice Item List'
            ),
            'Model' => 'QdBestChoiceItem',
            'DataPort' => 'bestchoiceitem_port'
        ),
        'bestchoicecat_card' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_BestChoiceCat',
            'Caption' => array(
                'en' => 'Best Choice Cat',
                'vn' => 'Best Choice Cat'
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
                'en' => 'Best Choice Cat List',
                'vn' => 'Best Choice Cat List'
            ),
            'Model' => 'QdBestChoiceCat',
            'DataPort' => 'bestchoicecat_port'
        ),
        'postcat_card' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_PostCat',
            'Caption' => array(
                'en' => 'Post Cat',
                'vn' => 'Post Cat'
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
                'en' => 'Post Cat List',
                'vn' => 'Post Cat List'
            ),
            'Model' => 'QdPostCat',
            'DataPort' => 'postcat_port'
        ),
        'post_card' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Post',
            'Caption' => array(
                'en' => 'Post',
                'vn' => 'Post'
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
                'en' => 'Post List',
                'vn' => 'Post List'
            ),
            'Model' => 'QdPost',
            'DataPort' => 'post_port'
        ),
        'widgetnavcat' => array(
            'ParentId' => -1,
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_WidgetNavCat',
            'Caption' => array(
                'en' => 'Widget Nav Cat',
                'vn' => 'Widget Nav Cat'
            ),
            'Model' => 'QdWidgetNavCat',
            'DataPort' => 'postcat_port',
            'PageList' => 'widgetnavcat_list'
        ),
        'widgetnavcat_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_WidgetNavCat_list',
            'Caption' => array(
                'en' => 'Widget Nav Cat List',
                'vn' => 'Widget Nav Cat List'
            ),
            'Model' => 'QdWidgetNavCat',
            'DataPort' => 'postcat_port',
        ),
        'widgetnav' => array(
            'ParentId' => 'widgetnavcat',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_WidgetNav',
            'Caption' => array(
                'en' => 'Widget Nav',
                'vn' => 'Widget Nav'
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
                'en' => 'Widget Nav List',
                'vn' => 'Widget Nav List'
            ),
            'Model' => 'QdWidgetNav',
            'DataPort' => 'widgetnav_port',
        ),
        'progrp' => array(
            'ParentId' => 'product_cat_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProGrp_Card',
            'Caption' => array(
                'en' => 'Product-Group',
                'vn' => 'SP-Nhóm'
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
                'en' => 'Product Group List',
                'vn' => 'Product Group List'
            ),
            'Model' => 'QdProGrp',
            'DataPort' => 'progrp_port',
        ),
        'probigsale' => array(
            'ParentId' => 'product_cat_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProBigSale_Card',
            'Caption' => array(
                'en' => 'BigSale Products',
                'vn' => 'Các SP BigSale'
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
                'en' => 'BigSale Products',
                'vn' => 'BigSale Products'
            ),
            'Model' => 'QdProBigSale',
            'DataPort' => 'probigsale_port',
        ),
        'bigsalecat' => array(
            'ParentId' => 'product_cat_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_BigSaleCat_Card',
            'Caption' => array(
                'en' => 'BigSale Cat',
                'vn' => 'BigSale Cat',
            ),
            'Model' => 'QdBigSaleCat',
            'DataPort' => 'product_cat_port',
            'PageList' => 'bigsalecat_list'
        ),
        'bigsalecat_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_BigSaleCat_List',
            'Caption' => array(
                'en' => 'BigSale Cat List',
                'vn' => 'BigSale Cat List',
            ),
            'Model' => 'QdBigSaleCat',
            'DataPort' => 'product_cat_port'
        ),
        'propromotion' => array(
            'ParentId' => 'product_cat_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_ProPromotion_Card',
            'Caption' => array(
                'en' => 'Promotion Products',
                'vn' => 'Các SP KM'
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
                'en' => 'Promotion Products',
                'vn' => 'Promotion Products'
            ),
            'Model' => 'QdProPromotion',
            'DataPort' => 'progrp_port',
        ),
        'promotioncat' => array(
            'ParentId' => 'product_cat_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_PromotionCat_Card',
            'Caption' => array(
                'en' => 'Promotion Cat',
                'vn' => 'Promotion Cat',
            ),
            'Model' => 'QdPromotionCat',
            'DataPort' => 'product_cat_port',
            'PageList' => 'promotioncat_list'
        ),
        'promotioncat_list' => array(
            'ParentId' => -1,
            'Active'=>false,
            'PageType' => 'List',
            'Class'=>'Qdmvc_Page_PromotionCat_List',
            'Caption' => array(
                'en' => 'Promotion Cat List',
                'vn' => 'Promotion Cat List',
            ),
            'Model' => 'QdPromotionCat',
            'DataPort' => 'product_cat_port'
        ),
        'manufactor' => array(
            'ParentId' => 'product_cat_card',
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Manufactor',
            'Caption' => array(
                'en' => 'Manufactor',
                'vn' => 'Hãng SX'
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
                'en' => 'Manufactor List',
                'vn' => 'Manufactor List'
            ),
            'Model' => 'QdManufactor',
            'DataPort' => 'manufactor_port',
        ),
        'navigation' => array(
            'ParentId' => '',
            'Active'=>false,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Navigation',
            'Caption' => array(
                'en' => 'Navigation',
                'vn' => 'Navigation'
            ),
            'Model' => 'QdNote',
            'DataPort' => 'note_port',
            'PageList' => 'note_list'
        ),
    );
}