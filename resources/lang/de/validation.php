<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attribute muss akzeptiert werden.',
    'active_url'           => ':attribute ist keine gültige Internet-Adresse.',
    'after'                => ':attribute muss ein Datum nach dem :date sein.',
    'alpha'                => ':attribute darf nur aus Buchstaben bestehen.',
    'alpha_dash'           => ':attribute darf nur aus Buchstaben, Zahlen, Binde- und Unterstrichen bestehen. Umlaute (ä, ö, ü) und Eszett (ß) sind nicht erlaubt.',
    'alpha_num'            => ':attribute darf nur aus Buchstaben und Zahlen bestehen.',
    'array'                => ':attribute muss ein Array sein.',
    'before'               => ':attribute muss ein Datum vor dem :date sein.',
    'between'              => [
        'numeric' => ':attribute muss zwischen :min & :max liegen.',
        'file'    => ':attribute muss zwischen :min & :max Kilobytes groß sein.',
        'string'  => ':attribute muss zwischen :min & :max Zeichen lang sein.',
        'array'   => ':attribute muss zwischen :min & :max Elemente haben.',
    ],
    'boolean'              => ":attribute muss entweder 'true' oder 'false' sein.",
    'confirmed'            => ':attribute stimmt nicht mit der Bestätigung überein.',
    'date'                 => ':attribute muss ein gültiges Datum sein.',
    'date_format'          => ':attribute entspricht nicht dem gültigen Format für :format.',
    'different'            => ':attribute und :other müssen sich unterscheiden.',
    'digits'               => ':attribute muss :digits Stellen haben.',
    'digits_between'       => ':attribute muss zwischen :min und :max Stellen haben.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attribute Format ist ungültig.',
    'exists'               => 'Der gewählte Wert für :attribute ist ungültig.',
    'filled'               => ':attribute muss ausgefüllt sein.',
    'image'                => ':attribute muss ein Bild sein.',
    'in'                   => 'Der gewählte Wert für :attribute ist ungültig.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attribute muss eine ganze Zahl sein.',
    'ip'                   => ':attribute muss eine gültige IP-Adresse sein.',
    'json'                 => ':attribute muss ein gültiger JSON-String sein.',
    'max'                  => [
        'numeric' => ':attribute darf maximal :max sein.',
        'file'    => ':attribute darf maximal :max Kilobytes groß sein.',
        'string'  => ':attribute darf maximal :max Zeichen haben.',
        'array'   => ':attribute darf nicht mehr als :max Elemente haben.',
    ],
    'mimes'                => ':attribute muss den Dateityp :values haben.',
    'min'                  => [
        'numeric' => ':attribute muss mindestens :min sein.',
        'file'    => ':attribute muss mindestens :min Kilobytes groß sein.',
        'string'  => ':attribute muss mindestens :min Zeichen lang sein.',
        'array'   => ':attribute muss mindestens :min Elemente haben.',
    ],
    'not_in'               => 'Der gewählte Wert für :attribute ist ungültig.',
    'numeric'              => ':attribute muss eine Zahl sein.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => ':attribute Format ist ungültig.',
    'required'             => ':attribute muss ausgefüllt sein.',
    'required_if'          => ':attribute muss ausgefüllt sein, wenn :other :value ist.',
    'required_unless'      => ':attribute muss ausgefüllt sein, wenn :other nicht :values ist.',
    'required_with'        => ':attribute muss angegeben werden, wenn :values ausgefüllt wurde.',
    'required_with_all'    => ':attribute muss angegeben werden, wenn :values ausgefüllt wurde.',
    'required_without'     => ':attribute muss angegeben werden, wenn :values nicht ausgefüllt wurde.',
    'required_without_all' => ':attribute muss angegeben werden, wenn keines der Felder :values ausgefüllt wurde.',
    'same'                 => ':attribute und :other müssen übereinstimmen.',
    'size'                 => [
        'numeric' => ':attribute muss gleich :size sein.',
        'file'    => ':attribute muss :size Kilobyte groß sein.',
        'string'  => ':attribute muss :size Zeichen lang sein.',
        'array'   => ':attribute muss genau :size Elemente haben.',
    ],
    'string'               => ':attribute muss ein String sein.',
    'timezone'             => ':attribute muss eine gültige Zeitzone sein.',
    'unique'               => ':attribute ist schon vergeben.',
    'url'                  => 'Das Format von :attribute ist ungültig.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'password_init' => [
            'required_if' => 'Das Passwort muss ausgefüllt werden.',
            'min' => 'Das Passwort muss mindestens 8 Zeichen lang sein.'
        ],
        'password_repeat' => [
            'required_if' => 'Das Passwort muss ausgefüllt werden.',
            'same' => 'Die Passwörter müssen übereinstimmen.',
            'min' => 'Das Passwort muss mindestens 8 Zeichen lang sein.',
            'required_with' => 'Die Passwörter müssen übereinstimmen.',
        ],
        'profile' =>
            ['employee_count' => [
                'integer' => 'Die Mitarbeiterzahl muss eine Zahl sein.'
            ]
        ],
        'internal' => [
            'required' => 'Die interne Bezeichnung muss ausgefüllt sein.'
        ],
        'youtube-link' => [
            'youtube' => 'Bitte geben Sie eine gültige Youtube-Url ein!'
        ],
        'mime-types' => [
            'application/json' => 'die Datei muss eine JSON datei sein.'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'lastname' => 'Nachname',
        'firstname' => 'Vorname',
        'email' => 'E-Mail',
        'street' => 'Straße',
        'zip' => 'PLZ',
        'city' => 'Stadt',
        'phone' => 'Telefon',
        'homepage' => 'Homepage',
        'oldpassword' => 'Aktuelles Passwort',
        'newpassword' => 'Neues Passwort',
        'password' => 'Passwort',
        'newpassword2' => 'Passwortwiederholung',
        'salutation' => 'Anrede',
        'image' => 'Profilfoto',
        'officeimage' => 'Standortfoto',
        'portrait' => 'Portrait-Foto',
        'logo' => 'Logo',
        'description' => 'Beschreibung',
        'officename' => 'Standortname',
        'profiletext' => 'Profiltext',
        'message' => 'Die Mitteilung',
        'name' => 'Name',
        'estatetext' => 'Objektbeschreibung',
        'lagebeschreibung' => 'Lagebeschreibung',
        'ausstattung' => 'Ausstattung',
        'sonstiges' => 'Sonstiges',
        'erschliessungstext' => 'Erschliessungstext',
        'bebaubarkeit' => 'Bebaubarkeit',
        'password_confirmation' => 'Passwortbestätigung',
        'agb' => 'AGB',
        'youtube-link' => 'Youtube URL',
        'businesstype' => 'Maklertyp',
        'private' => 'Privat',
		'title' => 'Titel',
		'content' => 'Inhalt',
		'pubdate' => 'Veröffentlichungsdatum',
		'sectors_id' => 'Branche',
		'link_url' => 'Link-URL',
		'producers_id' => 'Hersteller',
		'manufacturer' => [
			'contact_lastname' => 'Nachname',
			'contact_firstname' => 'Vorname',
			'contact_email' => 'E-Mail Adresse',
			'profile_company_name' => 'Firmenname',
			'profile_website' => 'Webseite',
            'profile_linkedin' => 'LinkedIn-URL',
            'profile_facebook' => 'Facebook-URL',
            'profile_googleplus' => 'Google+-URL',
            'profile_xing' => 'XING-URL',
            'profile_twitter' => 'Twitter-URL',
            'dealerlist' => 'Händlerliste-URL',
            'profile_instagram' => 'Instagram',
            'profile_pinterest' => 'Pinterest',
            'slug' => 'URL-Pfad',
        ],
        'builder' => [
            'slug' => 'URL-Bezeichner',
            'contact_lastname' => 'Nachname',
            'contact_firstname' => 'Vorname',
            'contact_email' => 'E-Mail Adresse',
            'profile_email' => 'E-Mail Adresse',
            'profile_company_name' => 'Firmenname',
            'profile_website' => 'Webseite',
            'profile_url_location' => 'Webseite Standorte/ Verkaufsbüros',
            'profile_url_map' => 'Webseite Karte der Musterhäuser',
            'profile_email_catalog' => 'E-Mail für Kataloganforderung',
            'profile_facebook' => 'Facebook',
            'profile_twitter' => 'Twitter',
            'profile_youtube' => 'Youtube',
            'profile_googleplus' => 'Google+',
            'profile_xing' => 'Google',
            'profile_linkedin' => 'LinkedIn',
            'profile_instagram' => 'Instagram',
            'profile_pinterest' => 'Pinterest',
        ],
        'slug' => 'URL-Bezeichner',
        'builder_id' => 'Hersteller',
        'style[]' => 'Stil',
        'stages[]' => 'Ausbaustufen',
        'category[]' => 'Kategorie',
        'roof[]' => 'Dachform',
        'living_area_total' => 'Wohnfläche gesamt',
        'living_area_ground_floor' => 'Wohnfläche (EG)',
        'living_area_first_floor' => 'Wohnfläche (1. OG)',
        'living_area_second_floor' => 'Wohnfläche (2. OG)',
        'living_area_top_floor' => 'Wohnfläche (DG)',
        'price_ready_to_use' => 'Preis Schlüsselfertig',
        'price_expansion_house' => 'Preis Ausbauhaus',
        'price_kit_house' => 'Preis Bausatzhaus',
        'u_value_wall' => 'U-Wert Außenwand',
        'u_value_roof' => 'U-Wert Dach',
        'primary_energy_demand' => 'Primärenergiebedarf',
        'energy_standard' => 'Energiestandard',
        'video' => 'Video',
        'contact_firstname' => 'Vorname',
        'contact_lastname' => 'Nachname',
        'partner_id' => 'Partner',
        'imprint.consumer_information_url' => 'Link Verbraucherinformationen',
        'username' => 'Benutzername',
        'meta.openimmo_alternative_reportmail' => 'Abweichende E-Mail für Importberichte',
        'share_purchase_agreement' => 'Aktienkaufvertrag',
        'shares_amount' => 'Aktienanzahl',
        'terms_conditions' => 'Allgemeine Geschäftsbedingungen',
        'privacy_policy' => 'Datenschutzerklärung',
    ],

];
