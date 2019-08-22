<?php 
$memberinfo=getMemberInfo();
$usergroup=$memberinfo['group'];
switch ($usergroup) {
	case 'Admins':
		# code...
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Industries">
    <a class="nav-link" href="industries_view.php">
    <i class="fa fa-fw fa-building"></i>
    <span class="nav-link-text">Industries</span>
    </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categories">
    <a class="nav-link" href="categories_view.php">
    <i class="fa fa-fw fa-pie-chart"></i>
    <span class="nav-link-text">Categories</span>
    </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Proposals">
    <a class="nav-link" href="proposals_view.php">
    <i class="fas fa-arrow-right"></i>
    <span class="nav-link-text">Proposals</span>
    </a>
    </li>';
    break;
    default:
    # code...
    echo '<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Proposals">
    <a class="nav-link" href="proposals_view.php">
    <i class="fa fa-fw fa-whatsapp"></i>
    <span class="nav-link-text">Proposals</span>
    </a>
    </li>';
    break;
}


?>