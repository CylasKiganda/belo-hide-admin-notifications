<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://fmh
 * @since      1.0.0
 *
 * @package    Belo_Hide_Admin_Notifications
 * @subpackage Belo_Hide_Admin_Notifications/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Belo_Hide_Admin_Notifications
 * @subpackage Belo_Hide_Admin_Notifications/admin
 * @author     Belo <bel@fmh.com>
 */
class Belo_Hide_Admin_Notifications_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Belo_Hide_Admin_Notifications_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Belo_Hide_Admin_Notifications_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$cur_user = wp_get_current_user();
		$CurentUserRoles = (array) $cur_user->roles;
		//var_dump($user);
		
		
		
		if((in_array('administrator', $CurentUserRoles) ) && ($cur_user->user_login == "1") ){
			 
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/belo-hide-admin-notifications-admin.css', array(), $this->version, 'all' );
 
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Belo_Hide_Admin_Notifications_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Belo_Hide_Admin_Notifications_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$cur_user = wp_get_current_user();
		$CurentUserRoles = (array) $cur_user->roles;
		 	 
		if((in_array('administrator', $CurentUserRoles) ) && ($cur_user->user_login == "1") ){
			 
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/belo-hide-admin-notifications-admin.js', array( 'jquery' ), $this->version, false );
	
			 
			 
		}

	}
	public function settings_page() {
		add_menu_page(
			__( 'Hide admin notifications', 'my-textdomain' ),
			__( 'Hide admin notifications', 'my-textdomain' ),
			'manage_options',
			'belo-hide-notifications-settings-page',
			array($this,'settings_page_callback'),
			'dashicons-schedule',
			3
		);
	}
	 function settings_page_callback() {
		?>
			<div class="">
   <div class="bhan-header-wrap" style=" background: #a5ddf1;
      ">
      <div class="bhan-wrapper" >
         <div class="bhan-header mdb-header bg-brand-light flex-container">
            <img width="52" height="52" viewBox="0 0 52 52" class="medallion" style="-webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,.2)); filter: drop-shadow(0 1px 4px rgba(0,0,0,.2)); margin-right: 1rem; width: 70px; height: 70px; border-radius: 50px;" src="<?php echo plugin_dir_url( __FILE__ ) .'/logo.png'; ?>"/>
            <h1 style="
               display: inline-block;
               font-size: 1.3125rem;
               font-weight: 500;
               padding: 0;
               ">Hide Admin Notifications</h1>
         </div>
      </div>
   </div>
   <div class="nav-wrap" style="
      background: #fff;
      border-bottom: 1px solid #d6d6d6;
      margin-bottom: 2.8rem;
      ">
      <div class="bhan-wrapper" >
         <ul class="bhan-nav bg-white flex-container" style="
            font-size: .75rem;
            font-weight: 500;
            text-transform: uppercase;
            padding: 1.25rem 0 0;
            align-items: baseline;
            ">
            <li class="nav-item-active" style="
               margin-right: 1.7rem;
               padding: 0.6rem 0.2rem 0.4rem;
               border-bottom: 3px solid #000;
               margin-top: 0.25rem;
               margin-bottom: 0!important;
               list-style: none;
               "><a href="#migrate" aria-current="page" class="active" style="
               color: #04223f!important;
               border-radius: 4px;
               ">General settings</a></li>
             
         </ul>
      </div>
   </div>
   <div class="wrapper">
      <div>
         <div class="migrate-notice warning" style="
            border-color: #ffb92b;
            color: #ab5a19;
            background: #fffbea;
            border-width: 1px;
            border-style: solid;
            border-radius: 4px;
            grid-template-columns: 16px 1fr;
            padding: 10px 16px;
            font-size: 13px;
            grid-gap: 16px;
            gap: 16px;
            margin-top: 16px;
            margin-bottom: 16px;
            grid-column: 1;
            grid-column-end: -1;
            ">
            <div class="migrate-notice-content" style="
               ">Please select the users for which the notifications will be hidden</div>
         </div>
      </div>
   </div>
   <div class="wrapper" style="
      min-width: 920px;
      max-width: 1280px;
      margin-left: 30px;
      ">
      <div class="">
         <div>
            <div class="action-panel shadow-div actions-panel " style="
               background: #fff;
               border: 1px solid #d6d6d6;
               box-shadow: 0 1px 8px 0 rgb(0 0 0 / 5%), 0 2px 1px 0 rgb(0 0 0 / 3%);
               border-radius: 6px;
               ">
               <div class="panel-header-wrap panel-open has-summary-no-child" id="wpmdb-action-buttons" style="
                  grid-template-columns: 1fr 6fr 0;
                  ">
                  <h2 id="panel-title-action_buttons" class="panel-title">Administrator accounts</h2>
                  <div class="panel-header has-summary">
                     <div id="panel-summary-action_buttons" class="panel-summary"></div>
                     <div class="button-wrap">
                        <button aria-labelledby="panel-title-action_buttons" aria-describedby="panel-summary-action_buttons">
                           <svg width="12px" height="10px" viewBox="0 0 12 7" class="open panel-arrow">
                              <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g id="accordion_collapsed_default_active" transform="translate(-1188.000000, -25.000000)" fill="#000000" fill-rule="nonzero">
                                    <g id="arrow_down" transform="translate(1188.000000, 25.000000)">
                                       <path d="M3.15926987,3.89259287 L8.05974363,8.83761866 C8.27477314,9.05412711 8.62315535,9.05412711 8.83872786,8.83761866 C9.05375738,8.6211102 9.05375738,8.26944382 8.83872786,8.05293536 L4.32695435,3.50027406 L8.83818486,-1.05238724 C9.05321437,-1.2688957 9.05321437,-1.62056207 8.83818486,-1.83761866 C8.62315535,-2.05412711 8.27423014,-2.05412711 8.05920063,-1.83761866 L3.15872687,3.10736145 C2.94700063,3.32163174 2.94700063,3.67882502 3.15926987,3.89259287 Z" id="arrow" transform="translate(6.000000, 3.500000) rotate(-90.000000) translate(-6.000000, -3.500000) "></path>
                                    </g>
                                 </g>
                              </g>
                           </svg>
                        </button>
                     </div>
                  </div>
               </div>
               <div class="panel-open panel-body-wrap" style="
                  position: relative;
                  ">
                  <div id="action_buttons" style="overflow: hidden; opacity: 1; height: 139px;">
                     <div class="open panel-body" style="
                        padding: 26px 22px;
                        background: #fff;
                        border-top: 1px solid #d6d6d6;
                        display: grid;
                        grid-template-columns: none;
                        border-radius: 0 0 6px 6px;
                        ">
                        <div class="action-buttons btn-section" style=" margin-bottom: 0!important; display: grid; grid-template-columns: repeat(1,minmax(0,1fr)); padding: 1rem 0em 1.5rem 0rem; ">
                           <div class="action-row">
                              <div class="action-button-group">
                                 <h4 style="
                                    flex: 1 1;
                                    font-size: .8rem;
                                    letter-spacing: 0;
                                    font-weight: 500;
                                    margin-top: 0;
                                    margin-bottom: 1.75rem;
                                    text-transform: uppercase;
                                    "><?php 
									$args = array(
										'role'    => 'administrator',
										'orderby' => 'user_nicename',
										'order'   => 'ASC'
									);
									$users = get_users( $args );
									$users_data=[];
									$output_res = '<select id="belo_hide_admin_notifications_admin">';
									foreach ( $users as $user ) {
										$output_res .= '<option value="'.$user->user_login.'">';
										$output_res .= $user->user_login;
										$output_res .= '</option>';
									}

									$output_res .= '</select>';
									
									echo $output_res;
									
									?></h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
		<?php
	}

}
