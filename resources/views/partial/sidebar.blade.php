<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{ route('index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Company</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('company.create') }}"><i class="fa fa-angle-double-right"></i> Create</a></li>
                    <li><a href="{{ route('company.index') }}"><i class="fa fa-angle-double-right"></i> List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Branch</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('branch.create') }}"><i class="fa fa-angle-double-right"></i> Create</a></li>
                    <li><a href="{{ route('branch.index') }}"><i class="fa fa-angle-double-right"></i> List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Department</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('department.create') }}"><i class="fa fa-angle-double-right"></i> Create</a></li>
                    <li><a href="{{ route('department.index') }}"><i class="fa fa-angle-double-right"></i> List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Designation</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('designation.create') }}"><i class="fa fa-angle-double-right"></i> Create</a></li>
                    <li><a href="{{ route('designation.index') }}"><i class="fa fa-angle-double-right"></i> List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Employee</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('employee.create') }}"><i class="fa fa-angle-double-right"></i> Create</a></li>
                    <li><a href="{{ route('employee.index') }}"><i class="fa fa-angle-double-right"></i> List</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
