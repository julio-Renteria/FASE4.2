   <!-- Left Panel -->
   <aside id="left-panel" class="left-panel">
       <nav class="navbar navbar-expand-sm navbar-default">
           <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                   <li class="active">
                       <a href="ingUser.html"><i class="menu-icon fa fa-laptop"></i>Inicio</a>
                   </li>
                   <li class="menu-title">Menu</li><!-- /.menu-Notas -->
                   <li class="menu-item-has-children dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-address-book"></i>Notas</a>
                       <ul class="sub-menu children dropdown-menu">
                           <li><i class="menu-icon fa fa-list"></i><a href="conNotas.html">Consultar Notas</a></li>
                           <li><i class="menu-icon fa fa-list"></i><a href="#">Exportar Notas</a></li>
                       </ul>

                       <!--menu de tareas-->
                   </li>
                   <li class="menu-item-has-children dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-check"></i>Tareas</a>
                       <ul class="sub-menu children dropdown-menu">
                           <li><i class="fa fa-table"></i><a href="./html/conNotas.html">consultar Tareas</a></li>
                           <li><i class="fa fa-table"></i><a href="#">Exportar Tareas</a></li>
                       </ul>
                   </li>
                   <!--menu de faltas-->
                   <li class="menu-item-has-children dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-search"></i>Faltas</a>
                       <ul class="sub-menu children dropdown-menu">
                           <li><i class="menu-icon fa fa-th"></i><a href="./html/conNotas.html">Consultar Faltas</a></li>
                           <li><i class="menu-icon fa fa-th"></i><a href="#">Exportar Faltas</a></li>
                       </ul>
                   </li>

                   <!--<li class="menu-title">Icons</li> <!/.CLASE DE TITULO EN MENU -->

                   <!--menu de Horarios-->
                   <li class="menu-item-has-children dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>Horarios</a>
                       <ul class="sub-menu children dropdown-menu">
                           <li><i class="menu-icon fa fa-calendar"></i><a href="./conHorarios.html">Consultar Horarios</a></li>
                           <li><i class="menu-icon fa fa-calendar"></i><a href="#">Agendar Horario</a></li>
                       </ul>
                   </li>
           </div>
       </nav> <!-- /.navbar-collapse -->
   </aside>


   <!-- /#left-panel -->
   <!-- Right Panel -->
   <div id="right-panel" class="right-panel">
       <!-- Header-->
       <header id="header" class="header">
           <div class="top-left">
               <div class="navbar-header">
                   <a class="navbar-brand" href="./"><img src="../images/logo.svg" alt="Logo"></a>
                   <a class="navbar-brand hidden" href="./"><img src="../images/logoN.png" alt="Logo"></a>
                   <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
           </div>
           <div class="top-right">
               <div class="header-menu">
                   <div class="header-left">
                       <button class="search-trigger"><i class="fa fa-search"></i></button>
                       <div class="form-inline">
                           <form class="search-form">
                               <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                               <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                           </form>
                       </div>