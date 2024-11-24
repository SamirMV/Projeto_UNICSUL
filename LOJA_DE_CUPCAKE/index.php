<html>

	<head>
	
		<style>
		
			body
			{
				background-color: DarkGray;
				height: 80%;
				overflow: hidden;
			}

			button
			{
				border-radius: 25px;
			}
			
			/* retirar sublinhado */
			a
			{
				text-decoration:none;
			}

			/* mouse sobre o link */
			a:hover
			{
				color: red;
			}

			#divMenu
			{
				float:left;
				width: 220px;
				border: 5px outset blue;
				background-color: lightblue;    
				text-align: center;
				margin-left: 10px;
				margin-right: 10px;
				padding: 5px;
				border-radius: 25px;	
			}

			#divLogin
			{	
				position: absolute; /* posição absoluta ao elemento pai, neste caso o BODY */
				/* divLogin no meio, tanto em relação a esquerda como ao topo */
				left: 50%; 
				top: 50%;
				width: 300px; /* Largura da DIV */
				height: 250px; /* Altura da DIV */
				/* A margem a esquerda deve ser menos a metade da largura */
				/* A margem ao topo deve ser menos a metade da altura */
				/* Fazendo isso, centralizará a DIV */
				margin-left: -150px;
				margin-top: -125px;
				color: white;
				background-color: MidNightBlue;
				text-align: center; /* Centraliza o texto */
				z-index: 100; /* Faz com que fique sobre todos os elementos da página */
				opacity: 1;
				border-radius: 25px;
			}
			
			#divCadastro
			{
				position: absolute; /* posição absoluta ao elemento pai, neste caso o BODY */
				/* divLogin no meio, tanto em relação a esquerda como ao topo */
				left: 50%; 
				top: 50%;
				width: 400px; /* Largura da DIV */
				height: 340px; /* Altura da DIV */
				/* A margem a esquerda deve ser menos a metade da largura */
				/* A margem ao topo deve ser menos a metade da altura */
				/* Fazendo isso, centralizará a DIV */
				margin-left: -200px;
				margin-top: -170px;
				color: white;
				background-color: MidNightBlue;
				text-align: center; /* Centraliza o texto */
				z-index: 100; /* Faz com que fique sobre todos os elementos da página */
				opacity: 1;
				padding: 10px;
				border-radius: 25px;
			}

			#transp
			{
				position: absolute; /* posição absoluta ao elemento pai, neste caso o BODY */
				/* divLogin no meio, tanto em relação a esquerda como ao topo */
				left: 0%;
				top: 0%;
				width: 100%; /* Largura da DIV */
				height: 120%; /* Altura da DIV */
				/* A margem a esquerda deve ser menos a metade da largura */
				/* A margem ao topo deve ser menos a metade da altura */
				/* Fazendo isso, centralizará a DIV */
				
				color: white;
				background-color: black;
				text-align: center; /* Centraliza o texto */
				z-index: 1; /* Faz com que fique sobre todos os elementos da página */
				opacity: 0.5;
			}	

		</style>
		
		<link rel="shortcut icon" href="./favicon.ico" />
		
	</head>

	<body onload="testarSessao();verProdutos()">
	
	<marquee>Projeto Integrador Transdiciplinar 2 - 8º sem - Eng. de SW - UNICSUL</marquee>


	
	<div class="divMenu" id="divMenu"><a href="#"><h3 id="h3_ok" onclick="exibeOculta('tagOculta')" >Fazer Login</h3></a>
	</div>
	<div class="divMenu" id="divMenu"><a href="#"><h3 id="h3_ok2" onclick="exibeOculta('tagOculta2')" >Fazer Cadastro</h3></a></div>
	
	<div id='tagOculta' style="display:none;">
		
		<div id="transp" > </div>
		<div id="divLogin" > 
			
			<div align="right"><a href="javascript:exibeOculta('tagOculta');"><button id="fechar" ><b>X</b></button></a>
			</div>

			<div class="">
				
				<form name="login" action = "controller/controller.php" method = "GET" target="iframe_login">
					
				<label>Nome : <input type = "text" name='user' id='user' /></label><br>

				<label>Senha : <input type = "password" name='pass' id='pass'  /></label><br><br>

				<input type = "hidden" id="metodoLogin" name='metodo' value='login' /><!-- passa o metodo acao   -->

				<input type = "submit" value ="LOGIN"/>

				</form>
							
			</div>
			<iframe id="iframe_login" name="iframe_login" align="center" width="250px" height="80px" style="border:1px solid red; background-color: DarkGray;" ></iframe>
		</div>
	</div>



	<div id='tagOculta2' style="display:none;">
		
		<div id="transp" > </div>
		<div id="divCadastro" > 
			
			<div align="right"><a href="javascript:exibeOculta('tagOculta2');"><button id="fechar" ><b>X</b></button></a></div>

			<div class="" align="right" style="border:0px solid red;">

				<form name="cadastroAtualizar" action = "controller/controller.php" method = "GET" target="iframe_cadastro">
					
					<label>Nome de Usuario: <input type = "text" name='userCad' id='userCad' /></label><br>

					<label>Senha: <input type = "password" name='passCad' id='passCad'  /></label><br>
					
					<label>Senha: <input type = "password" name='XpassCad' id='XpassCad' onblur="validarSenha()"  /></label><br>

					<label>Nome Completo: <input type = "text" name='nomeCompleto' id='nomeCompleto' /></label><br>
					
					<label>Endereco para entrega: <input type = "text" name='endereco' id='endereco'  /></label><br>
					
					<label>DDD Celular:
					<input type = "text" name='celular' id='celular' maxlength="14" placeholder="Digete os 11 digitos" onkeyup="formatarTelefone(this)" onblur="testeTamanho3(this)" />
					</label><br>
					
					<label>Email: <input type = "text" name='email' id='email' placeholder="abc@xyz.com ou .br" onblur="validarEmail(this)" /> </label><br><br>
					
					<input type = "hidden" id="metodoCad" name='metodo' value='cadastrar' /><!-- passa o metodo bemVindo   -->
					
					<input type = "submit" id='btnCad'  value ="CADASTRAR"/>
				</form>
								
			</div>

		<iframe id="iframe_cadastro" name="iframe_cadastro" align="center" width="300px" height="80px" style="border:1px solid red;" ></iframe>

		</div>

	</div>

	
	
	<div class="divMenu" id="divMenu">		  
		<button onclick="verProdutos()">VER PRODUTOS</button>		
	</div>	
	
	<div class="divMenu" id="divMenu">		  
		<button onclick="consultaCompra()">CONSULTAR COMPRAS</button>		
	</div>	

	<div class="divMenu" id="divMenu">		  
		<button onclick="terminarSessao()">SAIR</button>		
	</div>
	
	
	
	<!-- o resultado deve ser exibido aqui, ao invés de atualizar a página -->
	<iframe name="target_iframe" id="target_iframe" style="z-index: 1; border:0px solid red;" width="100%" height="100%"></iframe>



	<!-- ESTE SCRIPT DEVE SER CARREGADO AO FINAL DO DOCUMENTO PARA FUNCIONAR -->
	<script>

		function exibeOculta(element)
		{

			let display = document.getElementById(element).style.display;

			if(display == "none")
			{
				document.getElementById(element).style.display = 'block';
				document.getElementById("user").focus();
				//document.body.style.backgroundColor = "Gray";
			}
			else 
			{
				document.getElementById(element).style.display = 'none';
				//document.body.style.backgroundColor = "DarkGray";
			}

		}
		
	</script>

	<script>
		function consultaCompra()
		{

			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function()
			{

				if (this.readyState == 4 && this.status == 200)
				{

					let pegaTag1 = this.responseText;		//igual ao da pagina index.php

					if (pegaTag1 != "")
					{
						//alert(pegaTag1+"1");
						//bom metodo para carregar iframe - pelo retorno do ajax da promblema
						document.getElementById("target_iframe").src = "controller/controller.php?metodo=ConsultaHistorico";
					}
					else
					{
						//document.getElementById("pagina").innerHTML = 'nao!!! '+pegaTag1;
						alert("Faça Login");
					}

				}

			};
			xhttp.open("GET", "controller/controller.php?metodo=testSessao", true);//cria um novo numero de compra na secao
			xhttp.send();
		}
		
	</script>

	<script>

		//pega o texto quando o iframe carrega pelo botao login
		function testCarrinho()
		{
			try
			{

				let frame = document.getElementById("target_iframe");
				
				//se conseguir carregar o innerHTML a funcao nao faz nada do contrario catch
				let carrinho = frame.contentWindow.document.getElementById("carrinho").innerHTML;
			
			}
			catch(err)
			{
			  	//bom metodo para carregar iframe - pelo retorno do ajax da promblema para executar funcao
				document.getElementById("target_iframe").src = "controller/controller.php?metodo=listarProduto";
			}
			
		}
		
	</script>

	<script>
		
		//pega o texto quando o iframe carrega pelo botao login
		function testLogin()
		{

			let frame = document.getElementById("iframe_login");
			
			let pegaBody = frame.contentWindow.document.getElementsByTagName("body")[0].innerHTML;
			if (pegaBody == false)
			{
				return;	//caso o frame esteja vazio encerra a funcao testLogin			
			}

			//o numero[x] entra na tag - o numero[0] pega todas
			pegaTag1 = frame.contentWindow.document.getElementsByTagName("div")[2].innerHTML;
			pegaTag2 = frame.contentWindow.document.getElementsByTagName("div")[3].innerHTML;
			pegaTag3 = frame.contentWindow.document.getElementsByTagName("div")[4].innerHTML;
			pegaTag4 = frame.contentWindow.document.getElementsByTagName("div")[5].innerHTML;
			pegaTag5 = frame.contentWindow.document.getElementsByTagName("div")[6].innerHTML;
			pegaTag6 = frame.contentWindow.document.getElementsByTagName("div")[7].innerHTML;
			pegaTag7 = frame.contentWindow.document.getElementsByTagName("div")[8].innerHTML;	
			//document.write(pegaTag1);
			//document.getElementById("h3_ok").innerHTML = pegaTag1;
			
			//verifica o verifica o conteudo do iframe para executar uma acao
			if(pegaTag1 == 'COM SUCESSO')
			{
				document.getElementById("h3_ok").innerHTML = 'LOGADO! '+pegaTag2+' '+pegaTag5;
				exibeOculta('tagOculta');
				testCarrinho();//se o carrinho estiver visivel - nao atualiza o frame
				
				document.getElementById("userCad").value 		= pegaTag2;
				document.getElementById("passCad").value 		= pegaTag3;
				document.getElementById("XpassCad").value 		= pegaTag3;
				document.getElementById("nomeCompleto").value	= pegaTag4;
				document.getElementById("endereco").value 		= pegaTag5;
				document.getElementById("celular").value 		= pegaTag6;
				document.getElementById("email").value 			= pegaTag7;

				document.getElementById("h3_ok2").innerHTML 	= 'ATUALIZAR DADOS';
				document.getElementById("metodoCad").value 		= 'atualizar';
				document.getElementById("btnCad").value 		= 'ATUALIZAR';
				
			}
	
		}
		
	</script>

	<script>

		function testarSessao()
		{

			let xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function()
			{

				if (this.readyState == 4 && this.status == 200)
				{

					
					if (this.responseText != "")
					{

						let frame = document.getElementById("iframe_login");
					
						//preenche o iframe com a resposta do servidor ao carregar a pagina
						frame.contentWindow.document.getElementsByTagName("body")[0].innerHTML = this.responseText;
					
						pegaTag1 = frame.contentWindow.document.getElementsByTagName("div")[2].innerHTML;
						pegaTag2 = frame.contentWindow.document.getElementsByTagName("div")[3].innerHTML;
						pegaTag3 = frame.contentWindow.document.getElementsByTagName("div")[4].innerHTML;
						pegaTag4 = frame.contentWindow.document.getElementsByTagName("div")[5].innerHTML;
						pegaTag5 = frame.contentWindow.document.getElementsByTagName("div")[6].innerHTML;
						pegaTag6 = frame.contentWindow.document.getElementsByTagName("div")[7].innerHTML;
						pegaTag7 = frame.contentWindow.document.getElementsByTagName("div")[8].innerHTML;

						document.getElementById("h3_ok").innerHTML = 'LOGADO!! '+pegaTag2+' '+pegaTag5;
						
						document.getElementById("userCad").value 		= pegaTag2;
						document.getElementById("passCad").value 		= pegaTag3;
						document.getElementById("XpassCad").value 		= pegaTag3;
						document.getElementById("nomeCompleto").value	= pegaTag4;
						document.getElementById("endereco").value 		= pegaTag5;
						document.getElementById("celular").value 		= pegaTag6;
						document.getElementById("email").value 			= pegaTag7;

						document.getElementById("h3_ok2").innerHTML 	= 'ATUALIZAR DADOS';
						document.getElementById("metodoCad").value 		= 'atualizar';
						document.getElementById("btnCad").value 		= 'ATUALIZAR';
					}

				}

			};
			xhttp.open("GET", "controller/controller.php?metodo=testSessao", true);
			xhttp.send();
		}

	</script>
	
	<script>

		function testeAtualizarDados()
		{
			
			let frame = document.getElementById("iframe_cadastro");
			pegaTag1 = frame.contentWindow.document.getElementsByTagName("div")[2].innerHTML;
			//alert(pegaTag1);

			if(pegaTag1 == 'ATUALIZADO COM SUCESSO!')
			{
				setTimeout(recarregarPagina, 2000);
				//alert(pegaTag1);
			}
			

		}

	</script>

	<script>

		function terminarSessao()
		{

			let xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function()
			{

				if (this.readyState == 4 && this.status == 200)
				{

					recarregarPagina();

				}

			};
			xhttp.open("GET", "controller/controller.php?metodo=encerrarSessao", true);
			xhttp.send();
		}

	</script>

	
	<script>
	
		function verProdutos()
		{
			//carregado pelo body onload
			document.getElementById("target_iframe").src = "controller/controller.php?metodo=listarProduto";
		}
		
	</script>

	<script>
	
		function recarregarPagina()
		{
			window.location.reload(true);
		}
		
	</script>
	
	<script>

		//define a borda da div - nao consegui pelo CSS e aqui eh mais simples
		//document.getElementById("divLogin").style.borderRadius = "25px";

		//define a borda da div - nao consegui pelo CSS e aqui eh mais simples
		//document.getElementById("divCadastro").style.borderRadius = "25px";

		//pega a tag pela "id" fica ouvindo quando trocar ou carregar "change, load" etc... executa a funcao
		document.getElementById("iframe_login").addEventListener("load", testLogin); 
		document.getElementById("iframe_cadastro").addEventListener("load", testeAtualizarDados);
		
	</script>

	<script>

		function formatarTelefone(param)
		{

			var v=param.value.replace(/\D/g,"");//so aplica o replace se a primeira for verdade
			    
			v=v.replace(/^(\d{2})(\d)/g,"($1)$2"); 

			v=v.replace(/(\d{5})(\d)/,"$1-$2");
			    
			param.value = v;

		}

	</script>

	<script>
	 
		//o parametro indica quem chamou a funcao mesmo sem id - deve ser concatenado com um atributo
		function testeTamanho3(param)
		{

			//obrigario quantida de Caracteres
			let text3 = param.value;//concatenado com um atributo
			let pattern3 = /^.{14}$/ig;
			let result3 = text3.match(pattern3);

			if(result3 != null)
			{
				//nao faz nada caso OK
				//document.getElementById("demo3").innerHTML = result3 + typeof(result3);
			}
			else
			{
				param.value = null;
				//document.getElementById("demo3").innerHTML = "erro3" + result3 + text3;
			}
		}
	    
	</script>

	
	<script>
	 
		//o parametro indica quem chamou a funcao mesmo sem id - deve ser concatenado com um atributo
		function validarEmail(param)
		{

			//obrigario final ".com" ou ".br"
			let text3 = param.value;//concatenado com um atributo
			let pattern3 = /.+(@).+(\.com$|\.br$)/ig;
			let result3 = text3.match(pattern3);

			if(result3 != null)
			{
				//nao faz nada caso OK
				//document.getElementById("demo3").innerHTML = result3 + typeof(result3);
			}
			else
			{
				param.value = null;
				//document.getElementById("demo3").innerHTML = "erro3" + result3 + text3;
			}
		}
	    
	</script>
	
	<script>
	 
		//o parametro indica quem chamou a funcao mesmo sem id - deve ser concatenado com um atributo
		function validarSenha()
		{

			//obrigario final ".com" ou ".br"
			let XpassCad 	= document.getElementById("XpassCad").value;
			let passCad 	= document.getElementById("passCad").value;
			
			if(XpassCad != passCad)
			{
				alert("As senhas nao sao iguais!!!");
			}
			
		}
	    
	</script>

	

</body>
</html>




