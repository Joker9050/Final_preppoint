# Category API Documentation

## Overview
The Category API provides a JSON response containing all categories, their subcategories, and subjects under each subcategory from the database.

## Request Method
- Only **GET** requests are allowed.
- Other HTTP methods will return a 405 Method Not Allowed error.

## Response Structure
The JSON response is an object where each key is a category name. Each category contains:

- `category_title`: A human-readable title of the category (underscores replaced with spaces and words capitalized).
- `subcategory`: An array of subcategory objects, each containing:
  - `subcategory_title`: The name of the subcategory.
  - `subjects`: An array of subject names under the subcategory.
    - If no subjects exist, it contains `["Coming Soon"]`.
    - If subjects exist, `"view more →"` is appended to the list of subject.
  - `isScrollingFrame`: Boolean indicating if the subjects list should be displayed in a scrolling frame.
    - `false` if no subjects exist, `true` otherwise.

## Special Cases
- If a category has no subcategories, a single subcategory with title `"Coming Soon"` and subjects `["Coming Soon"]` is returned.

## Error Handling
- Returns HTTP 405 if the request method is not GET.
- Returns HTTP 500 with an error message if database queries fail.

## Example Response
```json
{
  "category_name": {
    "category_title": "Category Name",
    "subcategory": [
      {
        "subcategory_title": "Subcategory 1",
        "subjects": ["Subject A", "Subject B", "view more →"],
        "isScrollingFrame": true
      },
      {
        "subcategory_title": "Coming Soon",
        "subjects": ["Coming Soon"],
        "isScrollingFrame": false
      }
    ]
  }
}

example json :- 
{
    "IT": {
        "category_title": "IT",
        "subcategory": [
            {
                "subcategory_title": "Programming",
                "subjects": [
                    "Python",
                    "Java",
                    "JavaScript",
                    "C++",
                    "C Programming",
                    "SQL",
                    "PHP",
                    "TypeScript",
                    "HTML",
                    "CSS",
                    "view more →"
                ],
                "isScrollingFrame": true
            },
            {
                "subcategory_title": "Core Subjects",
                "subjects": [
                    "Data Structures & Algorithms",
                    "DBMS",
                    "Operating System",
                    "Computer Networks",
                    "OOPs Concepts",
                    "Software Engineering",
                    "Web & Internet Technologies",
                    "Computer Organization & Architecture",
                    "Theory of Computation",
                    "Compiler Design",
                    "view more →"
                ],
                "isScrollingFrame": true
            }
        ]
    },
    "Government": {
        "category_title": "Government",
        "subcategory": [
            {
                "subcategory_title": "Central Exams",
                "subjects": [
                    "Coming Soon"
                ],
                "isScrollingFrame": false
            },
            {
                "subcategory_title": "State Wise",
                "subjects": [
                    "Coming Soon"
                ],
                "isScrollingFrame": false
            }
        ]
    },
    "Bank": {
        "category_title": "Bank",
        "subcategory": [
            {
                "subcategory_title": "Coming Soon",
                "subjects": [
                    "Coming Soon"
                ],
                "isScrollingFrame": false
            }
        ]
    },
    "Classes": {
        "category_title": "Classes",
        "subcategory": [
            {
                "subcategory_title": "Coming Soon",
                "subjects": [
                    "Coming Soon"
                ],
                "isScrollingFrame": false
            }
        ]
    }
}