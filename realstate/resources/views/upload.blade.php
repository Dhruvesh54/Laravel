<html>
<head>
    <title>File Upload Example</title>
</head>
<body>
    @if (isset($message))
        <h1 style="color: green">{{ $message }}</h1>
    @endif

    <form action="upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>

    @if (isset($fileInfo))
        <h2>Uploaded File Information:</h2>
        <ul>
            <li><strong>Name:</strong> {{ $fileInfo['name'] }}</li>
            <li><strong>Size:</strong> {{ $fileInfo['size'] }} bytes</li>
            <li><strong>Path:</strong> {{ $fileInfo['path'] }}</li>
        </ul>
    @endif
</body>
</html>