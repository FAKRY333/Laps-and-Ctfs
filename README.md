# Access Control Vulnerabilities

Hello friends, my name is **Fikri**, a cybersecurity student. In this article, I will talk about **Access Control Vulnerabilities**, one of the most common and dangerous classes of web application security issues.

---

## What is an Access Control Vulnerability?

An **access control vulnerability** occurs when an application fails to properly enforce restrictions on what authenticated or unauthenticated users are allowed to do.

In simple words:

> It allows an attacker to **access data, resources, or functions they are not authorized to access**.

Access control should answer questions like:

* Who can access this resource?
* What actions can this user perform?
* Are they allowed to access *this specific object*?

When these checks are missing, weak, or implemented incorrectly, vulnerabilities appear.

---

## Why Are Access Control Vulnerabilities Dangerous?

Access control issues often lead to:

* Unauthorized data exposure
* Account takeover
* Privilege escalation (user → admin)
* Full system compromise

According to OWASP, **Broken Access Control** has been ranked as one of the **Top 10 Web Application Risks**.

---

## Common Types of Access Control Vulnerabilities

### 1. BOLA – Broken Object Level Authorization

**BOLA** happens when an application does not verify whether a user is allowed to access a specific object (like a user profile, order, or file).

#### Example:

```http
GET /api/users/1001
```

If the logged-in user changes the ID:

```http
GET /api/users/1002
```

And the server returns another user’s data **without checking ownership**, this is a **BOLA vulnerability**.

#### Real-world impact:

* Accessing other users’ personal data
* Viewing private orders or financial information

---

### 2. BFLA – Broken Function Level Authorization

**BFLA** occurs when an application does not properly restrict access to sensitive functions.

#### Example:

A normal user accesses an admin-only endpoint:

```http
POST /admin/deleteUser
```

If the server executes the request without checking the user’s role, the user can perform **admin actions**.

#### Impact:

* Deleting users
* Changing roles
* Modifying system settings

---

### 3. IDOR – Insecure Direct Object Reference

**IDOR** is a very common form of BOLA.

#### Example:

```http
GET /invoice.php?id=1234
```

If changing the ID gives access to another user’s invoice:

```http
GET /invoice.php?id=1235
```

This indicates an **IDOR vulnerability**.

---

### 4. Horizontal Privilege Escalation

When a user accesses resources of **another user with the same role**.

#### Example:

* User A accesses User B’s profile
* User A edits User B’s data

---

### 5. Vertical Privilege Escalation

When a low-privileged user gains **higher privileges**.

#### Example:

* Normal user becomes admin
* User accesses `/admin` panel

---

## Common Causes of Access Control Issues

* Relying only on client-side checks
* Missing authorization checks on the backend
* Using predictable object IDs
* Trusting user-controlled input
* Poor role validation logic

---

## How Attackers Test Access Control

Security testers often:

* Modify parameters (IDs, user IDs)
* Replay requests with different accounts
* Remove tokens or cookies
* Access hidden endpoints directly
* Test API endpoints manually

Tools commonly used:

* Burp Suite
* Postman
* cURL

---

## How to Prevent Access Control Vulnerabilities

* Enforce authorization checks **on the server side**
* Use role-based access control (RBAC)
* Validate object ownership on every request
* Deny access by default
* Log and monitor access violations

---

## installation 
#### I created a lap that can test the vulnerability in the connection control, and you can also modify it and make it secure.


* [Download](https://github.com/FAKRY333/Access_control_bugs/archive/refs/heads/main.zip)


#### After downloading, you must place the files on your internal server in a secure lab. There you will find the database file; import it.



---

## Conclusion

Access control vulnerabilities are simple in concept but extremely dangerous in impact. Many real-world breaches happen because developers assume users will "behave correctly".

As a penetration tester or cybersecurity student, mastering access control testing is essential, especially when dealing with **web applications and APIs**.

---

*Written by Fikri – Cybersecurity Student*

