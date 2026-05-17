# Testing Report — Umuganda Smart Service Request Platform
## Group 8 | Year II C | INES Ruhengeri

| # | Feature Tested | Test Case | Expected Result | Actual Result | Status |
|---|---|---|---|---|---|
| 1 | Homepage | Load public/index.php | Homepage with hero section and cards | Displayed correctly | ✅ Passed |
| 2 | Request Form | Open submit_request.php | Form with all fields visible | Form loaded | ✅ Passed |
| 3 | JS Live Preview | Click Preview with empty fields | Show validation error | Error shown | ✅ Passed |
| 4 | JS Live Preview | Fill all fields and click Preview | Show preview box with all data | Preview shown | ✅ Passed |
| 5 | JS Validation | Submit with invalid email | Block submission, show error | Blocked | ✅ Passed |
| 6 | Request Submission | Submit valid form | Data saved to DB, success page | Success page shown | ✅ Passed |
| 7 | Admin Login | Enter wrong credentials | Show error message | Error shown | ✅ Passed |
| 8 | Admin Login | Enter correct credentials | Redirect to dashboard | Redirected | ✅ Passed |
| 9 | Session Protection | Access dashboard without login | Redirect to login page | Redirected | ✅ Passed |
| 10 | Admin Dashboard | Load dashboard after login | Show stats + table of requests | Displayed | ✅ Passed |
| 11 | Status Update | Click Accept on a Pending request | Status changes to In Progress | Changed | ✅ Passed |
| 12 | Status Update | Click Resolve on In Progress request | Status changes to Resolved | Changed | ✅ Passed |
| 13 | Search Filter | Search by category name | Filtered results shown | Filtered | ✅ Passed |
| 14 | Status Filter | Filter by Pending | Only pending requests shown | Filtered | ✅ Passed |
| 15 | Priority Ordering | High priority requests | High appears before Low in table | Ordered | ✅ Passed |
| 16 | Logout | Click Logout | Session destroyed, redirect home | Logged out | ✅ Passed |
| 17 | Responsive Design | Open on mobile viewport | Layout adapts to screen | Responsive | ✅ Passed |

## Bugs Found & Fixed

| Bug | Description | Fix Applied |
|---|---|---|
| JS preview missing fields | Only showed name and category | Updated to show email, priority, description |
| Hardcoded login | No DB auth | Added admins table + password_verify fallback |
| Broken paths in home.php | Links used wrong relative paths | Fixed all paths relative to public/ entry |
| No input validation in PHP | Any input accepted | Added trim, empty check, email validation |
| No status constraints in DB | Any string accepted for status/priority | Changed columns to ENUM types |
