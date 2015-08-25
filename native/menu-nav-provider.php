<?php
if (!class_exists('qd_Custom_Nav')) {
    class qd_Custom_Nav
    {
        public function add_nav_menu_meta_boxes()
        {
            add_meta_box(
                'wl_login_nav_link',
                __('Qdmvc Product Cat'),
                array($this, 'nav_menu_link'),
                'nav-menus',
                'side',
                'low'
            );
            add_meta_box(
                'wl_login_nav_link_2',
                __('Qdmvc Post'),
                array($this, 'nav_menu_link_2'),
                'nav-menus',
                'side',
                'low'
            );
            add_meta_box(
                'wl_login_nav_link_3',
                __('Qdmvc Manufactor'),
                array($this, 'nav_menu_link_3'),
                'nav-menus',
                'side',
                'low'
            );
        }

        public function nav_menu_link()
        {
            $re = array();
            $tmp_obj = array();

            $tmp = new QdProductCat();
            $tmp->SETRANGE('active', true);
            $tmp->SETRANGE('type', QdProductCat::$TYPE_PRODUCTCAT);
            $tmp->SETORDERBY('order', 'desc');
            $tmp = $tmp->GETLIST();
            foreach ($tmp as $item) {
                $tmp_obj['title'] = $item->name;
                $tmp_obj['url'] = $item->getPermalink();
                $tmp_obj['id'] = $item->id;
                array_push($re, $tmp_obj);
            }
            $this->genItemsNav(1, $re);

            $count = 1;
            $tmp = new QdPost();
            //$tmp->SETRANGE('active', true);
            $tmp->SETRANGE('type', QdPost::$TYPE_POST);
            $tmp->SETORDERBY('order', 'desc');
            $tmp = $tmp->GETLIST();
        }

        public function nav_menu_link_2()
        {
            $re = array();
            $tmp_obj = array();

            $tmp = new QdPost();
            //$tmp->SETRANGE('active', true);
            $tmp->SETRANGE('type', QdPost::$TYPE_POST);
            $tmp->SETORDERBY('order', 'desc');
            $tmp = $tmp->GETLIST();
            foreach ($tmp as $item) {
                $tmp_obj['title'] = $item->title;
                $tmp_obj['url'] = $item->getPermalink();
                $tmp_obj['id'] = $item->id;
                array_push($re, $tmp_obj);
            }
            $this->genItemsNav(2, $re);
        }

        public function nav_menu_link_3()
        {
            $re = array();
            $tmp_obj = array();

            $tmp = new QdManufactor();
            $tmp->SETRANGE('active', true);
            $tmp->SETORDERBY('order', 'desc');
            $tmp = $tmp->GETLIST();
            foreach ($tmp as $item) {
                $tmp_obj['title'] = $item->name;
                $tmp_obj['url'] = $item->getPermalink();
                $tmp_obj['id'] = $item->id;
                array_push($re, $tmp_obj);
            }
            $this->genItemsNav(3, $re);
        }

        public function genItemsNav($id, $list_obj)
        {
            ?>
            <div id="posttype-wl-login-<?= $id ?>" class="posttypediv">
                <div id="tabs-panel-wishlist-login-<?= $id ?>" class="tabs-panel tabs-panel-active">
                    <ul id="wishlist-login-checklist-<?= $id ?>" class="categorychecklist form-no-clear">
                        <li>
                            <?php
                            $count = 1;
                            foreach ($list_obj as $item): ?>
                                <label class="menu-item-title">
                                    <input type="checkbox" class="menu-item-checkbox"
                                           name="menu-item[-<?= $count ?>][menu-item-object-id]" value="-<?= $count ?>">
                                    <?= $item['title'] . " ({$item['id']})" ?>
                                </label>
                                <input type="hidden" class="menu-item-type"
                                       name="menu-item[-<?= $count ?>][menu-item-type]" value="custom">
                                <input type="hidden" class="menu-item-title"
                                       name="menu-item[-<?= $count ?>][menu-item-title]" value="<?= $item['title'] ?>">
                                <input type="hidden" class="menu-item-url"
                                       name="menu-item[-<?= $count ?>][menu-item-url]"
                                       value="<?= $item['url'] ?>">
                                <input type="hidden" class="menu-item-classes"
                                       name="menu-item[-<?= $count ?>][menu-item-classes]" value="wl-login-pop">
                                <br/>
                                <?php
                                $count++;
                            endforeach; ?>
                        </li>
                    </ul>
                </div>
                <p class="button-controls">
        			<span class="add-to-menu">
        				<input type="submit" class="button-secondary submit-add-to-menu right" value="Add to Menu"
                               name="add-post-type-menu-item" id="submit-posttype-wl-login-<?= $id ?>">
        				<span class="spinner"></span>
        			</span>
                </p>
            </div>
        <?php
        }
    }
}
$custom_nav = new qd_Custom_Nav();
add_action('admin_init', array($custom_nav, 'add_nav_menu_meta_boxes'));