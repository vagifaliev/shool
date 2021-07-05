<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>
        Тестируем JS
    </title>
</head>
<frameset rows="100, *">
    <frame src="/frame0" name="frame0" frameborder="1" scrolling="no">
    <frameset cols="10, 100">
        <frame src="/frame1" name="frame1" frameborder="1" scrolling="no" noresize>
        <frameset rows="1000,*" col="10, 100" >
            <frame src="/frame2" name="frame2" frameborder="1" scrolling="yes" noresize>
        </frameset>
    </frameset>
</frameset>
</html>