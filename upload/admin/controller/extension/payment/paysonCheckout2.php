<?php

class ControllerExtensionPaymentPaysonCheckout2 extends Controller {

    private $error = array();
    //private $data = array();

    public function index() {
        //Load the language file for this module
        $this->load->language('extension/payment/paysonCheckout2');

        //Set the title from the language file $_['heading_title'] string
        $this->document->setTitle($this->language->get('heading_title'));

        //Load the settings model. You can also add any other models you want to load here.
        $this->load->model('setting/setting');

        //Save the settings if the user has submitted the admin form (ie if someone has pressed save).		
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('payment_paysonCheckout2', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
        }

        //$data['heading_title'] = $this->language->get('heading_title');
        $data['text_modul_name'] = $this->language->get('text_modul_name');
        $data['text_modul_version'] = $this->language->get('text_modul_version');
        //$data['modul_version'] = $this->language->get('text_modul_version');

        $data['text_edit'] = $this->language->get('text_edit');
        $data['merchant_id'] = $this->language->get('merchant_id');
        $data['api_key'] = $this->language->get('api_key');

        $data['secure_word'] = $this->language->get('secure_word');
        $data['entry_logg'] = $this->language->get('entry_logg');

        $data['entry_method_mode'] = $this->language->get('entry_method_mode');
        $data['paysonCheckout2_mode'] = $this->language->get('payment_mode');
        $data['text_method_mode_live'] = $this->language->get('text_method_mode_live');
        $data['text_method_mode_sandbox'] = $this->language->get('text_method_mode_sandbox');

        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_all_zones'] = $this->language->get('text_all_zones');

        $data['entry_order_status'] = $this->language->get('entry_order_status'); 
        
        $data['entry_status'] = $this->language->get('entry_status');
        
        $data['entry_total'] = $this->language->get('entry_total');
        $data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
        
        $data['entry_order_item_details_to_ignore'] = $this->language->get('entry_order_item_details_to_ignore');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $data['entry_totals_to_ignore'] = $this->language->get('entry_totals_to_ignore');
        
        $data['entry_color_scheme'] = $this->language->get('entry_color_scheme');
        $data['text_color_scheme_blue'] = $this->language->get('text_color_scheme_blue');
        $data['text_color_scheme_gray'] = $this->language->get('text_color_scheme_gray');
        $data['text_color_scheme_white'] = $this->language->get('text_color_scheme_white');
        $data['text_color_scheme_grayTextLogos'] = $this->language->get('text_color_scheme_grayTextLogos');
        $data['text_color_scheme_blueTextLogos'] = $this->language->get('text_color_scheme_blueTextLogos');
        $data['text_color_scheme_whiteTextLogos'] = $this->language->get('text_color_scheme_whiteTextLogos');
        $data['text_color_scheme_grayNoFooter'] = $this->language->get('text_color_scheme_grayNoFooter');
        $data['text_color_scheme_blueNoFooter'] = $this->language->get('text_color_scheme_blueNoFooter');
        $data['text_color_scheme_whiteNoFooter'] = $this->language->get('text_color_scheme_whiteNoFooter'); 
        $data['text_color_scheme_graysemi'] = $this->language->get('text_color_scheme_graysemi');
        $data['text_color_scheme_pitchblack'] = $this->language->get('text_color_scheme_pitchblack');
        $data['text_color_scheme_bright'] = $this->language->get('text_color_scheme_bright');
    
        $data['entry_logotype'] = $this->language->get('entry_logotype');
        $data['text_logotype_yes_left'] = $this->language->get('text_logotype_yes_left');
        $data['text_logotype_yes_right'] = $this->language->get('text_logotype_yes_right');
        $data['text_logotype_no'] = $this->language->get('text_logotype_no');

        $data['entry_verification'] = $this->language->get('entry_verification');
        $data['text_verification_bankid'] = $this->language->get('text_verification_bankid');
        $data['text_verification_none'] = $this->language->get('text_verification_none');
          
        $data['entry_phone'] = $this->language->get('entry_phone');
        $data['text_phone_yes'] = $this->language->get('text_phone_yes');
        $data['text_phone_no'] = $this->language->get('text_phone_no');
        
        $data['entry_iframe_size_width'] = $this->language->get('entry_iframe_size_width');
        $data['entry_iframe_size_width_type'] = $this->language->get('entry_iframe_size_width_type');
        $data['text_iframe_size_width_percent'] = $this->language->get('text_iframe_size_width_percent');
        $data['text_iframe_size_width_px'] = $this->language->get('text_iframe_size_width_px');
        
        $data['entry_iframe_size_height'] = $this->language->get('entry_iframe_size_height');  
        $data['entry_iframe_size_height_type'] = $this->language->get('entry_iframe_size_height_type');
        $data['text_iframe_size_height_percent'] = $this->language->get('text_iframe_size_height_percent');
        $data['text_iframe_size_height_px'] = $this->language->get('text_iframe_size_height_px');  

        $data['entry_show_receipt_page'] = $this->language->get('entry_show_receipt_page');
        $data['entry_show_receipt_page_yes'] = $this->language->get('entry_show_receipt_page_yes');
        $data['entry_show_receipt_page_no'] = $this->language->get('entry_show_receipt_page_no');

        $data['entry_show_comments'] = $this->language->get('entry_show_comments');
        $data['entry_show_comments_yes'] = $this->language->get('entry_show_comments_yes');
        $data['entry_show_comments_no'] = $this->language->get('entry_show_comments_no');
        
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        $data['help_merchant_id'] = $this->language->get('help_merchant_id');
        $data['help_api_key'] = $this->language->get('help_api_key');
        $data['help_secure_word'] = $this->language->get('help_secure_word');
        $data['help_logg'] = $this->language->get('help_logg');
        $data['help_total'] = $this->language->get('help_total');
        $data['help_verification'] = $this->language->get('help_verification');
        $data['help_logotype'] = $this->language->get('help_logotype');
        $data['help_request_phone'] = $this->language->get('help_request_phone');
        $data['help_color_scheme'] = $this->language->get('help_color_scheme');
        $data['help_iframe_size_height'] = $this->language->get('help_iframe_size_height');
        $data['help_iframe_size_width'] = $this->language->get('help_iframe_size_width');
        $data['help_iframe_size_height_type'] = $this->language->get('help_iframe_size_height_type');
        $data['help_iframe_size_width_type'] = $this->language->get('help_iframe_size_width_type'); 
	    $data['help_receipt'] = $this->language->get('help_receipt');
        $data['help_comments'] = $this->language->get('help_comments'); 
        $data['help_totals_to_ignore'] = $this->language->get('help_totals_to_ignore');
        $data['help_method_mode'] = $this->language->get('help_method_mode');
        $data['tab_api'] = $this->language->get('tab_api');
        $data['tab_general'] = $this->language->get('tab_general');
        $data['tab_order_status'] = $this->language->get('tab_order_status');
        $data['tab_checkout_scheme'] = $this->language->get('tab_checkout_scheme');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['merchant_id'])) {
            $data['error_merchant_id'] = $this->error['merchant_id'];
        } else {
            $data['error_merchant_id'] = '';
        }

        if (isset($this->error['api_key'])) {
            $data['error_api_key'] = $this->error['api_key'];
        } else {
            $data['error_api_key'] = '';
        }

        if (isset($this->error['ignored_order_totals'])) {
            $data['error_ignored_order_totals'] = $this->error['ignored_order_totals'];
        } else {
            $data['error_ignored_order_totals'] = '';
        }

        $data['error_invoiceFeeError'] = (isset($this->error['invoiceFeeError']) ? $this->error['invoiceFeeError'] : '');


        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true),
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true),
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/payment/paysonCheckout2', 'user_token=' . $this->session->data['user_token'], true),
        );

        $data['action'] = $this->url->link('extension/payment/paysonCheckout2', 'user_token=' . $this->session->data['user_token'], true);

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token']. '&type=payment', true);


        if (isset($this->request->post['payment_paysonCheckout2_modul_version'])) {
            $data['payment_paysonCheckout2_modul_version'] = $this->request->post['payment_paysonCheckout2_modul_version'];
        } else {
            $data['payment_paysonCheckout2_modul_version'] = $this->config->get('payment_paysonCheckout2_modul_version');
        }

        if (isset($this->request->post['payment_paysonCheckout2_merchant_id'])) {
            $data['payment_paysonCheckout2_merchant_id'] = $this->request->post['payment_paysonCheckout2_merchant_id'];
        } elseif ($this->config->get('payment_paysonCheckout2_merchant_id') != null) {
            $data['payment_paysonCheckout2_merchant_id'] = $this->config->get('payment_paysonCheckout2_merchant_id');
        }else{
            $data['payment_paysonCheckout2_merchant_id'] = '4';
        }
        
        if (isset($this->request->post['payment_paysonCheckout2_api_key'])) {
            $data['payment_paysonCheckout2_api_key'] = $this->request->post['payment_paysonCheckout2_api_key'];
        } elseif($this->config->get('payment_paysonCheckout2_api_key') != null) {
            $data['payment_paysonCheckout2_api_key'] = $this->config->get('payment_paysonCheckout2_api_key');
        } else{
            $data['payment_paysonCheckout2_api_key'] = '2acab30d-fe50-426f-90d7-8c60a7eb31d4';
        }

        if (isset($this->request->post['payment_paysonCheckout2_mode'])) {
            $data['payment_paysonCheckout2_mode'] = $this->request->post['payment_paysonCheckout2_mode'];
        } else {
            $data['payment_paysonCheckout2_mode'] = $this->config->get('payment_paysonCheckout2_mode');
        }

        if (isset($this->request->post['payment_paysonCheckout2_secure_word'])) {
            $data['payment_paysonCheckout2_secure_word'] = $this->request->post['payment_paysonCheckout2_secure_word'];
        } else {
            $data['payment_paysonCheckout2_secure_word'] = $this->config->get('payment_paysonCheckout2_secure_word');
        }

        if (isset($this->request->post['payment_paysonCheckout2_logg'])) {
            $data['payment_paysonCheckout2_logg'] = $this->request->post['payment_paysonCheckout2_logg'];
        } else {
            $data['payment_paysonCheckout2_logg'] = $this->config->get('payment_paysonCheckout2_logg');
        }

        if (isset($this->request->post['payment_paysonCheckout2_total'])) {
            $data['payment_paysonCheckout2_total'] = $this->request->post['payment_paysonCheckout2_total'];
        } else {
            $data['payment_paysonCheckout2_total'] = $this->config->get('payment_paysonCheckout2_total');
        }

        if (isset($this->request->post['payment_paysonCheckout2_order_status_id'])) {
            $data['payment_paysonCheckout2_order_status_id'] = $this->request->post['payment_paysonCheckout2_order_status_id'];
        } elseif ($this->config->get('payment_paysonCheckout2_order_status_id') !== null) {
            $data['payment_paysonCheckout2_order_status_id'] = $this->config->get('payment_paysonCheckout2_order_status_id');
        } else {
            $data['payment_paysonCheckout2_order_status_id'] = 5;
        }

        if (isset($this->request->post['payment_paysonCheckout2_order_status_shipped_id'])) {
            $data['payment_paysonCheckout2_order_status_shipped_id'] = $this->request->post['payment_paysonCheckout2_order_status_shipped_id'];
        } elseif ($this->config->get('payment_paysonCheckout2_order_status_shipped_id') !== null) {
            $data['payment_paysonCheckout2_order_status_shipped_id'] = $this->config->get('payment_paysonCheckout2_order_status_shipped_id');
        } else {
            $data['payment_paysonCheckout2_order_status_shipped_id'] = 1; //Pending
        }

        if (isset($this->request->post['payment_paysonCheckout2_order_status_canceled_id'])) {
            $data['payment_paysonCheckout2_order_status_canceled_id'] = $this->request->post['payment_paysonCheckout2_order_status_canceled_id'];
        } elseif ($this->config->get('payment_paysonCheckout2_order_status_canceled_id') !== null) {
            $data['payment_paysonCheckout2_order_status_canceled_id'] = $this->config->get('payment_paysonCheckout2_order_status_canceled_id');
        }else {
            $data['payment_paysonCheckout2_order_status_canceled_id'] = 1; //Pending
        }

        if (isset($this->request->post['payment_paysonCheckout2_order_status_refunded_id'])) {
            $data['payment_paysonCheckout2_order_status_refunded_id'] = $this->request->post['payment_paysonCheckout2_order_status_refunded_id'];
        } elseif($this->config->get('payment_paysonCheckout2_order_status_refunded_id') !== null) {
            $data['payment_paysonCheckout2_order_status_refunded_id'] = $this->config->get('payment_paysonCheckout2_order_status_refunded_id');
        } else {
            $data['payment_paysonCheckout2_order_status_refunded_id'] = 1; ////Pending
        }

        $this->load->model('localisation/order_status');

        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        if (isset($this->request->post['payment_paysonCheckout2_geo_zone_id'])) {
            $data['payment_paysonCheckout2_geo_zone_id'] = $this->request->post['payment_paysonCheckout2_geo_zone_id'];
        } else {
            $data['payment_paysonCheckout2_geo_zone_id'] = $this->config->get('payment_paysonCheckout2_geo_zone_id');
        }

        $this->load->model('localisation/geo_zone');

        $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

        if (isset($this->request->post['payment_paysonCheckout2_status'])) {
            $data['payment_paysonCheckout2_status'] = $this->request->post['payment_paysonCheckout2_status'];
        } else {
            $data['payment_paysonCheckout2_status'] = $this->config->get('payment_paysonCheckout2_status');
        }

        if (isset($this->request->post['payment_paysonCheckout2_sort_order'])) {
            $data['payment_paysonCheckout2_sort_order'] = $this->request->post['payment_paysonCheckout2_sort_order'];
        } else {
            $data['payment_paysonCheckout2_sort_order'] = $this->config->get('payment_paysonCheckout2_sort_order');
        }  
    
        if (isset($this->request->post['payment_paysonCheckout2_logotype'])) {
            $data['payment_paysonCheckout2_logotype'] = $this->request->post['payment_paysonCheckout2_logotype'];
        } else {
            $data['payment_paysonCheckout2_logotype'] = $this->config->get('payment_paysonCheckout2_logotype');
        }

        if (isset($this->request->post['payment_paysonCheckout2_gui_verification'])) {
            $data['payment_paysonCheckout2_gui_verification'] = $this->request->post['payment_paysonCheckout2_gui_verification'];
        } else {
            $data['payment_paysonCheckout2_gui_verification'] = $this->config->get('payment_paysonCheckout2_gui_verification');
        }

        if (isset($this->request->post['payment_paysonCheckout2_request_phone'])) {
            $data['payment_paysonCheckout2_request_phone'] = $this->request->post['payment_paysonCheckout2_request_phone'];
        } else {
            $data['payment_paysonCheckout2_request_phone'] = $this->config->get('payment_paysonCheckout2_request_phone');
        }
        
        if (isset($this->request->post['payment_paysonCheckout2_color_scheme'])) {
            $data['payment_paysonCheckout2_color_scheme'] = $this->request->post['payment_paysonCheckout2_color_scheme'];
        } else {
            $data['payment_paysonCheckout2_color_scheme'] = $this->config->get('payment_paysonCheckout2_color_scheme');
        }
        
        if (isset($this->request->post['payment_paysonCheckout2_iframe_size_width'])) {
            $data['payment_paysonCheckout2_iframe_size_width'] = $this->request->post['payment_paysonCheckout2_iframe_size_width'];
        } else {
            if($this->config->get('payment_paysonCheckout2_iframe_size_width') == Null){
                $data['payment_paysonCheckout2_iframe_size_width'] = '100';
            }else{
                $data['payment_paysonCheckout2_iframe_size_width'] = $this->config->get('payment_paysonCheckout2_iframe_size_width');
            }
        }
        
        if (isset($this->request->post['payment_paysonCheckout2_iframe_size_width_type'])) {
            $data['payment_paysonCheckout2_iframe_size_width_type'] = $this->request->post['payment_paysonCheckout2_iframe_size_width_type'];
        } else {
            $data['payment_paysonCheckout2_iframe_size_width_type'] = $this->config->get('payment_paysonCheckout2_iframe_size_width_type');
        }
        
        if (isset($this->request->post['payment_paysonCheckout2_iframe_size_height'])) {
            $data['payment_paysonCheckout2_iframe_size_height'] = $this->request->post['payment_paysonCheckout2_iframe_size_height'];
        } else {
            if($this->config->get('payment_paysonCheckout2_iframe_size_height') == Null){
                $data['payment_paysonCheckout2_iframe_size_height'] = '900';
            }else{
                $data['payment_paysonCheckout2_iframe_size_height'] = $this->config->get('payment_paysonCheckout2_iframe_size_height');
            }
        }
        
        if (isset($this->request->post['payment_paysonCheckout2_iframe_size_height_type'])) {
            $data['payment_paysonCheckout2_iframe_size_height_type'] = $this->request->post['payment_paysonCheckout2_iframe_size_height_type'];
        } else {
            $data['payment_paysonCheckout2_iframe_size_height_type'] = $this->config->get('payment_paysonCheckout2_iframe_size_height_type');
        }
        
        if (isset($this->request->post['payment_paysonCheckout2_receipt'])) {
            $data['payment_paysonCheckout2_receipt'] = $this->request->post['payment_paysonCheckout2_receipt'];
        } else {
            $data['payment_paysonCheckout2_receipt'] = $this->config->get('payment_paysonCheckout2_receipt');
        }

        if (isset($this->request->post['payment_paysonCheckout2_comments'])) {
            $data['payment_paysonCheckout2_comments'] = $this->request->post['payment_paysonCheckout2_comments'];
        } else {
            $data['payment_paysonCheckout2_comments'] = $this->config->get('payment_paysonCheckout2_comments');
        }
        
        if (isset($this->request->post['payment_paysonCheckout2_ignored_order_totals'])) {
            $data['payment_paysonCheckout2_ignored_order_totals'] = $this->request->post['payment_paysonCheckout2_ignored_order_totals'];
        } else {
            if ($this->config->get('payment_paysonCheckout2_ignored_order_totals') == null) {
                $data['payment_paysonCheckout2_ignored_order_totals'] = 'sub_total, total, taxes, tax';
            } else{
                $data['payment_paysonCheckout2_ignored_order_totals'] = $this->config->get('payment_paysonCheckout2_ignored_order_totals');
            }
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/payment/paysonCheckout2', $data));
    }

    private function validate() {
        $this->validateAccountInformation();

        if (!$this->user->hasPermission('modify', 'extension/payment/paysonCheckout2')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (isset($this->request->post['payment_paysonCheckout2_mode']) and $this->request->post['payment_paysonCheckout2_mode'] != 0) {
            
            if (!isset($this->request->post['payment_paysonCheckout2_merchant_id']) || !$this->request->post['payment_paysonCheckout2_merchant_id']) {
                $this->error['merchant_id'] = $this->language->get('error_merchant_id');
            }

            if (!isset($this->request->post['payment_paysonCheckout2_api_key']) || !$this->request->post['payment_paysonCheckout2_api_key']) {
                $this->error['api_key'] = $this->language->get('error_api_key');
            }
        }
        if (isset($this->request->post['payment_paysonCheckout2_ignored_order_totals']) and !$this->request->post['payment_paysonCheckout2_ignored_order_totals']) {
            $this->error['ignored_order_totals'] = $this->language->get('error_ignored_order_totals');
        }

        return !$this->error;
    }
    
    public function install() {
        $this->load->model('setting/event');
		$this->load->model('extension/payment/paysonCheckout2');

		$this->model_extension_payment_paysonCheckout2->install();
        $this->model_setting_event->addEvent('payson_status_shipped', 'catalog/model/checkout/order/addOrderHistory/after', 'extension/payment/paysonCheckout2/notifyStatusToPayson');
	}

    public function uninstall() {
            $this->load->model('setting/setting');  
            $this->load->model('setting/event');
            $this->model_setting_event->deleteEventByCode('payson_status_shipped');
    }

    private function validateAccountInformation() {
        // Include library
        require_once(DIR_SYSTEM . '../system/library/paysonpayments/include.php');
        $this->load->model('setting/store');
    $this->load->model('setting/setting');
        
        $merchants = explode('##', $this->request->post['payment_paysonCheckout2_merchant_id']);
        $keys = explode('##', $this->request->post['payment_paysonCheckout2_api_key']);
        
        try {
            $apiUrl = \Payson\Payments\Transport\Connector::PROD_BASE_URL;
            if ($this->request->post['payment_paysonCheckout2_mode'] < 1) {
                $apiUrl = \Payson\Payments\Transport\Connector::TEST_BASE_URL;
            }
            
            $i = 0;    
            foreach ($merchants as $merchant) {
                if(!isset($merchant) || $merchant == null){
                    // Print error messagee
                    $this->error['merchant_id'] = $this->language->get('error_merchant_id') . ' ' . $this->language->get('error_merchant_id_format');
                    break;
                }
                if(!isset($keys[$i]) || $keys[$i] == null){
                    // Print error message
                    $this->error['api_key'] = $this->language->get('error_api_key') . ' ' . $this->language->get('error_api_key_format');
                    break;
                }
                $connector = \Payson\Payments\Transport\Connector::init($merchant, $keys[$i], $apiUrl);
                $checkoutClient = new \Payson\Payments\CheckoutClient($connector); 
                // Make the call
                $accountInformation = $checkoutClient->getAccountInfo();
                $i += 1;   
            }        
        } catch(Exception $e) {
            // Print error message
            $this->error['warning'] = $e->getMessage();
        }     
    } 
}