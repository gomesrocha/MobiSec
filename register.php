<?php
include_once "header.php";
include_once "includes/register.inc.php";
?>
	<div class="row">
		<div class="col-md-12">
			<?php display_message(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" name="registration_form">
				<h2>Registre-se, <small>enquanto é gratuito!</small></h2>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Nome" tabindex="1" required>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Sobrenome" tabindex="2" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Apelido" tabindex="3" required>
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Endereço de Email" tabindex="4" required>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Senha" tabindex="5" required>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirmar senha" tabindex="6" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 col-sm-3 col-md-3 checkbox">
						<!-- <span class="button-checkbox">
							<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
							<input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
						</span> -->
						<label>
							<input type="checkbox" required> Aceitar Licença
						</label>
					</div>
					<div class="col-xs-8 col-sm-9 col-md-9">
						Ao clicar em <strong class="label label-primary">Cadastrar</strong>, você concorda com os <a href="#" data-toggle="modal" data-target="#t_and_c_m">Termos e Condições</a> estabelecidos por este site, incluindo o nosso uso de Cookies.
					</div>
				</div>

				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-md-6"><input type="submit" name="submit" value="Cadastrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
					<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Login</a></div>
				</div>
			</form>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Termos & Condições</h4>
				</div>
				<div class="modal-body">
					<div class="cell-wrapper layout-widget-wrapper">
						<span id="hs_cos_wrapper_module_14473525897074839" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><h2><span style="color: #759aa9;">Política de Privacidade</span></h2>
						<br>
						<p style="text-align: justify;">Política de Privacidade formaliza o compromisso com a segurança e a privacidade de informações coletadas dos usuários dos serviços do website da MobiSec Serviços Gerenciados de Segurança.</p>
						<ul style="text-align: justify; color: #7ea8b9;">
						<li><strong>Informações Pessoais</strong></li>
						</ul>
						<p style="text-align: justify;">1. Ao registrar-se neste website, o usuário fornecerá informações pessoais, que incluirão, dentre outras, nome, e-mail, telefone e nome da empresa. A MobiSec Serviços Gerenciados de Segurança garantirá a privacidade do usuário, bem como das informações que ele, usuário, disponibilizar, de acordo com padrões rígidos de segurança e de confidencialidade.<br><br>2. A MobiSec não venderá ou alugará as informações pessoais do usuário a terceiros, nem tão pouco as utilizará ou compartilhará de maneira diversa da descrita nesta Política de Privacidade sem o prévio consentimento do usuário.<br><br>3. Todas as informações disponibilizadas pelos usuários poderão ser coletadas e utilizadas única e exclusivamente pela MobiSec Serviços Gerenciados de Segurança. Caso um determinado usuário deseje, seu registro poderá ser excluído ou desativado.<br><br>4. A MobiSec somente divulgará as informações do usuário, quando expressamente autorizado pelo próprio; por ordem judicial; ou por força de lei.<br><br>5. A empresa poderá coletar informações relacionadas ao uso de nosso website através do uso de várias tecnologias. Por exemplo, ao visitá-lo, poderemos registrar certas informações que o navegador do usuário enviar, como endereço de IP, tipo e idioma do navegador, tempo de acesso e endereço de website de encaminhamento. A MobiSec também poderá coletar informações sobre as páginas que o usuário visualizou em nosso website e outras ações tomadas durante sua visita. A coleta de informações desta forma permite a MobiSec coletar estatísticas sobre o uso e eficiência do mesmo.<br><br>6. No que diz respeito a um registro para recrutamento &amp; seleção, seja divulgado no website corporativo ou em outro local, o usuário poderá fornecer informações do currículo. A MobiSec poderá usar estas informações em toda a empresa a fim de direcionar sua consulta para fins de emprego ou contatos futuros.<br><br>7. Ao sinalizar interesse por um produto ou serviço da MobiSec, um retorno de chamada ou materiais de marketing específicos, serão usadas informações fornecidas para atender à solicitação. Para ajudar nisso, pode-se compartilhar informações com outros, por exemplo, parceiros de negócio da MobiSec, instituições financeiras, empresas de remessa, ou autoridades postais ou governamentais, como autoridades de Alfândega, envolvidas no atendimento. Relativamente a uma transação, também pode-se contatar o usuário para fins de pesquisas de satisfação do cliente e pesquisa de mercado.<br><br>8. Ao selecionar o item "Indique esta página", a MobiSec pedirá nome e endereço de e-mail da pessoa. Automaticamente será enviado um e-mail, uma única vez, compartilhando a página indicada, mas não serão usadas as informações para nenhuma outra finalidade.<br><br>9. Sempre que outras organizações forem contratadas para prover serviços de apoio, será exigida a adequação aos nossos padrões de privacidade.</p>
						<p style="text-align: justify;">&nbsp;</p>
						<ul style="text-align: justify; color: #7ea8b9;">
						<li><strong>Compartilhamento de informações pessoais e transferências</strong></li>
						</ul>
						<p style="text-align: justify;">10. Podem ocorrer circunstâncias nas quais, seja por estratégia ou por outras razões de negócio, a MobiSec decida vender, comprar, fundir ou de outra forma reorganizar negócios em alguns estados e/ou países. Tal transação pode envolver a divulgação de informações pessoais para compradores prospectivos ou reais, ou o recebimento de tais informações de fornecedores. É prática da MobiSec buscar a proteção apropriada para informações nestes tipos de transações.</p>
						<p style="text-align: justify;">&nbsp;</p>
						<ul style="text-align: justify; color: #7ea8b9;">
						<li><strong>Uso de Informação Geral</strong></li>
						</ul>
						<p style="text-align: justify;">11. Os conteúdos (texto, arquivo, imagem) e os aplicativos (programa, sistema) do website da MobiSec são protegidos pela Lei do Software (a “Lei 9.609/98”) e pela Lei de Direitos Autorais (a “Lei 9.610/98”), sendo vedada modificação, reprodução, armazenamento, transmissão, cópia, distribuição ou qualquer outra forma de utilização, sejam para fins comerciais ou não, sem autorização da MobiSec Serviços Gerenciados de Segurança.<br><br>12. O usuário reconhece e concorda que a obtenção e o uso, por parte da MobiSec, das informações por ele fornecidas conforme disposto nesta POLÍTICA DE PRIVACIDADE não configura nenhuma violação do direito à privacidade e ao sigilo, do direito de autor, publicidade ou qualquer outro direito relacionado à proteção de informações pessoais. Não obstante, o usuário está ciente de que os direitos de privacidade independem e não se confundem com direitos de propriedade intelectual, direitos de imagem, direitos à honra e reputação e outros direitos da personalidade.<br><br>13. As funções deste website não se confundem com provimento de acesso à Internet, não estando a MobiSec obrigada a fornecer informações sobre o fluxo de dados de usuários que o acessa.<br><br>14. Tentativas de invasão ao website da MobiSec serão tratadas, conforme prescrição legal, como dano, roubo ou qualquer outra tipificação penal prevista no Código Penal Brasileiro ou em outras normas correlatas.<br><br>15. A MobiSec poderá alterar a POLÍTICA DE PRIVACIDADE, aqui estabelecida, a qualquer tempo, por decorrência da adoção de novas tecnologias, alteração na legislação ou necessidades de segurança e funcionamento do website, e suas eventuais alterações estarão sempre disponíveis, tornando-se válidas a partir da data de sua publicação. Esta POLÍTICA DE PRIVACIDADE não revoga nem substitui outros instrumentos contratuais que versem sobre confidencialidade e privacidade e que vinculem a MobiSec com quaisquer dos usuários, em razão da celebração de parcerias e outros relacionamentos.</p>
						<p style="text-align: justify;">&nbsp;</p>
						<ul style="text-align: justify; color: #7ea8b9;">
						<li><strong>Perguntas sobre privacidade e acesso</strong></li>
						</ul>
						<p style="text-align: justify;">Se possuir uma pergunta sobre esta Política de Privacidade ou sobre a manipulação de suas informações pela MobiSec, entre em contato conosco pelo email MobiSec@MobiSec.com.br.</p></span>
                    </div>				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<script>
	var password = document.getElementById("password")
	, confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Senhas não conferem.");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>
<?php
include_once "footer.php";
?>