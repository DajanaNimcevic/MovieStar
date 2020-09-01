<?php

require_once ("includes/db_config.php");
session_unset();
session_destroy();
header('Location: index.php');