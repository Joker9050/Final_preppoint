# PrepPoint Project Documentation

## Overview
PrepPoint is a modern React-based web application designed for educational preparation, focusing on Multiple Choice Questions (MCQs) and Previous Year Questions (PYQs). The application provides a comprehensive platform for learning across various subjects including Information Technology, Government Exams, and Banking Exams.

## Project Structure

### Root Directory (`d:/xampp/htdocs/PrepPoint`)
- **frontend_current/**: Main React application (current active version)
- **frontend/**: Alternative/older React frontend
- **public/**: PHP backend (removed for static frontend focus)
- **vendor/**: Composer dependencies (removed)
- **composer.json & composer.lock**: PHP dependencies (removed)
- **mcq_page.html & mcq.html**: Legacy HTML files (removed)
- **backup.txt**: Backup file (removed)
- **ForgotPassword_UI_Documentation.md**: Component-specific documentation
- **TODO.md**: Task tracking file

## Frontend Architecture (React Application)

### Technology Stack
- **Framework**: React 19.0.0 with Vite
- **Styling**: Tailwind CSS 3.4.17
- **Routing**: React Router DOM 7.4.1
- **Animations**: Framer Motion 12.6.3
- **HTTP Client**: Axios 1.8.4 (currently mocked for static demo)
- **Icons**: Lucide React 0.487.0, React Icons 5.5.0
- **Authentication**: JWT-decode 4.0.0 (currently static)
- **Google OAuth**: @react-oauth/google 0.12.2
- **Utilities**: Lodash 4.17.21
- **Notifications**: React Toastify 11.0.5
- **Flags**: React World Flags 1.6.0
- **Skeleton Loading**: React Loading Skeleton 3.5.0

### Configuration Files
- **vite.config.js**: Vite configuration with React plugin, server settings (host: 0.0.0.0, port: 5173)
- **tailwind.config.js**: Tailwind CSS configuration
- **package.json**: Project dependencies and scripts
- **index.html**: Main HTML template with Font Awesome CDN
- **eslint.config.js**: ESLint configuration
- **postcss.config.js**: PostCSS configuration

### Application Entry Point
**src/main.jsx**:
```jsx
import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
```

### Main Application Component
**src/App.jsx**:
```jsx
import { AuthProvider } from "./pages/Auth/AuthContext";
import AppRoutes from "./routes/AppRoutes";

function App() {
  return (
    <AuthProvider>
      <AppRoutes />
    </AuthProvider>
  );
}
```

## Routing Structure

### AppRoutes.jsx
Defines the application's routing using React Router:

```jsx
const routes = [
  { path: "/", element: <Home /> },
  { path: "/login", element: <Login /> },
  { path: "/register", element: <Register /> },
  { path: "/logout", element: <Logout /> },
  { path: "/categories", element: <Category /> },
  { path: "/mcq", element: <Mcq /> },
  { path: "/dashboard", element: <Dashboard /> },
  { path: "/contact", element: <Contact /> },
  { path: "/forgot-password", element: <ForgotPassword /> },
  { path: "/terms-conditions", element: <StaticPage /> },
  { path: "/privacy-policy", element: <StaticPage /> },
  { path: "/cookie-policy", element: <StaticPage /> },
  { path: "/terms-of-service", element: <StaticPage /> },
  { path: "/legal/:slug", element: <StaticPage /> }
];
```

## Page Components

### Authentication Pages (`src/pages/Auth/`)
- **Login.jsx**: User login interface
- **Register.jsx**: User registration interface
- **Logout.jsx**: User logout functionality
- **ForgotPassword.jsx**: Password reset flow (3-step process)
- **AuthContext.jsx**: Authentication state management

### Main Pages (`src/pages/`)
- **Home.jsx**: Landing page with search, hero section, and course sliders
- **Category.jsx**: Category browsing with IT, Government, and Banking sections
- **Mcq.jsx**: MCQ quiz interface with topic filtering
- **Contact.jsx**: Contact form and information
- **StaticPage.jsx**: Dynamic static content pages
- **NotFound.jsx**: 404 error page

### User Dashboard Pages (`src/pages/User/`)
- **Dashboard.jsx**: User dashboard
- **Courses.jsx**: Course listings
- **Enrollments.jsx**: User enrollments
- **Profile.jsx**: User profile management

### Admin Pages (`src/pages/Admin/`)
- **Dashboard.jsx**: Admin dashboard
- **ManageUsers.jsx**: User management
- **Reports.jsx**: Analytics and reports

## Component Architecture

### Reusable Components (`src/components/`)
- **Navbar.jsx**: Main navigation with search, auth buttons, mobile menu
- **Footer.jsx**: Site footer with links and contact info
- **Slidebar.jsx**: Course category sliders
- **FeaturesSection.jsx**: Feature highlights
- **FeedbackSection.jsx**: User feedback/testimonials
- **ContactUs.jsx**: Contact form component

### Helper Components (`src/components/helper/`)
- **Logo.jsx**: Site logo component
- **AuthButton.jsx**: Authentication button (login/logout)
- **CategoryDropdown.jsx**: Category navigation dropdown
- **LanguageSelector.jsx**: Language selection
- **MobileMenu.jsx**: Mobile navigation menu
- **NavLinks.jsx**: Navigation links
- **SearchBar.jsx**: Search input component

## Context Management

### AuthContext (`src/pages/Auth/AuthContext.jsx`)
Manages authentication state using React Context:
- User state persistence in localStorage
- Login, logout, register functions
- AuthProvider wrapper component

### UserContext (`src/context/UserContext.js`)
Manages user-specific data:
- User data state management
- UserProvider wrapper component

## Services Layer

### authService.js
Currently contains placeholder authentication functions:
```javascript
export function login() {
  return "Login API Call";
}
```

### courseService.js
Currently contains placeholder course functions:
```javascript
export function fetchCourses() {
  return "Fetching courses API Call";
}
```

## Assets Structure

### Images (`src/assets/images/`)
- **logo.png**: Site logo
- **profile.png**: Default profile image

### CSS (`src/assets/css/`)
- **style.css**: Custom styles and animations
  - Navbar animations (fadeIn, bounce, pulse)
  - Slidebar scrollbar styling

## Styling Approach

### Tailwind CSS Classes
- **Primary Color**: `#0a63b0` (blue)
- **Responsive Design**: Mobile-first approach with breakpoints
- **Component Styling**: Utility-first CSS classes
- **Animations**: Custom keyframes for interactive elements

### Custom CSS
- **Animations**: fadeIn, bounce, pulse effects
- **Scrollbar Styling**: Custom scrollbar for sliders
- **Responsive Utilities**: Mobile-specific adjustments

## Key Features

### Search Functionality
- **Real-time Search**: Debounced search with 300ms delay
- **Category Filtering**: Search across titles, content, and categories
- **Dropdown Results**: Interactive search results with categories
- **Mobile Responsive**: Adaptive positioning for mobile devices

### Authentication Flow
- **Forgot Password**: 3-step process (email → OTP → reset)
- **Static Demo**: Currently uses setTimeout mocks instead of API calls
- **Form Validation**: Client-side validation with error handling
- **UI States**: Loading, success, error message displays

### MCQ System
- **Topic Filtering**: Filter questions by programming topics
- **Interactive Quiz**: Radio button selections with result checking
- **Score Calculation**: Automatic scoring system
- **Reset Functionality**: Quiz restart capability

### Responsive Design
- **Mobile Navigation**: Collapsible menu for mobile devices
- **Adaptive Layouts**: Grid systems that adjust to screen size
- **Touch-Friendly**: Appropriate button sizes and spacing

## Development Workflow

### Build Scripts
- **Development**: `npm run dev` (Vite dev server)
- **Build**: `npm run build` (Production build)
- **Linting**: `npm run lint` (ESLint checking)
- **Preview**: `npm run preview` (Production preview)

### Environment Variables
- **VITE_API_URL**: Backend API base URL (currently unused in static mode)
- **VITE_API_KEY**: API authentication key (currently unused)

## Current State
The application is currently configured as a **static frontend demo** with:
- Mock authentication flows
- Static data for courses and categories
- Simulated API responses using setTimeout
- No backend dependencies
- Focus on UI/UX development and testing

## Future Integration Points
- **Backend API Integration**: Replace mock functions with real API calls
- **Database Connection**: User data, courses, and progress tracking
- **Real Authentication**: JWT-based auth with secure password handling
- **Dynamic Content**: Server-side rendered content and real-time updates
- **Admin Panel**: Full admin functionality for content management

## Performance Considerations
- **Code Splitting**: Vite handles automatic code splitting
- **Lazy Loading**: Components can be lazy-loaded for better performance
- **Image Optimization**: Static assets are optimized by Vite
- **Bundle Analysis**: Can be analyzed using Vite's build tools

This documentation provides a comprehensive overview of the PrepPoint application's frontend architecture, components, and current implementation status.
