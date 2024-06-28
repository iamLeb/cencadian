<?php

function formatTwoDecimal ($number) {
    return number_format((float)$number, 2, '.', '');
}