<?php
 require_once "../conexcionDataBase.php";
 if(isset($_POST["Fecha"]) && isset($_POST["Medio"]) && isset($_POST["Titular"]) && isset($_POST["Periodista"]) && isset($_POST["Impacto"]) && isset($_POST["Comentarios"]) && isset($_POST["Recomendaciones"]) && isset($_POST["Fuente"])){
    //Establecer codigo de la noticia
        $CodNoticia = $_POST["CodNoticia"];    
    //Establecer fecha noticia
        $Fecha = $_POST["Fecha"];
    //Establecer medio noticia
        $Medio = $_POST["Medio"];
    //Establecer titular noticia
        $Titular = $_POST["Titular"];
    //Establecer espacio noticia
        $Espacio = $_POST["Espacio"];
    //Establecer Periodista noticia
        $Periodista = $_POST["Periodista"];
    //Establecer impacto noticia
        $Impacto = $_POST["Impacto"];
    //Establecer comentarios noticia
        $Comentarios = $_POST["Comentarios"];
    //Establecer recomendaciones noticia
        $Recomendaciones = $_POST["Recomendaciones"];
    //Establecer fuente noticia
        $Fuente = $_POST["Fuente"];
    //Establecer enlace adicional noticia
        $EnlaceAdicional = $_POST["FuenteAdicional"];    


    //Establecer archivo adjunto noticia
        if (isset($_FILES) && $_FILES != null) {            
            //registrar con archivo
            $carpeta = "../../storage/";
            $archivoBuscado = $CodNoticia;            
            $NombreArchivo = $_FILES["ArchivoAdjunto"]["name"];
            $NuevoNombre = $CodNoticia;
            $temporal = $_FILES["ArchivoAdjunto"]["tmp_name"];
            $Extension = pathinfo($NombreArchivo, PATHINFO_EXTENSION);
            $NuevoNombreCompleto = $NuevoNombre . "." . $Extension;
            if(!file_exists("../../storage/")){
                mkdir("../../storage/", 0777, true);            
            }
            //Eliminar archivo preexistente
                $archivosDeLaCarpeta = scandir($carpeta);
                foreach($archivosDeLaCarpeta as $archivo){
                    $rutaArchivo = $carpeta . $archivo;
                    if(is_file($rutaArchivo)){
                        $infoArchivo = pathinfo($rutaArchivo);
                        $nombreArchivo = $infoArchivo["filename"];
                        if($nombreArchivo === $archivoBuscado){
                            unlink($rutaArchivo);
                        }
                    }
                }
            //Subir archivo
                move_uploaded_file($temporal, "../../storage/" . $NuevoNombreCompleto);
            //Registrar en tabla noticia
                $stmt3 = conection::conectar()->prepare("UPDATE noticia SET FechaNoticia='$Fecha', Medio='$Medio', Titular='$Titular', Espacio='$Espacio', Periodista='$Periodista', Impacto='$Impacto', ComentarioArticulo='$Comentarios', Recomendaciones='$Recomendaciones', FuenteNoticia='$Fuente', ArchivoAdjunto='$NuevoNombreCompleto', EnlaceAdicional='$EnlaceAdicional' WHERE CodNoticia='$CodNoticia'");    
                $stmt3 -> execute();   

        }else{
            //registrar sin archivo
                $stmt3 = conection::conectar()->prepare("UPDATE noticia SET FechaNoticia='$Fecha', Medio='$Medio', Titular='$Titular', Espacio='$Espacio', Periodista='$Periodista', Impacto='$Impacto', ComentarioArticulo='$Comentarios', Recomendaciones='$Recomendaciones', FuenteNoticia='$Fuente', EnlaceAdicional='$EnlaceAdicional' WHERE CodNoticia='$CodNoticia'");    
                $stmt3 -> execute();   
        } 
     //retornar registro exitoso    
         echo(1);
 }else{
     //retornar error
         echo("Fallo al registrar");
 };
 ?>