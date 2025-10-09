<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routing System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            position: relative;
        }
        .content-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #212529;
        }
        p {
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 25px;
            color: #495057;
        }
        .github-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #24292e;
            font-weight: 600;
            transition: color 0.2s ease;
        }
        .github-link:hover {
            color: #0969da;
        }
        .github-icon {
            width: 20px;
            height: 20px;
        }
        .hello-kitty-image {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 150px;
            height: auto;
            z-index: 1000;
            mix-blend-mode: multiply;
        }

        .phrase {
            position: fixed;
            bottom: 180px;
            right: 50px;
            font-size: 1rem;
            font-weight: 600;
            color: #ff1493; /* Hot Pink color */
            z-index: 1001;
            transform: rotate(5deg);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="content-box">
            <h2>Welcome !</h2>
            <p>Thanks for testing my routing system made from scratch. Any doubts, questions, and ideas are important.</p>
            <p>Please visit and contribute to this project</p>
            <a href='https://github.com/isaac-rom3ro/routing' target='_blank' class="github-link">
                <svg class="github-icon" viewBox="0 0 16 16" fill="currentColor">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"/>
                </svg>
                View on GitHub
            </a>
        </div>
    </div>

    <div class="phrase">Approved by Layane</div>

    <img src="https://freepnglogo.com/images/all_img/1718884189hello-kitty-png-stickers.png" alt="Hello Kitty" class="hello-kitty-image">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>