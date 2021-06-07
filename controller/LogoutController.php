<?php

class LogoutController {

    public function execute() {
        session_destroy();
        header("Location: /tpFinalGrupo13");
        exit();
    }
}
