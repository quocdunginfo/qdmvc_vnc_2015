<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 15/02/2015
 * Time: 8:06 AM
 */
class Qdmvc_Page_Index {
    private static $index = array(
        'main' => array(
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
        'setup' => array(
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
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Note',
            'Caption' => array(
                'en' => 'Note',
                'vn' => 'Note'
            ),
            'Model' => 'QdNote',
            'DataPort' => 'note_port',
            'PageList' => 'note_list'
        ),
        'note_list' => array(
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
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Image',
            'Caption' => array(
                'en' => 'Image',
                'vn' => 'Image'
            ),
            'Model' => 'QdImage',
            'DataPort' => 'image_port',
            'PageList' => 'image_list'
        ),
        'image_list' => array(
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
            'Active'=>true,
            'PageType' => 'Card',
            'Class'=>'Qdmvc_Page_Post',
            'Caption' => array(
                'en' => 'Post',
                'vn' => 'Post'
            ),
            'Model' => 'Qdpost',
            'DataPort' => 'post_port',
            'PageList' => 'post_list'
        ),
        'post_list' => array(
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
        'navigation' => array(
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
    public static function getIndex()
    {
        return static::$index;
    }
    public static function buildJSONTree($lang='en')
    {
        $re = array();
        $count=1;
        foreach(static::$index as $key=>$config)
        {
            $tmp = array();
            $active = isset($config['Active'])?$config['Active']:true;
            if(!$active)
            {
                continue;
            }

            $text = isset($config['Caption']) && isset($config['Caption'][$lang])?$config['Caption'][$lang]:$key;
            $tmp['text'] = $text;
            $tmp['id'] = $count;
            $tmp['parentid'] = -1;
            $tmp['value'] = Qdmvc_Helper::getCompactPageListLink($key);

            array_push($re, $tmp);
            $count++;
        }
        return json_encode($re);
    }
}