<?php
require_once('conexion.php');
Class Ofertas extends Conexion{


    public function bronce($conn){
        //Usar foreach en vez de while and for
        $selectOfertasB = mysqli_query($conn,"SELECT * from `ofertas` where `rango` = 'Bronce'");
        while($selectOfertasB1 = mysqli_fetch_assoc($selectOfertasB)){
            $ofertaID[] = $selectOfertasB1['id'];
            $ofertaNombre[] = $selectOfertasB1['nombre'];
            $ofertasDescripcion[] = $selectOfertasB1['descripcion'];
            $orfertasImg[] = $selectOfertasB1['imagen'];
            $ofertasPrecio[] = $selectOfertasB1['precio'];
        }
        $cuenta = count($ofertaNombre);
        for ($i=0; $i < $cuenta; $i++) { 
            echo "      
            <br>
            <div >
            <img  src='./$orfertasImg[$i]'><p class='ofertas1txt'>
                <ul id='ofertas1txt'>
                    <li>Nombre:$ofertaNombre[$i] </li>
                    <li>Descripcion:  $ofertasDescripcion[$i]</li>
                    <li>Precio: $ofertasPrecio[$i] 💸</li>
                    <a href='oferta.php?id=$ofertaID[$i]'>Usar</a>
        
                </ul>
                </div>
                ";
        }
        

    }

    public function plata($conn){
        //Usar foreach en vez de while and for
        $selectOfertasB = mysqli_query($conn,"SELECT * from `ofertas` where `rango` = 'Plata'");
        while($selectOfertasB1 = mysqli_fetch_assoc($selectOfertasB)){
            $ofertaID[] = $selectOfertasB1['id'];
            $ofertaNombre[] = $selectOfertasB1['nombre'];
            $ofertasDescripcion[] = $selectOfertasB1['descripcion'];
            $orfertasImg[] = $selectOfertasB1['imagen'];
            $ofertasPrecio[] = $selectOfertasB1['precio'];
        }
        $cuenta = count($ofertaNombre);
        for ($i=0; $i < $cuenta; $i++) { 
            echo "
            <br>
            <div>
            <img  src='./$orfertasImg[$i]'><p class='ofertas1txt  '>
                <ul id='ofertas1txt'>
                    <li>Nombre:$ofertaNombre[$i] </li>
                    <li>Descripcion:  $ofertasDescripcion[$i]</li>
                    <li>Precio: $ofertasPrecio[$i] 💸</li>
                    <a href='oferta.php?id=$ofertaID[$i]'>Usar</a>
        
                </ul>
                </div>
                ";
        }
        

    }
    public function oro($conn){
        //Usar foreach en vez de while and for
        $selectOfertasB = mysqli_query($conn,"SELECT * from `ofertas` where `rango` = 'Oro'");
        while($selectOfertasB1 = mysqli_fetch_assoc($selectOfertasB)){
            $ofertaID[] = $selectOfertasB1['id'];
            $ofertaNombre[] = $selectOfertasB1['nombre'];
            $ofertasDescripcion[] = $selectOfertasB1['descripcion'];
            $orfertasImg[] = $selectOfertasB1['imagen'];
            $ofertasPrecio[] = $selectOfertasB1['precio'];
        }
        $cuenta = count($ofertaNombre);
        for ($i=0; $i < $cuenta; $i++) { 
            echo "
            <br>
            <div>
            <img  src='./$orfertasImg[$i]'><p class ='ofertas1txt'>
                <ul id='ofertas1txt'>
                    <li>Nombre:$ofertaNombre[$i] </li>
                    <li>Descripcion:  $ofertasDescripcion[$i]</li>
                    <li>Precio: $ofertasPrecio[$i] 💸</li>
                    <a href='oferta.php?id=$ofertaID[$i]'>Usar</a>
        
                </ul>
                </div>
                ";
        }
        

    }



}