<?php

if (is_session_started() === FALSE) {
	session_start();
}
session_destroy();
echo '<script type="text/javascript">
					window.location.href = "ingreso";
					</script>';exit();