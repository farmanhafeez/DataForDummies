# Documentation

DataForDummies is a free API service which allows you to quickly and easily access large amounts of randomly generated test data based on your own specification which you can then load directly into your test environment.

Read the [Documentation](./) page for more details about the API...

# Course data

DataForDummies has over 2000 course data available for the API.

# API endpoints

Below are described the API endpoints available that you can use to search for courses.

### All

`https://www.example.com/api/course/`

### Course

Search by course.

`https://www.example.com/api/course/?course=BCA`

### Department

Search by department, it can be UG or PG.

`https://www.example.com/api/course/?department=pg`

### Result

Specify the number of records you want to receive.

`https://www.example.com/api/course/?result=500`

### Format

Specify the format, it can be JSON or XML. The default format is JSON.

`https://www.example.com/api/course/?format=xml`

### Group

You can also specify the parameters in group to request data

`https://www.example.com/api/course/?course=BCA&department=ug&result=100`

# Response example

API response data in JSON format.

```
{
    "course": [
        {
            "course_id": "CRS-97190",
            "course_abr": "M.Tech",
            "course_name": "M.Tech. CAD / CAM",
            "department_abr": "PG",
            "department_name": "Postgraduate"
        }
    ]
}
```

API response data in XML format.

```
<?xml version="1.0" encoding="UTF-8"?>
<root>
    <course>
        <course_id>CRS-90806</course_id>
        <course_abr>M.Tech</course_abr>
        <course_name>M.Tech. CSE in Cyber Physical Systems </course_name>
        <department_abr>PG</department_abr>
        <department_name>Postgraduate</department_name>
    </course>
</root>
```

# Dataset

We have collections of dataset to use for the API. Just mention the dataset name in the URL and you are good to use. Click on the link below to leant more about the dataset.

1. [User](user)
2. [Employee](employee)
3. [Student](student)
4. [Course](course)
5. [Car](car)
