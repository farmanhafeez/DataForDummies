# Documentation

DataForDummies is a free API service which allows you to quickly and easily access large amounts of randomly generated test data based on your own specification which you can then load directly into your test environment.

Read the [Documentation](./) page for more details about the API...

# Country data

DataForDummies has a collections of country data available for the API.

# API endpoints

Below are described the API endpoints available that you can use to search for countrys.

### All

`https://www.example.com/api/country/`

### Capital

Search by capital

`https://www.example.com/api/country/?capital=New Delhi`

### Country

Search by country full name

`https://www.example.com/api/country/?country=India`

### Region

Search by region name

`https://www.example.com/api/country/?region=Asia`

### Result

Specify the number of records you want to receive.

`https://www.example.com/api/country/?result=10`

### Format

Specify the format, it can be JSON or XML. The default format is JSON.

`https://www.example.com/api/country/?format=xml`

### Group

You can also specify the parameters in group to request data

`https://www.example.com/api/country/?region=Asia&country=Nepal`

# Response example

API response data in JSON format.

```
{
    "country": [
        {
            "name": "Nigeria",
            "topLevelDomain": [
                ".ng"
            ],
            "alpha2Code": "NG",
            "alpha3Code": "NGA",
            "callingCodes": [
                "234"
            ],
            "capital": "Abuja",
            "altSpellings": [
                "NG",
                "Nijeriya",
                "Naíjíríà",
                "Federal Republic of Nigeria"
            ],
            "region": "Africa",
            "subregion": "Western Africa",
            "population": 186988000,
            "latlng": [
                10,
                8
            ],
            "demonym": "Nigerian",
            "area": 923768,
            "gini": 48.8,
            "timezones": [
                "UTC+01:00"
            ],
            "borders": [
                "BEN",
                "CMR",
                "TCD",
                "NER"
            ],
            "nativeName": "Nigeria",
            "numericCode": "566",
            "currencies": [
                {
                    "code": "NGN",
                    "name": "Nigerian naira",
                    "symbol": "₦"
                }
            ],
            "languages": [
                {
                    "iso639_1": "en",
                    "iso639_2": "eng",
                    "name": "English",
                    "nativeName": "English"
                }
            ],
            "translations": {
                "de": "Nigeria",
                "es": "Nigeria",
                "fr": "Nigéria",
                "ja": "ナイジェリア",
                "it": "Nigeria",
                "br": "Nigéria",
                "pt": "Nigéria",
                "nl": "Nigeria",
                "hr": "Nigerija",
                "fa": "نیجریه"
            },
            "flag": "https://restcountries.eu/data/nga.svg",
            "regionalBlocs": [
                {
                    "acronym": "AU",
                    "name": "African Union",
                    "otherAcronyms": [],
                    "otherNames": [
                        "الاتحاد الأفريقي",
                        "Union africaine",
                        "União Africana",
                        "Unión Africana",
                        "Umoja wa Afrika"
                    ]
                }
            ],
            "cioc": "NGR"
        }
    ]
}
```

API response data in XML format.

```
<?xml version="1.0" encoding="UTF-8"?>
<root>
    <country>
        <name>Thailand</name>
        <topLevelDomain>
            <item>.th</item>
        </topLevelDomain>
        <alpha2Code>TH</alpha2Code>
        <alpha3Code>THA</alpha3Code>
        <callingCodes>
            <item>66</item>
        </callingCodes>
        <capital>Bangkok</capital>
        <altSpellings>
            <item>TH</item>
            <item>Prathet</item>
            <item>Thai</item>
            <item>Kingdom of Thailand</item>
            <item>ราชอาณาจักรไทย</item>
            <item>Ratcha Anachak Thai</item>
        </altSpellings>
        <region>Asia</region>
        <subregion>South-Eastern Asia</subregion>
        <population>65327652</population>
        <latlng>
            <item>15</item>
            <item>100</item>
        </latlng>
        <demonym>Thai</demonym>
        <area>513120</area>
        <gini>40</gini>
        <timezones>
            <item>UTC+07:00</item>
        </timezones>
        <borders>
            <item>MMR</item>
            <item>KHM</item>
            <item>LAO</item>
            <item>MYS</item>
        </borders>
        <nativeName>ประเทศไทย</nativeName>
        <numericCode>764</numericCode>
        <currencies>
            <item>
                <code>THB</code>
                <name>Thai baht</name>
                <symbol>฿</symbol>
            </item>
        </currencies>
        <languages>
            <item>
                <iso639_1>th</iso639_1>
                <iso639_2>tha</iso639_2>
                <name>Thai</name>
                <nativeName>ไทย</nativeName>
            </item>
        </languages>
        <translations>
            <de>Thailand</de>
            <es>Tailandia</es>
            <fr>Thaïlande</fr>
            <ja>タイ</ja>
            <it>Tailandia</it>
            <br>Tailândia</br>
            <pt>Tailândia</pt>
            <nl>Thailand</nl>
            <hr>Tajland</hr>
            <fa>تایلند</fa>
        </translations>
        <flag>https://restcountries.eu/data/tha.svg</flag>
        <regionalBlocs>
            <item>
                <acronym>ASEAN</acronym>
                <name>Association of Southeast Asian Nations</name>
                <otherAcronyms/>
                <otherNames/>
            </item>
        </regionalBlocs>
        <cioc>THA</cioc>
    </country>
</root>
```

# Dataset

We have collections of dataset to use for the API. Just mention the dataset name in the URL and you are good to use. Click on the link below to leant more about the dataset.

1. [User](user)
2. [Employee](employee)
3. [Student](student)
4. [Course](course)
5. [Country](country)
6. [Car](car)
