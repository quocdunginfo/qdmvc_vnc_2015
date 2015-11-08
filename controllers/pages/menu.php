<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 03/05/2015
 * Time: 9:48 AM
 */
class Qdmvc_Page_IndexMenu
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
            'folder120' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Định giá',
                    'en-US' => 'Định giá'
                )
            ),
            'folder130' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Kho bãi',
                    'en-US' => 'Warehouse Mgmt'
                )
            ),
            'folder140' => array(
                'ParentId' => -1,
                'PageType' => 'Folder',
                'Active' => true,
                'Caption' => array(
                    'vi-VN' => 'Báo cáo',
                    'en-US' => 'Reports'
                )
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
                    'en-US' => 'Product THOITRANG',
                    'vi-VN' => 'SP Thời trang',
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
            'product_qa' => array(
                'ParentId' => 'folder10',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductQA_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductQA_List',
                'Caption' => array(
                    'en-US' => 'Product QA List',
                    'vi-VN' => 'Product QA List'
                ),
                'Model' => 'QdProductQA',
                'DataPort' => 'product_qa_port'
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
            'product_cat_pg3_card' => array(
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
            'product_cat_qa' => array(
                'ParentId' => 'folder20',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_ProductCatQA_Card',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_ProductCatQA_List',
                'Caption' => array(
                    'en-US' => 'Product Cat QA List',
                    'vi-VN' => 'Product Cat QA List',
                ),
                'Model' => 'QdProductCatQA',
                'DataPort' => 'product_cat_qa_port'
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
                    'vi-VN' => 'LSP Thời trang',
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
            'postcat_card' => array(
                'ParentId' => 'folder80',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_PostCat',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_PostCat_list',
                'Caption' => array(
                    'en-US' => 'Post Cat List',
                    'vi-VN' => 'Post Cat List'
                ),
                'Model' => 'QdPostCat',
                'DataPort' => 'postcat_port'
            ),
            'post_card' => array(
                'ParentId' => 'postcat_card',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Post',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_post_list',
                'Caption' => array(
                    'en-US' => 'Post List',
                    'vi-VN' => 'Post List'
                ),
                'Model' => 'QdPost',
                'DataPort' => 'post_port'
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
            'partnergrp' => array(
                'ParentId' => 'folder110',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_PartnerGrp',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_PartnerGrp_list',
                'Caption' => array(
                    'en-US' => 'PartnerGrp List',
                    'vi-VN' => 'PartnerGrp List'
                ),
                'Model' => 'QdPartnerGrp',
                'DataPort' => 'partnergrp_port',
            ),
            'partner' => array(
                'ParentId' => 'partnergrp',
                'Active' => true,
                'PageType' => 'Card',
                'Class' => 'Qdmvc_Page_Partner',
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
                'Active' => false,
                'PageType' => 'List',
                'Class' => 'Qdmvc_Page_Partner_list',
                'Caption' => array(
                    'en-US' => 'Partner List',
                    'vi-VN' => 'Partner List'
                ),
                'Model' => 'QdPartner',
                'DataPort' => 'partner_port',
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