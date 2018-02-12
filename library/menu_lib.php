<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

class menu_lib extends config
{
	function __construct(){
		parent::__construct();
	}
	/**
	* eksekusi pembuatan menu
	*/
	public function execute(){
		$menu_arr = $this->base_menu();
		$current_menu = pathinfo($_SERVER['REQUEST_URI']);
		return $this->buildTreeMenu($menu_arr, strtolower($current_menu['basename']), 0);
	}
	/**
	* bangun menu dari base menu
	*/
	public function buildTreeMenu($menu_arr=array(), $currentMenuLink='undefined', $level=0){
		$currentUl = ($level<1)?'class="nav" id="main-menu"':'class="nav nav-second-level"';
		$html = '<ul '.$currentUl.'>';
		$html .= ($level<1)?'<li class="text-center"><img src="'.$this->base_url().'assets/themes/assets/img/mmi.PNG" class="user-image img-responsive"/></li>':'';
		if (!empty($menu_arr)) {
			foreach ($menu_arr as $key => $value) {
				$currentMenuClass = (strcasecmp($menu_arr[$key]['menu_url'], $currentMenuLink)==0)?'active-menu':'';

				if(empty($menu_arr[$key]['menu_children'])){
                    $html .= '<li>';
                    $html .= '<a class="'.$currentMenuClass.'" href="'.$this->base_url().$menu_arr[$key]['menu_url'].'"><i class="'.$menu_arr[$key]['menu_icon'].'"></i> '.$menu_arr[$key]['menu_name'].'</a>'; 
                } else{
                    $html .= '<li>';
                    $html .= '
                          <a href="'.$this->base_url().$menu_arr[$key]['menu_url'].'">
                            <i class="'.$menu_arr[$key]['menu_icon'].'"></i> '.$menu_arr[$key]['menu_name'].' 
                          <span class="fa arrow"></span></a>';

					$html .= $this->buildTreeMenu($menu_arr[$key]['menu_children'], $currentMenuLink, $level+1);
				}
					$html .= '</li>';
			}
		}
		$html .= '</ul>';

		return $html;
			}
			/**
			* base menu
			*/
			public function base_menu($auth_type="admin"){
				$menu_arr = array(
					array(
						'menu_name' => 'Master Data',
						'menu_icon' => 'fa fa-folder fa-3x',
						'menu_url' => '#',
						'menu_children' => array(
							array(
								'menu_name' => 'Data Pegawai',
								'menu_icon' => '',
								'menu_url' => '?route=person',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Data Client',
								'menu_icon' => '',
								'menu_url' => '?route=client',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Data Debitur',
								'menu_icon' => '',
								'menu_url' => '?route=debitur',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Data Banding',
								'menu_icon' => '',
								'menu_url' => '?route=banding',
								'menu_children' => array(),
							),
						),
					),
					array(
						'menu_name' => 'Index Library',
						'menu_icon' => 'fa fa-file fa-3x',
						'menu_url' => '#',
						'menu_children' => array(
							array(
								'menu_name' => 'Biaya Teknis Bangunan',
								'menu_icon' => 'fa fa-search fa-1x',
								'menu_url' => '?route=btb',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Jenis Bangunan',
								'menu_icon' => 'fa fa-file fa-1x',
								'menu_url' => '?route=jb',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Surat Pengantar',
								'menu_icon' => 'fa fa-file fa-1x',
								'menu_url' => '?route=pengantar',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Laporan Nilai Agunan Dan Appraisal',
								'menu_icon' => 'fa fa-file fa-1x',
								'menu_url' => '?route=nilaiagunan',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Spesifikasi Bangunan',
								'menu_icon' => 'fa fa-file fa-1x',
								'menu_url' => '?route=spekbangunan',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Pernyataan Penilai',
								'menu_icon' => 'fa fa-file fa-1x',
								'menu_url' => '?route=pernyataan',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Definisi dan Pendekatan Penilai',
								'menu_icon' => 'fa fa-file fa-1x',
								'menu_url' => '?route=definisi',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Adjustment',
								'menu_icon' => 'fa fa-file fa-1x',
								'menu_url' => '?route=adjustment',
								'menu_children' => array(),
							),
						),			
					),
					
					array(
						'menu_name' => 'Keuangan',
						'menu_icon' => 'fa fa-list fa-3x',
						'menu_url' => '#',
						'menu_children' => array(
				
							array(
									'menu_name' => 'Report Keuangan',
									'menu_icon' => 'fa fa-list fa-1x',
									'menu_url' => '',
									'menu_children' => array(),
							),
							array(
									'menu_name' => 'Status Pembayaran',
									'menu_icon' => 'fa fa-list fa-1x',
									'menu_url' => '',
									'menu_children' => array(),
							),

						),
					),
					array(
						'menu_name' => 'Report',
						'menu_icon' => 'fa fa-file fa-3x',
						'menu_url' => '#',
						'menu_children' => array(
							array(
								'menu_name' => 'Report Data Lelang',
								'menu_icon' => 'fa fa-file fa-1x',
								'menu_url' => '?route=report&method=data%lelang',
								'menu_children' => array(),
							),
							array(
								'menu_name' => 'Report Data Retail',
								'menu_icon' => 'fa fa-file fa-1x',
								'menu_url' => '?route=report&method=absence',
								'menu_children' => array(),
							),
										
						),
					),
				);
				return $menu_arr;
			} 
		}
	?>