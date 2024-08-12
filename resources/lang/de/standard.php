<?php

return [
    'date_format' => 'd.m.Y',
    'datetime_format' => 'd.m.Y H:i \U\h\r',

    'slug_changes' => [
        'after_upload_message' => 'Das Verarbeiten der Datei dauert je nach Dateigröße und Auslastung der Api einige Zeit...',
        'detail_geo_data' => 'Detail Geo-Daten hochladen',
        'full_geo_data' => 'Vollständige Geo-Daten hochladen',
        'validation' => [
            'file-size' => 'Die Datei ist zu groß. Vermutlich handelt es sich um eine vollständige Geo-Daten-Datei. Bitte benutzen Sie das Formular rechts für vollständige Dateien.',
            'mime-type' => 'Die Datei muss eine CSV-Datei sein.',
        ]
    ],
];
