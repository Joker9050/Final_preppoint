# ForgotPassword Component - Detailed UI Structure and Flow

## Overall Layout Structure
The component uses a full-screen layout with a gradient background and centered content:

```jsx
<div className="min-h-screen flex bg-gradient-to-br from-blue-50 to-indigo-50">
  <div className="w-full flex items-center justify-center p-8">
    <div className="w-full max-w-md">
      {/* Header Section */}
      {/* Form Container */}
    </div>
  </div>
</div>
```

## Header Section
- **Logo Display**: Company logo image (h-12 w-auto) centered at the top
- **Back to Login Button**: Positioned below logo, left-aligned with blue text and arrow icon
  - Text: "Back to Login"
  - Color: #0a63b0 (blue)
  - Hover effect: text-blue-800
  - Icon: Left arrow SVG (h-4 w-4)

## Main Form Container
White rounded card with shadow and border:
- Background: white
- Border radius: rounded-xl
- Shadow: shadow-lg
- Border: border-gray-100
- Padding: p-8

### Title
- Text: "Forgot Password"
- Size: text-2xl
- Weight: font-bold
- Color: text-gray-800
- Margin: mb-1

## Message Display System
Two types of messages appear above the form:

### Success Messages
- Background: bg-green-50
- Border: border-l-4 border-green-500
- Padding: p-3
- Border radius: rounded
- Text size: text-sm
- Layout: flex items-center
- Icon: Green checkmark SVG (h-5 w-5)
- Text color: text-green-700

### Error Messages
- Background: bg-red-50
- Border: border-l-4 border-red-500
- Padding: p-3
- Border radius: rounded
- Text size: text-sm
- Layout: flex items-center
- Icon: Red exclamation SVG (h-5 w-5)
- Text color: text-red-700 font-medium

## Three-Step Form Flow

### Step 1: Email Input
```jsx
{step === 1 && (
  <form onSubmit={handleRequestOTP}>
    {/* Email Input Field */}
    {/* Submit Button */}
  </form>
)}
```

**Email Input Field:**
- Label: "Email Address" (text-sm font-medium text-gray-700)
- Input type: email
- Required: true
- Autocomplete: email
- Placeholder: "Enter your registered email"
- Styling: w-full px-4 py-2.5 text-sm rounded-lg border border-gray-200
- Focus styles: focus:ring-2 focus:ring-blue-500 focus:border-blue-500
- Transition: transition-all

**Submit Button:**
- Text: "Send OTP" / "Sending OTP..." (when loading)
- Styling: w-full py-3 px-4 border-transparent rounded-lg text-sm font-medium text-white bg-[#0a63b0]
- Hover: hover:bg-blue-700
- Focus: focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
- Loading state: opacity-80 cursor-not-allowed

### Step 2: OTP Verification
```jsx
{step === 2 && (
  <form onSubmit={handleVerifyOTP}>
    {/* OTP Input Field */}
    {/* Helper Text */}
    {/* Submit Button */}
  </form>
)}
```

**OTP Input Field:**
- Label: "Enter OTP" (text-sm font-medium text-gray-700)
- Input type: text
- Input mode: numeric
- Pattern: [0-9]{6}
- Max length: 6
- Required: true
- Placeholder: "Enter 6-digit OTP"
- Styling: Same as email input
- OnChange: Filters to numbers only, limits to 6 digits

**Helper Text:**
- Text: "We sent a 6-digit code to your email. It will expire in 10 minutes."
- Styling: mt-1 text-sm text-gray-500

**Submit Button:**
- Text: "Verify OTP" / "Verifying..." (when loading)
- Same styling as Step 1 button

### Step 3: Password Reset
```jsx
{step === 3 && (
  <form onSubmit={handleResetPassword}>
    {/* New Password Field */}
    {/* Confirm Password Field */}
    {/* Submit Button */}
  </form>
)}
```

**Password Fields (Both New and Confirm):**
- Labels: "New Password" / "Confirm Password"
- Input type: password/text (toggleable)
- Required: true
- Min length: 8 (for new password)
- Autocomplete: new-password
- Placeholder: "Enter new password (min 8 characters)" / "Confirm new password"
- Styling: w-full px-4 py-2.5 text-sm rounded-lg border pr-10
- Border: border-gray-200 (or border-red-500 for confirm if mismatch)
- Focus styles: Same as email input
- Layout: relative (for toggle button)

**Password Visibility Toggle:**
- Position: absolute right-0 top-0 pr-3
- Button type: button
- Icon: Eye/Eye-off SVG (h-5 w-5 text-gray-500)
- Toggles between show/hide password

**Error for Confirm Password:**
- Text: "Passwords do not match"
- Styling: mt-1 text-sm text-red-600
- Conditional display

**Submit Button:**
- Text: "Reset Password" / "Resetting Password..." (when loading)
- Same styling as previous buttons

## State Management
- **step**: Controls which form section displays (1, 2, or 3)
- **email**: Stores email input
- **otp**: Stores OTP input (numeric only, max 6 chars)
- **newPassword**: Stores new password
- **confirmPassword**: Stores confirm password
- **errors**: Object for form/field errors
- **loading**: Boolean for loading states
- **message**: String for success messages
- **showNewPassword/showConfirmPassword**: Booleans for password visibility

## Functionality Flow
1. **Initial Load**: Step 1 form displayed
2. **Email Submission**: Simulates API call (1s delay), shows success message, advances to Step 2
3. **OTP Submission**: Validates 6-digit length, simulates verification (1s delay), advances to Step 3
4. **Password Reset**: Validates password match, simulates reset (1s delay), shows success, redirects to login after 3s

## Responsive Design
- Container: max-w-md (384px max width)
- Padding: p-8 (32px)
- Mobile-friendly with flex centering
- Gradient background adapts to screen size

## Accessibility Features
- Proper labels for all inputs
- Required attributes
- Autocomplete attributes
- Focus management with ring styles
- Semantic form structure
- ARIA-compliant icons

## Styling Framework
- **Tailwind CSS** for all styling
- **Custom color**: #0a63b0 for primary buttons
- **Consistent spacing**: mb-4, mb-1.5, mt-1
- **Border radius**: rounded-lg for inputs, rounded-xl for card
- **Shadows**: shadow-lg for depth
- **Transitions**: transition-all for smooth interactions

This component provides a complete, user-friendly password reset flow with clear visual feedback, proper validation, and responsive design.
