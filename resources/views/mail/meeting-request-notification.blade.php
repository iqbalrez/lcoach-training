<!DOCTYPE html>
<html>
<head>
    <title>Meeting Request from {{ $name }} </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #333;
            padding: 10px 20px;
            color: white;
            text-align: center;
            font-size: 18px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            font-size: 14px;
            padding: 20px;
            font-family: 'figtree', sans-serif;
            justify-content: center;
            text-align: center;
            gap: 2px;
        }
        .footer {
            background: #f4f4f4;
            padding: 10px 20px;
            text-align: center;
            font-size: 12px;
            color: #999;
            border-radius: 0 0 8px 8px;
        }
    </style>
</head>
<body class="email-container">
    <div class="header">
        Meeting Request #{{ $date }}-{{ $time }}
    </div>
    <div class="content">
            <p style="font-size: 18px;">{{ $name }} <br>
            <span style="text-decoration: underline; font-size: 14px;">({{ $email }})</span></p> 
        <p style="font-size: 16px;" > from {{ $company }}</p>
            <p>has requested a meeting with you at <br>
            <span style="font-size: 16px;"> {{ date('d F Y', strtotime($date)) }} - {{ $time }}</span></p>
    </div>

    <div class="content" style="margin-top: 20px;">
        <a href="{{ route('admin.meeting-request.index') }}" style="text-decoration: none; background-color: #333; color: white; padding: 10px 20px; border-radius: 5px;">Check Meeting Request</a>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
</body>
</html>
