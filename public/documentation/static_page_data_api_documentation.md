# Static Page Data API Documentation

## Overview
The Static Page Data API provides content data for static pages based on the requested page name.

## Request Method
- Only **POST** requests are allowed.
- The request body must be a JSON object containing:
  - `page_name` (string): The name of the static page to retrieve data for.

## Request Example
```json
{
  "page_name": "privacy_policy"
}
```
## note:- 
in page name if want to access privacy policy page than give in lowercase letters 
example : "Privacy Policy" than provide like "privacy_policy"
example : "About Us" than than provide like "about_us"

## Response Structure
- On success, returns a JSON object with a `data` key containing an array of page data objects from the database.

## Error Handling
- Returns HTTP 400 if the `page_name` is missing or invalid.
- Returns HTTP 404 if the requested page name is not found in the database.
- Returns HTTP 405 if the request method is not POST.
- Returns HTTP 500 if a server or database error occurs.

## Example Success Response
```json
{
  "data": [
    {
      "id": 1,
      "page_name": "privacy_policy",
      "content": "Your privacy is important to us...",
      "created_at": "2023-01-01 12:00:00",
      "updated_at": "2023-01-10 15:30:00"
    }
  ]
}

example json :- 
{
    "data": [
        {
            "id": 1,
            "page_name": "privacy_policy",
            "title": "Privacy Policy",
            "content": "🛡️ Privacy Policy for PrepPoint\n\nEffective Date: 8 May 2025\n\nAt PrepPoint, your privacy is our top priority. This Privacy Policy outlines how we collect, use, and safeguard your personal information when you visit or interact with our website and services. By using PrepPoint, you agree to the practices described below.\n\n🔍 What Information We Collect\nWhen you use PrepPoint, we may collect:\n- Voluntarily Provided Information: Such as your name, email address, or message content when you fill out contact forms or submit feedback.\n- Automatically Collected Information: Including IP address, browser type, operating system, device information, pages visited, and browsing behavior—used solely to improve site performance and user experience.\n\n🎯 How We Use Your Information\nWe use your information to:\n- Respond to your queries and feedback\n- Improve the functionality and performance of our platform\n- Customize and personalize your experience\n- Send you important updates (e.g., feature releases or policy changes)\n\nWe never sell or share your data with third parties for marketing purposes. Your data is strictly used to maintain security, analyze usage, and enhance services.\n\n🍪 Cookies and Data Security\nCookies:\nPrepPoint uses cookies to store preferences, monitor traffic, and enhance your experience. You can control or disable cookies via your browser settings, though certain features may be limited.\n\nSecurity Measures:\nWe implement industry-standard security practices such as encryption, firewalls, and access restrictions to protect your data. However, please note that no online system is 100% secure, and we recommend using strong passwords and caution when submitting personal information online.\n\n🔗 Third-Party Links & Children’s Privacy\nExternal Links:\nOur website may contain links to third-party websites. We are not responsible for their privacy practices or content. We encourage you to review their respective privacy policies before sharing any data.\n\nChildren's Privacy:\nPrepPoint is intended for users aged 13 and above. We do not knowingly collect personal data from children under this age. If you believe a child has shared information with us, please contact us immediately so we can remove it.\n\n⚖️ Your Rights\nYou have the right to:\n- Access, correct, or delete your personal data\n- Withdraw consent for communications\n- Request a copy of the information we hold about you\n\nTo exercise these rights or inquire about our privacy practices, contact us at:\n📧 your-email@example.com\n🏠 [Insert Business Address, if applicable]\n\n🔄 Policy Updates\nWe may update this Privacy Policy to reflect changes in our services, practices, or legal obligations. When we do, the “Effective Date” at the top will be revised. We recommend reviewing this page periodically. Continued use of PrepPoint after changes indicates your acceptance of the updated policy.",
            "last_updated": "2025-05-08 12:29:06",
            "admin_id": 1
        }
    ]
}