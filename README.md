# Flare

## Getting started

Firstly, configure the database in `.env` based on `.env.example`. Then run the following:

```shell
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

|Param|Type|Required|Description|
|---|---|---|---|
|enrolled|bool|No|Get the courses the current user is/isn't enrolled in|
|limit|int|No|Limit number of courses returned|

```http request
GET /courses/{id}
```

### Lessons

```http request
GET /lessons/{id}
```

### Notes

Create a new note

```http request
POST /notes
```

Get all a user's notes

```http request
GET /notes
```

|Param|Type|Required|Description|
|---|---|---|---|
|lesson_id|int|No|Get the note for a specific lesson|

Delete a note

```http request
DELETE /notes/{id}
```

Update a note's content

```http request
PATCH /notes/{id}
```

|Param|Type|Required|
|---|---|---|
|note_content|string|Yes|
