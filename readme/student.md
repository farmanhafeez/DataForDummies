# Documentation

DataForDummies is a free API service which allows you to quickly and easily access large amounts of randomly generated test data based on your own specification which you can then load directly into your test environment.

Read the [Documentation](./) page for more details about the API...

# Student data

DataForDummies has over 2000 students data available for the API.

# API endpoints

Below are described the API endpoints available that you can use to search for students.

### All

`https://www.example.com/api/student/`

### Gender

Search by gender. It can be Male or Female

`https://www.example.com/api/student/?gender=male`

### Country

Search by country full name.

`https://www.example.com/api/student/?country=mexico`

### Age

Search by age.

`https://www.example.com/api/student/?age=20`

Search by specifying the minage to search data.

`https://www.example.com/api/student/?minage=21`

Search by specifying the minage to search data.

`https://www.example.com/api/student/?maxage=24`

Or search by specifying both the Minage & Maxage

`https://www.example.com/api/student/?minage=21&maxage=24`

### CGPA

Search by cgpa.

`https://www.example.com/api/student/?cgpa=7`

Search by specifying the mincgpa to search data.

`https://www.example.com/api/student/?mincgpa=7`

Search by specifying the mincgpa to search data.

`https://www.example.com/api/student/?maxcgpa=8`

Or search by specifying both the Mincgpa & Maxcgpa

`https://www.example.com/api/student/?mincgpa=7&maxcgpa=8`

### Department

Search by department. It can be UG or PG

`https://www.example.com/api/student/?department=ug`

### Result

Specify the number of records you want to receive.

`https://www.example.com/api/student/?result=500`

### Format

Specify the format, it can be JSON or XML. The default format is JSON.

`https://www.example.com/api/student/?format=xml`

### Group

You can also specify the parameters in group to request data

`https://www.example.com/api/student/?gender=male&cgpa=8&department=ug`

# Response example

API response data in JSON format.

```
{
    "student": [
        {
            "student_id": "71BTECH7644",
            "fullname": "Cornie Marlon",
            "email": "cmarlonr5@flavors.me",
            "password": "atTUO2xK",
            "phone": "925 218 5888",
            "gender": "Male",
            "age": 25,
            "course": "B.Tech. Production and Industrial Engineering",
            "department": "UG",
            "institution": "Shanghai Sanda University",
            "batch": "2014-08-02",
            "percentage": 80,
            "cgpa": 8,
            "city": "Pingle",
            "country": "China"
        }
    ]
}
```

API response data in XML format.

```
<?xml version="1.0" encoding="UTF-8"?>
<root>
    <student>
        <student_id>17BDES6787</student_id>
        <fullname>Alverta Bennetto</fullname>
        <email>abennettorc@etsy.com</email>
        <password>0Ws4609</password>
        <phone>745 510 4476</phone>
        <gender>Female</gender>
        <age>18</age>
        <course>B.Des. (Industrial Design)</course>
        <department>UG</department>
        <institution>University of Science and Technology Beijing</institution>
        <batch>2017-05-22</batch>
        <percentage>54.7</percentage>
        <cgpa>5.47</cgpa>
        <city>Beijiang</city>
        <country>China</country>
    </student>
</root>
```

# Dataset

We have collections of dataset to use for the API. Just mention the dataset name in the URL and you are good to use. Click on the link below to leant more about the dataset.

1. [User](user)
2. [Employee](employee)
3. [Student](student)
4. [Course](course)
5. [Car](car)
