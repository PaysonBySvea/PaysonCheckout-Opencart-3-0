<?php
class ModelExtensionPaymentPaysonCheckout2 extends Model {

    private $currency_supported_by_p_direct = array('SEK', 'EUR');
    private $minimumAmountSEK = 10;
    private $minimumAmountEUR = 1;
    private $maxAmountSEK = 40000;
    private $maxAmountEUR = 3000;


    public function getMethod($address, $total) {
 
        $this->load->language('extension/payment/paysonCheckout2');

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int) $this->config->get('payment_paysonCheckout2_geo_zone_id') . "' AND country_id = '" . (int) $address['country_id'] . "' AND (zone_id = '" . (int) $address['zone_id'] . "' OR zone_id = '0')");

        if ($this->config->get('payment_paysonCheckout2_total') > $total) {
            $status = false;
        } elseif (!$this->config->get('payment_paysonCheckout2_geo_zone_id')) {
            $status = true;
        } elseif ($query->num_rows) {
            $status = true;
        } else {
            $status = false;
        }
        if(strtoupper($this->config->get('config_currency')) == 'SEK' && ($total < $this->minimumAmountSEK || $total > $this->maxAmountSEK)){
            $status = false;
        }
        if(strtoupper($this->config->get('config_currency')) == 'EUR' && ($total < $this->minimumAmountEUR || $total > $this->maxAmountEUR)){
            $status = false;
        }
        if (!in_array(strtoupper($this->session->data['currency']), $this->currency_supported_by_p_direct)) {
            $status = false;
        }

        $paysonLogotype = '';
        if($this->config->get('payment_paysonCheckout2_logotype') == 3){
            $paysonLogotype =  $this->language->get('text_title') .' <img src="catalog/view/image/payment/paysonCheckout2_P.png">';
        }else if($this->config->get('payment_paysonCheckout2_logotype') == 2){
           $paysonLogotype =  '<img src="catalog/view/image/payment/paysonCheckout2_P.png"> '. $this->language->get('text_title');
        }else{
            $paysonLogotype = $this->language->get('text_title');
        }
        
        $method_data = array();

        if ($status) {
            $method_data = array(
                'code' => 'paysonCheckout2',
                'title' => $paysonLogotype,
                'terms' => '',
                'sort_order' => $this->config->get('payment_paysonCheckout2_sort_order')
            );
        }

        return $method_data;
    }

}
