<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 03/05/2015
 * Time: 9:48 AM
 */
class Qdmvc_Page_IndexCustomMenu
{
    public static function getIndex()
    {
        return static::getMenu();
    }
    private static function getMenuFolder(){

        return array(
            /*Folder*/
            'folder10' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Sản phẩm',
                    'en-US' => 'Product'
                ),
                'Order' => 100
            ),
            'folder20' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Loại sản phẩm',
                    'en-US' => 'Product Category'
                ),
                'Order' => 200
            ),
            'folder30' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Hãng sản xuất',
                    'en-US' => 'Manufacturer'
                ),
                'Order' => 300
            ),
            'folder40' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Bán chạy & Khuyến mãi',
                    'en-US' => 'BigSales & Promotion'
                ),
                'Order' => 400
            ),
            'folder90' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Cơ cấu VNC',
                    'en-US' => 'VNC System'
                ),
                'Order' => 500
            ),
            'folder100' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Khách hàng',
                    'en-US' => 'Customer'
                ),
                'Order' => 600
            ),
            'folder120' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Định giá',
                    'en-US' => 'Định giá'
                ),
                'Order' => 700
            ),
            'folder130' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Kho bãi',
                    'en-US' => 'Warehouse Mgmt'
                ),
                'Order' => 800
            ),
            'folder80' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Bài viết',
                    'en-US' => 'Archives'
                ),
                'Order' => 900
            ),
        );
    }
    private static function getMenu()
    {
        $obj = array(
            'main' => array(
                'ParentId' => -1,
                'Active' => false,
                'Class' => 'Qdmvc_Page_Main',
                'Caption' => array(
                    'en-US' => 'Page Main',
                    'vi-VN' => 'Trang chính',
                ),
                'Model' => 'QdNote',
                'DataPort' => 'note_port',
            ),
            'product' => array(
                'ParentId' => 'folder10',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Product_Card',
                'Caption' => array(
                    'en-US' => 'Product (All)',
                    'vi-VN' => 'SP (Tất cả)',
                ),
                'Model' => 'QdProduct',
                'DataPort' => 'product_port',
                'PageList' => 'product_list'
            ),
            'product_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Product_List',
                'Caption' => array(
                    'en-US' => 'Product List',
                    'vi-VN' => 'Product List'
                ),
                'Model' => 'QdProduct',
                'DataPort' => 'product_port'
            ),
            /*
            'product_pg2' => array(
                'ParentId' => 'folder10',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Product_PG2_Card',
                'Caption' => array(
                    'en-US' => 'Product (PG2)',
                    'vi-VN' => 'Sản phẩm (PG2)',
                ),
                'Model' => 'QdProductPG2',
                'DataPort' => 'product_pg2_port',
                'PageList' => 'product_pg2_list'
            ),
            'product_pg2_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Product_PG2_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductPG2',
                'DataPort' => 'product_pg2_port'
            ),
            */
            'product_pg2_dcn' => array(
                'ParentId' => 'folder10',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Product_PG2_DCN_Card',
                'Caption' => array(
                    'en-US' => 'SP Đồ công nghệ (PG2)',
                    'vi-VN' => 'SP Đồ công nghệ (PG2)',
                ),
                'Model' => 'QdProductPG2DCN',
                'DataPort' => 'product_pg2_dcn_port',
                'PageList' => 'product_pg2_dcn_list'
            ),
            'product_pg2_dcn_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Product_PG2_DCN_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductPG2DCN',
                'DataPort' => 'product_pg2_dcn_port'
            ),
            'product_pg2_xe' => array(
                'ParentId' => 'folder10',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Product_PG2_XE_Card',
                'Caption' => array(
                    'en-US' => 'SP Xe (PG2)',
                    'vi-VN' => 'SP Xe (PG2)',
                ),
                'Model' => 'QdProductPG2XE',
                'DataPort' => 'product_pg2_xe_port',
                'PageList' => 'product_pg2_xe_list'
            ),
            'product_pg2_xe_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Product_PG2_XE_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductPG2XE',
                'DataPort' => 'product_pg2_xe_port'
            ),
            /*
            'product_pg3' => array(
                'ParentId' => 'folder10',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Product_PG3_Card',
                'Caption' => array(
                    'en-US' => 'Product (PG3)',
                    'vi-VN' => 'Sản phẩm (PG3)',
                ),
                'Model' => 'QdProductPG3',
                'DataPort' => 'product_pg3_port',
                'PageList' => 'product_pg3_list'
            ),
            'product_pg3_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Product_PG3_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductPG3',
                'DataPort' => 'product_pg3_port'
            ),
            */
            'product_dt' => array(
                'ParentId' => 'product_pg2_dcn',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductDT_Card',
                'Caption' => array(
                    'en-US' => 'Product DT',
                    'vi-VN' => 'SP Điện thoại',
                ),
                'Model' => 'QdProductDT',
                'DataPort' => 'product_dt_port',
                'PageList' => 'product_dt_list'
            ),
            'product_dt_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductDT_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductDT',
                'DataPort' => 'product_dt_port'
            ),
            'product_lt' => array(
                'ParentId' => 'product_pg2_dcn',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductLT_Card',
                'Caption' => array(
                    'en-US' => 'Product LT',
                    'vi-VN' => 'SP Laptop',
                ),
                'Model' => 'QdProductLT',
                'DataPort' => 'product_lt_port',
                'PageList' => 'product_lt_list'
            ),
            'product_lt_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductLT_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductLT',
                'DataPort' => 'product_lt_port'
            ),
            'product_pk' => array(
                'ParentId' => 'product_pg2_dcn',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductPK_Card',
                'Caption' => array(
                    'en-US' => 'Product PK',
                    'vi-VN' => 'SP Phụ kiện',
                ),
                'Model' => 'QdProductPK',
                'DataPort' => 'product_pk_port',
                'PageList' => 'product_pk_list'
            ),
            'product_pk_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductPK_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductPK',
                'DataPort' => 'product_pk_port'
            ),
            'product_xedap' => array(
                'ParentId' => 'product_pg2_xe',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductXEDAP_Card',
                'Caption' => array(
                    'en-US' => 'Product XEDAP',
                    'vi-VN' => 'SP Xe đạp',
                ),
                'Model' => 'QdProductXEDAP',
                'DataPort' => 'product_xedap_port',
                'PageList' => 'product_xedap_list'
            ),
            'product_xedap_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductXEDAP_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductXEDAP',
                'DataPort' => 'product_xedap_port'
            ),
            'product_xemay' => array(
                'ParentId' => 'product_pg2_xe',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductXEMAY_Card',
                'Caption' => array(
                    'en-US' => 'Product XEMAY',
                    'vi-VN' => 'SP Xe máy',
                ),
                'Model' => 'QdProductXEMAY',
                'DataPort' => 'product_xemay_port',
                'PageList' => 'product_xemay_list'
            ),
            'product_xemay_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductXEMAY_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductXEMAY',
                'DataPort' => 'product_xemay_port'
            ),
            'product_xehoi' => array(
                'ParentId' => 'product_pg2_xe',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductXEHOI_Card',
                'Caption' => array(
                    'en-US' => 'Product XEHOI',
                    'vi-VN' => 'SP Xe hơi',
                ),
                'Model' => 'QdProductXEHOI',
                'DataPort' => 'product_xehoi_port',
                'PageList' => 'product_xehoi_list'
            ),
            'product_xehoi_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductXEHOI_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductXEHOI',
                'DataPort' => 'product_xehoi_port'
            ),
            'product_dohieu' => array(
                'ParentId' => 'folder10',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Product_DOHIEU_Card',
                'Caption' => array(
                    'en-US' => 'Product DOHIEU',
                    'vi-VN' => 'SP Đồ hiệu',
                ),
                'Model' => 'QdProductDOHIEU',
                'DataPort' => 'product_dohieu_port',
                'PageList' => 'product_dohieu_list'
            ),
            'product_dohieu_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Product_DOHIEU_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductDOHIEU',
                'DataPort' => 'product_dohieu_port'
            ),
            'product_pg2_thietbi' => array(
                'ParentId' => 'folder10',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Product_PG2_THIETBI_Card',
                'Caption' => array(
                    'en-US' => 'SP Thiết bị (PG2)',
                    'vi-VN' => 'SP Thiết bị (PG2)',
                ),
                'Model' => 'QdProductPG2THIETBI',
                'DataPort' => 'product_pg2_thietbi_port',
                'PageList' => 'product_pg2_thietbi_list'
            ),
            'product_pg2_thietbi_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Product_PG2_THIETBI_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductPG2THIETBI',
                'DataPort' => 'product_pg2_thietbi_port'
            ),
            'product_nuochoa' => array(
                'ParentId' => 'product_dohieu',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductNUOCHOA_Card',
                'Caption' => array(
                    'en-US' => 'Product NUOCHOA',
                    'vi-VN' => 'SP Nước hoa',
                ),
                'Model' => 'QdProductNUOCHOA',
                'DataPort' => 'product_nuochoa_port',
                'PageList' => 'product_nuochoa_list'
            ),
            'product_nuochoa_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductNUOCHOA_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductNUOCHOA',
                'DataPort' => 'product_nuochoa_port'
            ),
            'product_thoitrang' => array(
                'ParentId' => 'product_dohieu',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductTHOITRANG_Card',
                'Caption' => array(
                    'en-US' => 'Product Clothes',
                    'vi-VN' => 'SP Quần áo',
                ),
                'Model' => 'QdProductTHOITRANG',
                'DataPort' => 'product_thoitrang_port',
                'PageList' => 'product_thoitrang_list'
            ),
            'product_thoitrang_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductTHOITRANG_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductTHOITRANG',
                'DataPort' => 'product_thoitrang_port'
            ),
            'product_dodung' => array(
                'ParentId' => 'product_pg2_thietbi',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductDODUNG_Card',
                'Caption' => array(
                    'en-US' => 'Product DODUNG',
                    'vi-VN' => 'SP Đồ dùng',
                ),
                'Model' => 'QdProductDODUNG',
                'DataPort' => 'product_dodung_port',
                'PageList' => 'product_dodung_list'
            ),
            'product_dodung_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductDODUNG_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductDODUNG',
                'DataPort' => 'product_dodung_port'
            ),
            'product_ptst' => array(
                'ParentId' => 'product_pg2_thietbi',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductPTST_Card',
                'Caption' => array(
                    'en-US' => 'Product PTST',
                    'vi-VN' => 'SP Phong thủy - Sưu tập',
                ),
                'Model' => 'QdProductPTST',
                'DataPort' => 'product_ptst_port',
                'PageList' => 'product_ptst_list'
            ),
            'product_ptst_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductPTST_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductPTST',
                'DataPort' => 'product_ptst_port'
            ),
            'product_other' => array(
                'ParentId' => 'product_pg2_thietbi',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductOTHER_Card',
                'Caption' => array(
                    'en-US' => 'Product OTHER',
                    'vi-VN' => 'SP Khác',
                ),
                'Model' => 'QdProductOTHER',
                'DataPort' => 'product_other_port',
                'PageList' => 'product_other_list'
            ),
            'product_other_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductOTHER_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductOTHER',
                'DataPort' => 'product_other_port'
            ),
            'product_dhmk' => array(
                'ParentId' => 'product_dohieu',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductDHMK_Card',
                'Caption' => array(
                    'en-US' => 'Product DHMK',
                    'vi-VN' => 'SP Phụ kiện thời trang',
                ),
                'Model' => 'QdProductDHMK',
                'DataPort' => 'product_dhmk_port',
                'PageList' => 'product_dhmk_list'
            ),
            'product_dhmk_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductDHMK_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductDHMK',
                'DataPort' => 'product_dhmk_port'
            ),
            'product_mtb' => array(
                'ParentId' => 'product_pg2_dcn',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductMTB_Card',
                'Caption' => array(
                    'en-US' => 'Product Tablet',
                    'vi-VN' => 'SP Máy tính bảng',
                ),
                'Model' => 'QdProductMTB',
                'DataPort' => 'product_mtb_port',
                'PageList' => 'product_mtb_list'
            ),
            'product_mtb_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductMTB_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProductMTB',
                'DataPort' => 'product_mtb_port'
            ),
            'product_cat_card' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCat_Card',
                'Caption' => array(
                    'en-US' => 'Product Category (All)',
                    'vi-VN' => 'LSP (Tất cả)',
                ),
                'Model' => 'QdProductCat',
                'DataPort' => 'product_cat_port',
                'PageList' => 'product_cat_list'
            ),
            'product_cat_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCat_List',
                'Caption' => array(
                    'en-US' => 'Product Cat List',
                    'vi-VN' => 'Product Cat List',
                ),
                'Model' => 'QdProductCat',
                'DataPort' => 'product_cat_port'
            ),
            'product_cat_pg2_dcn_card' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCat_PG2_DCN_Card',
                'Caption' => array(
                    'en-US' => 'LSP Đồ công nghệ (PG2)',
                    'vi-VN' => 'LSP Đồ công nghệ (PG2)',
                ),
                'Model' => 'QdProductCatPG2DCN',
                'DataPort' => 'product_cat_pg2_dcn_port',
                'PageList' => 'product_cat_pg2_dcn_list'
            ),
            'product_cat_pg2_dcn_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCat_PG2_DCN_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatPG2DCN',
                'DataPort' => 'product_cat_pg2_dcn_port'
            ),
            'product_cat_pg2_xe_card' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCat_PG2_XE_Card',
                'Caption' => array(
                    'en-US' => 'LSP Xe (PG2)',
                    'vi-VN' => 'LSP Xe (PG2)',
                ),
                'Model' => 'QdProductCatPG2XE',
                'DataPort' => 'product_cat_pg2_xe_port',
                'PageList' => 'product_cat_pg2_xe_list'
            ),
            'product_cat_pg2_xe_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCat_PG2_XE_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatPG2XE',
                'DataPort' => 'product_cat_pg2_xe_port'
            ),
            'product_cat_dohieu' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCat_DOHIEU_Card',
                'Caption' => array(
                    'en-US' => 'LSP Đồ hiệu',
                    'vi-VN' => 'LSP Đồ hiệu',
                ),
                'Model' => 'QdProductCatDOHIEU',
                'DataPort' => 'product_cat_dohieu_port',
                'PageList' => 'product_cat_dohieu_list'
            ),
            'product_cat_dohieu_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCat_DOHIEU_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatDOHIEU',
                'DataPort' => 'product_cat_dohieu_port'
            ),
            'product_cat_pg2_thietbi' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCat_PG2_THIETBI_Card',
                'Caption' => array(
                    'en-US' => 'LSP Thiết bị (PG2)',
                    'vi-VN' => 'LSP Thiết bị (PG2)',
                ),
                'Model' => 'QdProductCatPG2THIETBI',
                'DataPort' => 'product_cat_pg2_thietbi_port',
                'PageList' => 'product_cat_pg2_thietbi_list'
            ),
            'product_cat_pg2_thietbi_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCat_PG2_THIETBI_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatPG2THIETBI',
                'DataPort' => 'product_cat_pg2_thietbi_port'
            ),
            /*
            'product_cat_pg2_card' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCat_PG2_Card',
                'Caption' => array(
                    'en-US' => 'Product Category (PG2)',
                    'vi-VN' => 'Loại sản phẩm (PG2)',
                ),
                'Model' => 'QdProductCatPG2',
                'DataPort' => 'product_cat_pg2_port',
                'PageList' => 'product_cat_pg2_list'
            ),
            'product_cat_pg2_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCat_PG2_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatPG2',
                'DataPort' => 'product_cat_pg2_port'
            ),
            */
            /*'product_cat_pg3_card' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCat_PG3_Card',
                'Caption' => array(
                    'en-US' => 'Product Category (PG3)',
                    'vi-VN' => 'Loại sản phẩm (PG3)',
                ),
                'Model' => 'QdProductCatPG3',
                'DataPort' => 'product_cat_pg3_port',
                'PageList' => 'product_cat_pg3_list'
            ),
            'product_cat_pg3_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCat_PG3_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatPG3',
                'DataPort' => 'product_cat_pg3_port'
            ),
            */
            'product_cat_dt' => array(
                'ParentId' => 'product_cat_pg2_dcn_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatDT_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat Phone',
                    'vi-VN' => 'LSP Điện thoại',
                ),
                'Model' => 'QdProductCatDT',
                'DataPort' => 'product_cat_dt_port',
                'PageList' => 'product_cat_dt_list'
            ),
            'product_cat_dt_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatDT_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatDT',
                'DataPort' => 'product_cat_dt_port'
            ),
            'product_cat_mtb' => array(
                'ParentId' => 'product_cat_pg2_dcn_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatMTB_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat Tablet',
                    'vi-VN' => 'LSP Máy tính bảng',
                ),
                'Model' => 'QdProductCatMTB',
                'DataPort' => 'product_cat_mtb_port',
                'PageList' => 'product_cat_mtb_list'
            ),
            'product_cat_mtb_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatMTB_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatMTB',
                'DataPort' => 'product_cat_mtb_port'
            ),
            'product_cat_lt' => array(
                'ParentId' => 'product_cat_pg2_dcn_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatLT_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat Laptop',
                    'vi-VN' => 'LSP Laptop',
                ),
                'Model' => 'QdProductCatLT',
                'DataPort' => 'product_cat_lt_port',
                'PageList' => 'product_cat_lt_list'
            ),
            'product_cat_lt_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatLT_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatLT',
                'DataPort' => 'product_cat_lt_port'
            ),
            'product_cat_pk' => array(
                'ParentId' => 'product_cat_pg2_dcn_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatPK_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat PK',
                    'vi-VN' => 'LSP Phụ kiện',
                ),
                'Model' => 'QdProductCatPK',
                'DataPort' => 'product_cat_pk_port',
                'PageList' => 'product_cat_pk_list'
            ),
            'product_cat_pk_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatPK_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatPK',
                'DataPort' => 'product_cat_pk_port'
            ),
            'product_cat_xedap' => array(
                'ParentId' => 'product_cat_pg2_xe_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatXEDAP_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat XEDAP',
                    'vi-VN' => 'LSP Xe đạp',
                ),
                'Model' => 'QdProductCatXEDAP',
                'DataPort' => 'product_cat_xedap_port',
                'PageList' => 'product_cat_xedap_list'
            ),
            'product_cat_xedap_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatXEDAP_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatXEDAP',
                'DataPort' => 'product_cat_xedap_port'
            ),
            'product_cat_xemay' => array(
                'ParentId' => 'product_cat_pg2_xe_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatXEMAY_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat XEMAY',
                    'vi-VN' => 'LSP Xe máy',
                ),
                'Model' => 'QdProductCatXEMAY',
                'DataPort' => 'product_cat_xemay_port',
                'PageList' => 'product_cat_xemay_list'
            ),
            'product_cat_xemay_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatXEMAY_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatXEMAY',
                'DataPort' => 'product_cat_xemay_port'
            ),
            'product_cat_xehoi' => array(
                'ParentId' => 'product_cat_pg2_xe_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatXEHOI_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat XEHOI',
                    'vi-VN' => 'LSP Xe hơi',
                ),
                'Model' => 'QdProductCatXEHOI',
                'DataPort' => 'product_cat_xehoi_port',
                'PageList' => 'product_cat_xehoi_list'
            ),
            'product_cat_xehoi_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatXEHOI_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatXEHOI',
                'DataPort' => 'product_cat_xehoi_port'
            ),
            'product_cat_nuochoa' => array(
                'ParentId' => 'product_cat_dohieu',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatNUOCHOA_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat NUOCHOA',
                    'vi-VN' => 'LSP Nước hoa',
                ),
                'Model' => 'QdProductCatNUOCHOA',
                'DataPort' => 'product_cat_nuochoa_port',
                'PageList' => 'product_cat_nuochoa_list'
            ),
            'product_cat_nuochoa_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatNUOCHOA_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatNUOCHOA',
                'DataPort' => 'product_cat_nuochoa_port'
            ),
            'product_cat_thoitrang' => array(
                'ParentId' => 'product_cat_dohieu',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatTHOITRANG_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat THOITRANG',
                    'vi-VN' => 'LSP Quần áo',
                ),
                'Model' => 'QdProductCatTHOITRANG',
                'DataPort' => 'product_cat_thoitrang_port',
                'PageList' => 'product_cat_thoitrang_list'
            ),
            'product_cat_thoitrang_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatTHOITRANG_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatTHOITRANG',
                'DataPort' => 'product_cat_thoitrang_port'
            ),
            'product_cat_dhmk' => array(
                'ParentId' => 'product_cat_dohieu',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatDHMK_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat DHMK',
                    'vi-VN' => 'LSP Phụ kiện thời trang',
                ),
                'Model' => 'QdProductCatDHMK',
                'DataPort' => 'product_cat_dhmk_port',
                'PageList' => 'product_cat_dhmk_list'
            ),
            'product_cat_dhmk_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatDHMK_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatDHMK',
                'DataPort' => 'product_cat_dhmk_port'
            ),
            'product_cat_dodung' => array(
                'ParentId' => 'product_cat_pg2_thietbi',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatDODUNG_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat DODUNG',
                    'vi-VN' => 'LSP Đồ dùng',
                ),
                'Model' => 'QdProductCatDODUNG',
                'DataPort' => 'product_cat_dodung_port',
                'PageList' => 'product_cat_dodung_list'
            ),
            'product_cat_dodung_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatDODUNG_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatDODUNG',
                'DataPort' => 'product_cat_dodung_port'
            ),
            'product_cat_ptst' => array(
                'ParentId' => 'product_cat_pg2_thietbi',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatPTST_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat PTST',
                    'vi-VN' => 'LSP Phong thủy - Sưu tập',
                ),
                'Model' => 'QdProductCatPTST',
                'DataPort' => 'product_cat_ptst_port',
                'PageList' => 'product_cat_ptst_list'
            ),
            'product_cat_ptst_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatPTST_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatPTST',
                'DataPort' => 'product_cat_ptst_port'
            ),
            'product_cat_other' => array(
                'ParentId' => 'product_cat_pg2_thietbi',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatOTHER_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat OTHER',
                    'vi-VN' => 'LSP Khác',
                ),
                'Model' => 'QdProductCatOTHER',
                'DataPort' => 'product_cat_other_port',
                'PageList' => 'product_cat_other_list'
            ),
            'product_cat_other_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatOTHER_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List',
                ),
                'Model' => 'QdProductCatOTHER',
                'DataPort' => 'product_cat_other_port'
            ),
            'product_order_card' => array(
                'ParentId' => 'folder100',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductOrder_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductOrder_List',
                'Caption' => array(
                    'en-US' => 'Product Order List',
                    'vi-VN' => 'Product Order List',
                ),
                'Model' => 'QdProductOrder',
                'DataPort' => 'product_order_port'
            ),
            'product_order_done_card' => array(
                'ParentId' => 'product_order_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductOrderDone_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductOrderDone_List',
                'Caption' => array(
                    'en-US' => 'Product Order Done List',
                    'vi-VN' => 'Product Order Done List'
                ),
                'Model' => 'QdProductOrder',
                'DataPort' => 'product_order_port'
            ),
            'feedback_card' => array(
                'ParentId' => 'folder100',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Feedback_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Feedback_List',
                'Caption' => array(
                    'en-US' => 'Feedback List',
                    'vi-VN' => 'Feedback List'
                ),
                'Model' => 'QdFeedback',
                'DataPort' => 'feedback_port'
            ),
            'feedback_done_card' => array(
                'ParentId' => 'feedback_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_FeedbackDone_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_FeedbackDone_List',
                'Caption' => array(
                    'en-US' => 'Feedback Done List',
                    'vi-VN' => 'Feedback Done List'
                ),
                'Model' => 'QdFeedback',
                'DataPort' => 'feedback_port'
            ),

            'theme_root_setup_mobile' => array(
                'ParentId' => 'theme_root_setup',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_TRootSetupMobile',
                'Caption' => array(
                    'en-US' => 'Theme Root Setup (Mobile)',
                    'vi-VN' => 'Theme Root Setup (Mobile)',
                ),
                'Model' => 'QdTRootSetupMobile',
                'DataPort' => 'theme/root_setup_mobile_port'
            ),
            'bestchoicecat_card' => array(
                'ParentId' => 'folder110',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_BestChoiceCat',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_BestChoiceCat_list',
                'Caption' => array(
                    'en-US' => 'Best Choice Cat List',
                    'vi-VN' => 'Best Choice Cat List'
                ),
                'Model' => 'QdBestChoiceCat',
                'DataPort' => 'bestchoicecat_port'
            ),
            'bestchoiceitem_card' => array(
                'ParentId' => 'bestchoicecat_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_BestChoiceItem',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_BestChoiceItem_list',
                'Caption' => array(
                    'en-US' => 'Best Choice Item List',
                    'vi-VN' => 'Best Choice Item List'
                ),
                'Model' => 'QdBestChoiceItem',
                'DataPort' => 'bestchoiceitem_port'
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
                'ParentId' => 'bigsalecat',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProBigSale_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProBigSale_List',
                'Caption' => array(
                    'en-US' => 'BigSale Products',
                    'vi-VN' => 'BigSale Products'
                ),
                'Model' => 'QdProBigSale',
                'DataPort' => 'probigsale_port',
            ),
            'bigsalecat' => array(
                'ParentId' => 'folder40',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_BigSaleCat_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_BigSaleCat_List',
                'Caption' => array(
                    'en-US' => 'BigSale Cat List',
                    'vi-VN' => 'BigSale Cat List',
                ),
                'Model' => 'QdBigSaleCat',
                'DataPort' => 'bigsalecat_port'
            ),
            'propromotion' => array(
                'ParentId' => 'folder40',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProPromotion_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProPromotion_List',
                'Caption' => array(
                    'en-US' => 'Promotion Products',
                    'vi-VN' => 'Promotion Products'
                ),
                'Model' => 'QdProPromotion',
                'DataPort' => 'progrp_port',
            ),
            'promotioncat' => array(
                'ParentId' => 'folder40',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_PromotionCat_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_PromotionCat_List',
                'Caption' => array(
                    'en-US' => 'Promotion Cat List',
                    'vi-VN' => 'Promotion Cat List',
                ),
                'Model' => 'QdPromotionCat',
                'DataPort' => 'promotioncat_port'
            ),
            'manufactor' => array(
                'ParentId' => 'folder30',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Manufactor',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Manufactor_list',
                'Caption' => array(
                    'en-US' => 'Manufactor List',
                    'vi-VN' => 'Manufactor List'
                ),
                'Model' => 'QdManufactor',
                'DataPort' => 'manufactor_port',
            ),
            'size' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Size',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Size_list',
                'Caption' => array(
                    'en-US' => 'Size List',
                    'vi-VN' => 'Size List'
                ),
                'Model' => 'QdSize',
                'DataPort' => 'size_port'
            ),
            'procat2manusel' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Procat2ManuSel_Card',
                'Caption' => array(
                    'en-US' => 'Product Cat - Manufactor',
                    'vi-VN' => 'LSP - Hãng SX'
                ),
                'Model' => 'QdProcat2ManuSel',
                'DataPort' => 'procat2manusel_port',
                'PageList' => 'procat2manusel_list'
            ),
            'procat2manusel_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Procat2ManuSel_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProcat2ManuSel',
                'DataPort' => 'procat2manusel_port'
            ),
            'about' => array(
                'ParentId' => 'folder80',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_About',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_About_list',
                'Caption' => array(
                    'en-US' => 'About List',
                    'vi-VN' => 'About List'
                ),
                'Model' => 'QdAbout',
                'DataPort' => 'about_port'
            ),

            'pro2pro' => array(
                'ParentId' => 'product',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Pro2Pro_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_pro2pro_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdPro2Pro',
                'DataPort' => 'pro2pro_port'
            ),
            'pro2pro_pg2' => array(
                'ParentId' => 'product',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Pro2Pro_PG2_Card',
                'Caption' => array(
                    'en-US' => 'Linking Products',
                    'vi-VN' => 'SP liên kết'
                ),
                'Model' => 'QdPro2ProPG2',
                'DataPort' => 'pro2pro_pg2_port',
                'PageList' => 'pro2pro_pg2_list'
            ),
            'pro2pro_pg2_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Pro2Pro_PG2_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdPro2ProPG2',
                'DataPort' => 'pro2pro_pg2_port'
            ),
            'pro2pro_pg2_dcn' => array(
                'ParentId' => 'product',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Pro2Pro_PG2_DCN_Card',
                'Caption' => array(
                    'en-US' => 'Linking Products',
                    'vi-VN' => 'SP liên kết'
                ),
                'Model' => 'QdPro2ProPG2DCN',
                'DataPort' => 'pro2pro_pg2_dcn_port',
                'PageList' => 'pro2pro_pg2_dcn_list'
            ),
            'pro2pro_pg2_dcn_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Pro2Pro_PG2_DCN_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdPro2ProPG2DCN',
                'DataPort' => 'pro2pro_pg2_dcn_port'
            ),
            'pro2pro_pg2_xe' => array(
                'ParentId' => 'product',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Pro2Pro_PG2_XE_Card',
                'Caption' => array(
                    'en-US' => 'Linking Products',
                    'vi-VN' => 'SP liên kết'
                ),
                'Model' => 'QdPro2ProPG2XE',
                'DataPort' => 'pro2pro_pg2_xe_port',
                'PageList' => 'pro2pro_pg2_xe_list'
            ),
            'pro2pro_pg2_xe_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Pro2Pro_PG2_XE_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdPro2ProPG2XE',
                'DataPort' => 'pro2pro_pg2_xe_port'
            ),
            'pro2pro_pg2_thietbi' => array(
                'ParentId' => 'product',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Pro2Pro_PG2_THIETBI_Card',
                'Caption' => array(
                    'en-US' => 'Linking Products',
                    'vi-VN' => 'SP liên kết'
                ),
                'Model' => 'QdPro2ProPG2THIETBI',
                'DataPort' => 'pro2pro_pg2_thietbi_port',
                'PageList' => 'pro2pro_pg2_thietbi_list'
            ),
            'pro2pro_pg2_thietbi_list' => array(
                'ParentId' => -1,
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Pro2Pro_PG2_THIETBI_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdPro2ProPG2THIETBI',
                'DataPort' => 'pro2pro_pg2_thietbi_port'
            ),
            'pro2shop' => array(
                'ParentId' => 'product',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Pro2Shop_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_pro2shop_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdPro2Shop',
                'DataPort' => 'pro2shop_port'
            ),
            'contact' => array(
                'ParentId' => 'folder90',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Contact_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Contact_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdContact',
                'DataPort' => 'contact_port'
            ),
            'shop' => array(
                'ParentId' => 'folder90',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Shop_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Shop_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdShop',
                'DataPort' => 'shop_port'
            ),
            'subscriber' => array(
                'ParentId' => 'folder100',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Subscriber_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Subscriber_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdSubscriber',
                'DataPort' => 'subscriber_port'
            ),

            'dg_request' => array(
                'ParentId' => 'folder120',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_DgRequest',
                'Caption' => array(
                    'en-US' => 'Request (Open)',
                    'vi-VN' => 'Yêu cầu (Mở)'
                ),
                'Model' => 'QdDgRequest',
                'DataPort' => 'dg_request_port',
                'PageList' => 'dg_request_list'
            ),
            'dg_request_list' => array(
                'ParentId' => 'folder120',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_DgRequest_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdDgRequest',
                'DataPort' => 'dg_request_port'
            ),
            'dg_request_close' => array(
                'ParentId' => 'dg_request',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_DgRequestClose',
                'Caption' => array(
                    'en-US' => 'Request (Close)',
                    'vi-VN' => 'Yêu cầu (Đóng)'
                ),
                'Model' => 'QdDgRequest',
                'DataPort' => 'dg_request_port',
                'PageList' => 'dg_request_close_list'
            ),
            'dg_request_close_list' => array(
                'ParentId' => 'folder120',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_DgRequestClose_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdDgRequest',
                'DataPort' => 'dg_request_port'
            ),
            'dg_instock' => array(
                'ParentId' => 'folder120',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_DgInStock',
                'Caption' => array(
                    'en-US' => 'In Stock',
                    'vi-VN' => 'In Stock'
                ),
                'Model' => 'QdDgInStock',
                'DataPort' => 'dg_instock_port',
                'PageList' => 'dg_instock_list'
            ),
            'dg_instock_list' => array(
                'ParentId' => 'folder120',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_DgInStock_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdDgInStock',
                'DataPort' => 'dg_instock_port'
            ),
            'dg_history' => array(
                'ParentId' => 'folder120',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_DgHistory',
                'Caption' => array(
                    'en-US' => 'History',
                    'vi-VN' => 'Lịch sử'
                ),
                'Model' => 'QdDgHistory',
                'DataPort' => 'dg_history_port',
                'PageList' => 'dg_history_list'
            ),
            'dg_history_list' => array(
                'ParentId' => 'folder120',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_DgHistory_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdDgHistory',
                'DataPort' => 'dg_history_port'
            ),
            'unit_of_measure' => array(
                'ParentId' => 'folder130',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_UnitOfMeasure',
                'Caption' => array(
                    'en-US' => 'Unit Of Measure',
                    'vi-VN' => 'Đơn vị tính'
                ),
                'Model' => 'QdUnitOfMeasure',
                'DataPort' => 'unit_of_measure_port',
                'PageList' => 'unit_of_measure_list'
            ),
            'unit_of_measure_list' => array(
                'ParentId' => 'folder130',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_UnitOfMeasure_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdUnitOfMeasure',
                'DataPort' => 'unit_of_measure_port'
            ),
            'pro_uom' => array(
                'ParentId' => 'folder130',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProUOM',
                'Caption' => array(
                    'en-US' => 'Product UOM',
                    'vi-VN' => 'SP - ĐVT'
                ),
                'Model' => 'QdProUOM',
                'DataPort' => 'pro_uom_port',
                'PageList' => 'pro_uom_list'
            ),
            'pro_uom_list' => array(
                'ParentId' => 'folder130',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProUOM_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdProUOM',
                'DataPort' => 'pro_uom_port'
            ),
            'pbhanh' => array(
                'ParentId' => 'folder130',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_PBHanh',
                'Caption' => array(
                    'en-US' => 'Phiếu bảo hành (Nhân Viên)',
                    'vi-VN' => 'Phiếu bảo hành (Nhân Viên)'
                ),
                'Model' => 'QdPBHanh',
                'DataPort' => 'pbhanh_port',
                'PageList' => 'pbhanh_list'
            ),
            'pbhanh_list' => array(
                'ParentId' => 'folder130',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_PBHanh_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdPBHanh',
                'DataPort' => 'pbhanh_port'
            ),
            'pbhanh_shipped' => array(
                'ParentId' => 'folder130',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_PBHanh_Shipped',
                'Caption' => array(
                    'en-US' => 'Phiếu bảo hành (Admin)',
                    'vi-VN' => 'Phiếu bảo hành (Admin)'
                ),
                'Model' => 'QdPBHanh',
                'DataPort' => 'pbhanh_port',
                'PageList' => 'pbhanh_shipped_list'
            ),
            'pbhanh_shipped_list' => array(
                'ParentId' => 'folder130',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_PBHanh_Shipped_list',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdPBHanh',
                'DataPort' => 'pbhanh_port'
            ),
            'product_setup' => array(
                'ParentId' => 'folder50',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductSetup',
                'Caption' => array(
                    'en-US' => 'Product Setup',
                    'vi-VN' => 'Cấu hình Sản phẩm',
                ),
                'Model' => 'QdSetupProduct',
                'DataPort' => 'product_setup_port'
            ),
            'setup_other' => array(
                'ParentId' => 'folder50',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_SetupOther',
                'Caption' => array(
                    'en-US' => 'Other Setup',
                    'vi-VN' => 'Cấu hình khác',
                ),
                'Model' => 'QdSetupOther',
                'DataPort' => 'setup_other_port'
            ),
            'setup_product_order' => array(
                'ParentId' => 'folder50',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_SetupProductOrder',
                'Caption' => array(
                    'en-US' => 'Product Order Setup',
                    'vi-VN' => 'Cấu hình đặt hàng SP',
                ),
                'Model' => 'QdSetupProductOrder',
                'DataPort' => 'setup_product_order_port'
            ),
            'theme_root_setup' => array(
                'ParentId' => 'folder50',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_TRootSetup',
                'Caption' => array(
                    'en-US' => 'Theme Root Setup',
                    'vi-VN' => 'Theme Root Setup',
                ),
                'Model' => 'QdTRootSetup',
                'DataPort' => 'theme/root_setup_port'
            ),
            'blank_page' => array(
                'ParentId' => '',
                'Active' => false,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_DatabaseSvc',
                'Caption' => array(
                    'en-US' => 'Database SVC',
                    'vi-VN' => 'Database SVC'
                ),
                'Model' => '',
                'DataPort' => '',
                'PageList' => ''
            ),
            'report_dg_instock' => array(
                'ParentId' => 'folder140',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Report_DgInStock',
                'Caption' => array(
                    'en-US' => 'Report Dg InStock',
                    'vi-VN' => 'Báo cáo định giá'
                ),
                'Model' => 'QdReportDgInStock',
                'DataPort' => 'report/report_dg_instock_port',
                'PageList' => 'report_dg_instock_list'
            ),
            'report_dg_instock_list' => array(
                'ParentId' => 'folder140',
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Report_DgInStock_List',
                'Caption' => array(
                    'en-US' => 'List',
                    'vi-VN' => 'List'
                ),
                'Model' => 'QdReportDgInStock',
                'DataPort' => 'report/report_dg_instock_port'
            ),
        );
        $obj = array_merge($obj, static::getMenuFolder());
        return $obj;
    }
}