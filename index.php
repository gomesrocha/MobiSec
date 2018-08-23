<?php
include_once "includes/init.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MobiSec - <?php echo $lang['PAGE_TITLE']; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="#">
                  <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><a href="index.php" class="navbar-brand"><img src="img/LOGO.png" alt="MobiSec" height="40px" /></a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="index.php" class="nav-link active "><?php echo $lang['MENU_HOME']; ?></a>
              </li>
              <li class="nav-item"><a href="login.php" class="nav-link "><?php echo $lang['MENU_LOGIN']; ?></a>
              </li>
            </ul>
            <ul class="langs navbar-text">
			  <a href="index.php?lang=us"><img src="images/us.png" /></a>
			  <a href="index.php?lang=br" class="active"><img src="images/br.png" /></a>
			  <a href="index.php?lang=es"><img src="images/es.png" /></a>
			</ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Hero Section-->
    <section style="background: url(img/hero.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h1><?php echo $lang['INDEX_HEADING_TITLE']; ?></h1>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
      </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="h3">Resumo da Ferramenta</h2>
            <p class="text-big">A ferramenta MobiSec que est&aacute; em desenvolvimento e tem como objetivo realizar testes de software em aplica&ccedil;&otilde;es m&oacute;veis no sistema operacional Android. A realiza&ccedil;&atilde;o de testes &eacute; um processo demorado&nbsp; e sua automatiza&ccedil;&atilde;o &eacute; uma alternativa interessante e tecnicamente vi&aacute;vel para as softwares house. A automa&ccedil;&atilde;o de testes pode aumentar os processos devido a elabora&ccedil;&atilde;o de planos de teste, por&eacute;m diminui o tempo para sua execu&ccedil;&atilde;o, proporcionando benef&iacute;cios futuros para a gest&atilde;o.&nbsp;</p>
          </div>
        </div>
      </div>
    </section>
    <section class="featured-posts no-padding-top">
      <div class="container">
        <!-- Post-->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                    <h2 class="h4">Ms. Fabio Gomes Rocha</h2></a>
                </header>
                <p>Doutorando em Educa&ccedil;&atilde;o - Unit, Mestre em Ci&ecirc;ncias da Computa&ccedil;&atilde;o - UFS, Professor Adjunto 1 do Departamento de Computa&ccedil;&atilde;o da Universidade Tiradentes e pesquisador em Engenharia de Software, Software Livre, Educa&ccedil;&atilde;o a Distancia e tecnologia educacional, com experi&ecirc;ncia na &aacute;rea de Ci&ecirc;ncia da Computa&ccedil;&atilde;o, com &ecirc;nfase em Desenvolvimento de Sistemas Para Educa&ccedil;&atilde;o a Dist&acirc;ncia, atuando principalmente nos seguintes temas: tecnologia da informa&ccedil;&atilde;o, engenharia de software, educa&ccedil;&atilde;o a distancia e educa&ccedil;&atilde;o. Possui certifica&ccedil;&atilde;o Scrum Master e Scrum Professional pela ScrumAlliance.</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/fabio.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>Fabio Gomes Rocha</span></div></a>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="img/fabio_2.jpg" alt="..."></div>
        </div>
        <!-- Post        -->
        <div class="row d-flex align-items-stretch">
          <div class="image col-lg-5"><img src="img/mariano_2.jpg" alt="..."></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                    <h2 class="h4">Bel. Mariano Florencio Mendon&ccedil;a</h2></a>
                </header>
                <p>Bacharel em Sistemas de Informa&ccedil;&atilde;o &ndash; Universidade Tiradentes (Unit), Membro do Grupo de Pesquisa Interdisciplinar em Tecnologia da Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o (GPITIC) &ndash; Universidade Tiradentes (Unit), Desenvolvedor de Software na Compusa Software.</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/mariano.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>Mariano Florencio Mendon&ccedil;a</span></div></a>
                </footer>
              </div>
            </div>
          </div>
        </div>
        <!-- Post                            -->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                    <h2 class="h4">Bela. Layse Santos Souza </h2></a>
                </header>
                <p>Bacharela em  Ci&ecirc;ncia da Computa&ccedil;&atilde;o &ndash; Universidade Tiradentes (Unit), Membro do Grupo de Pesquisa Interdisciplinar em Tecnologia da Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o (GPITIC) &ndash; Universidade Tiradentes (Unit).</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/layse.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>Layse Santos Souza</span></div></a>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="img/layse_2.jpg" alt="..."></div>
        </div>
        <!-- Post        -->
        <div class="row d-flex align-items-stretch">
          <div class="image col-lg-5"><img src="img/isadora_2.jpg" alt="..."></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                    <h2 class="h4">Bela. Isadora Lima do Nascimento</h2></a>
                </header>
                <p>Bacharela em  Ci&ecirc;ncia da Computa&ccedil;&atilde;o &ndash; Universidade Tiradentes (Unit), Membro do Grupo de Pesquisa Interdisciplinar em Tecnologia da Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o (GPITIC) &ndash; Universidade Tiradentes (Unit).</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/isadora.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>Isadora Lima do Nascimento</span></div></a>
                </footer>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Page Footer-->
    <footer class="main-footer">
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>&copy; 2017. MobiSec</p>
            </div>
            <div class="col-md-6 text-right">
              <p>GPITIC
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>