<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {{Html::image('dist/img/user2-160x160.jpg','User Image',['class'=>'img-circle'])}}
            </div>
            <div class="pull-left info">
                <p>Administrator</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active treeview">
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Setup Data</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/dashboard/expenes-types"><i class="fa fa-file-text"></i> Expenes Types</a></li>
                    <li><a href="/dashboard/revenue-types"><i class="fa fa-file-text"></i> Revenue Type</a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Post Data</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/dashboard/revenues"><i class="fa fa-files-o"></i>Revenues</a></li>
                    <li><a href="/dashboard/expenes"><i class="fa fa-files-o"></i> Expendes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Report</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/"><i class="fa fa-files-o"></i>Revenues</a></li>
                    <li><a href="/"><i class="fa fa-files-o"></i> Expendes</a></li>
                    <li><a href="/dashboard/statements"><i class="fa fa-book"></i> Income Statemt</a></li>
                </ul>
            </li>




            <!-- <li class="treeview">
                <a href="/dashboard/revenues">
                    <i class="fa fa-files-o"></i> <span>Revenues</span>
                </a>
            </li>
            <li class="treeview">
                <a href="/dashboard/expenes">
                    <i class="fa fa-files-o"></i> <span>Expenes</span>
                </a>
            </li> -->





           <!--  <li class="treeview">
                <a href="/dashboard/statements">
                    <i class="fa fa-book"></i> <span>Statments</span>
                </a>
            </li> -->
            <li class="treeview">
                <a href="/dashboard/users">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
            
            <li class="treeview">
                <a href="/logout">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
