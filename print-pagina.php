<!--INICIO OS-->
							<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
							<style>
						
							
								  
								  .w3-container p{
									  line-height: 0.3
									}
								  .uppercase{
									  text-transform: uppercase;
									  line-height: 0.3
									}
								  #printable, #printable * {
								
									font-size: 9px!important;
									}
								  
								  #printable div p *{
									  line-height: 0.3;
									  font-size: 9px!important;
									}
								  	  .dados_gerais tr td,#dados_gerais tr th {
										line-height:  1.24;
									}
								
								b, strong, th{
                                	color: #293d3d;
                                }
                                *{
                                	font-family: 'Verdana',sans-serif;
                                }		
                                #dados_pagamento td, #totais td{
                                	border: 1px dotted lightgray;
                                	padding: 6px;
                                }
                                table th, table td{
                                                	border: 1px dotted lightgray;
                                                                                	padding: 6px;
                                                }
                                .w3-round{                         
                                width: 90px;
                                border: 1px dotted lightgray;                                	
								border-radius: 90px;
								                                  
								
                                                }
						
							</style>
							<p id="linha_print"><button onmousedown="printPage();" onmouseup="exibirBtn()"  class="w3-button w3-teal"><i class="fa fa-print"></i>Imprimir</button></p>
							<p>&nbsp;</p>
							<?php
								    //var_dump(get_user_meta(34));
								    //var_dump(get_userdata(34));
								    $dados_autor = get_current_user_id();
								    $dados = get_user_meta($dados_autor);
								   
								   $descricao_empresa = $dados['professional_statements'][0] ;
								   $nome_empresa = strtoupper($dados["full_name"][0]);
								   $fone1_empresa = $dados["user_registration_phone"][0];
								   $nome_empresa = $dados["company_name"][0];
								   $fone_empresa = $dados["phone"][0];//fone empresa
								   $url_empresa = $dados["user_url"][0];
								   $address_empresa = $dados["address"][0];
								   $cidade_empresa = $dados["city"][0];
								   $cep_empresa = $dados["zip"][0];
								   $cnpj = $dados["fax"][0];
								   $inicio_cnpj = substr($cnpj,0,2);
								   $meio_cnpj = substr($cnpj,2,3);
								   $fim_cnpj = substr($cnpj,5,3);
								   $barra = substr($cnpj,8,4);
								   $traco = substr($cnpj,12,2);
								   $formatado_cnpj = $inicio_cnpj.".".$meio_cnpj.".".$fim_cnpj."/".$barra."-".$traco."";
								   $dados_user_logado = get_userdata($dados_autor);
								   $email_user = $dados_user_logado->user_email;
								    $profile_avatar = $dados["profile_avatar"][0];
								    $profile_banner_photos = $dados["profile_banner_photos"][0];
								    $pos_1 = strpos($profile_avatar,"https://www.climacode.app/wp-content/uploads/");
								    $pos_2 = strpos($profile_banner_photos,"https://www.climacode.app/wp-content/uploads/");
								    $profile_avatar_cortada = substr($profile_avatar,$pos_1);
                                    $profile_banner_cortada = substr($profile_banner_photos,$pos_2);
                                    $corte_1 = strpos($profile_avatar_cortada,";");
                                    $corte_2 = strpos($profile_banner_cortada,";");
                                    $avatar = substr($profile_avatar_cortada,0,$corte_1 - 1);
                                    $banner = substr($profile_banner_cortada,0,$corte_2 - 1);
								    
								    
								    ?>
							<div class="w3-container w3-border" id="printable">
							    <br>
							 <div class="w3-row">
							  <div class="w3-col s1 m1 l1 w3-center"><p><img alt="logotipo <?=$nome_empresa;?>" class="w3-round w3-padding center logo-position" src="<?=$avatar;?>"></p></div>
							  <div class="w3-col s2 m2 l2 w3-left">.</div>
							  <div class="w3-col s9 m9 l9 w3-left">
							  <h1>ORDEM DE SERVIÇO #<?php global $post; echo $post->ID;?></h1>
								<p>REFERÊNCIA: <?php the_field('referencia');?></p>
								<hr>
							
								<p class="uppercase"><strong><?=$nome_empresa;?></strong>- <?=$formatado_cnpj;?></p>
								<p class="uppercase"><?=$address_empresa;?> - <?=$cidade_empresa;?> CEP: <?=$cep_empresa;?>
								<p>Fone: <?=$fone1_empresa;?> <strong>Celular:</strong> <?=$fone_empresa;?> </p>
								<p><strong>E-mail:</strong><?=$email_user;?> <strong>Site:</strong><?=$url_empresa;?></p>
							  </div>
							</div> 
							<div class="w3-container">
							<p class="uppercase"><span class="w3-left">Dados do Cliente</span><span class="w3-right" style="margin-right: 100px"><strong>Técnico Resp:</strong><?php the_field('tecnico_responsavel');?> <b>DATA:</b>&nbsp;<?php the_field('data_da_os');?></span></p>
							<hr>
							</div>
							<div class="w3-row w3-container">
							  <div class="w3-col s8 w3-left">
								<p class="uppercase"><strong>RAZÃO SOCIAL:</strong> <?php the_field('nomerazao_social');?></p>
								<p class="uppercase"><strong>INSC. ESTADUAL:</strong><?php the_field('rginscricao_estadual');?></p>
								<p><strong>EMAIL:</strong> <span class="lowercase"><?php the_field('email_de_contato');?></span></p>
								<p class="uppercase"><strong> NÚMERO:</strong> <?php the_field('numero_do_imovel');?></p>
								<p class="uppercase"><strong>COMPLEMENTO:</strong><?php the_field('complemento');?> </p>
								<p class="uppercase"><strong>UF:</strong> <?php the_field('uf');?></p>
							  </div>
							  <div class="w3-col s4 w3-left">
								<p class="uppercase"><strong>CNPJ:</strong><?php the_field('cpf___cnpj');?></p>
								<p class="uppercase"><strong>TELEFONE:</strong> <?php the_field('telefone');?></p>
								<p class="uppercase"><strong>ENDEREÇO:</strong></p>
								<p>&nbsp;<?php ucfirst(the_field('endereco_do_servico'));?></p>
								<p class="uppercase"><strong>BAIRRO:</strong> <?php the_field('bairro');?></p>
								<p class="uppercase"><strong>CEP:</strong> <?php the_field('cep');?></p>
								<p class="uppercase"><strong>CIDADE:</strong> <?php the_field('cidade');?></p>
							  </div>
							</div>
							<div class="w3-container">
							<p class="uppercase"><span class="w3-left"><b>SERVIÇOS EXECUTADOS</b></span></p>
							<hr>
							<div class="w3-row w3-container">
							  <div class="w3-col s6 w3-left">
								<table>
								<thead>
								<tr><th><b>SERVIÇO</b></th></tr>
								</thead>
								<tbody>
								    <?php
							      $lista_servicos=  get_field('lista_de_servicos');
							      
							      for($i = 0; $i < count($lista_servicos); $i++){?>
								<tr><td>
							     <?php 
							          echo $lista_servicos[$i]["lt_servicos"]."<br>";
							          
							          ?>
							      </td></tr>
							      <?php }  ?>
								</tbody>
								</table>
							  </div>
							  <div class="w3-col s6 w3-left">
							      <table>
								<thead>
								<tr>
								<th>QTD</th>
								<th>V.UNIT.</th>
								<th>V.TOTAL</th></tr>
								</thead>
								<tbody>
								<?php
							      $lista_servicos=  get_field('lista_de_servicos');
							      
							      for($i = 0; $i < count($lista_servicos); $i++){?>
								<tr>
							     <?php 
							          echo "<td>".$lista_servicos[$i]["quantidade"]."</td>";
							          echo "<td>".$lista_servicos[$i]["valor_unitario"]."</td>";
							          echo "<td>".$lista_servicos[$i]["valor_total"]."</td>";
							          
							          ?>
							      </tr>
							      <?php }  ?>
								  
								</tbody>
								</table>
							  </div>
							</div>
							</div><!--FIM SERVIÇOS EXECUTADOS-->
							<div class="w3-container"><!--INICIO PEÇAS-->
							<p class="uppercase"><span class="w3-left"><b>LISTA DE PRODUTOS</b></span></p>
							<hr>
							<div class="w3-row w3-container">
							  <div class="w3-col s6 w3-left">
								<table>
								<thead>
								<tr><th><b>PRODUTO</b></th></tr>
								</thead>
								<tbody>
								<?php
							      $lista_produtos=  get_field('lista_de_produtos');
							      
							      for($i = 0; $i < count($lista_produtos); $i++){?>
								<tr><td>
							     <?php 
							          echo $lista_produtos[$i]["lt_produtos"]."<br>";
							          
							          ?>
							      </td></tr>
							      <?php }  ?>
								</tbody>
								</table>
							  </div>
							  <div class="w3-col s6 w3-left">
								<table>
								<thead>
								<tr><th>UNIDADE</th><th>QTDE.</th><th>NCM</th><th>V.UNIT.</th><th>V.TOTAL</th></tr>
								</thead>
								<tbody>
								<?php
							      $lista_produtos=  get_field('lista_de_produtos');
							      
							      for($i = 0; $i < count($lista_produtos); $i++){?>
								<tr>
							     <?php 
							          echo "<td>".$lista_produtos[$i]["quantidade"]."</td>";
							          echo "<td>".$lista_produtos[$i]["valor_unitario"]."</td>";
							          echo "<td>".$lista_produtos[$i]["valor_total"]."</td>";
							          
							          ?>
							      </tr>
							      <?php }  ?>
							      </tbody>
								</table>
							  </div>
							</div>
							</div><!--FIM PEÇAS-->
							<div class="w3-container"><!--INICIO DADOS PAGAMENTO-->
							<p class="uppercase"><span class="w3-left"><b>DADOS PAGAMENTO</b></span></p>
							<hr>
							<div class="w3-row w3-container">
							  <div class="w3-col s6 w3-left">
								<table id="dados_pagamento">
								<thead>
								<tr><th colspan="2"><b>DADOS DE PAGAMENTO</b></th></tr>
								</thead>
								<tbody>
								    <?php
							      $totais =  get_field('totais');
							      ?>
								<tr><td><span class="w3-left"><b>QTDE DE SERVIÇOS</b></span></td><td><?php echo $totais['quantidade_servicosxyz'];?></td></tr>
								<tr><td><span class="w3-left"><b>QTDE PRODUTOS</b></span></td><td><?php echo $totais['quantidade_de_produtosxyz'];?></td></tr>
								
								</tbody>
								</table>
							  </div>
							  <div class="w3-col s6 w3-left">
								<table id="totais">
								<thead>
								</thead>
								<tbody>
								    <?php $totais_gerais = get_field('totais_gerais'); ?>
								<tr><td><span class="w3-right w3-margin-right"><b>VALOR TOTAL DOS SERVIÇOS</b></span></td><td>R$ <?php echo $totais['valor_total_dos_servicosxyz'];?></td></tr>
								<tr><td><span class="w3-right w3-margin-right"><b>VALOR TOTAL DAS PEÇAS</b></span></td><td>R$ <?php echo $totais['valor_total_dos_produtosxyz']; ?></td></tr>
								<tr><td><span class="w3-right w3-margin-right"><b>VALOR DE DESCONTO</b></span></td><td>R$ <?php echo $totais_gerais['valor_do_descontoxyz']; ?></td></tr>
								<tr><td><span class="w3-right w3-margin-right"><b>VALOR TOTAL DA OS</b></span></td><td>R$ <?php echo $totais_gerais['valor_total_da_osxyz'];?></td></tr>
								</tbody>
								</table>
							  </div>
							</div>
							</div>
							<div class="w3-container"><!--INICIO DADOS PAGAMENTO-->
							<?php $entrega = get_field('entrega_de_equipamento');?>
							<p class="uppercase"><span class="w3-left"><b>DATA DA OS:</b> <?php the_field('data_da_os');?> &nbsp;&nbsp;&nbsp;<b>DATA REALIZAÇÃO:</b> <?php echo $totais_gerais['data_do_servicoxyz'];?> &nbsp;&nbsp;&nbsp;<b>DT ENTREGA DO EQUIP.:</b> <?php echo $entrega['data_da_entrega'];?> &nbsp;&nbsp;&nbsp;</span></p>
							<hr>
							</div>
							<div class="w3-container" id="recebimento" style="page-break-before: always;"><!--GERAL-->
							<table class="dados_gerais">
							<thead>
							<tr><th>EQUIPAMENTO</th><th>QUEM RECEBEU</th></tr>
							</thead>
							<tbody>
							<tr><td><?php echo $entrega['equipamento'];?></td><td><b><?php echo $entrega['quem_recebeu'];?></b></td></tr>
							</tbody>
							</table>
							<hr>
							<table class="dados_gerais">
							<thead>
							<tr><th>LAUDO TÉCNICO</th><th>PROBLEMAS</th><th>OBSERVAÇÕES GERAIS</th></tr>
							</thead>
							<tbody>
							<tr><td><?php the_field('lauda_tecnico');?></td><td><?php the_field('problemas');?></td><td><?php the_field('observacoes_gerais');?><br>FAÇA SUA ORDEM DE SERVIÇO ATRAVÉS DO SITE(www.climacode.app)</td></tr>
							</tbody>
							</table>
							</div><!--GERAL-->
							<div class="w3-container"><!--FINAL-->
							<table  class="dados_gerais">
							<tr><th>GARANTIA</th><th>DATA DO ACEITE</th><th></th><th></th></tr>
							<tr><td class="tira-borda"></td><td class="tira-borda"></td><td  class="tira-borda"></td><td  class="tira-borda">&nbsp;</td></tr>
							<tr class="tira-borda"><td class="tira-borda"></td><td class="tira-borda"></td><td  class="tira-borda"></td><td  class="tira-borda">&nbsp;</td></tr>
							<tr><td><?php the_field('garantia');?></td><td><?php the_field('data_do_aceite');?></td><td class="tira-topo">---------------------------</td><td class="tira-topo">----------------------------</td></tr>
							<tr><td></td><td></td><td>Assinatura do Prestador</td><td>Assinatura do Sacado</td></tr>
							<tr><td colspan="4"><br><sub>documento gerado pelo site https://climacode.app </sub></td></tr>
							</table>
							</div><!--FINAL-->
							</div>
							
							<!--FIM DA OS-->
							<script>
							    function printPage(){
							        document.getElementById('linha_print').style.display = 'none';
							        window.print();
							        
							    }
							    window.onafterprint = (event) => {
                                      document.getElementById('linha_print').style.display = 'block';
                                    };
							</script>
