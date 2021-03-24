# Flare

## Getting started

```shell
cp .env.example .env
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
php artisan migrate
php artisan db:seed
php artisan serve
```

## API routes

All routes except `/auth/register` and `/auth/login` requires **bearer token**.

### Auth

```http request
POST /auth/register
```

```http request
POST /auth/login
```

```http request
POST /auth/logout
```

```http request
POST /auth/user-profile
```

### User

Get all a user's enrolled courses

```http request
GET /user/courses
```

Enroll a user in a course

```http request
POST /user/courses 
```

Unenroll a user from a course

```http request
DELETE /user/courses/{course-id} 
```

Get all a user's notes

```http request
GET /user/notes
```

### Courses

```http request
GET /courses
```

```http request
GET /courses/{id}
```

### Lessons

```http request
GET /lessons/{id}
```

### Notes

```http request
GET /notes/{id}
```

```http request
POST /notes
```

```http request
DELETE /notes
```

```http request
PATCH /notes/{id}
```
