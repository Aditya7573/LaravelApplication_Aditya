<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Page</title>
</head>
<body>
@extends('master')
@section('content')
<h1>Contact Page </h1>

@if (!empty($email))
   <h3>{{ $email }}</h3>
@else
    No email address given
@endif
</body>
</html>

