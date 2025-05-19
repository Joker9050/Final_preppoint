# Topic and Subtopic API Documentation

## Overview
This API provides a JSON response containing topics and their subtopics for a given subject under a specified subcategory.

## Request Method
- Only **POST** requests are allowed.
- The request body must be a JSON object containing:
  - `subcategory` (string): The name of the subcategory.
  - `subject` (string): The name of the subject under the subcategory.

## Request Example
```json
{
  "subcategory": "Programming",
  "subject": "Java"
}
```

## Response Structure
- On success, returns a JSON object where the key is the subject name.
- The value is an array of topic objects, each containing:
  - `name`: The topic name.
  - `subtopics`: An array of subtopic names under the topic.

## Error Handling
- Returns HTTP 400 if `subcategory` or `subject` is missing.
- Returns HTTP 404 if the subcategory or subject is not found.
- Returns HTTP 405 if the request method is not POST.
- Returns HTTP 500 if a server or database error occurs.

## Example Success Response
```json
{
  "Java": [
    {
      "name": "Basics",
      "subtopics": ["Variables", "Data Types", "Operators"]
    },
    {
      "name": "Advanced",
      "subtopics": ["Generics", "Multithreading", "Streams"]
    }
  ]
}


example json : 

{
    "Java": [
        {
            "name": "Arrays & Multidimensional Arrays",
            "subtopics": [
                "1D Arrays",
                "2D & Jagged Arrays",
                "Array Operations"
            ]
        },
        {
            "name": "Control Flow & Decision Making",
            "subtopics": [
                "Assertions & Logging",
                "Conditional Statements",
                "Exception Handling",
                "Loops in Java"
            ]
        },
        {
            "name": "Java Advanced Topics",
            "subtopics": [
                "File I/O (java.io & java.nio)",
                "JDBC",
                "Lambda Expressions & Functional Interfaces",
                "Multithreading & Concurrency",
                "Serialization",
                "Stream API"
            ]
        },
        {
            "name": "Java Basics & Syntax",
            "subtopics": [
                "Basic Syntax & Structure",
                "Data Types & Variables",
                "Input & Output",
                "Introduction to Java",
                "Operators & Expressions"
            ]
        },
        {
            "name": "Java Best Practices & Design",
            "subtopics": [
                "Coding Standards",
                "Common Design Patterns",
                "Design Principles"
            ]
        },
        {
            "name": "Java Collections Framework",
            "subtopics": [
                "Introduction to Collections",
                "Iterators & Enhanced Looping",
                "List Interface",
                "Map Interface",
                "Queue & Deque",
                "Set Interface"
            ]
        },
        {
            "name": "Java Memory & Performance",
            "subtopics": [
                "Garbage Collection",
                "Memory Leaks & Optimization",
                "Performance Tuning"
            ]
        },
        {
            "name": "Java Strings & Wrapper Classes",
            "subtopics": []
        },
        {
            "name": "Java Testing, Tools & Ecosystem",
            "subtopics": [
                "Build Tools",
                "Build Tools IDE & Debugging Tips",
                "JUnit & Testing Basics",
                "Version Control Integration"
            ]
        },
        {
            "name": "Object-Oriented Programming (OOP)",
            "subtopics": [
                "Abstraction",
                "Access Modifiers",
                "Classes & Objects",
                "Encapsulation",
                "Inheritance",
                "Polymorphism"
            ]
        }
    ]
}