
<div id="layoutSidenav_nav">

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="bienvenida.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Inicio</a>
                                
                                <?php if($rol == 1){ ?>

                            <div class="sb-sidenav-menu-heading">Administrar</div>
                           


                            <!-- DATOS DE CULTIVO -->
                            <a class="nav-link" href="Cultivo.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-seedling"></i></div>
                                Cultivos</a>


                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages" href="Cultivo.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-water"></i></div>
                                Terrenos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="T_Becal.php">Becal</a>
                                                <a class="nav-link" href="T_Dzitbalché.php">Dzitbalché</a>
                                                <a class="nav-link" href="T_Calkiní.php">Calkiní</a>
                                                <a class="nav-link" href="T_Helcelchakán.php">Helcelchakán</a>
                                                <a class="nav-link" href="T_ChunHuas.php">ChunHuas</a>
                                                <a class="nav-link" href="T_Xcolok.php">Xcolok</a>
                                                <a class="nav-link" href="T_Tepakan.php">Tepakan</a>
                                                <a class="nav-link" href="T_Maxcanu.php">Maxcanu</a>
                                                <a class="nav-link" href="T_Halacho.php">Halacho</a>
                                            </nav>
                                </div>
                            <?php } ?>

                            <div class="sb-sidenav-menu-heading">VISTAS</div>
                            <a class="nav-link" href="Graficas.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Graficas</a
                            ><a class="nav-link" href="Tablas.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tablas</a
                            >
                            <a class="nav-link" href="Reportes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-signature"></i></div>
                                Reportes</a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <center>
                            <img src="images/LogoPlantaTech.png" alt="" class="logo" width="80px" height="80px">
                        </center>
                    </div>
                </nav>
            </div>