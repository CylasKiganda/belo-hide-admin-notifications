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
		
		$hide_selected_users_data=[];
		$hide_selected_users_data = get_option('belo_hide_admin_notifications_admin_data');
		if(!empty($hide_selected_users_data)){
			if((in_array('administrator', $CurentUserRoles) ) && (in_array($cur_user->user_login, $hide_selected_users_data)) ){
			 
				wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/belo-hide-admin-notifications-admin-hide.css', array(), $this->version, 'all' );
	 
			}
		}
		else{
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/belo-hide-admin-notifications-admin-hide.css', array(), $this->version, 'all' );

		}
		 
      wp_enqueue_style( $this->plugin_name.'belo-general-css', plugin_dir_url( __FILE__ ) . 'css/belo-hide-admin-notifications-general.css', array(), $this->version, 'all' );
  
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
		//var_dump($user);
		
		$hide_selected_users_data=[];
		$hide_selected_users_data = get_option('belo_hide_admin_notifications_admin_data');

		if(!empty($hide_selected_users_data)){
			if((in_array('administrator', $CurentUserRoles) ) && (in_array($cur_user->user_login, $hide_selected_users_data)) ){
			 
				wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/belo-hide-admin-notifications-admin-hide.js', array( 'jquery' ), $this->version, false );
	 
			}
		}
		else{
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/belo-hide-admin-notifications-admin-hide.js', array( 'jquery' ), $this->version, false );

		}
      
      

	}
	public function settings_page() {
		 
      $menu_url = menu_page_url( 'belo_main', false );

      if ( $menu_url ) {
         add_submenu_page( 'belo_main', __( 'Hide admin dashboard notifications', 'belo-hide-admin-notifications' ), __( 'Hide dashboard notifications', 'belo-hide-admin-notifications' ), 'manage_options', 'belo-hide-admin-notifications', array($this,'settings_page_callback') ); 
         } else {
          
         add_menu_page( "BELO", "BELO", "manage_options", "belo_main",  '', plugin_dir_url( __FILE__ ) .'logo.png'); 
         add_submenu_page( 'belo_main', __( 'Hide admin dashboard notifications', 'belo-hide-admin-notifications' ), __( 'Hide dashboard notifications', 'belo-hide-admin-notifications' ), 'manage_options', 'belo_main', array($this,'settings_page_callback') ); 
   
         add_submenu_page( 'belo_main', 'xxx', 'xxx', 'manage_options', 'admin-cod-menu-hack', false ); 
   
      }
      
	}
   
   public function admin_cod_menu_hack( $submenu_file ) {
      global $plugin_page;
      $hidden_item = array(
          'admin-cod-menu-hack' => true,
      );
      foreach ( $hidden_item as $submenu => $unused ) {
          remove_submenu_page( 'belo_main', $submenu );
      }
      return $submenu_file;
  }
   
	 function settings_page_callback() {

      //CSS
      wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/belo-hide-admin-notifications-admin-hide.css', array(), $this->version, 'all' );
      wp_enqueue_style( $this->plugin_name.'belo-hide', plugin_dir_url( __FILE__ ) . 'css/belo-hide-admin-notifications-admin.css', array(), $this->version, 'all' );
      wp_enqueue_style( $this->plugin_name.'select2', plugin_dir_url( __FILE__ ) . 'css/select2.css', array(), $this->version, 'all' );

      //JS
      wp_enqueue_script( $this->plugin_name.'select2', plugin_dir_url( __FILE__ ) . 'js/select2.js', array( 'jquery' ), $this->version, false );
      wp_enqueue_script( $this->plugin_name.'hide', plugin_dir_url( __FILE__ ) . 'js/belo-hide-admin-notifications-admin.js', array( 'jquery',$this->plugin_name.'select2' ), $this->version, false );
      wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/belo-hide-admin-notifications-admin-hide.js', array( 'jquery' ), $this->version, false );


		?>
<div class="">
    <div class=" wrapper belo-hide-notifications-settings-page" style="
    width: 100%;
    margin-bottom: 50px;
    margin-top: 30px;
    height: 40px;
    background: #4e52a2 url(<?php echo plugin_dir_url( __FILE__ ) .'belo.png'; ?>) no-repeat;
    display: flex;
    align-items: center;
    padding-right: -23px !important;
">
        <img style="border-radius: 11px;" viewbox="0 0 52 52" width="70" height="70" class="belo-logo"
            src="<?php echo plugin_dir_url( __FILE__ ) .'logo.png'; ?>">
        <h1 translate="no" style="
    color: #ffd600;
    font-size: 16px;
    font-weight: 700;
    text-align: left;
    display: inline-block;
    box-sizing: border-box;
    padding-left: 40px;
"> <?php echo  __('Hide Admin Dashboard Notifications', 'belo-hide-admin-notifications'); ?></h1>
    </div>



</div>

<form method="POST" action="">
    <div class=" wrapper belo-hide-notifications-settings-page" style="
      min-width: 920px;
      max-width: 1280px;
      margin-left: 30px;
      ">
        <div>
            <div>
                <div class=" action-panel belo-hide-notifications-settings-page shadow-div actions-panel " style="
               background: #fff;
               border: 1px solid #d6d6d6;
               box-shadow: 0 1px 8px 0 rgb(0 0 0 / 5%), 0 2px 1px 0 rgb(0 0 0 / 3%);
               border-radius: 0px;
               ">
                    <div class="panel-header-wrap panel-open has-summary-no-child" id="wpmdb-action-buttons" style="
                  grid-template-columns: auto;
                  padding-top: 15px;
                  ">
                        <h2 id="panel-title-action_buttons" class="panel-title">
                            <?php echo __('General settings', 'belo-hide-admin-notifications'); ?> </h2>
                    </div>
                    <div class="panel-open panel-body-wrap" style="
                  position: relative;
                  ">
                        <div id="action_buttons" style="overflow: hidden; opacity: 1;">
                            <div class="open panel-body" style="
                        padding: 26px 22px;
                        background: #fff;
                        border-top: 1px solid #d6d6d6;
                        display: grid;
                        grid-template-columns: none;
                        border-radius: 0 0 6px 6px;
                        ">
                                <div class="action-buttons btn-section"
                                    style=" margin-bottom: 0!important; display: grid; grid-template-columns: repeat(1,minmax(0,1fr)); padding: 0rem 0em 1.5rem 0rem; ">
                                    <h4 style=" margin: 0px !important; ">
                                        <?php echo  __('Admin accounts', 'belo-hide-admin-notifications'); ?></h4>
                                    <div>
                                        <div>
                                            <h4 style=" margin-top: 0px !important; "><?php 
									$args = array(
										'role'    => 'administrator',
										'orderby' => 'user_nicename',
										'order'   => 'ASC'
									);
									$users_data = get_users( $args );

									if(isset($_POST['belo_hide_admin_notifications_admin_data'])){
                             
                                 // Initialize the new array that will hold the sanitize values
                                 $selectedusersOptions = array();
                              
                                 // Loop through the input and sanitize each of the values
                                 foreach ( $_POST['belo_hide_admin_notifications_admin_data'] as $key => $val ) {
                                    $selectedusersOptions[ $key ] = sanitize_text_field( $val );
                                 }
                               
                              
                              
                              Update_option('belo_hide_admin_notifications_admin_data', $selectedusersOptions  );
                              
                              $success_alert = '<div class="container" style=" position: absolute; left: 510px; top: 0; "> <div class="notification success"> 
                                <span style=" color: #22c45c; ">'.__("Saved successfully!", "belo-hide-admin-notifications").'</span></div></div>';
                               echo wp_kses( $success_alert,
                                 array(
                                    'div'     => array(
                                       'style'  => array(), 
                                       'class'  => array(), 
                                    ),
                                    'span'      => array(
                                       'style'  => array(), 
                                    ),
                                    
                                 ));
                            }

                           $selected_users_data = get_option('belo_hide_admin_notifications_admin_data');

                            
									$output_res = '<select  name="belo_hide_admin_notifications_admin_data[]"  id="belo_hide_admin_notifications_admin_data" multiple="multiple">';
									foreach ( $users_data as $user ) {

                              if(empty($selected_users_data)){
                                 $selected_status = ' selected="selected" ';
                              }
                              else{

                                 if(in_array($user->user_login,$selected_users_data)){
                                    $selected_status = ' selected="selected" ';
                                 }
                                 else{
                                    $selected_status = ' ';
                                 }
                                
                              }

										$output_res .= '<option '.$selected_status.' value="'.$user->user_login.'">';
										$output_res .= $user->user_login;  
										$output_res .= '</option>';
									}

									$output_res .= '</select>';
									 
									echo wp_kses( $output_res,
                           array(
                               'select'      => array( 
                                 'style' => array(),
                                   'name'  => array(),
                                   'id' => array(),
                                   'multiple' => array(),
                               ),
                               'option'     => array(
                                 'value'  => array(),
                                 'selected' => array(),
                             ) 
                           ));
							
									?></h4>
                                            <div>
                                                <?php echo  __('Select the admin accounts to hide the dashboard notifications', 'belo-hide-admin-notifications'); ?>

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
    <div class=" wrapper belo-hide-notifications-settings-page">
        <div class="sc-bdVaJa dFpchr" style="margin-top:30px !important">
            <input class="belo-hide-notifications-settings-page-save-button" type="submit" value="<?php echo __('Save', 'belo-hide-admin-notifications'); ?>
" class="btn submit_data">
        </div>
    </div>
</form>
</div>
<?php
       
      
     
      
	}

}