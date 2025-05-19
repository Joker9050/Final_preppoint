# Learning Section API Documentation

## Overview
The Learning Section API provides a JSON response containing subjects under a specified category, ordered by priority and name.

## Request Method
- Only **POST** requests are allowed.
- The request body must be a JSON object containing:
  - `category` (string): The name of the category.

## Request Example
```json
{
  "category": "it"
}
```

## Response Structure
- On success, returns a JSON object where the key is the category name.
- The value is an array of subject names under that category, ordered by priority (ascending) and name (ascending).

## Error Handling
- Returns HTTP 400 if the `category` is missing or invalid.
- Returns HTTP 404 if the requested category is not found in the database.
- Returns HTTP 405 if the request method is not POST.
- Returns HTTP 500 if a server or database error occurs.

## Example Success Response
```json 

{
    "IT": [
        "Data Structures & Algorithms",
        "Python",
        "DBMS",
        "Java",
        "JavaScript",
        "Operating System",
        "C++",
        "Computer Networks",
        "C Programming",
        "OOPs Concepts",
        "Software Engineering",
        "SQL",
        "PHP",
        "Web & Internet Technologies",
        "Computer Organization & Architecture",
        "TypeScript",
        "HTML",
        "Theory of Computation",
        "Compiler Design",
        "CSS"
    ]
}