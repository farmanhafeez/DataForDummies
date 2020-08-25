# DataForDummies

DataForDummies is a free API service which allows you to quickly and easily access large amounts of randomly generated test data based on your own specification which you can then load directly into your test environment.

Try our [API Testing Tool](../api-testing) to test our API and download the API response data.

## How to use

To use our API service, you have to mention the dataset and you can also mention the fields based on your specification as a parameter in the URL. Then you can use any programming language to request the API. Below I have shared two sample code snippets of JavaScript and PHP to get started with.

### JavaScript

If you are using jQuery, you can use the `$.ajax()` function in the code snippet to get started.

```
$.ajax({
    url: "https://www.example.com/api/user/",
    dataType: "json",
    success: function (data) {
        console.log(data);
    }
});
```

### PHP

If you are using PHP, you can use the `CURL` function in the code snippet to get started.

```
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.example.com/api/user/");
$output = curl_exec($ch);
curl_close($ch);
echo $output;
```

## Response example

Our API service offers in JSON and XML format. You can specify the format by using the `format` paramter to request the data in JSON or XML format or you can leave this format paramter blank because the default format is JSON.

### JSON

You can specify the format for JSON but not mandatory.

`https://www.example.com/api/user/`

`https://www.example.com/api/user/?format=json`

```
{
    "users": [
        {
            "firstname": "Dennison",
            "lastname": "Kettle",
            "username": "dkettlec",
            "password": "TCJ7eNCU4",
            "email": "dkettlec@un.org",
            "phone": "788 740 5011",
            "gender": "Male",
            "dob": "1989-04-13",
            "age": 31,
            "image": "https://randomuser.me/api/portraits/men/17.jpg",
            "street": "969 Muir Alley",
            "city": "Herrljunga",
            "state": "Västra Götaland",
            "country": "Sweden",
            "postcode": "524 24",
            "ip_address": "155.41.237.10"
        }
    ]
}
```

### XML

You can specify the format to request in XML.

`https://www.example.com/api/user/?format=xml`

```
<?xml version="1.0" encoding="UTF-8"?>
<root>
    <users>
        <firstname>Thatch</firstname>
        <lastname>Levane</lastname>
        <username>tlevanejv</username>
        <password>knEKnEPWj</password>
        <email>tlevanejv@flickr.com</email>
        <phone>202 789 3704</phone>
        <gender>Male</gender>
        <dob>1999-05-05</dob>
        <age>21</age>
        <image>https://randomuser.me/api/portraits/men/29.jpg</image>
        <street>811 Oak Lane</street>
        <city>Washington</city>
        <state>District of Columbia</state>
        <country>United States</country>
        <postcode>56944</postcode>
        <ip_address>239.175.233.152</ip_address>
    </users>
</root>
```

## Dataset

We have collections of dataset to use for the API. Just mention the dataset name in the URL and you are good to use. Click on the link below to leant more about the dataset.

1. User
2. Employee
3. Student
4. Course
5. Country
6. Car
