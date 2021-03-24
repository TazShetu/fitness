@php


    // create curl resource
    $ch = curl_init();

    // set url
    // curl_setopt($ch, CURLOPT_URL, "https://sensortower.com");
    curl_setopt($ch, CURLOPT_URL, "https://www.youtube.com");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);

    // dd($output);

@endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<iframe id="inlineFrameExample"
        title="Inline Frame Example"
        width="300"
        height="200"
        src="https://www.youtube.com">
</iframe>
<iframe width="560" height="315" src="https://www.youtube.com/embed/zing4uQ3dR4" title="YouTube video player"
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
<iframe src="http://api.twinbit.net/wallpaper/login" width="2000" height="2000" scrolling="yes"></iframe>
</body>
</html>
