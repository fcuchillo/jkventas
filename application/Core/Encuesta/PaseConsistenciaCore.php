<?php

interface PaseConsistenciaCore {
    function obetenerconglomerados($where);
    function EjecutarPasePorViviendaCompleta($nivel,$conglomerdo,$usuario);
    function EjecutarPasePorViviendaIncompleta($nivel,$viviendas,$ususario);
    function InsertDataAuditoria($nivel,$vivienda,$usuario);
}
