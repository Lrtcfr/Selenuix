<?php

/**
 * 
 *  @param   $options['file'] // tableau de fichier 
 *  @param   $options['type'] // type de fichier 
 *  @param   $options['show'] // bool true/false vue des fichier // default true
 *  @param   $options['path'] // dossier de chargement de fichier // default Public
 *  @param   $options['Partials'] // Chemin de fichier // different partie header ?? footer
 *
 */
function html($options = []){

    $arg      = isset($options['file']) ? $options['file'] : null;
    $type     = isset($options['type']) ? $options['type'] : null;
    
    $show     = isset($options['show']) ? $options['show'] : true;
    $path     = isset($options['path']) ? $options['path'] : 'Public';
    $partials = isset($options['Partials']) ? $options['Partials'] : 'Partials';


    if ($type == 'css') {

        if (@$options['arg'] == 'link') {

            foreach ($options['options'] as $key => $value) {
                echo "<link rel='stylesheet' type='text/css' href='{$value}'>";
            }

        } else {

            if ($show == true) {
                checkType($path,$type,$arg);
            }

        }

    } else if ($type == 'js') {

        if (@$options['arg'] == 'link') {

            foreach ($options['options'] as $key => $value) {
                echo "<script type='text/javascript' src='{$value}'></script>";
            }

        } else {

            if ($show == true) {
                checkType($path,$type,$arg);
            }

        }

    } else if ($type = 'html') {

        $file = ROOT. $partials . '/' .$options['partials']. '.php';
        if (file_exists($file)) {
            include $file;
        }

    }
}

function checkType($path,$type, $arg = null){

    $html = glob(ROOT. $path . '/'.$type.'/*.'.$type);
    $html = str_replace(ROOT, '', $html);

    if ($type == 'css') {

        foreach ($html as $key => $value) {

            if ($arg != null) {
                $file = str_replace($path . '/' . $type . '/','',$value);
                if (in_array(str_replace('.'.$type,'',$file),$arg)) {
                    echo "<link rel='stylesheet' type='text/css' href='".WEBROOT."$value'>";
                }
            } else {
                echo "<link rel='stylesheet' type='text/css' href='".WEBROOT."$value'>";
            }

        }

    } else if ($type == 'js') {

        foreach ($html as $key => $value) {
            if ($arg != null) {
                $file = str_replace($path . '/' . $type . '/','',$value);
                if (in_array(str_replace('.'.$type,'',$file),$arg)) {
                    echo "<script type='text/javascript' src='".WEBROOT."$value'></script>";
                }
            } else {
               
                echo "<script type='text/javascript' src='".WEBROOT."$value'></script>";
            }
        }

    }

}

function addClass ($page) {
    return (isset($_GET['page']) && $_GET['page'] === $page) ? "active" : null;
}
