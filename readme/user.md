# Documentation

DataForDummies is a free API service which allows you to quickly and easily access large amounts of randomly generated test data based on your own specification which you can then load directly into your test environment.

Read the [Documentation](./) page for more details about the API...

# User data

DataForDummies has over 2000 users data available for the API.

# API endpoints

Below are described the API endpoints available that you can use to search for users.

### All

`https://www.example.com/api/user/`

### Gender

Search by gender. It can be Male or Female

`https://www.example.com/api/user/?gender=male`

### Country

Search by country full name.

`https://www.example.com/api/user/?country=india`

### Age

Search by age.

`https://www.example.com/api/user/?age=25`

Search by specifying the minage to search data.

`https://www.example.com/api/user/?minage=26`

Search by specifying the minage to search data.

`https://www.example.com/api/user/?maxage=30`

Or search by specifying both the Minage & Maxage

`https://www.example.com/api/user/?minage=25&maxage=30`

### Result

Specify the number of records you want to receive.

`https://www.example.com/api/user/?result=500`

### Format

Specify the format, it can be JSON or XML. The default format is JSON.

`https://www.example.com/api/user/?format=xml`

### Group

You can also specify the parameters in group to request data

`https://www.example.com/api/user/?gender=male&age=25&country=china&result=100`

# Response example

API response data in JSON format.

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

API response data in XML format.

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

# Dataset

We have collections of dataset to use for the API. Just mention the dataset name in the URL and you are good to use. Click on the link below to leant more about the dataset.

1. [User](user)
2. [Employee](employee)
3. [Student](student)
4. [Course](course)
5. [Country](country)
6. [Car](car)
