<?php
if ( is_user_logged_in() ) {
    
    $email = trim($_POST['email']);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
    $user = get_user_by( 'email', $email );
$user_id = $user->id;
   /*$dados_user_cliente = get_userdata($user_id);
   print_r($dados_user_cliente);
   $dados = get_user_meta($user_id);
   print_r($dados);*/
if($user_id > 0){
$customer = new WC_Customer( $user_id );
$dados = get_user_meta($user_id);
$array_cliente = array();
$array_cliente['mensagem'] = 'ok';
$array_cliente['username'] = $customer->get_username();
$array_cliente['funcao'] = $customer->get_role();
$array_cliente['avatar'] = $customer->get_avatar_url( );
$array_cliente['first_name'] = $dados["first_name"][0];
$array_cliente['last_name'] = $dados["last_name"][0];
//$array_cliente['address'] = $dados["address"][0];
$dados_end = explode("-",$dados["address"][0]);
$bairro = explode(",",$dados_end[1]);
$numero_imovel =  explode(",",$dados_end[0]);
//$array_cliente['first_name'] = $customer->get_first_name();
//$array_cliente['last_name'] = $customer->get_last_name();
$array_cliente['cpf'] = $dados["fax"][0];  
$array_cliente['billing_phone'] = $dados["phone"][0];
$array_cliente['display_name'] = $customer->get_display_name();
$array_cliente['billing_address'] = $dados_end[0];//$dados["address"][0];//$customer->get_billing_address();
$array_cliente['billing_address_1'] = $customer->get_billing_address_1();
$array_cliente['billing_address_2'] = $bairro[0];//$customer->get_billing_address_2();
$array_cliente['numero_imovel'] = $numero_imovel[1];  
$array_cliente['billing_city'] = ucfirst($dados["city"][0]);//$customer->get_billing_city();
$array_cliente['billing_state'] = $dados["country"][0];//$customer->get_billing_state();
$array_cliente['billing_postcode'] = $customer->get_billing_postcode();
$array_cliente['billing_email'] = $email;//$customer->get_billing_email();
//$array_cliente['billing_phone'] = $customer->get_billing_phone();




 /*  $fone_cliente = $dados["phone"][0];
   $cpf_cliente = $dados["fax"][0];
   $nome_cliente = $dados["first_name"][0];
   $sobrenome_cliente = $dados["last_name"][0];
//$array_cliente[] = $customer->get_shipping();
//###############################################
/*
$array_cliente[] = $customer->get_shipping_first_name();
$array_cliente[] = $customer->get_shipping_last_name();
$array_cliente[] = $customer->get_shipping_company();
$array_cliente[] = $customer->get_shipping_address();
$array_cliente[] = $customer->get_shipping_address_1();
$array_cliente[] = $customer->get_shipping_address_2();
$array_cliente[] = $customer->get_shipping_city();
$array_cliente[] = $customer->get_shipping_state();
$array_cliente[] = $customer->get_shipping_postcode();
$array_cliente[] = $customer->is_vat_exempt();
$array_cliente[] = $customer->get_is_vat_exempt();*/

echo json_encode($array_cliente);
} else {
    echo('{"mensagem" : "Email Inexistente em nosso site!"}');
}
  
} else {
  echo('{"mensagem" : "Email Invalido! Preencha o email corretamente"}');
}
    
} else {
   echo('{"mensagem" : "Por favor, faça o login!"}');
}



