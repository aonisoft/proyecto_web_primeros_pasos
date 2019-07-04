<?php

interface Entidad {

    function insert(): bool;

    function update(): bool;

    function delete(): bool;

    function setValores(array $datos): void;

    function getClave(): Key;
}
