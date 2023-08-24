</head>

<body>
    <h1>Welcome to uniwolc!</h1>
    <p>Name : {{ $formData['name'] }}</p>
    <p>email : {{ $formData['email'] }}</p>
    <p>password : {{ $formData['password'] }}</p>
    <p>Some more text</p>
    <a href="{{ route('login') }}">Login</a>
</body>

</html>
