<?php
    class View {
        public static function show($viewName, $data=null) {
            include("views/header.php");
            include("views/$viewName.php");
            include("views/footer.php");  
        }

        public static function redirect($controller, $actionName, $data=null) {
            $url = "<script>location.href='index.php?controller=$controller&do=$actionName";
            if ($data != null) {
                foreach ($data as $clave=>$valor) {
                    $url = $url . "&" . $clave . "=" . $valor;
                }
            }
            $url = $url . "'</script>";
            echo $url;
        }
    }