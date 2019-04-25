<?php

// Example field added (see related part in admin/controller/module/my_module.php)
$_['paysonCheckout2_example'] = 'Example Extra Text';

// Heading Goes here:
$_['heading_title'] = 'Payson Checkout 2.0';
// Text
$_['text_modul_name'] = 'Payson Checkout 2.0';
$_['text_modul_version'] = '1.1.0.8';
$_['text_payment'] = 'Payment';
$_['text_extension']     = 'Extensions';
$_['text_success'] = 'Success: Du har &auml;ndrat Payson Checkout 2.0 modulen!';
$_['text_paysonCheckout2'] = '<a onclick="window.open(\'https://www.payson.se/tj%C3%A4nster/ta-betalt\');"><img src="view/image/payment/paysonCheckout2.png" alt="payson Checkout 2.0" title="payson Checkout 2.0" /></a>';
$_['text_edit'] = 'Uppdatera Payson Invoice';

// Entry
$_['entry_button_create_a_paysonaccount'] = 'Öppna ett PaysonKonto';
$_['entry_button_create_a_test_paysonaccount'] = 'Öppna ett test Paysonkonto';
$_['entry_method_mode'] = 'Mode';
$_['text_method_mode_live'] = 'Produktionsmilj&ouml;';
$_['text_method_mode_sandbox'] = 'Testmilj&ouml;';

$_['merchant_id'] = 'Merchant id';
$_['api_key'] = 'API-nyckel';

$_['secure_word'] = 'Hemligt ord';

$_['tab_api']               = 'API Details';
$_['tab_order_status']      = 'Order status';
$_['tab_checkout_scheme']   = 'Checkout scheme';

$_['entry_total'] = 'Totalt';
$_['entry_order_status'] = 'Order Status';
$_['entry_order_status_shipped'] = 'Orderstatus för skickad order';
$_['entry_order_status_canceled'] = 'Orderstatus för avbruten order';
$_['entry_order_status_refunded'] = 'Orderstatus för krediterad order';
$_['entry_geo_zone'] = 'Geo Zone';
$_['entry_status'] = 'Status';
$_['entry_sort_order'] = 'Sorteringsordning';
$_['entry_logg'] = 'Loggar';
$_['entry_totals_to_ignore'] = 'Ignorerade ordertillägg';

$_['text_logotype'] = 'Aktivera logotypen';
$_['entry_logotype'] = 'Logotyp';
$_['text_logotype_yes_right'] = 'ja höger';
$_['text_logotype_yes_left'] = 'ja vänster';
$_['text_logotype_no'] = 'nej';
$_['text_request_phone'] = 'Aktivera telefonnummer';
$_['entry_phone'] = 'Telefonnummer';
$_['text_phone_yes'] = 'ja';
$_['text_phone_no'] = 'nej';
$_['entry_verification'] = 'Verification';
$_['text_verification_none'] = 'None';
$_['text_verification_bankid'] = 'BankId';
$_['entry_color_scheme'] = 'Color scheme';
$_['text_color_scheme_blue'] = 'blå';
$_['text_color_scheme_gray'] = 'grå';
$_['text_color_scheme_white'] = 'vit';
$_['text_color_scheme_grayTextLogos'] = 'grå text logos';
$_['text_color_scheme_blueTextLogos'] = 'blå text logos';
$_['text_color_scheme_whiteTextLogos'] = 'vit text logos';
$_['text_color_scheme_grayNoFooter'] = 'grå no footer';
$_['text_color_scheme_blueNoFooter'] = 'blå no footer';
$_['text_color_scheme_whiteNoFooter'] = 'vit no footer';
$_['text_color_scheme_graysemi'] = 'graysemi';
$_['text_color_scheme_pitchblack'] = 'kolsvart';
$_['text_color_scheme_bright'] = 'ljust';
$_['entry_iframe_size_width'] = 'Storlek av iframe (bredd)';
$_['entry_iframe_size_height'] = 'Storlek av iframe (höjd)';
$_['entry_iframe_size_width_type'] = 'Percent or px';
$_['text_iframe_size_width_percent'] = '%';
$_['text_iframe_size_width_px'] = 'px';
$_['entry_iframe_size_height_type'] = 'Percent or px';
$_['text_iframe_size_height_percent'] = '%';
$_['text_iframe_size_height_px'] = 'px';
$_['entry_order_item_details_to_ignore'] = 'Ignorerade ordertillägg vid Payson';
$_['entry_show_receipt_page']           = 'Visa Kvittosidan';
$_['entry_show_receipt_page_yes']           = 'ja';
$_['entry_show_receipt_page_no']           = 'nej';
$_['entry_show_comments'] = 'Aktivera meddelande';
$_['entry_show_comments_yes'] = 'ja';
$_['entry_show_comments_no'] = 'nej';

// Error
$_['error_permission'] = 'Warning: You do not have permission to modify payment Payson module!';
$_['error_merchant_id'] = 'Merchant ID saknas!';
$_['error_merchant_id_format'] = 'Du försöker skicka fel format av strängen eller skicka ett tom agent ID';
$_['error_api_key'] = 'API-nyckel saknas!';
$_['error_api_key_format'] = 'Du försöker skicka fel format av strängen eller skicka ett tom API-nyckel';
$_['error_ignored_order_totals'] = 'Ange en kommaseparerad lista med ordertillägg som ej skall skickas till Payson';

//help
$_['help_button_create_a_paysonaccount'] = 'Här kan du öppna ett PaysonKonto';
$_['help_button_create_a_test_paysonaccount'] = 'Här kan du öppna ett test PaysonKonto';
$_['help_method_mode'] = 'V&auml;lj l&auml;get (Produktionsmilj&ouml; eller testmilj&ouml;)';
$_['help_merchant_id'] = 'Ange ditt merchantID f&ouml;r ditt Paysonkonto';
$_['help_api_key'] = 'Ange din API-nyckel f&ouml;r ditt Paysonkonto';
$_['help_secure_word'] = 'Ange ett hemligt ord';
$_['help_logg'] = 'Du hittar dina loggar i Admin | System -> Error Log';
$_['help_logotype'] = 'Aktivera logotype 1:nej | 2:vänster | 3:höger';
$_['help_gui_verification'] = 'Kan användas som en extra verifikation';
$_['help_request_phone'] = 'Aktivera telefonnummer';
$_['help_color_scheme'] = 'Ange färgen av schema';
$_['help_iframe_size_height'] = 'Ange höjden av iframe';
$_['help_iframe_size_width'] = 'Ange bredden av iframe';
$_['help_iframe_size_height_type'] = 'Ange höjden av iframe';
$_['help_iframe_size_width_type'] = 'Ange bredden av iframe';
$_['help_total'] = 'Kassan totala ordern m&aring;ste uppn&aring; innan betalningsmetod blir aktiv';
$_['help_receipt'] = 'Välj Ja för Paysons kvittosidan eller Nej for Opencarts kvittosidan';
$_['help_comments'] = 'Aktivera meddelande för beställningen';
$_['help_totals_to_ignore'] = 'Kommaseparerad lista med ordertillägg som ej skall skickas till Payson';
$_['help_order_status'] = 'Ange efter OpenCart efter att kunden har slutfört en betalning eller när en faktura kan skickas';
$_['help_order_status_shipped'] = 'Meddela Payson att ordern har skickats.<br />Vänligen kontrollera under Admin | System -> Logs att ordern har fått status skickad i Payson innan den skickas till kunden.';
$_['help_order_status_canceled'] = 'Meddela Payson att ordern har avbrutits.<br />Vänligen kontrollera under Admin | System -> Logs att ordern har fått status cancelled  i Payson.';
$_['help_order_status_refunded'] = 'Meddela Payson att ordern ska krediteras.<br />Vänligen kontrollera under Admin | System -> Logs att ordern har fått status paidToAccount/Krediterad  i Payson.';
?>