<?php

function recurs($start, $finish, $step)
{
    /** Точка выхода */
    if ($start > $finish) {
        return 0; // Если произведение, то 1
    }

    /** Точка входа в просчет */
    if ($finish % $step != 0) {
        return recurs($start, $finish - 1, $step);
    }

    /** Точка просчета */
    return $finish + recurs($start, $finish - $step, $step);
}

echo recurs(1, 11, 3);