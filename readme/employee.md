# Documentation

DataForDummies is a free API service which allows you to quickly and easily access large amounts of randomly generated test data based on your own specification which you can then load directly into your test environment.

Read the [Documentation](./) page for more details about the API...

# Employee data

DataForDummies has over 2000 employee data available for the API.

# API endpoints

Below are described the API endpoints available that you can use to search for employees.

### All

`https://www.example.com/api/employee/`

### Gender

Search by gender. It can be Male or Female

`https://www.example.com/api/employee/?gender=male`

### Country

Search by country full name.

`https://www.example.com/api/employee/?country=india`

### Age

Search by age.

`https://www.example.com/api/employee/?age=25`

Search by specifying the minage to search data.

`https://www.example.com/api/employee/?minage=26`

Search by specifying the minage to search data.

`https://www.example.com/api/employee/?maxage=30`

Or search by specifying both the Minage & Maxage

`https://www.example.com/api/employee/?minage=25&maxage=30`

### Result

Specify the number of records you want to receive.

`https://www.example.com/api/employee/?result=500`

### Format

Specify the format, it can be JSON or XML. The default format is JSON.

`https://www.example.com/api/employee/?format=xml`

### Group

You can also specify the parameters in group to request data

`https://www.example.com/api/employee/?gender=male&age=25&country=china&result=100`

# Response example

API response data in JSON format.

```
{
    "employee": [
        {
            "empid": "emp1143",
            "fullname": "Edmon Vodden",
            "email": "evoddenpt@artisteer.com",
            "password": "P1iYOGU3y",
            "phone": "832 141 3960",
            "gender": "Male",
            "age": 23,
            "job_title": "Web Developer IV",
            "department": "Human Resources",
            "company": "Vandervort, Hickle and Dietrich",
            "date_of_joining": "2016-04-01",
            "city": "Karuri",
            "country": "Kenya"
        }
    ]
}
```

API response data in XML format.

```
<?xml version="1.0" encoding="UTF-8"?>
<root>
    <employee>
        <empid>emp7954</empid>
        <fullname>Jule Isaq</fullname>
        <email>jisaqc9@squarespace.com</email>
        <password>IFYZsPS</password>
        <phone>107 775 1212</phone>
        <gender>Male</gender>
        <age>24</age>
        <job_title>Senior Financial Analyst</job_title>
        <department>Product Management</department>
        <company>Graham, Murazik and Simonis</company>
        <date_of_joining>2015-09-01</date_of_joining>
        <city>Kebonsari Kidul</city>
        <country>Indonesia</country>
    </employee>
</root>
```

# Dataset

We have collections of dataset to use for the API. Just mention the dataset name in the URL and you are good to use. Click on the link below to leant more about the dataset.

1. [User](user)
2. [Employee](employee)
3. [Student](student)
4. [Course](course)
5. [Car](car)
