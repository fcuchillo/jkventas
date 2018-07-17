<?php

interface ResultadoViviendaCore {
    function obtenerReporte003($where);
    function cargarConglomerado($anio, $equipo, $mes);
    function cargarVivienda($conglomerado,$anio);
}