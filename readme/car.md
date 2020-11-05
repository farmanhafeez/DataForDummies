# Documentation

DataForDummies is a free API service which allows you to quickly and easily access large amounts of randomly generated test data based on your own specification which you can then load directly into your test environment.

Read the [Documentation](./) page for more details about the API...

# Car data

DataForDummies has over 2000 cars data available for the API.

# API endpoints

Below are described the API endpoints available that you can use to search for cars.

### All

`https://www.example.com/api/car/`

### Model

Search by model name.

`https://www.example.com/api/car/?model=corolla`

### Company

Search by company name.

`https://www.example.com/api/car/?company=honda`

### Year

Search by production year.

`https://www.example.com/api/car/?year=1998`

### Result

Specify the number of records you want to receive.

`https://www.example.com/api/car/?result=500`

### Format

Specify the format, it can be JSON or XML. The default format is JSON.

`https://www.example.com/api/car/?format=xml`

### Group

You can also specify the parameters in group to request data

`https://www.example.com/api/car/?model=accord&company=honda&year=1998`

# Response example

API response data in JSON format.

```
{
    "car": [
        {
            "car_id": "3N1AB6AP5AL377685",
            "car_name": "Impreza",
            "car_maker": "Subaru",
            "car_color": "Puce",
            "production_year": 2011
        }
    ]
}
```

API response data in XML format.

```
<?xml version="1.0" encoding="UTF-8"?>
<root>
    <car>
        <car_id>2HNYD2H48CH276107</car_id>
        <car_name>Accord</car_name>
        <car_maker>Honda</car_maker>
        <car_color>Indigo</car_color>
        <production_year>2002</production_year>
    </car>
</root>
```

# Dataset

We have collections of dataset to use for the API. Just mention the dataset name in the URL and you are good to use. Click on the link below to leant more about the dataset.

1. [User](user)
2. [Employee](employee)
3. [Student](student)
4. [Course](course)
5. [Car](car)
