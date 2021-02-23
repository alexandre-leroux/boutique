<?php

require_once('../View/view_Admin.php');
include('../models/Model.php');

$admin = new Model();

$req_all_users = $admin->SelectAll('utilisateurs');

View_Admin_Update::affiche_all_user($req_all_users);


