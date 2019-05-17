<?php
include_once "header.php";
?>
<?php
if(!logged_in()) {
    redirect("logout.php");
}
$proj = $_GET['proj'];
$projr = $_GET['projr'];
$email = $_SESSION['email'];
if (!empty($proj)){
    if ($proj > 0){
        $resultado = LerProjeto($email,$proj);
        if ($resultado != null ){
            $query = $resultado->fetch_assoc();
            $titulo =  $query["titulo"];
            $data = $query["date_added"];
            $resultadorel = ListProjetoRel($email, $query["id"]);
            if ($resultadorel != null ){
                $numtest = $resultadorel->num_rows;
                while ($queryrel = $resultadorel->fetch_assoc()){
                    $testesuss = $queryrel["resultado"];
                    $sucesso = 0;
                    $negativo = 0;
                    if ($testesuss > 0 ){
                        $sucesso = $sucesso + 1;
                    }else{
                        $negativo = $negativo + 1;
                    }
                }
                $percsucess = ($sucesso / $numtest) * 100;
            }
        }
    }
}

if (!empty($projr)){
    if ($projr > 0){

    }
}


?>
<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Nome do Projeto - <?php echo $titulo ?></h3>
							<p class="panel-subtitle">Criação: <?php
                                $date = new DateTime($data);
                                echo $date->format('d/m/Y H:i:s') ?></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download"></i></span>
										<p>
											<span class="number"><?php echo $numtest ?></span>
											<span class="title">Uploads</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number"><?php echo $numtest ?></span>
											<span class="title">Testes</span>
										</p>
									</div>
								</div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-eye"></i></span>
                                        <p>
                                            <span class="number"><?php echo $sucesso ?>/<?php echo $negativo ?></span>
                                            <span class="title">Positivo/Negativo</span>
                                        </p>
                                    </div>
                                </div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number"><?php echo $percsucess ?>%</span>
											<span class="title">Sucesso(%)</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Avaliações Recentes</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Id</th>
												<th>Titulo</th>
												<th>Arquivos</th>
												<th>Data &amp; Hora</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
                                        <?php
                                        if (!empty($proj)){
                                            if ($proj > 0){
                                                $resultado = LerProjeto($email,$proj);
                                                if ($resultado != null ){
                                                    $query = $resultado->fetch_assoc();
                                                    $resultadorel = ListProjetoRel($email, $query["id"]);

                                                    if ($resultadorel != null ){
                                                        $numtest = $resultadorel->num_rows;
                                                        while ($queryrel = $resultadorel->fetch_assoc()){
                                                            $testesuss = $queryrel["resultado"];
                                                            $date = new DateTime($queryrel["date_added"]);
                                                            echo '<tr>';
                                                            echo '<td><a href="#">'.$queryrel["id"].'</a></td>';
                                                            echo '<td>'.$queryrel["titulo"].'</td>';
                                                            echo '<td>';

                                                            $path = "uploads/" . $titulo . '/';
                                                            $diretorio = dir($path);
                                                            while($arquivo = $diretorio -> read()){
                                                                $core_path_info = pathinfo($path.$arquivo);
                                                                if (!empty($core_path_info['extension'])) {
                                                                    echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
                                                                }
                                                            }
                                                            $diretorio -> close();

                                                            $path = "uploads/" . $titulo . '/'. $queryrel["id"] .'/';
                                                            $diretorio = dir($path);
                                                            while($arquivo = $diretorio -> read()){
                                                                $core_path_info = pathinfo($path.$arquivo);
                                                                if (!empty($core_path_info['extension'])) {
                                                                    echo "<a href='".$path.$arquivo."'> Relatorio Androbugs ".$arquivo."</a><br />";
                                                                }
                                                            }
                                                            $diretorio -> close();

                                                            echo '</td>';
                                                            echo '<td>'.$date->format('d/m/Y H:i:s').'</td>';
                                                            if ($testesuss > 0 ){
                                                                echo '<td><span class="label label-success">COMPLETED</span></td>';
                                                            }else{
                                                                echo '<td><span class="label label-success">COMPLETED</span></td>';
                                                            }
                                                            echo '</tr>';
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Ultimas Avaliações</span></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->

<?php
include_once "footer.php";
?>