<?php
/**
 ********************************************************************************
 * 
 * @package	Servis
 * @author	Şafak Mehmet İLHAN
 * @copyright	Copyright (c) 2020 - 2021, Şafak Mehmet İLHAN (https://www.google.com/search?q=%22%C5%9Fafak+mehmet+ilhan%22)
 * @license	https://www.gnu.org/licenses/licenses.html#GPL	GNU General Public License V3
 * @link	https://github.com/safakmehmett
 * @since	Version 1.0.0
 * @filesource
 * 
 ********************************************************************************
 */
?> 
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body data-col="2-columns" class=" 2-columns ">
    <div class="wrapper">
        <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
        <div data-active-color="black" data-background-color="white" data-image="" class="app-sidebar">
            <div class="sidebar-header">
                <div class="logo clearfix">
                    <a href="<? echo base_url(); ?><?php echo('panel/dashboard'); ?>" class="logo-text float-left"><div class="logo-img"><img src="<? echo base_url(); ?>/Assets/img/logo.png" /></div><span class="text align-middle">Servis</span></a>
					<a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-left"></i></a>
					<a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a>
                </div>
            </div>
            <div class="sidebar-content">
                <div class="nav-container">
                    <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
                        <li class=" nav-item">
                            <a href="<?php echo base_url('panel/dashboard'); ?>"><i class="ft-home"></i><span data-i18n="" class="menu-title">Panel</span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"></span></a>
                        </li>
						<li class=" nav-item">
                            <a href="<?php echo base_url('panel/forms'); ?>"><i class="ft-clipboard"></i><span data-i18n="" class="menu-title">Servis Formları</span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"><?php $this->db->select('*'); $this->db->from('products'); $this->db->like('Status', 'Teslim Alındı');	echo $this->db->count_all_results(); ?></a>
                        </li>                    
						<li class=" nav-item">
                            <a href="<?php echo base_url('panel/newform'); ?>"><i class="ft-edit"></i><span data-i18n="" class="menu-title">Yeni Servis Kaydı</span></a>
                        </li>
						<li class=" nav-item">
                            <a href="<?php echo base_url('panel/product_type'); ?>"><i class="ft-file-plus"></i><span data-i18n="" class="menu-title">Ürün Tipleri</span></a>
                        </li>
						<li class=" nav-item">
                            <a href="<?php echo base_url('panel/brands'); ?>"><i class="ft-file-text"></i><span data-i18n="" class="menu-title">Marka Listesi</span></a>
                        </li>
						<li class=" nav-item">
                            <a href="<?php echo base_url('panel/users'); ?>"><i class="ft-users"></i><span data-i18n="" class="menu-title">Kullanıcı Listesi</span></a>
                        </li>
						<li class=" nav-item">
                            <a href="<?php echo base_url('panel/generalsettings'); ?>"><i class="ft-settings"></i><span data-i18n="" class="menu-title">Genel Ayarlar</span></a>
                        </li>
						<li class=" nav-item">
                            <a href="<?php echo base_url('yonetim/logout'); ?>"><i class="ft-power"></i><span data-i18n="" class="menu-title">Güvenli Çıkış</span></a>
                        </li>
                    </ul>    
                </div>
            </div>
            <div class="sidebar-background"></div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>
                </div>
                <div class="navbar-container">
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item mr-2 d-none d-lg-block">
                                <a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen">
                                    <i class="ft-maximize font-medium-3 blue-grey darken-4"></i>
                                    <p class="d-none">Tam Ekran</p>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                    <i class="ft-bell font-medium-3 blue-grey darken-4"></i><span class="notification badge badge-pill badge-danger"></span>
                                    <p class="d-none">Bildirimler</p>
                                </a>
                                <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                                    <div class="noti-list">
										<a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4" href="<? echo base_url('panel/users')?>">
											<i class="ft-bell info float-left d-block font-large-1 mt-1 mr-2"></i>
											<span class="noti-wrapper">
												<span class="noti-title line-height-1 d-block text-bold-400 info">
													Toplam <?php echo $this->db->count_all("users"); ?> adet 
												</span>
												<span class="noti-text"> 
													kullanıcı bulunmaktadır.
												</span>
											</span>
										</a>
										<a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4" href="<? echo base_url('panel/forms')?>">
											<i class="ft-bell warning float-left d-block font-large-1 mt-1 mr-2"></i>
											<span class="noti-wrapper">
												<span class="noti-title line-height-1 d-block text-bold-400 warning">
													Toplam <?php echo $this->db->from("products")->like("status", "Teslim Alındı")->count_all_results(); ?> adet 
													
												</span>
												<span class="noti-text">
													servis formu işlem bekliyor. 
												</span>
											</span>
										</a>
										<a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4" href="<? echo base_url('panel/forms')?>">
										<i class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i>
											<span class="noti-wrapper">
												<span class="noti-title line-height-1 d-block text-bold-400 danger">
													Toplam <?php echo $this->db->count_all("products"); ?> adet 
												</span>
												<span class="noti-text">
													servis formunuz bulunmaktadır.
												</span>
											</span>
										</a>
                                </div>
                            </li>
                            <li class="dropdown nav-item">
                                <a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                    <i class="ft-user font-medium-3 blue-grey darken-4"></i>
                                    <p class="d-none">Kullanıcı Ayarları</p>
                                </a>
                                <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right">
									<a class="dropdown-item py-1"><span><? echo $this->session->userdata('username'); ?></span> Hoş Geldiniz </a>
									<a href="<?php echo base_url('panel/updateuser/'); echo $this->session->userdata('username'); ?>" class="dropdown-item py-1"><i class="ft-edit mr-2"></i><span>Profili Düzenle</span></a>
                                    <div class="dropdown-divider"></div><a href="<?php echo base_url('yonetim/logout'); ?>" class="dropdown-item"><i class="ft-power mr-2"></i><span>Güvenli Çıkış</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
