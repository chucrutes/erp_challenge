<?php
function format_brazillian_date(string $dateString): string
{
    $date = new DateTime($dateString);
    return $date->format('d/m/Y H:i');
}

?>